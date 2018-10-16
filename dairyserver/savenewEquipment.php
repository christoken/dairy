<?php
//include("auth.php");
include("db.php");
//This file is for savibg breeding serviceprovider
				$data="";$sql="";				
				$equipment_id = $_POST['equipment_id'];
				$equipment_name = $_POST['equipment_name'];
				$equipment_type = $_POST['equipment_type'];
				$equipment_cost = $_POST['equipment_cost'];
				$equipment_date = $_POST['equipment_date'];
				$acquisition_type = $_POST['acquisition_type'];
				$equipment_condition = $_POST['equipment_condition'];
				$equipment_life = $_POST['equipment_life'];
				$equipment_operator = $_POST['equipment_operator'];
				$equipment_use = $_POST['equipment_use'];	
			
			$sql="INSERT INTO tbl_yagan_equipmentacquisition (
			equipment_id,equipment_name ,equipment_type,equipment_cost,equipment_date,acquisition_type,
			equipment_condition,equipment_life,equipment_operator,equipment_use)
			VALUES ('$equipment_id','$equipment_name' ,'$equipment_type','$equipment_cost',
			'$equipment_date','$acquisition_type','$equipment_condition','$equipment_life',
			'$equipment_operator','$equipment_use')";
			
			$result1=mysqli_query($con,$sql);
					
				
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>