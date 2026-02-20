<?php if(session_start()!=true){ session_start(); } include('../aconnection.php'); $cintsertu_id=0;
if(isset($_SESSION['a_id'])){ $cintsertu_id=$_SESSION['a_id']; }

if(isset($_POST["updatepropertyimages"]) ){
    $propertyID=$_POST['propertyID'];
    if (isset($_FILES['images'])) {
        $imageCount = count($_FILES['images']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $imageName = $_FILES['images']['name'][$i];
            $imageTmpName = $_FILES['images']['tmp_name'][$i];
            $imageSize = $_FILES['images']['size'][$i];
   
$statusMsg = '';
$backlink=null;


$allowedExtensions = ['png', 'jpg', 'jpeg'];
$imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
 if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 4 * 1024 * 1024) {
        $targetDir = '../propert-images/'; // Set the correct path
        
        
$qu="INSERT INTO propertyimages(propertyID) VALUES ('$propertyID')";
            
            if ($conn->query($qu) === TRUE) {
                $cdoc_id=$conn->insert_id;
                $targetFilePath = $targetDir.$cdoc_id.".".$imageExtension;
                if(move_uploaded_file($imageTmpName, $targetFilePath)){
                    $targetDir = 'propert-images/';
                    
                    $targetFilePath = $targetDir.$cdoc_id.".".$imageExtension;
              
$q="UPDATE propertyimages SET imageUrl='$targetFilePath' WHERE imageID='$cdoc_id'" ;
                    
                    if ($con->query($q) === TRUE) {
           
 header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&fmsg=Updated Successfully!#third");
                    }else { 
                        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=File upload failed!#third");
           }
            
            }else{
                header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=File upload failed!#third");
                
            }
            }else{
                header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=File upload failed!#third");
                
            }
      
       
} else{
    header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=File Extensions not allowed!#third");
    
    
}
      
    
        }   } else{
            header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=Files Not Fill!#third");
            
            
        } }
        
        
        
        if(!empty($_FILES["profilimgfile"]["name"])){
            $cdoc_id=0;            
            $userID = $_POST['userID'];
            
            if (($_FILES["profilimgfile"]["size"] < 2000000)) {
                
                $qt = "INSERT INTO profile_images(u_id) VALUES ('$userID')";
                if($con->query($qt) === TRUE) {
                    $cdoc_id=$con->insert_id;
                }                
                $statusMsg = '';
                $backlink=null;
                $targetDir = "../user-profiles/";
                $fileName = basename($_FILES["profilimgfile"]["name"]);
                $targetFilePath = $targetDir.$fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);                
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes)){
                    
                    $targetFilePath = $targetDir.$cdoc_id.".".$fileType;
                    if(move_uploaded_file($_FILES["profilimgfile"]["tmp_name"], $targetFilePath)){
                        $targetDir = "user-profiles/";
                        $targetFilePath = $targetDir.$cdoc_id.".".$fileType;
                        $qr="UPDATE users SET profileimg='$targetFilePath' WHERE userID='$userID'" ;
                        
                        if ($conn->query($qr) === TRUE) {
                            
                            header("location:dashbord.php?userDetails&userID=$userID&msg=Uploaded Successfully!");
                        }else {
                            header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed!");
                            
                        }
                        
                    }else{
                        header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed!");
                    }
                }else{
                    header("location:dashbord.php?userDetails&userID=$userID&error=Sorry, only JPG, JPEG, PNG files are allowed to upload.");
                    
                }
            }
            else{
                header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed! File size is more than 2MB");
            }
            
        }
        
        
        
        
        if(!empty($_FILES["agentLogoFile"]["name"])){
            $cdoc_id=0;
            $userID = $_POST['userID'];
            if (($_FILES["agentLogoFile"]["size"] < 2000000)) {
                
                $qt = "INSERT INTO profile_images(u_id) VALUES ('$userID')";
                if($con->query($qt) === TRUE) {
                    $cdoc_id=$con->insert_id;
                }
                
                $statusMsg = '';
                $backlink=null;
                $targetDir = "../user-profiles/agents/";
                $fileName = basename($_FILES["agentLogoFile"]["name"]);
                $targetFilePath = $targetDir.$fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes)){
                    
                    $targetFilePath = $targetDir.$cdoc_id.".".$fileType;
                    if(move_uploaded_file($_FILES["agentLogoFile"]["tmp_name"], $targetFilePath)){
                        $targetDir = "user-profiles/agents/";
                        $targetFilePath = $targetDir.$cdoc_id.".".$fileType;
                        $qr=null;
                        $check = $conn->query("SELECT agentID FROM agents WHERE userID = '$userID'");
                        
                        if ($check && $check->num_rows > 0) { $qr="UPDATE agents SET logoImage='$targetFilePath' WHERE userID='$userID'" ;
                        }
                        else {
                            $qr="INSERT INTO agents(userID,logoImage) VALUES ('$userID','$targetFilePath')";
                        }
                        if ($conn->query($qr) === TRUE) {
                            
                            header("location:dashbord.php?userDetails&userID=$userID&msg=Uploaded Successfully!");
                        }else {
                            header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed!");
                            
                        }
                        
                    }else{
                        header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed!");
                    }
                }else{
                    header("location:dashbord.php?userDetails&userID=$userID&error=Sorry, only JPG, JPEG, PNG files are allowed to upload.");
                    
                }
            }
            else{
                header("location:dashbord.php?userDetails&userID=$userID&error=File upload failed! File size is more than 2MB");
            }
            
        }
        
        
        if (!empty($_FILES["builderLogoFile"]["name"])) {
            
            $userID = $_POST['userID'];
            if ($_FILES["builderLogoFile"]["size"] < 2000000) {
                $cdoc_id = 0;
                $qt = "INSERT INTO profile_images(u_id) VALUES ('$userID')";
                if ($con->query($qt) === TRUE) {
                    $cdoc_id = $con->insert_id;
                }
                
                $targetDir = "../user-profiles/builders/";
                $fileName = basename($_FILES["builderLogoFile"]["name"]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = ['jpg', 'png', 'jpeg'];
                
                if (in_array($fileType, $allowTypes)) {
                    $targetFilePath = $targetDir . $cdoc_id . "." . $fileType;
                    if (move_uploaded_file($_FILES["builderLogoFile"]["tmp_name"], $targetFilePath)) {
                        $targetDir = "user-profiles/builders/";
                        $targetFilePath = $targetDir . $cdoc_id . "." . $fileType;
                        $check = $conn->query("SELECT builderID FROM builders WHERE userID = '$userID'");
                        if ($check && $check->num_rows > 0) {
                            $qr = "UPDATE builders SET logoImage='$targetFilePath' WHERE userID='$userID'";
                        } else {
                            $qr = "INSERT INTO builders(userID, logoImage) VALUES ('$userID', '$targetFilePath')";
                        }
                        
                        if ($conn->query($qr) === TRUE) {
                            header("location:dashbord.php?userDetails&userID=$userID&msg=Uploaded Successfully!");
                            exit;
                        } else {
                            header("location:dashbord.php?userDetails&userID=$userID&error=DB Insert Failed!");
                            exit;
                        }
                    } else {
                        header("location:dashbord.php?userDetails&userID=$userID&error=Move Failed!");
                        exit;
                    }
                } else {
                    header("location:dashbord.php?userDetails&userID=$userID&error=Only JPG, JPEG, PNG allowed.");
                    exit;
                }
            } else {
                header("location:dashbord.php?userDetails&userID=$userID&error=File > 2MB");
                exit;
            }
        }
        
        
        if(isset($_POST["updateprofileimage"]) && !empty($_FILES["cdoc_filename"]["name"])){
 $cdoc_id=0;
            if (($_FILES["cdoc_filename"]["size"] < 1000000)) {
                
          $qt = "INSERT INTO profile_images(u_id) VALUES ('$cintsertu_id')";
                if($con->query($qt) === TRUE) {
                    $cdoc_id=$con->insert_id;
                }
                
              $statusMsg = '';
                $backlink=null;
                $targetDir = "user-profiles/";
                $fileName = basename($_FILES["cdoc_filename"]["name"]);
                $targetFilePath = $targetDir.$fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes)){
                    
                    $targetFilePath = $targetDir.$cdoc_id.".".$fileType;
                    if(move_uploaded_file($_FILES["cdoc_filename"]["tmp_name"], $targetFilePath)){
                        
                        $qr="UPDATE users SET profileimg='$targetFilePath' WHERE userID='$cintsertu_id'" ;
                        
                        if ($conn->query($qr) === TRUE) {
                            
                            header("location:dashbord.php?profile=$cintsertu_id&msg=Uploaded Successfully!");
                        }else {
                            header("location:dashbord.php?profile=$cintsertu_id&error=File upload failed!");
                            
                        }
                        
                    }else{
                        header("location:dashbord.php?profile=$cintsertu_id&error=File upload failed!");
                    }
                }else{
                    header("location:dashbord.php?profile=$cintsertu_id&error=Sorry, only JPG, JPEG, PNG files are allowed to upload.");
                    
                }
            }
            else{
                header("location:dashbord.php?profile=$cintsertu_id&error=File upload failed! File size is more than 1MB");
            }
            
        }
        
        

if(isset($_GET['path']))
{
    //Read the url
    $url = $_GET['path'];
    $pls_id = $_GET['pls_id'];
    $c_id = $_GET['c_id'];
    //Clear the cache
    clearstatcache();
    
    //Check the file path exists or not
    if(file_exists($url)) {
        
        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');
        
        //Clear system output buffer
        flush();
        
        //Read the size of the file
        readfile($url,true);
        
        
        die();
    }
    else{
        header("location:contract_documents.php?co_id=$co_id&error=File path does not exist.");
        
    }
}
// Delete image from the database



if(isset($_GET['pathex']))
{
    //Read the url
    $url = $_GET['pathex'];
   
    $exp_id = $_GET['exp_id'];
    //Clear the cache
    clearstatcache();
    
    //Check the file path exists or not
    if(file_exists($url)) {
        
        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($url).'"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');
        
        //Clear system output buffer
        flush();
        
        //Read the size of the file
        readfile($url,true);
        
        
        die();
    }
    else{
        header("location:add_expenses.php&error=File path does not exist.");
        
    }
}





?>