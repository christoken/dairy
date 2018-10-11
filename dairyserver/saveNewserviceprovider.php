<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";	
		$providertype=$_POST['providertype'];
		$providerid=$_POST['providerid'];
		$providernames=$_POST['providernames'];
		$Telephone=$_POST['Telephone'];
		$email=$_POST['email'];
		$dateadded=$_POST['dateadded'];		
		$status="active";
				
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_serviceprovider(providerID,servicetype,Providername,Telephone,email,dateadded,status) 
	VALUES ('$providerid','$providertype','$providernames','$Telephone','$email','$dateadded','$status')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>