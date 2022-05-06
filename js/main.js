let img = document.getElementById('scream');
console.log(img);
var imgData = 0;
var originalData = 0;
var ctx = null;
var canvas = null;

var dataStack = [];
var changesCounter = 0;
var mojArr = [];

img.onload = function () {


        
    canvas = document.getElementById('myCanvas');
    ctx = canvas.getContext('2d');
    ctx.drawImage(img,0,0,500,700);
    originalData = ctx.getImageData(0,0,500,700);
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);

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

