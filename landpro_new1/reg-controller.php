<?php  if(session_start()!=true){ session_start(); }
include('aconnection.php');
date_default_timezone_set('Europe/London');
$cdate=date("Y-m-d");

if (isset($_POST['firstname'])) {  
    
    
    
    
    $myusername = str_replace("'", "&#039;", $_POST['username']);
    $mypassword = $_POST['password'];
    $fname = str_replace("'", "&#039;", $_POST['firstname']);
    $lname = str_replace("'", "&#039;", $_POST['contact']);
    $userType = $_POST['userType'];
    
    $mypassword = password_hash($mypassword, PASSWORD_DEFAULT);
    
    $sql = "SELECT * FROM users WHERE email = '$myusername' ";
    $result = mysqli_query($con,$sql);
    if ($row = mysqli_fetch_array($result)) {
        $con->close();
        echo 'Email already used. Please Try Again with other email!';
        exit;
        
    } else {
        
        $qt = "INSERT INTO users(username, contact, email, password, registrationDate, userStatus, userType)
            VALUES ('$fname', '$lname', '$myusername', '$mypassword', '$cdate', 'Active', '$userType')";
        
        if ($conn->query($qt) === TRUE) {
            $cintsertu_id = $conn->insert_id;
            $_SESSION['u_id'] = $cintsertu_id;
            $_SESSION['u_name'] = $fname;
            $_SESSION['userType'] = $userType;
            $conn->close();
         
            echo 'success';
            exit;
        } else {
        
            echo 'Error in creating Account. Please Try Again!';
            exit;
        }
    } }

    if (isset($_POST['subemail'])) {
       $myusername=$_POST['subemail'];
            $qt = "INSERT INTO property_alert(pa_email,pa_date)
            VALUES ('$myusername','$cdate')";
            
            if ($conn->query($qt) === TRUE) {
 $conn->close();
          
                echo 'success';
                exit;
            } else {
       
                echo 'Error in generating subscription. Please Try Again!';
                exit;
            }
        } 
    
        if(isset($_POST['submitarrangeviewing'])) {
            if($_POST['yourname']==null||$_POST['youremail']==null||$_POST['contactno']==null) {
                echo 'Error! Please Try Again!';
                exit;
            }else {
                $cdate=date("Y-m-d");
                $propertyType=str_replace("'","&#039", $_POST['yourname']);
                $propertyStyle=str_replace("'","&#039", $_POST['youremail']);
                $office=str_replace("'","&#039", $_POST['contactno']);
                $street=str_replace("'","&#039", $_POST['pdate']);
                $city=str_replace("'","&#039", $_POST['yourmessage']);
           
               $qt="INSERT INTO arrange_viewing(av_name,av_email,av_contact,av_date,av_remark,av_submitt_date)
VALUES ('$propertyType','$propertyStyle','$office','$street','$city','$cdate')";
                
                if($conn->query($qt) === TRUE) {
                    $conn->close();
                    echo 'success';
                    exit;
                }
                else {
                    
        
                    $conn->close();
                    echo 'Error! Please Try Again!';
                    exit;
                }
            } }
    ?>
