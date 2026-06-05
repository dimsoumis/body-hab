 <?php

include '../../../loggedin-head.php';

?>

 <?php

$servername = "localhost";
$username = "body_hab_space";
$password = "a3I#g10r4";
$dbname = "body_hab_space";
          
   $con = mysqli_connect($servername, $username, $password, $dbname);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  

$user = $_SESSION['userEmail'];  
      
        //to prevent from mysqli injection  
        $user = stripcslashes($user);    
        $user = mysqli_real_escape_string($con, $user); 

// 5 repeats SCORES

 $sql1 = "select * from sit_to_stand_5_repeats where user = '$user' ORDER BY reg_date DESC";  
        $result1 = mysqli_query($con, $sql1);  
        $count1 = mysqli_num_rows($result1);

$sqlStats1 = "select * from sit_to_stand_5_repeats where user = '$user'";  
        $resultStats1 = mysqli_query($con, $sqlStats1);  
        $countStats1 = mysqli_num_rows($resultStats1);





$maxScore5repeats = 0;
	$minScore5repeats = 5000;
	$averageScore5repeats = 0;
$fiveRepeatsScoresCounter = 0;
 $maxScore5repeatsDate = 0;
 $minScore5repeatsDate = 0;


		while($row = mysqli_fetch_array($resultStats1)) {
		
			$actualScore = $row['score'];
			
	
				if ($actualScore > $maxScore5repeats) {
					$maxScore5repeats = $actualScore;
					$dateOfmax5R=$row['reg_date'];
					 $maxScore5repeatsDate = date('d-m-Y', strtotime($dateOfmax5R));
				}
				
			if ($actualScore < $minScore5repeats) {
					$minScore5repeats = $actualScore;
						$dateOfmin5R=$row['reg_date'];
					 $minScore5repeatsDate = date('d-m-Y', strtotime($dateOfmin5R));
				}
			
				$averageScore5repeats = $averageScore5repeats + $actualScore;
				$fiveRepeatsScoresCounter++;
				
			}


			$averageScore5repeats = $averageScore5repeats / $fiveRepeatsScoresCounter;

// 10 repeats SCORES

 $sql2 = "select * from sit_to_stand_10_repeats where user = '$user' ORDER BY reg_date DESC";  
        $result2 = mysqli_query($con, $sql2);  
        $count2 = mysqli_num_rows($result2);

$sqlStats2 = "select * from sit_to_stand_10_repeats where user = '$user'";  
        $resultStats2 = mysqli_query($con, $sqlStats2);  
        $countStats2 = mysqli_num_rows($resultStats2);





$maxScore10repeats = 0;
	$minScore10repeats = 5000;
	$averageScore10repeats = 0;
$tenRepeatsScoresCounter = 0;
 $maxScore10repeatsDate = 0;
 $minScore10repeatsDate = 0;


		while($row = mysqli_fetch_array($resultStats2)) {
		
			$actualScore = $row['score'];
			
	
				if ($actualScore > $maxScore10repeats) {
					$maxScore10repeats = $actualScore;
					$dateOfmax10R=$row['reg_date'];
					 $maxScore10repeatsDate = date('d-m-Y', strtotime($dateOfmax10R));
				}
				
			if ($actualScore < $minScore10repeats) {
					$minScore10repeats = $actualScore;
						$dateOfmin10R=$row['reg_date'];
					 $minScore10repeatsDate = date('d-m-Y', strtotime($dateOfmin10R));
				}
			
				$averageScore10repeats = $averageScore10repeats + $actualScore;
				$tenRepeatsScoresCounter++;
				
			}


			$averageScore10repeats = $averageScore10repeats / $tenRepeatsScoresCounter;


// 30 seconds SCORES

 $sql3 = "select * from sit_to_stand_30_secs where user = '$user' ORDER BY reg_date DESC";  
        $result3 = mysqli_query($con, $sql3);  
        $count3 = mysqli_num_rows($result3);

$sqlStats3 = "select * from sit_to_stand_30_secs where user = '$user'";  
        $resultStats3 = mysqli_query($con, $sqlStats3);  
        $countStats3 = mysqli_num_rows($resultStats3);





$maxScore30seconds = 0;
	$minScore30seconds = 5000;
	$averageScore30seconds = 0;
