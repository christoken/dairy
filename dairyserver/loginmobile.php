<?php
//include("auth.php");
include("dbreg.php");
//$con = mysqli_connect('localhost','root','Threemodern789','db_0722977672_dairy');
if (mysqli_connect_errno()) {
  echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
  } 
 	$username=$_POST['username'];
	$password=$_POST['password'];
	$org=$_POST['organization'];
	$today=date('Y-m-d');
	$trial="no";
//$json_data_array = array();
$json_data_array = "";

  $sqry="SELECT * FROM tbl_yagan_user
  WHERE
	username='$username' 
	AND organization='$org' 
	AND password='".md5($password)."'
	AND (endtrialdate >'$today' OR trial='$trial')
	AND verified='1'
	";

  $result=mysqli_query($con,$sqry);
  // Return the number of rows in result set
  $orgtel='';$pc=''; $userlevel=''; $trial='';
  $rowcount=mysqli_num_rows($result);
  
  while($row = $result->fetch_assoc()){		
		$orgtel = $row['orgtel'];
		$pc = $row['passwordchange'];
		$userlevel=	$row['userlevel'];
		$trial=$row['trial'];
		
  }
  if($rowcount>0){
  $json_data_array="success";
  if(!isset($_SESSION)) { // if the session is not started, start it
        session_start(); 
    }
    else{ // otherwise destroy and restart
        session_destroy();
        session_start(); 
    }
	 //create database for the new dairy	
	 //check if the database exist, otherwise create and populate
	 if($userlevel==9){
	$db_selected = mysqli_select_db($con,"db_".$orgtel."_dairy");
		if (!$db_selected) {
		//Database does not exist--create and populate
			$newdb=createDB("db_".$orgtel."_dairy");
			populateDB($newdb); //call create and populate DB at once
		}
			
	}
	$_SESSION["org"]=$org;
	$_SESSION["orgtel"] = "db_".$orgtel."_dairy";
	$_SESSION["login"] = $username;
	$json_data_array=$_SESSION["login"]."_".$pc."_".$trial."_".$org ;
	//echo $_SESSION['a'];
  }
  else{
	 if(!isset($_SESSION)) { 
		session_start(); 
	 }
	  //  $json_data_array="Failer";
		$_SESSION["login"] = "";		
		$json_data_array=$_SESSION["login"];
		}		
 
 //function to create and populate database
	function createDB($dbname){
		$con =mysqli_connect('localhost', 'root', 'Threemodern789');
		$query="CREATE DATABASE IF NOT EXISTS ".$dbname;
		$tr=$con->query($query);
		return $dbname;	
		}
	function populateDB($dbname){
		//echo $dbname;
		$con =mysqli_connect('localhost', 'root', 'Threemodern789', $dbname);
		$query = '';
		$sqlScript = file('db_0722977672_dairy.sql');
		foreach ($sqlScript as $line)	{	
		$startWith = substr(trim($line), 0 ,2);
		$endWith = substr(trim($line), -1 ,1);	
		if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
			continue;
			}		
	$query = $query . $line;
	if ($endWith == ';') {
		mysqli_query($con,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		$query= '';		
	}
	}
}
   mysqli_free_result($result);
  echo json_encode($json_data_array);
?>

