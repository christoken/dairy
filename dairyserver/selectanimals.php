<?php

include("db.php");
$culled="no";
$sqry="SELECT Animal_ID,Animal_Name FROM tbl_yagan_animal WHERE culled='$culled'";
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>