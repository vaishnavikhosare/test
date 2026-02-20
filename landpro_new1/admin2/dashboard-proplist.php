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
 @media (min-width: 576px) {
    .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
        width: 100px;
    }
}
</style>
      
  <div class="my-properties">
  

                                                  	  <?php 
                                                  	  
                                                  	  $limit = 20; if(isset($_SESSION['limit'])) { $limit = intval($_SESSION['limit']); }   if(isset($_GET['limit'])) { $limit = intval($_GET['limit']);  $_SESSION['limit']= $limit; }
                                                  	  
                                                  	  
                                                  	  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
  
  
  <h4 class="mb-4">Properties List</h4>
  
         <div class="row"> <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
<input type="text" id="tableSearch" class="form-control mb-3" placeholder="Search from table" style="max-width: 250px;">
</div><div class="col-lg-6 col-md-6 col-sm-12 mb-3" >
<form method="get" action="dashbord.php" class="form-inline mb-3">
<input type="hidden" name="propertlist" value="1">
    <label for="limitSelect" class="mr-2">Records/Page:</label>
    <select name="limit" id="limitSelect" class="form-control" onchange="this.form.submit()" style="max-width: 50px;">
        <?php
        $options = [20, 50, 100];
        foreach ($options as $opt) {
            $selected = ($limit == $opt) ? 'selected' : '';
            echo "<option value='$opt' $selected>$opt</option>";
        }
        ?>
    </select>
</form>
</div>

</div>

         
                          <table class="table">
                                                        <thead>
                                                          <tr>
                                                     <th scope="col"></th>
                                                   <th scope="col">Properties Details</th>
                                          <th scope="col">User Details</th>
                                              <th scope="col">Applications</th>
                                                            <th scope="col">Actions</th>
                                                                 <th scope="col">Status</th>
                                                     
                                                          </tr>
                                                        </thead>
                                                    
 <tbody id="TableBody">
<?php

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

$countQuery = "
SELECT COUNT(*) AS total FROM (SELECT propertyID FROM properties WHERE isApproved='approved') AS total_pending
";

$countResult = mysqli_query($conn, $countQuery);
$row = mysqli_fetch_assoc($countResult);
$totalRecords = $row['total'];
$totalPages = ceil($totalRecords / $limit);


$qpt = "
SELECT
    p.propertyID,
    p.propertyToken,
    p.userId,
    p.viewCount,
    p.propertCategory,
    p.propertyTitle,
    p.addressNumber,
    p.addressStreet,
    pt.propertyTypeName AS type,
    c.cityName AS city,
    l.localityName AS locality,
    p.isApproved,
    (SELECT imageUrl FROM propertyimages
        WHERE propertyID = p.propertyID
        LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_plot s ON p.propertyID = s.propertyID
LEFT JOIN propertytypes pt ON p.propertyType = pt.propertyTypeID
LEFT JOIN cities c ON p.cityID = c.cityID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.isApproved = 'approved'
ORDER BY p.propertyID DESC
LIMIT $limit OFFSET $offset
";


$resultpe = mysqli_query($conn,$qpt);
$countt=0; while($rowpe = mysqli_fetch_array($resultpe)){ 
    $propertyID=$rowpe['propertyID'];
    
    

    
 
$countt=$countt+1;

$qpx="SELECT * FROM propertyimages WHERE propertyID='$propertyID'";
$resultpx = mysqli_query($conn,$qpx);
$imageID=$imageUrl=null;
while($rowpx = mysqli_fetch_array($resultpx)){
    $imageUrl=$rowpx['imageUrl'];
    $imageID=$rowpx['imageID']; 
    break;
}

$selectuserdetails="SELECT * FROM users WHERE userId=".$rowpe['userId'];
$resultuserdetails = mysqli_query($conn,$selectuserdetails);
$rowuserdetails = mysqli_fetch_array($resultuserdetails);



?>                                    
                                                      
                                                          <tr>
                                             
                                                          
            <td class="ltn__my-properties-img">
            <a href="../property-details.php?t=<?php echo $rowpe['propertyTitle']; ?>&PID=<?php echo $rowpe['propertyToken']; ?>&ca=<?php echo $rowpe['propertCategory']; ?>" target="_blank">
            
            <?php if($imageUrl!=null){?>
            <img src="../<?php echo $imageUrl; ?>" class="img-fluid" alt="<?php echo $imageID; ?>">
            <?php }else{?>
              <img src="../propert-images/NO_IMG.png"  class="img-fluid" alt="Default">
            <?php } ?>
            </a>
             </td>
                                                            <td>
               <div class="ltn__my-properties-info">
<h6 class="mb-10"><a href="../property-details.php?t=<?php echo $rowpe['propertyTitle']; ?>&PID=<?php echo $rowpe['propertyToken']; ?>&ca=<?php echo $rowpe['propertCategory']; ?>" target="_blank">
<?php echo $rowpe['propertyTitle']; ?></a></h6>
<small><i class="icon-placeholder"></i> <?php echo $rowpe['addressNumber']." ".$rowpe['addressStreet']." ".$rowpe['city']; ?></small>
      <br>    (<?php echo  $rowpe['propertCategory']." - ".$rowpe['type'] ;  ?>)       
                                                                </div>
                                                            </td>
                <td>
                
               <div class="ltn__my-properties-info">
<h6 class="mb-10"><a href="user-details.php?userID=<?php echo $rowuserdetails['userID']; ?>&type=<?php echo $rowuserdetails['userType']; ?>" target="_blank">
<?php echo $rowuserdetails['username']; ?></a></h6>
<small><i class="icon-placeholder"></i> <?php echo $rowuserdetails['contact']." - ".$rowuserdetails['email']; ?></small>
      <br>    (<?php echo  $rowuserdetails['userType'];  ?>)       
                                                                </div>
                                                            </td>                  
                       
                          <td>
                          
                          
                          <a class="" style="margin-bottom: 20px  "
               href="dashbord.php?propuserapplications&propertyID=<?php echo $rowpe['propertyToken']; ?>&propertCategory=<?php echo $rowpe['propertCategory']; ?>">
              <i class="fas fa-chart-line"></i> 
              <?php  $ucount=getPropertyApplicationCount($propertyID, $conn);  ?>
              
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

</td>
                                                          </tr>
                                                  <?php } ?>        
                                                          
                                                  </tbody>
                                                      </table>
 
                        </div>
  <div class="pagination-container mt-4">
    <nav>
        <ul class="pagination justify-content-center">
            <!-- Previous Button -->
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="btn btn-common" href="?myproperties&page=<?= max(1, $page - 1) ?>"><i class="lni-chevron-left"></i> Previous</a>
            </li>

            <?php
            if ($page == 1) {
                $pages = [1, 2, 3];
            } else {
                $pages = [$page - 1, $page, $page + 1];
            }

            // Ensure pages are within bounds
            foreach ($pages as $p) {
                if ($p > 0 && $p <= $totalPages) {
                    echo '<li class="page-item ' . ($p == $page ? 'active' : '') . '">';
                    echo '<a class="page-link" href="?myproperties&page=' . $p . '">' . $p . '</a>';
                    echo '</li>';
                }
            }
            ?>

            <!-- Next Button -->
            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="btn btn-common" href="?myproperties&page=<?= min($totalPages, $page + 1) ?>">Next <i class="lni-chevron-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
                       
    
    
    
    
            