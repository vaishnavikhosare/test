<?php

if(session_start()!=true){
    session_start();
}


$expireAfter = 1;

if(!isset($_SESSION['u_name'])){
    $user_check = $_SESSION['u_name'];
    $u_idsession = $_SESSION['u_id'];
    $secondsInactive = time() - $user_check;
    
    $expireAfterSeconds = $expireAfter * 6000;
    
    if($secondsInactive >= $expireAfterSeconds){
        
        session_unset();
        session_destroy();
    }
    
    header("location:login.php?error= Please Login First");
    die();
}


?>
