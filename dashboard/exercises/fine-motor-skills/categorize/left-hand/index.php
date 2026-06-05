<?php include '../../../exercises-head.php';?>
	

<link rel="stylesheet" href="dim-custom.css">

       <script type="module">
	
var c = document.getElementById("videoCanvas");
var ctx = c.getContext("2d");

var counterTetr = 0;		   
var tetrDipsifio = 0; // ginetai 35 otan to counter sta tetragona ginetai dipsifio
var counterKikl = 0;		   
var kiklDipsifio = 0; // ginetai 35 otan to counter stous kiklous ginetai dipsifio
var counterTria = 0;		   
var triaDipsifio = 0; // ginetai 35 otan to counter sta trigona ginetai dipsifio
		   
var goalShapeX = 480;
var goalShapeY = 540;
		
function randomInt() {
return Math.round(Math.random() * 2);
}

var chooseShape = randomInt();
		   
   function paintShapes(gX, gY, rS, cTetr, tetrD, cKikl, kiklD, cTria, triaD) {
	   
if (rS == 0) {
ctx.beginPath();	
ctx.rect(gX - 100, gY - 100, 200, 200);
ctx.lineWidth = 10;
ctx.fillStyle = "#0f0";
ctx.globalAlpha = 0.5;
ctx.fill();
ctx.closePath();	
} else if (rS == 1) {
	ctx.beginPath();
ctx.arc(gX, gY, 100, 0, 2 * Math.PI);
ctx.lineWidth = 10;
ctx.fillStyle = "#f00";
ctx.globalAlpha = 0.5;
ctx.fill();
		ctx.closePath();
} else if (rS == 2) {
 ctx.beginPath();
    ctx.moveTo(gX, gY + 100);
    ctx.lineTo(gX + 100, gY + 100);
	ctx.lineTo(gX, gY - 100);
	ctx.lineTo(gX - 100, gY + 100);
	ctx.lineTo(gX, gY + 100);
    ctx.lineWidth = 10;
ctx.fillStyle = "#00f";
ctx.globalAlpha = 0.5;
ctx.fill();
ctx.closePath();	
}
		
	   // goal 1
	   
ctx.beginPath();	
ctx.rect(1130, 45, 300, 300);
ctx.lineWidth = 10;
ctx.strokeStyle = "#000";
ctx.globalAlpha = 1;
ctx.stroke();
ctx.closePath();
	   
ctx.beginPath();	
ctx.rect(1575, 95, 200, 200);
ctx.lineWidth = 10;
ctx.fillStyle = "#0f0";
ctx.globalAlpha = 1;
ctx.fill();
ctx.closePath();
	   
	   ctx.beginPath();
ctx.fillStyle = "#000";
ctx.globalAlpha = 1;
ctx.font = "100px Arial";
ctx.fillText(cTetr, 1650 - tetrD, 225);
		ctx.closePath();
	   
	   // goal 2
	   
ctx.beginPath();	
ctx.rect(1130, 390, 300, 300);
ctx.lineWidth = 10;
ctx.strokeStyle = "#000";
ctx.globalAlpha = 1;
ctx.stroke();
ctx.closePath();
	   
ctx.beginPath();
ctx.arc(1675, 540, 100, 0, 2 * Math.PI);
ctx.lineWidth = 10;
ctx.fillStyle = "#f00";
ctx.globalAlpha = 1;
ctx.fill();
		ctx.closePath();
	   
  ctx.beginPath();
ctx.fillStyle = "#000";
ctx.globalAlpha = 1;
ctx.font = "100px Arial";
ctx.fillText(cKikl, 1650 - kiklD, 570);
		ctx.closePath();
	   
	   // goal 3
	   
ctx.beginPath();	
ctx.rect(1130, 735, 300, 300);
ctx.lineWidth = 10;
ctx.strokeStyle = "#000";
ctx.globalAlpha = 1;
ctx.stroke();
ctx.closePath();
	   
 ctx.beginPath();
    ctx.moveTo(1675, 985);
    ctx.lineTo(1775, 985);
	ctx.lineTo(1675, 785);
	ctx.lineTo(1575, 985);
	ctx.lineTo(1675, 985);
    ctx.lineWidth = 10;
ctx.fillStyle = "#00f";
ctx.globalAlpha = 1;
ctx.fill();
ctx.closePath();
	   
  ctx.beginPath();
ctx.fillStyle = "#000";
ctx.globalAlpha = 1;
ctx.font = "100px Arial";
ctx.fillText(cTria, 1650 - triaD, 955);
		ctx.closePath();

   }
		   
   paintShapes(goalShapeX, goalShapeY, chooseShape, counterTetr, tetrDipsifio, counterKikl, kiklDipsifio, counterTria, triaDipsifio);	   
		   

		   

		   
