 <?php
session_start();
if(!isset($_SESSION['userEmail'])){
   header("Location: /");
}

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
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
	<body>
		
		<header style="margin-bottom: 80px;">
	<div id="logo"><img src="/images/logo-hor.png" /></div>
<nav id="mainNavigation">
	<a href="/therapist-dashboard/index.php">About</a>
	<a href="/therapist-dashboard/users-scores/index.php">Users Scores</a>
	<a href="/therapist-dashboard/contact.php">Contact</a>
	<a class="logoutButton" href="/therapist-dashboard/logout.php">Log out</a>
</nav>
	
	<div id="mobileNav"><button onclick="showMobileMenu()">MENU</button></div>
	<nav id="mobileNavigation" class="noDis">
	<a href="/therapist-dashboard/index.php">About</a>
	<a href="/therapist-dashboard/users-scores/index.php">Users Scores</a>
	<a href="/therapist-dashboard/contact.php">Contact</a>
	<a class="logoutButton" href="/therapist-dashboard/logout.php">Log out</a>
</nav>
			
			
				<a href="/therapist-dashboard/messages-from-trainees.php" style="position: absolute;
  top: 130px; right: 140px;"><button style="font-family: 'Roboto', sans-serif !important;
  font-size: 17px;
  background: #fff;
  border: 2px solid #fff;
  border-radius: 20px;
  padding: 10px;
  color: #0a889d;
  cursor: pointer;">Trainees' Messages</button></a>
			
			<a href="/therapist-dashboard/account.php" style="position: absolute;
  top: 130px; right: 10px;"><button style="font-family: 'Roboto', sans-serif !important;
  font-size: 17px;
  background: transparent;
  border: 2px solid #fff;
  border-radius: 20px;
  padding: 10px;
  color: #fff;
  cursor: pointer;">My Account</button></a>
</header>