$thirtySecondsScoresCounter = 0;
 $maxScore30secondsDate = 0;
 $minScore30secondsDate = 0;


		while($row = mysqli_fetch_array($resultStats3)) {
		
			$actualScore = $row['score'];
			
	
				if ($actualScore > $maxScore30seconds) {
					$maxScore30seconds = $actualScore;
					$dateOfmax30S=$row['reg_date'];
					 $maxScore30secondsDate = date('d-m-Y', strtotime($dateOfmax30S));
				}
				
			if ($actualScore < $minScore30seconds) {
					$minScore30seconds = $actualScore;
						$dateOfmin30S=$row['reg_date'];
					 $minScore30secondsDate = date('d-m-Y', strtotime($dateOfmin30S));
				}
			
				$averageScore30seconds = $averageScore30seconds + $actualScore;
				$thirtySecondsScoresCounter++;
				
			}


			$averageScore30seconds = $averageScore30seconds / $thirtySecondsScoresCounter;


// 60 seconds SCORES

 $sql4 = "select * from sit_to_stand_60_secs where user = '$user' ORDER BY reg_date DESC";  
        $result4 = mysqli_query($con, $sql4);  
        $count4 = mysqli_num_rows($result4);

$sqlStats4 = "select * from sit_to_stand_60_secs where user = '$user'";  
        $resultStats4 = mysqli_query($con, $sqlStats4);  
        $countStats4 = mysqli_num_rows($resultStats4);





$maxScore60seconds = 0;
	$minScore60seconds = 5000;
	$averageScore60seconds = 0;
$sixtySecondsScoresCounter = 0;
 $maxScore60secondsDate = 0;
 $minScore60secondsDate = 0;


		while($row = mysqli_fetch_array($resultStats4)) {
		
			$actualScore = $row['score'];
			
	
				if ($actualScore > $maxScore60seconds) {
					$maxScore60seconds = $actualScore;
					$dateOfmax60S=$row['reg_date'];
					 $maxScore60secondsDate = date('d-m-Y', strtotime($dateOfmax60S));
				}
				
			if ($actualScore < $minScore60seconds) {
					$minScore60seconds = $actualScore;
						$dateOfmin60S=$row['reg_date'];
					 $minScore60secondsDate = date('d-m-Y', strtotime($dateOfmin60S));
				}
			
				$averageScore60seconds = $averageScore60seconds + $actualScore;
				$sixtySecondsScoresCounter++;
				
			}


			$averageScore60seconds = $averageScore60seconds / $sixtySecondsScoresCounter;


?>


<main id="previousScoresPage">
	
	<h1 id="pageTitle">Sit to Stand</h1>
	