/* timer START */

var exerStarted = 0;
var timerStarted = false;
var seconds = 60;
var score = 0;
	
var countdown = setInterval(function() {
	if (timerStarted == true) {
  if (seconds <= 0) {
	   clearInterval(countdown);
	  localStorage.setItem("categorizeLeftScore", score);
	    exerStarted = 0;
  document.getElementById("timeLeft").innerHTML = "00:00";
	  
	  		        Swal.fire({
title: 'The time is up! \n Your score is: ' + score,
showDenyButton: true,
showCancelButton: true,
  confirmButtonText: `Play Again`,
  denyButtonText: `Go Back`,
  cancelButtonText: `Save Score`,
}).then((result) => {
  if (result.isConfirmed) {
   location.reload()
  } else if (result.isDenied) {
   window.location.href = "../index.php";
  } else {
window.location.href = "save-score.php";
  }
});
  } else if (seconds < 10) {
	   document.getElementById("timeLeft").innerHTML = "00:0" + seconds;
  } else if (seconds < 60) {
	  	   document.getElementById("timeLeft").innerHTML = "00:" + seconds;
  } else {
	    document.getElementById("timeLeft").innerHTML = "01:00";
  }
	 seconds--;
}
}, 1000);
		   
/* timer END */	   

/*dim custom code 1 start*/
		   
var grabbing = false;
var hasLetGo = true;

		   
		   document.getElementById("startButton").addEventListener("click", startExercise);
		   
		   function startExercise() {
exerStarted = 1;
			   document.getElementById("introMessage").style.display = "none";
			   
			   document.getElementById("quitButton").style.display = "block";
		
		
			    timerStarted = true;
			   countdown;
		   }
		   
		   
		     document.getElementById("quitButton").addEventListener("click", quitExercise);
		   
		   function quitExercise() {
			exerStarted = 0;
			 clearInterval(countdown);

			   		        Swal.fire({
title: 'Excersice was stopped.',
showDenyButton: true,
showCancelButton: false,
  confirmButtonText: `Play Again`,
  denyButtonText: `Go Back`,
  cancelButtonText: `Save Score`,
}).then((result) => {
  if (result.isConfirmed) {
   location.reload()
  } else if (result.isDenied) {
   window.location.href = "../index.php";
  } else {
 location.reload()
  }
});
		   }
		   
		   
		   
		   
		

 /*dim custom code 1 end*/
 
const videoElement = document.getElementsByClassName('input_video')[0];
const canvasElement = document.getElementsByClassName('output_canvas')[0];
const canvasCtx = canvasElement.getContext('2d');

