<?php
include 'aconnection.php';
include 'common-functions.php';
session_start();

if(!isset($_GET['PID'])){
    header("Location: properties.php");
    exit();
}

$propertyToken = $_GET['PID'];

$qpt="SELECT * FROM properties p
LEFT JOIN property_plot s ON p.propertyID=s.propertyID
LEFT JOIN propertytypes pt ON p.propertyType=pt.propertyTypeID
LEFT JOIN cities c ON p.cityID=c.cityID
LEFT JOIN localities l ON p.localityID=l.localityID
WHERE p.propertyToken='$propertyToken'";

$resultpt = mysqli_query($conn,$qpt);

if(!$resultpt || mysqli_num_rows($resultpt)==0){
    die("Property Not Found");
}

$rowsalesd = mysqli_fetch_assoc($resultpt);
$propertyID = $rowsalesd['propertyID'];

// 🔽 ADD THIS HERE (IMPORTANT)
$qimages = "SELECT imageUrl FROM propertyimages WHERE propertyID = $propertyID";
$resultimages = mysqli_query($conn, $qimages);
$rowimages = mysqli_fetch_assoc($resultimages);


// Fetch property images
$qimages = "SELECT imageUrl FROM propertyimages WHERE propertyID = $propertyID";
$resultimages = mysqli_query($conn, $qimages);

// Get first image for main image
$rowimages = mysqli_fetch_assoc($resultimages);

?>

 
 
 
 
  <title><?php echo $rowsalesd['propertyTitle']; ?> | Bhartiya Properties </title>
  
  <!--  SEO Content -->
  <meta name="description" content="<?php echo $rowsalesd['propertyTitle']; ?> : <?php echo substr( $rowsalesd['mainSummary'], 0, 60); ?>">
  <meta name="keywords" content="<?php echo $rowsalesd['propertyTitle']; ?>, Plot in <?php echo $rowsalesd['cityName']; ?>, Plot in <?php echo $rowsalesd['localityName']; ?>, <?php echo $rowsalesd['plot_category']; ?> Plot, Bhartiya Properties">

  <meta name="author" content="Collin IT Solution">
   <meta property="og:image" content="<?php echo $rowimages['imageUrl']; ?>">

  


  <?php  include_once 'head.php'; ?>
  <style>

	.alert {
			    position: absolute;
			    top: 15px;
			    right: 15px;
			    z-index: 999;
			    padding: 15px 20px;
			    margin: 15px 0;
			    border: 1px solid transparent;
			    border-radius: 4px;
			    font-family: sans-serif;
			} @media (max-width: 768px) {
                .col-sm-6 {
                    width: 50% !important;
                }}
</style>
<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
</head>

<body class="homepage3-body">

 <?php include 'header.php'; ?>
 
 

