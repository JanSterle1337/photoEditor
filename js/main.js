let img = document.getElementById('scream');
console.log(img);
var imgData = 0;
var originalData = 0;
var ctx = null;
var canvas = null;

var dataStack = [];
var changesCounter = 0;

img.onload = function () {


        
    canvas = document.getElementById('myCanvas');
    ctx = canvas.getContext('2d');
    ctx.drawImage(img,0,0,500,700);
    originalData = ctx.getImageData(0,0,500,700);
    imgData = ctx.getImageData(0, 0, 500, 700);
}



function changeFilters() {
    console.log("changefilters");
    let simpleFilters = document.getElementsByClassName('simpleFilters');
    
    console.log(simpleFilters[0].style.display);
    if (simpleFilters[0].style.display == "" || simpleFilters[0].style.display == "inline-block") {
        console.log("Gremo v if blok1");
        for (let i = 0; i < simpleFilters.length; i++) {
            simpleFilters[i].style.display = "none";
        }
    } else if (simpleFilters[0].style.display == "none") {
        for (let i = 0; i < simpleFilters.length; i++) {
            simpleFilters[i].style.display = "inline-block";
        }
    }
}