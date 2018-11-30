<?php
session_start();
$newdbname=$_SESSION['orgtel'];
//echo $newdbname;
$con = mysqli_connect('localhost','root','Threemodern789',$newdbname);
if (mysqli_connect_errno()) {
  echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
  }  
 ?>