let img = document.getElementById('scream');
console.log(img);
var imgData = 0;
var originalData = 0;
var ctx = null;
var canvas = null;

var dataStack = [];
var changesCounter = 0;
var mojArr = [];


let chartCanvas = document.getElementById('myChart');  //REFERENCE FOR FIRST GRAPH
let chartCtx = chartCanvas.getContext('2d');

let chartLineCanvas = document.getElementById('myChartLine'); //REFERENCE FOR SECOND GRAPH
let chartLineCtx = chartLineCanvas.getContext('2d');

let chartCanvasEdited = document.getElementById('myChartEdited'); //REFERENCE FOR THIRD GRAPH
let chartCtxEdited = chartCanvasEdited.getContext('2d');

let chartLineCanvasEdited = document.getElementById('myChartLineEdited'); //REFERENCE FOR FOURTH GRAPH
let chartLineCtxEdited = chartLineCanvasEdited.getContext('2d');


let arrRedChannels = [];
let arrBlueChannels = [];
let arrGreenChannels = [];
let firstChart;
let secondChart;
let retrieveAllChannelData;

let redrawScene;


img.onload = function () {


        
    canvas = document.getElementById('myCanvas');
    ctx = canvas.getContext('2d');
    ctx.drawImage(img,0,0,500,700);
    originalData = ctx.getImageData(0,0,500,700);
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);

    changesCounter++;
    dataStack.push(imgData);

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
    /*
    function redChannel(imgData) {
   
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        console.log("rdeci kanal");
        console.log(imgData);
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
    } */

    //PROBAVAM TE OBJECTE

retrieveAllChannelData = new retrieveChannelData(imgData);
console.log("Probavam objecte");
console.log(retrieveAllChannelData.getBlueChannel(imgData));



function retrieveChannelData(imgData) {
    this.getRedChannel = function redChannel(imgData) {
   
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        console.log("rdeci kanal");
        imgData = ctx.getImageData(0, 0, 500, 700);
        console.log(imgData);
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
    
    
   this.getBlueChannel = function blueChannel(imgData) {
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        imgData = ctx.getImageData(0, 0, 500, 700);
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
    
    this.getGreenChannel = function greenChannel(imgData) {
        imgData = ctx.getImageData(0, 0, 500, 700);
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
}


    //PROBAVAM TE OBJECTE|||||





    
    
    redObj = retrieveAllChannelData.getRedChannel(imgData);
    blueObj = retrieveAllChannelData.getBlueChannel(imgData);
    greenObj = retrieveAllChannelData.getGreenChannel(imgData);
    console.log("Red object: ");
    console.log(redObj);
    console.log("Blue object: ");
    console.log(blueObj);
    console.log("Green object: ");
    console.log(greenObj);
    arrRedChannels = [
        redObj.max51,
        redObj.max102,
        redObj.max153,
        redObj.max204,
        redObj.max255
    ];
    arrBlueChannels = [
        blueObj.max51,
        blueObj.max102,
        blueObj.max153,
        blueObj.max204,
        blueObj.max255
    ];
    
    
    arrGreenChannels = [
        greenObj.max51,
        greenObj.max102,
        greenObj.max153,
        greenObj.max204,
        greenObj.max255
    ];

   
        firstChart = new Chart(chartCtx, {
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
        
        
        secondChart = new Chart(chartLineCtx, {
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
    
    
    
    

}



function changeFilters() {
    
    console.log("changefilters");
    let simpleFilters = document.getElementsByClassName('simpleFilters');
    let complexFilters = document.getElementsByClassName('complexFilters');
    console.log("complexFilters");
    //console.log(simpleFilters[0].style.display);
    if (simpleFilters[0].style.display == "" || simpleFilters[0].style.display == "inline-block") {
        console.log("Gremo v if blok1");
        for (let i = 0; i < simpleFilters.length; i++) {
            simpleFilters[i].style.display = "none";
        }
        for (let i = 0; i < complexFilters.length; i++) {
            complexFilters[i].style.display = "inline-block";
        }
    } else if (simpleFilters[0].style.display == "none") {
        for (let i = 0; i < simpleFilters.length; i++) {
            simpleFilters[i].style.display = "inline-block";
        }
        for (let i = 0; i < complexFilters.length; i++) {
            complexFilters[i].style.display = "none";
        }
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


/*
retrieveAllChannelData = new retrieveChannelData(imgData);
console.log("Probavam objecte");
console.log(retrieveAllChannelData.getBlueChannel(imgData));



function retrieveChannelData(imgData) {
    this.getRedChannel = function redChannel(imgData) {
   
        let arrKosi = {
            max51: 0,
            max102: 0,
            max153: 0,
            max204: 0,
            max255: 0
        };
        console.log("rdeci kanal");
        console.log(imgData);
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
    
    
   this.getBlueChannel = function blueChannel(imgData) {
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
    
    this.getGreenChannel = function greenChannel(imgData) {
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
}
*/