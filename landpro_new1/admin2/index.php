<?php include("../aconnection.php");
if(session_start()!=true){
    session_start();
}

if(isset($_SESSION['a_name'])){
    
    header('location:dashbord.php');
}
?><!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Admin Panel</title>
<meta name="robots" content="noindex, follow">
<meta name="description" content="">
<meta name="viewport"
	content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="shortcut icon" href="../assets/img/logo/fav-logo1.png" type="image/x-icon">
<link rel="stylesheet" href="css/font-icons.css">
<link rel="stylesheet" href="css/plugins.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<style type="text/css">
  input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="date"], input[type="submit"], textarea { margin-bottom: 10px;}

</style>
</head>
<div class="body-wrapper"> <div
		class="ltn__utilize-overlay"></div>
		

	<div class="ltn__login-area pb-65 pt-90">
		<div class="container">
		
			<div class="row">
					<div class="col-lg-12">
					<div class="section-title-area text-center" style="margin-bottom: 0px;">
						<h1 class="section-title">
							Admin Login In
						</h1>
						           
                    <?php

   if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }
else if(isset($_GET['sucess'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['sucess']; ?></p>  
  <?php  }
  else{  ?>
         <p class="text-center small">Enter your username & password</p>
<?php   }
   ?> 
					
					</div>
				</div>
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
						<div class="account-login-inner">
						<form action="action-controller.php" method="post" class="ltn__form-box contact-form-box">
							<input type="email" name="username"  placeholder="Email*">
							 <input type="password" name="password" placeholder="Password*">
							 	<?php     $s1=rand(11,20);$s2=rand(11,20);$s5=rand(1111,2000);$s6=rand(111,299);$s3=$s2+$s1;$s3=$s5."".($s3+124)."".$s6; ?>
									<input type="hidden" required name="answer" value="<?php echo $s3; ?>">
									<input type="text" name="question" placeholder="<?php echo $s1." + ".$s2." =";  ?>" required>
									
							<div class="btn-wrapper mt-0">
								<button name="logincheck" class="theme-btn-1 btn btn-block" type="submit">LOG IN</button>
							</div>
				
						</form>
					</div>
				</div>
				<div class="col-lg-3"></div>
			</div>
		</div>
	</div>
	
 <script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</html>