<?php  include 'aconnection.php';   ?>

<?php  include_once 'headtop.php'; ?>

  <title>Agents  | Bhartiya Properties</title>

  <?php  include_once 'head.php'; ?>
</head>

<body class="homepage3-body">

 <?php include 'header.php'; ?>
 


<div class="team3-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="heading2 space-margin60 text-center">
          <h5 data-aos="fade-left" data-aos-duration="800">Agents in Pune</h5>
          <div class="space20"></div>
          <h2 class="text-anime-style-3" style="perspective: 400px;">Find the Best Agents</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <?php
      $query = "
        SELECT 
          a.agentID, a.agencyName, a.logoImage, a.operatinSince, a.publicContact, u.token, a.verified,
          u.username, u.city, u.profileimg, u.userID 
        FROM agents a
        INNER JOIN users u ON a.userID = u.userID
        WHERE u.userStatus = 'Active'
        ORDER BY verified DESC, a.operatinSince DESC
      ";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)):
        $img = !empty($row['logoImage']) 
               ? $row['logoImage']
               : (!empty($row['profileimg']) 
                  ? $row['profileimg']
                  : 'assets/images/default-ueser.png');

        $agency = !empty($row['agencyName']) ? $row['agencyName'] : $row['username'];
        
        
        $userID=$row['userID'];
        
        $Selectnoofproperty= "SELECT COUNT(*) as total FROM properties WHERE userID = '$userID' AND isApproved='approved'";
        $resultnoofproperty = mysqli_query($conn, $Selectnoofproperty);
        $rownoofproperty = mysqli_fetch_assoc($resultnoofproperty);
        $totalProperties = $rownoofproperty['total'] ?? 0;
        
        
      ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="800" lazyload="true" style="opacity: 1; visibility: visible;" data
        >
          <div class="team-single-boxarea">
            <div class="img1">
              <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($agency); ?>">
            </div>
            <div class="content-area">
              <a href="agent_profile.php?id=<?php echo (int)$row['agentID']; ?>">
                <?php echo htmlspecialchars($agency); ?>
              </a>
              <div class="space22"></div>
              <p>Operating Since <?php echo htmlspecialchars($row['operatinSince'] ?? 'N/A'); ?></p>
              
              <div class="space22"></div>
              <p>Total Properties: <?php echo (int)$totalProperties; ?></p>
              
              
              <div class="space14"></div>
              <a href="seller-details.php?userID=<?php echo (int)$row['token']; ?>" class="theme-btn4" style="color: white;font-size: 15px;padding: 10px 10px;">
               View Profile </a>
             
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