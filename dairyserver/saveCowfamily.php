<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";	
	 $sqry="";
		$saveorupdate=$_POST['saveorupdate'];
		$animalID=$_POST['animalID'];
		$hybridlevel=$_POST['hybridlevel'];
		$cowdam=$_POST['cowdam'];
		$cowsire=$_POST['cowsire'];
		$maternalgranddam=$_POST['maternalgranddam'];
		$paternalgranddam=$_POST['paternalgranddam'];
		$maternalgrandsire=$_POST['maternalgrandsire'];
		$paternalgrandsire=$_POST['paternalgrandsire'];	
if($saveorupdate=="Save"){
	$sqry="INSERT INTO tbl_yagan_animalfamily(animalID,hybridlevel,cowdam,cowsire,maternalgranddam,paternalgranddam,maternalgrandsire,paternalgrandsire) 
	VALUES ('$animalID','$hybridlevel','$cowdam','$cowsire','$maternalgranddam','$paternalgranddam','$maternalgrandsire','$paternalgrandsire')";
	
}	else if($saveorupdate=="Update"){
	$sqry="UPDATE  tbl_yagan_animalfamily 
	SET hybridlevel='$hybridlevel',cowdam='$cowdam',cowsire='$cowsire',
	maternalgranddam='$maternalgranddam',paternalgranddam='$paternalgranddam',
	maternalgrandsire='$maternalgrandsire',paternalgrandsire='$paternalgrandsire'
	WHERE animalID='$animalID'";
}
						
	$result1=mysqli_query($con,$sqry);
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>