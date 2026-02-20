<?php if(session_start()!=true){ session_start(); }
include('aconnection.php');
date_default_timezone_set('Europe/London');
$cdate=date("Y-m-d");

$cintsertu_id=0;
if(isset($_SESSION['u_id'])){ $cintsertu_id=$_SESSION['u_id']; }

if(isset($_POST['addpropertySalefirst'])) {
    $propertyFor=$_POST['propertyFor'];
        
    $propertyType=str_replace("'","&#039", $_POST['propertyType']);
    $propertyStyle=str_replace("'","&#039", $_POST['propertyStyle']);
    $office=str_replace("'","&#039", $_POST['office']);
    $street=str_replace("'","&#039", $_POST['street']);    
    $city=str_replace("'","&#039", $_POST['city']);
    $country=str_replace("'","&#039", $_POST['country']);
    $neighbourhood=str_replace("'","&#039", $_POST['neighbourhood']);
    $pcode=str_replace("'","&#039", $_POST['pcode']);
 $cityId=$_POST['cityId'];
     $localityId=$_POST['localityId'];
     
    
    

$qt="INSERT INTO properties(userId,propertyFor,propertyType,propertyStyle,addressNumber,addressStreet,addressCity,country,neighbourhood,addressPostcode,latitude,longitude)
VALUES ('$cintsertu_id','$propertyFor','$propertyType','$propertyStyle','$office','$street','$city','$country','$neighbourhood','$pcode','$latitude','$longitude')";
    
    if($conn->query($qt) === TRUE) {
        $propertyID=$conn->insert_id;
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&msg=Add Media, Price of property!#Description");
    }
    else {
         echo"Error: " . $qt . "<br>" . $conn->error;
         $conn->close();
     header("location:dashbord.php?addproperty=$cintsertu_id&error=Error in submitting property!");
    }
}

if(isset($_POST['listyourproperty'])) {
    $email=$_POST['email'];
    $pin=str_replace("'","&#039", $_POST['pin']);
   
    
    $qt="INSERT INTO list_property(lp_email,lp_picode,lp_date)
VALUES ('$email','$pin','$cdate')";
    
    if($conn->query($qt) === TRUE) {
       $conn->close();
        header("location:index.php?list-msg=Request Send Successfully!#list-yproperty");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:index.php?list-error=Error in Submission!#list-yproperty");
    }
}
if(isset($_POST['listyourproperty2'])) {
    $email=$_POST['email'];
    $pin=str_replace("'","&#039", $_POST['pin']);
    
    
    $qt="INSERT INTO list_property(lp_email,lp_picode,lp_date)
VALUES ('$email','$pin','$cdate')";
    
    if($conn->query($qt) === TRUE) {
        $conn->close();
        header("location:valuation.php?list-msg=Request Send Successfully!#list-yproperty");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:valuation.php?list-error=Error in Submission!#list-yproperty");
    }
}

if(isset($_POST['submitarrangeviewing'])) {
    if($_POST['yourname']==null||$_POST['youremail']==null||$_POST['contactno']==null) {
        echo "<p style='color: red;'> </p>";
        header("location:$currentURL&error=Please enter required fields!#arrform");
    }else {
        $cdate=date("Y-m-d");
        $propertyType=str_replace("'","&#039", $_POST['yourname']);
        $propertyStyle=str_replace("'","&#039", $_POST['youremail']);
        $office=str_replace("'","&#039", $_POST['contactno']);
        $street=str_replace("'","&#039", $_POST['pdate']);
        $city=str_replace("'","&#039", $_POST['yourmessage']);
        $currentURL= $_POST['url'];
        
        
        $qt="INSERT INTO arrange_viewing(av_name,av_email,av_contact,av_date,av_remark,av_submitt_date)
VALUES ('$propertyType','$propertyStyle','$office','$street','$city','$cdate')";
        
        if($conn->query($qt) === TRUE) {
            $conn->close();
            header("location:$currentURL&msg=Submitted Successfully!#arrform");
            
            
            echo "";
        }
        else {
            
            echo"Error: " . $qt . "<br>" . $conn->error;
            $conn->close();
            header("location:$currentURL&error=Error in Submission!#arrform");
            
        }
    } }