<?php $alertMsg = "";
$scrollToSection = false; // Flag to determine scrolling

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['wsv_name'])) {    
    // Sanitize Input
    $name = htmlspecialchars(trim($_POST['wsv_name']));
    $contact = htmlspecialchars(trim($_POST['wsv_contact']));
    $email = htmlspecialchars(trim($_POST['wsv_email']));
 
    
    
    // Validate Fields
    if (!empty($name) && !empty($contact) && !empty($email)) {
        if (preg_match('/^[0-9]{10}$/', $contact)) { // Ensure contact is 10-digit
            $stmt = $conn->prepare("INSERT INTO arrange_viewing (propertyID, av_name, av_email, av_contact) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $propertyID, $name, $email, $contact);
            
            if ($stmt->execute()) {
                $alertMsg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Request Send successfully.
                              
                             </div>';
                $scrollToSection = true; // Set flag to trigger scrolling
            } else {
                $alertMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Unable to send request. Please try again later.
                                                         </div>';
            }
            $stmt->close();
        
        } else {
            $alertMsg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Invalid Contact!</strong> Enter a valid 10-digit phone number.
                         
                         </div>';
        }
    } else {
        $alertMsg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> All fields are required.
                
                     </div>';
    }
} ?>



  <!--===== HERO AREA ENDS =======-->
   <?= $alertMsg; ?> 
  <!--===== PROPERTIES AREA STARTS =======-->
  <div class="properties-details2-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
   






          <div class="row">
            <div class="col-lg-9 col-md-9">
              
              <div class="details-siderbar">
              
                  <div class="row">
           
                 <div class="col-lg-12 col-md-12">
                  
                <div class="content-area">
                 <div class="row">
           
                 <div class="col-lg-6 col-md-6">
                <?php
$mainImage = !empty($rowimages['imageUrl']) ? $rowimages['imageUrl'] : 'assets/img/default-property.jpg';
?>

<img src="<?php echo $mainImage; ?>"
     alt="<?php echo $rowsalesd['propertyTitle']; ?>"
     style="margin-bottom: 10px; border-radius: 10px;">

              </div>
                  <div class="col-lg-6 col-md-6">
                  <div class="content heading2">
                    <h1 style="font-size: 21px;"><?php echo $rowsalesd['propertyTitle']; ?></h1>
                         </div>
                  
                     <button href="#" class="theme-btn1" style="color: white;"> 
  &#8377;<?php if(function_exists('formatIndianShortNumber')){
    echo formatIndianShortNumber($rowsalesd['priceFrom'], 2);
} else {
    echo number_format($rowsalesd['priceFrom']);
}
  ?> 
                      <?php if($rowsalesd['priceTo']>0){ ?> 
- &#8377;
<?php 
if(function_exists('formatIndianShortNumber')){
    echo formatIndianShortNumber($rowsalesd['priceTo'], 2);
} else {
    echo number_format($rowsalesd['priceTo']);
}
?>
<?php } ?>
</button>
         
         <div class="list-area" style="padding-top: 10px;">
                    <div class="list">
                      <?php if (!empty($rowsalesd['propertyRegType'])): ?>    <ul>
  <li style="    line-height: 40px;">Registration Type:</li>

 
  <li> 
        <?php echo $rowsalesd['propertyRegType']; ?>  
  </li>
</ul>  <?php endif; ?>
 

 <?php if (!empty($rowsalesd['isDeveloper']) && $rowsalesd['isDeveloper'] === 'Yes' && !empty($rowsalesd['developerName'])): ?>
  <ul>
    <li style="    line-height: 40px;"> Developer:</li>
  <li>
     <?php echo $rowsalesd['developerName']; ?> 
  </li> 
</ul>  <?php endif; ?>

<ul> <li style="    line-height: 40px;">Location:</li>
  <li>
    
    <?php
      $address = $rowsalesd['addressStreet'] . ' ' .
                 $rowsalesd['addressNumber'] . ' ' .
                 $rowsalesd['localityName'] . ' ' .
                 $rowsalesd['cityName'] . ' ' .
                 $rowsalesd['postalCode'];
      echo $address;
    ?>
  </li>
</ul>
                    
  </div></div>
 </div></div></div></div>
