<?php
include("db.php");
 
$sqry="SELECT DISTINCT (feedtype),description 
FROM tbl_yagan_consumablesstock, tbl_yagan_feedtype 
WHERE tbl_yagan_consumablesstock.ConsumableID=tbl_yagan_feedtype.feedtype ";
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>