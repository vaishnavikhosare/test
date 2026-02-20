<?php
include('../aconnection.php');
if(session_start()!=true){
    session_start();
}


$expireAfter = 1;

if(!isset($_SESSION['a_name'])){
    $user_check = $_SESSION['a_name'];
    $a_idsession = $_SESSION['a_id'];
    $secondsInactive = time() - $user_check;
    $expireAfterSeconds = $expireAfter * 6000;
    if($secondsInactive >= $expireAfterSeconds){
       session_unset();
        session_destroy();
    }
    
    header("location:index.php?error= Please Login First");
    die();
}


?>