function onResults(results) {
  canvasCtx.save();
  canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
	
  canvasCtx.drawImage(
      results.image, 0, 0, canvasElement.width, canvasElement.height);	
	
  if (results.multiHandLandmarks) {
    for (const landmarks of results.multiHandLandmarks) {
      drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS,
                     {color: '#000000', lineWidth: 1});
      drawLandmarks(canvasCtx, landmarks, {color: '#000000', lineWidth: 1});
    

/*dim custom code 2 start*/
		
		

		const hand = results.multiHandLandmarks[0];
    
  const xAntiheiras = hand[4].x; 
  const yAntiheiras = hand[4].y;
  const zAntiheiras = hand[4].z;
  
  const xDiktis = hand[8].x; 
  const yDiktis = hand[8].y;
  const zDiktis = hand[8].z;
  
  const xMesos = hand[12].x; 
  const yMesos = hand[12].y;
  const zMesos = hand[12].z;
  
   var difxAntiheirasDiktis = xAntiheiras - xDiktis;
  var difyAntiheirasDiktis = yAntiheiras - yDiktis;
   var difxAntiheirasMesos = xAntiheiras - xMesos;
  var difyAntiheirasMesos = yAntiheiras - yMesos;
  
  var difAntiheirasDiktis = Math.sqrt(difxAntiheirasDiktis * difxAntiheirasDiktis + difyAntiheirasDiktis * difyAntiheirasDiktis);
   var difAntiheirasMesos = Math.sqrt(difxAntiheirasMesos * difxAntiheirasMesos + difyAntiheirasMesos * difyAntiheirasMesos);
		
		
		var thesiAntiheiraX = xAntiheiras * 1920;
		var thesiAntiheiraY = yAntiheiras * 1080;
		thesiAntiheiraX = -1 * (thesiAntiheiraX - 1920);
		
			if (exerStarted > 0) {
				
	 if (difAntiheirasDiktis < 0.05 && difAntiheirasMesos < 0.05 && thesiAntiheiraX > goalShapeX - 100 && thesiAntiheiraX < goalShapeX + 100 && thesiAntiheiraY > goalShapeY - 100 && thesiAntiheiraY < goalShapeY + 100 && grabbing == false) {
			
			hasLetGo = false; 

				 drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#00ff00', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#00ff00', lineWidth: 1});
			
        goalShapeX = thesiAntiheiraX;
		goalShapeY = thesiAntiheiraY;
		
		} else if (difAntiheirasDiktis < 0.05 && difAntiheirasMesos < 0.05) {
				  drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#ffffff', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#ffffff', lineWidth: 1});	
				grabbing = true;
			hasLetGo = false;
			} else {
			grabbing = false;
		  hasLetGo = true;			
	}
				
						/*clearing anything drawn on canvas */
    ctx.clearRect(0, 0, 1920, 1080);
  
  	//Drawing rectangle at new position
  paintShapes(goalShapeX, goalShapeY, chooseShape, counterTetr, tetrDipsifio, counterKikl, kiklDipsifio, counterTria, triaDipsifio);
				
				if (chooseShape == 0 && goalShapeX > 1170 && goalShapeX < 1330 && goalShapeY > 115 && goalShapeY < 275) {
			if (hasLetGo == true) {
				counterTetr++;
				score++;
				
				if (counterTetr > 9) {
					tetrDipsifio = 35;
				}
				
goalShapeX = 480;
goalShapeY = 540;
chooseShape = randomInt();
			} 
		} else if (chooseShape == 1 && goalShapeX > 1170 && goalShapeX < 1330 && goalShapeY > 460 && goalShapeY < 620) {
			if (hasLetGo == true) {
				counterKikl++;
				score++;
				
				if (counterKikl > 9) {
					kiklDipsifio = 35;
				}
				
goalShapeX = 480;
goalShapeY = 540;
chooseShape = randomInt();
			} 
		} else if (chooseShape == 2 && goalShapeX > 1170 && goalShapeX < 1330 && goalShapeY > 805 && goalShapeY < 965) {
			if (hasLetGo == true) {
				counterTria++;
				score++;
				
				if (counterTria > 9) {
					triaDipsifio = 35;
				}
				
goalShapeX = 480;
goalShapeY = 540;
chooseShape = randomInt();
			} 
		} 
				

}
		
 /*dim custom code 2 end*/
 
}
  }
  canvasCtx.restore();
}

const hands = new Hands({locateFile: (file) => {
  return `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`;
}});
hands.setOptions({
	maxNumHands: 1,
	modelComplexity: 0,
  minDetectionConfidence: 0.5,
  minTrackingConfidence: 0.5
});
hands.onResults(onResults);

const camera = new Camera(videoElement, {
  onFrame: async () => {
    await hands.send({image: videoElement});
  },
	  width: 480,
  height: 270
});
camera.start();
		   
		   
		   
		   
		   
		
		   
		   

		   
  </script>

  </head>
  
  <body style="margin: 0px;">
  
    <div class="container" style="position: absolute; left: 0; top: 0; z-index: 9999 !important;">
   <video style="display: none;" class="input_video"></video>
    <canvas class="output_canvas" style="max-width: 100%;
  max-height: 100vh;
  top: 50%;
  position: fixed;
  transform: translate(-50%, -50%) rotateY(180deg);
  left: 50%;" width="1920px" height="1080px"></canvas>
  
	  
	  
	      <canvas id="videoCanvas" style="max-width: 100%;
  max-height: 100vh;
  top: 50%;
  position: fixed;
  transform: translate(-50%, -50%);
  left: 50%;" width="1920px" height="1080px"></canvas>
	  
	  </div>

	   <div id="timeArea">Time: <div id="timeLeft">01:00</div></div>
	  
	  <div id="introMessage">
		  <h1>Are you ready?</h1>
		  <button id="startButton">Start</button>
	  </div>  

		  <button id="quitButton">Quit</button>
	  
	 
	  
  </body>
</html>