<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHOTO EDITOR</title>
    
</head>
<body>
        
            <img id="scream" src="assets/selfie.jpg" alt="The Scream" width="500" height="700">
            <canvas id="myCanvas" width="500" height="700" style="border:1px solid #d3d3d3;">
      
        
</body>
<script>

        let img = document.getElementById('scream');
        let canvas = document.getElementById('myCanvas');
        let ctx = canvas.getContext('2d');
       


    img.onload = function () {
        ctx.drawImage(img,0,0,500,700);
        let imgData = ctx.getImageData(0, 0, 500, 700);
        console.log(imgData);        

        function razlika(imgData) {
            for (let i = 0; i < imgData.data.length; i += 4) {
            imgData.data[i] = 255 - imgData.data[i];
            imgData.data[i+1] = 255 - imgData.data[i+1];
            imgData.data[i+2] = 255 - imgData.data[i+2];
            imgData.data[i+3] = 255;
            }
            ctx.putImageData(imgData, 0, 0);
        }

        function grayscale(imgData) {
            for (let i = 0; i < imgData.data.length; i +=4) {
            let avg = imgData.data[i] + imgData.data[i+1] + imgData.data[i+2];
            imgData.data[i] = avg / 3;
            imgData.data[i+1] = avg / 3;
            imgData.data[i+2] = avg / 3;
            }
            ctx.putImageData(imgData, 0, 0);

        }

        function thresholding(imgData) {
            for (let i = 0; i < imgData.data.length; i +=4) {
            let avg = (imgData.data[i] + imgData.data[i+1] + imgData.data[i+2]) / 3;
                if (avg < 100) {
                    imgData.data[i] = 0;
                    imgData.data[i+1] = 0;
                    imgData.data[i+2] = 0;
                } else {
                    imgData.data[i] = 255;
                    imgData.data[i+1] = 255;
                    imgData.data[i+2] = 255;
                }
            }
            ctx.putImageData(imgData, 0, 0);
        }

        function brightening(imgData) {
            for (let i = 0; i < imgData.data.length; i +=4) {

                if (imgData.data[i] * 1.8 > 255) {
                    imgData.data[i] = 255;
                } else {
                    imgData.data[i] = imgData.data[i] * 1.8;
                }

                if (imgData.data[i+1] * 1.8 > 255) {
                    imgData.data[i+1] = 255;
                } else {
                    imgData.data[i+1] = imgData.data[i+1] * 1.8;
                }


                if (imgData.data[i+2] * 1.8 > 255) {
                    imgData.data[i+2] = 255;
                } else {
                    imgData.data[i+2] = imgData.data[i+2] * 1.8;
                }
            }
            ctx.putImageData(imgData, 0, 0);
        }

        /*brightening(imgData); */
        
    function neki(imgData) {
        for (let i = 0; i < imgData.data.length; i +=4) {
            
        }
    }


    function pretvorba(imgData) {

        let x = 220;
        let y = 277;
/*
        let arr2D;

        let k = 0;
        for (let i = 0; i < 277; i++) {
          
            for (let j = 0; j < x; j++) {
                arr2D[i][j] = img.data[k];
                k++;
            }
        }
*/
        let arr2D = new Array(700);
        let t = 0;
        for (let i = 0; i < 700; i++) {
            arr2D[i]  = new Array(500);
            for (let j = 0; j < 500; j++) {
                arr2D[i][j] = new Array(4);
                
                for (let k = 0; k < 4; k++) {
                    arr2D[i][j][k] = imgData.data[t];
                   t++;
                }
                //t++;
            }
        }
        /*
        let t = 0;
        for (let i = 0; i < 277; i++) {
            for (let j = 0; j < 220; j++) {
                for (let k = 0; k < 4; k++) {
                    arr2D[i][j][k] = img.data[t];
                    t++;
                }
            }
        }
        */

        console.log("Moj 2d array je: ", arr2D);
        return arr2D;
    }

    function boxFilter(mojArr) {
       
        let kopija = mojArr;
        console.log(mojArr);
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


    function boxFilterAdvanced(imgData) {
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
    }


    function laplaceov(imgData) {
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

    }


    /*function xRightSobel(imgData) {
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

    } */

    function xRightSobelMoj(imgData) {
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

    }
      
    neki(imgData);
 
    console.log(imgData);  
    let mojArr = pretvorba(imgData);
    console.log(imgData);
    //boxFilter(mojArr);
    //boxFilterAdvanced(imgData);
    //laplaceov(imgData); 
    xRightSobelMoj(imgData);
    xLeftSobelMoj(imgData);
    }
    
    </script>
</html>