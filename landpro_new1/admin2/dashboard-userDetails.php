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
 #profileImage, #profileImage1, #profileImage2 {

            max-width: 150px;
            max-height: 150px;
            display: flex;
               border-radius: 50%;

            
        }
#changeImageButton, #changeImageButton1, #changeImageButton2 {
    cursor: pointer;
}
      #imageContainer, #imageContainer1, #imageContainer2 {
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
        #changeImageButton,#changeImageButton1,#changeImageButton2 {
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
         #changeImageButton i, #changeImageButton1 i, #changeImageButton2 i {
              background: #0d6efd;
         font-size: 20px; color: white;
         padding: 8px; border-radius: 50%; }
        
</style>   
   
   <?php 
   
   $userID = $_GET['userID'];
   
   $selectpuse = "SELECT * FROM users WHERE userID = '$userID'";
   $resultpuse = mysqli_query($con, $selectpuse);
   $rowpuse = mysqli_fetch_assoc($resultpuse);
   
   
   ?>
   

        <div class="dashborad-box stat bg-white">   
            
  <div class="tab-pane fade active show" id="ltn_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">User Details</h3>
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
   <div class="ltn__form-box">

</div>
<div class="row">
<div class="col-lg-4">
<form id="imageForm" action="file_updates.php" method="post" enctype="multipart/form-data" style="    text-align: center;">
<input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">

        <?php if (isset($rowpuse['profileimg']) && strlen($rowpuse['profileimg']) > 3) { ?>
        <div id="imageContainer" style="background-image: url('../<?php echo $rowpuse['profileimg']; ?>');">
        <?php } else { ?> 
                <div id="imageContainer" style="background-image: url('assets/images/default-ueser.png');">
         <?php } ?>   
 		 <label for="fileInput" id="changeImageButton" class="fileInputLabel">
            <i class="fa fa-camera"></i>
            <input type="file" id="fileInput" name="profilimgfile" style="display: none;">
        </label>
    </div>
    <p id="errorMessage" style="color: red; display: none;"></p>

</form>
</div>
<div class="col-lg-8">
<h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowpuse['username']; ?></span>
(<?php echo $rowpuse['userType']; ?>)</h4>
<p>Joining Date : <?php echo convertdate($rowpuse['registrationDate']); ?></p>
<h5></h5>

</div>


</div>
                                                <div class="ltn__form-box" style="padding-top: 40px;">
                                       <form action="action-controller.php" method="post">
                                                   <input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">
                                                        <div class="row mb-50">
                                                            <div class="col-md-6">
                                                            
                                                                <label>Name:</label>
  <input type="text" value="<?php echo $rowpuse['username']; ?>" name="username" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Contact No:</label>
 <input type="text" value="<?php echo $rowpuse['contact']; ?>" name="contact" required>
                                                            </div>
                                                                <div class="col-md-6">
                                                                <label> Email:</label>
                 <input type="email" readonly value="<?php echo $rowpuse['email']; ?>" placeholder="example@example.com">
                                                            </div>
<div class="col-md-6">
    <label>House/Flat No:</label>
         <input type="text" value="<?php echo $rowpuse['apartment']; ?>" name="office" id="officeInput" placeholder="House/Flat No">
</div>
<div class="col-md-6">
     <label>Locality/Street Name:</label>
        <input type="text" value="<?php echo $rowpuse['locality']; ?>" name="street" id="streetInput" placeholder="Locality/Street Name">
  
</div>
<div class="col-md-6">
 <label>City/Village:</label>
        <input type="text" value="<?php echo $rowpuse['city']; ?>" required name="city" id="cityInput" placeholder="City/Village">
 
</div>
<div class="col-md-6">
 <label>Country:</label>
        <input type="text" value="<?php echo $rowpuse['country']; ?>" required name="country" id="countryInput" placeholder="Country">
  
</div>
<div class="col-md-6">
 <label>Postal Code:</label>
 <input type="text" value="<?php echo $rowpuse['pinCode']; ?>" name="pcode" required placeholder="Postal Code">
                               
                                                    </div>                                               
                                                               <div class="col-md-12">
                         <div class="btn-wrapper" style="text-align: center;">
           <button type="submit" class="edit-btn" name="updatemainprodetails2" >Save Changes</button>
                                                        </div>
                                                        </div>
                                                            
                                                        </div>
                                                        </form>

