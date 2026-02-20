<?php if(session_start()!=true){ session_start(); }
include('aconnection.php');
include('common-functions.php');
date_default_timezone_set('Asia/Kolkata');
$cdate=date("Y-m-d");

$cintsertu_id=0;
if(isset($_SESSION['u_id'])){ $cintsertu_id=$_SESSION['u_id']; }


if(isset($_POST['addpropertyfirst'])) {
    
    $propertyType=str_replace("'","&#039", $_POST['propertyType']);
    $propertCategory=$_POST['propertCategory'];
    $office=str_replace("'","&#039", $_POST['office']);
    $street=str_replace("'","&#039", $_POST['street']);
    $isDeveloper=$_POST['isDeveloper'];
    $propertyCate=$_POST['propertyCate'];
    $developerName="NA";
    if(isset($_POST['developerName']) && ($_POST['developerName']!="" || $_POST['developerName']!=null)){
    $developerName=str_replace("'","&#039", $_POST['developerName']);
}
    
    $cityId=$_POST['cityId'];
    $localityId=$_POST['localityId'];
    
    $addproperty=$_POST['addproperty'];
    
    $possessionDate=date('Y-m-d');
    $token = bin2hex(random_bytes(16));
    
    $qt="INSERT INTO properties(propertCategory, userId,propertyType,addressNumber,addressStreet,cityID,
localityID, propertyToken)
VALUES ('$propertCategory','$cintsertu_id','$propertyType','$office','$street','$cityId','$localityId', '$token')";
    
    if($conn->query($qt) === TRUE) {
        $propertyID=$conn->insert_id;
        
        $que=" INSERT INTO property_plot(propertyID, developerName, propertyCate, isDeveloper)
VALUES ('$propertyID', '$developerName', '$propertyCate', '$isDeveloper')";
        $conn->query($que);
        $conn->close();
        header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$token&msg=Add Media, Price of property!#pricedetails");
    }
    else {
        echo"Error: " . $qt . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty&propertCategory=$propertCategory&error=Error in submitting property!");
    }
}

if(isset($_POST['updatepropertyfirst'])){
    
    $propertyType=str_replace("'","&#039", $_POST['propertyType']);
    $office=str_replace("'","&#039", $_POST['office']);
    $street=str_replace("'","&#039", $_POST['street']);
    $isDeveloper=$_POST['isDeveloper'];
    $propertyCate=$_POST['propertyCate'];
    $developerName=str_replace("'","&#039", $_POST['developerName']);
    $cityId=$_POST['cityId'];
    $localityId=$_POST['localityId'];
    $propertCategory=$_POST['propertCategory'];
    $addproperty=$_POST['addproperty'];
    $propertyToken=$_POST['propertyID'];
    
    $update="UPDATE properties SET propertyType='$propertyType', addressNumber='$office',
 addressStreet='$street', cityID='$cityId', localityID='$localityId' WHERE propertyToken='$propertyToken'";
    if($conn->query($update) === TRUE) {
        $propertyID=getPropertyIDByToken($propertyToken, $conff);
        
        $que=" UPDATE property_plot SET isDeveloper='$isDeveloper', developerName='$developerName', propertyCate='$propertyCate' 
 WHERE propertyID='$propertyID'";
        $conn->query($que);
        echo"Error: " . $update . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&msg=Property Updated Successfully!#pricedetails");
    }
    else {
        echo"Error: " . $update . "<br>" . $conn->error;
        $conn->close();
        header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=Error in submitting property!");
        
    }
    
}


if (isset($_POST['upadtepropertysecond'])) {
    // Include DB connection file(s)
    $propertyRegType = $_POST['propertyRegType'];
    
    
    // Collect and sanitize form data
    $propertyToken = $_POST['propertyID'];
    $addproperty = $_POST['addproperty'];
    $propertCategory = $_POST['propertCategory'];
    
    $propertyTitle = str_replace("'", "&#039;", $_POST['propertyTitle']);
    $mainSummary = str_replace("'", "&#039;", $_POST['mainSummary']);
    
    // Plot-specific fields
    $priceFrom = $_POST['priceFrom'];
    $priceTo = $_POST['priceTo'];
    $plotArea = $_POST['plotArea'];
    $plotAreaUnit = $_POST['plotAreaUnit'];
    $totalPlots = $_POST['totalPlots'];
    $gatedCommunity = $_POST['gatedCommunity'];
    $cornerPlot = $_POST['cornerPlot'];
    $boundaryWall = $_POST['boundaryWall'];
    $roadType = $_POST['roadType'];
    $roadWidth = $_POST['roadWidth'];
    
    // Update `properties` table
    $updateMain = "UPDATE properties
                   SET propertyTitle = '$propertyTitle',
                       mainSummary = '$mainSummary'
                   WHERE propertyToken = '$propertyToken'";
    
    if ($conn->query($updateMain) === TRUE) {
        // Get internal propertyID using token
        $propertyID = getPropertyIDByToken($propertyToken, $conn);
        
        // Update `property_plot` table
        // Check if record exists
        $checkPlot = "SELECT propertyID FROM property_plot WHERE propertyID = '$propertyID'";
        $resultCheck = $conn->query($checkPlot);
        
        if ($resultCheck->num_rows > 0) {
            
            // UPDATE if exists
            $updatePlot = "UPDATE property_plot SET
    propertyRegType = '$propertyRegType',
    priceFrom = '$priceFrom',
    priceTo = '$priceTo',
    plotArea = '$plotArea',
    plotAreaUnit = '$plotAreaUnit',
    totalPlots = '$totalPlots',
    gatedCommunity = '$gatedCommunity',
    cornerPlot = '$cornerPlot',
    boundaryWall = '$boundaryWall',
    roadType = '$roadType',
    roadWidth = '$roadWidth'
WHERE propertyID = '$propertyID'";
            
            
            $conn->query($updatePlot);
            
        } else {
            
            // INSERT if missing
            $insertPlot = "INSERT INTO property_plot
                   (propertyID, priceFrom, priceTo, plotArea, plotAreaUnit,
                    totalPlots, gatedCommunity, cornerPlot,
                    boundaryWall, roadType, roadWidth)
                   VALUES
                   ('$propertyID', '$priceFrom', '$priceTo', '$plotArea',
                    '$plotAreaUnit', '$totalPlots', '$gatedCommunity',
                    '$cornerPlot', '$boundaryWall', '$roadType', '$roadWidth')";
            
            $conn->query($insertPlot);
        }
        
        
        if ($conn->query($updatePlot) === TRUE) {
            $conn->close();
            header("Location: dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&msg=Updated Successfully! Add Media!#propertyimages");
            exit();
        } else {
            $conn->close();
            header("Location: dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=Error updating Plot info!#pricedetails");
            exit();
        }
    } else {
        $conn->close();
        header("Location: dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=Error updating basic info!#pricedetails");
        exit();
    }
}



