<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";
		$animalID=$_POST['feedinganimalID'];
		$feedtype=$_POST['feedtype'];
		$feedingtime=$_POST['feedingtime'];
		$feedqnty=$_POST['feedqnty'];
		$feedingid=$_POST['feedingid'];
		$feedingcomments=$_POST['feedingcomments'];
		$feeddate=$_POST['feeddate'];	
		$currentstock=0;
		$stockid=-1;	
		$itemprice=0;
		
		$rstockprice=mysqli_query($con,"SELECT itemprice FROM tbl_yagan_consumablesstock 
			WHERE ConsumableID='$feedtype' ORDER BY stockid Asc"); 
		if (mysqli_num_rows($rstockprice) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($rstockprice)) {
		//$ids=$row["product_id"];
		$itemprice =$row["itemprice"];		
		}
	} else {
    echo "0 results";
}
		$consumedcost=$itemprice*$feedqnty;
		
	$sql="INSERT INTO tbl_yagan_feeding(feedingid,feedtype,animal,feeddate,feedqnty,feedingtime,
	feedingcomments,consumedcost) 
	VALUES ('$feedingid','$feedtype','$animalID','$feeddate','$feedqnty','$feedingtime',
	'$feedingcomments','$consumedcost')";			
	
	$result1=mysqli_query($con,$sql);
		
//Here we reduce the stock in the consumable stock
//Get the current stock from the current stock table.
		$result=mysqli_query($con,"SELECT stockid,ConsumableID,currentstock  
		FROM tbl_yagan_consumablesstock WHERE ConsumableID='$feedtype' 
		ORDER BY stockid Asc"); // order in ascending so that it can get the latest stock record
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		//$ids=$row["product_id"];
		$currentstock =$row["currentstock"];
		$stockid =$row["stockid"];
		}
	} else {
    echo "0 results";
}
	$totalstock=	$currentstock - $feedqnty;
	//// reduce stock by the amount used to feed.
	$result2=mysqli_query($con,"UPDATE tbl_yagan_consumablesstock SET currentstock='$totalstock'
		WHERE stockid='$stockid'");

		if (!$result1 || !$result2) { $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>