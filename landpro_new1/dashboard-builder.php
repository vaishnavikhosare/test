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
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Builder Profile Details</h3>

   <div class="ltn__form-box">

</div>
<?php
$userID = $rowp['userID'];
// Fetch existing builder details
$stmt = $con->prepare("SELECT * FROM builders WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$builder = $stmt->get_result()->fetch_assoc();
?>

<div class="row">
    <!-- Logo Image Upload -->
    <div class="col-lg-4">
        <form id="imageForm" action="file_updates.php" method="post" enctype="multipart/form-data" style="text-align: center;">
            <?php if (isset($builder['logoImage']) && strlen($builder['logoImage']) > 5) { ?>
                <div id="imageContainer" style="background-image: url('<?php echo $builder['logoImage']; ?>');">
            <?php } else { ?>
                <div id="imageContainer" style="background-image: url('assets/images/default-user.png');">
            <?php } ?>
                <label for="fileInput" id="changeImageButton" class="fileInputLabel">
                    <i class="fa fa-camera"></i>
                    <input type="file" id="fileInput" name="builderLogoFile" style="display: none;">
                </label>
            </div>
            <p id="errorMessage" style="color: red; display: none;"></p>
        </form>
    </div>

    <!-- Greeting -->
    <div class="col-lg-8">
        <h4 style="line-height: 27px;margin-top: 20px;">Hello <span style="color: #0d6efd"><?php echo $rowp['username']; ?></span> (Builder)</h4>
        <p>Joined as Builder on : <?php echo convertdate($rowp['registrationDate']); ?></p>
    </div>
</div>

<!-- Builder Profile Form -->
<div class="ltn__form-box" style="padding-top: 40px;">
    <form action="action-controller.php" method="post">
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
                <button type="submit" class="edit-btn" name="updateBuilderProfile">Save Builder Profile</button>
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





