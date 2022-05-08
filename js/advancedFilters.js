function boxFilter(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log("Moj array je: "+ mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j+1][0],10) + 
                                   parseInt(kopija[i][j+1][0],10) + 
                                   parseInt(kopija[i+1][j+1][0],10) + 
                                   parseInt(kopija[i-1][j][0],10) +  
                                   parseInt(kopija[i][j][0],10) + 
                                   parseInt(kopija[i+1][j][0],10) + 
                                   parseInt(kopija[i-1][j-1][0],10) + 
                                   parseInt(kopija[i][j-1][0],10) + 
                                   parseInt(kopija[i+1][j-1][0],10);

                    if (sestevek / 9 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 9;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j+1][1],10) + 
                                   parseInt(kopija[i][j+1][1],10) + 
                                   parseInt(kopija[i+1][j+1][1],10) + 
                                   parseInt(kopija[i-1][j][1],10) +  
                                   parseInt(kopija[i][j][1],10) + 
                                   parseInt(kopija[i+1][j][1],10) + 
                                   parseInt(kopija[i-1][j-1][1],10) + 
                                   parseInt(kopija[i][j-1][1],10) + 
                                   parseInt(kopija[i+1][j-1][1],10);
                    
                    if (sestevek / 9 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 9;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek = parseInt(kopija[i-1][j+1][2],10) + 
                                   parseInt(kopija[i][j+1][2],10) + 
                                   parseInt(kopija[i+1][j+1][2],10) + 
                                   parseInt(kopija[i-1][j][2],10) +  
                                   parseInt(kopija[i][j][2],10) + 
                                   parseInt(kopija[i+1][j][2],10) + 
                                   parseInt(kopija[i-1][j-1][2],10) + 
                                   parseInt(kopija[i][j-1][2],10) + 
                                   parseInt(kopija[i+1][j-1][2],10);
                    

                    if (sestevek / 9 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 9;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    changesCounter++;
    dataStack.push(imgData);
    FreshData.newDataRefresh();
}



function boxFilterAdvanced(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-2][j+2][0],10) +
                                   parseInt(kopija[i-1][j+2][0],10) +
                                   parseInt(kopija[i][j+2][0],10) +
                                   parseInt(kopija[i+1][j+2][0],10) +
                                   parseInt(kopija[i+2][j+2][0],10) +

                                   parseInt(kopija[i-2][j+1][0],10) +
                                   parseInt(kopija[i-1][j+1][0],10) +
                                   parseInt(kopija[i][j+1][0],10) +
                                   parseInt(kopija[i+1][j+1][0],10) +
                                   parseInt(kopija[i+2][j+1][0],10) +

                                   parseInt(kopija[i-2][j][0],10) +
                                   parseInt(kopija[i-1][j][0],10) +
                                   parseInt(kopija[i][j][0],10) +
                                   parseInt(kopija[i+1][j][0],10) +
                                   parseInt(kopija[i+2][j][0],10) +

                                   parseInt(kopija[i-2][j-1][0],10) +
                                   parseInt(kopija[i-1][j-1][0],10) +
                                   parseInt(kopija[i][j-1][0],10) +
                                   parseInt(kopija[i+1][j-1][0],10) +
                                   parseInt(kopija[i+2][j-1][0],10) +

                                   parseInt(kopija[i-2][j-2][0],10) +
                                   parseInt(kopija[i-1][j-2][0],10) +
                                   parseInt(kopija[i][j-2][0],10) +
                                   parseInt(kopija[i+1][j-2][0],10) +
                                   parseInt(kopija[i+2][j-2][0],10);


                                /*
                                   parseInt(kopija[i-1][j+1][0],10) + 
                                   parseInt(kopija[i][j+1][0],10) + 
                                   parseInt(kopija[i+1][j+1][0],10) + 

                                   parseInt(kopija[i-1][j][0],10) +  
                                   parseInt(kopija[i][j][0],10) + 
                                   parseInt(kopija[i+1][j][0],10) +

                                   parseInt(kopija[i-1][j-1][0],10) + 
                                   parseInt(kopija[i][j-1][0],10) + 
                                   parseInt(kopija[i+1][j-1][0],10); */

                    if (sestevek / 25 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 25;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-2][j+2][1],10) +
                                   parseInt(kopija[i-1][j+2][1],10) +
                                   parseInt(kopija[i][j+2][1],10) +
                                   parseInt(kopija[i+1][j+2][1],10) +
                                   parseInt(kopija[i+2][j+2][1],10) +

                                   parseInt(kopija[i-2][j+1][1],10) +
                                   parseInt(kopija[i-1][j+1][1],10) +
                                   parseInt(kopija[i][j+1][1],10) +
                                   parseInt(kopija[i+1][j+1][1],10) +
                                   parseInt(kopija[i+2][j+1][1],10) +

                                   parseInt(kopija[i-2][j][1],10) +
                                   parseInt(kopija[i-1][j][1],10) +
                                   parseInt(kopija[i][j][1],10) +
                                   parseInt(kopija[i+1][j][1],10) +
                                   parseInt(kopija[i+2][j][1],10) +

                                   parseInt(kopija[i-2][j-1][1],10) +
                                   parseInt(kopija[i-1][j-1][1],10) +
                                   parseInt(kopija[i][j-1][1],10) +
                                   parseInt(kopija[i+1][j-1][1],10) +
                                   parseInt(kopija[i+2][j-1][1],10) +

                                   parseInt(kopija[i-2][j-2][1],10) +
                                   parseInt(kopija[i-1][j-2][1],10) +
                                   parseInt(kopija[i][j-2][1],10) +
                                   parseInt(kopija[i+1][j-2][1],10) +
                                   parseInt(kopija[i+2][j-2][1],10);
                    
                    if (sestevek / 25 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 25;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-2][j+2][2],10) +
                                   parseInt(kopija[i-1][j+2][2],10) +
                                   parseInt(kopija[i][j+2][2],10) +
                                   parseInt(kopija[i+1][j+2][2],10) +
                                   parseInt(kopija[i+2][j+2][2],10) +

                                   parseInt(kopija[i-2][j+1][2],10) +
                                   parseInt(kopija[i-1][j+1][2],10) +
                                   parseInt(kopija[i][j+1][2],10) +
                                   parseInt(kopija[i+1][j+1][2],10) +
                                   parseInt(kopija[i+2][j+1][2],10) +

                                   parseInt(kopija[i-2][j][2],10) +
                                   parseInt(kopija[i-1][j][2],10) +
                                   parseInt(kopija[i][j][2],10) +
                                   parseInt(kopija[i+1][j][2],10) +
                                   parseInt(kopija[i+2][j][2],10) +

                                   parseInt(kopija[i-2][j-1][2],10) +
                                   parseInt(kopija[i-1][j-1][2],10) +
                                   parseInt(kopija[i][j-1][2],10) +
                                   parseInt(kopija[i+1][j-1][2],10) +
                                   parseInt(kopija[i+2][j-1][2],10) +

                                   parseInt(kopija[i-2][j-2][2],10) +
                                   parseInt(kopija[i-1][j-2][2],10) +
                                   parseInt(kopija[i][j-2][2],10) +
                                   parseInt(kopija[i+1][j-2][2],10) +
                                   parseInt(kopija[i+2][j-2][2],10);

                    if (sestevek / 25 > 255) {
                        imgData.data[t] = 255;
                    } else {
                        imgData.data[t] = sestevek / 25;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();
}

