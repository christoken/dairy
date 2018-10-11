<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";	
	
		$animalID=$_POST['animalID'];
		$productiontype=$_POST['productiontype'];
		$productiontime=$_POST['productiontime'];
		$productqnty=$_POST['productqnty'];
		$productionid=$_POST['productionid'];
		$productioncomments=$_POST['productioncomments'];
		$productiondate=$_POST['productiondate'];		
						
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_production(productionid,productiondate,animalID,producttype,productqnty,comments,productiontime) 
	VALUES ('$productionid','$productiondate','$animalID','$productiontype','$productqnty','$productioncomments','$productiontime')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>