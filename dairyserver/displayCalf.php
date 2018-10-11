<?php
include "db.php";
 $data=array();
 $calfID=$_POST['calfID']; 
$sqry="";
   $sqry="SELECT
    cast(tbl_yagan_animalcalvingrecord.calvingdate as date) AS calvingdate,
    tbl_yagan_animalcalvingrecord.AnimalID AS AnimalID,
	tbl_yagan_animalcalvingrecord.calfID AS calfID,
    tbl_yagan_animalcalvingrecord.calfName AS calfName,
	 tbl_yagan_animalcalvingrecord.calfbodycolor AS calfbodycolor,	
    tbl_yagan_animalcalvingrecord.calfbreedtype AS calfbreedtype,
    tbl_yagan_animalcalvingrecord.sex AS sex   	
FROM
    tbl_yagan_animalcalvingrecord    
WHERE
	tbl_yagan_animalcalvingrecord.calfID='$calfID'";
	
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
//This independent of the selection
echo json_encode($data);
?>


