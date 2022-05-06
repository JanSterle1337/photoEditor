<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/photoEditor.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>PHOTO EDITOR</title>
    
</head>
<body>
        <div class="editor-wrapper">
            <div class="edited-photos-wrapper">
                <img id="scream" src="./assets/tom-jerry.jpg" alt="The Scream" width="500" height="700">
                <canvas id="myCanvas" width="500" height="700" style="border:1px solid #d3d3d3;"></canvas>
            </div>
            
            <div class="options">
                <button onclick="changeFilters()">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M0 168v-16c0-13.255 10.745-24 24-24h360V80c0-21.367 25.899-32.042 40.971-16.971l80 80c9.372 9.373 9.372 24.569 0 33.941l-80 80C409.956 271.982 384 261.456 384 240v-48H24c-13.255 0-24-10.745-24-24zm488 152H128v-48c0-21.314-25.862-32.08-40.971-16.971l-80 80c-9.372 9.373-9.372 24.569 0 33.941l80 80C102.057 463.997 128 453.437 128 432v-48h360c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24z"></path></svg>
                </button>
                <button onclick="backToOriginal(imgData,originalData,dataStack,changesCounter)">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M18.537 19.567A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10c0 2.136-.67 4.116-1.81 5.74L17 12h3a8 8 0 1 0-2.46 5.772l.997 1.795z"></path></g></svg>
                </button>
                <button onclick="razlika(mojArr,imgData,dataStack,changesCounter)" class="simpleFilters">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm192 472c0 4.4-3.6 8-8 8H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h368c4.4 0 8 3.6 8 8v48z"></path></svg>
                </button>
                <button onclick="brighten(imgData,originalData,dataStack,changesCounter)" class="simpleFilters">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 11a3 3 0 100-6 3 3 0 000 6zm0 1a4 4 0 100-8 4 4 0 000 8zM8 0a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 0zm0 13a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 13zm8-5a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2a.5.5 0 01.5.5zM3 8a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2A.5.5 0 013 8zm10.657-5.657a.5.5 0 010 .707l-1.414 1.415a.5.5 0 11-.707-.708l1.414-1.414a.5.5 0 01.707 0zm-9.193 9.193a.5.5 0 010 .707L3.05 13.657a.5.5 0 01-.707-.707l1.414-1.414a.5.5 0 01.707 0zm9.193 2.121a.5.5 0 01-.707 0l-1.414-1.414a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .707zM4.464 4.465a.5.5 0 01-.707 0L2.343 3.05a.5.5 0 11.707-.707l1.414 1.414a.5.5 0 010 .708z" clip-rule="evenodd"></path></svg>
                </button>
                <button onclick="darken(imgData,originalData,dataStack,changesCounter)" class="simpleFilters">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 11a3 3 0 100-6 3 3 0 000 6zm0 1a4 4 0 100-8 4 4 0 000 8z" clip-rule="evenodd"></path><circle cx="8" cy="2.5" r=".5"></circle><circle cx="8" cy="13.5" r=".5"></circle><circle cx="13.5" cy="8" r=".5" transform="rotate(90 13.5 8)"></circle><circle cx="2.5" cy="8" r=".5" transform="rotate(90 2.5 8)"></circle><circle cx="11.889" cy="4.111" r=".5" transform="rotate(45 11.89 4.11)"></circle><circle cx="4.111" cy="11.889" r=".5" transform="rotate(45 4.11 11.89)"></circle><circle cx="11.889" cy="11.889" r=".5" transform="rotate(135 11.89 11.889)"></circle><circle cx="4.111" cy="4.111" r=".5" transform="rotate(135 4.11 4.11)"></circle></svg>
                </button>
                <button onclick="grayscale(imgData,dataStack,changesCounter)" class="simpleFilters" id="grayscale">
                    <svg stroke="currentColor" fill="darkgray" stroke-width="0" viewBox="0 0 512 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M136.5 77.7l37 67L32 285.7 216.4 464l152.4-148.6 54.4-11.4L166.4 48l-29.9 29.7zm184 208H114.9l102.8-102.3 102.8 102.3zM423.3 304s-56.7 61.5-56.7 92.1c0 30.7 25.4 55.5 56.7 55.5 31.3 0 56.7-24.9 56.7-55.5S423.3 304 423.3 304z"></path></svg>
                <div class="gray-circle"></div>
                </button>
                <button onclick="thresholding(imgData,dataStack,changesCounter)" class="simpleFilters">
                    <img src="./assets/blacknwhite.PNG" class="photo-as-logo"/>
                </button>
                <button onclick="moreRed(imgData,dataStack,changesCounter)" class="simpleFilters">
                    <svg stroke="currentColor" fill="red" stroke-width="0" viewBox="0 0 512 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M136.5 77.7l37 67L32 285.7 216.4 464l152.4-148.6 54.4-11.4L166.4 48l-29.9 29.7zm184 208H114.9l102.8-102.3 102.8 102.3zM423.3 304s-56.7 61.5-56.7 92.1c0 30.7 25.4 55.5 56.7 55.5 31.3 0 56.7-24.9 56.7-55.5S423.3 304 423.3 304z"></path></svg>
                </button>
                <button onclick="moreGreen(imgData,dataStack,changesCounter)" class="simpleFilters">
                <svg stroke="currentColor" fill="lightgreen" stroke-width="0" viewBox="0 0 512 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M136.5 77.7l37 67L32 285.7 216.4 464l152.4-148.6 54.4-11.4L166.4 48l-29.9 29.7zm184 208H114.9l102.8-102.3 102.8 102.3zM423.3 304s-56.7 61.5-56.7 92.1c0 30.7 25.4 55.5 56.7 55.5 31.3 0 56.7-24.9 56.7-55.5S423.3 304 423.3 304z"></path></svg>
                </button> 
                <button onclick="moreBlue(imgData,dataStack,changesCounter)" class="simpleFilters">
                <svg stroke="currentColor" fill="lightblue" stroke-width="0" viewBox="0 0 512 512" height="3em" width="3em" xmlns="http://www.w3.org/2000/svg"><path d="M136.5 77.7l37 67L32 285.7 216.4 464l152.4-148.6 54.4-11.4L166.4 48l-29.9 29.7zm184 208H114.9l102.8-102.3 102.8 102.3zM423.3 304s-56.7 61.5-56.7 92.1c0 30.7 25.4 55.5 56.7 55.5 31.3 0 56.7-24.9 56.7-55.5S423.3 304 423.3 304z"></path></svg>
                </button> 
                <button onclick="unDoChanges(imgData,dataStack,changesCounter)" id="undo">Undo</button>
                
                <button onclick="boxFilter(imgData,mojArr)" class="complexFilters">box filter</button>
                <button  class="complexFilters">box filterrff</button>
            </div>

            <div style="display: flex; width: 500px; height: 500epx;">
                <canvas id="myChart" width="200" height="200"></canvas>
            </div>

            <div style="display: flex; width: 500px; height: 500px;">
                <canvas id="myChartLine" width="200" height="200"></canvas>
            </div>
        </div>

        <script src="./js/main.js"></script>
        <script src="./js/filters.js"></script>
        <script src="./js/advancedFilters.js"></script>
</body>
<script>
    /*
        let img = document.getElementById('scream');
        let img2 = document.getElementById('scream2');
        let canvas = document.getElementById('myCanvas');
        let ctx = canvas.getContext('2d'); */


        
       

       


/*
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

    

/*
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

*/
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
/*
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
 */
    



    
    
    </script>
</html>