<p style="text-align: center;">Check the previous scores you have achieved (higher scores and quicker times are better).</p>
	
	
	
	
	

	<h3 style="text-align: center;">Statistics</h3>
			<div class="row">
				<!-- 5 repeats stats -->
				<div class="column2">
				
				<?php if($countStats1 > 0) {
		echo "<table>
					<tr>
					<th>No of Exercises<br>(5 repeats)</th>
						<th>Max Time<br>(5 repeats)</th>
		<th>Min Time<br>(5 repeats)</th>
			<th>Average Time<br>(5 repeats)</th>
					</tr>";
	

			
			
			echo "<tr><td>";
	echo $fiveRepeatsScoresCounter;
	echo "</td><td>";
			
	if($maxScore5repeatsDate == 0) {
		echo "0";
	} else {
			echo $maxScore5repeats;
	
			echo " (on ";
		echo $maxScore5repeatsDate;
			echo ")";
				}
			echo "</td><td>";
				if($minScore5repeatsDate == 0) {
		echo "0";
	} else {
			echo $minScore5repeats;
	
		echo " (on ";
		echo $minScore5repeatsDate;
			echo ")";
				}
			echo "</td><td>";
				if($maxScore5repeatsDate == 0 && $minScore5repeatsDate == 0) {
		echo "0";
	} else {
			echo $averageScore5repeats;
				}
			echo "</td></tr>";
	
	echo "</table>";
		} else {
		echo "<p style='text-align: center;'>There are no scores saved yet for 'Sit to Stand - 5 repeats' exercise.</p>";		
}
				?>
				
			</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- 10 repeats stats -->
				
					<div class="column2">
				
				<?php if($countStats2 > 0) {
		echo "<table>
					<tr>
					<th>No of Exercises<br>(10 repeats)</th>
						<th>Max Time<br>(10 repeats)</th>
		<th>Min Time<br>(10 repeats)</th>
			<th>Average Time<br>(10 repeats)</th>
					</tr>";
	

			
			
			echo "<tr><td>";
	echo $tenRepeatsScoresCounter;
	echo "</td><td>";
			
	if($maxScore10repeatsDate == 0) {
		echo "0";
	} else {
			echo $maxScore10repeats;
	
			echo " (on ";
		echo $maxScore10repeatsDate;
			echo ")";
				}
			echo "</td><td>";
				if($minScore10repeatsDate == 0) {
		echo "0";
	} else {
			echo $minScore10repeats;
	
		echo " (on ";
		echo $minScore10repeatsDate;
			echo ")";
				}
			echo "</td><td>";
				if($maxScore10repeatsDate == 0 && $minScore10repeatsDate == 0) {
		echo "0";
	} else {
			echo $averageScore10repeats;
				}
			echo "</td></tr>";
	
	echo "</table>";
		} else {
		echo "<p style='text-align: center;'>There are no scores saved yet for 'Sit to Stand - 10 repeats' exercise.</p>";		
}
				?>
				
			</div>
	
	</div>
	
	
	
	
	
	
	
			<div class="row">
				<!-- 30 seconds stats -->
				<div class="column2">
				
				<?php if($countStats3 > 0) {
		echo "<table>
					<tr>
					<th>No of Exercises<br>(30 seconds)</th>
						<th>Max Time<br>(30 seconds)</th>
		<th>Min Time<br>(30 seconds)</th>
			<th>Average Time<br>(30 seconds)</th>
					</tr>";
	

			
			
			echo "<tr><td>";
	echo $thirtySecondsScoresCounter;
	echo "</td><td>";
			
	if($maxScore30secondsDate == 0) {
		echo "0";
	} else {
			echo $maxScore30seconds;
	
			echo " (on ";
		echo $maxScore30secondsDate;
			echo ")";
				}
			echo "</td><td>";
				if($minScore30secondsDate == 0) {
		echo "0";
	} else {
			echo $minScore30seconds;
	
		echo " (on ";
		echo $minScore30secondsDate;
			echo ")";
				}
			echo "</td><td>";
				if($maxScore30secondsDate == 0 && $minScore30secondsDate == 0) {
		echo "0";
	} else {
			echo $averageScore30seconds;
				}
			echo "</td></tr>";
	
	echo "</table>";
		} else {
		echo "<p style='text-align: center;'>There are no scores saved yet for 'Sit to Stand - 30 seconds' exercise.</p>";		
}
				?>
				
			</div>
				
				
				
				
				
				
				
				
				
				
				
				
				<!-- 60 seconds stats -->
				
					<div class="column2">
				
				<?php if($countStats4 > 0) {
		echo "<table>
					<tr>
					<th>No of Exercises<br>(60 seconds)</th>
						<th>Max Time<br>(60 seconds)</th>
		<th>Min Time<br>(60 seconds)</th>
			<th>Average Time<br>(60 seconds)</th>
					</tr>";
	

			
			
			echo "<tr><td>";
	echo $sixtySecondsScoresCounter;
	echo "</td><td>";
			
	if($maxScore60secondsDate == 0) {
		echo "0";
	} else {
			echo $maxScore60seconds;
	
			echo " (on ";
		echo $maxScore60secondsDate;
			echo ")";
				}
			echo "</td><td>";
				if($minScore60secondsDate == 0) {
		echo "0";
	} else {
			echo $minScore60seconds;
	
		echo " (on ";
		echo $minScore60secondsDate;
			echo ")";
				}
			echo "</td><td>";
				if($maxScore60secondsDate == 0 && $minScore60secondsDate == 0) {
		echo "0";
	} else {
			echo $averageScore60seconds;
				}
			echo "</td></tr>";
	
	echo "</table>";
		} else {
		echo "<p style='text-align: center;'>There are no scores saved yet for 'Sit to Stand - 60 seconds' exercise.</p>";		
}
				?>
				
			</div>

	
	</div>
	
	
	
	
	<h3 style="text-align: center;">Individual Scores</h3>
	
		<div class="row">

		<div class="column2">
		<h4 style="text-align: center;">5 repeats</h4>
		<?php if($count1 > 0) {
	
	$noOfPages1 = intdiv($count1, 20);
	
	if (fmod($count1, 20) > 0) {
	$noOfPages1 = $noOfPages1 + 1;
	}
	
	$currentPage1 = 1;
	
	$x2_1 = 0;
	for ($x_1 = 1; $x_1 <= $noOfPages1; $x_1++) {
	
		
		$sqlLoop1 = "select * from sit_to_stand_5_repeats where user = '$user' ORDER BY reg_date DESC LIMIT 20 OFFSET $x2_1";  
        $resultLoop1 = mysqli_query($con, $sqlLoop1);  
        $countLoop1 = mysqli_num_rows($resultLoop1);
		$x2_1 = $x2_1 + 20;
		
echo "<table style='display: none;' id='resultsTable1No";
echo $x_1;
echo "'>
					<tr>
						<th>Time</th>
						<th>Date</th>
					</tr>";
		
		while($rowLoop1 = mysqli_fetch_array($resultLoop1))
{
			
				
			
					echo "<tr><td>";
					echo $rowLoop1['score'];
			echo "</td><td>";
			
$dateOfX1=$rowLoop1['reg_date'];
echo date('H:i / d-m-Y', strtotime($dateOfX1));
			
	echo "</td></tr>";
			
				
				}
echo "</table>";
	}
	
	
	
	
	
	
	
	
	echo "<br><p style='text-align: center;'> Page <span id='curActivePage1'>";
	echo $currentPage1;
	echo "</span> of ";
	echo $noOfPages1;	
	echo "</p>";
			
			
			
			
			
			
			
			
			
			
			
			
		} 	else {
		echo "<p>There are no scores saved yet for 'Sit to Stand - 5 repeats' exercise.</p>";		
}
				?>
			
			
			<p id="navButtonsArea1" style="text-align: center; display: none;">