function laplaceov(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i][j+1][0],10) * 1 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i-1][j][0],10) * 1 +  
                                   parseInt(kopija[i][j][0],10) * (-4) + 
                                   parseInt(kopija[i+1][j][0],10) * 1 + 
                                   parseInt(kopija[i-1][j-1][0],10) * 0 + 
                                   parseInt(kopija[i][j-1][0],10)  * 1 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 0;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i][j+1][1],10) * 1 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i-1][j][1],10) * 1 +  
                                   parseInt(kopija[i][j][1],10) * (-4) + 
                                   parseInt(kopija[i+1][j][1],10) * 1 + 
                                   parseInt(kopija[i-1][j-1][1],10) * 0 + 
                                   parseInt(kopija[i][j-1][1],10)  * 1 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 0;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek = parseInt(kopija[i-1][j+1][2],10) * 0 + 
                               parseInt(kopija[i][j+1][2],10) * 1 + 
                               parseInt(kopija[i+1][j+1][2],10) * 0 + 
                               parseInt(kopija[i-1][j][2],10) * 1 +  
                               parseInt(kopija[i][j][2],10) * (-4) + 
                               parseInt(kopija[i+1][j][2],10) * 1 + 
                               parseInt(kopija[i-1][j-1][2],10) * 0 + 
                               parseInt(kopija[i][j-1][2],10)  * 1 + 
                               parseInt(kopija[i+1][j-1][2],10) * 0;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}


