      <style>
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
.table-edit-btn {
    background: #0d6efd none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    font-weight: 400;
    height: 100%;
    padding: 4px 10px;      -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize; }

.nice-select{width: 100%;}
   h6{text-align: center;color: #0d6efd;font-size: 20px;} .image-thumbnail {
    display: inline-block;    margin-right: 10px;    text-align: center;}
    .image-thumbnail img {   max-width: 200px;    height: auto;}
.delete-button {     background: #c90000;
    color: white;   display: block;    margin-top: 5px; }
  input[type="text"], input[type="number"],input[type="email"], input[type="password"], input[type="submit"], textarea { margin-bottom: 10px;   border: 1px solid #ddd;
    height: 50px;
    padding: 10px;
    width: 100%;}
  

   
   </style> 
   
 
   
   

   <div class="inner-pages">
 <div class="single-add-property">
                                      
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>









       <div class="ltn__form-box" >
    <!-- Add City Form -->
    
    <?php if (isset($_GET['cityID'])){
    $cityID = intval($_GET['cityID']);
    $city = mysqli_fetch_assoc(mysqli_query($connn, "SELECT * FROM cities WHERE cityID = $cityID"));
?>
<div style="border-top: 1px solid #ccc; padding-top: 30px;">
    <h4 class="text-primary">Manage Localities for: <?= htmlspecialchars($city['cityName']) ?> <a href="dashbord.php?cities" class="btn btn-danger"> < Back to Cities</a></h4>

    <!-- Add Locality Form -->
    <form action="action-controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cityID" value="<?= $cityID ?>">
        <div class="row">
            <div class="col-md-3"><input type="text" class="form-control" name="localityName" placeholder="Locality Name" required></div>
            <div class="col-md-3"><input type="text" class="form-control" name="postalCode" placeholder="Postal Code"></div>
            <div class="col-md-3"><input type="file" class="form-control" name="localityImg" required></div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success" name="addLocality">Add Locality</button>
            </div>
        </div>
    </form>

    <br>
    <!-- List Localities -->
    <table class="table">
        <thead>
            <tr><th>No</th><th>Locality</th><th>Postal Code</th><th>Image</th><th>Action</th></tr>
        </thead>
        <tbody>
            <?php
            $res = mysqli_query($connn, "SELECT * FROM localities WHERE cityID = $cityID ORDER BY localityName");
            $i = 0;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= htmlspecialchars($row['localityName']) ?></td>
                <td><?= htmlspecialchars($row['postalCode']) ?></td>
                <td><img src="../assets/img/localities/<?= $row['localityImg'] ?>" width="60"></td>
           <td><a href="dashbord.php?locality&cityID=<?= $cityID ?>&localityID=<?= $row['localityID'] ?>" class="table-edit-btn">Update</a>
                    </td>
   </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } else { ?>
    
      <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Add Cities</h3>
    
    <form action="action-controller.php" method="post">
        <div class="row mb-50">
            <div class="col-md-4">
                <div class="input-item">
                    <label>City Name:</label>
                    <input type="text" name="cityName" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="btn-wrapper" style="margin-top: 30px;">
                    <button type="submit" class="edit-btn" name="addCity">Add City</button>
                </div>
            </div>
        </div>
    </form>

    <h3 class="text-center text-primary" style="padding: 20px;">Cities List</h3>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>City Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM cities ORDER BY cityName");
            $i = 0;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= htmlspecialchars($row['cityName']) ?></td>
                <td>
                    <a href="dashbord.php?cities&cityID=<?= $row['cityID'] ?>" class="table-edit-btn">View Localities</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>  <?php } ?>
</div>


                
            
                                                         
                                         
                                            
                                        </div>
         </div>                               

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





