<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data="";
				$animalID=$_POST['animalID'];
				$calfbreedtype=$_POST['calfbreedtype'];
				$calvingdate=$_POST['calvingdate'];
				$calvingsex=$_POST['calvingsex'];
				$livedead=$_POST['livedead'];
				$calfID=$_POST['calfID'];
				$calfName=$_POST['calfName'];
				$calfbodycolor=$_POST['calfbodycolor'];				
				$calfcowsire=$_POST['calfcowsire'];
				$calfmaternalgranddam=$_POST['calfmaternalgranddam'];
				$calfpaternalgranddam=$_POST['calfpaternalgranddam'];
				$calfmaternalgrandsire=$_POST['calfmaternalgrandsire'];
				$calfpaternalgrandsire=$_POST['calfpaternalgrandsire'];
	
	$sql="INSERT INTO tbl_yagan_animalcalvingrecord(
		AnimalID,calfbreedtype,calvingdate,sex,aliveordead,calfID,calfName,calfbodycolor,calfcowsire,
		calfmaternalgranddam,calfpaternalgranddam,calfmaternalgrandsire,calfpaternalgrandsire) 
	VALUES 
		('$animalID','$calfbreedtype','$calvingdate','$calvingsex','$livedead','$calfID','$calfName','$calfbodycolor',
		'$calfcowsire','$calfmaternalgranddam','$calfpaternalgranddam','$calfmaternalgrandsire',
		'$calfpaternalgrandsire')";		
							   
	$result1=mysqli_query($con,$sql);
	
	if (!$result1){ $data="There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>