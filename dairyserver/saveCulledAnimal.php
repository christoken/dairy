<?php
//include("auth.php");
include("db.php");
//This file is for saving an new animal

	$data="";
				
		$animalid=$_POST['animal_id'];
		$dateculled=$_POST['dateculled'];
		$cullreasons=$_POST['cullreasons'];
		$cullanimalvalue=$_POST['cullanimalvalue'];			
		$culled="yes";
		
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_culling(Animal_ID,cullreason,cullanimalvalue,culldate) 
	VALUES ('$animalid','$cullreasons','$cullanimalvalue','$dateculled')");
	
	$result2=mysqli_query($con,"UPDATE tbl_yagan_animal SET culled='$culled' WHERE Animal_ID='$animalid'"); 

	
	if (!$result2){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>