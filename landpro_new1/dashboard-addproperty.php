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
    width: 100%; }
 </style> 
   <div class="inner-pages">
  <div class="single-add-property">
        	<div>     <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px;;background: red;" href="dashbord.php?myproperties=<?php echo $cu_id; ?>">
           <i class="fas fa-arrow-left"></i> Back to Properties</a> 
              
            
 <?php $isApproved="pending"; $token=0; if(isset($_GET['propertyID'])){  
               $token=  $_GET['propertyID'];
                 $qptc="SELECT * FROM properties WHERE propertyToken='$token'";
     $resultptc = mysqli_query($connn,$qptc);
     $rowptc = mysqli_fetch_array($resultptc);
     $proID=$rowptc['propertyID'];  $isApproved=$rowptc['isApproved']; ?>
             
              <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px"
               href="dashbord.php?addproperty=&propertyID=<?php echo $rowptc['propertyToken']; ?>&propertCategory=<?php echo $rowptc['propertCategory']; ?>">
              Property ID: BH/<?php echo str_pad($proID, 6, '0', STR_PAD_LEFT); ?>
                 </a>  
                
                          <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px  "
               href="dashbord.php?propuserapplications&propertyID=<?php echo $rowptc['propertyToken']; ?>&propertCategory=<?php echo $rowptc['propertCategory']; ?>">
              <i class="fas fa-chart-line"></i> 
              <?php  $ucount=getPropertyApplicationCount($proID, $conff);  ?>
              
              Applications (<?php echo $ucount; ?>)             
                
                </a>       
                        <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px  "
               href="property-details.php?t=<?php echo $rowptc['propertyTitle']; ?>&PID=<?php echo $rowptc['propertyToken']; ?>&ca=<?php echo $rowptc['propertCategory']; ?>" target="_blank"  >
              <i class="fas fa-eye"></i> Preview
                
                
                </a>     
                            <?php if($isApproved=="approved"){  ?><a class="theme-btn-1 btn btn-effect-1 edit-btn" style="background: #0a9164;margin-bottom: 20px;">Approved</a>
    <?php } else if($isApproved=="disapproved"){  ?><a class="theme-btn-1 btn btn-effect-1 edit-btn" style="background: #ff0404;margin-bottom: 20px;">Disapproved</a>
    <?php } else if($isApproved=="pending"){?><button class="theme-btn-1 btn btn-effect-1 edit-btn" style="background: #e69918;color: #ffffff;margin-bottom: 20px;">Pending</button>
    <?php } ?>
                                          
            
             <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px" > Views (<?php echo $rowptc['viewCount']; ?>)</a>
             
            
               <?php } ?>  
               
   
                                     
        </div>                                                   
                                       
        
           
 <?php if(isset($_GET['propertCategory'])){  
     $propertCategory= $_GET['propertCategory'];
     
     if($propertCategory=='Rent'){      include 'dashboard-addpropert-rent.php'; }
     else if($propertCategory=='Sale') { include 'dashboard-addpropert-sales.php'; }
     else if($propertCategory=='PG') { include 'dashboard-addpropert-pg.php'; }
     else if($propertCategory=='Plot') { include 'dashboard-addpropert-plot.php'; }
     else if($propertCategory=='Project') { include 'dashboard-addpropert-project.php'; }
    
      } else {  ?> 
       
       
       
       
        <h3>Property description and price</h3>    
     
                            <div class="property-form-group">
                                  <form action="" method="get">
                                            <div class="row">
                                
                                                       <div class="col-lg-4 col-md-6">
                                                        <div class="input-item">
                                  <input type="hidden" name="addproperty" value="">
                                  
                      
                                      
 <select class="nice-select" name="propertCategory" required id="propertyTypeSelect1">

    <option value="">Select Category</option>
    <option value="Sale">Sales</option>
    <option value="Rent">Rent</option>
    <option value="PG">PG</option>
    <option value="Plot">Plot</option>
    </select>
    
    </div></div>
    <div class="col-lg-4 col-md-6">
    <div class="input-item">
    <button type="submit" class="btn"  style="max-width: 150px;background: #0d6efd;color: white;">
            Submit <i class="fas fa-mail-forward"></i>
        </button>
    
    
    
    </div>
    
    </div>
    </div>
    
    </form>
    


                               </div>
        <?php } ?>  
   </div>
   </div>
        <script>
function updateGoogleMaps() {
    const office = encodeURIComponent(document.getElementById('officeInput').value);
    const street = encodeURIComponent(document.getElementById('streetInput').value);
    const city = encodeURIComponent(document.getElementById('citySelect').selectedOptions[0]?.text || '');
    const locality = encodeURIComponent(document.getElementById('localitySelect').selectedOptions[0]?.text || '');
      const country = encodeURIComponent("India");
    
    console.log(office, street, city, locality, country);

    const googleMapsUrl = `https://maps.google.com/maps?width=100%&height=350px&hl=en&q=${office}+${street}+${locality}+${city},+${country}&ie=UTF8&t=&z=14&iwloc=B&output=embed`;

    document.getElementById('googleMapsIframe').src = googleMapsUrl;
}

// Attach listeners
document.querySelectorAll('.input-item input').forEach(input => {
    input.addEventListener('input', updateGoogleMaps);
});

   const city = encodeURIComponent(document.getElementById('citySelect').selectedOptions[0]?.text || '');
    const locality = encodeURIComponent(document.getElementById('localitySelect').selectedOptions[0]?.text || '');
  

document.getElementById('citySelect').addEventListener('change', updateGoogleMaps);
document.getElementById('localitySelect').addEventListener('change', updateGoogleMaps);

// Initial map load
updateGoogleMaps();

</script>   

                  
                                       
                                       
                                        