         <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
         <a href="dashbord.php?user-details=<?php echo $user_id; ?>&fav-properties=1" class="btn"  style="background: #00a3be;color: white;">Favorite Properties </a>
               <a href="dashbord.php?user-details=<?php echo $user_id; ?>&applications=1" class="btn" style="background: #cba135;color: white;">Property Applications </a>
                <a href="dashbord.php?user-details=<?php echo $user_id; ?>&userinquiries=1" class="btn" style="background: #cba135;color: white;">Inquiries </a>
         
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">Property  Details</th>
                                                            <th scope="col"></th>
                                                              <th scope="col">Date Added</th>
                                                             </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$qpf="SELECT * FROM usersfavprop WHERE userID='$user_id' ORDER By favoriteID DESC";
$resultpf = mysqli_query($conf,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ 
    $propertyID=$rowpf['propertyID'];
    $favoriteID=$rowpf['favoriteID'];
    $countt=0; 
$qe="SELECT * FROM properties AS p INNER JOIN propertystyles AS t ON p.propertyStyle = t.styleID WHERE p.propertyID='$propertyID'";
$resultpe = mysqli_query($conn,$qe);

while($rowpe = mysqli_fetch_array($resultpe)){ 
    $propertyID=$rowpe['propertyID'];
 
$countt=$countt+1;

$qp="SELECT * FROM propertyimages WHERE propertyID='$propertyID'";
$resultp = mysqli_query($connn,$qp);
$imageID=$imageUrl=null;
while($rowp = mysqli_fetch_array($resultp)){
    $imageUrl=$rowp['imageUrl'];
    $imageID=$rowp['imageID']; 
    break;
}

?>                                    
                                                      
                                                                      <tr>
            <td class="ltn__my-properties-img">
            <a href="../property-details.php?propertyID=<?php echo $rowpe['propertyID']; ?>" target="_blank">
            
            <?php if($imageUrl!=null){?>
            <img src="../<?php echo $imageUrl; ?>" alt="<?php echo $imageID; ?>">
            <?php }else{?>
              <img src="../propert-images/NO_IMG.png" alt="Default">
            <?php } ?>
            </a>
             </td>
                                                            <td>
               <div class="ltn__my-properties-info">
<h6 class="mb-10"><a href="../property-details.php?propertyID=<?php echo $rowpe['propertyID']; ?>" target="_blank">
<?php echo $rowpe['styleName']; ?></a></h6>
<small><i class="icon-placeholder"></i> <?php echo $rowpe['addressNumber']." ".$rowpe['addressStreet']." ".$rowpe['addressCity']." ".$rowpe['country']." ".$rowpe['addressPostcode']; ?></small>
   </div>
                                                            </td>
                                                        
                                                            
     <td><?php echo  convertdate($rowpf['adate']); ?></td>                                              

 

                                                          </tr>
                                                  <?php }
if($countt==0){
  $filteredPropert = array_filter($properties['property'], function($raproperty) use ($propertyID) {
        return ($raproperty['propertyID'] == $propertyID); });
      foreach ($filteredPropert as $related) {
          
          $imageUrl = isset($related['images']['image'][0]) ? $related['images']['image'][0] : "propert-images/NO_IMG.png";
          
          if ($imageUrl=="h") {	$imageUrl = isset($related['images']['image']) ? $related['images']['image'] : "propert-images/NO_IMG.png";    }
    
          $department=$related['department'];
          
    ?>
               <tr>
            <td class="ltn__my-properties-img">
            <a href="../property-details.php?propertyID=<?php echo $related['propertyID']; ?>&propertyDepartment=<?php echo $related['department']; ?>" target="_blank">
            
            <?php if($imageUrl!=null){?>
            <img src="<?php echo $imageUrl; ?>" alt="">
            <?php }else{?>
              <img src="../propert-images/NO_IMG.png" alt="Default">
            <?php } ?>
            </a>
             </td>
                                                            <td>
<div class="ltn__my-properties-info">
<h6 class="mb-10"><a href="../property-details.php?propertyID=<?php echo $related['propertyID']; ?>&propertyDepartment=<?php echo $related['department']; ?>" target="_blank">

<?php if($department=='Commercial'){      $propertyTypes=$related['propertyTypes']['propertyType'][0]; 
               
 echo printPropertyStyles(2,$propertyTypes); ?>
    </a></h6>
<?php } else {  echo printPropertyStyles($related['propertyType'],$related['propertyStyle']); ?></a></h6>
<?php } ?>
<small><i class="icon-placeholder"></i> 
 <?php
$addressParts = [];

if (!empty($related['addressStreet'])) {
    $addressParts[] = $related['addressStreet'];
}

if (!empty($related['address2'])) {
    $addressParts[] = $related['address2'];
}

if (!empty($related['address3'])) {
    $addressParts[] = $related['address3'];
}

if (!empty($related['addressPostcode'])) {
    $addressParts[] = $related['addressPostcode'];
}

echo implode(", ", $addressParts);
?></small>
                   
                                                                </div>
                                                            </td>

          <td><?php echo  convertdate($rowpf['adate']); ?></td>                                                

 
                                                  </tr>
<?php }  } } ?>        
                                                          
                                                  </tbody>
                                                      </table>
                                                </div>