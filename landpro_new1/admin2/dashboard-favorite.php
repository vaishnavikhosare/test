
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: left;">
         
          
         <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
                                                    	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
         <h3 style="text-align: center;">Users Favorite Properties</h3>
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">Property Detail</th>
                                                            <th scope="col"></th>
                                                               <th scope="col">User Details</th>
                                                              <th scope="col">Date Added</th>
                                                            	
                                             		
                                                    
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$qpf="SELECT * FROM usersfavprop as f INNER JOIN users as u ON f.userID=u.userID ORDER By f.favoriteID DESC";
$resultpf = mysqli_query($conf,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ 
    $propertyID=$rowpf['propertyID'];
    $favoriteID=$rowpf['favoriteID'];
    $userID=$rowpf['userID'];
    $countt=0; 

    
    

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
<td><a href="dashbord.php?user-details=<?php echo $userID; ?>" target="_blank" style="font-weight: 800;color: #00a3be;"><?php echo $rowpf['username']; ?></a>
        <br> (<?php echo $rowpf['email']; ?>) </td>                                                         
                                                            
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
  <td><a href="dashbord.php?user-details=<?php echo $userID; ?>" target="_blank" style="font-weight: 800;color: #00a3be;"><?php echo $rowpf['username']; ?></a>
        <br> (<?php echo $rowpf['email']; ?>) </td>   
          <td><?php echo  convertdate($rowpf['adate']); ?></td>                                                

 
                                                  </tr>
<?php }  }  ?>        
                                                          
                                                  </tbody>
                                                      </table>
                                                </div>
                                       <!--          <div class="ltn__pagination-area text-center">
                                                    <div class="ltn__pagination">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                                            <li><a href="#">1</a></li>
                                                            <li class="active"><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">...</a></li>
                                                            <li><a href="#">10</a></li>
                                                            <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>