
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
    padding: 10px 20px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize;
}
</style>
      
  <div class="my-properties">
                                                  	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
         
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th >Favorite Properties</th>
                                           <th>Details</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

$qpf="SELECT * FROM usersfavprop WHERE userID='$cu_id' ORDER By favoriteID DESC";
$resultpf = mysqli_query($conf,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ 
    $propertyID=$rowpf['propertyID'];
    $favoriteID=$rowpf['favoriteID'];
    $countt=0; 
    
    $qpt = "
SELECT
    p.propertyID, p.propertyToken,
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
WHERE propertyID ='$propertyID'

UNION ALL

SELECT
    p.propertyID, p.propertyToken,
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
WHERE propertyID ='$propertyID'

UNION ALL

SELECT
    p.propertyID, p.propertyToken,
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
WHERE propertyID ='$propertyID'

UNION ALL

SELECT
    p.propertyID, p.propertyToken,
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
WHERE propertyID ='$propertyID'
ORDER BY propertyID DESC
";
    
    $resultpe = mysqli_query($conn,$qpt);
    $countt=0; $rowpe = mysqli_fetch_array($resultpe);
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
                           
                             
                                        <td><?php echo  convertdate($rowpf['adate']); ?></td>
   <td>  <a href="dashbord.php?callback=<?php echo $cu_id; ?>" class="edit-btn "> Enquire Now</a></td>
                                        <td class="actions">
   <a href="add_to_favorites.php?removeProp=1&favoriteID=<?php echo $favoriteID; ?>"> <button data-toggle="tooltip" title="Edit" onclick="return confirm('Are you sure you want to delete?');" class="pd-setting-ed"><i class="far fa-trash-alt"></i></button></a>                                       

                                        </td>
                                    </tr>
     <?php }    ?>
                                </tbody>
                            </table>
                      <!--       <div class="pagination-container">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>
                                              