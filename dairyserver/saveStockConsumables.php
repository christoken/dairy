<?php
//include("auth.php");
include("db.php");
//This file is for saving an new buyer
	$data="";		 	 		
		$ConsumableID=$_POST['ConsumableID'];
		$Consumabletype=$_POST['Consumabletype'];
		$stockqnty=$_POST['stockqnty'];
		$stockdate=$_POST['stockdate'];
		$serviceproviderid=$_POST['serviceproviderid'];
		$itembrandname=$_POST['itembrandname'];
		$itemprice=$_POST['itemprice'];
		$itemname=$_POST['itemname'];		
		$currentstock=0;
		//Get the current stock from the current stock table.
		$result=mysqli_query($con,"SELECT ConsumableID,Consumabletype,currentstock  
		FROM tbl_yagan_consumablesstock WHERE ConsumableID='$ConsumableID' AND Consumabletype='$Consumabletype'");
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		//$ids=$row["product_id"];
		$currentstock =$row["currentstock"];
		}
	} else {
    echo "0 results";
}
	$totalstock=	$currentstock + $stockqnty;
					
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_consumablesstock(ConsumableID,Consumabletype,stockqnty,currentstock,stockdate,
	providerid,itembrandname,itemprice,itemname) 
	VALUES ('$ConsumableID','$Consumabletype','$stockqnty','$totalstock','$stockdate','$serviceproviderid','$itembrandname','$itemprice','$itemname')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>