function xRightSobel(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j+1][0],10) * -1 + 
                                   parseInt(kopija[i][j+1][0],10) * 0 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 1 + 
                                   parseInt(kopija[i-1][j][0],10) * -2 +  
                                   parseInt(kopija[i][j][0],10) * (0) + 
                                   parseInt(kopija[i+1][j][0],10) * 2 + 
                                   parseInt(kopija[i-1][j-1][0],10) * -1 + 
                                   parseInt(kopija[i][j-1][0],10)  * 0 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 1;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j+1][1],10) * -1 + 
                                   parseInt(kopija[i][j+1][1],10) * 0 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 1 + 
                                   parseInt(kopija[i-1][j][1],10) * -2 +  
                                   parseInt(kopija[i][j][1],10) * (0) + 
                                   parseInt(kopija[i+1][j][1],10) * 2 + 
                                   parseInt(kopija[i-1][j-1][1],10) * -1 + 
                                   parseInt(kopija[i][j-1][1],10)  * 0 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 1;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-1][j+1][2],10) * -1 + 
                                   parseInt(kopija[i][j+1][2],10) * 0 + 
                                   parseInt(kopija[i+1][j+1][2],10) * 1 + 
                                   parseInt(kopija[i-1][j][2],10) * -2 +  
                                   parseInt(kopija[i][j][2],10) * (0) + 
                                   parseInt(kopija[i+1][j][2],10) * 2 + 
                                   parseInt(kopija[i-1][j-1][2],10) * -1 + 
                                   parseInt(kopija[i][j-1][2],10)  * 0 + 
                                   parseInt(kopija[i+1][j-1][2],10) * 1;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}


function yRightSobelMoj(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j-1][0],10) * 1 + 
                                   parseInt(kopija[i-1][j][0],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][0],10) * -1 + 
                                   parseInt(kopija[i][j-1][0],10) * 2 +  
                                   parseInt(kopija[i][j][0],10) * (0) + 
                                   parseInt(kopija[i][j+1][0],10) * -2 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 1 + 
                                   parseInt(kopija[i+1][j][0],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][0],10) * -1;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j-1][1],10) * 1 + 
                                   parseInt(kopija[i-1][j][1],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][1],10) * -1 + 
                                   parseInt(kopija[i][j-1][1],10) * 2 +  
                                   parseInt(kopija[i][j][1],10) * (0) + 
                                   parseInt(kopija[i][j+1][1],10) * -2 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 1 + 
                                   parseInt(kopija[i+1][j][1],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][1],10) * -1;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-1][j-1][2],10) * 1 + 
                                   parseInt(kopija[i-1][j][2],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][2],10) * -1 + 
                                   parseInt(kopija[i][j-1][2],10) * 2 +  
                                   parseInt(kopija[i][j][2],10) * (0) + 
                                   parseInt(kopija[i][j+1][2],10) * -2 + 
                                   parseInt(kopija[i+1][j-1][2],10) * 1 + 
                                   parseInt(kopija[i+1][j][2],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][2],10) * -1;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}


function yLeftSobelMoj(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j-1][0],10) * -1 + 
                                   parseInt(kopija[i-1][j][0],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][0],10) * 1 + 
                                   parseInt(kopija[i][j-1][0],10) * -2 +  
                                   parseInt(kopija[i][j][0],10) * (0) + 
                                   parseInt(kopija[i][j+1][0],10) * 2 + 
                                   parseInt(kopija[i+1][j-1][0],10) * -1 + 
                                   parseInt(kopija[i+1][j][0],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 1;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j-1][1],10) * -1 + 
                                   parseInt(kopija[i-1][j][1],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][1],10) * 1 + 
                                   parseInt(kopija[i][j-1][1],10) * -2 +  
                                   parseInt(kopija[i][j][1],10) * (0) + 
                                   parseInt(kopija[i][j+1][1],10) * 2 + 
                                   parseInt(kopija[i+1][j-1][1],10) * -1 + 
                                   parseInt(kopija[i+1][j][1],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 1;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-1][j-1][2],10) * -1 + 
                                   parseInt(kopija[i-1][j][2],10) * 0 + 
                                   parseInt(kopija[i-1][j+1][2],10) * 1 + 
                                   parseInt(kopija[i][j-1][2],10) * -2 +  
                                   parseInt(kopija[i][j][2],10) * (0) + 
                                   parseInt(kopija[i][j+1][2],10) * 2 + 
                                   parseInt(kopija[i+1][j-1][2],10) * -1 + 
                                   parseInt(kopija[i+1][j][2],10)  * 0 + 
                                   parseInt(kopija[i+1][j+1][2],10) * 1;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}

