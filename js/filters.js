function backToOriginal(imgData,originalData,dataStack,changesCounter) {
    imgData = ctx.getImageData(0, 0, 500, 700);
    mojArr = pretvorba(imgData);
    console.log(imgData);
    for (let i = 0; i < imgData.data.length; i +=4) {
        imgData.data[i] = originalData.data[i];
        imgData.data[i+1] = originalData.data[i+1];
        imgData.data[i+2] = originalData.data[i+2];
        imgData.data[i+3] = 255;
         
    }
    changesCounter++;
    dataStack.push(imgData);
    ctx.putImageData(imgData, 0, 0);

    redObj = retrieveAllChannelData.getRedChannel(imgData); //GET DATA FOR HISTOGRAM
    blueObj = retrieveAllChannelData.getBlueChannel(imgData); //GET DATA FOR HISTOGRAM
    greenObj = retrieveAllChannelData.getGreenChannel(imgData); //GET DATA FOR HISTOGRAM



    FreshData.newDataRefresh();  //function in an object that gets all new data to draw graph

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

    /* probamo ss objektam nardt
    redObj = retrieveAllChannelData.getRedChannel(imgData); //GET DATA FOR HISTOGRAM
    blueObj = retrieveAllChannelData.getBlueChannel(imgData); //GET DATA FOR HISTOGRAM
    greenObj = retrieveAllChannelData.getGreenChannel(imgData); //GET DATA FOR HISTOGRAM


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
    console.log("Firstchart");
   // console.log(firstChart.config.data.datasets[0].data);
    /*firstChart.config.data.datasets[0].data = arrRedChannels;
    firstChart.config.data.datasets[1].data = arrBlueChannels;
    firstChart.config.data.datasets[2].data = arrGreenChannels; */
    /*try {
        console.log("Destroyamo nove grafe:");
        console.log(arrRedChannels);
        let tmpConfig3 = thirdChart.config;
        tmpConfig3.data.datasets[0].data = arrRedChannels;
        tmpConfig3.data.datasets[1].data = arrBlueChannels;
        tmpConfig3.data.datasets[2].data = arrGreenChannels;
        thirdChart.destroy();
        thirdChart = new Chart(chartCtxEdited,tmpConfig3);
        
        let tmpConfig4 = fourthChart.config;
        tmpConfig4.data.datasets[0].data = arrRedChannels;
        tmpConfig4.data.datasets[1].data = arrBlueChannels;
        tmpConfig4.data.datasets[2].data = arrGreenChannels;
        fourthChart.destroy();
        fourthChart = new Chart(chartLineCtxEdited,tmpConfig4);
        
        
    } catch(error) {
        console.log(error);
    } */

    FreshData.newDataRefresh();
    
    

}


function secondFunc() {
    
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

        FreshData.newDataRefresh();
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

    FreshData.newDataRefresh();

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

    FreshData.newDataRefresh();

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
    firstChart.destroy();

    FreshData.newDataRefresh();

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

    FreshData.newDataRefresh();
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

    FreshData.newDataRefresh();
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

    FreshData.newDataRefresh();
}


function unDoChanges(imgData,dataStack,changesCounter) {
    /*
    let disableButton = document.getElementById("undo");
    if (disableButton.disabled === false) {
        disableButton.disabled = true;
    } */

    if (dataStack.length < 1)  return;

    if(dataStack.length < 2) {
        for (let i = 0; i < imgData.data.length; i +=4) {
        

            imgData.data[i] = dataStack[length-1].data[i];  
            imgData.data[i+1] = dataStack[length-1].data[i+1];
            imgData.data[i+2] = dataStack[length-1].data[i+2];
        }
    } else {

    
        
    



    console.log(dataStack[0].data[1000]);
    let length = dataStack.length;
    
    for (let i = 0; i < imgData.data.length; i +=4) {
        

        imgData.data[i] = dataStack[length-2].data[i];  
        imgData.data[i+1] = dataStack[length-2].data[i+1];
        imgData.data[i+2] = dataStack[length-2].data[i+2];
    } 

    }   
    ctx.putImageData(imgData, 0, 0);
    dataStack.pop();
    changesCounter--;
    

    FreshData.newDataRefresh();
        //disableButton.disabled = !disableButton.disabled;
    
}


