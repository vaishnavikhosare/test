<?php ?>
      <style>
.img-fluid{ max-width: 170px;}
.edit-btn  {
    background: #0d6efd none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    height: 100%;
    padding: 4px 10px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize;
}
</style>
      
  <div class="my-properties">
  
     <a class="theme-btn-1 btn btn-effect-1 edit-btn" style="margin-bottom: 20px;" href="dashbord.php?addproperty=<?php echo $cu_id; ?>">
           <i class="fas fa-plus"></i> Add Property</a>
                                                  	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
         
                          <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">My Properties</th>
                                                            <th scope="col">Details</th>
                                           <th scope="col">Applications</th>
                                                            <th scope="col">Actions</th>
                                                                 <th scope="col">Status</th>
                                                            <th scope="col">Delete</th>
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$cu_id=$_SESSION['u_id'];
$qpt = "
SELECT
    p.propertyID, p.propertyToken, p.viewCount,
    p.propertCategory,
    p.propertyTitle,
    p.addressNumber,
    p.addressStreet,

    st.styleName AS style,
    pt.propertyTypeName AS type,
    c.cityName AS city,
    l.localityName AS locality,
    p.isApproved,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_sale s ON p.propertyID = s.propertyID
LEFT JOIN propertystyles st ON s.propertyStyle = st.styleID
LEFT JOIN propertytypes pt ON p.propertyType = pt.propertyTypeID
LEFT JOIN cities c ON p.cityID = c.cityID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.userId = '$cu_id' AND isApproved!='deleted'

UNION ALL

SELECT
    p.propertyID, p.propertyToken, p.viewCount,
    p.propertCategory,
    p.propertyTitle,
    p.addressNumber,
    p.addressStreet,
    st.styleName AS style,
    pt.propertyTypeName AS type,
    c.cityName AS city,
    l.localityName AS locality,
    p.isApproved,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_rent s ON p.propertyID = s.propertyID
LEFT JOIN propertystyles st ON s.propertyStyle = st.styleID
LEFT JOIN propertytypes pt ON p.propertyType = pt.propertyTypeID
LEFT JOIN cities c ON p.cityID = c.cityID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.userId = '$cu_id' AND isApproved!='deleted'

UNION ALL

SELECT
    p.propertyID, p.propertyToken, p.viewCount,
    p.propertCategory,
    p.propertyTitle,
    p.addressNumber,
    p.addressStreet,  
    NULL AS style,
    pt.propertyTypeName AS type,
    c.cityName AS city,
    l.localityName AS locality,
    p.isApproved,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_plot s ON p.propertyID = s.propertyID
LEFT JOIN propertytypes pt ON p.propertyType = pt.propertyTypeID
LEFT JOIN cities c ON p.cityID = c.cityID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.userId = '$cu_id' AND isApproved!='deleted'

UNION ALL

SELECT
    p.propertyID, p.propertyToken,  p.viewCount,
    p.propertCategory,
    p.propertyTitle,
    p.addressNumber,
    p.addressStreet,
    NULL AS style,
    pt.propertyTypeName AS type,
    c.cityName AS city,
    l.localityName AS locality,
    p.isApproved,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_pg s ON p.propertyID = s.propertyID
LEFT JOIN propertytypes pt ON p.propertyType = pt.propertyTypeID
LEFT JOIN cities c ON p.cityID = c.cityID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.userId = '$cu_id' AND isApproved!='deleted' 
ORDER BY propertyID DESC
";

$resultpe = mysqli_query($conn,$qpt);
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

?>                                    
                                                      
                                                          <tr>
            <td class="ltn__my-properties-img">
            <a href="property-details.php?t=<?php echo $rowpe['propertyTitle']; ?>&PID=<?php echo $rowpe['propertyToken']; ?>&ca=<?php echo $rowpe['propertCategory']; ?>" target="_blank">
            
            <?php if($imageUrl!=null){?>
            <img src="<?php echo $imageUrl; ?>" class="img-fluid" alt="<?php echo $imageID; ?>">
            <?php }else{?>
              <img src="propert-images/NO_IMG.png"  class="img-fluid" alt="Default">
            <?php } ?>
            </a>
             </td>
                                                            <td>
               <div class="ltn__my-properties-info">
<h6 class="mb-10"><a href="property-details.php?t=<?php echo $rowpe['propertyTitle']; ?>&PID=<?php echo $rowpe['propertyToken']; ?>&ca=<?php echo $rowpe['propertCategory']; ?>" target="_blank">
<?php echo $rowpe['propertyTitle']; ?></a></h6>
<small><i class="icon-placeholder"></i> <?php echo $rowpe['addressNumber']." ".$rowpe['addressStreet']." ".$rowpe['city']; ?></small>
      <br>    (<?php echo  $rowpe['propertCategory']." - ".$rowpe['type'] ;  ?>)       
                                                                </div>
                                                            </td>
                           
                                   <td>
                          
                          
                          <a class="" style="margin-bottom: 20px  "
               href="dashbord.php?propuserapplications&propertyID=<?php echo $rowpe['propertyToken']; ?>&propertCategory=<?php echo $rowpe['propertCategory']; ?>">
              <i class="fas fa-chart-line"></i> 
              <?php  $ucount=getPropertyApplicationCount($propertyID, $conff);  ?>
              
              App. (<?php echo $ucount; ?>)             
                
                <br>   <i class="fas fa-eye"></i> Views (<?php echo $rowpe['viewCount']; ?>)
                
                
                </a>
              
</td>                          
          
                                                  
         <td><a class="edit-btn "  href="dashbord.php?addproperty=&propertyID=<?php echo $rowpe['propertyToken']; ?>&propertCategory=<?php echo $rowpe['propertCategory']; ?>">Edit</a></td>
    <td><?php if($rowpe['isApproved']=="approved"){  ?><a class="edit-btn " style="background: #0a9164;">Approved</a>
    <?php } else if($rowpe['isApproved']=="disapproved"){  ?><a class="edit-btn "  style="background: #ff0404;">Disapproved</a>
    <?php } else if($rowpe['isApproved']=="pending"){?><button class="edit-btn " style="background: #e69918;color: #ffffff;">Pending</button>
    <?php } ?>
    </td>
<td>
<a href="delete-controller.php?deleteprobyuser=1&propertyID=<?php echo $rowpe['propertyToken']; ?>"> 
<button data-toggle="tooltip" title="Edit" onclick="return confirm('Are you sure you want to delete?');" class="edit-btn"  style="background: red;">
<i class="far fa-trash-alt"></i></button></a>

</td>
                                                          </tr>
                                                  <?php } ?>        
                                                          
                                                  </tbody>
                                                      </table>
 
                        </div>
                                              
    
    
    
    
            