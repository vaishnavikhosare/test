

<form action="action-controller.php" method="post" class="ltn__form-box contact-form-box" onsubmit="return validatePassword()">
<h3>Create New Admin User</h3>
<div class="row"><div class="col-lg-6">
<input type="text" name="firstname" placeholder="Name" required>
<input	type="text" name="email" placeholder="Email*" required>
<span style="font-weight: 600">User Designation:</span><br>
<input type="radio" name="designation"  checked="checked" value="0" required> Admin
<input type="radio" name="designation"   value="1" required> Superadmin
</div>	<div class="col-lg-6">
<input type="password" name="password" id="password" placeholder="Password* at least 6 characters" required class="password-input">
<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password*" required class="password-input">
<?php     $s1=rand(11,20);$s2=rand(11,20);$s5=rand(5555,9999);$s6=rand(555,599);$s3=$s2+$s1;$s3=$s5."".($s3+524)."".$s6;?>
									<input type="hidden" required name="answer" value="<?php echo $s3; ?>">
										<button name="registernew" style="text-align: center;" class="theme-btn-1 btn"
										type="submit">CREATE ACCOUNT</button>
									</div>	
									<div class="col-lg-6">	
						
								
						</div>
								</div>
							</form> 