
          <div class="tab-pane fade active show" id="ltn_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                             </div>
                                        </div>
     
     


                <div class="dashborad-box stat bg-white">            
                        <?php $count2=0; $qpf="SELECT * FROM properties ";
$resultpf = mysqli_query($conn,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ $count2=$count2+1; } ?>
                     <p class="notification">Hello <strong><?php echo $rowp['adminName']; ?></strong> (not <strong><?php echo $rowp['adminName']; ?></strong>? <small><a href="logout.php">Log out</a></small> )</p>
     
                            <h4 class="title">Dashboard</h4>
                            <div class="section-body">
                                <div class="row">
                           
                         <div class="col-lg-3 col-md-6 dar com mr-3">
                                        <div class="item mb-0">
                                            <div class="icon">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php echo $count2;?></h6>
                                                <p class="type ml-1">Your Properties</p>
                                            </div>
                                        </div>
                                    </div> 
                         
                           
                                </div>
                            </div>
                    
                            </div>
                        
               