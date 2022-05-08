


    let thirdChart = new Chart(chartCtxEdited, {
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
    
     fourthChart = new Chart(chartLineCtxEdited, {
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



FreshData = {
    newDataRefresh: function() {
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
        try {
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
        }
    }
}


