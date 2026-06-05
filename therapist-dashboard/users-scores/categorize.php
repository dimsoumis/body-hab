
<?php include '../loggedin-head.php'; ?>

 <?php

$servername = "localhost";
$username = "body_hab_space";
$password = "a3I#g10r4";
$dbname = "body_hab_space";
          
   $con = mysqli_connect($servername, $username, $password, $dbname);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  

$user = $_SESSION['chosenTraineeEmail'];   
      
        //to prevent from mysqli injection  
        $user = stripcslashes($user);    
        $user = mysqli_real_escape_string($con, $user); 


 $sql1 = "select * from categorize where user = '$user' ORDER BY reg_date DESC";  
        $result1 = mysqli_query($con, $sql1);  
        $count1 = mysqli_num_rows($result1);



$sqlStats = "select * from categorize where user = '$user'";  
        $resultStats = mysqli_query($con, $sqlStats);  
        $countStats = mysqli_num_rows($resultStats);





$maxScoreRight = 0;
	$maxScoreLeft = 0;
	$minScoreRight = 5000;
	$minScoreLeft = 5000;
	$averageScoreRight = 0;
	$averageScoreLeft = 0;
$rightScoresCounter = 0;
$leftScoresCounter = 0;
 $maxScoreRightDate = 0;
 $maxScoreLeftDate = 0;
 $minScoreRightDate = 0;
 $minScoreLeftDate = 0;

		while($row = mysqli_fetch_array($resultStats)) {
		
			$actualScore = $row['score'];
			$actualHand = $row['hand'];
			
		
			if ($actualHand == "Right") {
				if ($actualScore > $maxScoreRight) {
					$maxScoreRight = $actualScore;
					$dateOfmaxR=$row['reg_date'];
					 $maxScoreRightDate = date('d-m-Y', strtotime($dateOfmaxR));
				}
				
				$averageScoreRight = $averageScoreRight + $actualScore;
				$rightScoresCounter++;
				
			} else {
			if ($actualScore > $maxScoreLeft) {
					$maxScoreLeft = $actualScore;
				$dateOfmaxL=$row['reg_date'];
					 $maxScoreLeftDate = date('d-m-Y', strtotime($dateOfmaxL));
				}	
				
				$averageScoreLeft = $averageScoreLeft + $actualScore;
				$leftScoresCounter++;
					
			}
		
		
			if ($actualHand == "Right") {
				if ($actualScore < $minScoreRight) {
					$minScoreRight = $actualScore;
						$dateOfminR=$row['reg_date'];
					 $minScoreRightDate = date('d-m-Y', strtotime($dateOfminR));
				}
			} else {
			if ($actualScore < $minScoreLeft) {
					$minScoreLeft = $actualScore;
					$dateOfminL=$row['reg_date'];
					 $minScoreLeftDate = date('d-m-Y', strtotime($dateOfminL));
				}	
			} 
			
		
			}

if ($rightScoresCounter != 0) {
			$averageScoreRight = $averageScoreRight / $rightScoresCounter;
}
if ($leftScoresCounter != 0) {
			$averageScoreLeft = $averageScoreLeft / $leftScoresCounter;	
	}

?>

		
		
<main>
	
	<h1 id="pageTitle">Categorize</h1>
	
<p style="text-align: center;">Chosen Trainee: <u><?php echo $user; ?></u></p>
	
	<p style="text-align: center;"><a href="index.php"><button>Change Trainee</button></a></p>
	
<p style="text-align: center;">Check the scores that your trainee has achieved.</p>
	
