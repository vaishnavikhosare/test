    <style type="text/css">
    label{padding-left: 10px;}
  
input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="date"], input[type="submit"], textarea {
    background-color: var(--white);
    border: 2px solid gray;
  
    height: 46px;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-left: 20px;
    font-size: 16px;
    color: var(--ltn__paragraph-color);
    width: 100%;
    margin-bottom: 30px;
    border-radius: 7px;
    padding-right: 40px;
    margin-bottom: 10px;
}
.edit-btn  {
    background: #0d6efd none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    height: 100%;
    padding: 10px 20px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize;
}
.profile-container {
    text-align: center;
}

.profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
}
 #profileImage {

            max-width: 150px;
            max-height: 150px;
            display: flex;
               border-radius: 50%;

            
        }
#changeImageButton {
    cursor: pointer;
}
      #imageContainer {
            position: relative;
            display: inline-block;
               background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
       width: 130px;
    height: 130px;
    border: 3px solid #0d6efd;
    border-radius:50%; 
    
        }
        #changeImageButton {
            position: absolute;
    bottom: -20px;
    background: #0d6efd;
    left: 50%;
            transform: translateX(-50%);
            background: none;
            border: none;
            cursor: pointer;
            z-index: 999;
        }
         #changeImageButton i{
              background: #0d6efd;
         font-size: 20px; color: white;
         padding: 8px; border-radius: 50%; }
        
</style>   
   

        <div class="dashborad-box stat bg-white">   
            
  <div class="tab-pane fade active show" id="ltn_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Profile Details</h3>
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
   <div class="ltn__form-box">

</div>
<div class="row">

<div class="col-lg-12">
<h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowp['adminName']; ?></span>
(Admin)</h4>
<p>Update Date : <?php echo $rowp['timestamp']; ?></p>
<h5></h5>

</div>


</div>
                                                <div class="ltn__form-box" style="padding-top: 40px;">
                                     <form action="action-controller.php" method="post" onsubmit="return validatePassword()">
    <fieldset>

        <div class="row">
         <div class="col-md-6">
                <label>Email:</label>
                 <input type="email" readonly value="<?php echo $rowp['adminemail']; ?>" placeholder="example@example.com">
             <label>Name:</label>
  <input type="text" value="<?php echo $rowp['adminName']; ?>" name="username" required>
        </div>
            <div class="col-md-6">
                <label>Current password :</label>
                <input type="password" name="currentpass" required>
                <label>New password (leave blank to leave unchanged):</label>
                <input type="password" name="newpass" id="password" placeholder="at least 6 characters" required>
                <label>Confirm new password:</label>
                <input type="password" name="conpass" id="cpassword" required>
            </div>
        </div>
    </fieldset>
    <div class="btn-wrapper" style="text-align: center;">
        <button type="submit" class="btn theme-btn-1 btn-effect-1 edit-btn" name="upadtepropassword">Save Changes</button>
    </div>
</form>
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





