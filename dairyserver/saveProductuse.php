<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";	
		$useid=$_POST['useid'];
		$producttype=$_POST['producttype'];
		$usetype=$_POST['usetype'];
		$usedate=$_POST['usedate'];
		$amountused=$_POST['amountused'];
		$whoused=$_POST['whoused'];
		$useproductiontime=$_POST['useproductiontime'];		
						
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_productuse(useid,producttype,usetype,usedate,amountused,whoused,productiontime ) 
	VALUES ('$useid','$producttype','$usetype','$usedate','$amountused','$whoused','$useproductiontime')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>