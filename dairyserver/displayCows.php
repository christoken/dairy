<?php
include "db.php";
 $data=array();
 $animalid=$_POST['animalid'];
 $calfID=$_POST['calfid'];
$a=$_POST['from'];
 $b=$_POST['to'];
 $reportype=$_POST['reportype'];
$specificreport=$_POST['specificreport'];
/*
 $specificreport="FeedProduction";
 $animalid="AN002";
 $a="2018-08-09";
 $b="2018-09-20";
 */
 //$feedorproduction=$_POST['feedorproduction']; 
 $itemcode='DIT001'; //for breed at the configitems table
 $itemcodefeed="DIT008";
 $culled="yes";
 $winned="no";
$sqry="";$sqry1="";$sqry2="";$sqry3="";
 

 if($reportype=="Cows"){
// select cows without any conditions
if($specificreport=="List Cows"){
if ($a==""){ //if the date admitted is not provided
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
   tbl_yagan_itemtypes.itemcode='$itemcode' 
   AND tbl_yagan_itemtypes.itemcode=tbl_yagan_configitems.type 
   AND tbl_yagan_configitems.typecode=tbl_yagan_animal.Breed_type
GROUP BY
    tbl_yagan_animal.Breed_type   
ORDER BY
    tbl_yagan_animal.dateadmitted";
	}
	else{
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
}
else if($specificreport=="Culled"){
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
   tbl_yagan_animal.culled ='$culled'
   AND tbl_yagan_itemtypes.itemcode='$itemcode' 
   AND tbl_yagan_itemtypes.itemcode=tbl_yagan_configitems.type 
   AND tbl_yagan_configitems.typecode=tbl_yagan_animal.Breed_type
GROUP BY
    tbl_yagan_animal.Breed_type   
ORDER BY
    tbl_yagan_animal.dateadmitted";
}
elseif($specificreport=="Production"){ // production per cow or general production
	if ($animalid==""){// if the cow id is not there, query all the productions for all cows
		$sqry="SELECT
		tbl_yagan_production.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast( tbl_yagan_production.productiondate as date) AS productiondate,
		SUm(tbl_yagan_production.productqnty) AS productqnty,
		tbl_yagan_production.productiontime AS productiontime
	FROM 
		tbl_yagan_animal,
		tbl_yagan_animalbreed,
		tbl_yagan_production		
	WHERE
		
		cast( tbl_yagan_production.productiondate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_production.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		GROUP BY
		tbl_yagan_production.productiondate";
		
	}else{// if the cow id is  there, query  the productions for a specific cow
$sqry="SELECT
		tbl_yagan_production.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast( tbl_yagan_production.productiondate as date) AS productiondate,
		SUm(tbl_yagan_production.productqnty) AS productqnty,
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
		GROUP BY
		tbl_yagan_production.productiondate";
		
	}
}
elseif($specificreport=="Feeding"){ // Feeding per cow or general production
	if ($animalid==""){ // if the cow id is not there, query  the feed for all cows
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
		
        cast( tbl_yagan_feeding.feeddate as date) BETWEEN '$a' AND '$b'         	
		AND tbl_yagan_feeding.animal=tbl_yagan_animal.Animal_ID 
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		AND tbl_yagan_feeding.feedtype=tbl_yagan_feedtype.feedtype
GROUP BY 
		tbl_yagan_feeding.feeddate";
		
	}else{// if the cow id is  there, query  the Feed for a specific cow
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
		
}
}
elseif($specificreport=="Feed Vs Production"){

	
	$sqry1="SELECT
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
		
	
$sqry2="SELECT
		tbl_yagan_production.animalID AS Animal_ID,
		tbl_yagan_animal.Animal_Name AS Animal_Name,
		tbl_yagan_animal.Breed_type AS Breed_type,
		tbl_yagan_animalbreed.description AS description,	
		cast( tbl_yagan_production.productiondate as date) AS productiondate,
		SUm(tbl_yagan_production.productqnty) AS productqnty,
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
		GROUP BY
		tbl_yagan_production.productiondate";
	
	$sqry3="SELECT
		tbl_yagan_production.animalID AS Animal_ID,			
		cast( tbl_yagan_production.productiondate as date) AS productiondate,
		SUm(tbl_yagan_production.productqnty) AS productqnty,
		cast(tbl_yagan_feeding.feeddate as date) AS feeddate,
		SUM(tbl_yagan_feeding.feedqnty) AS feedqnty,	
		tbl_yagan_feedtype.description AS feedtype		
		
	FROM 
		tbl_yagan_animal,
		tbl_yagan_feeding,
		tbl_yagan_feedtype,
		tbl_yagan_production		
	WHERE
		tbl_yagan_production.animalID='$animalid'	
		AND cast( tbl_yagan_production.productiondate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_production.animalID=tbl_yagan_animal.Animal_ID
		AND	tbl_yagan_feeding.animal=tbl_yagan_animal.Animal_ID
		GROUP BY
		tbl_yagan_production.productiondate";
	
}

elseif($specificreport=="FeedProduction"){//This has been depricated for now.
	
	if ($feedorproduction=="Feedingreport"){
	
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
		cast( tbl_yagan_production.productiondate as date) AS productiondate,
		SUm(tbl_yagan_production.productqnty) AS productqnty,
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
		GROUP BY
		tbl_yagan_production.productiondate";
		}
	
}
else if($specificreport=="Breeding"){
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
else if($specificreport=="Calving"){
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
		AND tbl_yagan_animalcalvingrecord.animalID=tbl_yagan_animal.Animal_ID		
		AND tbl_yagan_animalbreed.Breedtype=tbl_yagan_animal.Breed_type
		ORDER BY
		tbl_yagan_animalcalvingrecord.calvingdate";
}
}
 } 
 else if($reportype=="Products"){ //Main selection is Products
	 if($specificreport=="Sales"){
	$sqry="SELECT
		cast(tbl_yagan_productsale.saledate as date) AS saledate,		
		tbl_yagan_productsale.Producttype AS Producttype,
		tbl_yagan_productsale.salesperson AS salesperson,
		tbl_yagan_productsale.saleamount AS saleamount,
		tbl_yagan_productsale.saleprice AS saleprice,	
		tbl_yagan_productsale.totalamount AS totalamount,
		tbl_yagan_productsale.paid AS paid,
		tbl_yagan_buyer.buyername AS buyername	
	FROM 
		tbl_yagan_productsale,
		tbl_yagan_buyer			
	WHERE
		cast( tbl_yagan_productsale.saledate as date) BETWEEN '$a' AND '$b'
		AND tbl_yagan_buyer.Buyerid=tbl_yagan_productsale.Buyerid			
		ORDER BY
		tbl_yagan_productsale.saledate";
	 }
	 else if($specificreport=="Usage"){
		$sqry="SELECT		
		cast(tbl_yagan_productuse.usedate as date) AS usedate,		
		tbl_yagan_productuse.usetype AS usetype,
		tbl_yagan_productuse.whoused AS whoused,
		tbl_yagan_productuse.amountused AS amountused,			
		tbl_yagan_productuse.productiontime AS productiontime			
	FROM 
		tbl_yagan_productuse			
	WHERE
		cast( tbl_yagan_productuse.usedate as date) BETWEEN '$a' AND '$b'				
		ORDER BY
		tbl_yagan_productuse.usedate" ;
		}
 }
 else if($reportype=="Consumables"){ //Main selection is Products
	if($specificreport=="Stock"){
	$sqry="SELECT									
		DISTINCT(cast(tbl_yagan_consumablesstock.stockdate as date)) AS stockdate,		
		tbl_yagan_consumablesstock.stockqnty AS stockqnty,
		tbl_yagan_consumablesstock.itemprice AS itemprice,
		tbl_yagan_consumablesstock.itembrandname AS itembrandname,
		tbl_yagan_consumablesstock.itemname AS itemname,
		tbl_yagan_consumablesstock.currentstock AS currentstock,		
		tbl_yagan_consumablesstock.reorderlevel AS reorderlevel,			
		tbl_yagan_consumablesstock.consumabletype AS consumabletype		
	FROM 
		tbl_yagan_consumablesstock				
	WHERE
		cast( tbl_yagan_consumablesstock.stockdate as date) BETWEEN '$a' AND '$b'				
		ORDER BY
		tbl_yagan_consumablesstock.stockdate";
	 }
	 if($specificreport=="Re-Order"){
		 $sqry="SELECT		
		DISTINCT(cast(tbl_yagan_consumablesstock.stockdate as date)) AS stockdate,		
		tbl_yagan_consumablesstock.stockqnty AS stockqnty,
		tbl_yagan_consumablesstock.itemprice AS itemprice,
		tbl_yagan_consumablesstock.itembrandname AS itembrandname,
		tbl_yagan_consumablesstock.itemname AS itemname,
		tbl_yagan_consumablesstock.currentstock AS currentstock,
		tbl_yagan_serviceprovider.Providername AS Providername,
		tbl_yagan_serviceprovider.Telephone AS Telephone,		
		tbl_yagan_consumablesstock.reorderlevel AS reorderlevel,			
		tbl_yagan_consumablesstock.consumabletype as consumabletype
		
	FROM 
		tbl_yagan_consumablesstock,
		tbl_yagan_consumablestypes,
		tbl_yagan_serviceprovider		
	WHERE
			tbl_yagan_consumablesstock.currentstock<=tbl_yagan_consumablesstock.reorderlevel		
		AND tbl_yagan_serviceprovider.providerID=tbl_yagan_consumablesstock.providerid
		
		ORDER BY
		tbl_yagan_consumablesstock.stockdate";
	 }
 }
 else if($reportype=="Services"){ //Main selection is Services
	$empty="";	
	if($specificreport=="Animal Services"){
		
	$sqry="SELECT									
		tbl_yagan_servicestypes.description	AS servicetype,
		tbl_yagan_services.servicedescription AS servicedescription,
		cast(tbl_yagan_services.servicedate as date) AS servicedate,
		tbl_yagan_animal.Animal_Name AS animalname,		
		tbl_yagan_serviceprovider.Providername AS serviceprovider,
		tbl_yagan_services.serviceprice AS serviceprice	
	FROM 
		tbl_yagan_services,
		tbl_yagan_animal,
		tbl_yagan_servicestypes,
		tbl_yagan_serviceprovider		
	WHERE
			tbl_yagan_services.animal!='$empty'
			AND cast( tbl_yagan_services.servicedate as date) BETWEEN '$a' AND '$b'
			AND tbl_yagan_services.servicetype=tbl_yagan_servicestypes.servicetype
			AND tbl_yagan_services.animal=tbl_yagan_animal.Animal_ID
			AND tbl_yagan_services.serviceprovider=tbl_yagan_serviceprovider.providerID
		ORDER BY
		tbl_yagan_services.servicedate";
	 }
	 if($specificreport=="Calf Services"){
		$sqry="SELECT									
		tbl_yagan_servicestypes.description	AS servicetype,
		tbl_yagan_services.servicedescription AS servicedescription,
		cast(tbl_yagan_services.servicedate as date) AS servicedate,
		tbl_yagan_animalcalvingrecord.calfName AS calfname,		
		tbl_yagan_serviceprovider.Providername AS serviceprovider,
		tbl_yagan_services.serviceprice AS serviceprice	
	FROM 
		tbl_yagan_services,
		tbl_yagan_animalcalvingrecord,
		tbl_yagan_servicestypes,
		tbl_yagan_serviceprovider		
	WHERE
			tbl_yagan_services.calfid!='$empty'
			AND cast( tbl_yagan_services.servicedate as date) BETWEEN '$a' AND '$b'
			AND tbl_yagan_services.servicetype=tbl_yagan_servicestypes.servicetype
			AND tbl_yagan_services.calfid=tbl_yagan_animalcalvingrecord.calfID
			AND tbl_yagan_services.serviceprovider=tbl_yagan_serviceprovider.providerID
		ORDER BY
		tbl_yagan_services.servicedate";
	 }
 }
 else if($reportype=="History"){ //Main selection is history
	$empty="";	
	if($specificreport=="Animal History"){
		 if($animalid!="")	{	
	$sqry="SELECT									
		tbl_yagan_animal.Animal_Name AS animalname,
		tbl_yagan_animalfamily.hybridlevel AS hybridlevel,
		tbl_yagan_animalfamily.cowdam AS cowdam,
		tbl_yagan_animalfamily.cowsire	AS cowsire,
		tbl_yagan_animalfamily.maternalgranddam AS maternalgranddam,
		tbl_yagan_animalfamily.paternalgranddam AS paternalgranddam,
		tbl_yagan_animalfamily.maternalgrandsire AS maternalgrandsire,
		tbl_yagan_animalfamily.paternalgrandsire AS paternalgrandsire		
	FROM 
		tbl_yagan_animalfamily,
		tbl_yagan_animal
		
	WHERE
			tbl_yagan_animalfamily.animalID='$animalid'			
			AND tbl_yagan_animalfamily.animalID=tbl_yagan_animal.Animal_ID";
	 }
	 else{
		 $sqry="SELECT									
		tbl_yagan_animal.Animal_Name AS animalname,
		tbl_yagan_animalfamily.hybridlevel AS hybridlevel,
		tbl_yagan_animalfamily.cowdam AS cowdam,
		tbl_yagan_animalfamily.cowsire	AS cowsire,
		tbl_yagan_animalfamily.maternalgranddam AS maternalgranddam,
		tbl_yagan_animalfamily.paternalgranddam AS paternalgranddam,
		tbl_yagan_animalfamily.maternalgrandsire AS maternalgrandsire,
		tbl_yagan_animalfamily.paternalgrandsire AS paternalgrandsire		
	FROM 
		tbl_yagan_animalfamily,
		tbl_yagan_animal
	WHERE
		tbl_yagan_animalfamily.animalID=tbl_yagan_animal.Animal_ID";
	 }
	}
	 else if($specificreport=="Calf History"){
		 if($calfID!="")	{						
		$sqry="SELECT									
		tbl_yagan_animalcalvingrecord.calfID AS calfID,
		tbl_yagan_animalcalvingrecord.calfName AS calfName,
		tbl_yagan_animalcalvingrecord.hybridlevel AS hybridlevel,		
		tbl_yagan_animalcalvingrecord.calfcowsire AS calfcowsire,
		tbl_yagan_animalcalvingrecord.calfmaternalgranddam AS calfmaternalgranddam,
		tbl_yagan_animalcalvingrecord.calfpaternalgranddam AS calfpaternalgranddam,
		tbl_yagan_animalcalvingrecord.calfmaternalgrandsire AS calfmaternalgrandsire,
		tbl_yagan_animalcalvingrecord.calfmaternalgrandsire AS calfpaternalgrandsire		
	FROM 
		tbl_yagan_animalcalvingrecord
		
		
	WHERE
			tbl_yagan_animalcalvingrecord.calfID='$calfID'
			AND tbl_yagan_animalcalvingrecord.winned='$winned'";
			}
			else{// no calf id provided
				$sqry="SELECT									
		tbl_yagan_animalcalvingrecord.calfID AS calfID,
		tbl_yagan_animalcalvingrecord.calfName AS calfName,
		tbl_yagan_animalcalvingrecord.hybridlevel AS hybridlevel,		
		tbl_yagan_animalcalvingrecord.calfcowsire AS calfcowsire,
		tbl_yagan_animalcalvingrecord.calfmaternalgranddam AS calfmaternalgranddam,
		tbl_yagan_animalcalvingrecord.calfpaternalgranddam AS calfpaternalgranddam,
		tbl_yagan_animalcalvingrecord.calfmaternalgrandsire AS calfmaternalgrandsire,
		tbl_yagan_animalcalvingrecord.calfmaternalgrandsire AS calfpaternalgrandsire		
	FROM 
		tbl_yagan_animalcalvingrecord
		
		
	WHERE
			
			tbl_yagan_animalcalvingrecord.winned='$winned'";
			}
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
$dataproduction[]=array(); $datafeed[]=array();$dataprodfeed[]=array();
	if($specificreport=="Feed Vs Production"){
		$q1=mysqli_query($con,$sqry1);
		while ($row1=mysqli_fetch_object($q1)){
		$datafeed[]=$row1;
		}
		$q2=mysqli_query($con,$sqry2);
		while ($row2=mysqli_fetch_object($q2)){
		$dataproduction[]=$row2;		
		}
		$q3=mysqli_query($con,$sqry3);
		while ($row3=mysqli_fetch_object($q3)){
		$dataprodfeed[]=$row3;		
		}
		
		echo json_encode(Array($datafeed,$dataproduction,$dataprodfeed));
	}else{
		$q=mysqli_query($con,$sqry);
		while ($row=mysqli_fetch_object($q)){
		$data[]=$row;
}
//This independent of the selection
echo json_encode($data);
	}
?>

