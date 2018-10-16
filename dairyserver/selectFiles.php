<?php
include "db.php";
 $data=array();
 $downfile_type=$_POST['downfile_type']; 
  $fromdate=$_POST['fromdate']; 
  $todate=$_POST['todate'];  
 //$downfile_type="Receipt"; 
 // $fromdate="2018-10-08"; 
 // $todate="2018-10-12"; 
 $sqry="";
 
   $sqry="SELECT
    cast(tbl_yagan_documentmngt.upload_date as date) AS upload_date,
    tbl_yagan_documentmngt.SNo AS SNo,
	tbl_yagan_documentmngt.name AS name,	
	tbl_yagan_documentmngt.filename AS filename,
	tbl_yagan_documentmngt.file_name AS file_name	
FROM
    tbl_yagan_documentmngt    
WHERE
	tbl_yagan_documentmngt.file_type='$downfile_type'
	AND cast(tbl_yagan_documentmngt.upload_date as date) BETWEEN '$fromdate' AND '$todate'";
	
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
//This independent of the selection
echo json_encode($data);
?>


