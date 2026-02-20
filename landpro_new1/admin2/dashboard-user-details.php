<?php
$user_id=$_GET['user-details'];
?>
      
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: left;">
         
                                                     	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
  
  <?php  $qpc="SELECT * FROM users WHERE userID= '$user_id' ";
$resultpc = mysqli_query($conf,$qpc);
$rowpc = mysqli_fetch_array($resultpc);
?>
  
  <div class="ltn-author-introducing clearfix">
                                                        <div class="author-img">
                                                         <?php if (isset($rowpc['profileimg']) && strlen($rowpc['profileimg']) > 3) { ?>
  <img  src="../<?php echo $rowpc['profileimg']; ?> " alt="<?php echo $user_id; ?>" style="max-width: 250px;">
						
                              <?php } else { ?> 
            <img  src="../img/default-ueser.png"  alt="Default" style="max-width: 250px;">
					 <?php } ?>
                                                           
                                                        </div>
                                                        <div class="author-info">
                                                        
                                                            <h4 style="text-transform: uppercase;"><?php echo $rowpc['username']; ?></h4>
                                                            <h5>(<?php echo $rowpc['userType']; ?>)</h5>
                                                            <div class="footer-address">
                                                                <ul>
                                                             
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                              	              <i class="icon-call"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="tel:<?php echo $rowpc['contact']; ?>"><?php echo $rowpc['contact']; ?></a></p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-mail"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><a href="mailto:<?php echo $rowpc['email']; ?>"><?php echo $rowpc['email']; ?></a></p>
                                                                        </div>
                                                                    </li>
                                                                           <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-placeholder"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p><?php echo $rowpc['apartment']." ".$rowpc['locality']." ".$rowpc['city']." ".$rowpc['pinCode']." ".$rowpc['country']; ?></p>
                                                                        </div>
                                                                    </li>
                                                                        <li>
                                                                        <div class="footer-address-icon">
                                                                            <i class="icon-calendar"></i>
                                                                        </div>
                                                                        <div class="footer-address-info">
                                                                            <p>Added Date: <?php echo convertdate($rowpc['registrationDate']); ?></p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
<?php  if(isset($_GET['userinquiries'])){  include 'user-inquiries.php'; }
else if(isset($_GET['applications'])){  include 'user-applications.php'; }
else if(isset($_GET['fav-properties'])){  include 'user-properties.php'; }
else { include 'user-properties.php'; } ?>
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