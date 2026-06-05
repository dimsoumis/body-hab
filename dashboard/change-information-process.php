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

$registrantFirstName = $_POST['firstNameRegister'];
$registrantLastName = $_POST['lastNameRegister'];
$registrantAge = $_POST['ageRegister'];
$registrantGender = $_POST['genderRegister'];
$registrantStatus = $_POST['statusRegister'];

$registrantEmail = $_SESSION['userEmail'];

if (empty($registrantAge) OR empty($registrantGender) OR empty($registrantStatus)) {	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Try again, there were empty necessary fields');
    window.history.back();
    </script>");
} else {
	

	
	$sql = "UPDATE users SET firstname = '$registrantFirstName', lastname = '$registrantLastName', age = '$registrantAge', gender = '$registrantGender', status = '$registrantStatus' WHERE email = '$registrantEmail'";


if ($conn->query($sql) === TRUE) {	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Record updated successfully!');
    window.location.href='https://body-hab.online/dashboard/account.php';
    </script>");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
	
	

	 
	



$conn->close(); 
?> 





