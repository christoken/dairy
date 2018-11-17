<?php
include "db.php";
 $data=array();
$a="2018-06-09";
 $b="2018-11-20";
 $animalid="AN002";
//populate the temporary table first
	/////////////////////////////////////////////////////////////////////////////////
			$sqldelete= "TRUNCATE TABLE tbl_yagan_profitloss";
	$r=mysqli_query($con,$sqldelete); 
  //select productionn dates
	$sql="SELECT productiondate,animalID,Animal_Name FROM tbl_yagan_production,tbl_yagan_animal  
	WHERE productiondate BETWEEN '$a' AND '$b'
	AND  tbl_yagan_production.animalID='$animalid'
	AND tbl_yagan_production.animalID=tbl_yagan_animal.Animal_ID
	GROUP BY YEAR(productiondate), MONTH(productiondate)";
	
	$result=mysqli_query($con,$sql);	
	while($row = $result->fetch_assoc()) {
	
		$month = date('m-Y', strtotime($row['productiondate']));
		$animalid=$row['animalID'];
		$animalname=$row['Animal_Name'];
		$sql1="INSERT INTO tbl_yagan_profitloss (month,animalid,animalname) 
		VALUES ('$month','$animalid','$animalname')";
		$result1=mysqli_query($con,$sql1);	
		//echo "Month is \n". $month;			
		}
	// update table profitloss based on the selection
	$sql2="SELECT month FROM tbl_yagan_profitloss";	
	$result2=mysqli_query($con,$sql2);
	$num_months = mysqli_num_rows($result2);
	
	while($row = $result2->fetch_assoc()){		
		$month = $row['month'];
		$date=explode("-", $month);
		$m=$date[0];
		$y=$date[1];
		//echo ($m ."\r\n". $y);
		// update table profitloss with total production based on the selection
		$sql3="UPDATE tbl_yagan_profitloss SET totalprod= 
		(SELECT SUM(totalprice) FROM  tbl_yagan_production WHERE YEAR(productiondate)='$y' 
		AND MONTH(productiondate)='$m' AND  tbl_yagan_production.animalID='$animalid')
		WHERE month='$month'";
		
		// update table profitloss with total services based on the selection
		$sql4="UPDATE tbl_yagan_profitloss SET totalservice= 
		(SELECT SUM(serviceprice) FROM  tbl_yagan_services WHERE YEAR(servicedate)='$y' 
		AND MONTH(servicedate)='$m' AND  tbl_yagan_services.animal='$animalid')
		WHERE month='$month'";
	 
	 // update table profitloss with total Feeding based on the selection
		$sql5="UPDATE tbl_yagan_profitloss SET totalfeed= 
		(SELECT SUM(consumedcost) FROM  tbl_yagan_feeding WHERE YEAR(feeddate)='$y' 
		AND MONTH(feeddate)='$m' AND  tbl_yagan_feeding.animal='$animalid')
		WHERE month='$month'";
		// update table profitloss with total labour based on the selection
		// we obtain the number of months by reading the number of rows of the table which
		//keeps the summary. We then divide by the total number of cows asuming each cow consumes the same
		// Total salary is calculated by adding all salaries excluding those which have been removed
		$removed="no";
		$sql6="UPDATE tbl_yagan_profitloss SET labourcost= 
		(SELECT SUM(salary)/(SELECT COUNT(Animal_ID) FROM tbl_yagan_animal)
		FROM  tbl_yagan_farmworkers WHERE removed='$removed')
		WHERE month='$month'";	
		
		$result3=mysqli_query($con,$sql3);
		$result4=mysqli_query($con,$sql4);
		$result5=mysqli_query($con,$sql5);
		$result6=mysqli_query($con,$sql6);			
				
		}
	//////////////////////////////////////////////////////////////////////////////
		//now execute the query
		$sqry="SELECT	month, totalprod, totalservice,labourcost,totalfeed,animalid,animalname 				
			FROM tbl_yagan_profitloss							
			ORDER BY month";
		
	
		$q=mysqli_query($con,$sqry);
		while ($row=mysqli_fetch_object($q)){
		$data[]=$row;
}
//This independent of the selection
echo json_encode($data);
?>