            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: center;">
           <h3>Listed Properties  </h3>
           
           <div style="text-align: right;">
   <a href="dashbord.php?addproperty=<?php echo $cu_id; ?>" class="btn btn-danger"><label> Add New Property</label></a></div>
            <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
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
    $qe = "SELECT * FROM properties AS p INNER JOIN users as u ON p.userID=u.userID ORDER BY p.isAproved";
    $resultpe = mysqli_query($conn, $qe);
    $countt = 0;
    while ($rowpe = mysqli_fetch_array($resultpe)) {
        $propertyID = $rowpe['propertyID'];
        $countt = $countt + 1;
        ?>
        <tr>
            <td class="ltn__my-properties-img">
                <a href="../property-details.php?propertyID=<?php echo $rowpe['propertyID']; ?>" target="_blank">
                    <?php
                    $qpx = "SELECT * FROM propertyimages WHERE propertyID='$propertyID'";
                    $resultpx = mysqli_query($connn, $qpx);
                  $rowpx = mysqli_fetch_array($resultpx);
                        $imageUrl = $rowpx['imageUrl'];
                        $imageID = $rowpx['imageID'];
                       ?>
                        <img src="../<?php echo $imageUrl; ?>" alt="<?php echo $imageID; ?>">
                  
                </a>
            </td>
            <td>
                <div class="ltn__my-properties-info">
                    <h6 class="mb-10">
                        <a href="../property-details.php?propertyID=<?php echo $rowpe['propertyID']; ?>" target="_blank">
                            <?php echo $rowpe['propertyTitle']; ?>
                        </a>
                    </h6>
                    <small><i class="icon-placeholder"></i> <?php echo $rowpe['addressNumber'] . " " . $rowpe['addressStreet'] . " " . $rowpe['addressCity'] . " " . $rowpe['country'] . " " . $rowpe['addressPostcode']; ?></small>
                </div>
            </td>
            <td>
                <a href="dashbord.php?user-details=<?php echo $rowpe['userId']; ?>" target="_blank" style="font-weight: 800;color: #00a3be;">
                    <?php echo $rowpe['username']; ?>
                </a>
                <br> (<?php echo $rowpe['email']; ?>)
            </td>
            <td>
                <a href="dashbord.php?addproperty=<?php echo $rowpe['userId']; ?>&propertyID=<?php echo $rowpe['propertyID']; ?>" class="">Edit</a>
            </td>
            <td>
                <?php if ($rowpe['isAproved'] == 1) { ?>
                    <button style="background: aquamarine;">Approved</button>
                <?php } else if ($rowpe['isAproved'] == 2) { ?>
                    <button style="background: coral;">Disapproved</button>
                <?php } else { ?>
                    <button style="background: antiquewhite;">Pending</button>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>

       
                                                          
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