<?php include('session.php');   include('../aconnection.php');include ('functions.php');  include  'common-functions.php'; 

$ca_name=$_SESSION['a_name'];
$cu_id=$_SESSION['a_id'];
$qp="SELECT * FROM admin WHERE adminID= '$cu_id' ";
$resultp = mysqli_query($conn,$qp);
$rowp = mysqli_fetch_array($resultp);
$adminDeg=$rowp['adminDeg'];

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Bharatiya Properties Dashboard">
    <meta name="author" content="Bharatiya Properties">
    <title>Dashboard |  Bharatiya Properties</title>
    <!-- FAVICON -->
       <link rel="shortcut icon" href="../assets/img/logo/fav-logo1.png" type="image/x-icon" />

    <link rel="stylesheet" href="user-dashboard/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%<?php echo $cu_id; ?>CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="user-dashboard/css/fontawesome-all.min.css">
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="user-dashboard/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="user-dashboard/css/search.css">
    <link rel="stylesheet" href="user-dashboard/css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="user-dashboard/css/animate.css">
    <link rel="stylesheet" href="user-dashboard/css/swiper.min.css">
    <link rel="stylesheet" href="user-dashboard/css/magnific-popup.css">
    <link rel="stylesheet" href="user-dashboard/css/lightcase.css">
    <link rel="stylesheet" href="user-dashboard/css/owl-carousel.css">
    <link rel="stylesheet" href="user-dashboard/css/owl.carousel.min.css">
    <link rel="stylesheet" href="user-dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="user-dashboard/css/menu.css">
    <link rel="stylesheet" href="user-dashboard/css/slick.css">
    <link rel="stylesheet" href="user-dashboard/css/styles.css">
    <link rel="stylesheet" id="color" href="user-dashboard/css/default.css">
    
    
    <style type="text/css">
    .username-header{font-weight: 500;}
    @media (min-width: 992px) {
    #logo img {     max-width: 40%; }
       
    }
       @media (max-width: <?php echo $cu_id; ?>92px) { 
        .header-user-name span img,.header-user-name span:after {display: none;}
       .username-header:after {  content: "\f0d<?php echo $cu_id; ?>";
    padding-left: <?php echo $cu_id; ?>px; }
        
        .header-user-name:before {display: none;}
       }
       @media screen and (max-width: 1024px){
.dashboard-bd .header-user-menu {
    margin-top: -13px; }  }
    </style>
