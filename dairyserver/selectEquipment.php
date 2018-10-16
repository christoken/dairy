<?php
include("db.php");
$sqry="SELECT  equipment_id,equipment_name FROM tbl_yagan_equipmentacquisition";
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>