<button id="prevTableButton1">Prev</button>&nbsp;&nbsp;&nbsp;<button id="nextTableButton1">Next</button>
</p>
			
	</div>
			
			
			
			
			
			
			
			
			
				<div class="column2">
		<h4 style="text-align: center;">10 repeats</h4>
		<?php if($count2 > 0) {
	
	$noOfPages2 = intdiv($count2, 20);
	
	if (fmod($count2, 20) > 0) {
	$noOfPages2 = $noOfPages2 + 1;
	}
	
	$currentPage2 = 1;
	
	$x2_2 = 0;
	for ($x_2 = 1; $x_2 <= $noOfPages2; $x_2++) {
	
		
		$sqlLoop2 = "select * from sit_to_stand_10_repeats where user = '$user' ORDER BY reg_date DESC LIMIT 20 OFFSET $x2_2";  
        $resultLoop2 = mysqli_query($con, $sqlLoop2);  
        $countLoop2 = mysqli_num_rows($resultLoop2);
		$x2_2 = $x2_2 + 20;
		
echo "<table style='display: none;' id='resultsTable2No";
echo $x_2;
echo "'>
					<tr>
						<th>Time</th>
						<th>Date</th>
					</tr>";
		
		while($rowLoop2 = mysqli_fetch_array($resultLoop2))
{
			
				
			
					echo "<tr><td>";
					echo $rowLoop2['score'];
			echo "</td><td>";
			
$dateOfX2=$rowLoop2['reg_date'];
echo date('H:i / d-m-Y', strtotime($dateOfX2));
			
	echo "</td></tr>";
			
				
				}
echo "</table>";
	}
	
	
	
	
	
	
	
	
	echo "<br><p style='text-align: center;'> Page <span id='curActivePage2'>";
	echo $currentPage2;
	echo "</span> of ";
	echo $noOfPages2;	
	echo "</p>";
			
			
			
			
			
			
			
			
			
			
			
			
		} 	else {
		echo "<p>There are no scores saved yet for 'Sit to Stand - 10 repeats' exercise.</p>";		
}
				?>
			
			
			<p id="navButtonsArea2" style="text-align: center; display: none;">
