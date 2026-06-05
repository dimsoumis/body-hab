 <?php
session_start();
if(!isset($_SESSION['userEmail'])){
   header("Location: /");
}

$servername = "localhost";
$username = "body_hab_space";
$password = "a3I#g10r4";
$dbname = "body_hab_space";
          
   $con = mysqli_connect($servername, $username, $password, $dbname);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  

$userEmail = $_SESSION['userEmail'];  
      
        //to prevent from mysqli injection  
        $userEmail = stripcslashes($userEmail);    
        $userEmail = mysqli_real_escape_string($con, $userEmail); 


 $sql = "select * from users where email = '$userEmail'";  
        $result = mysqli_query($con, $sql);  
        $count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
	<title>Body-Hab - Rehabilitation Assessment Platform</title>
	<link rel="icon" type="image/x-icon" href="/images/favicon.png">
	<link rel="stylesheet" href="/styles/main.css">
	<link rel="stylesheet" href="/styles/responsive.css">
	
		<script src="/scripts/main.js" type="text/javascript"></script> 
		<script src="/scripts/sweetalert2.all.min.js" type="text/javascript"></script> 
</head>
	<body>
		
		<header style="margin-bottom: 80px;">
	<div id="logo"><img src="/images/logo-hor.png" /></div>
<nav id="mainNavigation">
	<a href="/dashboard/index.php">About</a>
	<a href="/dashboard/exercises/index.php">Exercises</a>
	<a href="/dashboard/previous-scores/index.php">Previous Scores</a>
	<a href="/dashboard/contact.php">Contact</a>
	<a class="logoutButton" href="/dashboard/logout.php">Log out</a>
</nav>
	
	<div id="mobileNav"><button onclick="showMobileMenu()">MENU</button></div>
	<nav id="mobileNavigation" class="noDis">
	<a href="/dashboard/index.php">About</a>
	<a href="/dashboard/exercises/index.php">Exercises</a>
	<a href="/dashboard/previous-scores/index.php">Previous Scores</a>
	<a href="/dashboard/contact.php">Contact</a>
	<a class="logoutButton" href="/dashboard/logout.php">Log out</a>
</nav>
			
			<a href="/dashboard/account.php"><button style="position: absolute;
  top: 130px;
  font-family: 'Roboto', sans-serif !important;
  font-size: 17px;
  background: transparent;
  border: 2px solid #fff;
  border-radius: 20px;
  padding: 10px;
  color: #fff;
  cursor: pointer;
  right: 10px;">My Account</button></a>
</header>




		
		<main id="changeInformationPage">
<h1 id="pageTitle">Change Information</h1>
			<p style="text-align: center;">Change below all the information you want, and submit the new data (the email of the account cannot change).</p>
	<div class="row">
		<div style="justify-content: center;
  display: flex;" class="column1">
			
				 <form style="max-width: 500px;
  width: 90%;
  text-align: center;" id="formaAllagisStoiheion" name="formaAllagisStoiheion" action="change-information-process.php"  method="POST">
					 
					 
					 
					 
					 	<?php if($count > 0) {
	
		
		while($row = mysqli_fetch_array($result)) {
			echo "<input id='firstNameRegister' name='firstNameRegister' type='text' placeholder='First Name' value='";
			echo $row['firstname'];
			echo "'><input id='lastNameRegister' name='lastNameRegister' type='text' placeholder='Last Name' value='";
	echo $row['lastname'];
			echo "'><input id='ageRegister' name='ageRegister' type='number' placeholder='Age' value='";
	echo $row['age'];
			echo "'><select id='genderRegister' name='genderRegister'>
  <option value='male' ";
			if ($row['gender'] == 'male') {
				echo "selected";
			}
			echo ">Male</option>
  <option value='female' ";
			if ($row['gender'] == 'female') {
				echo "selected";
			}
			echo ">Female</option>
</select>";
			echo "<select id='statusRegister' name='statusRegister'>
  <option value='healthy' ";
					if ($row['status'] == 'healthy') {
				echo "selected";
			}
				echo ">Healthy</option>
  <option value='patient' ";
					if ($row['status'] == 'patient') {
				echo "selected";
			}
				echo ">Patient</option>
</select>";
		
		}
	
		} 	else {
		echo "<p>There are no information.</p>";		
}
				?>
					 
			   <input id="sendButton" type="submit" value="Submit">
			 </form>
</div> 
	</div>
	

	
</main>
		
		

		

			



<?php include '../main-footer.php';?>
