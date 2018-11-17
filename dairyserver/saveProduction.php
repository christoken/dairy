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
			$Productprice=0;	
	$rproductprice=mysqli_query($con,"SELECT Productprice FROM tbl_yagan_productype 
			WHERE Productid='$productiontype'"); 
		if (mysqli_num_rows($rproductprice) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($rproductprice)) {
		//$ids=$row["product_id"];
		$Productprice =$row["Productprice"];		
		}
	} else {
    echo "0 results";
}				
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_production(productionid,productiondate,animalID,producttype,productqnty,totalprice,comments,productiontime) 
	VALUES ('$productionid','$productiondate','$animalID','$productiontype','$productqnty','$Productprice','$productioncomments','$productiontime')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>