<?php if(session_start()!=true){ session_start(); }
include('../aconnection.php');
date_default_timezone_set('Europe/London');
$cdate=date("Y-m-d");

$cintsertu_id=1;

$cintsertu_id=$_SESSION['a_id'];

if(isset($_POST['updatepropertystatus'])) {
    $propertyToken=$_POST['propertyToken'];
    $isAproved=$_POST['isApproved'];
    $propertCategory=$_POST['propertCategory'];
    
    $qt="UPDATE properties SET isApproved='$isAproved' WHERE propertyToken='$propertyToken'";
    if($conn->query($qt) === TRUE) {
        $conn->close();
        
        header("location:dashbord.php?addproperty&propertyID=$propertyToken&propertCategory=$propertCategory&msg=Updated Successfully");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty&propertyID=$propertyToken&propertCategory=$propertCategory&error=Invalid data!");
    }
}



if(isset($_POST['upadtepropertyfirst'])) {
    $propertyFor=$_POST['propertyFor'];
    $isAproved=$_POST['isAproved'];
    $featuredProperty=$_POST['featuredProperty'];
    $propertyID=$_POST['propertyID'];
    $propertyType=str_replace("'","&#039", $_POST['propertyType']);
    $propertyStyle=str_replace("'","&#039", $_POST['propertyStyle']);
    $office=str_replace("'","&#039", $_POST['office']);
    $street=str_replace("'","&#039", $_POST['street']);
    $city=str_replace("'","&#039", $_POST['city']);
    $country=str_replace("'","&#039", $_POST['country']);
    $neighbourhood=str_replace("'","&#039", $_POST['neighbourhood']);
    $pcode=str_replace("'","&#039", $_POST['pcode']);
    $latitude=str_replace("'","&#039", $_POST['latitude']);
    $longitude=str_replace("'","&#039", $_POST['longitude']);
    
    $qt="UPDATE properties SET isAproved='$isAproved',featuredProperty='$featuredProperty',propertyFor='$propertyFor',propertyType='$propertyType',propertyStyle='$propertyStyle',addressNumber='$office',
addressStreet='$street',addressCity='$city',country='$country',neighbourhood='$neighbourhood',addressPostcode='$pcode',latitude='$latitude',
longitude='$longitude' WHERE propertyID='$propertyID'";
    if($conn->query($qt) === TRUE) {
        $conn->close();
        
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&msg=Updated Successfully");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&error=Invalid data!");
    }
}



if(isset($_POST['upadtepropertysecond'])) {
    $propertyFor=$_POST['price'];
    $propertyID=$_POST['propertyID'];
    $propertyType=str_replace("'","&#039", $_POST['rentFrequency']);
    $propertyStyle=str_replace("'","&#039", $_POST['availability']);
    $office=str_replace("'","&#039", $_POST['fullDescription']);
    $propertyTitle=str_replace("'","&#039", $_POST['propertyTitle']);
    $street=str_replace("'","&#039", $_POST['floorArea']);
    $mainSummary=str_replace("'","&#039", $_POST['mainSummary']);
    $city=str_replace("'","&#039", $_POST['floorAreaUnits']);
    $country=str_replace("'","&#039", $_POST['propertyReceptionRooms']);
    $neighbourhood=str_replace("'","&#039", $_POST['propertyBedrooms']);
    $pcode=str_replace("'","&#039", $_POST['propertyBathrooms']);
    $latitude=str_replace("'","&#039", $_POST['propertyEnsuites']);
    $longitude=str_replace("'","&#039", $_POST['propertyKitchens']);
    $propertyAge=str_replace("'","&#039", $_POST['propertyAge']);
    $qt="UPDATE properties SET propertyTitle='$propertyTitle',mainSummary='$mainSummary',price='$propertyFor',rentFrequency='$propertyType',availability='$propertyStyle',fullDescription='$office',
floorArea='$street',propertyAge='$propertyAge',floorAreaUnits='$city',propertyReceptionRooms='$country',propertyBedrooms='$neighbourhood',propertyBathrooms='$pcode',propertyEnsuites='$latitude',
propertyKitchens='$longitude' WHERE propertyID='$propertyID'";
    if($conn->query($qt) === TRUE) {
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&amsg=Updated Successfully!#second");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&amsg=Invalid data!#second");
    }
}

