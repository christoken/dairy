<?php
//include("auth.php");
include("db.php");
//This file is for saving an new animal
	$data=""; $sql1=""; $sql2="";$sql3="";$result;$result1;
		$breedtype=$_POST['breedtype'];
		$animalname=$_POST['animalname'];
		$animalid=$_POST['animalid'];
		$calfid=$_POST['calfid'];
		$DoB=$_POST['DoB'];
		$bodycolor=$_POST['bodycolor'];
		$bodyweight=$_POST['bodyweight'];
		$potentialyield=$_POST['potentialyield'];
		$producttype=$_POST['producttype'];
		$animalgeder=$_POST['animalgeder'];	
		$animalsource=$_POST['animalsource'];	
		$value=$_POST['animalvalue'];			
		$da=date("Y-m-d");
		$active="no";
		
		$sql1="INSERT INTO tbl_yagan_animal(Animal_ID,calfid,Animal_Name,DoB,Breed_type,
		Breed_product,Potential_yield,Bodyweight,Color,dateadmitted,animalgender,animalsource,value,culled) 
		VALUES ('$animalid','$calfid','$animalname','$DoB','$breedtype','$producttype',
		'$potentialyield','$bodyweight','$bodycolor','$da','$animalgeder','$animalsource','$value',
		'$active')";
		
		$sql2="INSERT INTO tbl_yagan_animalfamily 
				(animalID,hybridlevel,cowdam,cowsire,maternalgranddam,paternalgranddam,maternalgrandsire,paternalgrandsire)
		SELECT 
			calfID,hybridlevel,AnimalID,calfcowsire,calfmaternalgranddam,calfpaternalgranddam,calfmaternalgrandsire,calfpaternalgrandsire
		FROM 
			tbl_yagan_animalcalvingrecord 
		WHERE tbl_yagan_animalcalvingrecord.calfID ='$calfid'";
		
		$sql3="UPDATE  tbl_yagan_animalcalvingrecord SET winned='yes' WHERE calfID='$calfid'";
				
		if($animalsource=="Calving"){	// if we are winning, we need to indicate that it has been winned	
			$result=mysqli_query($con,$sql1);			
			$result1=mysqli_query($con,$sql2);			
			$result2=mysqli_query($con,$sql3);
			
		}else{// otherwise animal is from another source
				$result=mysqli_query($con,$sql1);
		}	
	if (!$result){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>