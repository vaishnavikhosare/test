<?php  include 'aconnection.php';  if(session_start()!=true){  session_start();  } $error=0;
if(isset($_SESSION['u_name'])){
    header('location:dashbord.php');
} ?>

<?php  include_once 'headtop.php'; ?>

<?php 
if(isset($_GET['reset'])){
    unset($_SESSION['contact']);unset($_SESSION['name']);
    unset($_SESSION['validate']); unset($_SESSION['email']); unset($_SESSION['password']); 
}

$otp=0; ?>

  <title>User Registration </title>

  <?php  include_once 'head.php'; ?>
  <style>
  .nice-select.open .list {
    overflow: visible;  }
  
  </style>
  
  
</head>

<body class="homepage3-body">

 <?php include 'header.php'; ?>
 

  <!--===== HERO AREA STARTS =======-->
  <div class="hero-inner-section-area-sidebar" style="margin-bottom: -140px;    padding: 150px 0 200px;">
    <img src="assets/img/all-images/hero/hero-img1.png" alt="" class="hero-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero-header-area text-center">

         
        <div class="registration__area">
                    <h4 class="neutral-top" style="    text-align: left;">Registration</h4>
                        <?php

   if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;font-weight: 600;  font-size: 16px;"><?php echo $_GET['error']; ?></p>  
  <?php  }
else if(isset($_GET['sucess'])){ ?>
      <p class="text-center small" style="color: green;font-weight: 600;  font-size: 16px;"><?php echo $_GET['sucess']; ?></p>  
  <?php  } ?>
                    <p style="    text-align: left;">Already Registered? <a href="login.php" style="color: #0d6efd">Login</a></p>
                    <form action="action-controller.php" method="post" onsubmit="return validatePassword()">
                        <div class="regi__type">
                            <label for="typeSelect">You are?</label>
                            <select class="type__select" name="userType" id="typeSelect" required="" style="display: none;">
                                <option value="Buyer" selected>Buyer</option>
                                <option value="Owner">Owner</option>
                                  <option value="Tenant">Tenant</option>
                                    <option value="Builder">Builder</option>
                                      <option value="Agent">Agent</option>
                            </select>
                      
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="firstName">Name*</label>
                                    <input type="text" name="firstname" id="firstName" placeholder="First Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="lastName">Contact No*</label>
                                    <input type="text" name="contact" id="lastName" maxlength="15" placeholder="Contact No" required="">
                                </div>
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="registrationMail">Email*</label>
                            <input type="email" name="email" id="registrationMail" placeholder="Enter your email" required="">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="regiPass">Password*</label>
                                    <input type="password" name="password" id="password" placeholder="Password at least 6 characters" required="">
                                        
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="passCon">Password Confirmation*</label>
                                    <input type="password" name="cpassword" id="cpassword" placeholder="Password Confirm" required="">
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label style="padding-left: 6px;">
                                <input type="checkbox"  name="accept__condition" class="form-controller" style="display: inline-block;" value="agree" required=>
                             
                                I have read and I agree to the <a href="privacy-policy.php" target="_blank" style="color: #0d6efd">
                                    Privacy Policy</a>
                            </label>
                        </div>
                        <div class="input__button">
                            <button type="submit" name="registernew" class="theme-btn1" style="margin-top: 15px;width: 100%;">Create My Account</button>
                        </div>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->
<script>
$(document).ready(function() {
    $('#sub-submit-btn').click(function() {
        event.preventDefault(); 
        // Get form data
        var formData = $('#sub-form').serialize();

        // Send an AJAX request
        $.ajax({
            type: 'POST',
            url: 'reg-controller.php',
            data: formData,
            success: function(response1) {
             
                if (response1 === 'success') {
                	   $('.sub-error-msg').text('Subscribed Successfully!').css('color', 'green');
                } else {
                    $('.sub-error-msg').text(response1).css('color', 'red');
                }
            },
            error: function() {
                $('.sub-error-msg').text('An error occurred. Please try again.').css('color', 'red');
            }
        });
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    event.preventDefault(); 
	

    $("#register-button").click(function() {
   

         // Check if any of the required fields are empty
         var username = $("input[name='username']").val();
         var firstname = $("input[name='firstname']").val();
         var contact = $("input[name='contact']").val();
         var password = $("input[name='password']").val();

         if (username === "" || firstname === "" || contact === "" || password === "") {
             // Display an error message or handle it as needed
             $(".error-msg-reg").text("All fields are required.").css("color", "red");
         } else {
    // Get form data
        var formData = $('#register-form').serialize();
     $.ajax({
            type: "POST",
            url: "reg-controller.php", 
            data: formData,
            success: function(response2) {
                if (response2 === 'success') {
                    // Registration successful
                    $('.error-msg-reg').text('Registration Successful!').css('color', 'green');
                    setTimeout(function() {
                        location.reload();
                    }, 1500); 
                    // Optionally, you can redirect to a login page or perform other actions
                } else {
                    // Display an error message
                    $('.error-msg-reg').text(response2).css('color', 'red');
                }
            },
            error: function() {
                $('.error-msg-reg').text('An error occurred. Please try again.').css('color', 'red');
            }
   
        });
         }
    });  
});

</script>

  
  <?php include 'footer.php';   include 'footer_links.php';  ?>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
     <script>
    function validatePassword() {
        var newPassword = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;

        if (newPassword !== confirmPassword || newPassword.length < 6) {
            alert("Password and Confirm password do not match or the new password is too short.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
</body>

</html>