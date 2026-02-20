    <style>   .edit-btn  {
    background: #0d6efd none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    
    padding: 10px 20px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize;
} .nice-select{width: 100%;}

 input[type="text"], input[type="number"],input[type="email"], input[type="password"], input[type="submit"], textarea { margin-bottom: 10px;   border: 1px solid #ddd;
    height: 50px;
    padding: 10px;
    width: 100%;}
    </style>
    
    
          <?php if($adminDeg!=1){ header("location:dashbord.php"); } ?>
         
         
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: center;">
                                              
                                           	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
      
      		<form action="action-controller.php" method="post" class="" onsubmit="return validatePassword()">
							<h3>Create New Admin User</h3>
							<input type="hidden" name="designation" value="1">
							
					<div class="row"><div class="col-lg-4">	
								<input type="text" name="firstname" placeholder="Name" required> 
					</div><div class="col-lg-4">		<input	type="text" name="email" placeholder="Email*" required>
							
</div><div class="col-lg-4">
									 <input type="password" name="password" id="password" placeholder="Password* at least 6 characters" required class="password-input">
  </div><div class="col-lg-4">  <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password*" required class="password-input">
	<?php     $s1=rand(11,20);$s2=rand(11,20);$s5=rand(5555,9999);$s6=rand(555,599);$s3=$s2+$s1;$s3=$s5."".($s3+524)."".$s6;?>
									<input type="hidden" required name="answer" value="<?php echo $s3; ?>">
									</div><div class="col-lg-4">	<button name="registernew" style="text-align: center;" class="edit-btn"
										type="submit">CREATE ACCOUNT</button>
									</div>	
							
								</div>
							</form>
          
                                                <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                            <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                            <th scope="col">Status</th>
                                                 <th scope="col">Designation</th>
                                                         <!--    <th scope="col">Action</th>  -->
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$cu_id=$_SESSION['a_id'];

$qpx="SELECT * FROM admin";
$resultpx = mysqli_query($connn,$qpx);
while($rowpx = mysqli_fetch_array($resultpx)){


?>      <tr>                              
  <td>   <?php echo $rowpx['adminName']; ?></td>
 <td>   <?php echo $rowpx['adminemail']; ?></td>
                                                        
                                                  
           <td><?php if($rowpx['adminStatus']==1){  ?><button style="background: aquamarine;">Active</button>
    <?php } else if($rowpx['adminStatus']==0){  ?><button style="background: coral;">Deactive</button> <?php } ?>
  
    </td>
     <td><?php if($rowpx['adminDeg']==1){  ?><button style="background: aquamarine;">Superadmin</button>
    <?php } else if($rowpx['adminDeg']==0){  ?><button style="background: coral;">Admin</button> <?php } ?>
  
    </td>

      <!--   <td><a href="dashbord.php?team=<?php echo $cu_id; ?>&adminID=<?php echo $rowpe['adminID']; ?>">Edit</a></td>
-->

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