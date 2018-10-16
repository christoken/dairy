<?php
include "db.php";
 $data=array();
 $buyerid=$_POST['buyerid']; 
 $unpaid="no";  $sqry="";
 
   $sqry="SELECT
    cast(tbl_yagan_productsale.saledate as date) AS saledate,
    tbl_yagan_productsale.productsaleID AS productsaleID,
	tbl_yagan_productsale.Producttype AS Producttype,
	(SELECT buyername FROM tbl_yagan_buyer WHERE Buyerid='$buyerid') As buyername,
	tbl_yagan_productsale.salesperson AS salesperson,
	tbl_yagan_productsale.saleamount AS saleamount,
	tbl_yagan_productsale.saleprice AS saleprice,
    tbl_yagan_productsale.totalamount AS totalamount	  	
FROM
    tbl_yagan_productsale    
WHERE
	tbl_yagan_productsale.BuyerID='$buyerid'
	AND tbl_yagan_productsale.paid='$unpaid'";
	
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
//This independent of the selection
echo json_encode($data);
?>


