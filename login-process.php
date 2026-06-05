    <?php      

 session_start();

$servername = "localhost";
$username = "body_hab_space";
$password = "a3I#g10r4";
$dbname = "body_hab_space";
          
        $con = mysqli_connect($servername, $username, $password, $dbname);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  


$userEmail = $_POST['emailLogin'];  
$userPassword = $_POST['passwordLogin'];  
      
        //to prevent from mysqli injection  
        $userEmail = stripcslashes($userEmail);  
        $userPassword = stripcslashes($userPassword);  
        $userEmail = mysqli_real_escape_string($con, $userEmail);  
        $userPassword = mysqli_real_escape_string($con, $userPassword);  
      
        $sql = "select * from users where email = '$userEmail' and password = '$userPassword'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

$sql2 = "select * from therapists where email = '$userEmail' and password = '$userPassword'";  
        $result2 = mysqli_query($con, $sql2);  
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);  
        $count2 = mysqli_num_rows($result2);  
          
        if($count == 1){  
               $_SESSION['userEmail'] = $userEmail;
			 $_SESSION['kindOfUser'] = "patient";
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login Successful!');
    window.location.href='/dashboard/index.php';
    </script>");  
        } else if ($count2 == 1){  
               $_SESSION['userEmail'] = $userEmail;
			 $_SESSION['kindOfUser'] = "therapist";
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login Successful!');
    window.location.href='/therapist-dashboard/index.php';
    </script>");  
        }
        else{  
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Login failed. Invalid Email or Password. Please try again.');
    window.history.back();
    </script>");  
        }     
    ?>  


