<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data=""; $sql="";
				$animalID=$_POST['animalID'];
				$Servicedate=$_POST['Servicedate'];
				$serviceprovider=$_POST['serviceprovider'];
				$servicetype=$_POST['servicetype'];
				$servicedescription=$_POST['servicedescription'];
				$serviceprice=$_POST['serviceprice'];
				$calfid=$_POST['calfid'];
				//$Servicedate=date('Y-m-d', strtotime($Servicedate));
				
if($animalID=='' && $calfid==''){
	
	}
else if ($animalID!='' && $calfid=='' ){
	$sql="INSERT INTO tbl_yagan_services(servicetype,animal,calfid,servicedate,serviceprovider,servicedescription,serviceprice)
	VALUES ('$servicetype','$animalID','$calfid','$Servicedate','$serviceprovider','$servicedescription','$serviceprice')";	
}	
else {
	$sql="INSERT INTO tbl_yagan_services(servicetype,animal,calfid,servicedate,serviceprovider,servicedescription,serviceprice)
	VALUES ('$servicetype','$animalID','$calfid','$Servicedate','$serviceprovider','$servicedescription','$serviceprice')";
}
			   
	$result1=mysqli_query($con,$sql);
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>