<div class="row">
				<div class="column1">
				<h3 style="text-align: center;">Statistics</h3>
				<?php if($countStats > 0) {
		echo "<table>
					<tr>
						<th>Max Score (Right)</th>
		<th>Min Score (Right)</th>
			<th>Average Score (Right)</th>
					</tr>";
	

			
			
			echo "<tr><td>";
			
	if($maxScoreRightDate == 0) {
		echo "0";
		} else {
			echo $maxScoreRight;
	
			echo " (on ";
		echo $maxScoreRightDate;
			echo ")";
	}
			
			echo "</td><td>";
			
	if($minScoreRightDate == 0) {
		echo "0";
		} else {
			echo $minScoreRight;
	
		echo " (on ";
		echo $minScoreRightDate;
			echo ")";
			}
			echo "</td><td>";
			
		if($maxScoreRightDate == 0 && $minScoreRightDate == 0) {
		echo "0";
		} else {
			echo $averageScoreRight;
		}
			echo "</td></tr>";
	
	
	
		echo "<tr>
		<th>Max Score (Left)</th>
		<th>Min Score (Left)</th>
		<th>Average Score (Left)</th>
					</tr>";
	
	
			
			echo "<tr><td>";
			if($maxScoreLeftDate == 0) {
		echo "0";
		} else {
			echo $maxScoreLeft;
	
		echo " (on ";
		echo $maxScoreLeftDate;
			echo ")";
			}
			echo "</td><td>";
			if($minScoreLeftDate == 0) {
		echo "0";
		} else {
			echo $minScoreLeft;
			
		echo " (on ";
		echo $minScoreLeftDate;
			echo ")";
			}
			echo "</td><td>";
			
	if($maxScoreLeftDate == 0 && $minScoreLeftDate == 0) {
		echo "0";
		} else {
			echo $averageScoreLeft;
	}
			echo "</td></tr>";
	
	echo "</table>";
		} else {
		echo "<p style='text-align: center;'>There are no scores saved yet.</p>";		
}
				?>
				
			</div>
	
	</div>
	
	
	
	
	
	
	
	
		<div class="row">

		<div class="column1">
		<h3 style="text-align: center;">Individual Scores</h3>
		<?php if($count1 > 0) {
	
	
	
	
	
	
	
	
	$noOfPages = intdiv($count1, 20);
	
	if (fmod($count1, 20) > 0) {
	$noOfPages = $noOfPages + 1;
	}
	
	$currentPage = 1;
	
	
	

	
	
	
	$x2 = 0;
	for ($x = 1; $x <= $noOfPages; $x++) {
	
		
		$sqlLoop = "select * from categorize where user = '$user' ORDER BY reg_date DESC LIMIT 20 OFFSET $x2";  
        $resultLoop = mysqli_query($con, $sqlLoop);  
        $countLoop = mysqli_num_rows($resultLoop);
		$x2 = $x2 + 20;
		
echo "<table style='display: none;' id='resultsTableNo";
echo $x;
echo "'>
					<tr>
						<th>Score</th>
					<th>Hand</th>
						<th>Date</th>
					</tr>";
		
		while($rowLoop = mysqli_fetch_array($resultLoop))
{
			
				
			
					echo "<tr><td>";
					echo $rowLoop['score'];
			echo "</td><td>";
				echo $rowLoop['hand'];
	echo "</td><td>";	
			
$dateOfX=$rowLoop['reg_date'];
echo date('H:i / d-m-Y', strtotime($dateOfX));
			
	echo "</td></tr>";
			
				
				}
echo "</table>";
	}
	
	
	
	
	
	
	
	
	
	
	
	echo "<br><p style='text-align: center;'> Page <span id='curActivePage'>";
	echo $currentPage;
	echo "</span> of ";
	echo $noOfPages;	
	echo "</p>";
			
			
			
			
			
			
			
			
			
			
			
			
		} 	else {
		echo "<p>There are no scores saved yet.</p>";		
}
				?>
			
	</div>


	</div>
	

<p id="navButtonsArea" style="text-align: center; display: none;">
<button id="prevTableButton">Prev</button>&nbsp;&nbsp;&nbsp;<button id="nextTableButton">Next</button>
</p>
	
	<hr>
	
	<p style="text-align: center;">
<a href="user-scores.php"><button>Upper/Lower-Limbs Previous Scores</button></a>
</p>


	
</main>
		
		<script>
		
			 var noOfTables = "<?php echo $noOfPages; ?>";
			if (noOfTables > 0) {
				var activeTable = 1;
			document.getElementById("resultsTableNo" + activeTable).style.display = "block";
				
				if (noOfTables > 1) {
				document.getElementById("navButtonsArea").style.display = "block";
				}
				
				document.getElementById("nextTableButton").addEventListener("click", goToNextTable);
				function goToNextTable() {
					if (activeTable < noOfTables) {
					document.getElementById("resultsTableNo" + activeTable).style.display = "none";
						activeTable++;
						document.getElementById("resultsTableNo" + activeTable).style.display = "block";
						document.getElementById("curActivePage").innerHTML = activeTable;
				}
				}	
						document.getElementById("prevTableButton").addEventListener("click", goToPrevTable);
				function goToPrevTable() {
					if (activeTable > 1) {
					document.getElementById("resultsTableNo" + activeTable).style.display = "none";
						activeTable--;
						document.getElementById("resultsTableNo" + activeTable).style.display = "block";
						document.getElementById("curActivePage").innerHTML = activeTable;
				}
				}
			}
			
		</script>

<?php include '../../main-footer.php';?>
