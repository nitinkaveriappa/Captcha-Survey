// Accelerometer
var ax = 0;
var ay = 0;
var az = 0;
var ai = 0;
var arAlpha = 0;
var arBeta = 0;
var arGamma = 0;
//Gyroscope
var alpha = 0;
var beta = 0;
var gamma = 0;

var counter = 0;
var delay = 250;

if (window.DeviceMotionEvent==undefined) {
	document.getElementById("yes").style.display="none";
}
else {
	window.ondevicemotion = function(event) {
		ax = Math.round(event.accelerationIncludingGravity.x * 1);
		ay = Math.round(event.accelerationIncludingGravity.y * 1);
		az = Math.round(event.accelerationIncludingGravity.z * 1);
		ai = Math.round(event.interval * 100) / 100;
		rR = event.rotationRate;
		if (rR != null) {
			arAlpha = Math.round(rR.alpha);
			arBeta = Math.round(rR.beta);
			arGamma = Math.round(rR.gamma);
		}
	}

	window.ondeviceorientation = function(event) {
		alpha = Math.round(event.alpha);
		beta = Math.round(event.beta);
		gamma = Math.round(event.gamma);
	}


var intervalId = setInterval(function() {

		document.getElementById("xlabel").innerHTML = "X: " + ax;
		document.getElementById("ylabel").innerHTML = "Y: " + ay;
		document.getElementById("zlabel").innerHTML = "Z: " + az;
		document.getElementById("ilabel").innerHTML = "I: " + ai;
		document.getElementById("arAlphalabel").innerHTML = "arA: " + arAlpha;
		document.getElementById("arBetalabel").innerHTML = "arB: " + arBeta;
		document.getElementById("arGammalabel").innerHTML = "arG: " + arGamma;

		document.getElementById("alphalabel").innerHTML = "Alpha: " + alpha;
		document.getElementById("betalabel").innerHTML = "Beta: " + beta;
		document.getElementById("gammalabel").innerHTML = "Gamma: " + gamma;

		
		var d = new Date();
		var n = d.getTime();

		var obj = ax+','+ay+','+az+','+ai+','+arAlpha+','+arBeta+','+arGamma+','+alpha+','+beta+','+gamma+','+n;
		var data ="data="+obj;
		sendData(data);

	}, delay);

}

function sendData(data) {
	counter++;
		if(counter < 480)
		{
			$.ajax({
			url: 'survey_data.php',
			data: data,
			type: 'POST',
			dataType: 'text',
			success: function(){ },
			error: function() {}
		});
		}
}
