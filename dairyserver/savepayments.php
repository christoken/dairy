<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data="";$sql="";
				$date=date("Y-m-d");
				$unpaid="yes";				
				$myArray = $_POST['salesids'];
				
//$myArray[0]='Buyer002Milk2018-10-04';
//$myArray[1]='Buyer002Milk2018-10-08';				
			foreach ($myArray as $value) {				
			$sql="INSERT INTO tbl_yagan_salespayments (
			productsaleID,Amountpaid ,datepaid)
			VALUES ('$value',(SELECT totalamount FROM tbl_yagan_productsale WHERE productsaleID='$value') ,'$date')";
					$result1=mysqli_query($con,$sql);
					$sql2="UPDATE tbl_yagan_productsale SET paid='$unpaid' WHERE productsaleID='$value'";
					$result2=mysqli_query($con,$sql2);
				}
			
			   
	
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>