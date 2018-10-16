<?php
include "db.php";
 $data=array();
 $animalid=$_POST['animalid'];
 $a=$_POST['from'];
 $b=$_POST['to'];
 $reportype=$_POST['reportype'];
 $feedorproduction=$_POST['feedorproduction']; 
 $itemcode='DIT001'; //for breed at the configitems table
 $itemcodefeed="DIT008";
$sqry="";
 
// select cows without any conditions
if($reportype=="List Cows"){
  $sqry="SELECT
    cast(tbl_yagan_animal.dateadmitted as date) AS dateadmitted,
    tbl_yagan_animal.Animal_ID AS Animal_ID,
    tbl_yagan_animal.Animal_Name AS Animal_Name,
    tbl_yagan_animal.Breed_type AS Breed_type,
    tbl_yagan_animal.Potential_yield AS Potential_yield,
    tbl_yagan_animal.DoB AS DoB,
	tbl_yagan_configitems.description AS description	
FROM
    tbl_yagan_animal,
    tbl_yagan_configitems,
	tbl_yagan_itemtypes    
WHERE
    cast(tbl_yagan_animal.dateadmitted as date) BETWEEN '$a' AND '$b'
   AND tbl_yagan_itemtypes.itemcode='$itemcode' 
   AND tbl_yagan_itemtypes.itemcode=tbl_yagan_configitems.type 
   AND tbl_yagan_configitems.typecode=tbl_yagan_animal.Breed_type
GROUP BY
    tbl_yagan_animal.Breed_type   
ORDER BY
    tbl_yagan_animal.dateadmitted";
}
elseif($reportype=="Feed Vs Production"){
	
if 	($feedorproduction=="Feedingreport"){
	
	$sqry="SELECT
	tbl_yagan_feeding.animal AS Animal_ID,
	cast(tbl_yagan_feeding.feeddate as date) AS feeddate,
	SUM(tbl_yagan_feeding.feedqnty) AS feedqnty,
	tbl_yagan_animal.Animal_Name AS Animal_Name,		
	tbl_yagan_animalbreed.description AS description,
	tbl_yagan_feedtype.description AS feedtype,	
	tbl_yagan_feeding.feedingtime AS feedingtime		
		
FROM    
		tbl_yagan_feeding,
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_feedtype
WHERE      
		 tbl_yagan_feeding.animal='$animalid'
         AND cast( tbl_yagan_feeding.feeddate as date) BETWEEN '$a' AND '$b'
         	
		AND tbl_yagan_feeding.animal=tbl_yagan_animal.Animal_ID 
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		AND tbl_yagan_feeding.feedtype=tbl_yagan_feedtype.feedtype
GROUP BY 
		tbl_yagan_feeding.feeddate";
	
}else if($feedorproduction=="Productionreport"){
	
$sqry="SELECT
		tbl_yagan_production.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast(tbl_yagan_production.productiondate as date) AS productiondate,
		tbl_yagan_production.productqnty AS productqnty,
		tbl_yagan_production.productiontime AS productiontime
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_production		
	WHERE
		tbl_yagan_production.animalID='$animalid'	
		AND cast( tbl_yagan_production.productiondate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_production.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_production.productiondate";
		}
	
}
else if($reportype=="Breeding"){
	if ($animalid==""){
		$sqry="SELECT
		tbl_yagan_animalbreedingservice.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast(tbl_yagan_animalbreedingservice.Servicedate as date) AS Servicedate,
		cast(tbl_yagan_animalbreedingservice.Estimatecalfdate as date) AS Estimatecalfdate,
		tbl_yagan_animalbreedingservice.servicetype AS servicetype		
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_animalbreedingservice		
	WHERE			
		cast( tbl_yagan_animalbreedingservice.Servicedate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_animalbreedingservice.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_animalbreedingservice.Servicedate";
		
	}
else{
	
    $sqry="SELECT
		tbl_yagan_animalbreedingservice.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast(tbl_yagan_animalbreedingservice.Servicedate as date) AS Servicedate,
		cast(tbl_yagan_animalbreedingservice.Estimatecalfdate as date) AS Estimatecalfdate,
		tbl_yagan_animalbreedingservice.servicetype AS servicetype		
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_animalbreedingservice		
	WHERE
		tbl_yagan_animalbreedingservice.animalID='$animalid'	
		AND cast( tbl_yagan_animalbreedingservice.Servicedate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_animalbreedingservice.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_animalbreedingservice.Servicedate";
}
}
else if($reportype=="Calving"){
	if ($animalid==""){
		$sqry="SELECT		
		tbl_yagan_animalcalvingrecord.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast(tbl_yagan_animalcalvingrecord.calvingdate as date) AS calvingdate,		
		tbl_yagan_animalcalvingrecord.calfID AS calfID,
		tbl_yagan_animalcalvingrecord.calfName AS calfName,
		tbl_yagan_animalcalvingrecord.aliveordead AS aliveordead,	
		tbl_yagan_animalcalvingrecord.sex AS sex		
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_animalcalvingrecord		
	WHERE			
		cast( tbl_yagan_animalcalvingrecord.calvingdate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_animalcalvingrecord.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_animalcalvingrecord.calvingdate";
		
	}
else{
	
    $sqry="SELECT
		tbl_yagan_animalcalvingrecord.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast(tbl_yagan_animalcalvingrecord.calvingdate as date) AS calvingdate,		
		tbl_yagan_animalcalvingrecord.calfID AS calfID,
		tbl_yagan_animalcalvingrecord.calfName AS calfName,
		tbl_yagan_animalcalvingrecord.aliveordead AS aliveordead,	
		tbl_yagan_animalcalvingrecord.sex AS sex		
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_animalcalvingrecord		
	WHERE
		tbl_yagan_animalcalvingrecord.animalID='$animalid'	
		AND cast( tbl_yagan_animalcalvingrecord.calvingdate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_animalcalvingrecord.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_animalcalvingrecord.calvingdate";
}
}
/*
////
	SELECT
		DISTINCT(tbl_yagan_feeding.animal) AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,		
		tbl_yagan_animalbreed.description AS description,
		cast(tbl_yagan_feeding.feeddate as date) AS feeddate,	
		tbl_yagan_feeding.feedqnty AS feedqnty,
		tbl_yagan_feeding.feedingtime AS feedingtime,		
		tbl_yagan_feedtype.description AS feedtype	
	FROM 
		tbl_yagan_animal,
		tbl_yagan_feeding,
		tbl_yagan_production,
		tbl_yagan_animalbreed,
		tbl_yagan_feedtype		
	WHERE
	tbl_yagan_feeding.animal='$animalid'	
	AND cast( tbl_yagan_feeding.feeddate as date) BETWEEN '$a' AND '$b'	
    AND tbl_yagan_feeding.animal=tbl_yagan_animal.Animal_ID 
	AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
	AND tbl_yagan_feeding.feedtype=tbl_yagan_feedtype.feedtype
	ORDER BY 
	 tbl_yagan_feeding.feeddate
*/
	
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
//This independent of the selection
echo json_encode($data);
?>