if(isset($_POST["updatepropertyimages"]) ){
    
    
    
    $propertyToken=$_POST['propertyID'];
    $propertCategory=$_POST['propertCategory'];
    
    
    $propertyID=getPropertyIDByToken($propertyToken, $conff);
    if (isset($_FILES['images'])) {
        $imageCount = count($_FILES['images']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $imageName = $_FILES['images']['name'][$i];
            $imageTmpName = $_FILES['images']['tmp_name'][$i];
            $imageSize = $_FILES['images']['size'][$i];
            
            $statusMsg = '';
            $backlink=null;
            
            
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp','bmp'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            if (in_array($imageExtension, $allowedExtensions) && $imageSize <= 3 * 1024 * 1024) {
                $targetDir = 'propert-images/'; // Set the correct path
                
                
                
                $qu="INSERT INTO propertyimages(propertyID) VALUES ('$propertyID')";
                
                if ($conn->query($qu) === TRUE) {
                    $cdoc_id=$conn->insert_id;
                    $targetFilePath = $targetDir.$cdoc_id.".".$imageExtension;
                    if(move_uploaded_file($imageTmpName, $targetFilePath)){
                        
                        $q="UPDATE propertyimages SET imageUrl='$targetFilePath' WHERE imageID='$cdoc_id'" ;
                        
                        if ($con->query($q) === TRUE) {
                            
                            header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&msg=Updated Successfully!#propertyimages");
                        }else {
                            header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=File upload failed!#propertyimages");
                        }
                        
                    }else{
                        header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=File upload failed!#propertyimages");
                        
                    }
                }else{
                    header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=File upload failed!#propertyimages");
                    
                }
                
                
            } else{
                header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=File Extensions not allowed!#propertyimages");
                
                
            }
            
            
        }   } else{
            header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=Files Not Fill!#propertyimages");
            
            
        } }
        
        
        
        
        if (isset($_GET['imageID'])) {
            $propertyToken = $_GET['propertyID'];
            $imageID = $_GET['imageID'];
            $propertyID=getPropertyIDByToken($propertyToken, $conff);
            $propertCategory=$_GET['propertCategory'];
            
            
            $deleteQuery = "DELETE FROM propertyimages WHERE imageID = '$imageID' AND propertyID='$propertyID'";
            if($con->query($deleteQuery) === TRUE){
                header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&msg=Deleted Successfully!#propertyimages");
            }else {$con -> close();
            header("location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=Error in delete process!#propertyimages");
            }
        }
        
        
        if (isset($_POST['add_proamenities'])) {
            $propertyToken = $_POST['propertyID'];
            $propertCategory = $_POST['propertCategory'];
            $propertyID = getPropertyIDByToken($propertyToken, $conff);
            
            
            
            $wpa_ids = $_POST['wpa_ids'] ?? [];
            
            if ($propertyID == 0 || empty($wpa_ids)) {
                header("Location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&error=No Amanities Selected!#amenities");
                exit();
                
            }
            
            // Delete existing amenities
            $query = "DELETE FROM propertyamenities WHERE propertyID = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $propertyID);
            $stmt->execute();
            
            // Insert selected
            $query = "INSERT INTO propertyamenities (propertyID, amenityID) VALUES (?, ?)";
            $stmt = $con->prepare($query);
            
            foreach ($wpa_ids as $wpa_id) {
                $stmt->bind_param("ii", $propertyID, $wpa_id);
                $stmt->execute();
            }
            
            header("Location:dashbord.php?addproperty&propertCategory=$propertCategory&propertyID=$propertyToken&msg=Amenities Updated Successfully!#amenities");
            exit();
        }
        
        
        ?>