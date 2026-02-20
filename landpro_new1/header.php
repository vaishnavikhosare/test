
  <!--===== PRELOADER STARTS =======-->
  
  <!--===== PRELOADER ENDS =======-->

  <!--===== PROGRESS STARTS=======-->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>
  </div>
  <!--===== PROGRESS ENDS=======-->


  <div class="body-overlay"></div>
  <!--===== SEARCHBAR STARTS=======-->

  <!--=====HEADER START=======-->
  <header>
    <div class="header-area homepage3 header header-sticky d-none d-lg-block " id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
      
            <div class="header-elements">
              <div class="site-logo">
                <a href="index.php"><img src="assets/img/logo/logo1.png" alt="housebox"></a>
              </div>
              <div class="main-menu">
                <ul>
                  <li><a href="index.php" >Home </a>
                  

                 
                   
             
                 
                  </li>
                                  
                    <li><a href="properties.php?t=Plot">Plots</a></li>
                                    
                                         
                   <li><a href="#" class="plus">Sell <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                    <li><a href="dashbord.php?addproperty">Post Property</a></li>
                    <li><a href="dashbord.php">My Dashboard</a></li>                    
                    </ul>
                  </li>
                  
                        
                   <li><a href="#" class="plus">More <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                     <li><a href="agents.php">Agents List</a></li>  
                          <li><a href="builders.php">Builders List</a></li> 
                    <li><a href="contact_us.php">Support</a></li>
                                     
                    </ul>
                  </li>
                  

                
             
             
                </ul>
              </div>
              <div class="btn-area">
              <ul>
               <?php if(isset($_SESSION['u_id'])){
				    
				    $cu_name=$_SESSION['u_name'];
				    $cu_id=$_SESSION['u_id'];
				    $qp="SELECT * FROM users WHERE userID= '$cu_id' ";
				    $resultp = mysqli_query($conn,$qp);
				    $rowpu = mysqli_fetch_array($resultp); 
				    $cu_id=$_SESSION['u_id']; ?> 
       
             
              <li>
              <div class="header-user-menu user-menu add">
    <div class="header-user-name">
        <?php if (isset($rowpu['profileimg']) && strlen($rowpu['profileimg']) > 15) { ?>
                         <a href="dashbord.php">   <span><img src="<?php echo $rowpu['profileimg']; ?>" 
                         alt="<?php echo $rowpu['username'] ?>"></span> 
                         </a>   <?php } else { ?>
                         <a href="dashbord.php">   <span><img src="assets/images/default-ueser.png" alt=""></span></a>
                            <?php } ?> Hi, <?php
            $name = $rowpu['username'];
            $firstName = explode(' ', $name)[0];
            echo htmlspecialchars($firstName);
        ?> <i class="fa-solid fa-angle-down"></i>
    </div>
    <ul>
        <li><a href="dashbord.php">Dashboard</a></li>        
        
         <?php if($rowpu['username']=="Buyer" || $rowpu['username']=="Tenant") { ?>
         <li><a href="dashbord.php?favorite">Favorited Properties</a></li> 
        <?php } else { ?>
        <li><a href="dashbord.php?addproperty"> Add Property</a></li> <?php } ?>
   
        <li><a href="dashbord.php?profile">  Edit profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
</div>
 <script type="text/javascript">
    $(function() {
        $('.user-menu').on('click', function() {
            $(this).toggleClass('active');
        });
    });
</script>
</li>
                  <?php } else { ?>
              
                         <li>  <a  id="loginButton" class="theme-btn1" style="    padding: 7px 16.57px;">Login <span class="arrow1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                      <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                    </svg></span><span class="arrow2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                      <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                    </svg></span></a>
                     <a  href="dashbord.php?addproperty" class="theme-btn1" style="   padding: 10px 16.57px;">Post Property 
                    
                    <b class="badge" style="background: #ffd500;
    color: black;">FREE</b>
                    </a>
              </li>
              <?php } ?>
              
              </ul>
     
   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--=====HEADER END =======-->

  <!--===== MOBILE HEADER STARTS =======-->
  <div class="mobile-header mobile-header1 d-block d-lg-none">
    <div class="container-fluid">
      <div class="col-12">
        <div class="mobile-header-elements">
          <div class="mobile-logo">
            <a href="index.php"><img src="assets/img/logo/logo1.png" alt="housebox"></a>
          </div>
          <div class="mobile-right d-flex gap-1 align-items-center">
 <ul>
               <?php if(isset($_SESSION['u_id'])){
				    
				    $cu_name=$_SESSION['u_name'];
				    $cu_id=$_SESSION['u_id'];
				    $qp="SELECT * FROM users WHERE userID= '$cu_id' ";
				    $resultp = mysqli_query($conn,$qp);
				    $rowpu = mysqli_fetch_array($resultp); 
				    $cu_id=$_SESSION['u_id']; ?> 
       
             
              <li>
              <div class="header-user-menu user-menu add mobileusers">
    <div class="header-user-name">
        <?php if (isset($rowpu['profileimg']) && strlen($rowpu['profileimg']) > 15) { ?>
                         <a href="dashbord.php">   <span><img src="<?php echo $rowpu['profileimg']; ?>" 
                         alt="<?php echo $rowpu['username'] ?>"></span> 
                         </a>   <?php } else { ?>
                         <a href="dashbord.php">   <span><img src="assets/images/default-ueser.png" alt=""></span></a>
                            <?php } ?><i class="fa-solid fa-angle-down"></i>
    </div>
    <ul>
        <li><a href="dashbord.php">Dashboard</a></li>
        <?php if($rowpu['username']=="Buyer" || $rowpu['username']=="Tenant") { ?>
         <li><a href="dashbord.php?favorite">Favorited Properties</a></li> 
        <?php } else { ?>
        <li><a href="dashbord.php?addproperty"> Add Property</a></li> <?php } ?>
        <li><a href="dashbord.php?profile">  Edit profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
</div>
 <script type="text/javascript">
    $(function() {
        $('.mobileusers').on('click', function() {
            $(this).toggleClass('active');
        });
    });
</script>
</li>
                  <?php } else { ?>
              
                         <li>  <a  id="loginButtonMobile" class="theme-btn1" style="padding: 6px 9.57px;"
                         >Login <span class="arrow1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                      <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                    </svg></span><span class="arrow2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                      <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                    </svg></span></a>
              </li>
              <?php } ?>
              
              </ul>
            <div class="mobile-nav-icon dots-menu">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 4H21V6H3V4ZM7 19H21V21H7V19ZM3 14H21V16H3V14ZM7 9H21V11H7V9Z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
      <div class="logos">
        <img src="assets/img/logo/logo1.png" alt="">
      </div>
      <div class="menu-close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z"></path>
        </svg>
      </div>
    </div>
    <div class="mobile-nav mobile-nav1">
      <ul class="mobile-nav-list nav-list1">
    <li><a href="index.php">Home</a></li>
    <li><a href="properties.php?t=Plot">Plots</a></li>

    <li><a href="#">Sell</a>
        <ul class="sub-menu">
            <li><a href="dashbord.php?addproperty">Post Property</a></li>
            <li><a href="dashbord.php">My Dashboard</a></li>
        </ul>
    </li>

    <li><a href="#">More</a>
        <ul class="sub-menu">
            <li><a href="agents.php">Agents List</a></li>
            <li><a href="builders.php">Builders List</a></li>
            <li><a href="contact_us.php">Support</a></li>
        </ul>
    </li>
