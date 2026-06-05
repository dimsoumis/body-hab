<?php include '../../../exercises-head.php';?>
	

<link rel="stylesheet" href="dim-custom.css">

       <script type="module">
		   		// general three.js 
		    import * as THREE from 'https://cdn.skypack.dev/three@0.128.0/build/three.module.js';

		   /* import scene - camera - renderer */

var canvasWidth;
	   	 canvasWidth = 1920;
var canvasHeight;
	 canvasHeight = 1080;

		   if (window.innerWidth < 1920) {
			 canvasWidth  = window.innerWidth;
		   }
		   
		    if (window.innerHeight < 1080) {
			canvasHeight = window.innerHeight;
		   }
		   
var canvasRatio = canvasWidth / canvasHeight;
		   if (canvasRatio > 1.777778) {
			   canvasWidth = canvasHeight * 1.777778;
		   } else if (canvasRatio < 1.777778) {
			   canvasHeight = canvasWidth / 1.777778;
		   }


const scene = new THREE.Scene();
var camera1 = new THREE.PerspectiveCamera( 75, canvasWidth / canvasHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer(  { alpha: true }  );
		   renderer.domElement.id = 'threeJsCanvas';
renderer.setSize( canvasWidth, canvasHeight );
document.body.appendChild( renderer.domElement );
		
			window.onresize = function(){ 
				  
				var canvasWidth2;
	   	 canvasWidth2 = 1920;
var canvasHeight2;
	 canvasHeight2 = 1080;

		   if (window.innerWidth < 1920) {
			 canvasWidth2  = window.innerWidth;
		   }
		   
		    if (window.innerHeight < 1080) {
			canvasHeight2 = window.innerHeight;
		   }
				
				var canvasRatio2 = canvasWidth2 / canvasHeight2;
		   if (canvasRatio2 > 1.777778) {
			   canvasWidth2 = canvasHeight2 * 1.777778;
		   } else if (canvasRatio2 < 1.777778) {
			   canvasHeight2 = canvasWidth2 / 1.777778;
		   }

				camera1.aspect = canvasWidth2 / canvasHeight2;
				    camera1.updateProjectionMatrix();
		renderer.setSize( canvasWidth2, canvasHeight2 );
			
	
		}
	
camera1.position.set(0, 2.5, 5);

		   //add cubes
		   class cubeGenerator {
			constructor(positionX, cubeColor, numberOfCube) {
				this.numberOfCube = numberOfCube;
				this.color = cubeColor;
				this.positionX = positionX;
				this.geometry = new THREE.BoxGeometry( 1.25, 1.25, 0.1 ); 
				this.material = new THREE.MeshBasicMaterial( {color: this.color, opacity: 0.5, transparent: true} ); 
				this.cube = new THREE.Mesh( this.geometry, this.material ); 
				this.cube.name = 'cube' + this.numberOfCube;
			this.cube.position.x = this.positionX;
			this.cube.position.y = 0;
			this.cube.position.z = 0;
			}
			   
			   	addCube() {
		scene.add( this.cube );
	}
		   }
		   
		   var cubes = [];
		   var cubesMoved = [];
		   
for (let i = 0; i < 100; i = i + 3) {	
var xOfCube = 1.5 + (i * 1.9);
cubes[i] = new cubeGenerator(xOfCube, 0xff0000, i);
cubes[i].addCube();
}
		   
for (let i = 1; i < 100; i = i + 3) {	
var xOfCube = 1.5 + (i * 1.9);
cubes[i] = new cubeGenerator(xOfCube, 0x0000ff, i);
cubes[i].addCube();
}
		   
for (let i = 2; i < 100; i = i + 3) {	
var xOfCube = 1.5 + (i * 1.9);
cubes[i] = new cubeGenerator(xOfCube, 0xffff00, i);
cubes[i].addCube();
}
		    
		   //add divider
		   
const dividerGeometry = new THREE.BoxGeometry( 0.2, 2.5, 3 ); 
const dividerMaterial = new THREE.MeshBasicMaterial( {color: 0xA1662F, opacity: 1,  side: THREE.DoubleSide, transparent: true} ); 
const divider = new THREE.Mesh( dividerGeometry,dividerMaterial ); 
		   divider.position.x = 0;
		   divider.position.y = 1.25;
		   divider.position.z = 0;
		  divider.rotation.y = 0;
scene.add( divider );
		   		  			
// Animate
function animate() {
  requestAnimationFrame(animate);
	
	
  renderer.render(scene, camera1);
	
	
}
	
animate(); 
		  	   
		   
/* timer START */

var exerStarted = 0;   
var score = 0;
var timerStarted = false;  
var seconds = 60;
		   
var countdown = setInterval(function() {
	if (timerStarted == true) {
  if (seconds <= 0) {
    clearInterval(countdown);
	    document.getElementById("timeLeft").innerHTML = "00:00";
		localStorage.setItem("bbtRightScore", score);
	  exerStarted = 0;
		
			        Swal.fire({
title: 'Time is out! \n Your score is ' + score,
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
	  
  } else if (seconds >= 60) {
  document.getElementById("timeLeft").innerHTML = "01:0" + (seconds - 60);
  } else if (seconds >= 10 && seconds < 60) {
  document.getElementById("timeLeft").innerHTML = "00:" + seconds;
  } else {
	   document.getElementById("timeLeft").innerHTML = "00:0" + seconds;
  }
	 seconds--;
}
}, 1000);
		   
/* timer END */
		   
/*dim custom code 1 start*/
		   
var leftOfCanvas1 = -6.75;
var rightOfCanvas1 = 6.75;
var bottomOfCanvas1 = -1.3;
var topOfCanvas1 = 6.3;
var leftOfCanvas2 = 1;
var rightOfCanvas2 = 0;
var bottomOfCanvas2 = 1;
var topOfCanvas2 = 0;
var xHeriouOnBoxCanvas;
var yHeriouOnBoxCanvas;	   
var grabbing = false;
		   
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
		
		if (exerStarted > 0) {

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
		
		
		if (xAntiheiras == 0.5) {
xHeriouOnBoxCanvas = 0;
} else if (xAntiheiras < 0.5) {
	xHeriouOnBoxCanvas = 6.75 - ((xAntiheiras * 2) * 6.75);
		   } else if (xAntiheiras > 0.5) {
	xHeriouOnBoxCanvas = -6.75 + (((1 - xAntiheiras) * 2) * 6.75);
		   }
		
				if (yAntiheiras == 0.5) {
yHeriouOnBoxCanvas = 0;
} else if (yAntiheiras < 0.5) {
	yHeriouOnBoxCanvas = 6.3 - ((yAntiheiras * 2) * 3.8);
		   } else if (yAntiheiras > 0.5) {
	yHeriouOnBoxCanvas = -1.3 + (((1 - yAntiheiras) * 2) * 3.8);
		   }
		
		if (difAntiheirasDiktis < 0.05 && difAntiheirasMesos < 0.05) {
			
			if ((xHeriouOnBoxCanvas > (cubes[0].cube.position.x - 0.625) && xHeriouOnBoxCanvas < (cubes[0].cube.position.x + 0.625)
			   && yHeriouOnBoxCanvas > (cubes[0].cube.position.y - 0.625) && yHeriouOnBoxCanvas < (cubes[0].cube.position.y + 0.625)) && grabbing == false && (cubes[1].cube.position.y == 0 && cubes[1].cube.position.x < 3.5 && cubes[1].cube.position.x > 3.3) && (cubes[2].cube.position.y == 0 && cubes[2].cube.position.x < 5.4 && cubes[2].cube.position.x > 5.2) &&
				(((cubes[0].cube.position.y - 0.625) > 2.5) || !(((cubes[0].cube.position.y - 0.625) <= 2.5) && ((cubes[0].cube.position.x - 0.625) <= 0.1) && ((cubes[0].cube.position.x - 0.625) >= -1.35))) &&
			   !(((cubes[0].cube.position.x + 0.625) >= 2.775) && (cubes[0].cube.position.y <= 1.25))) {
				 drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#00ff00', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#00ff00', lineWidth: 1});
				
			
				if (xAntiheiras == 0.5) {
cubes[0].cube.position.x = 0;
} else if (xAntiheiras < 0.5) {
	cubes[0].cube.position.x = 6.75 - ((xAntiheiras * 2) * 6.75);
		   } else if (xAntiheiras > 0.5) {
	cubes[0].cube.position.x = -6.75 + (((1 - xAntiheiras) * 2) * 6.75);
		   }
		
				if (yAntiheiras == 0.5) {
cubes[0].cube.position.y = 0;
} else if (yAntiheiras < 0.5) {
	cubes[0].cube.position.y = 6.3 - ((yAntiheiras * 2) * 3.8);
		   } else if (yAntiheiras > 0.5) {
	cubes[0].cube.position.y = -1.3 + (((1 - yAntiheiras) * 2) * 3.8);
		   }
					
		
	}  else if ((xHeriouOnBoxCanvas > (cubes[1].cube.position.x - 0.625) && xHeriouOnBoxCanvas < (cubes[1].cube.position.x + 0.625)
			   && yHeriouOnBoxCanvas > (cubes[1].cube.position.y - 0.625) && yHeriouOnBoxCanvas < (cubes[1].cube.position.y + 0.625)) && grabbing == false && (cubes[0].cube.position.y == 0 && cubes[0].cube.position.x < 1.6 && cubes[0].cube.position.x > 1.4) && (cubes[2].cube.position.y == 0 && cubes[2].cube.position.x < 5.4 && cubes[2].cube.position.x > 5.2) &&
				(((cubes[1].cube.position.y - 0.625) > 2.5) || !(((cubes[1].cube.position.y - 0.625) <= 2.5) && ((cubes[1].cube.position.x - 0.625) <= 0.1) && ((cubes[1].cube.position.x - 0.625) >= -1.35))) &&
			   !((((cubes[1].cube.position.x + 0.625) >= 4.675) || ((cubes[1].cube.position.x - 0.625) <= 2.125)) && (cubes[1].cube.position.y <= 1.25))) {
				 drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#00ff00', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#00ff00', lineWidth: 1});

				
				if (xAntiheiras == 0.5) {
cubes[1].cube.position.x = 0;
} else if (xAntiheiras < 0.5) {
	cubes[1].cube.position.x = 6.75 - ((xAntiheiras * 2) * 6.75);
		   } else if (xAntiheiras > 0.5) {
	cubes[1].cube.position.x = -6.75 + (((1 - xAntiheiras) * 2) * 6.75);
		   }
		
				if (yAntiheiras == 0.5) {
cubes[1].cube.position.y = 0;
} else if (yAntiheiras < 0.5) {
	cubes[1].cube.position.y = 6.3 - ((yAntiheiras * 2) * 3.8);
		   } else if (yAntiheiras > 0.5) {
	cubes[1].cube.position.y = -1.3 + (((1 - yAntiheiras) * 2) * 3.8);
		   }
				
				
	}  else if ((xHeriouOnBoxCanvas > (cubes[2].cube.position.x - 0.625) && xHeriouOnBoxCanvas < (cubes[2].cube.position.x + 0.625)
			   && yHeriouOnBoxCanvas > (cubes[2].cube.position.y - 0.625) && yHeriouOnBoxCanvas < (cubes[2].cube.position.y + 0.625)) && grabbing == false && (cubes[1].cube.position.y == 0 && cubes[1].cube.position.x < 3.5 && cubes[1].cube.position.x > 3.3) && (cubes[0].cube.position.y == 0 && cubes[0].cube.position.x < 1.6 && cubes[0].cube.position.x > 1.4) &&
				(((cubes[2].cube.position.y - 0.625) > 2.5) || !(((cubes[2].cube.position.y - 0.625) <= 2.5) && ((cubes[2].cube.position.x - 0.625) <= 0.1) && ((cubes[2].cube.position.x - 0.625) >= -1.35))) &&
			   !(((cubes[2].cube.position.x - 0.625) <= 4.025) && (cubes[2].cube.position.y <= 1.25))) {
				 drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#00ff00', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#00ff00', lineWidth: 1});

				
				if (xAntiheiras == 0.5) {
cubes[2].cube.position.x = 0;
} else if (xAntiheiras < 0.5) {
	cubes[2].cube.position.x = 6.75 - ((xAntiheiras * 2) * 6.75);
		   } else if (xAntiheiras > 0.5) {
	cubes[2].cube.position.x = -6.75 + (((1 - xAntiheiras) * 2) * 6.75);
		   }
		
				if (yAntiheiras == 0.5) {
cubes[2].cube.position.y = 0;
} else if (yAntiheiras < 0.5) {
	cubes[2].cube.position.y = 6.3 - ((yAntiheiras * 2) * 3.8);
		   } else if (yAntiheiras > 0.5) {
	cubes[2].cube.position.y = -1.3 + (((1 - yAntiheiras) * 2) * 3.8);
		   }
		
		   }

				else {
				
				  drawConnectors(canvasCtx, landmarks, HAND_CONNECTIONS, {color: '#ffffff', lineWidth: 1});
			 drawLandmarks(canvasCtx, landmarks, {color: '#ffffff', lineWidth: 1});
				grabbing = true;
			}
	
		}  else {
			grabbing = false;

		if (cubes[0].cube.position.x < -0.1)	{
			cubes[0].cube.position.x = -1.5;
				cubes[0].cube.position.y = 0;
			for (let i = 0; i < cubesMoved.length; i++) {
				cubesMoved[i].cube.position.x -= 1.9;
			}
			cubesMoved[cubesMoved.length] = cubes.shift();
			for (let i = 0; i < cubes.length; i++) {
				cubes[i].cube.position.x -= 1.9;
			}
			score++;
			document.getElementById("scoreDiv").innerHTML = score;
		} else if (cubes[1].cube.position.x < -0.1)	{
			cubes[1].cube.position.x = -1.5;
				cubes[1].cube.position.y = 0;
			for (let i = 0; i < cubesMoved.length; i++) {
				cubesMoved[i].cube.position.x -= 1.9;
			}
			cubesMoved[cubesMoved.length] = cubes[1];
				cubes.splice(1, 1);
			for (let i = 1; i < cubes.length; i++) {
				cubes[i].cube.position.x -= 1.9;
			} 
			score++;
			document.getElementById("scoreDiv").innerHTML = score;
		} else if (cubes[2].cube.position.x < -0.1)	{
			cubes[2].cube.position.x = -1.5;
				cubes[2].cube.position.y = 0;
			for (let i = 0; i < cubesMoved.length; i++) {
				cubesMoved[i].cube.position.x -= 1.9;
			}
			cubesMoved[cubesMoved.length] = cubes[2];
			cubes.splice(2, 1);
			for (let i = 2; i < cubes.length; i++) {
				cubes[i].cube.position.x -= 1.9;
			}
			score++;
			document.getElementById("scoreDiv").innerHTML = score;
		}
			
		}
  
		if (((cubes[0].cube.position.y - 0.625) <= 2.5) && ((cubes[0].cube.position.x - 0.625) <= 0.1) && ((cubes[0].cube.position.x - 0.625) >= -1.35)) { 
		if (cubes[0].cube.position.x < 0) {
			cubes[0].cube.position.x = -0.74
		} else {
			cubes[0].cube.position.x = 0.74
		}	
		} else if (((cubes[1].cube.position.y - 0.625) <= 2.5) && ((cubes[1].cube.position.x - 0.625) <= 0.1) && ((cubes[1].cube.position.x - 0.625) >= -1.35)) { 
		if (cubes[1].cube.position.x < 0) {
			cubes[1].cube.position.x = -0.74
		} else {
			cubes[1].cube.position.x = 0.74
		}	
		} else if (((cubes[2].cube.position.y - 0.625) <= 2.5) && ((cubes[2].cube.position.x - 0.625) <= 0.1) && ((cubes[2].cube.position.x - 0.625) >= -1.35)) { 
		if (cubes[2].cube.position.x < 0) {
			cubes[2].cube.position.x = -0.74
		} else {
			cubes[2].cube.position.x = 0.74
		}	
		} else if ((cubes[0].cube.position.y <= 1.25) && ((cubes[0].cube.position.x + 0.625) >= 2.775)) {
			if (cubes[0].cube.position.x > 2.7) {
			cubes[0].cube.position.y = 1.27;
			} else {
					cubes[0].cube.position.x = 2.1;
			}
		}  else if ((cubes[1].cube.position.y <= 1.25) && (((cubes[1].cube.position.x + 0.625) >= 4.675) || ((cubes[1].cube.position.x - 0.625) <= 2.125))) {
			if (cubes[1].cube.position.x > 4.4 || cubes[1].cube.position.x < 2.4) {
			cubes[1].cube.position.y = 1.27;
			} else if (cubes[1].cube.position.x > 3.4) {
					cubes[1].cube.position.x = 4;
			} else {
					cubes[1].cube.position.x = 2.8;
			}
		}  else if ((cubes[2].cube.position.y <= 1.25) && ((cubes[2].cube.position.x - 0.625) <= 4.025)) {
			if (cubes[2].cube.position.x < 3.75) {
			cubes[2].cube.position.y = 1.27;
			} else {
					cubes[2].cube.position.x = 4.725;
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
  </div>
	  
	  <div id="scoreArea">Score: <div id="scoreDiv">0</div></div>
	   <div id="timeArea">Time: <div id="timeLeft">01:00</div></div>
	  
	  <div id="introMessage">
		  <h1>Are you ready?</h1>
		  <button id="startButton">Start</button>
	  </div>
 
		  <button id="quitButton">Quit</button>

  </body>
</html>