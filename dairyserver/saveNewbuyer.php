<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";			
		$Buyertype=$_POST['Buyertype'];
		$Buyerid=$_POST['Buyerid'];
		$buyername=$_POST['buyername'];
		$dateadded=$_POST['dateadded'];
		$buyerproducttype=$_POST['buyerproducttype'];		
		$status="active";
				
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_buyer(Buyerid,buyername,Buyertype,dateadded,buyerproducttype,status) 
	VALUES ('$Buyerid','$buyername','$Buyertype','$dateadded','$buyerproducttype','$status')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>