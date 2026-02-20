<?php  include 'aconnection.php';   ?>

<?php  include_once 'headtop.php'; ?>

  <title>Home  | Bhartiya Properties</title>

  <?php  include_once 'head.php'; ?>
</head>

<body class="homepage3-body">

 <?php include 'header.php'; ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="hero3-section-area" style="background-image: url(assets/img/all-images/bg/hero-bg3.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="hero3-header">
            <h5>Discover Your Ideal Property Today!</h5>
            <div class="space20"></div>
            <h1>How to Sell Home <br> <span class="word"></span></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="main-imagesarea">
      <div class="img1 aniamtion-key-2">
        <img src="assets/img/all-images/hero/hero3-img1.png" alt="">
      </div>
      <div class="img2">
        <img src="assets/img/elements/bottom-img2.png" alt="">
      </div>
    </div>
    <div class="img3">
      <img src="assets/img/elements/bottom-img1.png" alt="">
    </div>
    <!--===== OTHERS AREA STARTS =======-->
    <div class="others-section-area3">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
      

            <div class="property-tab-section search-filter-form">
              <div class="tab-header">
                <button class="tab-btn active" data-tab="for-sale">Properties</button>
             
              </div>
<form action="properties.php" method="GET">
              <div class="tab-content1" id="for-sale">
                <div class="filters">
                  <div class="filter-group">
                   
                  <label>Plot Category</label>
<select name="plot_category" required>
  <option value="">Select Category</option>
  <option value="Residential">Residential</option>
  <option value="Commercial">Commercial</option>
  <option value="Agriculture">Agriculture</option>
  <option value="Industrial">Industrial</option>
  <option value="NA">NA</option>
</select>

                       
      

                  </div>
                  <div class="filter-group">
                    <label>Category</label>
                    <select name="propertyCate" required>
                      <option>All Category</option>
                      <option value="1 BHK">1 BHK</option>
                       <option value="2 BHK">2 BHK</option>
                        <option value="3 BHK">3 BHK</option>
                         <option value="4 BHK">4 BHK</option>
                          <option value="1 RK">1 RK</option>
                           <option value="1 Room">1 Room</option>                        
                    </select>
                  </div>
       
                  <div class="search-button">
                    <button id="search-sale">Search <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path>
                      </svg></button>
                  </div>
                </div>
              </div>

             </form>

              
            </div>
          </div>
        </div>
      </div>
    </div>


 

  <!--===== PROPERTIES AREA STARTS =======-->
  <div class="properties3-section-area sp2"
 style="background-image: url(assets/img/all-images/bg/bg3.png); 
 background-position: center; background-repeat: no-repeat; background-size: cover; margin-top: 50px; ">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="property-heading heading2 space-margin60 text-center">
          <h5>Popular</h5>
          <div class="space20"></div>
          <h2 class="text-anime-style-3">Latest Plots</h2>
        </div>
      </div>
    </div>

    <div class="row">
<?php
$queryplot = "
SELECT
    p.propertyID, p.propertyToken,
    s.plot_category,
    l.localityName,
    s.plotArea, s.plotAreaUnit,
    s.priceFrom,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_plot s ON p.propertyID = s.propertyID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.isApproved = 'approved'
ORDER BY p.propertyListedOn DESC
LIMIT 6
";

$resultplot = mysqli_query($conn, $queryplot);

while ($rowplot = mysqli_fetch_assoc($resultplot)) {

    $img = $rowplot['imageUrl'] ?? 'assets/img/no-image.jpg';
    $price = number_format($rowplot['priceFrom'], 0);
    $detailsUrl = "property-details-plot.php?PID={$rowplot['propertyToken']}";
?>
      <div class="col-lg-4 col-md-6">
       <a href="<?php echo $detailsUrl; ?>" style="text-decoration:none;color:inherit;">
<div class="property-single-boxarea">

          <div class="img1">
            <img src="<?php echo htmlspecialchars($img); ?>" style="height:250px; width:100%; object-fit:cover;">
          </div>
          <div class="content-area">
            <h5><?php echo $rowplot['plot_category']; ?> Plot</h5>
            <p><?php echo $rowplot['localityName']; ?></p>
            <p><?php echo $rowplot['plotArea']." ".$rowplot['plotAreaUnit']; ?></p>
            <h4>₹ <?php echo $price; ?></h4>
          </div>
        </div>
        </a>
      </div>
<?php } ?>
    </div>

  </div>
