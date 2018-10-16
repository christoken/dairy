<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data="";$sql="";				
				$equipID = $_POST['equipID'];
				$Servicedate = $_POST['Servicedate'];
				$serviceprovider = $_POST['serviceprovider'];
				$servicecost = $_POST['servicecost'];
				$servicetype = $_POST['servicetype'];
				$servicedescription = $_POST['servicedescription'];
				$servicereasons = $_POST['servicereasons'];
		
			$sql="INSERT INTO tbl_yagan_equipmentservice (
			EquipmentID,Servicedate,serviceprovider,servicecost,servicetype,servicedescription ,
			servicereasons)
			VALUES ('$equipID','$Servicedate' ,'$serviceprovider','$servicecost',
			'$servicetype','$servicedescription','$servicereasons')";
			
			$result1=mysqli_query($con,$sql);
					
				
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>