if(isset($_POST['contactussub'])) {
    $email=$_POST['email'];
    $name=str_replace("'","&#039", $_POST['name']);
    $phone=str_replace("'","&#039", $_POST['phone']); $subject=str_replace("'","&#039", $_POST['subject']);
    $message=str_replace("'","&#039", $_POST['message']);
    
    $qt="INSERT INTO contact_us(co_email,co_name,co_contact,co_subject,co_msg,co_date)
VALUES ('$email','$name','$phone','$subject','$message','$cdate')";
    
    if($conn->query($qt) === TRUE) {
        $conn->close();
        header("location:contact-us.php?list-msg=Request Send Successfully!#ctn");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:contact-us.php?list-error=Error in Submission!#ctn");
    }
}

if(isset($_POST['upadtepropertyfirst'])) {
    $propertyFor=$_POST['propertyFor'];
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
    
    $qt="UPDATE properties SET propertyFor='$propertyFor',propertyType='$propertyType',propertyStyle='$propertyStyle',addressNumber='$office',
addressStreet='$street',addressCity='$city',country='$country',neighbourhood='$neighbourhood',addressPostcode='$pcode',latitude='$latitude',
longitude='$longitude' WHERE propertyID='$propertyID' AND userId='$cintsertu_id'";
   if($conn->query($qt) === TRUE) {
      $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&msg=Updated Successfully!");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&error=Invalid data!");
    }
}
if(isset($_POST['upadtepropertyfirst'])) {
    $propertyFor=$_POST['propertyFor'];
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
    
    $qt="UPDATE properties SET propertyFor='$propertyFor',propertyType='$propertyType',propertyStyle='$propertyStyle',addressNumber='$office',
addressStreet='$street',addressCity='$city',country='$country',neighbourhood='$neighbourhood',addressPostcode='$pcode',latitude='$latitude',
longitude='$longitude' WHERE propertyID='$propertyID' AND userId='$cintsertu_id'";
    if($conn->query($qt) === TRUE) {
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&msg=Updated Successfully!");
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
propertyKitchens='$longitude' WHERE propertyID='$propertyID' AND userId='$cintsertu_id'";
    if($conn->query($qt) === TRUE) {
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&msg=Updated Successfully!#second");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&error=Invalid data!");
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
           $_SESSION['u_id']=$cintsertu_id;
           $_SESSION['u_name']=$fname;
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
            $name=$_POST['firstname'];
        $email=$_POST['email'];  $contact=$_POST['contact'];
        $password=$_POST['password']; $userType=$_POST['userType'];
        $cpassword=$_POST['cpassword'];
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($con,$sql);
        if ($row = mysqli_fetch_array($result)) {
            $con->close();
            header("location:login.php?error=Email Already Register! Please Login!");
            
        }
        else{
            if ($cpassword==$password){
                $imgurl="assets/images/default-ueser.png";
                $cpassword= password_hash($cpassword, PASSWORD_DEFAULT);
                $qt="INSERT INTO users(username,contact,email,password,registrationDate,userType,profileimg)
VALUES ('$name','$contact','$email','$cpassword','$cdate','$userType','$imgurl')";
                
                if($conn->query($qt) === TRUE) {
                                   
              
                header("location:login.php?sucess=Registred Successfully! Please Login!");
               /*  $sent=mail($email,$sub,$msg,$headers);
                if($sent)
                {     header("location:register.php?msg=OTP send on mail. Please verify it!");               
                    $ud=0;
                }
                else{
             header("location:register.php?error=Error in sending OTP on Mail. Please try again!");
                } */
                }else{
                    header("location:register.php?error=Error in creating account please try later");
                }
                
            }else{
                header("location:register.php?error=Passwords Dose't Matched !");
            } } 
            
}

if (isset($_POST['registernew2'])){
    $answer=$_POST['answer'];
    $question=$_POST['question'];
    $answer=substr($answer,0,7);
    $answer=substr($answer,4,7);
    $answer=(int)$answer-524;
    $otp=rand(11111,77777);
    if($question==$answer){
        $name=$_POST['firstname'];
        $email=$_POST['email'];  $contact=$_POST['contact'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($con,$sql);
        if ($row = mysqli_fetch_array($result)) {
            $con->close();
            header("location:login.php?error=Email Already Register! Please Login!");
            
        }
        else{
            if ($cpassword==$password){
                
                
                $sub="Email Verification for Tony Alen Estates ";
                $msg="Hello, Name:$name \n \n Please Verify your email using following OTP
                    \n \n $otp";
                $headers = "From: support@workschannel.com" . "\r\n" .
                    "Reply-To: ".$email. "\r\n" .
                    
                    "X-Mailer: PHP/" . phpversion();
                
                session_start();
                
                $s8=rand(1111,2000);
                $s9=rand(111,299);
                $validate=$s8."".($otp+24976)."".$s9;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['contact'] = $contact;
                $_SESSION['password'] = $password;
                $_SESSION['validate'] = $validate;
                
                header("location:register.php?validate=OTP Send on Mail. Please verify it!&otp=$otp");
                /*  $sent=mail($email,$sub,$msg,$headers);
                 if($sent)
                 {     header("location:register.php?msg=OTP send on mail. Please verify it!");
                 $ud=0;
                 }
                 else{
                 header("location:register.php?error=Error in sending OTP on Mail. Please try again!");
                 } */
                
                
            }else{
                header("location:register.php?error=Passwords Dose't Matched !");
            } } }
            else {
                header("location:register.php?error=Enter Correct Answer !");
                
                
            }
            
}



if(isset($_POST['logincheck'])) {
    
    
    
    $question=$_POST['question'];
    $answer=$_POST['answer'];
  /*   $answer=substr($answer,0,7);
    $answer=substr($answer,4,7);
    $answer=(int)$answer-124; 
    
    if($question==$answer){*/
        
        $myusername =$_POST['username'];
        $mypassword =$_POST['password'];
        
        $sql = "SELECT * FROM users WHERE email = '$myusername'";
        $result = mysqli_query($con,$sql);
      if ($row = mysqli_fetch_array($result)) {
          $storedHashedPassword=$row['password'];
          /*   $u_status=$row['u_status'];
            
            if($u_status==1){ */
          if (password_verify($mypassword, $storedHashedPassword)) {
                 $_SESSION['u_id']=$row['userID'];
                $_SESSION['u_name']=$row['username'];
                $con->close();
                header("location:dashbord.php");
                
            /* }else {
                $con->close();
                header("location:login.php?error=Your Account is Deactivated");
            } */
          }else {
              $con->close();
              header("location:login.php?error=Your Password is invalid");
          }
        }else {
            $con->close();
            header("location:login.php?error=Your Username Name is invalid");
        }
        
        
  /*   } else {
        header("location:login.php?error=Enter Correct Answer !");
        
        
    } */ }

        if (isset($_POST['updateAgentProfile'])) {
            // Fetch user ID from session or context
            $userID = $cintsertu_id; // same variable used in your other code
            
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
                header("location:dashbord.php?agent=$userID&msg=Agent Profile Updated Successfully!");
                exit;
            } else {
                $error = $conn->error;
                $conn->close();
                header("location:dashbord.php?agent=$userID&error=Agent Profile Update Failed! $error");
                exit;
            }
        }
        
        if (isset($_POST['updateBuilderProfile'])) {
            $userID = $cintsertu_id;
            
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
                header("location:dashbord.php?builder=$userID&msg=Builder Profile Updated Successfully!");
                exit;
            } else {
                $error = $conn->error;
                $conn->close();
                header("location:dashbord.php?builder=$userID&error=Update Failed! $error");
                exit;
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
    
    
    
    if (isset($_POST['upadtepropassword'])){
        $currentpass=$_POST['currentpass'];
            $password=$_POST['newpass'];
            $cpassword=$_POST['conpass'];
      
                if ($cpassword==$password){
                    
               
                    $sql = "SELECT * FROM users WHERE userId='$cintsertu_id'";
                    $result = mysqli_query($con,$sql);
                    if ($row = mysqli_fetch_array($result)) {
                        $storedHashedPassword=$row['password'];
                        if (password_verify($currentpass, $storedHashedPassword)) {
                            $mypassword= password_hash($password, PASSWORD_DEFAULT);
                            
     $qt="UPDATE users SET password='$mypassword' WHERE userId='$cintsertu_id'";
if($conn->query($qt) === TRUE) {
$conn->close();
header("location:dashbord.php?profile=$cintsertu_id&msg=Updated Successfully!");
                    }
                    else {
                        echo"Error: " . $qt . "<br>" . $conn->error;
                        $conn->close();  $con->close();
 header("location:dashbord.php?profile=$cintsertu_id&error=Error In Update!");
                    } }
                    else {
                    
                        $con->close();
                        header("location:dashbord.php?profile=$cintsertu_id&error=Current password is invalid!");
                    }
                    }
                    else {
                        echo"Error: " . $qt . "<br>" . $con->error;
                        $con->close();
                        header("location:dashbord.php?profile=$cintsertu_id&error=Invalid User!");
                    }
                    
                }else{
       header("location:dashbord.php?profile=$cintsertu_id&error=New password and Confirm password do not match !");
                } 
                
    }

    if(isset($_POST['logincheckonsidebar'])) {
        
          $myusername=$_POST['username'];
            $mypassword=$_POST['password'];
            
            $sql = "SELECT * FROM users WHERE email = '$myusername'";
            $result = mysqli_query($con,$sql);
            if ($row = mysqli_fetch_array($result)) {
                $storedHashedPassword=$row['password'];
                  if (password_verify($mypassword, $storedHashedPassword)) {
                    $_SESSION['u_id']=$row['userID'];
                    $_SESSION['u_name']=$row['username'];
                    $con->close();
                   $success= "Login Successfully!";
                    echo "success";
              
                }else {
                    $con->close();
                    $error= "Your Password is invalid";
                    echo $error;
                }
            }else {
                $con->close();
                $error="Your Username Name is invalid";
                echo $error;
            }
            
            
        }
    
    
        
        if (isset($_POST['forgotpasscheck'])){
            $answer=$_POST['username'];
            $otp=rand(11111,77777);
            $sql = "SELECT * FROM users WHERE email = '$answer' ";
                $result = mysqli_query($con,$sql);
                if ($row = mysqli_fetch_array($result)) {
                    $con->close();
                    $name=$row['username'];
                    $to=$answer;
                   $sub="Password Reset Instructions for Tony Alan Estates Users";
                   $msg="Hello,$name \n \n Please Verify your email using following OTP
                    \n \n $otp to reset your password.\n\n\n Thank you, \nTony Alan Estates";
                    $headers = "From: support@diwise.uk" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();
                    
                    session_start();
                    $_SESSION['emailname'] = $answer;
                    $_SESSION['validateotp'] = $otp;
                    $sent=mail($to,$sub,$msg,$headers);
                    if($sent)
                    {
                    header("location:forget-password.php?validate=1&sucess=OTP Send on Mail. Please verify it!");
                    }
                    else{
                        header("location:forget-password.php?error=Error in sending mail! Please try later!");
                    }
                    
                 }
                else{
              
                        header("location:forget-password.php?error=User not found!");
       
                }
        }
        
        
        
        if (isset($_POST['resetpass'])){
            $emailname=$_SESSION['emailname'];
            $validateotp=$_SESSION['validateotp'];
            $password=$_POST['password'];
            $otp=$_POST['otp'];       
            
            if ($validateotp==$otp){
                $mypassword= password_hash($password, PASSWORD_DEFAULT);
                $qt="UPDATE users SET password='$mypassword' WHERE email='$emailname'";
                        if($conn->query($qt) === TRUE) {
                            $conn->close();
                            unset($_SESSION['emailname']);unset($_SESSION['validateotp']);
                            header("location:login.php?sucess=Password reset Successfully!");
                        }
                        else {
                            echo"Error: " . $qt . "<br>" . $conn->error;
                            $conn->close();  $con->close();
                            header("location:forget-password.php?error=Error In Updating password!");
                        } }
                        else {
                  
                header("location:forget-password.php?error=OTP is invalid!");
            }
        
        }
        
    
?>