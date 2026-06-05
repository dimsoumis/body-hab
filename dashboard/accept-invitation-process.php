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


$rowID = $_POST['rowID'];


 $sql = "UPDATE account_connections SET verified = 'By Both' WHERE id = '$rowID'";  


if ($con->query($sql) === TRUE) {	
	echo true;
} else {
  echo false;
}

?>
