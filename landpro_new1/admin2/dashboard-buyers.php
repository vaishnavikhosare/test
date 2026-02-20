          <?php if($adminDeg!=1){ header("location:dashbord.php"); } ?>
         
         
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: center;">
                                              
                                           	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
      			<h3>Buyers/Tenants List</h3>
      		
          
                                                <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                             <th scope="col">No</th>
                                                            <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                         <th scope="col">Contact No</th>
                                                  <th scope="col">Address</th>
                                                 <th scope="col">Reg. Date</th>
                                                         <!--    <th scope="col">Action</th>  -->
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$cu_id=$_SESSION['a_id'];
$t=0;
$qpx="SELECT * FROM users WHERE userType='Buyer' OR userType='Tenant' ORDER BY registrationDate DESC";
$resultpx = mysqli_query($connn,$qpx);
while($rowpx = mysqli_fetch_array($resultpx)){
    $t=$t+1;

?>      <tr>                              
  <td>   <?php echo $t; ?></td>
 <td>  
 <a href="dashbord.php?userDetails&userID=<?= $rowpx['userID'] ?>&type=<?= $rowpx['userType'] ?>" style="font-weight: 800;color: #00a3be;">  <?php echo $rowpx['username']; ?></a>
</td>
     <td>   <?php echo $rowpx['email']; ?></td>
 <td>   <?php echo $rowpx['contact']; ?></td>  
 <td>   <?php echo $rowpx['apartment']." ".$rowpx['locality']." ".$rowpx['city']." ".$rowpx['pinCode']; ?></td>
 <td>   <?php echo convertdate($rowpx['registrationDate']); ?></td>                                                     


                                                          </tr>
                                                  <?php } ?>        
                                                          
                                                  </tbody>
                                                      </table>
                                                </div>
                    
                                            </div>
                                        </div>
                                        
                                        <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
     <script>
    function validatePassword() {
        var newPassword = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;

        if (newPassword !== confirmPassword || newPassword.length < 6) {
            alert("Password and Confirm password do not match or the new password is too short.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>