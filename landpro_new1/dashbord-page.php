  <div class="dashborad-box stat bg-white">            
                        <?php $count2=0; $qpf="SELECT * FROM properties WHERE userId='$cu_id' ";
$resultpf = mysqli_query($conn,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ $count2=$count2+1; } ?>
                        <p>Welcome to Bharatiya Properties. Here you can manage your profile, favorite Properteis & many more.</p>
                           
                           
                        <?php $messages = getUserProfileFillStatus($cu_id, $conff);

foreach ($messages as $msg) {
    echo '<div class="alert alert-' . $msg['type'] . ' d-flex justify-content-between align-items-center">';
    echo '<span>' . $msg['message'] . '</span>';
    echo '<a href="' . $msg['action_link'] . '" class="btn btn-sm btn-primary ms-3">' . $msg['action_text'] . '</a>';
    echo '</div>';
}
                         ?>   
                           
                            <h4 class="title">Your Activity</h4>
                            <div class="section-body">
                                <div class="row">
                           
                      <?php if($rowpu['userType']=='Owner' ||  $rowpu['userType']=='Buyer' || $rowpu['userType']=='Tenant' || $rowpu['userType']=='Agent' || $rowpu['userType']=='Builder' ) { ?> 
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
                                    </div> <?php } ?>
                            <?php $count=0; $qpf="SELECT * FROM usersfavprop WHERE userID='$cu_id' ";
$resultpf = mysqli_query($conf,$qpf);
while($rowpf = mysqli_fetch_array($resultpf)){ $count=$count+1; } ?>
                                    <div class="col-lg-3 col-md-6 dar booked">
                                        <div class="item mb-0">
                                            <div class="icon">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php echo $count;?></h6>
                                                <p class="type ml-1">Favorite Properties</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            </div>