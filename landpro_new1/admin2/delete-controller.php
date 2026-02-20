<?php  include('../aconnection.php'); $cintsertu_id=0;

if(isset($_SESSION['a_id'])){ $cintsertu_id=$_SESSION['a_id']; }

if (isset($_GET['imageID'])) {
    $propertyID = $_GET['propertyID'];
  $imageID = $_GET['imageID'];
    $deleteQuery = "DELETE FROM propertyimages WHERE imageID = '$imageID'";
    if($con->query($deleteQuery) === TRUE){
        header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&fmsg=Deleted Successfully!#third");
    }else {$con -> close();
    header("location:dashbord.php?addproperty=$cintsertu_id&propertyID=$propertyID&ferror=Error in delete process!#third");
    }
}


if (isset($_GET['propertystyledelete'])) {
    $styleID = intval($_GET['propertystyledelete']);
    $query = "DELETE FROM propertystyles WHERE styleID = $styleID";
    if (mysqli_query($connn, $query)) {
        header("location:dashbord.php?prostyles&fmsg=Deleted Successfully!#third");
        
       
    } else {
        header("location:dashbord.php?prostyles&ferror=Error in delete process!#third");
        
    }
}


if(isset($_GET['aminitydelete'])){
    $aminityID = $_GET['aminitydelete'];
    
    
    $deleteQuery = "DELETE FROM amenitymaster WHERE amenityID = '$aminityID'";
    if($connn->query($deleteQuery) === TRUE){
        header("location:dashbord.php?aminities=aminities&msg=Deleted Successfully!");
    }else {$con -> close();
    header("location:dashbord.php?aminities=aminities&error=Error in delete process!");
    }
}

if (isset($_GET['deleteprobyuser'])) {
    $propertyID = $_GET['propertyID'];    $c_id = $_GET['c_id'];
   $deleteQuery = "DELETE FROM properties WHERE propertyID = '$propertyID' AND userId='$c_id'";
    if($con->query($deleteQuery) === TRUE){
        header("location:dashbord.php?myproperties=$c_id&msg=Deleted Successfully!");
    }else {$con -> close();
    header("location:dashbord.php?myproperties=$c_id&error=Error in delete process!");
    }
}

if (isset($_GET['propertytypedelete'])) {
    $propertyTypeID = intval($_GET['propertytypedelete']);
    $query = "DELETE FROM propertytypes WHERE propertyTypeID = $propertyTypeID";
    if (mysqli_query($connn, $query)) {
        header("location:dashbord.php?protypes&fmsg=Deleted Successfully!#third");
    } else {
        header("location:dashbord.php?protypes&ferror=Error in delete process!#third");
    }
}
// Delete Locality
if (isset($_GET['deleteLocality'])) {
    $localityID = intval($_GET['deleteLocality']);
    $cityID = intval($_GET['cityID']);
    $res = mysqli_query($connn, "SELECT localityImg FROM localities WHERE localityID = $localityID");
    if ($row = mysqli_fetch_assoc($res)) {
        $imgPath = "../assets/img/localities/" . $row['localityImg'];
        if (file_exists($imgPath)) unlink($imgPath);
    }
    mysqli_query($connn, "DELETE FROM localities WHERE localityID = $localityID");
    header("Location: dashbord.php?cities&cityID=$cityID&msg=Locality deleted");
}


if(isset($_GET['deleteshippro'])){
    $p_id=$_GET['p_id'];$s_id=$_GET['s_id'];$shp_id=$_GET['shp_id'];
    $sh_id=$_GET['sh_id'];
    $sh_tqty=$_GET['pqp_qty'];
    $qtt="DELETE FROM product_stock WHERE shp_id='$shp_id'";
    $connn->query($qtt);
    $q="DELETE FROM shipment_products WHERE shp_id='$shp_id'";
    if($con->query($q) === TRUE){
        $mi=1;
        $qt="UPDATE product_details SET p_stock=p_stock-'$sh_tqty' WHERE p_id='$p_id'";
        if($conn->query($qt) === TRUE){
            $conn -> close(); $con -> close();
            header("location:add_shipment_details.php?sh_id=$sh_id&s_id=$s_id&ds=s");
        }else {$con -> close();
        header("location:add_shipment_details.php?sh_id=$sh_id&s_id=$s_id&ds=s");
        }
    }
    else {$con -> close();
    header("location:add_shipment_details.php?sh_id=$sh_id&s_id=$s_id&Error=Product May Already Saled, Can't Delete Product!");
    }
}

?>