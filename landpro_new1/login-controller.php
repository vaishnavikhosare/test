<?php  if(session_start()!=true){ session_start(); }
include('aconnection.php');
date_default_timezone_set('Europe/London');
$cdate=date("Y-m-d");

if (isset($_POST['username']) && isset($_POST['password'])) {

    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$myusername'";
    $result = mysqli_query($con,$sql);
    if ($row = mysqli_fetch_array($result)) {
        $storedHashedPassword=$row['password'];
        if (password_verify($mypassword, $storedHashedPassword)) {
           
            $_SESSION['u_id']=$row['userID'];
            $_SESSION['u_name']=$row['username'];
            
          
            echo 'success';
            exit; 
        } else {
        
            echo 'Invalid password';
            exit;
        }
    } else {

        echo 'User not found';
        exit;
    }
} else {

    echo 'Fill required fields';
    exit;
}

?>
