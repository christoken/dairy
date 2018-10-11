<?php

include("db.php");
$winned="no";
$sqry="SELECT calfID,calfName FROM tbl_yagan_animalcalvingrecord WHERE winned='$winned'";
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>