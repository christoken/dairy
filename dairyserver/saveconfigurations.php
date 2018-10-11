<?php
//include("auth.php");
include("db.php");
//This file is for several tables depending on the itemcode; The itemcodes are guide as below
	//DIT001 	Animal breed; DIT005 	Buyer; DIT0012 	Calf Managemnt; DIT011 	Consumables
	//DIT007 	Disease; DIT002 	Farm worker; DIT008 	Feed;	DIT009 	Product
	//DIT004 	Product use; DIT003 	Service type;	DIT006 	Treatment 
		$itemcode=$_POST['itemcode'];
		$typecode=$_POST['typecode'];
		$description=$_POST['description'];
		$da=date("Y-m-d");
		$data="";
	$sql1="INSERT INTO tbl_yagan_configitems(typecode,description,type,configdate) 
	VALUES ('$typecode','$description','$itemcode','$da')";
	$sql2="";
	//SNo 	Breedcode 	Breedtype 	description
	
	
	switch ($itemcode) {
    case "DIT001": //animal breed
       $sql2="INSERT INTO tbl_yagan_animalbreed VALUES(NULL,  '$typecode','$description')";
        break;
	case "DIT002"://Farmworkertype
       $sql2="INSERT INTO tbl_yagan_farmworkerstypes VALUES(NULL,  '$typecode','$description')";
        break;
	case "DIT003"://Service type
       $sql2="INSERT INTO tbl_yagan_servicestypes VALUES(NULL,  '$typecode','$description')";
        break;
		
	case "DIT005"://Feed  type
       $sql2="INSERT INTO tbl_yagan_buyertype VALUES(NULL,  '$typecode','$description')";
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
		$result1=mysqli_query($con,$sql1);
		$result2=mysqli_query($con,$sql2);	
	if (!$result2){ $data=" There seems to be an error; Your data has not updated";
	}
	else{
		$data="Your data has been updated successfully";
	}
echo json_encode($data);
?>