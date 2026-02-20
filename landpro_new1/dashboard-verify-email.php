   <?php if(isset($_GET['resendEmailVerification'])){
       
       $name=$rowp['username'];
       $email=$rowp['email'];
       $userID=$rowp['userID'];
       $subject="Bharatiya Property User Email Verification";
       $token=md5($email.time());
       $queryx="UPDATE users SET token='$token' WHERE email='$email' AND userID='$userID'";
       if($conn->query($queryx) === TRUE) {
 
       
       $link="https://bharatiyaproperty.com/verify-email.php?token=".$token;
       $message="Hello <b>$name,</b> <br>
Welcome to Bharatiya Property! We are excited to have you on board. <br>
To complete your registration, we need to verify your email address. <br>

 Please click the link below to verify your email: <br> <br> <a href='$link'>Verify Email</a>";
       $message .= "<br><br>Thank you for choosing Bharatiya Property! <br>
Best regards, <br>
The Bharatiya Property Team";
       $message .= "<br><br>This is an automated message, please do not reply.";
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
       
       mail($email,$subject,$message,$headers);
       
       if(mail($email,$subject,$message,$headers)){
           header("location:dashbord.php?verifyEmailUser=1&msg=Email verification link has been sent to your email.");
           }else{
               header("location:dashbord.php?verifyEmailUser=1&msg=Failed to send email verification link.");
           }
       }else{
           header("location:dashbord.php?verifyEmailUser=1&msg=Failed to send email verification link.");
       }
   } 
       
   ?>   
   

        <div class="dashborad-box stat bg-white">   
            
  <div class="tab-pane fade active show" id="ltn_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Verify Email</h3>
                              
   <div class="ltn__form-box">

</div>
<div class="row">
<div class="col-lg-12">

<h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowp['username']; ?></span>
(<?php echo $rowp['userType']; ?>)
<br><?php echo $rowp['email']; ?>
</h4>
<p>Please Check your <?php echo $rowp['email']; ?> for the verification link. Mail can be in your spam folder as well.</p>
<p>Click the link to verify your email and complete your registration.</p>
 
<p>Once verified, you will be able to access all the features of the website.</p>

<a href="dashbord.php?verifyEmailUser=&resendEmailVerification=" class="btn btn-primary">Resend Email Verification Link</a>

<h5></h5>

</div>


</div>
                                            
                                                </div>
                                            </div>
                                        </div>
         </div>                               
        <script>
    function validatePassword() {
        var newPassword = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;

        if (newPassword !== confirmPassword || newPassword.length < 6) {
            alert("New password and Confirm password do not match or the new password is too short.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        var fileInput = event.target;
        var fileName = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var maxFileSize = 2 * 1024 * 1024; // 2MB
        
        if (!allowedExtensions.exec(fileName)) {
            document.getElementById('errorMessage').textContent = 'Invalid file. Please select a jpg, png, or jpeg file.';
            document.getElementById('errorMessage').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        if (fileInput.files[0].size > maxFileSize) {
            document.getElementById('errorMessage').textContent = 'File size exceeds 2MB limit.';
            document.getElementById('errorMessage').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        document.getElementById('errorMessage').style.display = 'none';

        // Automatically submit the form
        document.getElementById('imageForm').submit();
    });
</script>