<hr>
<?php if($rowpuse['userType']=="Agent"){ 
?>
    
    <div class="ltn__myaccount-tab-content-inner">
    <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Agent Profile Details</h3>
    
    <div class="ltn__form-box">
    
    </div>
    <?php
    $userID=$rowpuse['userID'];
    // Fetch existing agent details
    $stmt = $con->prepare("SELECT * FROM agents WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $agent = $stmt->get_result()->fetch_assoc();
    ?>

<div class="row">
    <!-- Logo Image Upload -->
    <div class="col-lg-4">
        <form id="imageForm1" action="file_updates.php" method="post" enctype="multipart/form-data" style="text-align: center;">
      <input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">
              <?php if (isset($agent['logoImage']) && strlen($agent['logoImage']) > 5) { ?>
                <div id="imageContainer1" style="background-image: url('../<?php echo $agent['logoImage']; ?>');">
            <?php } else { ?>
                <div id="imageContainer1" style="background-image: url('assets/images/default-ueser.png');">
            <?php } ?>
                <label for="fileInput1" id="changeImageButton1" class="fileInputLabel">
                    <i class="fa fa-camera"></i>
                    <input type="file" id="fileInput1" name="agentLogoFile" style="display: none;">
                </label>
            </div>
            <p id="errorMessage1" style="color: red; display: none;"></p>
        </form>
    </div>

    <!-- Agent Info Form -->
    <div class="col-lg-8">
        <h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowpuse['username']; ?></span> (Agent)</h4>
        <p>Joined as Agent on : <?php echo convertdate($rowpuse['registrationDate']); ?></p>
    </div>
</div>

<!-- Agent Profile Form -->
<div class="ltn__form-box" style="padding-top: 40px;">
    <form action="action-controller.php" method="post">
    <input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">
        <div class="row mb-50">
            <div class="col-md-6">
                <label>Agency Name:</label>
                <input type="text" name="agencyName" value="<?= $agent['agencyName'] ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label>License Number:</label>
                <input type="text" name="licenseNumber" value="<?= $agent['licenseNumber'] ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label>Operating Since (Year):</label>
                <input type="number" name="operatinSince" value="<?= $agent['operatinSince'] ?? '' ?>" placeholder="e.g. 2015" required>
            </div>

            <div class="col-md-6">
                <label>Public Email:</label>
                <input type="email" name="publicEmail" value="<?= $agent['publicEmail'] ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label>Public Contact:</label>
                <input type="text" name="publicContact" value="<?= $agent['publicContact'] ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label>Website:</label>
                <input type="text" name="website" value="<?= $agent['website'] ?? '' ?>" placeholder="https://youragency.com">
            </div>

            <div class="col-md-12">
                <label>Profile Description:</label>
                <textarea name="profileDescription" rows="4" placeholder="Describe your agency..."><?= $agent['profileDescription'] ?? '' ?></textarea>
            </div>

            <div class="col-md-6">
                <label>Facebook Link:</label>
                <input type="text" name="socialFacebook" value="<?= $agent['socialFacebook'] ?? '' ?>" placeholder="https://facebook.com/yourpage">
            </div>

            <div class="col-md-6">
                <label>LinkedIn Link:</label>
                <input type="text" name="socialLinkedIn" value="<?= $agent['socialLinkedIn'] ?? '' ?>" placeholder="https://linkedin.com/in/yourprofile">
            </div>

            <div class="col-md-6">
                <label>Instagram Link:</label>
                <input type="text" name="socialInstagram" value="<?= $agent['socialInstagram'] ?? '' ?>" placeholder="https://instagram.com/yourprofile">
            </div>

            <div class="col-md-12">
                <div class="btn-wrapper" style="text-align: center;">
                    <button type="submit" class="edit-btn" name="updateAgentProfile2">Save Agent Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
   
                                                </div>
                                        
    
    
    
    
    
    
    
    
    
    
    
    
<?php     
    
} else if($rowpuse['userType']=="Builder"){ ?>
  
       <div class="ltn__myaccount-tab-content-inner">
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Builder Profile Details</h3>

   <div class="ltn__form-box">

</div>
<?php
$userID = $rowpuse['userID'];
// Fetch existing builder details
$stmt = $con->prepare("SELECT * FROM builders WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$builder = $stmt->get_result()->fetch_assoc();
?>

<div class="row">
    <!-- Logo Image Upload -->
    <div class="col-lg-4">
        <form id="imageForm2" action="file_updates.php" method="post" enctype="multipart/form-data" style="text-align: center;">
       <input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">
            <?php if (isset($builder['logoImage']) && strlen($builder['logoImage']) > 5) { ?>
                <div id="imageContainer2" style="background-image: url('../<?php echo $builder['logoImage']; ?>');">
            <?php } else { ?>
                <div id="imageContainer2" style="background-image: url('assets/images/default-user.png');">
            <?php } ?>
                <label for="fileInput2" id="changeImageButton2" class="fileInputLabel">
                    <i class="fa fa-camera"></i>
                    <input type="file" id="fileInput2" name="builderLogoFile" style="display: none;">
                </label>
            </div>
            <p id="errorMessage2" style="color: red; display: none;"></p>
        </form>
    </div>

    <!-- Greeting -->
    <div class="col-lg-8">
        <h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowpuse['username']; ?></span> (Builder)</h4>
        <p>Joined as Builder on : <?php echo convertdate($rowpuse['registrationDate']); ?></p>
    </div>
</div>

<!-- Builder Profile Form -->
<div class="ltn__form-box" style="padding-top: 40px;">
    <form action="action-controller.php" method="post">
       <input type="hidden" name="userID" value="<?php echo $rowpuse['userID']; ?>">
        <div class="row mb-50">
            <div class="col-md-6">
                <label>Business/Company Name:</label>
                <input type="text" name="companyName" value="<?= $builder['companyName'] ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label>RERA ID:</label>
                <input type="text" name="reraID" value="<?= $builder['reraID'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>Registration No:</label>
                <input type="text" name="registrationNo" value="<?= $builder['registrationNo'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>Established Year:</label>
                <input type="number" name="establishedYear" value="<?= $builder['establishedYear'] ?? '' ?>" placeholder="e.g. 2005">
            </div>

            <div class="col-md-6">
                <label>Public Email:</label>
                <input type="email" name="publicEmail" value="<?= $builder['publicEmail'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>Public Contact:</label>
                <input type="text" name="publicContact" value="<?= $builder['publicContact'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>Website:</label>
                <input type="text" name="website" value="<?= $builder['website'] ?? '' ?>" placeholder="www.builders.com">
            </div>

            <div class="col-md-12">
                <label>Head Office Address:</label>
                <textarea name="headOfficeAddress" rows="2"><?= $builder['headOfficeAddress'] ?? '' ?></textarea>
            </div>

            <div class="col-md-12">
                <label>About:</label>
                <textarea name="aboutUs" rows="4"><?= $builder['aboutUs'] ?? '' ?></textarea>
            </div>

            <div class="col-md-6">
                <label>Facebook:</label>
                <input type="text" name="socialFacebook" value="<?= $builder['socialFacebook'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>LinkedIn:</label>
                <input type="text" name="socialLinkedIn" value="<?= $builder['socialLinkedIn'] ?? '' ?>">
            </div>

            <div class="col-md-6">
                <label>Instagram:</label>
                <input type="text" name="socialInstagram" value="<?= $builder['socialInstagram'] ?? '' ?>">
            </div>

            <div class="col-md-12" style="text-align: center;">
                <button type="submit" class="edit-btn" name="updateBuilderProfile2">Save Builder Profile</button>
            </div>
        </div>
    </form>
</div>
   
                                                </div>
                                
<?php 
}

?>



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


<script>
    document.getElementById('fileInput1').addEventListener('change', function(event) {
        var fileInput = event.target;
        var fileName = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var maxFileSize = 2 * 1024 * 1024; // 2MB
        
        if (!allowedExtensions.exec(fileName)) {
            document.getElementById('errorMessage1').textContent = 'Invalid file. Please select a jpg, png, or jpeg file.';
            document.getElementById('errorMessage1').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        if (fileInput.files[0].size > maxFileSize) {
            document.getElementById('errorMessage1').textContent = 'File size exceeds 2MB limit.';
            document.getElementById('errorMessage1').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        document.getElementById('errorMessage1').style.display = 'none';

        // Automatically submit the form
        document.getElementById('imageForm1').submit();
    });
</script>


<script>
    document.getElementById('fileInput2').addEventListener('change', function(event) {
        var fileInput = event.target;
        var fileName = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var maxFileSize = 2 * 1024 * 1024; // 2MB
        
        if (!allowedExtensions.exec(fileName)) {
            document.getElementById('errorMessage2').textContent = 'Invalid file. Please select a jpg, png, or jpeg file.';
            document.getElementById('errorMessage2').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        if (fileInput.files[0].size > maxFileSize) {
            document.getElementById('errorMessage2').textContent = 'File size exceeds 2MB limit.';
            document.getElementById('errorMessage2').style.display = 'block';
            fileInput.value = ''; // Reset the file input
            return false;
        }

        document.getElementById('errorMessage2').style.display = 'none';

        // Automatically submit the form
        document.getElementById('imageForm2').submit();
    });
</script>