function xBottomSobel(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j-1][0],10) * 1 + 
                                   parseInt(kopija[i-1][j][0],10) * 2 + 
                                   parseInt(kopija[i-1][j+1][0],10) * 1 + 
                                   parseInt(kopija[i][j-1][0],10) * 0 +  
                                   parseInt(kopija[i][j][0],10) * 0 + 
                                   parseInt(kopija[i][j+1][0],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][0],10) * -1 + 
                                   parseInt(kopija[i+1][j][0],10)  * -2 + 
                                   parseInt(kopija[i+1][j+1][0],10) * -1;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j-1][1],10) * 1 + 
                                   parseInt(kopija[i-1][j][1],10) * 2 + 
                                   parseInt(kopija[i-1][j+1][1],10) * 1 + 
                                   parseInt(kopija[i][j-1][1],10) * 0 +  
                                   parseInt(kopija[i][j][1],10) * 0 + 
                                   parseInt(kopija[i][j+1][1],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][1],10) * -1 + 
                                   parseInt(kopija[i+1][j][1],10)  * -2 + 
                                   parseInt(kopija[i+1][j+1][1],10) * -1;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-1][j-1][2],10) * 1 + 
                                   parseInt(kopija[i-1][j][2],10) * 2 + 
                                   parseInt(kopija[i-1][j+1][2],10) * 1 + 
                                   parseInt(kopija[i][j-1][2],10) * 0 +  
                                   parseInt(kopija[i][j][2],10) * 0 + 
                                   parseInt(kopija[i][j+1][2],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][2],10) * -1 + 
                                   parseInt(kopija[i+1][j][2],10)  * -2 + 
                                   parseInt(kopija[i+1][j+1][2],10) * -1;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}


function xTopSobel(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j-1][0],10) * -1 + 
                                   parseInt(kopija[i-1][j][0],10) * -2 + 
                                   parseInt(kopija[i-1][j+1][0],10) * -1 + 
                                   parseInt(kopija[i][j-1][0],10) * 0 +  
                                   parseInt(kopija[i][j][0],10) * 0 + 
                                   parseInt(kopija[i][j+1][0],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 1 + 
                                   parseInt(kopija[i+1][j][0],10)  * 2 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 1;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j-1][1],10) * -1 + 
                                   parseInt(kopija[i-1][j][1],10) * -2 + 
                                   parseInt(kopija[i-1][j+1][1],10) * -1 + 
                                   parseInt(kopija[i][j-1][1],10) * 0 +  
                                   parseInt(kopija[i][j][1],10) * 0 + 
                                   parseInt(kopija[i][j+1][1],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 1 + 
                                   parseInt(kopija[i+1][j][1],10)  * 2 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 1;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek =     parseInt(kopija[i-1][j-1][2],10) * -1 +     
                                   parseInt(kopija[i-1][j][2],10) * -2 + 
                                   parseInt(kopija[i-1][j+1][2],10) * -1 + 
                                   parseInt(kopija[i][j-1][2],10) * 0 +  
                                   parseInt(kopija[i][j][2],10) * 0 + 
                                   parseInt(kopija[i][j+1][2],10) * 0 + 
                                   parseInt(kopija[i+1][j-1][2],10) * 1 + 
                                   parseInt(kopija[i+1][j][2],10)  * 2 + 
                                   parseInt(kopija[i+1][j+1][2],10) * 1;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();

}


