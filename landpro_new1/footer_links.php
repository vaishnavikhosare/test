 <div class="popup" id="loginPopup">
    <div class="popup-content">
                 <h4 class="neutral-top">Log In</h4>
              
                    <p class="error-msg" style="color:red;"></p>
                    <form id="login-form"  method="post" class="form__login">
                        <div class="input input--secondary">
                            <label for="loginMail">Email Address*</label>
                            <input type="email" name="username"  placeholder="Enter your email"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="loginPass">Password*</label>
                            <input type="password" name="password"  placeholder="Password"
                                required="required" />
                        </div>
                        <div class="checkbox login__checkbox" style="margin-top: 15px;">
                            <label>
                                </label>
                            <a href="forget-password.php">Forget Password</a>
                        </div>
                        <div class="input__button">
 <button type="button" class="theme-btn1" 
 id="submit-btn" name="logincheckonsidebar" style="margin-top: 15px;width: 100%;">Login</button>
                        </div>
                       
  <p style="margin-top: 15px;text-align: left;">Don't have an account? <a href="register.php" style="color: #0d6efd">Register here.</a></p>
                    
                    </form>
                        <button class="popup-close" id="popupcloseButton">X</button>
                    </div></div>
 <script type="text/javascript">
//JavaScript to show/hide the popup
 document.getElementById('loginButton').addEventListener('click', function() {
     document.getElementById('loginPopup').style.display = 'flex';
     
     document.querySelector('.hero3-section-area .hero3-header').style.zIndex = '1';
       
     document.querySelector('.others-section-area3 .property-tab-section').style.zIndex = '1';
 });

 document.getElementById('popupcloseButton').addEventListener('click', function() {
     document.getElementById('loginPopup').style.display = 'none';
     document.querySelector('.hero3-section-area .hero3-header').style.zIndex = '2';
     
     document.querySelector('.others-section-area3 .property-tab-section').style.zIndex = '2';
 });
//JavaScript to show/hide the popup
 document.getElementById('getPhoneNo').addEventListener('click', function() {
     document.getElementById('loginPopup').style.display = 'flex';
  
 });

//JavaScript to show/hide the popup
 document.getElementById('loginButtonMobile').addEventListener('click', function() {
     document.getElementById('loginPopup').style.display = 'flex';
 });

 document.getElementById('closeButton').addEventListener('click', function() {
     document.getElementById('loginPopup').style.display = 'none';
 });

</script>
    
      <script>
$(document).ready(function() {
    $('#submit-btn').click(function(e) {
    e.preventDefault();

        // Get form data
        var formData = $('#login-form').serialize();

        // Send an AJAX request
        $.ajax({
            type: 'POST',
            url: 'login-controller.php',
            data: formData,
            success: function(response) {
                // Handle the response
                if (response === 'success') {
                	   $('.error-msg').text('Login Successful!').css('color', 'green');
                       // Reload the page after a short delay (you can adjust the delay)
                       setTimeout(function() {
                           location.reload();
                       }, 1500); 
                    // Redirect or perform actions after a successful login
                } else {
                    $('.error-msg').text(response).css('color', 'red');
                }
            },
            error: function() {
                $('.error-msg').text('An error occurred. Please try again.').css('color', 'red');
            }
        });
    });
});
</script>


 <!--===== JS SCRIPT LINK =======-->
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/plugins/fontawesome.js"></script>
  <script src="assets/js/plugins/aos.js"></script>
  <script src="assets/js/plugins/counter.js"></script>
  <script src="assets/js/plugins/gsap.min.js"></script>
  <script src="assets/js/plugins/ScrollTrigger.min.js"></script>
  <script src="assets/js/plugins/Splitetext.js"></script>
  <script src="assets/js/plugins/sidebar.js"></script>
  <script src="assets/js/plugins/swiper-slider.js"></script>
  <script src="assets/js/plugins/magnific-popup.js"></script>
  <script src="assets/js/plugins/mobilemenu.js"></script>
  <script src="assets/js/plugins/owlcarousel.min.js"></script>
  <script src="assets/js/plugins/nice-select.js"></script>
  <script src="assets/js/plugins/waypoints.js"></script>
  <script src="assets/js/plugins/slick-slider.js"></script>
  <script src="assets/js/plugins/circle-progress.js"></script>
  <script src="assets/js/main.js"></script>
  
<script>
window.addEventListener("load", function () {
    var loader = document.getElementById("preloader");
    if (loader) {
        loader.style.display = "none";
    }
});

// Backup safety (in case load event fails)
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        var loader = document.getElementById("preloader");
        if (loader) {
            loader.style.display = "none";
        }
    }, 1000);
});
</script>


  