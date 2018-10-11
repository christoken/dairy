<?php
//include("auth.php");
include("db.php");
$username=$_POST['username'];
$password=$_POST['password'];


//$json_data_array = array();
$json_data_array = "";
  $sqry="SELECT * FROM tbl_yagan_user WHERE username='$username' AND password='".md5($password)."'";
	
 $result=mysqli_query($con,$sqry);
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
  $json_data_array="success";
  }
  else{
	  $json_data_array="Failer";	  
 }
   mysqli_free_result($result);
  echo json_encode($json_data_array);
?>

