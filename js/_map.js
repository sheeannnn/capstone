$(document).ready(function(){

 	L.mapquest.key = 'key';

    var map = L.mapquest.map('map', {
    	center: [37.7749, -122.4194],
        layers: L.mapquest.tileLayer('map'),
        zoom: 12
    });

     map.addControl(L.mapquest.control());

});


// function activateSensor1(){
// 	7.085975, 125.572227
// }

// function activateSensor2(){
// 7.065522, 125.571767
// }

// $.ajax({
// 	url: 'js/_dataAlert.js',
// 	dataType: 'script',
// 	success: 'success'
// });