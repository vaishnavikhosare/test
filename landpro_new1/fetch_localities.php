<?php
include("aconnection.php"); // replace with actual DB config

if (isset($_POST["cityID"])) {
    $cityID = intval($_POST["cityID"]);
    
    $query = "SELECT * FROM localities WHERE cityID = $cityID ORDER BY localityName ASC";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Select Locality</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['localityID'] . '">' . $row['localityName'] . '</option>';
        }
    } else {
        echo '<option value="">No localities found</option>';
    }
}
?>
