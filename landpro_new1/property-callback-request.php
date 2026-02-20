<?php  include 'aconnection.php';



$propertyID = $_POST['propertyID'] ?? 0;
$alertMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['wsv_name'])) {
    $name = htmlspecialchars(trim($_POST['wsv_name']));
    $contact = htmlspecialchars(trim($_POST['wsv_contact']));
    $email = htmlspecialchars(trim($_POST['wsv_email']));
    
    if (!empty($name) && !empty($contact) && !empty($email)) {
        if (preg_match('/^[0-9]{10}$/', $contact)) {
            $stmt = $conn->prepare("INSERT INTO arrange_viewing (propertyID, av_name, av_email, av_contact) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $propertyID, $name, $email, $contact);
            
            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Request sent successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" Unable to send request. Try again later.</div>';
            }
            $stmt->close();
        } else {
            echo '<div class="alert alert-warning">⚠️ Invalid contact number. Please enter a 10-digit number.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">⚠️ All fields are required.</div>';
    }
}


?>
