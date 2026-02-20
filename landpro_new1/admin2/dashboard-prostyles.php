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
} .nice-select{width: 100%;}
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
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Add Property Styles</h3>
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
   <div class="ltn__form-box">

</div>






                <div class="ltn__form-box" style="padding-top: 40px;">
   
   <?php if(isset($_GET['styleID'])){
        $styleID = $_GET['styleID'];
        $query = "SELECT * FROM propertystyles WHERE styleID = '$styleID'";
        $result = mysqli_query($connn, $query);
        $row = mysqli_fetch_assoc($result);
        ?>
         <form action="action-controller.php" method="post">
         <input type="hidden" name="styleID" value="<?php echo $row['styleID']; ?>">
        <div class="row mb-50">
            <div class="col-md-4">
                <div class="input-item">
                    <label>Property Style Name:</label>
                    <input type="text" value="<?php echo $row['styleName']; ?>"  name="styleName" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="btn-wrapper" style="margin-top: 30px;">
                    <button type="submit" class="edit-btn" name="updatePropertystyle">Add Style</button>
                </div>
            </div>
        </div>
    </form>
        
   
   <?php } else {?>
    <form action="action-controller.php" method="post">
        <div class="row mb-50">
            <div class="col-md-4">
                <div class="input-item">
                    <label>Property Style Name:</label>
                    <input type="text" name="styleName" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="btn-wrapper" style="margin-top: 30px;">
                    <button type="submit" class="edit-btn" name="addPropertystyle">Add Style</button>
                </div>
            </div>
        </div>
    </form><?php } ?>

    <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Property Styles List</h3>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Style Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM propertystyles ORDER BY styleID";
            $result = mysqli_query($conn, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= ++$i ?></td>
                    <td><?= htmlspecialchars($row['styleName']) ?></td>
                    <td>
                
                  <a href="dashbord.php?prostyles&styleID=<?= $row['styleID'] ?>" class="btn btn-primary btn-sm">Edit</a> 
                        <a href="delete-controller.php?propertystyledelete=<?= $row['styleID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this style?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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