<button id="prevTableButton2">Prev</button>&nbsp;&nbsp;&nbsp;<button id="nextTableButton2">Next</button>
</p>
			
	</div>


	</div>
	
	
	
	
	
	
	
	
	
	
	
	
			<div class="row">

		<div class="column2">
		<h4 style="text-align: center;">30 seconds</h4>
		<?php if($count3 > 0) {
	
	$noOfPages3 = intdiv($count3, 20);
	
	if (fmod($count3, 20) > 0) {
	$noOfPages3 = $noOfPages3 + 1;
	}
	
	$currentPage3 = 1;
	
	$x2_3 = 0;
	for ($x_3 = 1; $x_3 <= $noOfPages3; $x_3++) {
	
		
		$sqlLoop3 = "select * from sit_to_stand_30_secs where user = '$user' ORDER BY reg_date DESC LIMIT 20 OFFSET $x2_3";  
        $resultLoop3 = mysqli_query($con, $sqlLoop3);  
        $countLoop3 = mysqli_num_rows($resultLoop3);
		$x2_3 = $x2_3 + 20;
		
echo "<table style='display: none;' id='resultsTable3No";
echo $x_3;
echo "'>
					<tr>
						<th>Time</th>
						<th>Date</th>
					</tr>";
		
		while($rowLoop3 = mysqli_fetch_array($resultLoop3))
{
			
				
			
					echo "<tr><td>";
					echo $rowLoop3['score'];
			echo "</td><td>";
			
$dateOfX3=$rowLoop3['reg_date'];
echo date('H:i / d-m-Y', strtotime($dateOfX3));
			
	echo "</td></tr>";
			
				
				}
echo "</table>";
	}
	
	
	
	
	
	
	
	
	echo "<br><p style='text-align: center;'> Page <span id='curActivePage3'>";
	echo $currentPage3;
	echo "</span> of ";
	echo $noOfPages3;	
	echo "</p>";
			
			
			
			
			
			
			
			
			
			
			
			
		} 	else {
		echo "<p>There are no scores saved yet for 'Sit to Stand - 30 seconds' exercise.</p>";		
}
				?>
			
			
			<p id="navButtonsArea3" style="text-align: center; display: none;">
<button id="prevTableButton3">Prev</button>&nbsp;&nbsp;&nbsp;<button id="nextTableButton3">Next</button>
</p>
			
	</div>
			
			
			
			
			
			
			
			
			
				<div class="column2">
		<h4 style="text-align: center;">60 seconds</h4>
		<?php if($count4 > 0) {
	
	$noOfPages4 = intdiv($count4, 20);
	
	if (fmod($count4, 20) > 0) {
	$noOfPages4 = $noOfPages4 + 1;
	}
	
	$currentPage4 = 1;
	
	$x2_4 = 0;
	for ($x_4 = 1; $x_4 <= $noOfPages4; $x_4++) {
	
		
		$sqlLoop4 = "select * from sit_to_stand_60_secs where user = '$user' ORDER BY reg_date DESC LIMIT 20 OFFSET $x2_4";  
        $resultLoop4 = mysqli_query($con, $sqlLoop4);  
        $countLoop4 = mysqli_num_rows($resultLoop4);
		$x2_4 = $x2_4 + 20;
		
echo "<table style='display: none;' id='resultsTable4No";
echo $x_4;
echo "'>
					<tr>
						<th>Time</th>
						<th>Date</th>
					</tr>";
		
		while($rowLoop4 = mysqli_fetch_array($resultLoop4))
{
			
				
			
					echo "<tr><td>";
					echo $rowLoop4['score'];
			echo "</td><td>";
			
$dateOfX4=$rowLoop4['reg_date'];
echo date('H:i / d-m-Y', strtotime($dateOfX4));
			
	echo "</td></tr>";
			
				
				}
echo "</table>";
	}
	
	
	
	
	
	
	
	
	echo "<br><p style='text-align: center;'> Page <span id='curActivePage4'>";
	echo $currentPage4;
	echo "</span> of ";
	echo $noOfPages4;	
	echo "</p>";
			
			
			
			
			
			
			
			
			
			
			
			
		} 	else {
		echo "<p>There are no scores saved yet for 'Sit to Stand - 60 seconds' exercise.</p>";		
}
				?>
			
			
			<p id="navButtonsArea4" style="text-align: center; display: none;">
<button id="prevTableButton4">Prev</button>&nbsp;&nbsp;&nbsp;<button id="nextTableButton4">Next</button>
</p>
			
	</div>


	</div>


	
<p style="text-align: center; margin-top: 50px;">
<a href="index.php"><button>Sit to Stand Exercise</button></a>
</p>
	
	<p style="text-align: center;">
