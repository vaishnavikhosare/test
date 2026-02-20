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
                                        <h3 style="color: #0d6efd; text-align: center;padding: 20px;">Add Property Types</h3>
                               <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
   <div class="ltn__form-box">

</div>






               <div class="ltn__form-box" style="padding-top: 40px;">

<?php
if (isset($_GET['propertyTypeID'])) {
    $propertyTypeID = intval($_GET['propertyTypeID']);
    $query = "SELECT * FROM propertytypes WHERE propertyTypeID = $propertyTypeID";
    $result = mysqli_query($connn, $query);
    $row = mysqli_fetch_assoc($result);
?>
    <!-- Update Form -->
    <form action="action-controller.php" method="post">
        <input type="hidden" name="propertyTypeID" value="<?= $row['propertyTypeID']; ?>">
        <div class="row mb-50">
            <div class="col-md-4">
                <div class="input-item">
                    <label>Property Type Name:</label>
                    <input type="text" name="propertyTypeName" value="<?= htmlspecialchars($row['propertyTypeName']); ?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-item">
                    <label>Property Category:</label>
                    <select name="propertyCategory" class="nice-select" required>
                        <option value="Residential" <?= $row['propertyCategory'] == 'Residential' ? 'selected' : '' ?>>Residential</option>
                        <option value="Commercial" <?= $row['propertyCategory'] == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                        <option value="Industrial" <?= $row['propertyCategory'] == 'Industrial' ? 'selected' : '' ?>>Industrial</option>
                        <option value="Agricultural" <?= $row['propertyCategory'] == 'Agricultural' ? 'selected' : '' ?>>Agricultural</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-item">
                    <label>Available For:</label>
                    <select name="availableFor" class="nice-select" required>
                        <option value="buy" <?= $row['availableFor'] == 'buy' ? 'selected' : '' ?>>Buy</option>
                        <option value="rent" <?= $row['availableFor'] == 'rent' ? 'selected' : '' ?>>Rent</option>
                        <option value="both" <?= $row['availableFor'] == 'both' ? 'selected' : '' ?>>Both</option>
                        <option value="none" <?= $row['availableFor'] == 'none' ? 'selected' : '' ?>>None</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="btn-wrapper" style="margin-top: 30px;">
                    <button type="submit" class="edit-btn" name="updatePropertyType">Update</button>
                </div>
            </div>
        </div>
    </form>

<?php } else { ?>
    <!-- Insert Form -->
    <form action="action-controller.php" method="post">
        <div class="row mb-50">
            <div class="col-md-4">
                <div class="input-item">
                    <label>Property Type Name:</label>
                    <input type="text" name="propertyTypeName" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-item">
                    <label>Property Category:</label>
                    <select name="propertyCategory" class="nice-select" required>
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Agricultural">Agricultural</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-item">
                    <label>Available For:</label>
                    <select name="availableFor" class="nice-select" required>
                        <option value="buy">Buy</option>
                        <option value="rent">Rent</option>
                        <option value="both">Both</option>
                        <option value="none">None</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="btn-wrapper" style="margin-top: 30px;">
                    <button type="submit" class="edit-btn" name="addPropertyType">Add</button>
                </div>
            </div>
        </div>
    </form>
<?php } ?>

<h3 style="color: #0d6efd; text-align: center;padding: 20px;">Property Types List</h3>
<hr>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Type Name</th>
            <th>Category</th>
            <th>Available For</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM propertytypes ORDER BY propertyTypeID ASC");
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <tr>
            <td><?= ++$i ?></td>
            <td><?= htmlspecialchars($row['propertyTypeName']) ?></td>
            <td><?= $row['propertyCategory'] ?></td>
            <td><?= ucfirst($row['availableFor']) ?></td>
            <td>
                <a href="dashbord.php?protypes&propertyTypeID=<?= $row['propertyTypeID'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="delete-controller.php?propertytypedelete=<?= $row['propertyTypeID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>

                
            
                                                         
                                         
                                            
                                        </div>
         </div>                               







