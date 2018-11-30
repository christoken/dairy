<?php
include("db.php");
//$type1=$_POST['type1'];	
//$type2=$_POST['type2'];	
//$sqry="SELECT typecode,description FROM tbl_yagan_configitems WHERE type='$type1' || type='$type2' ";
$sqry="SELECT Consumabletype,description FROM tbl_yagan_consumablestypes";
	
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>