if(isset($_POST['userregister'])) {
    
    $question=str_replace("'","&#039", $_POST['typeotp']);
    $answer=str_replace("'","&#039", $_SESSION['validate']);
    $answer=substr($answer,0,9);
    $answer=substr($answer,4,9);
    $answer=(int)$answer-24976;
    
    
    if($question==$answer){
        
        $myusername =str_replace("'","&#039", $_SESSION['email']);
        $mypassword =$_SESSION['password'];
        $fname =str_replace("'","&#039",  $_SESSION['name']);
        $lname =str_replace("'","&#039", $_SESSION['contact']);
        $mypassword= password_hash($mypassword, PASSWORD_DEFAULT);
        
        $qt="INSERT INTO users(username,contact,email,password,registrationDate)
VALUES ('$fname','$lname','$myusername','$mypassword','$cdate')";
        
        if($conn->query($qt) === TRUE) {
            $cintsertu_id=$conn->insert_id;
            $_SESSION['a_id']=$cintsertu_id;
            $_SESSION['a_name']=$fname;
            unset($_SESSION['contact']);unset($_SESSION['name']);
            unset($_SESSION['validate']); unset($_SESSION['email']); unset($_SESSION['password']);
            $conn->close();
            
            header("location:dashbord.php");
        }
        else {
            echo $conn->error;
            //  header("location:register.php?error=Error in creating Account. Please Try Again !");
        }
        
    } else {
        header("location:register.php?error=OTP Verification Failed. Please Try Again !");
        
        
    } }
    
    
    
    if (isset($_POST['registernew'])){
        $designation=$_POST['designation'];
        
        $name=$_POST['firstname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        
        
        
        $sql = "SELECT * FROM admin WHERE adminemail = '$email' ";
        $result = mysqli_query($conn,$sql);
        if ($row = mysqli_fetch_array($result)) {
            $conn->close();
            header("location:dashbord.php?team=$cintsertu_id&error=Email Already Used!");
            
        }
        else{
            if ($cpassword==$password){
                $mypassword= password_hash($password, PASSWORD_DEFAULT);
                $qt="INSERT INTO admin(adminName,adminDeg,adminemail,adminPass)
VALUES ('$name','$designation','$email','$mypassword')";
                if($conn->query($qt) === TRUE) {
                    $conn->close();
                    header("location:dashbord.php?team=$cintsertu_id&msg=Inserted Successfully");
                }   else{
                    echo $conn->error;
                }
                
            }else{
                header("location:dashbord.php?team=$cintsertu_id&error=Passwords Dose't Matched !");
            }
            
            
        }
        
        
    }
    
    
    
    if(isset($_POST['logincheck'])) {
        
        
        
        $question=$_POST['question'];
        $answer=$_POST['answer'];
        $answer=substr($answer,0,7);
        $answer=substr($answer,4,7);
        $answer=(int)$answer-124;
        
        if($question==$answer){
            
            $myusername =$_POST['username'];
            $mypassword =$_POST['password'];
            
            $sql = "SELECT * FROM admin WHERE adminemail = '$myusername'";
            $result = mysqli_query($conn
        ,$sql);
            if ($row = mysqli_fetch_array($result)) {
                $storedHashedPassword=$row['adminPass'];
                $u_status=$row['adminStatus'];
                
                if($u_status==1){
                    
                    if (password_verify($mypassword, $storedHashedPassword)) {
                        
                        
                        $_SESSION['a_id']=$row['adminID'];
                        $_SESSION['a_name']=$row['adminName'];
                        $conn->close();
                        
                        echo "session set";
                        header("location:dashbord.php");
                        
                    }else {
                        $conn->close();
                        header("location:index.php?error=Your Account is Deactivated by Admin");
                    }
                }else {
                    $conn->close();
                    header("location:index.php?error=Your Password is invalid");
                }
            }else {
                $conn->close();
                header("location:index.php?error=Your Username Name is invalid");
            }
            
            
        } else {
            header("location:index.php?error=Enter Correct Answer !");
            
            
        } }
        
        if (isset($_POST['updateAgentProfile2'])) {
            // Fetch user ID from session or context
            $userID = $_POST['userID'];
            
            // Collect and sanitize inputs
            $agencyName        = str_replace("'", "&#039", $_POST['agencyName']);
            $licenseNumber     = str_replace("'", "&#039", $_POST['licenseNumber']);
            $operatinSince     = intval($_POST['operatinSince']);
            $publicEmail       = str_replace("'", "&#039", $_POST['publicEmail']);
            $publicContact     = str_replace("'", "&#039", $_POST['publicContact']);
            $website           = str_replace("'", "&#039", $_POST['website']);
            $profileDescription= str_replace("'", "&#039", $_POST['profileDescription']);
            $socialFacebook    = str_replace("'", "&#039", $_POST['socialFacebook']);
            $socialLinkedIn    = str_replace("'", "&#039", $_POST['socialLinkedIn']);
            $socialInstagram   = str_replace("'", "&#039", $_POST['socialInstagram']);
            
            // Check if agent record exists
            $check = $conn->query("SELECT agentID FROM agents WHERE userID = '$userID'");
            
            if ($check && $check->num_rows > 0) {
                // Update existing agent
                $qt = "UPDATE agents SET
                agencyName = '$agencyName',
                licenseNumber = '$licenseNumber',
                operatinSince = '$operatinSince',
                publicEmail = '$publicEmail',
                publicContact = '$publicContact',
                website = '$website',
                profileDescription = '$profileDescription',
                socialFacebook = '$socialFacebook',
                socialLinkedIn = '$socialLinkedIn',
                socialInstagram = '$socialInstagram'
            WHERE userID = '$userID'";
            } else {
                // Insert new agent
                $qt = "INSERT INTO agents (
                userID, agencyName, licenseNumber, operatinSince,
                publicEmail, publicContact, website, profileDescription,
                socialFacebook, socialLinkedIn, socialInstagram
            ) VALUES (
                '$userID', '$agencyName', '$licenseNumber', '$operatinSince',
                '$publicEmail', '$publicContact', '$website', '$profileDescription',
                '$socialFacebook', '$socialLinkedIn', '$socialInstagram'
            )";
            }
            
            if ($conn->query($qt) === TRUE) {
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&msg=Agent Profile Updated Successfully!");
                exit;
            } else {
                $error = $conn->error;
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&error=Agent Profile Update Failed! $error");
                exit;
            }
        }
        
        if (isset($_POST['updateBuilderProfile2'])) {
            $userID = $_POST['userID'];
            
            $companyName       = str_replace("'", "&#039", $_POST['companyName']);
            $reraID            = str_replace("'", "&#039", $_POST['reraID']);
            $registrationNo    = str_replace("'", "&#039", $_POST['registrationNo']);
            $establishedYear   = intval($_POST['establishedYear']);
            $publicEmail       = str_replace("'", "&#039", $_POST['publicEmail']);
            $publicContact     = str_replace("'", "&#039", $_POST['publicContact']);
            $website           = str_replace("'", "&#039", $_POST['website']);
            $headOfficeAddress = str_replace("'", "&#039", $_POST['headOfficeAddress']);
            $aboutUs           = str_replace("'", "&#039", $_POST['aboutUs']);
            $socialFacebook    = str_replace("'", "&#039", $_POST['socialFacebook']);
            $socialLinkedIn    = str_replace("'", "&#039", $_POST['socialLinkedIn']);
            $socialInstagram   = str_replace("'", "&#039", $_POST['socialInstagram']);
            
            // Check if builder exists
            $check = $conn->query("SELECT builderID FROM builders WHERE userID = '$userID'");
            
            if ($check && $check->num_rows > 0) {
                $qt = "UPDATE builders SET
            companyName = '$companyName',
            reraID = '$reraID',
            registrationNo = '$registrationNo',
            establishedYear = '$establishedYear',
            publicEmail = '$publicEmail',
            publicContact = '$publicContact',
            website = '$website',
            headOfficeAddress = '$headOfficeAddress',
            aboutUs = '$aboutUs',
            socialFacebook = '$socialFacebook',
            socialLinkedIn = '$socialLinkedIn',
            socialInstagram = '$socialInstagram'
        WHERE userID = '$userID'";
            } else {
                $qt = "INSERT INTO builders (
            userID, companyName, reraID, registrationNo, establishedYear,
            publicEmail, publicContact, website, headOfficeAddress, aboutUs,
            socialFacebook, socialLinkedIn, socialInstagram
        ) VALUES (
            '$userID', '$companyName', '$reraID', '$registrationNo', '$establishedYear',
            '$publicEmail', '$publicContact', '$website', '$headOfficeAddress', '$aboutUs',
            '$socialFacebook', '$socialLinkedIn', '$socialInstagram'
        )";
            }
            
            if ($conn->query($qt) === TRUE) {
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&msg=Builder Profile Updated Successfully!");
                exit;
            } else {
                $error = $conn->error;
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&error=Update Failed! $error");
                exit;
            }
        }
        
        if(isset($_POST['updatemainprodetails2'])) {
            echo "updatemainprodetails2";
            $userID=$_POST['userID'];
            $propertyFor=$_POST['username'];
            $propertyID=$_POST['contact'];
            $office=str_replace("'","&#039", $_POST['office']);
            $street=str_replace("'","&#039", $_POST['street']);
            $city=str_replace("'","&#039", $_POST['city']);
            $country=str_replace("'","&#039", $_POST['country']);
            $pcode=str_replace("'","&#039", $_POST['pcode']);
            $qt="UPDATE users SET username='$propertyFor',contact='$propertyID',apartment='$office',
locality='$street',city='$city',country='$country',pinCode='$pcode' WHERE userId='$userID'";
            if($conn->query($qt) === TRUE) {
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&msg=Updated Successfully!");
            }
            else {
                echo"Error: " . $qt . "<br>" . $conn->error;
                $conn->close();
                header("location:dashbord.php?userDetails&userID=$userID&error=Invalid data!");
            }
        }
        
        if(isset($_POST['updatemainprodetails'])) {
            $propertyFor=$_POST['username'];
            $propertyID=$_POST['contact'];
            $office=str_replace("'","&#039", $_POST['office']);
            $street=str_replace("'","&#039", $_POST['street']);
            $city=str_replace("'","&#039", $_POST['city']);
            $country=str_replace("'","&#039", $_POST['country']);
            $pcode=str_replace("'","&#039", $_POST['pcode']);
            $qt="UPDATE users SET username='$propertyFor',contact='$propertyID',apartment='$office',
locality='$street',city='$city',country='$country',pinCode='$pcode' WHERE userId='$cintsertu_id'";
            if($conn->query($qt) === TRUE) {
                $conn->close();
                header("location:dashbord.php?profile=$cintsertu_id&msg=Updated Successfully!");
            }
            else {
                echo"Error: " . $qt . "<br>" . $conn->error;
                $conn->close();
                header("location:dashbord.php?profile=$cintsertu_id&error=Invalid data!");
            }
        }
        
        
        if(isset($_POST["addaminitiesmaster"]) ){
            
            $cdoc_id=0;
            $ca_id=1;          $aminityname=$_POST['aminityname'];
            $aminitytype=$_POST['aminitytype'];
            
            if (isset($_FILES['aminityicon'])) {
                
                $imageName = $_FILES['aminityicon']['name'];
                $imageTmpName = $_FILES['aminityicon']['tmp_name'];
                $imageSize = $_FILES['aminityicon']['size'];
                
                $statusMsg = '';
                $backlink=null;
                
                $allowedExtensions = ['png', 'jpg', 'jpeg','webp','tiff','bmp','gif'];
                $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                $fileNameWithoutExtension = pathinfo($imageName, PATHINFO_FILENAME);
                
                
                if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 20 * 1024 * 1024) {
                    $targetDir = '../assets/img/aminities/';
                    
                    mysqli_set_charset($conn, "utf8mb4");
                    
                    $qu="INSERT INTO amenitymaster(amenityName, amenityType)
VALUES ('$aminityname','$aminitytype')";
                    if ($conn->query($qu) === TRUE) {
                        $cdoc_id=$conn->insert_id;
                        $targetFilePath = $targetDir.$fileNameWithoutExtension."-".$cdoc_id.".".$imageExtension;
                        if(move_uploaded_file($imageTmpName, $targetFilePath)){
                            $targetFilename = $fileNameWithoutExtension."-".$cdoc_id.".".$imageExtension;
                            
                            
                            
                            $q="UPDATE amenitymaster SET amenityIcon='$targetFilename' WHERE amenityID='$cdoc_id'" ;
                            
                            if ($con->query($q) === TRUE) {
                                
                                header("location:dashbord.php?aminities=$cdoc_id&msg=Uploaded Successfully!#aminities");
                            }else {
                                header("location:dashbord.php?aminities=$cdoc_id&error=File upload failed!#aminities");
                            }
                            
                        }else{
                            header("location:dashbord.php?aminities=$cdoc_id&error=File upload failed!#aminities");
                            
                        }
                    }else{
                        header("location:dashbord.php?aminities=$cdoc_id&error=File upload failed!#aminities");
                        
                    }
                    
                    
                } else{
                    header("location:dashbord.php?aminities=$cdoc_id&error=File Extensions not allowed!#aminities");
                    
                    
                }
                
                
            }   }
            
            
            if (isset($_POST['addPropertystyle'])) {
                $styleName = mysqli_real_escape_string($conn, $_POST['styleName']);
                
                $check = mysqli_query($conn, "SELECT * FROM propertystyles WHERE styleName = '$styleName'");
                if (mysqli_num_rows($check) > 0) {
                    header("location:dashbord.php?prostyles&error=Style already exists");
                    exit;
                }
                
                $query = "INSERT INTO propertystyles (styleName) VALUES ('$styleName')";
                if (mysqli_query($conn, $query)) {
                    header("location:dashbord.php?prostyles&msg=Style added successfully");
                } else {
                    header("location:dashbord.php?prostyles&error=Error adding style");
                    
                }
            }
            
            // Optional: Update Style
            if (isset($_POST['updatePropertystyle'])) {
                $styleID = intval($_POST['styleID']);
                $styleName = mysqli_real_escape_string($conn, $_POST['styleName']);
                
                $query = "UPDATE propertystyles SET styleName='$styleName' WHERE styleID=$styleID";
                if (mysqli_query($conn, $query)) {
                    header("location:dashbord.php?prostyles&msg=Style updated successfully");
                } else {
                    header("location:dashbord.php?prostyles&error=Error updating style");
                }
            }
            
            
            
            if (isset($_POST['addPropertyType'])) {
                $propertyTypeName = mysqli_real_escape_string($conn, $_POST['propertyTypeName']);
                $propertyCategory = mysqli_real_escape_string($conn, $_POST['propertyCategory']);
                $availableFor = mysqli_real_escape_string($conn, $_POST['availableFor']);
                
                $check = mysqli_query($conn, "SELECT * FROM propertytypes WHERE propertyTypeName = '$propertyTypeName'");
                if (mysqli_num_rows($check) > 0) {
                    header("location:dashbord.php?protypes&error=Property Type already exists");
                    exit;
                }
                
                $query = "INSERT INTO propertytypes (propertyTypeName, propertyCategory, availableFor)
              VALUES ('$propertyTypeName', '$propertyCategory', '$availableFor')";
                
                if (mysqli_query($conn, $query)) {
                    header("location:dashbord.php?protypes&msg=Property Type added successfully");
                } else {
                    header("location:dashbord.php?protypes&error=Failed to add property type");
                }
            }
            
            // UPDATE
            if (isset($_POST['updatePropertyType'])) {
                $propertyTypeID = intval($_POST['propertyTypeID']);
                $propertyTypeName = mysqli_real_escape_string($conn, $_POST['propertyTypeName']);
                $propertyCategory = mysqli_real_escape_string($conn, $_POST['propertyCategory']);
                $availableFor = mysqli_real_escape_string($conn, $_POST['availableFor']);
                
                $query = "UPDATE propertytypes
              SET propertyTypeName = '$propertyTypeName',
                  propertyCategory = '$propertyCategory',
                  availableFor = '$availableFor'
              WHERE propertyTypeID = $propertyTypeID";
                
                if (mysqli_query($conn, $query)) {
                    header("location:dashbord.php?protypes&msg=Property Type updated successfully");
                } else {
                    header("location:dashbord.php?protypes&error=Failed to update property type");
                }
            }
            
            
            
            // Add City
            if (isset($_POST['addCity'])) {
                $cityName = mysqli_real_escape_string($conn, $_POST['cityName']);
                $check = mysqli_query($conn, "SELECT * FROM cities WHERE cityName = '$cityName'");
                if (mysqli_num_rows($check) > 0) {
                    header("Location: dashbord.php?cities&error=City already exists");
                    exit;
                }
                $query = "INSERT INTO cities (cityName) VALUES ('$cityName')";
                mysqli_query($conn, $query);
                header("Location: dashbord.php?cities&msg=City added successfully");
            }
            
            // Add Locality
            if (isset($_POST['addLocality'])) {
                $cityID = intval($_POST['cityID']);
                $localityName = mysqli_real_escape_string($conn, $_POST['localityName']);
                $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);
                $image = $_FILES['localityImg'];
                
                $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (in_array($ext, $allowed) && $image['size'] <= 5 * 1024 * 1024) {
                    $query = "INSERT INTO localities (cityID, localityName, postalCode) VALUES ('$cityID', '$localityName', '$postalCode')";
                    if (mysqli_query($conn, $query)) {
                        $localityID = $conn->insert_id;
                        $targetDir = "../assets/img/localities/";
                        $fileName = "locality-{$localityID}." . $ext;
                        $targetPath = $targetDir . $fileName;
                        move_uploaded_file($image['tmp_name'], $targetPath);
                        mysqli_query($conn, "UPDATE localities SET localityImg='$fileName' WHERE localityID=$localityID");
                        header("Location: dashbord.php?cities&cityID=$cityID&msg=Locality added");
                    } else {
                        header("Location: dashbord.php?cities&cityID=$cityID&error=DB insert failed");
                    }
                } else {
                    header("Location: dashbord.php?cities&cityID=$cityID&error=Invalid image");
                }
            }
            
            if (isset($_POST['upadtepropassword'])){
                $adminName=$_POST['username'];
                $currentpass=$_POST['currentpass'];
                $password=$_POST['newpass'];
                $cpassword=$_POST['conpass'];
                
                if ($cpassword==$password){
                    
                    $sql = "SELECT * FROM admin WHERE adminID='$cintsertu_id'";
                    $result = mysqli_query($conn,$sql);
                    if ($row = mysqli_fetch_array($result)) {
                        $storedHashedPassword=$row['adminPass'];
                        if (password_verify($currentpass, $storedHashedPassword)) {
                            $mypassword= password_hash($password, PASSWORD_DEFAULT);
                            
                            $qt="UPDATE admin SET adminName='$adminName',adminPass='$mypassword' WHERE adminID='$cintsertu_id'";
                            if($conn->query($qt) === TRUE) {
                                $conn->close();
                                header("location:dashbord.php?profile=$cintsertu_id&msg=Updated Successfully!");
                            }
                            else {
                                echo"Error: " . $qt . "<br>" . $conn->error;
                                $conn->close();  $conn->close();
                                //header("location:dashbord.php?profile=$cintsertu_id&error=Error In Update!");
                            } }
                            else {
                                
                                $conn->close();
                                header("location:dashbord.php?profile=$cintsertu_id&error=Current password is invalid!");
                            }
                    }
                    else {
                        echo"Error: " . $qt . "<br>" . $conn->error;
                        $conn->close();
                        header("location:dashbord.php?profile=$cintsertu_id&error=Invalid User!#$cintsertu_id");
                    }
                    
                }else{
                    header("location:dashbord.php?profile=$cintsertu_id&error=New password and Confirm password do not match !");
                }
            }
            
            
            if(isset($_POST['updateLocality'])){
                $cityID = intval($_POST['cityID']);
                $localityID = intval($_POST['localityID']);
                $localityName = mysqli_real_escape_string($conn, $_POST['localityName']);
                $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);
                $image = $_FILES['localityImg'];
                $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                if (in_array($ext, $allowed) && $image['size'] <= 5 * 1024 * 1024) {
                    $query = "UPDATE localities SET localityName='$localityName', postalCode='$postalCode' WHERE localityID=$localityID";
                    if (mysqli_query($conn, $query)) {
                        $targetDir = "../assets/img/localities/";
                        $fileName = "locality-{$localityID}." . $ext;
                        $targetPath = $targetDir . $fileName;
                        move_uploaded_file($image['tmp_name'], $targetPath);
                        mysqli_query($conn, "UPDATE localities SET localityImg='$fileName' WHERE localityID=$localityID");
                        header("Location: dashbord.php?cities&cityID=$cityID&localityID=$localityID&msg=Locality updated");
                    } else {
                        header("Location: dashbord.php?cities&cityID=$cityID&localityID=$localityID&error=DB update failed");
                    }
                } else {
                    header("Location: dashbord.php?cities&cityID=$cityID&localityID=$localityID&error=Invalid image");
                }
                
                
            }
            
            
            if(isset($_POST['addnearby'])){
                $localityID = intval($_POST['localityID']);
                $nearbyName = mysqli_real_escape_string($conn, $_POST['placeName']);
                $cityID = intval($_POST['cityID']);
                $distanceType = mysqli_real_escape_string($conn, $_POST['distanceType']);
                $distance = mysqli_real_escape_string($conn, $_POST['distance']);
                
                $query = "INSERT INTO nearbyplaces (localityID, placeName, distanceType, distance)
                VALUES ('$localityID', '$nearbyName', '$distanceType', '$distance')";
                if (mysqli_query($conn, $query)) {
                    header("Location: dashbord.php?locality&cityID=$cityID&localityID=$localityID&msg=Nearby place added");
                } else {
                    header("Location: dashbord.php?locality&cityID=$cityID&localityID=$localityID&error=DB insert failed");
                }
            }
            
            
            if(isset($_GET['deletenearby'])){
                $localityID = intval($_GET['localityID']);
                $cityID = intval($_GET['cityID']);
                $nearbyID = intval($_GET['nearbyID']);
                $query = "DELETE FROM nearbyplaces WHERE nearbyID = $nearbyID";
                if (mysqli_query($conn, $query)) {
                    header("Location: dashbord.php?locality&cityID=$cityID&localityID=$localityID&msg=Nearby place deleted");
                } else {
                    header("Location: dashbord.php?locality&cityID=$cityID&localityID=$localityID&error=DB delete failed");
                }
            }
            
            
            
            ?>