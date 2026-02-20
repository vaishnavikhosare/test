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
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Agent Profile Details</h3>

   <div class="ltn__form-box">

</div>
<?php
$userID=$rowp['userID'];
// Fetch existing agent details
$stmt = $con->prepare("SELECT * FROM agents WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$agent = $stmt->get_result()->fetch_assoc();
?>

<div class="row">
    <!-- Logo Image Upload -->
    <div class="col-lg-4">
        <form id="imageForm" action="file_updates.php" method="post" enctype="multipart/form-data" style="text-align: center;">
      
              <?php if (isset($agent['logoImage']) && strlen($agent['logoImage']) > 5) { ?>
                <div id="imageContainer" style="background-image: url('<?php echo $agent['logoImage']; ?>');">
            <?php } else { ?>
                <div id="imageContainer" style="background-image: url('assets/images/default-ueser.png');">
            <?php } ?>
                <label for="fileInput" id="changeImageButton" class="fileInputLabel">
                    <i class="fa fa-camera"></i>
                    <input type="file" id="fileInput" name="agentLogoFile" style="display: none;">
                </label>
            </div>
            <p id="errorMessage" style="color: red; display: none;"></p>
        </form>
    </div>

    <!-- Agent Info Form -->
    <div class="col-lg-8">
        <h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowp['username']; ?></span> (Agent)</h4>
        <p>Joined as Agent on : <?php echo convertdate($rowp['registrationDate']); ?></p>
    </div>
</div>

<!-- Agent Profile Form -->
<div class="ltn__form-box" style="padding-top: 40px;">
    <form action="action-controller.php" method="post">
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
                    <button type="submit" class="edit-btn" name="updateAgentProfile">Save Agent Profile</button>
                </div>
            </div>
        </div>
    </form>
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





