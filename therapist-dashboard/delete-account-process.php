 <?php

session_start();
if(!isset($_SESSION['userEmail'])){
   header("Location: /");
}

$servername = "localhost";
$username = "body_hab_space";
$password = "a3I#g10r4";
$dbname = "body_hab_space";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

mysqli_set_charset($conn, "utf8");

$registrantEmail = $_SESSION['userEmail'];



	
	if (filter_var($registrantEmail, FILTER_VALIDATE_EMAIL)) {
				
		
		$tables = array("account_connections", "trainers_messages");
foreach($tables as $table) {
  $query = "DELETE FROM $table WHERE trainer='$registrantEmail'";
  mysqli_query($conn,$query);
}
		
$sql = "DELETE FROM therapists WHERE email = '$registrantEmail'";

if ($conn->query($sql) === TRUE) {	
	session_destroy();
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Account and all relevant data deleted!');
    window.location.href='https://body-hab.online/login.php';
    </script>");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
else {	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Problem with account authorization!');
    window.history.back();
    </script>");
} 
	 
	

$conn->close(); 
?> 





