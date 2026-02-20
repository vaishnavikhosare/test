 <style>
 @media (min-width: 576px) {
    .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
        width: 100px;
    }
}
 .edit-btn  {
    background: #0d6efd none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 400;
    height: 100%;
    padding: 4px 10px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    text-transform: capitalize;
}
 
 </style>         <?php if($adminDeg!=1){ header("location:dashbord.php"); } ?>
         
         
            <div class="tab-pane fade active show" id="ltn_tab_1_1">
             <div class="ltn__myaccount-tab-content-inner" style="text-align: center;">
                                              
                                           	  <?php  if(isset($_GET['error'])){ ?>
      <p class="text-center small" style="color: red;"><?php echo $_GET['error']; ?></p>  
  <?php  }   if(isset($_GET['msg'])){ ?>
      <p class="text-center small" style="color: green;"><?php echo $_GET['msg']; ?></p>  
  <?php  } ?>
  

<?php      		
$limit = 20; if(isset($_SESSION['limit'])) { $limit = intval($_SESSION['limit']); }   if(isset($_GET['limit'])) { $limit = intval($_GET['limit']);  $_SESSION['limit']= $limit; }
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Get total number of agents
$totalQuery = "SELECT COUNT(*) AS total FROM agents";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated agent data with user info
$query = "
SELECT 
    a.*, 
    u.username, u.email, u.contact, u.userType 
FROM agents a
JOIN users u ON a.userID = u.userID
ORDER BY a.agentID DESC
LIMIT $limit OFFSET $offset
";
$result = mysqli_query($conn, $query);
?>


<h4 class="mb-4">Agent List</h4>


<div class="row"> <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
<input type="text" id="tableSearch" class="form-control mb-3" placeholder="Search from table" style="max-width: 250px;">
</div><div class="col-lg-6 col-md-6 col-sm-12 mb-3" >
<form method="get" action="dashbord.php" class="form-inline mb-3">
<input type="hidden" name="agent" value="1">
    <label for="limitSelect" class="mr-2">Records/Page:</label>
    <select name="limit" id="limitSelect" class="form-control" onchange="this.form.submit()" style="max-width: 50px;">
        <?php
        $options = [20, 50, 100];
        foreach ($options as $opt) {
            $selected = ($limit == $opt) ? 'selected' : '';
            echo "<option value='$opt' $selected>$opt</option>";
        }
        ?>
    </select>
</form>
</div>

</div>


<!-- Agent Table -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Logo</th>
            <th scope="col">Agent Info</th>
            <th scope="col">User Info</th>
            <th scope="col">Verification</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody id="TableBody">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>
                <?php if (!empty($row['logoImage'])): ?>
                    <img src="../<?= htmlspecialchars($row['logoImage']) ?>" class="img-fluid" alt="Logo" style="height: 50px;">
                <?php else: ?>
                    <img src="../propert-images/NO_IMG.png" class="img-fluid" alt="No Logo" style="height: 50px;">
                <?php endif; ?>
            </td>
            <td>
                <div>
                    <strong><?= htmlspecialchars($row['agencyName']) ?></strong><br>
                    License: <?= htmlspecialchars($row['licenseNumber']) ?><br>
                 
                    <a href="mailto:<?= htmlspecialchars($row['publicEmail']) ?>"
                      ><?= htmlspecialchars($row['publicEmail']) ?></a><br>
                    <a href="tel:<?= htmlspecialchars($row['publicContact']) ?>"
                    ><?= htmlspecialchars($row['publicContact']) ?></a><br>
                    <?php if ($row['website']): ?>
                        <small>Website: <a href="<?= htmlspecialchars($row['website']) ?>" target="_blank"><?= htmlspecialchars($row['website']) ?></a></small>
                    <?php endif; ?>
                </div>
            </td>
            <td>
                <div>
                    <strong><a href="dashbord.php?userDetails&userID=<?= $row['userID'] ?>&type=<?= $row['userType'] ?>" target="_blank"><?= htmlspecialchars($row['username']) ?></a></strong><br>
                    <small><?= htmlspecialchars($row['contact']) ?> - <?= htmlspecialchars($row['email']) ?></small><br>
                    <small>(<?= htmlspecialchars($row['userType']) ?>)</small>
                </div>
            </td>
            <td>
                <?php if ($row['verified'] === 'Yes'): ?>
                    <span class="edit-btn" style="background: #0a9164;">Verified</span>
                <?php else: ?>
                    <span class="edit-btn" style="background: #ff0404;">Not Verified</span>
                <?php endif; ?>
            </td>
            <td>
                <a class="edit-btn" href="dashbord.php?userDetails&userID=<?= $row['userID'] ?>&type=<?= $row['userType'] ?>">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<hr>
<!-- Pagination -->
<div class="pagination-container mt-4">
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="btn btn-common" href="?agentlist&page=<?= max(1, $page - 1) ?>"><i class="lni-chevron-left"></i> Previous</a>
            </li>

            <?php
            $startPage = max(1, $page - 1);
            $endPage = min($totalPages, $page + 1);

            for ($i = $startPage; $i <= $endPage; $i++):
            ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?agentlist&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="btn btn-common" href="?agentlist&page=<?= min($totalPages, $page + 1) ?>">Next <i class="lni-chevron-right"></i></a>
            </li>
        </ul>
    </nav>
</div>

     </div></div>               <script>
document.getElementById("tableSearch").addEventListener("keyup", function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll("#TableBody tr");

    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(searchTerm) ? "" : "none";
    });
});
</script>
                                        
                                        <script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
     <script>
    function validatePassword() {
        var newPassword = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;

        if (newPassword !== confirmPassword || newPassword.length < 6) {
            alert("Password and Confirm password do not match or the new password is too short.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>