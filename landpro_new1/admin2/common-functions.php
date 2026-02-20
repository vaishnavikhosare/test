<?php 

function getPropertyIDByToken($token, $conff) {
    
    $query = "SELECT propertyID FROM properties WHERE propertyToken = ?";
    $stmt = $conff->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['propertyID'];
    } else {
        return null;
    }
    
    

}



function getPropertyApplicationCount($propertyID, $conff) {
    
    $query = "SELECT COUNT(*) as application_count FROM arrange_viewing WHERE propertyID = ?";
    $stmt = $conff->prepare($query);
    $stmt->bind_param("i", $propertyID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['application_count'];
    } else {
        return 0;
    } }