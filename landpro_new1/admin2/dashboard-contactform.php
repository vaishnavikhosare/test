 <style>
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
 
 </style>         <?php if($adminDeg!=1){ header("location:dashbord.php"); } ?>
         
         
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: center;">
                                              
                                           	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
      			<h3>Contact Form Submissions </h3>
    <a href="dashbord.php?contactform=<?php echo $cu_id; ?>" class="edit-btn" style=""> Contact Form  </a> 		
  
     <a href="dashbord.php?inquiries=<?php echo $cu_id; ?>" class="edit-btn" > Property Inquiries </a> 		
   		
       
 <div class="ltn__my-properties-table table-responsive" style="text-align: left;">
                                                    <table class="table">
                                                        <thead>
                                                          <tr>
                                                             <th scope="col">No</th>
                                                            <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                         <th scope="col">Contact No</th>
                                                 <th scope="col">Subject</th>
                                                           <th scope="col">Remark</th>
                                                 <th scope="col">Submission Date</th>
                                                         <!--    <th scope="col">Action</th>  -->
                                                          </tr>
                                                        </thead>
                                                    
 <tbody>
<?php
$cu_id=$_SESSION['a_id'];
$t=0;
$qpx="SELECT * FROM contact_us ORDER BY co_id DESC";
$resultpx = mysqli_query($connn,$qpx);
while($rowpx = mysqli_fetch_array($resultpx)){
    $t=$t+1;

?>      <tr>                              
  <td>   <?php echo $t; ?></td>
     <td>   <?php echo $rowpx['co_name']; ?></td>
     <td>  <a href="mailto:<?php echo $rowpx['co_email']; ?>" style="font-weight: 800;"> <?php echo $rowpx['co_email']; ?></a></td>
 <td>  <a href="tel:<?php echo $rowpx['co_contact']; ?>" style="font-weight: 800;"> <?php echo $rowpx['co_contact']; ?></a></td>  
         <td>   <?php echo $rowpx['co_subject']; ?></td>                                                  
    <td>   <?php echo $rowpx['co_msg']; ?></td>                                               
  <td>   <?php echo convertdate($rowpx['co_date']); ?></td>     


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