<?php  include 'aconnection.php';  if(session_start()!=true){  session_start();  } $error=0;
if(isset($_SESSION['u_name'])){
    header('location:dashbord.php');
} ?>

<?php  include_once 'headtop.php'; ?>



  <title>User Login </title>

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
                    <h4 class="neutral-top" style="    text-align: left;">Login</h4>
                    
                                              <?php

   if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;font-weight: 600;  font-size: 16px;"><?php echo $_GET['error']; ?></p>  
  <?php  }
else if(isset($_GET['sucess'])){ ?>
      <p class="text-center small" style="color: green;font-weight: 600;  font-size: 16px;"><?php echo $_GET['sucess']; ?></p>  
  <?php  } ?>
                    <form action="action-controller.php" method="post" name="login__form" class="form__login">
                        <div class="input input--secondary">
                            <label for="loginMail">Email*</label>
                            <input type="email" name="username" required="" id="loginMail" placeholder="Enter your email">
                        </div>
                        <div class="input input--secondary">
                            <label for="loginPass">Password*</label>
                            <input type="password" required="" name="password" id="loginPass" placeholder="Password">
                        </div>
                        <div class="checkbox login__checkbox">
                            <label>                           
                            </label>
                            <a href="forget-password.php" style="color: #0d6efd">Forget Password</a>
                        </div>
                        <div class="input__button">
                            <button type="submit" name="logincheck" class="theme-btn1" style="margin-top: 15px;width: 100%;">Login</button>
                        </div>
                           <p style="    text-align: left;">Don't have an account? <a href="register.php" style="color: #0d6efd">Register here.</a></p>
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