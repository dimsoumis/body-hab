

	<?php include '../../../exercises-head.php';?>
	<link rel="stylesheet" href="styles.css">
	<script type="module">
		
		/*dim custom code 1 start*/
		
  var aLekan_x; 
  var aLekan_y;
  var aLekan_z;
	 
  var dLekan_x; 
  var dLekan_y;
  var dLekan_z;
	 
  var aGonat_x; 
 var aGonat_y;
  var aGonat_z;
	
  var dGonat_x; 
  var dGonat_y;
  var dGonat_z;
		
	 var aAgkon_x; 
 var aAgkon_y;
  var aAgkon_z;
	
  var dAgkon_x; 
  var dAgkon_y;
  var dAgkon_z;
		
	 var aKarpo_x; 
 var aKarpo_y;
  var aKarpo_z;
	
  var dKarpo_x; 
  var dKarpo_y;
  var dKarpo_z;
		
  var aStoma_x; 
  var aStoma_y;
  var aStoma_z;
		
		var heriaSosta = false;

var aGonatCloseToLekan = false;
var dGonatCloseToLekan = false;	
		
		var sitDistThres = 0.1;
		
var aGonatFarFromLekan = false;
var dGonatFarFromLekan = false;	
		
		var standDistThres = 0.1;
		
		var countRepeats = 0;
		var countTime = 0;
				var countRepeatsInterval;
		var exerActive = false;
		var userSitting = 0;
		/*dim custom code 1 end*/
		
 const videoElement = document.getElementsByClassName('input_video')[0]; 
const canvasElement = document.getElementsByClassName('output_canvas')[0];
const canvasCtx = canvasElement.getContext('2d');
/* const landmarkContainer = document.getElementsByClassName('landmark-grid-container')[0];
const grid = new LandmarkGrid(landmarkContainer); */

 function onResults(results) {
  if (!results.poseLandmarks) {
  /*  grid.updateLandmarks([]); */
    return;
  } 

  canvasCtx.save();
  canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
  canvasCtx.drawImage(results.segmentationMask, 0, 0,
                      canvasElement.width, canvasElement.height);

  // Only overwrite existing pixels.
  canvasCtx.globalCompositeOperation = 'source-in';
  //canvasCtx.fillStyle = '#00FF00';
	canvasCtx.fillStyle = '#00FF0000';
  canvasCtx.fillRect(0, 0, canvasElement.width, canvasElement.height);

  // Only overwrite missing pixels.
  canvasCtx.globalCompositeOperation = 'destination-atop';
  canvasCtx.drawImage(
      results.image, 0, 0, canvasElement.width, canvasElement.height);

  canvasCtx.globalCompositeOperation = 'source-over';
  drawConnectors(canvasCtx, results.poseLandmarks, POSE_CONNECTIONS,
                 {color: '#000000', lineWidth: 4});
  drawLandmarks(canvasCtx, results.poseLandmarks,
                {color: '#FF0000', lineWidth: 2});
	/*dim custom code 2 start*/
		const body = results.poseLandmarks[0];
	 
	  aStoma_x = results.poseLandmarks[9].x; 
  aStoma_y = results.poseLandmarks[9].y;
 aStoma_z = results.poseLandmarks[9].z;
	 
	 aAgkon_x = results.poseLandmarks[13].x; 
  aAgkon_y = results.poseLandmarks[13].y;
 aAgkon_z = results.poseLandmarks[13].z;
	
  dAgkon_x = results.poseLandmarks[14].x; 
 dAgkon_y = results.poseLandmarks[14].y;
 dAgkon_z = results.poseLandmarks[14].z;
	 
	aKarpo_x = results.poseLandmarks[15].x; 
  aKarpo_y = results.poseLandmarks[15].y;
 aKarpo_z = results.poseLandmarks[15].z;
	
  dKarpo_x = results.poseLandmarks[16].x; 
 dKarpo_y = results.poseLandmarks[16].y;
 dKarpo_z = results.poseLandmarks[16].z;
  
 aLekan_x = results.poseLandmarks[23].x; 
 aLekan_y = results.poseLandmarks[23].y;
 aLekan_z = results.poseLandmarks[23].z;
	 
  dLekan_x = results.poseLandmarks[24].x; 
 dLekan_y = results.poseLandmarks[24].y;
  dLekan_z = results.poseLandmarks[24].z;
	 
 aGonat_x = results.poseLandmarks[25].x; 
  aGonat_y = results.poseLandmarks[25].y;
 aGonat_z = results.poseLandmarks[25].z;
	
  dGonat_x = results.poseLandmarks[26].x; 
 dGonat_y = results.poseLandmarks[26].y;
 dGonat_z = results.poseLandmarks[26].z;
	 
	 	heriaSosta = (dKarpo_x >= dAgkon_x) && (aKarpo_x <= aAgkon_x) && (dKarpo_y <= dAgkon_y) && (aKarpo_y <= aAgkon_y) && (aStoma_y <= dKarpo_y) && (aStoma_y <= aKarpo_y);
	 
	  if (exerActive && !heriaSosta) {
	 cancelCountSitUpsBadHands();
	 }
	 
	 aGonatCloseToLekan = (aLekan_y > aGonat_y - sitDistThres);
	 dGonatCloseToLekan = (dLekan_y > dGonat_y - sitDistThres);
	 
	 if (aGonatCloseToLekan && dGonatCloseToLekan && heriaSosta) {
		 drawLandmarks(canvasCtx, results.poseLandmarks, {color: '#FFFF00', lineWidth: 2});
		 if (exerActive) {
			 userSitting = 1;
		 }
	 }
	 
	 
	 aGonatFarFromLekan = (aLekan_y < aGonat_y - standDistThres);
	 dGonatFarFromLekan = (dLekan_y < dGonat_y - standDistThres);

	 
	 if (aGonatFarFromLekan && dGonatFarFromLekan && heriaSosta) {
		 drawLandmarks(canvasCtx, results.poseLandmarks, {color: '#00FF00', lineWidth: 2});
		  if (exerActive) {
			 if (userSitting == 1) {
				 countRepeats++;
				 document.getElementById("currentRepeat").innerHTML = countRepeats;
				 userSitting = 2;
			 }
		 }
	 }
	 
	 
	
	 
	/*dim custom code 2 end*/
  
	 canvasCtx.restore();

  /* grid.updateLandmarks(results.poseWorldLandmarks); */
}

