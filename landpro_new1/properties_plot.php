
<!--===== HERO AREA STARTS =======-->
  <div class="hero-inner-section-area-sidebar">
     <img src="assets/img/all-images/bg/bg2.png" alt="" class="hero-img1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="hero-header-area text-center">
            <a href="index.php">Home <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
              </svg>Plots</a>
            <div class="space24"></div>
            <h1>All Plot Categories</h1>

          </div>
        </div>
      </div>
    </div>   
  </div>
  <!--===== HERO AREA ENDS =======-->
  <div class="others-section-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
    
          <div class="property-tab-section search-filter-form">
                       <form action="properties.php" method="GET">
            <div class="tab-content1" id="for-sale">
              <div class="filters">
         <div class="filter-group">
                    <label>Type</label>
                    <select  name='type' required>                                     
                      <option value="Plots">Plots</option>                 
                    </select>
                  </div>
                  <div class="filter-group">                      <label>Location</label>
                     <select class="location" id="location" name="location" required>
                      <option value="All">All Location</option>
                      <?php
                      $query = "SELECT * FROM localities";
                      $result = mysqli_query($conn, $query);
                      while ($rowsale = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$rowsale['localityID']}'>{$rowsale['localityName']}</option>";
                      }
                      ?>
                     </select> 
                       
      

                  </div>
                   <div class="filter-group">
                    <label>Category</label>
                   <select name="plot_category">
  <option value="">All Categories</option>
  <option value="Residential">Residential</option>
  <option value="Commercial">Commercial</option>
  <option value="Agriculture">Agriculture</option>
  <option value="Industrial">Industrial</option>
  <option value="NA">NA</option>
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
        <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
          <div class="property-feature-slider">
            <div class="col-lg-12 m-auto">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                  <div class="row">
                  

                    

                    <?php

$where = "";

/* FILTER BY PLOT CATEGORY */
if (isset($_GET['plot_category']) && $_GET['plot_category'] != "") {
    $plot_category = mysqli_real_escape_string($conn, $_GET['plot_category']);
    $where .= " AND s.plot_category = '$plot_category'";
}

/* FILTER BY LOCATION */
if (isset($_GET['location']) && $_GET['location'] != "" && $_GET['location'] != "All") {
    $location = mysqli_real_escape_string($conn, $_GET['location']);
    $where .= " AND p.localityID = '$location'";
}

/* FILTER BY REG TYPE */

$querysale = "
SELECT
    p.propertyID,
    p.propertyToken,
    p.propertyTitle,
    p.addressStreet,
    p.addressNumber,
    l.localityName,
    s.plot_category,
    s.propertyRegType,
    s.plotArea,
    s.plotAreaUnit,
    s.priceFrom,
    s.priceTo,
    s.developerName,
    s.isDeveloper,
    (SELECT imageUrl FROM propertyimages WHERE propertyID = p.propertyID LIMIT 1) AS imageUrl
FROM properties p
INNER JOIN property_plot s ON p.propertyID = s.propertyID
LEFT JOIN localities l ON p.localityID = l.localityID
WHERE p.isApproved = 'approved'
AND p.propertCategory = 'Plot'
$where
ORDER BY p.propertyListedOn DESC
";

$resultsale = mysqli_query($conn, $querysale);
$count = 0;

while ($rowsale = mysqli_fetch_assoc($resultsale)) {
    $img = $rowsale['imageUrl'] ?? 'assets/img/no-image.jpg';
    $price = number_format($rowsale['priceFrom'], 0);

    if ($rowsale['priceTo'] > 0) {
        $price .= ' - ' . number_format($rowsale['priceTo'], 0);
    }

    $detailsUrl = "property-details-plot.php?PID={$rowsale['propertyToken']}";
    $count++;
?>

    <div class="col-lg-4 col-md-6">
        <div class="property-single-boxarea">
            <div class="img1 image-anime">
                <img src="<?php echo htmlspecialchars($img); ?>" alt="" style="height: 250px;">
            </div>
            <ul class="category-list">              
                <li><a href="<?php echo $detailsUrl; ?>"><?php echo $rowsale['plot_category']; ?></a></li>

            </ul>
            <div class="content-area">
               <a href="<?php echo $detailsUrl; ?>" class="head">
<?php echo $rowsale['plot_category']; ?> Plot
</a>

                <p>
                (<?php if($rowsale['isDeveloper']== 'Yes'){ ?>
                    <span class="developer-name"><?php echo $rowsale['developerName']; ?></span> <?php } ?>
               )</p>
                <div class="space16"></div>
                <?php $address = $rowsale['localityName'] . ' - ' . 
           $rowsale['addressStreet'] . ' ' . 
           $rowsale['addressNumber'];
                ?>
                <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path>
                              </svg> <?php echo substr($address, 0, 40); ?></p>
                <div class="space24"></div>
                <ul>
                <li><a href="<?php echo $detailsUrl; ?>"> <?php echo $rowsale['plotArea'] . ' ' . $rowsale['plotAreaUnit']; ?></a></li>
                </ul>
                <div class="space24"></div>
                <div class="btn-area">
                    <div class="nm-btn">
                        <a href="<?php echo $detailsUrl; ?>">₹ <?php echo $price; ?>
</a>
                    </div>
             
             
             <a href="<?php echo $detailsUrl; ?>" class="heart-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
              <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
            </svg>
          </a>
                </div>
            </div>
        </div>
    </div>
<?php } if($count==0){ ?>
<h3 style="text-align: center;  font-weight: bold;margin-bottom: 50px;">No Properties Found!</h3>
                
      <?php } ?>          
     </div>           
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div></div>
  <!--===== PROPERTIES AREA ENDS =======-->