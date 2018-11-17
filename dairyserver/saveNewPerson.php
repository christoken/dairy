<?php
//include("auth.php");
include("db.php");
//This file is for saving an new animal

	$data="";				
		$Worktype=$_POST['Worktype'];
		$workerID=$_POST['workerID'];
		$Surname=$_POST['Surname'];
		$FirstName=$_POST['FirstName'];
		$OtherNames=$_POST['OtherNames'];
		$IDCard=$_POST['IDCard'];
		$personempdate=$_POST['personempdate'];
		$DoB=$_POST['DoB'];
		$Gender=$_POST['Gender'];
		$JobGrade=$_POST['JobGrade'];	
		$da=date("Y-m-d");
		$salary=$_POST['salary'];
		$removed="no";	
		
	$result1=mysqli_query($con,"INSERT INTO tbl_yagan_farmworkers(workerID, Surname,FirstName,OtherNames,IDCard,personempdate,DoB,Gender,JobGrade,Worktype,empdate,salary,removed) 
	VALUES ('$workerID','$Surname','$FirstName','$OtherNames','$IDCard','$personempdate','$DoB','$Gender','$JobGrade','$Worktype','$da','$salary','$removed')");
	
	if (!$result1){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>