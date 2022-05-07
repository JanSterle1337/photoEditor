function backToOriginal(imgData,originalData,dataStack,changesCounter) {
    for (let i = 0; i < imgData.data.length; i +=4) {
        imgData.data[i] = originalData.data[i];
        imgData.data[i+1] = originalData.data[i+1];
        imgData.data[i+2] = originalData.data[i+2];
        imgData.data[i+3] = 255;
         
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);
}



function razlika(mojArr,imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    console.log(imgData);
    
    for (let i = 0; i < imgData.data.length; i +=4) {
        imgData.data[i] = 255 - imgData.data[i];
        imgData.data[i+1] = 255 - imgData.data[i+1];
        imgData.data[i+2] = 255 - imgData.data[i+2];
        imgData.data[i+3] = 255;
         
    }
    changesCounter++;
    dataStack.push(imgData);
    mojArr = pretvorba(imgData);
    ctx.putImageData(imgData, 0, 0);
}


function brighten(imgData,originalData,dataStack,changesCounter) {
    
        imgData = ctx.getImageData(0, 0, 500, 700);
        mojArr = pretvorba(imgData);
        let brightness = 1.3;
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
        changesCounter++;
        console.log("Znotrej funkcije brightening: " +  imgData);
        dataStack.push(imgData);
        ctx.putImageData(imgData, 0, 0);
        imgData.data = originalData.data;
}


function darken(imgData,originalData,dataStack,changesCounter) {
    
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);  
    let brightness = 0.7;
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
    changesCounter++;
    dataStack.push(imgData);
    console.log("Znotrej funkcije brightening: " +  imgData);
    ctx.putImageData(imgData, 0, 0);
    imgData.data = originalData.data;
}


function grayscale(imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    for (let i = 0; i < imgData.data.length; i +=4) {
    let avg = imgData.data[i] + imgData.data[i+1] + imgData.data[i+2];
    imgData.data[i] = avg / 3;
    imgData.data[i+1] = avg / 3;
    imgData.data[i+2] = avg / 3;
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);

}


function moreRed(imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    for (let i = 0; i < imgData.data.length; i +=4) {
        if (imgData.data[i] + 30 >= 255) {
            imgData.data[i] = 255;
        } else {
            imgData.data[i] = imgData.data[i] + 30;
        }
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);
}



function moreGreen(imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    for (let i = 0; i < imgData.data.length; i +=4) {
        if (imgData.data[i+1] + 30 >= 255) {
            imgData.data[i+1] = 255;
        } else {
            imgData.data[i+1] = imgData.data[i+1] + 30;
        }
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);
}


function moreBlue(imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    for (let i = 0; i < imgData.data.length; i +=4) {
        if (imgData.data[i+2] + 30 >= 255) {
            imgData.data[i+2] = 255;
        } else {
            imgData.data[i+2] = imgData.data[i+2] + 30;
        }
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);
}



function thresholding(imgData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
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
    dataStack.push(imgData);
    changesCounter++;
    console.log("DATASTACK:");
    console.log(dataStack);
    console.log(dataStack[changesCounter-1].data[2]);
    ctx.putImageData(imgData, 0, 0);
}


function unDoChanges(imgData,dataStack,changesCounter) {
    /*
    let disableButton = document.getElementById("undo");
    if (disableButton.disabled === false) {
        disableButton.disabled = true;
    } */

    if (dataStack.length < 2) return; 



    console.log(dataStack[0].data[1000]);
    let length = dataStack.length;
    
    for (let i = 0; i < imgData.data.length; i +=4) {
        

        imgData.data[i] = dataStack[length-2].data[i];  
        imgData.data[i+1] = dataStack[length-2].data[i+1];
        imgData.data[i+2] = dataStack[length-2].data[i+2];
    } 
    ctx.putImageData(imgData, 0, 0);
    dataStack.pop();
    changesCounter--;
    
        //disableButton.disabled = !disableButton.disabled;
    
}


