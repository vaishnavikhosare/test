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
    
    <?php if (isset($_GET['localityID'])){
    $cityID = intval($_GET['cityID']);
    $localityID = intval($_GET['localityID']);
    $city = mysqli_fetch_assoc(mysqli_query($connn, "SELECT * FROM localities WHERE localityID = $localityID"));
?>
<div style="border-top: 1px solid #ccc; padding-top: 30px;">
<a href="dashbord.php?cities&cityID=<?php echo $cityID; ?>" class="btn btn-danger"> Go Back</a>
<br><br>
    <h4 class="text-primary">Manage Nearby for: <?= htmlspecialchars($city['localityName']) ?> </h4>

 <!-- Add Locality Form -->
      <form action="action-controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cityID" value="<?= $cityID ?>">
             <input type="hidden" name="localityID" value="<?= $localityID ?>">
        <div class="row">
            <div class="col-md-4"><input type="text" class="form-control" value="<?= htmlspecialchars($city['localityName']) ?>"   name="localityName" placeholder="Locality Name" required></div>
            <div class="col-md-4"><input type="text" class="form-control" value="<?= htmlspecialchars($city['postalCode']) ?>" name="postalCode" placeholder="Postal Code"></div>
            <div class="col-md-4"><input type="file" class="form-control" style="height: 50px;" name="localityImg" required></div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success" name="updateLocality">Update Locality</button>
            </div>
        </div>
    </form>

<hr>


<h3 class="text-primary">Add Nearby Places</h3>
    <!-- Add Locality Form -->
    <form action="action-controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cityID" value="<?= $cityID ?>">
        <input type="hidden" name="localityID" value="<?= $localityID ?>">
        <div class="row">
        <div class="col-md-3"><input type="text" class="form-control" name="placeName" placeholder="Place Name" required></div>
        <div class="col-md-3"><input type="number" class="form-control" name="distance" placeholder="Distance" required></div>
        <div class="col-md-3">
            <select class="form-control nice-select" name="distanceType" style="height: 50px;" required>
                <option value="Min">Minutes</option>
                <option value="Km">Kilometers</option>
                </select></div>
         <div class="col-md-3">
                <button type="submit" class="btn btn-success" name="addnearby">Add Nearby</button>
            </div>
        </div>
    </form>

    <br>
    <!-- List Localities -->
    <table class="table">
        <thead>
            <tr><th>No</th><th>Place</th><th>Distance</th><th>Action</th></tr>
        </thead>
        <tbody>
            <?php
            $res = mysqli_query($connn, "SELECT * FROM nearbyplaces WHERE localityID = $localityID ORDER BY nearbyID");
            $i = 0;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= htmlspecialchars($row['placeName']) ?></td>
                <td><?= htmlspecialchars($row['distance']) ?> <?= htmlspecialchars($row['distanceType']) ?></td>
                <td>
                    <form action="action-controller.php" method="get" style="display:inline;">
                        <input type="hidden" name="nearbyID" value="<?= $row['nearbyID'] ?>">
                        <input type="hidden" name="localityID" value="<?= $localityID ?>">
                        <input type="hidden" name="cityID" value="<?= $cityID ?>">
                        <button type="submit" class="btn btn-danger btn-sm" name="deletenearby">Delete</button>
                    </form>
                </td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
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





