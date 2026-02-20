
            <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
              <a href="dashbord.php?user-details=<?php echo $user_id; ?>&fav-properties=1" class="btn"  style="background: #cba135;color: white;">Favorite Properties </a>
               <a href="dashbord.php?user-details=<?php echo $user_id; ?>&applications=1" class="btn" style="background: #00a3be;color: white;">Property Applications </a>
                <a href="dashbord.php?user-details=<?php echo $user_id; ?>&userinquiries=1" class="btn" style="background: #cba135;color: white;">Inquiries </a>
         
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">Property Details</th>
                                                            <th scope="col"></th>
                                                   <th scope="col">User Details</th>
                                                            <th scope="col">Actions</th>
                                                                 <th scope="col">Status</th>
                                                        
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php

$qe="SELECT * FROM properties AS p INNER JOIN users as u ON p.userID=u.userID WHERE p.userID='$user_id' ORDER BY p.isAproved";
$resultpe = mysqli_query($conn,$qe);
$countt=0; while($rowpe = mysqli_fetch_array($resultpe)){ 
    $propertyID=$rowpe['propertyID'];
 
$countt=$countt+1;

$qpx="SELECT * FROM propertyimages WHERE propertyID='$propertyID'";
$resultpx = mysqli_query($connn,$qpx);
$imageID=$imageUrl=null;
while($rowpx = mysqli_fetch_array($resultpx)){
    $imageUrl=$rowpx['imageUrl'];
    $imageID=$rowpx['imageID']; 
    break;
}
$userId=$rowpe['userId'];
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
<?php echo $rowpe['propertyTitle']; ?></a></h6>
<small><i class="icon-placeholder"></i> <?php echo $rowpe['addressNumber']." ".$rowpe['addressStreet']." ".$rowpe['addressCity']." ".$rowpe['country']." ".$rowpe['addressPostcode']; ?></small>
                   
                                                                </div>
                                                            </td>
                  
<td><a href="dashbord.php?user-details=<?php echo $userId; ?>" target="_blank" style="font-weight: 800;color: #00a3be;"><?php echo $rowpe['username']; ?></a>
        <br> (<?php echo $rowpe['email']; ?>) </td> 
                                                  
         <td><a href="dashbord.php?addproperty=<?php echo $cu_id; ?>&propertyID=<?php echo $rowpe['propertyID']; ?>">Edit</a></td>
    <td><?php if($rowpe['isAproved']==1){  ?><button style="background: aquamarine;">Approved</button>
    <?php } else if($rowpe['isAproved']==2){  ?><button style="background: coral;">Disapproved</button>
    <?php } else {?><button style="background: antiquewhite;">Pending</button>
    <?php } ?>
    </td>

                                                          </tr>
                                                  <?php } ?>        
                                                          
                                                  </tbody>
                                                      </table>
                                                </div>
                  
                                          