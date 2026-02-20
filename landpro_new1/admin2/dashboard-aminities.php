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
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Add Aminities</h3>
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
   <div class="ltn__form-box">

</div>






                    <div class="ltn__form-box" style="padding-top: 40px;">
         <form action="action-controller.php" method="post"   enctype="multipart/form-data" >
                                                        <div class="row mb-50">
                                                            <div class="col-md-4">
                                                           <div class="input-item ">  
                                                                <label>Aminity Name:</label>
  <input type="text" name="aminityname"   required></div>
                                                            </div>
      <div class="col-md-4">
      <div class="input-item input-item-textarea ltn__custom-icon">
  
       <label>Aminity Icon:</label><br>
       <input type="file" name="aminityicon"   id="fileInput" required>
       </div>
   </div>
 
 
 <div class="col-md-4"> <div class="input-item input-item-textarea ltn__custom-icon">
                                                                     <label>Aminity Type:</label>
                                                                   <select name="aminitytype" class="nice-select" required>
    <option value="">Select Plot Category</option>
    <option value="Residential">Residential</option>
    <option value="Commercial">Commercial</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Industrial">Industrial</option>
    <option value="NA">NA</option>
</select>


                      </div>                                         
                            </div>                                             
                                                               <div class="col-md-4">
                         <div class="btn-wrapper" >
           <button type="submit" class="edit-btn" name="addaminitiesmaster" >Add Aminity</button>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-8">
         <p> <b>Note:</b> Aminity Icon should be  (200 X 200 Px) in png format and less than 200kb.                                                
                                                         
                                                         
                                                         </div>
                                                            
                                                        </div>
                                                        </form>
   
                         
  
                                                   <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Aminities List</h3>
                                             <hr>       
                                                  	           
                          <table class="table">
                                                        <thead>
                                                          <tr>
                                                     <th scope="col">No</th>
                                                         <th scope="col">Aminity Name</th>
                                                             <th scope="col">Aminity Icon</th>
                                                             <th scope="col">Aminity Type</th>
                                                             <th scope="col">Action</th>
                                                         </tr>
                                                         </thead>
            <tbody>
            <?php $query = "SELECT * FROM amenitymaster ORDER BY amenityType, amenityName";
            
            $result = mysqli_query($conn, $query);
            $t=0;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo ++$t; ?></td>
                    <td><?php echo $row['amenityName']; ?></td>
                    <td><img src="../assets/img/aminities/<?php echo $row['amenityIcon']; ?>" alt="Aminity Icon" width="50"></td>
                    <td><?php echo $row['amenityType']; ?></td>
                    <td>
                        <a href="delete-controller.php?aminitydelete=<?php echo $row['amenityID']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td></tr>
                    <?php } ?>
                </tbody></table>
                
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





