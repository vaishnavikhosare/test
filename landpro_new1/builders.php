<?php  include 'aconnection.php';   ?>

<?php  include_once 'headtop.php'; ?>

  <title>Builders  | Bhartiya Properties</title>

  <?php  include_once 'head.php'; ?>
</head>

<body class="homepage3-body">

 <?php include 'header.php'; ?>
 


<div class="team3-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="heading2 space-margin60 text-center">
          <h5 data-aos="fade-left" data-aos-duration="800">Builders in Pune</h5>
          <div class="space20"></div>
          <h2 class="text-anime-style-3" style="perspective: 400px;">Find the Best Property Builders</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <?php
      $query = "
        SELECT 
          b.builderID, b.companyName, b.logoImage, b.establishedYear, b.publicContact, b.verified, u.token,
          u.username, u.city, u.profileimg, u.userID 
        FROM builders b
        INNER JOIN users u ON b.userID = u.userID
        WHERE u.userStatus = 'Active' AND u.city = 'Pune'
        ORDER BY b.verified DESC, b.establishedYear DESC
      ";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)):
        $img = !empty($row['logoImage']) 
               ? $row['logoImage']
               : (!empty($row['profileimg']) 
                  ? $row['profileimg']
                  : 'assets/images/default-ueser.png');

        $companyName = !empty($row['companyName']) ? $row['companyName'] : $row['username'];
        $userID = (int)$row['userID'];

        // Count total approved properties listed by this builder
        $countQuery = "SELECT COUNT(*) as total FROM properties WHERE userID = '$userID' AND isApproved = 'approved'";
        $countResult = mysqli_query($conn, $countQuery);
        $countRow = mysqli_fetch_assoc($countResult);
        $totalProperties = $countRow['total'] ?? 0;
      ?>
      <div class="col-lg-6 col-md-6" data-aos="zoom-in-up" data-aos-duration="800">
  <div class="team-single-boxarea d-flex flex-wrap" style="">
    
    <!-- Left: Image + Established Year -->
    <div class="col-12 col-md-5 text-center mb-3 mb-md-0">
      <div class="img1">
        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($companyName); ?>" style="max-width: 100%; height: auto;">
      </div>
      <div class="space10"></div>
      <p class="text-muted">Established in <?php echo htmlspecialchars($row['establishedYear'] ?? 'N/A'); ?></p>
    </div>

    <!-- Right: Company Details -->
    <div class="col-12 col-md-7 d-flex flex-column justify-content-center">
      <h5 style="font-weight: bold;">
        <a href="builder_profile.php?id=<?php echo (int)$row['builderID']; ?>">
          <?php echo htmlspecialchars($companyName); ?>
        </a>
      </h5>

      <p><strong>Registration No:</strong> <?php echo htmlspecialchars($row['registrationNo'] ?? 'N/A'); ?></p>

      <?php if (!empty($row['reraID'])): ?>
        <p><strong>RERA ID:</strong> <?php echo htmlspecialchars($row['reraID']); ?></p>
      <?php endif; ?>

      <p><strong>Projects Listed:</strong> <?php echo (int)$totalProperties; ?></p>

      <div class="space10"></div>
      <a href="seller-details.php?userID=<?php echo urlencode($row['token']); ?>" class="theme-btn4" style="color: white; font-size: 15px; padding: 10px 10px;    max-width: 115px;
    text-align: center;">
        View Profile
      </a>
    </div>

  </div>
</div>

      <?php endwhile; ?>
    </div>
  </div>
</div>

  <?php include 'footer.php';   include 'footer_links.php';  ?>

</body>

</html>