function sharpening(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i][j+1][0],10) * 1 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i-1][j][0],10) * 1 +  
                                   parseInt(kopija[i][j][0],10) * (-4) + 
                                   parseInt(kopija[i+1][j][0],10) * 1 + 
                                   parseInt(kopija[i-1][j-1][0],10) * 0 + 
                                   parseInt(kopija[i][j-1][0],10)  * 1 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 0;

                    if (sestevek > 255) {
                        imgData.data[t] = imgData.data[t]-255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = imgData.data[t];
                    } else {
                        imgData.data[t] = imgData.data[t]-sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i][j+1][1],10) * 1 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i-1][j][1],10) * 1 +  
                                   parseInt(kopija[i][j][1],10) * (-4) + 
                                   parseInt(kopija[i+1][j][1],10) * 1 + 
                                   parseInt(kopija[i-1][j-1][1],10) * 0 + 
                                   parseInt(kopija[i][j-1][1],10)  * 1 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 0;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = imgData.data[t]-255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = imgData.data[t];
                    } else {
                        imgData.data[t] = imgData.data[t]-sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek = parseInt(kopija[i-1][j+1][2],10) * 0 + 
                               parseInt(kopija[i][j+1][2],10) * 1 + 
                               parseInt(kopija[i+1][j+1][2],10) * 0 + 
                               parseInt(kopija[i-1][j][2],10) * 1 +  
                               parseInt(kopija[i][j][2],10) * (-4) + 
                               parseInt(kopija[i+1][j][2],10) * 1 + 
                               parseInt(kopija[i-1][j-1][2],10) * 0 + 
                               parseInt(kopija[i][j-1][2],10)  * 1 + 
                               parseInt(kopija[i+1][j-1][2],10) * 0;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = imgData.data[t]-255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = imgData.data[t];
                    } else {
                        imgData.data[t] = imgData.data[t]-sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();
}


function unsharpMasking(imgData,mojArr) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    let kopija = mojArr;
    console.log(mojArr);
    let t = 2000;
    for (let i = 1; i < 700; i++) {
        
        for (let j = 1; j <500; j++) {
          
                
                //console.log(kopija);
                //console.log(kopija[i-1][j-1][k]);
               
                    try {

                    let sestevek = parseInt(kopija[i-1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i][j+1][0],10) * -1 + 
                                   parseInt(kopija[i+1][j+1][0],10) * 0 + 
                                   parseInt(kopija[i-1][j][0],10) * -1 +  
                                   parseInt(kopija[i][j][0],10) * (5) + 
                                   parseInt(kopija[i+1][j][0],10) * -1 + 
                                   parseInt(kopija[i-1][j-1][0],10) * 0 + 
                                   parseInt(kopija[i][j-1][0],10)  * -1 + 
                                   parseInt(kopija[i+1][j-1][0],10) * 0;

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }

                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    let sestevek = parseInt(kopija[i-1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i][j+1][1],10) * -1 + 
                                   parseInt(kopija[i+1][j+1][1],10) * 0 + 
                                   parseInt(kopija[i-1][j][1],10) * -1 +  
                                   parseInt(kopija[i][j][1],10) * (5) + 
                                   parseInt(kopija[i+1][j][1],10) * -1 + 
                                   parseInt(kopija[i-1][j-1][1],10) * 0 + 
                                   parseInt(kopija[i][j-1][1],10)  * -1 + 
                                   parseInt(kopija[i+1][j-1][1],10) * 0;
                    
                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    
                    } catch {

                    }
                    t++;

                    try {
                    sestevek = parseInt(kopija[i-1][j+1][2],10) * 0 + 
                               parseInt(kopija[i][j+1][2],10) * -1 + 
                               parseInt(kopija[i+1][j+1][2],10) * 0 + 
                               parseInt(kopija[i-1][j][2],10) * -1 +  
                               parseInt(kopija[i][j][2],10) * (5) + 
                               parseInt(kopija[i+1][j][2],10) * -1 + 
                               parseInt(kopija[i-1][j-1][2],10) * 0 + 
                               parseInt(kopija[i][j-1][2],10)  * -1 + 
                               parseInt(kopija[i+1][j-1][2],10) * 0;
                    

                    if (sestevek > 255) {
                        imgData.data[t] = 255;
                    } else if (sestevek < 0) {
                        imgData.data[t] = 0;
                    } else {
                        imgData.data[t] = sestevek;
                    }
                    
                    //let sestevek2 = parseInt(kopija[i-1][j-1][k],10) + parseInt(kopija[i-1][j][k],10);
                    //console.log(sestevek);
                    } catch {

                    }

                    t++;
                    t++;
                    
               
 

                
               // console.log(sestevek);
                //imgData.data[t] = sestevek / 9;
            
           
                
        }
        t+=4;
    }
    ctx.putImageData(imgData, 0, 0);
    FreshData.newDataRefresh();
}