</head>
<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo" style="max-width: 200px;">
                                <a href="index.php"><img src="../assets/img/logo/logo111.png" alt=""></a>
                            </div>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <!-- Main Navigation -->
                            <nav id="navigation" class="style-1">
                            <ul id="responsive">
                            
                            
                            
                       
                  <li><a href="dashbord.php" >Dashboard </a>
                  
                  
                       <li><a href="#" class="plus">Users </a>
                    <ul class="dropdown-padding">
                    <li><a href="dashbord.php?agent=<?php echo $cu_id; ?>">Agents</a></li> 
                     <li><a href="dashbord.php?builder=<?php echo $cu_id; ?>">Builders</a></li> 
                       <li><a href="dashbord.php?buyers=<?php echo $cu_id; ?>">Buyer/Tenant</a></li> 
                    <li><a href="dashbord.php?owner=<?php echo $cu_id; ?>">Owner</a></li>                            
                    </ul>
                  </li>
                  
                  
                                    
                   <li><a href="#" class="plus">Settings </a>
                    <ul class="dropdown-padding">
                    <li><a href="dashbord.php?team=<?php echo $cu_id; ?>">Team Members</a></li> 
                     <li><a href="dashbord.php?protypes=<?php echo $cu_id; ?>">Property Types</a></li> 
                       <li><a href="dashbord.php?prostyles=<?php echo $cu_id; ?>">Property Styles</a></li> 
                    <li><a href="dashbord.php?aminities=<?php echo $cu_id; ?>">Aminities</a></li>  
                    <li><a href="dashbord.php?cities=<?php echo $cu_id; ?>">Localities</a></li>          
                    </ul>
                  </li>
                  
                        
             
                  

                
             
             
            
                            
                            
                          
                                    
                               
                                      </ul>
                        </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / --> 
                    
       
                    <div class="header-user-menu user-menu">
                        <div class="header-user-name">
                 
                          <b class="username-header">  <?php echo $rowp['adminName'] ?></b>
                        </div>
                        <ul>
                         <li><a href="dashbord.php">  Dashboard</a></li>
                          <li><a href="dashbord.php?favorite=<?php echo $cu_id; ?>">  Favorite Properties</a></li>
                            <li><a href="dashbord.php?profile=<?php echo $cu_id; ?>"> Edit profile</a></li>
           <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->

                      
                    
                </div>
                <!-- Header / End -->
            </header>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION DASHBOARD -->
        <section class="user-page section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <div class="user-profile-box mb-0">
                            <div class="sidebar-header"><a href="index.php"><img src="../assets/img/logo/logo11.png" alt="Logo"></a> </div>
     
                            
                            
                            <div class="detail clearfix">
                                <ul class="mb-0">
                      <li><a href="dashbord.php"><i class="fas fa-home" style=""></i> Dashboard</a></li>

     <li><a href="dashbord.php?myproperties=<?php echo $cu_id; ?>"><i class="fas fa-list"></i>Property Applications </a></li>
  <li><a href="dashbord.php?propertlist=<?php echo $cu_id; ?>"><i class="fas fa-list"></i>Property List </a></li>
    
 <li><a href="dashbord.php?inquiries=<?php echo $cu_id; ?>"><i class="fas fa-phone"></i> Inquiry Submissions</a></li>



 </ul>
                                    
                    
               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                       <div class="col-lg-12 mobile-dashbord dashbord">
                            <div class="dashboard_navigationbar dashxl">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                                    <ul id="myDropdown" class="dropdown-content">
                       
 <li><a href="dashbord.php"><i class="fas fa-home" style=""></i> Dashboard</a></li>
   
     <li><a href="dashbord.php?myproperties=<?php echo $cu_id; ?>"><i class="fas fa-list"></i>Property Applications </a></li>
  <li><a href="dashbord.php?propertlist=<?php echo $cu_id; ?>"><i class="fas fa-list"></i>Property List </a></li>

 <li><a href="dashbord.php?inquiries=<?php echo $cu_id; ?>"><i class="fas fa-phone"></i> Inquiry Submissions</a></li>



  <li><a href="dashbord.php?team=<?php echo $cu_id; ?>"><i class="fas fa-users"></i>
  Profile</a></li>  <li><a href="logout.php"><i class="fas fa-log-out"></i>  Logout</a></li>  </ul>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    
                       <?php 
                 
                       $pages = [
                           'myproperties'   => 'dashboard-myproperties.php',
                           'favorite'       => 'dashboard-favorite.php',
                           'profile'        => 'dashboard-profile.php',
                           'propertlist'    => 'dashboard-proplist.php',
                           'inquiries'      => 'dashboard-inquiries.php',
                           'valuation'      => 'dashboard-valuations.php',
                           'subscriptions'  => 'dashboard-subscriptions.php',
                           'contactform'    => 'dashboard-contactform.php',
                           'proplist'       => 'dashboard-proplist.php',
                           'addproperty'    => 'dashboard-addproperty.php',
                           'users'          => 'dashboard-users.php',
                           'team'           => 'dashboard-team.php',
                           'user-details'   => 'dashboard-user-details.php',
                           'agent'          => 'dashboard-agent.php',
                           'builder'        => 'dashboard-builder.php',
                           'buyers'        => 'dashboard-buyers.php',
                           'userDetails'     => 'dashboard-userDetails.php',
                           'owner'          => 'dashboard-owner.php',
                           'protypes'       => 'dashboard-protypes.php',
                           'prostyles'      => 'dashboard-prostyles.php',
                           'aminities'      => 'dashboard-aminities.php',
                           'cities'         => 'dashboard-cities.php',
                           'locality'         => 'dashboard-localities.php',
                           'builderprojects'=> 'dashboard-builderprojects.php',
                           'builderdetails' => 'dashboard-builderdetails.php',
                           'propuserapplications' => 'dashboard-propuserapplications.php',
                          ];
                       
                       $found = false;
                       
                       foreach ($pages as $key => $file) {
                           if (isset($_GET[$key])) {
                               include $file;
                               $found = true;
                               break;
                           }
                       }
                       
                       if (!$found) {
                           include 'dashbord-page.php';
                       }
                       
                
                           ?>
         
                        <!-- START FOOTER -->
                        <div class="second-footer">
                            <div class="container">
                                <p> &copy;<?php echo date('Y');?> Copyright - All Rights Reserved | Bharatiya Properties</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                       
        </div>
                <!-- END SECTION DASHBOARD -->

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->
        
      <!-- ARCHIVES JS -->
        <script src="user-dashboard/js/jquery-3.5.1.min.js"></script>
        <script src="user-dashboard/js/jquery-ui.js"></script>
        <script src="user-dashboard/js/tether.min.js"></script>
        <script src="user-dashboard/js/moment.js"></script>
        <script src="user-dashboard/js/bootstrap.min.js"></script>
        <script src="user-dashboard/js/mmenu.min.js"></script>
        <script src="user-dashboard/js/mmenu.js"></script>
        <script src="user-dashboard/js/swiper.min.js"></script>
        <script src="user-dashboard/js/swiper.js"></script>
        <script src="user-dashboard/js/slick.min.js"></script>
        <script src="user-dashboard/js/slick2.js"></script>
        <script src="user-dashboard/js/fitvids.js"></script>
        <script src="user-dashboard/js/jquery.waypoints.min.js"></script>
        <script src="user-dashboard/js/jquery.counterup.min.js"></script>
        <script src="user-dashboard/js/imagesloaded.pkgd.min.js"></script>
        <script src="user-dashboard/js/isotope.pkgd.min.js"></script>
        <script src="user-dashboard/js/smooth-scroll.min.js"></script>
        <script src="user-dashboard/js/lightcase.js"></script>
        <script src="user-dashboard/js/search.js"></script>
        <script src="user-dashboard/js/owl.carousel.js"></script>
        <script src="user-dashboard/js/jquery.magnific-popup.min.js"></script>
        <script src="user-dashboard/js/ajaxchimp.min.js"></script>
        <script src="user-dashboard/js/newsletter.js"></script>
        <script src="user-dashboard/js/jquery.form.js"></script>
        <script src="user-dashboard/js/jquery.validate.min.js"></script>
        <script src="user-dashboard/js/searched.js"></script>
        <script src="user-dashboard/js/dashbord-mobile-menu.js"></script>
        <script src="user-dashboard/js/forms-2.js"></script>
        <script src="user-dashboard/js/color-switcher.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });

        </script>
   
        <!-- MAIN JS -->
        <script src="user-dashboard/js/script.js"></script>
        
        <script>
document.querySelector("form").addEventListener("submit", function(e){

    let inputs = this.querySelectorAll("input[required]");
    let textOnlyRegex = /^[A-Za-z\s]+$/;

    for(let input of inputs){

        // Empty check
        if(input.value.trim() === ""){
            alert("All required fields must be filled.");
            input.focus();
            e.preventDefault();
            return;
        }

        // Text-only validation
        if(input.dataset.type === "textonly"){
            if(!textOnlyRegex.test(input.value)){
                alert("Only letters are allowed in " + input.name);
                input.focus();
                e.preventDefault();
                return;
                
            }
        }

        // Number validation
        if(input.type === "number"){
            if(isNaN(input.value) || input.value <= 0){
                alert("Invalid number in " + input.name);
                input.focus();
                e.preventDefault();
                return;
            }
        }
    }

});
</script>
        
</body>
</html>