<?php

include("db.php");
$sqry="SELECT Breedtype,description FROM tbl_yagan_animalbreed";

$q=mysqli_query($con,$sqry);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>