<a href="/dashboard/previous-scores/index.php"><button>Upper/Lower-Limbs Previous Scores</button></a>
</p>

	
</main>
		
		<script>
		// 5 repeats
			 var noOfTables1 = "<?php echo $noOfPages1; ?>";
			if (noOfTables1 > 0) {
				var activeTable1 = 1;
			document.getElementById("resultsTable1No" + activeTable1).style.display = "block";
				
				if (noOfTables1 > 1) {
				document.getElementById("navButtonsArea1").style.display = "block";
				}
				
				document.getElementById("nextTableButton1").addEventListener("click", goToNextTable1);
				function goToNextTable1() {
					if (activeTable1 < noOfTables1) {
					document.getElementById("resultsTable1No" + activeTable1).style.display = "none";
						activeTable1++;
						document.getElementById("resultsTable1No" + activeTable1).style.display = "block";
						document.getElementById("curActivePage1").innerHTML = activeTable1;
				}
				}	
						document.getElementById("prevTableButton1").addEventListener("click", goToPrevTable1);
				function goToPrevTable1() {
					if (activeTable1 > 1) {
					document.getElementById("resultsTable1No" + activeTable1).style.display = "none";
						activeTable1--;
						document.getElementById("resultsTable1No" + activeTable1).style.display = "block";
						document.getElementById("curActivePage1").innerHTML = activeTable1;
				}
				}
			}
			
			
			
				// 10 repeats
			 var noOfTables2 = "<?php echo $noOfPages2; ?>";
			if (noOfTables2 > 0) {
				var activeTable2 = 1;
			document.getElementById("resultsTable2No" + activeTable2).style.display = "block";
				
				if (noOfTables2 > 1) {
				document.getElementById("navButtonsArea2").style.display = "block";
				}
				
				document.getElementById("nextTableButton2").addEventListener("click", goToNextTable2);
				function goToNextTable2() {
					if (activeTable2 < noOfTables2) {
					document.getElementById("resultsTable2No" + activeTable2).style.display = "none";
						activeTable2++;
						document.getElementById("resultsTable2No" + activeTable2).style.display = "block";
						document.getElementById("curActivePage2").innerHTML = activeTable2;
				}
				}	
						document.getElementById("prevTableButton2").addEventListener("click", goToPrevTable2);
				function goToPrevTable2() {
					if (activeTable2 > 1) {
					document.getElementById("resultsTable2No" + activeTable2).style.display = "none";
						activeTable2--;
						document.getElementById("resultsTable2No" + activeTable2).style.display = "block";
						document.getElementById("curActivePage2").innerHTML = activeTable2;
				}
				}
			}
			
			
						// 30 seconds
			 var noOfTables3 = "<?php echo $noOfPages3; ?>";
			if (noOfTables3 > 0) {
				var activeTable3 = 1;
			document.getElementById("resultsTable3No" + activeTable3).style.display = "block";
				
				if (noOfTables3 > 1) {
				document.getElementById("navButtonsArea3").style.display = "block";
				}
				
				document.getElementById("nextTableButton3").addEventListener("click", goToNextTable3);
				function goToNextTable3() {
					if (activeTable3 < noOfTables3) {
					document.getElementById("resultsTable3No" + activeTable3).style.display = "none";
						activeTable3++;
						document.getElementById("resultsTable3No" + activeTable3).style.display = "block";
						document.getElementById("curActivePage3").innerHTML = activeTable3;
				}
				}	
						document.getElementById("prevTableButton3").addEventListener("click", goToPrevTable3);
				function goToPrevTable3() {
					if (activeTable3 > 1) {
					document.getElementById("resultsTable3No" + activeTable3).style.display = "none";
						activeTable3--;
						document.getElementById("resultsTable3No" + activeTable3).style.display = "block";
						document.getElementById("curActivePage3").innerHTML = activeTable3;
				}
				}
			}
			
			
			// 60 seconds
			 var noOfTables4 = "<?php echo $noOfPages4; ?>";
			if (noOfTables4 > 0) {
				var activeTable4 = 1;
			document.getElementById("resultsTable4No" + activeTable4).style.display = "block";
				
				if (noOfTables4 > 1) {
				document.getElementById("navButtonsArea4").style.display = "block";
				}
				
				document.getElementById("nextTableButton4").addEventListener("click", goToNextTable4);
				function goToNextTable4() {
					if (activeTable4 < noOfTables4) {
					document.getElementById("resultsTable4No" + activeTable4).style.display = "none";
						activeTable4++;
						document.getElementById("resultsTable4No" + activeTable4).style.display = "block";
						document.getElementById("curActivePage4").innerHTML = activeTable4;
				}
				}	
						document.getElementById("prevTableButton4").addEventListener("click", goToPrevTable4);
				function goToPrevTable4() {
					if (activeTable4 > 1) {
					document.getElementById("resultsTable4No" + activeTable4).style.display = "none";
						activeTable4--;
						document.getElementById("resultsTable4No" + activeTable4).style.display = "block";
						document.getElementById("curActivePage4").innerHTML = activeTable4;
				}
				}
			}
			
		</script>

<?php include '../../../../main-footer.php';?>

		