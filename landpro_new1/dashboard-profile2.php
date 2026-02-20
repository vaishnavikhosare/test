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
            
        }
#changeImageButton {
    cursor: pointer;
}
      #imageContainer {
            position: relative;
            display: inline-block;
           
        }
        #changeImageButton {
            position: absolute;
            bottom: -10px;;
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
   <div class="ltn__form-box">    <form action="file_updates.php" method="post" enctype="multipart/form-data">
    <div class="row">
                                                 <div class="col-lg-4" style="text-align: center;">
    <?php if (isset($rowp['profileimg']) && strlen($rowp['profileimg']) > 3) { ?>
  <img  src="<?php echo $rowp['profileimg']; ?> " style="width: 100px;height: 100px;    border-radius: 50%; border: 3px solid #cba135;" alt="<?php echo $cu_id; ?>">
						
                              <?php } else { ?> 
            <img  src="assets/images/default-ueser.png"  style="width: 100px;height: 100px;border-radius: 50%;border: 3px solid #cba135;" alt="Default">
					 <?php } ?>
    </div>
     <div class="col-md-8  pt-20">
  <input type="file" id="myFile" name="cdoc_filename" required class="btn theme-btn-3 mb-10">
  <br><p>Note: Use only jpg, png, jpeg files only.
File size must be less than 1MB.</p>
      <button type="submit" name=updateprofileimage  class="edit-btn " style="height: auto;"  value="submit" >
            Update Profile
        </button>
        
        
       
        
         </div>
 </div>
</form>

<!--      <div class="profile-container">
         <?php if (isset($rowp['profileimg']) && strlen($rowp['profileimg']) > 3) { ?>
  <img  src="<?php echo $rowp['profileimg']; ?> " id="profileImage" class="profile-image"  alt="<?php echo $cu_id; ?>">
						
                              <?php } else { ?> 
            <img  src="img/default-ueser.png" id="profileImage" class="profile-image"  alt="Default">
					 <?php } ?>
               <input type="file" id="imageInput" accept="image/*" style="display: none;">
        <button id="changeImageButton">Change Image</button>
    </div>-->  </div>
    
    <div id="imageContainer">
    <img id="profileImage" src="assets/images/default-ueser.png" alt="Profile Image">
    <button id="changeImageButton"><i class="fa fa-camera" style=""></i></button>
</div>
                                                <div class="ltn__form-box" style="padding-top: 40px;">
                                       <form action="action-controller.php" method="post">
                                                        <div class="row mb-50">
                                                            <div class="col-md-6">
                                                                <label>Name:</label>
  <input type="text" value="<?php echo $rowp['username']; ?>" name="username" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Contact No:</label>
 <input type="text" value="<?php echo $rowp['contact']; ?>" name="contact" required>
                                                            </div>
                                                                <div class="col-md-6">
                                                                <label> Email:</label>
                 <input type="email" readonly value="<?php echo $rowp['email']; ?>" placeholder="example@example.com">
                                                            </div>
<div class="col-md-6">
    <label>House/Flat No:</label>
         <input type="text" value="<?php echo $rowp['apartment']; ?>" name="office" id="officeInput" placeholder="House/Flat No">
</div>
<div class="col-md-6">
     <label>Locality/Street Name:</label>
        <input type="text" value="<?php echo $rowp['locality']; ?>" name="street" id="streetInput" placeholder="Locality/Street Name">
  
</div>
<div class="col-md-6">
 <label>City/Village:</label>
        <input type="text" value="<?php echo $rowp['city']; ?>" required name="city" id="cityInput" placeholder="City/Village">
 
</div>
<div class="col-md-6">
 <label>Country:</label>
        <input type="text" value="<?php echo $rowp['country']; ?>" required name="country" id="countryInput" placeholder="Country">
  
</div>
<div class="col-md-6">
 <label>Postal Code:</label>
 <input type="text" value="<?php echo $rowp['pinCode']; ?>" name="pcode" required placeholder="Postal Code">
                               
                                                    </div>                                               
                                                               <div class="col-md-12">
                         <div class="btn-wrapper" style="text-align: center;">
           <button type="submit" class="edit-btn" name="updatemainprodetails" >Save Changes</button>
                                                        </div>
                                                        </div>
                                                            
                                                        </div>
                                                        </form>
   <form action="action-controller.php" method="post" onsubmit="return validatePassword()">
    <fieldset>
        <legend>Password change</legend>
        <div class="row">
            <div class="col-md-12">
                <label>Current password (leave blank to leave unchanged):</label>
                <input type="password" name="currentpass" required>
                <label>New password (leave blank to leave unchanged):</label>
                <input type="password" name="newpass" id="password" placeholder="at least 6 characters" required>
                <label>Confirm new password:</label>
                <input type="password" name="conpass" id="cpassword" required>
            </div>
        </div>
    </fieldset>
    <div class="btn-wrapper" style="text-align: center;">
        <button type="submit" class="edit-btn " name="upadtepropassword">Save Changes</button>
    </div>
</form>
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
    $(document).ready(function () {
        $("#changeImageButton").on("click", function () {
            // Trigger the file input
            $("#fileInput").click();
        });

        // Listen for changes in the file input
        $("#fileInput").on("change", function () {
            // Perform validation before uploading
            if (validateFile()) {
                // Valid file, proceed with upload
                uploadImage();
            } else {
                // Invalid file, display error alert
                alert("Invalid file. Please select a jpg, png, or jpeg file less than 2MB.");
                // Reset the file input to allow the user to choose a different file
                $("#fileInput").val("");
            }
        });
    });

    function validateFile() {
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var maxFileSize = 2 * 1024 * 1024; // 2MB

        var fileInput = $("#fileInput")[0];
        var fileName = fileInput.value;
        var fileSize = fileInput.files[0].size;

        // Check file extension
        if (!allowedExtensions.exec(fileName)) {
            return false;
        }

        // Check file size
        if (fileSize > maxFileSize) {
            return false;
        }

        return true;
    }

    function uploadImage() {
        // Use FormData to easily handle file uploads
        var formData = new FormData();
        formData.append("profilimgfile", $("#fileInput")[0].files[0]);
        
        console.log("File: " + formData.get('profilimgfile'));

        // Use Ajax to send the file to the server
        $.ajax({
            url: "profile_image_updates.php", // Your server-side script to handle the file upload
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Assuming your server responds with the path to the uploaded image
                var imagePath = response;
                
                if (imagePath === 'Error') { 
                    // Handle error case if needed
                } else {
                    $("#profileImage").attr("src", imagePath);
                }
            },
            error: function (error) {
                console.log("Error uploading image: " + error.responseText);
                alert("Error uploading image: " + error.responseText);
            }
        });
    }

</script>

<input type="file" id="fileInput">