</div>

  <!--===== PROPERTIES AREA ENDS =======-->





  <div class="property-inner-section-find">
    <div class="container">
    
     <div class="row">
        <div class="col-lg-12">
          <div class="property-heading heading2 space-margin10">
            <div class="hedaing1">
              <h5 data-aos="fade-left" data-aos-duration="800">Popular</h5>
              <div class="space20"></div>
              
  </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!--===== PROPERTY-LOCATION AREA STARTS =======-->
  <div class="property-loaction3-section sp2">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="heading2 text-center space-margin60">
            <h5 data-aos="fade-left" data-aos-duration="800">property location</h5>
            <div class="space20"></div>
            <h2 class="text-anime-style-3">Our Property Location</h2>
          </div>
        </div>
      </div>
 <div class="row">
        <div class="loaction-slider-property owl-carousel">

     
     <?php $selectLocaities="SELECT * FROM localities Limit 8";
     $resultloca=mysqli_query($connn,$selectLocaities);
     while($rowsaleloca=mysqli_fetch_assoc($resultloca)){ 
         
   ?>
       
          <div class="propety-loaction">
            <div class="img1">
              <img src="assets/img/localities/<?php echo $rowsaleloca['localityImg']  ?>" alt="<?php echo $rowsaleloca['localityName']  ?>">
            </div>
            <div class="content-area">
              <a href="properties.php?lo=<?php echo $rowsaleloca['localityID']  ?>"><?php echo $rowsaleloca['localityName']  ?></a>
        
            </div>
          </div>
<?php } ?>
         

       
        </div>
      </div>
    </div>
  </div>
  <!--===== PROPERTY-LOCATION AREA ENDS =======-->

  <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="testimonial3-section-area sp1" 
  style="background-image: url(assets/img/all-images/bg/bg3.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="heading2 text-center space-margin60">
            <h5>Our Happy Clients</h5>
            <div class="space20"></div>
            <h2 class="text-anime-style-3">Why They Love Us</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5">
<p style="text-align: justify;">Finding the right property in a growing city like Pune can be overwhelming - but not when you have the right partner by your side. At Bhartiya Properties, we're more than just real estate agents. We're your local guides, your market experts, and your dedicated partners in every step of your property journey.

Whether you're looking to buy your dream home, sell your property at the right price, or find a comfortable rental, our team works with honesty, transparency, and local knowledge to deliver results that speak for themselves.

We're proud to have helped hundreds of families and investors make confident property decisions. 

</p>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <div class="testimonial-slider-box3 owl-carousel">
            <div class="testimonial-boxarea">
              <ul>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
              </ul>
              <div class="space16"></div>
              <p>"What I loved most was the transparency. No hidden charges, no false promises. Just clean communication and results."</p>
              <div class="space32"></div>
              <div class="names-area">
                <div class="man-textarea">
             
                  <div class="text">
                    <a href="#">Sonal Kulkarni, Hadapsar</a>
                    <div class="space12"></div>
                    <p> Home Buyer</p>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="testimonial-boxarea">
              <ul>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
              </ul>
              <div class="space16"></div>
              <p>"They understood my requirement and gave me shortlisted options that actually made sense. I didn't waste time visiting irrelevant properties"</p>
              <div class="space32"></div>
              <div class="names-area">
                <div class="man-textarea">
           
                  <div class="text">
                    <a href="#">Ankit Sharma, Viman Nagar</a>
                    <div class="space12"></div>
                    <p>Tenant</p>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="testimonial-boxarea">
              <ul>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
                <li><i class="fa-solid fa-star"></i></li>
              </ul>
              <div class="space16"></div>
              <p>"I had been struggling to sell my plot for months. These guys got it listed and closed the deal in just two weeks. Super impressed!"</p>
              <div class="space32"></div>
              <div class="names-area">
                <div class="man-textarea">
                 
                  <div class="text">
                    <a href="#"> Meena Deshpande, Wagholi</a>
                    <div class="space12"></div>
                    <p>Landowner</p>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== TESTIMONIAL AREA ENDS =======-->


 <!--===== ABOUT AREA STARTS =======-->
  <div class="about3-section-area sp1" style="margin-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 m-auto">
          <div class="about2-header text-center heading2 space-margin60">
            <h5 data-aos="fade-left" data-aos-duration="800">Features of Bhartiya Properties</h5>
            <div class="space20"></div>
            <h2 class="text-anime-style-3">Where Modern Solutions Meet On Timeless Values</h2>
          </div>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 d-lg-block d-none" data-aos="fade-right" data-aos-duration="1000">
          <div class="about-list-box box1">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Efficient Home Searches
          </div>
          <div class="space56"></div>
          <div class="about-list-box box2">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            On Honest Communication
          </div>
          <div class="space56"></div>
          <div class="about-list-box box3">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Verified Property Listings
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about-images">
            <div class="img1 reveal">
              <img src="assets/img/all-images/about/about-img6.png" alt="housebox">
            </div>
          </div>
          <div class="space30 d-lg-none d-block"></div>
        </div>

        <div class="col-lg-4 col-md-6 d-lg-none d-block">
          <div class="about-list-box box1">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Easy Property Search
          </div>
          <div class="space56"></div>
          <div class="about-list-box box2">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            No Brokerage Fees
          </div>
          <div class="space56"></div>
          <div class="about-list-box box3">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Seamless Financing Option
          </div>
          <div class="space56 d-lg-none d-block"></div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-duration="1000">
          <div class="about-list-box2 box1">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
           Area-Wise Property
          </div>
          <div class="space56"></div>
          <div class="about-list-box2 box2">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Clear Property Pricing
          </div>
          <div class="space56"></div>
          <div class="about-list-box2 box3">
            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path>
              </svg></span>
            Multiple Property Types
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== ABOUT AREA ENDS =======-->



  <?php include 'footer.php';   include 'footer_links.php';  ?>

</body>

</html>