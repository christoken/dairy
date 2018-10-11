<?php
include("db.php");
$status="active";
$sqry="SELECT providerID,Providername FROM tbl_yagan_serviceprovider WHERE status='$status'";
$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>