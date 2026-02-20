<?php include('session.php');   include('aconnection.php');include ('functions.php');  include 'common-functions.php';  

$cu_name=$_SESSION['u_name'];
$cu_id=$_SESSION['u_id'];
$qp="SELECT * FROM users WHERE userID= '$cu_id' ";
$resultp = mysqli_query($conff,$qp);
$rowp = mysqli_fetch_array($resultp);
$alertsms='';

if(isset($_GET['error'])){
    $alertsms = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> '.$_GET['error'].'
                     </div>';
} else if(isset($_GET['msg'])){
    $alertsms = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> '.$_GET['msg'].'
                     </div>';
}
    


?><!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Bharatiya Properties">
    <meta name="author" content="Bharatiya Properties">
    <title>Dashboard |  Bharatiya Properties</title>
    <!-- FAVICON -->
       <link rel="shortcut icon" href="assets/img/logo/fav-logo1.png" type="image/x-icon" />

    <link rel="stylesheet" href="user-dashboard/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
  
    
    
    <style type="text/css">
    .btn { color: #fff !important; }
    	.alert {
			    position: fixed;
			    top: 75px;
			    right: 15px;
			    z-index: 999;
			    padding: 15px 20px;
			    margin: 15px 0;
			    border: 1px solid transparent;
			    border-radius: 4px;
			    font-family: sans-serif;
			}
    .username-header{font-weight: 500;}
    @media (min-width: 992px) {
    #logo img {     max-width: 40%; }
       
    }
       @media (max-width: 792px) { 
        .header-user-name span img,.header-user-name span:after {display: none;}
       .username-header:after { 
    padding-left: 7px; }
        
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
                                <a href="index.php"><img src="assets/img/logo/logo11.png" alt=""></a>
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
                            
                            
                            
                       
                  <li><a href="index.php" >Home </a>
                  

                 
                   
              <li><a href="properties.php" class="plus">Buy </a>
                    <ul class="dropdown-padding">
                    <?php $query="SELECT * FROM propertytypes WHERE availableFor='Sale' OR availableFor='both' ";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_array($result)){
                      
  ?><li><a href="properties.php?t=Sale&pn=<?php echo $row['propertyTypeName']; ?>&pc=<?php echo $row['propertyTypeID']; ?>"><?php echo $row['propertyTypeName']; ?></a></li>
  <?php } ?>
                         </ul>
                  </li>  
                  
                  <li><a href="properties.php" class="plus">Rent </a>
                    <ul class="dropdown-padding">
                    <?php $query="SELECT * FROM propertytypes WHERE availableFor='Rent' OR availableFor='both' ";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_array($result)){ ?>
                      <li>
                      <a href="properties.php?t=Rent&pn=<?php echo $row['propertyTypeName']; ?>&pc=<?php echo $row['propertyTypeID']; ?>"><?php echo $row['propertyTypeName']; ?></a></li>
                      <?php } ?>
                  </ul>
                  </li>
                  
                  
                 <li><a href="#" class="plus">Sell </a>
                    <ul class="dropdown-padding">
                    <li><a href="projects.php">Post Property</a></li>
                    <li><a href="projects_completed.php">My Dashboard</a></li>                    
                    </ul>
                  </li>
                  
                        
                   <li><a href="#" class="plus">More </a>
                    <ul class="dropdown-padding">
                     <li><a href="agents.php">Agents List</a></li>  
                          <li><a href="builders.php">Builders List</a></li> 
                    <li><a href="contact_us.php">Support</a></li>
                                     
                    </ul>
                  </li>
                  

                
             
             
            
                            
                            
                          
                                    
                               
                                      </ul>
                        </nav>
                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / --> 
                        	<?php if(isset($_SESSION['u_id'])){
				    
				    $cu_name=$_SESSION['u_name'];
				    $cu_id=$_SESSION['u_id'];
				    $qp="SELECT * FROM users WHERE userID= '$cu_id' ";
				    $resultp = mysqli_query($conff,$qp);
				    $rowpu = mysqli_fetch_array($resultp); 
				    $cu_id=$_SESSION['u_id']; ?> 
       
                    <div class="header-user-menu user-menu">
                        <div class="header-user-name">
                             <?php if (isset($rowpu['profileimg']) && strlen($rowpu['profileimg']) > 15) { ?>
                         <a href="dashbord.php">   <span><img src="<?php echo $rowpu['profileimg']; ?>" 
                         alt="<?php echo $rowpu['username'] ?>"></span> 
                         </a>   <?php } else { ?>
                         <a href="dashbord.php">   <span><img src="assets/images/default-ueser.png" alt=""></span></a>
                            <?php } ?>
                          <b class="username-header">  <?php $name = $rowpu['username'];
$firstName = explode(' ', $name)[0];
echo $firstName; ?>
                          
                          </b>
                        </div>
                        <ul>
                         <li><a href="dashbord.php">  Dashboard</a></li>
                          <li><a href="dashbord.php?favorite=<?php echo $cu_id; ?>">  Favorite Properties</a></li>
                            <li><a href="dashbord.php?profile=<?php echo $cu_id; ?>"> Edit profile</a></li>
           <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->
<?php } ?>
                      
                    
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
                            <div class="sidebar-header"><a href="index.php"><img src="assets/img/logo/logo11.png" alt="Logo"></a> </div>
                        <!--     <div class="header clearfix">
                              
                               <?php if (isset($rowp['profileimg']) && strlen($rowp['profileimg']) > 3) { ?>
                                <img src="<?php echo $rowp['profileimg']; ?>" alt="profile-img" class="img-fluid profile-img">
                           
                            <?php } else { ?> 
            <img  src="images/default-ueser.png" alt="profile-img" class="img-fluid profile-img">
					 <?php } ?> </div>
                            <div class="active-user">
                            
                                <h2><?php echo $rowp['username']; ?></h2>
                       
                            </div>-->
                            
                            
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                    <li>
                                        <a  href="dashbord.php">
                                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                                           Dashboard
                                        </a>
                                    </li>
                                        <li>
                                        <a href="dashbord.php?favorite=<?php echo $cu_id; ?>">
                                            <i class="fa fa-heart" aria-hidden="true"></i>Favorited Properties
                                        </a>
                                    </li>
                                    
                                    <?php if($rowp['userType']=="Builder"){ ?>
                                   <li>
                                        <a href="dashbord.php?builder">
                                            <i class="fa  fa-users" aria-hidden="true"></i>Builder Profile
                                        </a>
                                    </li>
                                    <?php } ?>
                                           <?php if($rowp['userType']=="Agent"){ ?>
                                   <li>
                                        <a href="dashbord.php?agent">
                                            <i class="fa fa-users" aria-hidden="true"></i>Agent Profile
                                        </a>
                                    </li>
                                    <?php } ?>
                                    
                                      <li>
                                        <a href="dashbord.php?myproperties=<?php echo $cu_id; ?>">
                                            <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashbord.php?profile=<?php echo $cu_id; ?>">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                   <li>
                                        <a  href="logout.php">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
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
                                        <li>
                                            <a  href="dashbord.php">
                                                <i class="fa fa-dashboard mr-3"></i> Dashboard
                                            </a>
                                        </li>
                                         <li>
                                            <a href="dashbord.php?favorite=<?php echo $cu_id; ?>">
                                                <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
                                            </a>
                                        </li>
                                        
                                        
                                                   <?php if($rowp['userType']=="Builder"){ ?>
                                   <li>
                                        <a href="dashbord.php?builder">
                                            <i class="fa  fa-users mr-3" aria-hidden="true"></i>Builder Profile
                                        </a>
                                    </li>
                                    <?php } ?>
                                           <?php if($rowp['userType']=="Agent"){ ?>
                                   <li>
                                        <a href="dashbord.php?agent">
                                            <i class="fa fa-users mr-3" aria-hidden="true"></i>Agent Profile
                                        </a>
                                    </li>
                                    <?php } ?>
                                        
                                <li>
                                            <a href="dashbord.php?myproperties=<?php echo $cu_id; ?>">
                                                <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                                            </a>
                                        </li> 
                                     
                                   
                                     <li>
                                            <a href="dashbord.php?profile=<?php echo $cu_id; ?>">
                                                <i class="fa fa-user mr-3"></i>Profile
                                            </a>
                                        </li>
                                  
                                        <li>
                                            <a class="active" href="logout.php">
                                                <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                   <?php echo $alertsms; ?>
                          <?php 
                 
                       $pages = [
                           'myproperties'   => 'dashboard-myproperties.php',
                           'favorite'       => 'dashboard-favorite.php',
                           'profile'        => 'dashboard-profile.php',
                           'propertlist'    => 'dashboard-propapplications.php',
                           'inquiries'      => 'dashboard-inquiries.php',
                           'callback'      => 'dashboard-callback.php',
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
                           'owner'          => 'dashboard-owner.php',
                           'protypes'       => 'dashboard-protypes.php',
                           'prostyles'      => 'dashboard-prostyles.php',
                           'aminities'      => 'dashboard-aminities.php',
                           'cities'         => 'dashboard-cities.php',
                           'builderprojects'=> 'dashboard-builderprojects.php',
                           'builderdetails' => 'dashboard-builderdetails.php',
                           'propuserapplications' => 'dashboard-propuserapplications.php',
                           'verifyEmailUser' => 'dashboard-verify-email.php',
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
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


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
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").fadeOut("slow");
        }, 5000);
    });
</script>
    </div>
    <!-- Wrapper / End -->
</body>
</html>
