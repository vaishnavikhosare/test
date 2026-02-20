<?php

function convertdate($date){
    $timestamp = strtotime($date);
$new_date = date("d/m/Y", $timestamp);
echo $new_date;
}


?>