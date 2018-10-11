<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";	
	 	 	
		$BuyerID=$_POST['BuyerID'];
		$saleproducttype=$_POST['saleproducttype'];
		$saleprice=$_POST['saleprice'];
		$saleamount=$_POST['saleamount'];
		$saledate=$_POST['saledate'];
		$salesperson=$_POST['salesperson'];
		$modeofpay=$_POST['modeofpaymenttype'];	
		$termsofpay=$_POST['termsofpaymenttype'];			
		$totalamount=	$saleprice * $saleamount;
		$productsaleID=$BuyerID.$saleproducttype.$saledate;
		$paid="no";
		
						
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_productsale(productsaleID,BuyerID,Producttype,saledate,saleamount,saleprice,salesperson,modeofpay,termsofpay,totalamount,paid) 
	VALUES ('$productsaleID','$BuyerID','$saleproducttype','$saledate','$saleamount','$saleprice','$salesperson','$modeofpay','$termsofpay','$totalamount','$paid')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>