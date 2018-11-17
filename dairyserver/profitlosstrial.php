<?php
$con = mysqli_connect('localhost','root','chep','db_0722977672_dairy');
if (mysqli_connect_errno()) {
  echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
  } 
  else {echo "Not much ";
  }
  //Truncate
 $sqldelete= "TRUNCATE TABLE tbl_yagan_profitloss";
 $r=mysqli_query($con,$sqldelete);
 
  //select productionn dates
$sql="SELECT productiondate FROM tbl_yagan_production WHERE productiondate BETWEEN '2018-08-10' AND '2018-11-10'
GROUP BY YEAR(productiondate), MONTH(productiondate)";
	
	$result=mysqli_query($con,$sql);
	
	while($row = $result->fetch_assoc()) {		
		$month = date('m-Y', strtotime($row['productiondate']));
		$sql1="INSERT INTO tbl_yagan_profitloss (month) VALUES ('$month')";
		$result1=mysqli_query($con,$sql1);	
		echo "Month is \n". $month;			
		}
	// update table profitloss based on the selection
	$sql2="SELECT month FROM tbl_yagan_profitloss";	
	$result2=mysqli_query($con,$sql2);
	
	while($row = $result2->fetch_assoc()){		
		$month = $row['month'];
		$date=explode("-", $month);
		$m=$date[0];
		$y=$date[1];
		echo ($m ."\r\n". $y);
		// update table profitloss with total production based on the selection
		$sql3="UPDATE tbl_yagan_profitloss SET totalprod= 
		(SELECT SUM(totalprice) FROM  tbl_yagan_production WHERE YEAR(productiondate)='$y' 
		AND MONTH(productiondate)='$m')
		WHERE month='$month'";
		
		// update table profitloss with total services based on the selection
		$sql4="UPDATE tbl_yagan_profitloss SET totalservice= 
		(SELECT SUM(serviceprice) FROM  tbl_yagan_services WHERE YEAR(servicedate)='$y' 
		AND MONTH(servicedate)='$m')
		WHERE month='$month'";
	 
	 // update table profitloss with total Feeding based on the selection
		$sql5="UPDATE tbl_yagan_profitloss SET totalfeed= 
		(SELECT SUM(consumedcost) FROM  tbl_yagan_feeding WHERE YEAR(feeddate)='$y' 
		AND MONTH(feeddate)='$m')
		WHERE month='$month'";
		// update table profitloss with total labour based on the selection
		$sql6="UPDATE tbl_yagan_profitloss SET labourcost= 
		(SELECT (SUM(salary)/(SELECT ROUND(TIMESTAMPDIFF(month, '2018-08-25', '2018-11-25')))) 
		FROM  tbl_yagan_farmworkers,tbl_yagan_production WHERE YEAR(productiondate)='$y' 
		AND MONTH(productiondate)='$m')
		WHERE month='$month'";		
		$result3=mysqli_query($con,$sql3);
		$result4=mysqli_query($con,$sql4);
		$result5=mysqli_query($con,$sql5);
		$result6=mysqli_query($con,$sql6);			
				
		}
		
		
		
?>