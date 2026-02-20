<?php

$db = "landpro1";
$dbpass = '';
$dbuser = 'root';

$sitetitlename = "Bharatiya Properties";

$conn = new mysqli("localhost", $dbuser, $dbpass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