</ul>



      <div class="allmobilesection">
    <a  href="dashbord.php?addproperty" class="theme-btn1" style="   padding: 10px 16.57px;">Post Property 
                    
                    <b class="badge" style="background: #ffd500;
    color: black;">FREE</b>
                    </a>
        <div class="single-footer">
          <h3>Contact Info</h3>
          <div class="footer1-contact-info">
            <div class="contact-info-single">
              <div class="contact-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path>
                </svg>
              </div>
              <div class="contact-info-text">
                <a href="tel:9414682072">+91 9414682072</a>
               
              </div>
            </div>

            <div class="contact-info-single">
              <div class="contact-info-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path>
                </svg>
              </div>
              <div class="contact-info-text">
                <a href="mailto:contact@bhartiyaproperty.com">contact@bhartiyaproperty.com</a>
              </div>
            </div>

            <div class="single-footer">
              <h3>Our Location</h3>

              <div class="contact-info-single">
                <div class="contact-info-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path>
                  </svg>
                </div>
                <div class="contact-info-text">
                  <a href="">Kharadi, Pune - 411014</a>
                </div>
              </div>

            </div>
            <div class="single-footer">
              <h3>Social Links</h3>

              <div class="social-links-mobile-menu">
                <ul>
                  <li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="https://wa.me/919414682072"><i class="fa-brands fa-whatsapp"></i></a></li>
               
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== MOBILE HEADER STARTS =======-->