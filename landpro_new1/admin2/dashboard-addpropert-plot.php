   <div class="inner-pages">
 <div class="single-add-property">
                             <h3>Land/Plot Property</h3>
           
 <?php if(isset($_GET['propertyID'])){  

     $propertCategory= $_GET['propertCategory'];
  
     $propertyToken=$_GET['propertyID'];     
     
     $qpt="SELECT * FROM properties as p INNER JOIN property_plot as s ON p.propertyID=s.propertyID
LEFT JOIN propertytypes as pt ON p.propertyType=pt.propertyTypeID
LEFT JOIN cities as c ON p.cityID=c.cityID
LEFT JOIN localities as l ON p.localityID=l.localityID
 WHERE p.propertyToken= '$propertyToken' ";
     $resultpt = mysqli_query($conn,$qpt);
     $rowpt = mysqli_fetch_array($resultpt);
     $propertyID=$rowpt['propertyID'];
    
     ?>

     
              <div class="">
                                  <form action="action-controller-plot.php" method="post">
                                          <input type="hidden" name="addproperty" value="0">
                                <input type="hidden"  name="propertCategory" value="<?php echo $propertCategory; ?>">
                                <input type="hidden" name="propertyID" value="<?php echo $propertyToken; ?>" readonly required>
                    
        <h6>Name & Types</h6>
<div class="row">

    <!-- Developer -->
    <div class="col-lg-4 col-md-6">
        <div class="input-item">
            <label class="input-title">Are You Developer:</label>
            <select name="isDeveloper" required id="isDeveloper">
                <option value="Yes" <?= ($rowpt['isDeveloper']=='Yes')?'selected':''; ?>>Yes</option>
                <option value="No" <?= ($rowpt['isDeveloper']=='No')?'selected':''; ?>>No</option>
            </select>
        </div>

        <div class="input-item" id="DeveloperName" style="display:none;">
            <label class="input-title">Developer Name:</label>
            <input type="text" name="developerName"
                   value="<?= $rowpt['developerName']; ?>"
                   id="deveName"
                   placeholder="eg. Mangalmurti Developers">
        </div>
    </div>

    <!-- Property Type -->
    <div class="col-lg-4 col-md-6">
        <div class="input-item">
            <label class="input-title">Property Type :</label>
            <select class="form-control" name="propertyType" required>
                <option value="">Select Type</option>
                <?php
                $selecttype="SELECT * FROM propertytypes WHERE availableFor='Plot'";
                $resulttype = mysqli_query($conn,$selecttype);
                while ($rowtype = mysqli_fetch_array($resulttype)) { ?>
                    <option value="<?= $rowtype['propertyTypeID']; ?>"
                        <?= ($rowtype['propertyTypeID']==$rowpt['propertyType'])?'selected':''; ?>>
                        <?= $rowtype['propertyTypeName']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="input-item">
            <label class="input-title">Property Category :</label>
            <select class="form-control" name="propertyCate" required>
                <option value="">Select Category</option>
                <option value="New" <?= ($rowpt['propertyCate']=='New')?'selected':''; ?>>New</option>
                <option value="Resale" <?= ($rowpt['propertyCate']=='Resale')?'selected':''; ?>>Resale</option>
            </select>
        </div>
    </div>

    <!-- Plot Category + Zone -->
    <div class="col-lg-4 col-md-6">
        <div class="input-item">
            <label class="input-title">Plot Category :</label>
            <select class="form-control" name="plot_category" id="plotCategorySelect" required>
    <option value="">Select Category</option>
    <option value="Residential" <?= ($rowpt['plot_category']=='Residential')?'selected':''; ?>>Residential</option>
    <option value="Commercial" <?= ($rowpt['plot_category']=='Commercial')?'selected':''; ?>>Commercial</option>
    <option value="Agriculture" <?= ($rowpt['plot_category']=='Agriculture')?'selected':''; ?>>Agriculture</option>
    <option value="Industrial" <?= ($rowpt['plot_category']=='Industrial')?'selected':''; ?>>Industrial</option>
    <option value="NA" <?= ($rowpt['plot_category']=='NA')?'selected':''; ?>>NA</option>
</select>

        </div>

        <div class="input-item">
            <label class="input-title">Zone Type:</label>
            <select class="form-control" name="propertyRegType" required>
                <option value="NA Plot" <?= ($rowpt['propertyRegType']=='NA Plot')?'selected':''; ?>>NA Plot</option>
                <option value="R-Zone" <?= ($rowpt['propertyRegType']=='R-Zone')?'selected':''; ?>>R-Zone</option>
                <option value="Proposed R-Zone" <?= ($rowpt['propertyRegType']=='Proposed R-Zone')?'selected':''; ?>>Proposed R-Zone</option>
                <option value="Commercial Zone" <?= ($rowpt['propertyRegType']=='Commercial Zone')?'selected':''; ?>>Commercial Zone</option>
                <option value="Agricultural Zone" <?= ($rowpt['propertyRegType']=='Agricultural Zone')?'selected':''; ?>>Agricultural Zone</option>
                <option value="Industrial Zone" <?= ($rowpt['propertyRegType']=='Industrial Zone')?'selected':''; ?>>Industrial Zone</option>
            </select>
        </div>
    </div>

</div>


<!-- ================= CATEGORY WISE DYNAMIC FIELDS ================= -->

<!-- ================= CATEGORY WISE DYNAMIC FIELDS ================= -->

<div style="margin-top:30px;">

    <!-- Residential -->
    <div id="residentialFields" style="display:none;">
        <h6 style="color:#0d6efd;">Residential Details</h6>
        <div class="row">
            <div class="col-md-6">
                <label>Layout Approved:</label>
                <select name="layoutApproved" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Gated Community:</label>
                <select name="gatedCommunity" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Park Available:</label>
                <select name="parkAvailable" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Street Lights:</label>
                <select name="streetLights" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>


    <!-- Commercial -->
    <div id="commercialFields" style="display:none;">
        <h6 style="color:#0d6efd;">Commercial Details</h6>
        <div class="row">
            <div class="col-md-6">
                <label>Parking Available:</label>
                <select name="parkingAvailable" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Main Road Facing:</label>
                <select name="mainRoadFacing" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Frontage (Feet):</label>
                <input type="text" name="frontage" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Metro Nearby:</label>
                <select name="metroNearby" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>


    <!-- Agriculture -->
    <div id="agricultureFields" style="display:none;">
        <h6 style="color:#0d6efd;">Agriculture Details</h6>
        <div class="row">
            <div class="col-md-6">
                <label>Soil Type:</label>
                <input type="text" name="soilType" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Borewell:</label>
                <select name="borewell" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Irrigation Facility:</label>
                <select name="irrigationFacility" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Fencing:</label>
                <select name="fencing" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>


    <!-- Industrial -->
    <div id="industrialFields" style="display:none;">
        <h6 style="color:#0d6efd;">Industrial Details</h6>
        <div class="row">
            <div class="col-md-6">
                <label>Electric Load (KW):</label>
                <input type="text" name="electricLoad" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Floor Allowed:</label>
                <input type="text" name="floorAllowed" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Truck Access:</label>
                <select name="truckAccess" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Factory Ready:</label>
                <select name="factoryReady" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>


    <!-- NA -->
    <div id="naFields" style="display:none;">
        <h6 style="color:#0d6efd;">NA Plot Details</h6>
        <div class="row">
            <div class="col-md-6">
                <label>NA Converted Year:</label>
                <input type="text" name="naConvertedYear" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Approval Authority:</label>
                <input type="text" name="approvalAuthority" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Development Status:</label>
                <select name="developmentStatus" class="form-control">
                    <option value="Developed">Developed</option>
                    <option value="Under Development">Under Development</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Drainage:</label>
                <select name="drainage" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
    </div>

</div>


                                                    
                              
                               
                   <h6  >Listing Location</h6>
                                                <div class="row">
                                                
  <div class="col-md-6">
  <div class=""> <lable class="input-title">City : </label>
    <select class="form-control"  name="cityId" required id="citySelect">
      <option value="">Select City</option>
      <?php
      $selectstyle = "SELECT * FROM cities";
      $resultstyle = mysqli_query($conn, $selectstyle);
      while ($rowcity = mysqli_fetch_array($resultstyle)) {
      ?>
        <option value="<?php echo $rowcity['cityID']; ?>" <?php if($rowcity['cityID']==$rowpt['cityID']){ echo "selected"; } ?>
        
        ><?php echo $rowcity['cityName']; ?></option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="col-md-6">
  <div class=""><lable class="input-title">Locality : </label>
    <select class="form-control" name="localityId" required id="localitySelect">
      <option value="">Select Locality</option>
       <?php
      $selectstyle = "SELECT * FROM localities ORDER BY localityName ASC";
      $resultstyle = mysqli_query($conn, $selectstyle);
      while ($rowcity = mysqli_fetch_array($resultstyle)) {
      ?>
        <option value="<?php echo $rowcity['localityID']; ?>" <?php if($rowcity['localityID']==$rowpt['localityID']){ echo "selected"; } ?>
        ><?php echo $rowcity['localityName']; ?></option>
      <?php } ?>
    </select>
  </div>
</div>
                                       
                                             <div class="col-md-6">
                                             
    <div class="input-item input-item-textarea ltn__custom-icon"><lable class="input-title">Office/House No : </label>
        <input type="text" name="office" id="officeInput" value="<?php echo $rowpt['addressNumber']; ?>"
         placeholder="Office/House No">
    </div>
</div>
<div class="col-md-6">
    <div class="input-item input-item-textarea ltn__custom-icon">
    <label class="input-title">Street Name, neighbourhood : </label>
        <input type="text" name="street" id="streetInput" value="<?php echo $rowpt['addressStreet']; ?>"
         placeholder="Street Name, neighbourhood">
    </div>
</div>

                                                
                                             
                                                   <div class="col-lg-12 pb-30" style="text-align: center;">
                                                   <button type="submit" name="updatepropertyfirst" class="btn" value="submit" style="max-width: 150px;background: #0d6efd;color: white;"> 
                                               Submit <i class="fas fa-mail-forward"></i>
                                               
                                                 </button> <br><br> </div>
                                                        <div class="col-lg-12">
                          <div class="property-details-google-map mb-60">
             <iframe style="width: 100%; height: 350px" id="googleMapsIframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    <a href="https://www.maps.ie/create-google-map/">Google map generator</a>
</iframe>     </div>
                                                    </div>
                                               
                       
                                                </div>
                                            </form>                             

                            
                            
     <h6 id="pricedetails">Listing Details</h6>

<form action="action-controller-plot.php" method="post">
    <div class="row">
        <input type="hidden" name="propertyID" value="<?php echo $propertyToken; ?>" readonly required>
        <input type="hidden" name="addproperty" value="0">
        <input type="hidden" name="propertCategory" value="<?php echo $propertCategory; ?>">

        <div class="col-md-12">
            <div class="input-item">
                <label class="input-title">Display Title:</label>
                <input type="text" name="propertyTitle" maxlength="120" readonly required
                    value="<?php echo $rowpt['propertyRegType']." ".$rowpt['propertyTypeName']; if(strlen($rowpt['developerName'])>6){ echo " By ".$rowpt['developerName'];  } echo ", ".$rowpt['localityName'].', '.$rowpt['cityName']; ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-item">
                <label class="input-title">Property Description:</label>
                <textarea name="mainSummary" placeholder="Property Description" required><?php echo $rowpt['mainSummary']; ?></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <label class="input-title">Price From (Rs):</label>
            <input type="number" name="priceFrom" value="<?= $rowpt['priceFrom']; ?>" step="0.01" min="0" required>
        </div>

        <div class="col-md-4">
            <label class="input-title">Price To (Rs):</label>
            <input type="number" name="priceTo" value="<?= $rowpt['priceTo']; ?>" step="0.01" min="0" required>
        </div>

        <div class="col-md-4">
            <label class="input-title">Plot Area:</label>
            <input type="number" name="plotArea" value="<?= $rowpt['plotArea']; ?>" step="0.01" required>
        </div>

        <div class="col-md-4">
            <label class="input-title">Plot Area Unit:</label>
            <select name="plotAreaUnit" required>
                <option value="sq ft" <?= ($rowpt['plotAreaUnit'] == 'sq ft') ? 'selected' : ''; ?>>Sq Ft</option>
                <option value="sq m" <?= ($rowpt['plotAreaUnit'] == 'sq m') ? 'selected' : ''; ?>>Sq M</option>
                <option value="gaj" <?= ($rowpt['plotAreaUnit'] == 'gaj') ? 'selected' : ''; ?>>Gaj</option>
                <option value="bigha" <?= ($rowpt['plotAreaUnit'] == 'bigha') ? 'selected' : ''; ?>>Bigha</option>
                <option value="acre" <?= ($rowpt['plotAreaUnit'] == 'acre') ? 'selected' : ''; ?>>Acre</option>
                <option value="hectare" <?= ($rowpt['plotAreaUnit'] == 'hectare') ? 'selected' : ''; ?>>Hectare</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="input-title">Total Plots:</label>
            <input type="number" name="totalPlots" value="<?= $rowpt['totalPlots']; ?>" min="1" required>
        </div>

        <div class="col-md-4">
            <label class="input-title">Gated Community:</label>
            <select name="gatedCommunity">
                <option value="Yes" <?= ($rowpt['gatedCommunity'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                <option value="No" <?= ($rowpt['gatedCommunity'] == 'No') ? 'selected' : ''; ?>>No</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="input-title">Corner Plot:</label>
            <select name="cornerPlot">
                <option value="Yes" <?= ($rowpt['cornerPlot'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                <option value="No" <?= ($rowpt['cornerPlot'] == 'No') ? 'selected' : ''; ?>>No</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="input-title">Boundary Wall:</label>
            <select name="boundaryWall">
                <option value="Yes" <?= ($rowpt['boundaryWall'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                <option value="No" <?= ($rowpt['boundaryWall'] == 'No') ? 'selected' : ''; ?>>No</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="input-title">Road Type:</label>
            <select name="roadType">
                <option value="Cement" <?= ($rowpt['roadType'] == 'Cement') ? 'selected' : ''; ?>>Cement</option>
                <option value="Tar" <?= ($rowpt['roadType'] == 'Tar') ? 'selected' : ''; ?>>Tar</option>
                <option value="Kachha" <?= ($rowpt['roadType'] == 'Kachha') ? 'selected' : ''; ?>>Kachha</option>
                <option value="Paved" <?= ($rowpt['roadType'] == 'Paved') ? 'selected' : ''; ?>>Paved</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="input-title">Road Width (Ft):</label>
            <input type="number" name="roadWidth" value="<?= $rowpt['roadWidth']; ?>" min="0" required>
        </div>

        <div class="col-lg-12 pb-30" style="text-align: center;">
            <button type="submit" name="upadtepropertysecond" class="btn" value="submit" style="max-width: 150px;background: #0d6efd;color: white;">
                Update <i class="fas fa-mail-forward"></i>
            </button>
            <br><br>
        </div>
    </div>
</form>
    
                                                                            
                                  </div></div>
                                    <div class="row">            
  <div class="col-lg-6 col-md-6">
    <h6  id="propertyimages">Listing Media</h6>
  
   <form action="action-controller-plot.php" method="post" enctype="multipart/form-data">
   
    <input type="hidden" name="propertyID" value="<?php echo $propertyToken; ?>" readonly required>
    <input type="hidden" name="addproperty" value="0">
    <input type="hidden" name="propertCategory" value="<?php echo $propertCategory; ?>">
    
    <input type="file" id="myFile" name="images[]" multiple required class="btn theme-btn-3 mb-10">
      <button type="submit" name="updatepropertyimages" class="btn" value="submit" style="max-width: 150px;background: #0d6efd;color: white;">
            Insert <i class="fas fa-mail-forward"></i>
        </button>

</form><p>
 <small>* At least 1 image is required. Maximum size is 2 MB/each.</small><br>
                                                    <small>* Supported Files: png, jpg, jpeg, webp, bmp only
                                                    </small><br>
                                                    <small>* Images might take longer to be processed.</small><br>
                                                </p>
     <div id="imageContainer">
  <?php $query = "SELECT * FROM propertyimages WHERE propertyID='$propertyID'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="image-thumbnail">
  <img style="max-width: 150px;" src="../<?php echo $row['imageUrl']; ?>" alt="Image">
    <a class="delete-button" href="action-controller-plot.php?addproperty&propertCategory=<?php echo $propertCategory; ?>&propertyID=<?php echo $propertyToken; ?>&imageID=<?php echo $row['imageID']; ?>">Delete</a>
  </div>
    <?php 
} ?>
</div></div>




  <div class="col-lg-6 col-md-6">
  <h6 id="amenities">Property Amenities</h6>
  <?php  $queryam = "SELECT * FROM amenitymaster WHERE amenityType = '$propertCategory'";
$resultam = $conn->query($queryam);

// Fetch selected amenities for this property
$selectedAmenities = [];
$querySelected = "SELECT amenityID FROM propertyamenities WHERE propertyID = $propertyID";
$resultSelected = $conn->query($querySelected);
while ($row = $resultSelected->fetch_assoc()) {
    $selectedAmenities[] = $row['amenityID'];
}
?>

<form action="action-controller-plot.php" method="post">
    <input type="hidden" name="propertyID" value="<?php echo $propertyToken; ?>">
    <input type="hidden" name="addproperty" value="0">
    <input type="hidden" name="propertCategory" value="<?php echo $propertCategory; ?>">

    <div class="form-group">
        <?php while ($row = $resultam->fetch_assoc()): ?>
            <?php
                $amenityID = $row['amenityID'];
                $checked = in_array($amenityID, $selectedAmenities) ? 'checked' : '';
            ?>
            <div>
                <input type="checkbox" name="wpa_ids[]" value="<?= $amenityID ?>" <?= $checked ?>>
                <img style="max-width: 50px;" src="../assets/img/aminities/<?= $row['amenityIcon'] ?>" alt="<?= $row['amenityIcon'] ?>">
                <b><?= htmlspecialchars($row['amenityName']) ?></b>
            </div>
        <?php endwhile; ?>
    </div>

    <button type="submit" name="add_proamenities" class="btn" style="max-width: 150px;background: #0d6efd;color: white;">Save Amenities</button>
</form>
  
  
  </div>
  
  
</div>
                                                   
                                      
                    
     
     
     
     
       <?php } else {  ?> 
       
           <div class="">
                                  <form action="action-controller-plot.php" method="post">
                                          <input type="hidden" name="addproperty" value="0">
                                <input type="hidden"  name="propertCategory" value="<?php echo $propertCategory; ?>">
                    
                                  
                         <h6>Name & Type</h6>
                                             <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="input-item">
                                 <lable class="input-title">Are You Developer: </lable>         
<select name="isDeveloper" required id="isDeveloper" >
    <option value="No" >No</option>
      <option value="Yes" >Yes</option>
  
                                  </select>                      </div>
                                            <div class="input-item" id="DeveloperName" style="display: none;">
                                 <lable class="input-title">Developer Name: </lable>         
<input type="text" name="developerName" id="deveName" value="-" placeholder="eg. Mangalmurti Developers">
                                                        </div>
                                                    </div>         
                                    
                                                       <div class="col-lg-4 col-md-6">
                                                        <div class="input-item">
                                                            <lable class="input-title">Type: </lable>  
<select class="form-control" name="propertyType" required id="propertyTypeSelect1">
<option value="">Select Type</option>
<?php $selecttype="SELECT * FROM propertytypes WHERE availableFor='Plot'"; 
$resulttype = mysqli_query($conn,$selecttype);
while ($rowtype = mysqli_fetch_array($resulttype)) { ?>
    <option value="<?php echo $rowtype['propertyTypeID']; ?>"><?php echo $rowtype['propertyTypeName']; ?></option>
<?php } ?>



</select>
                                                        </div>
                                                                            <div class="input-item">
                                 <lable class="input-title">Property Category : </lable>                      
<select class="form-control"  name="propertyCate" required id="">
<option value="">Select Category</option>
<option value="New" >New</option>
<option value="Resale" >Resale</option>
</select>
                                               </div>  
                                                    </div>
                                                    
                                      
                                      
                                                                  <div class="col-lg-4 col-md-6">
                                                        <div class="input-item">
                                 <lable class="input-title">Property Registation Type: </lable>                      
<select class="form-control"  name="propertyRegType" required id="">
<option value="">Select Category</option>
<option value="NA Plot" >NA Plot</option>
<option value="R-Zone" >R-Zone</option>
<option value="Proposed R-Zone" >Proposed R-Zone</option>
 <option value="Commercial Zone">Commercial Zone</option>
  <option value="Agricultural Zone" >Agricultural Zone</option>
  <option value="Industrial Zone" >Industrial Zone</option>

</select>
                                               </div>       </div>       
                                      
                                           
                                               
                                                    </div>
                                                    
                               
                   <h6>Listing Location</h6>
                                                <div class="row">
                                                
  <div class="col-md-6">
  <div class="">
  <lable class="input-title">City : </label>
    <select class="form-control"  name="cityId" required id="citySelect">
      <option value="">Select City</option>
      <?php
      $selectstyle = "SELECT * FROM cities";
      $resultstyle = mysqli_query($conn, $selectstyle);
      while ($rowcity = mysqli_fetch_array($resultstyle)) {
      ?>
        <option value="<?php echo $rowcity['cityID']; ?>"><?php echo $rowcity['cityName']; ?></option>
      <?php } ?>
    </select>
  </div>
</div>

<div class="col-md-6">
  <div class=""><lable class="input-title">Locality : </label>
    <select class="form-control" name="localityId" required id="localitySelect">
      <option value="">Select Locality</option>
       <?php
      $selectstyle = "SELECT * FROM localities ORDER BY localityName ASC";
      $resultstyle = mysqli_query($conn, $selectstyle);
      while ($rowcity = mysqli_fetch_array($resultstyle)) {
      ?>
        <option value="<?php echo $rowcity['localityID']; ?>"><?php echo $rowcity['localityName']; ?></option>
      <?php } ?>
    </select>
  </div>
</div>
                                       
                                             <div class="col-md-6">
    <div class="input-item input-item-textarea ltn__custom-icon">
    <lable class="input-title">Office/House No : </label>
        <input type="text" name="office" id="officeInput" placeholder="Office/House No">
    </div>
</div>
<div class="col-md-6">
    <div class="input-item input-item-textarea ltn__custom-icon">
    <label class="input-title">Street Name, neighbourhood : </label>
        <input type="text" name="street" id="streetInput" placeholder="Street Name, neighbourhood">
    </div>
</div>

                                                
                                             
                                                   <div class="col-lg-12 pb-30" style="text-align: center;">
                                                   <button type="submit" name="addpropertyfirst" class="btn" value="submit" style="max-width: 150px;background: #0d6efd;color: white;"> 
                                               Submit <i class="fas fa-mail-forward"></i>
                                               
                                                 </button> <br><br> </div>
                                                        <div class="col-lg-12">
                          <div class="property-details-google-map mb-60">
             <iframe style="width: 100%; height: 350px" id="googleMapsIframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    <a href="https://www.maps.ie/create-google-map/">Google map generator</a>
</iframe>     </div>
                                                    </div>
                                               
                       
                                                </div>
                                            </form> 
                               </div>  
       
       

                             
        <?php } ?>  
   </div>
   </div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var isDevSelect = document.getElementById("isDeveloper");
    var devNameDiv = document.getElementById("DeveloperName");
    var deveName = document.getElementById("deveName"); 

    // Initial toggle on page load
    if (isDevSelect.value === "Yes") {
        deveName.setAttribute("required", "");
        devNameDiv.style.display = "block";
    } else {
        deveName.removeAttribute("required");
         
        devNameDiv.style.display = "none";
    }

    // Toggle on change
    isDevSelect.addEventListener("change", function () {
        if (this.value === "Yes") {
            deveName.setAttribute("required", "");
            devNameDiv.style.display = "block";
        } else {
            deveName.removeAttribute("required");
       
            devNameDiv.style.display = "none";
        }
    });
});
</script>



        <script>
document.addEventListener("DOMContentLoaded", function () {

    var categorySelect = document.getElementById("plotCategorySelect");

    function toggleFields() {

        document.getElementById("residentialFields").style.display = "none";
        document.getElementById("commercialFields").style.display = "none";
        document.getElementById("agricultureFields").style.display = "none";
        document.getElementById("industrialFields").style.display = "none";
        document.getElementById("naFields").style.display = "none";

        switch(categorySelect.value) {
            case "Residential":
                document.getElementById("residentialFields").style.display = "block";
                break;
            case "Commercial":
                document.getElementById("commercialFields").style.display = "block";
                break;
            case "Agriculture":
                document.getElementById("agricultureFields").style.display = "block";
                break;
            case "Industrial":
                document.getElementById("industrialFields").style.display = "block";
                break;
            case "NA":
                document.getElementById("naFields").style.display = "block";
                break;
        }
    }

    toggleFields();
    categorySelect.addEventListener("change", toggleFields);

});
</script>
        
       
            
      
                                       
                                       
                                        