<div class="space24"></div>
<div class="col-lg-12 col-md-12">




 <div class="content-area">	
  <div class="row">
  
 
   

    <?php if (!empty($rowsalesd['plotArea'])): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Plot Area:<br>
      <b><?php echo number_format($rowsalesd['plotArea'], 2); ?> <?php echo htmlspecialchars($rowsalesd['plotAreaUnit']); ?></b>
    </div>
    <?php endif; ?>

    <?php if (!empty($rowsalesd['totalPlots'])): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Total Plots:<br>
      <b><?php echo (int)$rowsalesd['totalPlots']; ?> Plots</b>
    </div>
    <?php endif; ?>

    <?php if ($rowsalesd['gatedCommunity'] === 'Yes'): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Community Type:<br>
      <b>Gated Community</b>
    </div>
    <?php endif; ?>
    

    <?php if ($rowsalesd['cornerPlot'] === 'Yes'): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Corner Plot:<br>
      <b>Yes</b>
    </div>
    <?php endif; ?>

    <?php if (!empty($rowsalesd['roadType'])): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Road Type:<br>
      <b><?php echo htmlspecialchars($rowsalesd['roadType']); ?> Road</b>
    </div>
    <?php endif; ?>

    <?php if (!empty($rowsalesd['roadWidth'])): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Road Width:<br>
      <b><?php echo (int)$rowsalesd['roadWidth']; ?> Ft</b>
    </div>
    <?php endif; ?>

    <?php if ($rowsalesd['boundaryWall'] === 'Yes'): ?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="padding-bottom: 14px;">
      Boundary Wall:<br>
      <b>Available</b>
    </div>
    <?php endif; ?>

  </div>

        
        
 <hr>
                  <div class="list-area" style="padding-top: 0px;">
                    <div class="list">
           




   <?php if(strlen($rowsalesd['mainSummary'])>6){  ?>  
                      <div class="space24"></div>
                      <h5>Property Description:</h5>
                      <p style="text-align: justify;"> <?php echo $rowsalesd['mainSummary']; ?></p>
                      <?php } ?>
                    </div>

               
                  </div>
                </div>
                
                        <?php if(strlen($rowsalesd['broucherDoc'])>6 || strlen($rowsalesd['floorplanDoc'])>6){  ?>
                 <div class="space32"></div>
                <div class="download-box">
                  <h3>Download Broucher</h3>
                  <div class="space28"></div>
                  <div class="download">
                  
                  <?php if(strlen($rowsalesd['broucherDoc'])>6 && isset($_SESSION['u_id'])){  ?>
                    <a href="<?php echo $rowsalesd['broucherDoc']; ?>"><span><img src="assets/img/icons/pdf1.svg" alt=""></span>Broucher <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z"></path>
                      </svg></a>
                      <?php }  if(strlen($rowsalesd['floorplanDoc'])>6){  ?>
                    <a href="<?php echo $rowsalesd['floorplanDoc']; ?>" class="m-0"><span>
                    <img src="assets/img/icons/pdf2.svg" alt=""></span>Floor Plan <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z"></path>
                      </svg></a> <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                
                <div class="space32"></div>
                <div class="property-details-slider owl-carousel">
                <?php
         
                while ($rowi = mysqli_fetch_assoc($resultimages)): 
    $imageUrl = htmlspecialchars($rowi['imageUrl']); 
?>
  <div class="img1">
      <a href="<?php echo $imageUrl; ?>" class="glightbox" data-gallery="land-gallery">
        <img src="<?php echo $imageUrl; ?>" class="img-fluid rounded shadow-sm" alt="<?php echo $rowsalesd['propertyTitle']; ?>"
         style="height: 300px; width: 100%; ">
      </a>
    </div>
<?php endwhile; ?>
                
              
                  
                </div>
               
                <div class="space60"></div> 	
                <div class="bg1">
               
                  <div class="space12"></div>
                  <div class="row">
             <?php
$sqlc = "
SELECT a.amenityName, a.amenityIcon 
FROM propertyamenities sa
JOIN amenitymaster a ON sa.amenityID = a.amenityID
WHERE sa.propertyID = ?
";

$stmtc = $conn->prepare($sqlc);
$stmtc->bind_param("i", $propertyID);
$stmtc->execute();
$resultc = $stmtc->get_result();

// Store all amenities in an array first
$amenities = [];
while ($rowc = $resultc->fetch_assoc()) {
    $amenities[] = $rowc;
}

// Split into two columns: odd-indexed (0, 2, 4...) and even-indexed (1, 3, 5...)
$leftColumn = [];  // odd index
$rightColumn = []; // even index

foreach ($amenities as $index => $amenity) {
    if ($index % 2 === 0) {
        $leftColumn[] = $amenity;
    } else {
        $rightColumn[] = $amenity;
    }
}

// Reusable function to render amenities
function renderAmenitiesList($items) {
    foreach ($items as $rowc) {
        echo '<div class="list-box">
                <div class="icon">';
        if (strpos($rowc['amenityIcon'], '<svg') !== false) {
            echo $rowc['amenityIcon'];
        } else {
            echo '<img src="assets/img/aminities/' . htmlspecialchars($rowc['amenityIcon']) . '" alt="' . htmlspecialchars($rowc['amenityName']) . '" width="32" height="32">';
        }
        echo '</div>
              <div class="text">
                <p>' . htmlspecialchars($rowc['amenityName']) . '</p>
              </div>
            </div>';
    }
}
?>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <h4>Our Amenities :</h4>
        <?php renderAmenitiesList($leftColumn); ?>
    </div>
    <div class="col-lg-6 col-md-6">
        <h4>&nbsp;</h4> <!-- Optional: match heading spacing -->
        <?php renderAmenitiesList($rightColumn); ?>
      </div>
</div>

                    
                  </div>
                </div>
                </div>
                 </div></div>
                 </div>
                 
            <div class="col-lg-3 col-lg-3">
            
           <?php 
$sellerId = $rowsalesd['userId']; // correct column name from DB
include_once 'property-details-inquiry.php';
?>

            
            
            </div>
            
                
          </div>
          <div class="space60"></div>
          <div  class="properties-details1-area">
           <div  class="details-siderbar">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="map-section" style="background: rgb(242, 243, 243);">
              
                       <div class="row">
            <div class="col-lg-8 col-md-7">
               
              <?php

              $address = urlencode($address);
echo '<iframe width="100%" height="350" frameborder="0" style="border:0"
    src="https://www.google.com/maps?q=' . $address . '&output=embed"
    allowfullscreen></iframe>';
?>
                       </div><div class="col-lg-4 col-md-5">
                 <h4> 
                 Nearby Localities: </h4>
                 
                  <div class="list">
                    <ul>
                
<?php $localityID= $rowsalesd['localityID'];
$nearbyLocations = "SELECT np.placeName, np.distance, np.distanceType FROM nearbyplaces np WHERE np.localityID = ".$localityID." ORDER BY np.distance ASC LIMIT 7";
             $resultNearby = mysqli_query($conn, $nearbyLocations);
             while ($rowNearby = mysqli_fetch_assoc($resultNearby)) {
                    
                    ?>
                    <li style="    border-bottom: 3px solid #c0b8b8;
    padding-bottom: 10px;">
                        <span><?php echo htmlspecialchars($rowNearby['placeName']); ?></span>
                        <div><?php echo htmlspecialchars($rowNearby['distance']) . ' ' . htmlspecialchars($rowNearby['distanceType']); ?></div>
                    </li>
                    <?php } ?>
                     
                    </ul>
              
                  </div>
                </div></div>  </div>
              </div></div>
          
          
        </div>
      </div>
   
    
  </div></div></div></div>
  
  
  <?php if(isset($_SESSION['u_id'])){ 
      $userID = $_SESSION['u_id'];

// Check if user already viewed in last 60 minutes
$check = $conn->prepare("SELECT propViewId FROM property_views WHERE propertyID = ? AND userID = ? AND viewDate > NOW() - INTERVAL 1 HOUR");
$check->bind_param("ii", $propertyID, $userID);
$check->execute();
$check->store_result();

if ($check->num_rows == 0) {
    // Increment view count
    $update = $conn->prepare("UPDATE properties SET viewCount = viewCount + 1 WHERE propertyID = ?");
    $update->bind_param("i", $propertyID);
    $update->execute();
    $update->close();

    // Log the view
    $insert = $conn->prepare("INSERT INTO property_views (propertyID, userID) VALUES (?, ?)");
    $insert->bind_param("ii", $propertyID, $userID);
    $insert->execute();
    $insert->close();
}
$check->close();
} else { 
    $update = $conn->prepare("UPDATE properties SET viewCount = viewCount + 1 WHERE propertyID = ?");
    $update->bind_param("i", $propertyID);
    $update->execute();
    $update->close();
    
    
} ?>
  
        
        
        
  <?php include 'footer.php'; ?>
<?php include 'footer_links.php'; ?>
  
  
  