const pose = new Pose({locateFile: (file) => {
  return `https://cdn.jsdelivr.net/npm/@mediapipe/pose/${file}`;
}});
pose.setOptions({
  modelComplexity: 1,
  smoothLandmarks: true,
  enableSegmentation: true,
  smoothSegmentation: true,
  minDetectionConfidence: 0.5,
  minTrackingConfidence: 0.5
});
pose.onResults(onResults);

const camera = new Camera(videoElement, {
  onFrame: async () => {
    await pose.send({image: videoElement});
  },
  width: 1280,
  height: 720
});
camera.start();
		
		
		
		
		/*dim custom code 3 start*/
		
	
		
	document.getElementById("sitDistThresRange").addEventListener("change", updateSitDistThres);
		
		function updateSitDistThres() {
			sitDistThres = document.getElementById("sitDistThresRange").value / 100;
			document.getElementById("currentSitDistThres").innerHTML = document.getElementById("sitDistThresRange").value;
		}
		
		document.getElementById("currentSitDistThres").innerHTML = document.getElementById("sitDistThresRange").value;
		
		
		
		
		
			document.getElementById("standDistThresRange").addEventListener("change", updateStandDistThres);
		
		function updateStandDistThres() {
			standDistThres = document.getElementById("standDistThresRange").value / 100;
			document.getElementById("currentStandDistThres").innerHTML = document.getElementById("standDistThresRange").value;
		}
		
		document.getElementById("currentStandDistThres").innerHTML = document.getElementById("standDistThresRange").value;
		
		
		
		
		
		
		
		
	setInterval(function() {
		 document.getElementById("currDistLeft").innerHTML =  Number((aGonat_y - aLekan_y) * 100).toFixed(2);
	 document.getElementById("currDistRight").innerHTML = Number((dGonat_y - dLekan_y) * 100).toFixed(2);
		}, 1000);
		
		
	
		
		
		document.getElementById("startExer").addEventListener("click", setStartAuto);
		
		document.getElementById("startAutoTimer").value = 0;
		function setStartAuto() {
			var timeoutSet = document.getElementById("startAutoTimer").value;
			timeoutSet++;
			
			if (timeoutSet == 1) {
				document.getElementById("countdownForSetters").style.display = "block";
			}
				
			var countDownInter = setInterval( function () {
							timeoutSet--;
				document.getElementById("countdownForSetters").innerHTML = timeoutSet;
				document.getElementById("countdownForSetters").style.display = "block";
				if (timeoutSet < 1) {
					document.getElementById("countdownForSetters").innerHTML = "";
					document.getElementById("countdownForSetters").style.display = "none";
					
				    clearInterval(countDownInter);
					countSitUps();
				}
			}, 1000);
			
		}
		
		function countSitUps() {
			document.getElementById("startExer").style.display = "none";
			document.getElementById("cancelExer").style.display = "block";
			
			countRepeats = 0;
			document.getElementById("currentRepeat").innerHTML = countRepeats;
			countTime = 0;
			userSitting = 0;
				 exerActive = true;
			
			countRepeatsInterval = setInterval(function () {
				countTime++;
						var minutes = Math.trunc(countTime / 60);
				var seconds = countTime - (minutes * 60);
				
				if (minutes < 10 && seconds < 10) {
				   document.getElementById("currentTime").innerHTML = "0" + minutes + ":" + "0" + seconds;
				 } else if (minutes < 10) {
				  document.getElementById("currentTime").innerHTML = "0" + minutes + ":" + seconds;
				 } else if (minutes > 10 && seconds < 10) {
				 document.getElementById("currentTime").innerHTML = minutes + ":" + "0" + seconds;
				 } else {
				  document.getElementById("currentTime").innerHTML = minutes + ":" + seconds;
				 }
				if (countRepeats == 5) {
					 clearInterval(countRepeatsInterval);
					 exerActive = false;
					 localStorage.setItem("sitToStand5RepeatsScore", countTime);
							  		        Swal.fire({
title: 'Process of 5 repetitions completed. Your Score is: ' + countTime,
showDenyButton: true,
showCancelButton: true,
  confirmButtonText: `Play Again`,
  denyButtonText: `Save Score`,
  cancelButtonText: `Close`,
}).then((result) => {
  if (result.isConfirmed) {
   countSitUps();
  } else if (result.isDenied) {
window.location.href = "save-score.php";
  } else {
   document.getElementById("currentTime").innerHTML = "-";
	   document.getElementById("currentRepeat").innerHTML = "-";
document.getElementById("startExer").style.display = "block";
			document.getElementById("cancelExer").style.display = "none";
  }
});
				}
				 }, 1000);
		}
		
		
		
			document.getElementById("cancelExer").addEventListener("click", cancelCountSitUps);
		
       function cancelCountSitUps() {
		    clearInterval(countRepeatsInterval);
					 exerActive = false;
		   
		     Swal.fire({
title: 'Exercise Canceled',
showDenyButton: false,
showCancelButton: false,
  confirmButtonText: `Close`,
  denyButtonText: `Close`,
  cancelButtonText: `Save Score`,
}).then((result) => {
  if (result.isConfirmed) {
    document.getElementById("currentTime").innerHTML = "-";
	   document.getElementById("currentRepeat").innerHTML = "-";
document.getElementById("startExer").style.display = "block";
			document.getElementById("cancelExer").style.display = "none";
  } else if (result.isDenied) {
// nothing
  } else {
   document.getElementById("currentTime").innerHTML = "-";
	   document.getElementById("currentRepeat").innerHTML = "-";
document.getElementById("startExer").style.display = "block";
			document.getElementById("cancelExer").style.display = "none";
  }
});
			
	   }
		
		
					function cancelCountSitUpsBadHands() {
		    clearInterval(countRepeatsInterval);
					 exerActive = false;
		   
		     Swal.fire({
title: 'Exercise Canceled because of Bad Posture',
showDenyButton: false,
showCancelButton: false,
  confirmButtonText: `Close`,
  denyButtonText: `Close`,
  cancelButtonText: `Save Score`,
}).then((result) => {
  if (result.isConfirmed) {
    document.getElementById("currentTime").innerHTML = "-";
	   document.getElementById("currentRepeat").innerHTML = "-";
document.getElementById("startExer").style.display = "block";
			document.getElementById("cancelExer").style.display = "none";
  } else if (result.isDenied) {
// nothing
  } else {
   document.getElementById("currentTime").innerHTML = "-";
	   document.getElementById("currentRepeat").innerHTML = "-";
document.getElementById("startExer").style.display = "block";
			document.getElementById("cancelExer").style.display = "none";
  }
});
			
	   }
		
		// get sitting threshold auto
		
		document.getElementById("getSitThresAuto").addEventListener("click", setSitThresAuto);
		document.getElementById("sitAutoThresTimer").value = 0;
		function setSitThresAuto() {
			var timeoutSet = document.getElementById("sitAutoThresTimer").value;
			timeoutSet++;
			
			if (timeoutSet == 1) {
				document.getElementById("countdownForSetters").style.display = "block";
			}
				
			var countDownInter = setInterval( function () {
							timeoutSet--;
				document.getElementById("countdownForSetters").innerHTML = timeoutSet;
				document.getElementById("countdownForSetters").style.display = "block";
				if (timeoutSet < 1) {
					
					 var leftKneeLimbDistance =  Number((aGonat_y - aLekan_y) * 100).toFixed(0);
	 var rightKneeLimbDistance = Number((dGonat_y - dLekan_y) * 100).toFixed(0);
				
				if (leftKneeLimbDistance < rightKneeLimbDistance) {
					leftKneeLimbDistance = rightKneeLimbDistance;
				}
				
				leftKneeLimbDistance = Number(leftKneeLimbDistance);
				document.getElementById("sitDistThresRange").value = leftKneeLimbDistance + 5;
					sitDistThres = document.getElementById("sitDistThresRange").value / 100;
			document.getElementById("currentSitDistThres").innerHTML = document.getElementById("sitDistThresRange").value;	
					
					
					document.getElementById("countdownForSetters").innerHTML = "";
					document.getElementById("countdownForSetters").style.display = "none";
				    clearInterval(countDownInter);
				}
			}, 1000);
			
		}
		
		// get standing thres auto
		
			document.getElementById("getStandThresAuto").addEventListener("click", setStandThresAuto);
		document.getElementById("standAutoThresTimer").value = 0;
		function setStandThresAuto() {
			var timeoutSet = document.getElementById("standAutoThresTimer").value;
			timeoutSet++;
			
			if (timeoutSet == 1) {
				document.getElementById("countdownForSetters").style.display = "block";
			}
				
			var countDownInter = setInterval( function () {
							timeoutSet--;
				document.getElementById("countdownForSetters").innerHTML = timeoutSet;
				document.getElementById("countdownForSetters").style.display = "block";
				if (timeoutSet < 1) {
					
					 var leftKneeLimbDistance =  Number((aGonat_y - aLekan_y) * 100).toFixed(0);
	 var rightKneeLimbDistance = Number((dGonat_y - dLekan_y) * 100).toFixed(0);
				
				if (leftKneeLimbDistance > rightKneeLimbDistance) {
					leftKneeLimbDistance = rightKneeLimbDistance;
				}
				
				leftKneeLimbDistance = Number(leftKneeLimbDistance);
				document.getElementById("standDistThresRange").value = leftKneeLimbDistance - 5;
					standDistThres = document.getElementById("standDistThresRange").value / 100;
			document.getElementById("currentStandDistThres").innerHTML = document.getElementById("standDistThresRange").value;	
					
					
					document.getElementById("countdownForSetters").innerHTML = "";
					document.getElementById("countdownForSetters").style.display = "none";
				    clearInterval(countDownInter);
				}
			}, 1000);
			
		}
		
		/*dim custom code 3 end*/
		
