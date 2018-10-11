<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data="";
				$animalID=$_POST['animalID'];
				$Servicedate=$_POST['Servicedate'];
				$serviceprovider=$_POST['serviceprovider'];
				$servicetype=$_POST['servicetype'];
				$servicedescription=$_POST['servicedescription'];
				$serviceprice=$_POST['serviceprice'];
				
				//$Servicedate=date('Y-m-d', strtotime($Servicedate));
			   
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_services(servicetype,animal,servicedate,serviceprovider,servicedescription,serviceprice)
	VALUES ('$servicetype','$animalID','$Servicedate','$serviceprovider','$servicedescription','$serviceprice')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>