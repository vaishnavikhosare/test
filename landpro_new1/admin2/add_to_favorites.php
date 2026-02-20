<?php  if(session_start()!=true){ session_start(); } include('../aconnection.php');
$cdate=date("Y-m-d");
$cintsertu_id=0;
if(isset($_SESSION['a_id'])){ $cintsertu_id=$_SESSION['a_id']; }else{header("location:login.php?error=Please login first to add properties as favourite");}

if (isset($_GET['removeProp'])) {
    $favoriteID=$_GET['favoriteID'];
    $q="DELETE FROM usersfavprop WHERE favoriteID='$favoriteID'";
    if($con->query($q) === TRUE){
        $con->close();
        header("location:dashbord.php?favorite=&msg=Removed Successfully!");
    }else { $con->close();
    header("location:dashbord.php?favorite=&alert=Error in remove Favorite property!");
    }
    
}

if (isset($_GET['favpropertyID'])) {
    $userID = $_GET['userID'];
    $propertyID = $_GET['favpropertyID'];
    $filename = $_GET['filename'];
    $trimmedUrl=$filename;
    if(isset($_GET['propertyDepartment'])){ $trimmedUrl=$trimmedUrl."&propertyDepartment=".$_GET['propertyDepartment']; }
    if(isset($_GET['pricerange'])){ $trimmedUrl=$trimmedUrl."&pricerange=".$_GET['pricerange']; }
    if(isset($_GET['areasearch'])){
        $trimmedUrl=$trimmedUrl."&areasearch=".$_GET['areasearch']; }
        $position = strpos($trimmedUrl, '&alert=');
        if ($position !== false) {    $trimmedUrl = substr($trimmedUrl, 0, $position);  } else {
            $trimmedUrl = $trimmedUrl;   }
            
            
            $st=0;
            $qe="SELECT * FROM usersfavprop WHERE userId='$userID' AND propertyID='$propertyID'";
            $resultpe = mysqli_query($conn,$qe);
            $rowpe = mysqli_fetch_array($resultpe);
            if($rowpe){
                $favoriteID=$rowpe['favoriteID'];
                $q="DELETE FROM usersfavprop WHERE favoriteID='$favoriteID'";
                if($con->query($q) === TRUE){
                    $con->close();
                    if (strpos($trimmedUrl, '?') !== false) {
                        header("location:$trimmedUrl&alert=Property removed from favorites!#fav$propertyID");
                    }else {
                        header("location:$trimmedUrl?alert=Property removed from favorites!#fav$propertyID");
                    }
                }else {
                    echo"Error: " . $qt . "<br>" . $con->error;
                    $con->close();
                    if (strpos($trimmedUrl, '?') !== false) {
                        header("location:$trimmedUrl&alert=Error in removing property from favorites!#fav$propertyID");
                    }else {
                        header("location:$trimmedUrl?alert=Error in removing property from favorites!#fav$propertyID");
                    }
                }
                
                
            } else {
                $qt="INSERT INTO usersfavprop (userID,propertyID,adate) VALUES ('$userID','$propertyID','$cdate')";
                
                if($conn->query($qt) === TRUE) {
                    $conn->close(); if (strpos($trimmedUrl, '?') !== false) {
                        header("location:$trimmedUrl&alert=Property added to favorites!#fav$propertyID");
                    }else {
                        header("location:$trimmedUrl?alert=Property added to favorites!#fav$propertyID");
                    }
                }
                else {
                    echo"Error: " . $qt . "<br>" . $conn->error;
                    $conn->close(); if (strpos($trimmedUrl, '?') !== false) {
                        header("location:$trimmedUrl&alert=Error adding property to favorites!#fav$propertyID");
                    }else {
                        header("location:$trimmedUrl?alert=Error adding property to favorites!#fav$propertyID");
                    }
                }
                
            }
            
            
}

?>
