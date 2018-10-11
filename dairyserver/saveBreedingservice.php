<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider

				$data="";
				$breedingserviceid=$_POST['breedingserviceid'];
				$animalID=$_POST['animalID'];
				$sirebreed=$_POST['sirebreed'];			
				$Servicedate=$_POST['Servicedate'];
				$serviceprovider=$_POST['serviceprovider'];
				$servicetype=$_POST['servicetype'];
				$Estimatecalfdate=$_POST['Estimatecalfdate'];
				$comments=$_POST['comments'];
				$calvingease=$_POST['calvingease'];
				//$Servicedate=date('Y-m-d', strtotime($Servicedate));
				$sql="INSERT INTO tbl_yagan_animalbreedingservice(breedingserviceid,AnimalID,sirebreed,Servicedate,servicetype,Estimatecalfdate,calvingease,serviceprovider,comments) 
	VALUES ('$breedingserviceid','$animalID','$sirebreed','$Servicedate','$servicetype','$Estimatecalfdate','$calvingease','$serviceprovider','$comments')";
			   
	$result1=mysqli_query($con,$sql);
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>