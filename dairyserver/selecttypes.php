<?php

include("db.php");

$sqry="SELECT * FROM tbl_yagan_itemtypes";

$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>