<?php

include("db.php");
$type="DIT001";
$type=$_POST['type'];	
$sqry="SELECT typecode,description FROM tbl_yagan_configitems WHERE type='$type'";

$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>