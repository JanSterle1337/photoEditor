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
}