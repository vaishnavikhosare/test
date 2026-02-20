<?php  include('aconnection.php'); include 'session.php';



$cintsertu_id=0;

if(isset($_SESSION['u_id'])){ $cintsertu_id=$_SESSION['u_id']; }

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




if (isset($_GET['deleteprobyuser'])) {
    $propertyID = $_GET['propertyID'];   
   $deleteQuery = "UPDATE properties SET isApproved='deleted' WHERE propertyToken = '$propertyID' AND userId='$cintsertu_id'";
    if($con->query($deleteQuery) === TRUE){
        header("location:dashbord.php?myproperties=$c_id&msg=Deleted Successfully!");
    }else {$con -> close();
    header("location:dashbord.php?myproperties=$c_id&error=Error in delete process!");
    }
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