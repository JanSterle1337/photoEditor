<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>PHOTO EDITOR</title>
    
</head>
<body>
        
            <img id="scream" src="assets/tom-jerry.jpg" alt="The Scream" width="500" height="700">
            <img id="scream2" src="assets/selfie.jpg" alt="The Scream 2" style="display: none;" width="500" height="700">
            <canvas id="myCanvas" width="500" height="700" style="border:1px solid #d3d3d3;"></canvas>
            
            
            <div style="display: flex; width: 500px; height: 500epx;">
            <canvas id="myChart" width="200" height="200"></canvas>
            </div>

            <div style="display: flex; width: 500px; height: 500px;">
            <canvas id="myChartLine" width="200" height="200"></canvas>
            </div>

        <script src="./js/main.js"></script>
        <script src="neki.js"></script>
</body>
<script>

        let img = document.getElementById('scream');
        let img2 = document.getElementById('scream2');
        let canvas = document.getElementById('myCanvas');
        let ctx = canvas.getContext('2d');


        
       

       



    img.onload = function () {


        
        let chartCanvas = document.getElementById('myChart');
        let chartCtx = chartCanvas.getContext('2d');

        let chartLineCanvas = document.getElementById('myChartLine');
        let chartLineCtx = chartLineCanvas.getContext('2d');
        
       
        ctx.drawImage(img,0,0,500,700);
        let originalData = ctx.getImageData(0,0,500,700);
        let imgData = ctx.getImageData(0, 0, 500, 700);
        console.log(imgData); 
        console.log(originalData);
        
        


        function backToOriginal(originalData) {
            console.log("Originalni podatki: " + originalData.data);
        
            ctx.putImageData(originalData,0,0);
        }

        

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

        function brightening(originalData,brightLvl) {

            let brightness = brightLvl / 100;

            console.log("Brightness multiplier: " + brightness);

            imgData.data = originalData.data;

            for (let i = 0; i < imgData.data.length; i +=4) {

                if (imgData.data[i] * brightness > 255) {
                    imgData.data[i] = 255;
                } else {
                    imgData.data[i] = imgData.data[i] * brightness;
                }

                if (imgData.data[i+1] * brightness > 255) {
                    imgData.data[i+1] = 255;
                } else {
                    imgData.data[i+1] = imgData.data[i+1] * brightness;
                }


                if (imgData.data[i+2] * brightness > 255) {
                    imgData.data[i+2] = 255;
                } else {
                    imgData.data[i+2] = imgData.data[i+2] * brightness;
                }
            }
            console.log("Znotrej funkcije brightening: " +  imgData);
            ctx.putImageData(imgData, 0, 0);
            imgData.data = originalData.data;
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

    function yRightSobelMoj(imgData) {
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

    function yLeftSobelMoj(imgData) {
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

    }

    function xBottomSobel(imgData) {
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

    }

    function xTopSobel(imgData) {
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

    }

    function medianinFilter(mojArr) {
       
       let kopija = mojArr;
       console.log(mojArr);
       let t = 2000;
       for (let i = 1; i < 700; i++) {
           
           for (let j = 1; j <500; j++) {
             
                   
                   //console.log(kopija);
                   //console.log(kopija[i-1][j-1][k]);
                  
                       try {


                       let filterValues = [
                        parseInt(kopija[i-1][j+1][0],10), 
                        parseInt(kopija[i][j+1][0],10),
                        parseInt(kopija[i+1][j+1][0],10), 
                        parseInt(kopija[i-1][j][0],10), 
                        parseInt(kopija[i][j][0],10), 
                        parseInt(kopija[i+1][j][0],10), 
                        parseInt(kopija[i-1][j-1][0],10), 
                        parseInt(kopija[i][j-1][0],10),
                        parseInt(kopija[i+1][j-1][0],10)
                       ];

                       imgData.data[t] = medianin(filterValues);

                       

                       
                       
                       } catch {

                       }
                       t++;

                       try {

                        filterValues = [
                        parseInt(kopija[i-1][j+1][1],10), 
                        parseInt(kopija[i][j+1][1],10),
                        parseInt(kopija[i+1][j+1][1],10), 
                        parseInt(kopija[i-1][j][1],10), 
                        parseInt(kopija[i][j][1],10), 
                        parseInt(kopija[i+1][j][1],10), 
                        parseInt(kopija[i-1][j-1][1],10), 
                        parseInt(kopija[i][j-1][1],10),
                        parseInt(kopija[i+1][j-1][1],10)
                       ];

                       imgData.data[t] = medianin(filterValues);
                       
                      
                       
                       
                       } catch {

                       }
                       t++;

                       try {
                       
                        filterValues = [
                        parseInt(kopija[i-1][j+1][2],10), 
                        parseInt(kopija[i][j+1][2],10),
                        parseInt(kopija[i+1][j+1][2],10), 
                        parseInt(kopija[i-1][j][2],10), 
                        parseInt(kopija[i][j][2],10), 
                        parseInt(kopija[i+1][j][2],10), 
                        parseInt(kopija[i-1][j-1][2],10), 
                        parseInt(kopija[i][j-1][2],10),
                        parseInt(kopija[i+1][j-1][2],10)
                       ];

                       imgData.data[t] = medianin(filterValues);
                       
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


   function sharpening(imgData) {
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
   }

    function unsharpMasking(imgData) {
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
    }


    


    function medianin(arrElementov) {
        const sorted = arrElementov.slice().sort((a,b) => a - b);
        const middle = Math.floor(sorted.length / 2);

        if (sorted.length % 2 === 0) {
            return (sorted[middle-1] + sorted[middle] / 2);
        }
        return sorted[middle];
    }


    function redChannel(imgData) {
        
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        let dolzinaSlike = imgData.data.length;
        for (let i = 0; i < dolzinaSlike; i +=4) {
            if (imgData.data[i] >= 0 &&  imgData.data[i] < 51) {
                arrKosi.max51 += 1;
            }
            if (imgData.data[i] >= 51 &&  imgData.data[i] < 102) {
                arrKosi.max102 += 1;
            }
            if (imgData.data[i] >= 102 &&  imgData.data[i] < 153) {
                arrKosi.max153 += 1;
            } 
            if (imgData.data[i] >= 153 &&  imgData.data[i] < 204) {
                arrKosi.max204 += 1;
            }
            if (imgData.data[i] >= 153 && imgData.data[i] <= 255) {
                arrKosi.max255 += 1;
            }
            
        }
        return arrKosi;
    }


    function blueChannel(imgData) {
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        let dolzinaSlike = imgData.data.length;
        for (let i = 0; i < dolzinaSlike; i +=4) {
            if (imgData.data[i+1] >= 0 &&  imgData.data[i+1] < 51) {
                arrKosi.max51 += 1;
            }
            if (imgData.data[i+1] >= 51 &&  imgData.data[i+1] < 102) {
                arrKosi.max102 += 1;
            }
            if (imgData.data[i+1] >= 102 &&  imgData.data[i+1] < 153) {
                arrKosi.max153 += 1;
            } 
            if (imgData.data[i+1] >= 153 &&  imgData.data[i+1] < 204) {
                arrKosi.max204 += 1;
            }
            if (imgData.data[i+1] >= 153 && imgData.data[i+1] <= 255) {
                arrKosi.max255 += 1;
            }   
        }
        return arrKosi;
    }

    function greenChannel(imgData) {
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        let dolzinaSlike = imgData.data.length;
        for (let i = 0; i < dolzinaSlike; i +=4) {
            if (imgData.data[i+2] >= 0 &&  imgData.data[i+2] < 51) {
                arrKosi.max51 += 1;
            }
            if (imgData.data[i+2] >= 51 &&  imgData.data[i+2] < 102) {
                arrKosi.max102 += 1;
            }
            if (imgData.data[i+2] >= 102 &&  imgData.data[i+2] < 153) {
                arrKosi.max153 += 1;
            } 
            if (imgData.data[i+2] >= 153 &&  imgData.data[i+2] < 204) {
                arrKosi.max204 += 1;
            }


            if (imgData.data[i+2] >= 153 && imgData.data[i+2] <= 255) {
                arrKosi.max255 += 1;
            }   
        }
        return arrKosi;
    }

    


      
    neki(imgData);
    
    console.log(imgData);  
    let mojArr = pretvorba(imgData);
    console.log(imgData);
   
    

    //boxFilter(mojArr);
    //boxFilterAdvanced(imgData);
    //backToOriginal(originalData);
    //laplaceov(imgData); 
    //yRightSobelMoj(imgData);
    //backToOriginal(originalData);
    //yLeftSobelMoj(imgData);
    //xBottomSobel(imgData);
    //xTopSobel(imgData);
    //medianinFilter(imgData);
    //sharpening(imgData);
    //unsharpMasking(imgData);
    //backToOriginal(imgData);





    redObj = redChannel(imgData);
    blueObj = blueChannel(imgData);
    greenObj = greenChannel(imgData);
    let arrRedChannels = [
        redObj.max51,
        redObj.max102,
        redObj.max153,
        redObj.max204,
        redObj.max255
    ];
    let arrBlueChannels = [
        blueObj.max51,
        blueObj.max102,
        blueObj.max153,
        blueObj.max204,
        blueObj.max255
    ];


    let arrGreenChannels = [
        greenObj.max51,
        greenObj.max102,
        greenObj.max153,
        greenObj.max204,
        greenObj.max255
    ];


    new Chart(chartCtx, {
        type: 'bar',
        data: {
        labels: ["0-50","51-101","102-152","153-203","204-255"],
        datasets: [{
            label: 'Red',
            data: arrRedChannels,
            borderWidth: 2,
            borderColor: 'rgb(255, 0, 0)',
            tension: 0.5
            },
            { 
                label: 'Blue',
                data: arrBlueChannels,
                borderWidth: 2,
                borderColor: 'rgb(54, 162, 255)',
                tension: 0.5,
            },
            { 
                label: 'Green',
                data: arrGreenChannels,
                borderWidth: 2,
                borderColor: 'rgb(54, 255, 100)',
                tension: 0.5,
            }
            ]
        },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });



    new Chart(chartLineCtx, {
        type: 'line',
        data: {
        labels: ["0-50","51-101","102-152","153-203","204-255"],
        datasets: [
            {
            fill: true,
            label: 'Red',
            data: arrRedChannels,
            borderWidth: 2,
            borderColor: 'rgb(255, 0, 0)',
            backgroundColor: 'rgba(255, 0, 0,0.6)',
            tension: 0.5
            },
            { 
                fill: true,
                label: 'Blue',
                data: arrBlueChannels,
                borderWidth: 2,
                borderColor: 'rgb(54, 162, 255)',
                backgroundColor: 'rgba(54, 162, 255,0.6)',
                tension: 0.5,
            },
            { 
                fill: true,
                label: 'Green',
                data: arrGreenChannels,
                borderWidth: 2,
                borderColor: 'rgb(54, 255, 100)',
                backgroundColor: 'rgba(54, 255, 100,0.6)',
                tension: 0.5,
            }
            ]
        },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });



};

    



    
    
    </script>
</html>