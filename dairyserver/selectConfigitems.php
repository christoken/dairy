<?php

include("db.php");
//$type="DIT001";
$type=$_POST['type'];
$sql2="";	
//$sqry="SELECT typecode,description FROM tbl_yagan_configitems WHERE type='$type'";

switch ($type) {
    case "DIT001": //animal breed
       $sql2="SELECT Breedtype,description FROM tbl_yagan_animalbreed";
        break;
	case "DIT002"://Farmworkertype
       $sql2="SELECT workertype,description FROM tbl_yagan_farmworkerstypes";
        break;
	case "DIT003"://Service type
       $sql2="SELECT servicetype,description FROM tbl_yagan_servicestypes";
        break;
	case "DIT005"://Service type
       $sql2="SELECT buyercode,description FROM tbl_yagan_buyertype";
        break;
		
	case "DIT008"://Feed  type
       $sql2="INSERT INTO tbl_yagan_feedtype VALUES(NULL,  '$typecode','$description')";
        break;
	case "DIT009"://Product  type
       //$sql2="INSERT INTO tbl_yagan_animalbreed VALUES(NULL, '$itemcode', '$typecode','$description')";
        break;
    case "DIT0012": //Calf management
        $sql2="INSERT INTO tbl_yagan_culfmanagementtypes VALUES(NULL,  '$typecode','$description')";
        break;
	case "DIT011": //Consumables
        $sql2="INSERT INTO tbl_yagan_consumablestypes VALUES(NULL,  '$typecode','$description')";
        break;
   
    default:
        //do nothing
}


$q=mysqli_query($con,$sql2);
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>