</script>
</head>

<body>
  <div class="container">
     <video style="display: none;" class="input_video"></video> 
    <canvas class="output_canvas" width="1920px" height="1080px"></canvas>
   <!-- <div class="landmark-grid-container"></div> -->
  </div>
	
	<div id="exerNtimeSpace">
	<div id="currentExerMessage">Exercise: <div id="currentExer">Sit to Stand - 5 repeats</div></div>
	
	<div id="timerMessage">Timer: <div id="currentTime">-</div></div>
		
		<div id="repeatsMessage">Repeats: <div id="currentRepeat">-</div></div>
	  </div>
	<div id="exerButtonsSpace">
		<div id="sitDistThresLabel">Limb-Knee Sitting Distance Threshold: <div id="currentSitDistThres">50</div></div>
		 <input type="range" min="1" max="100" value="50" id="sitDistThresRange">
		<p>Get Sitting Threshold Automatically in <input type="number" id="sitAutoThresTimer" name="sitAutoThresTimer" min="0" max="60"> seconds. <button id="getSitThresAuto">GO</button></p>
		
		<div id="standDistThresLabel">Limb-Knee Standing Distance Threshold: <div id="currentStandDistThres">50</div></div>
		 <input type="range" min="1" max="100" value="50" id="standDistThresRange">
		<p>Get Standing Threshold Automatically in <input type="number" id="standAutoThresTimer" name="standAutoThresTimer" min="0" max="60"> seconds. <button id="getStandThresAuto">GO</button></p>
		<hr>
		<p style="text-align: right;">Start exercise in <input type="number" id="startAutoTimer" name="startAutoTimer" min="0" max="60"> seconds.</p>
	<button id="startExer">Start</button>
	
	<button id="cancelExer" style="display: none;">Cancel Exercise</button>
	  </div>
	
	<div id="currDistMessages">
	<div id="currDistMessageLeft">Current limb-knee distance (left): <div id="currDistLeft">-</div></div>
	<div id="currDistMessageRight">Current limb-knee distance (right): <div id="currDistRight">-</div></div>
		</div>
	<a href="../index.php"><button id="goBackButt">Go Back</button></a>
	
	<div id="countdownForSetters"></div>
	
</body>
</html>