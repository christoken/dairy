<?php
	include("dbreg.php");
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }	
	$logedin=$_SESSION['org'];
	//echo ($logedin);
	$sqry="SELECT organization,orgtel,endtrialdate FROM tbl_yagan_user WHERE organization='$logedin'";
	$q=mysqli_query($con,$sqry);
	while ($row=mysqli_fetch_object($q)){
	 $data[]=$row;
	}
	echo json_encode($data);
?>