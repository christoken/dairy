<?php
include "db.php";
if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_FILES['file']['name'])){
    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["hard_file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "/uploads/".$fileName;
		
		
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }    
    $name = $_POST['name'];
    $email = $_POST['email'];
    //insert form data in the database
	$sql="INSERT INTO tbl_yagan_documentmngt (name,email,filename) 
	VALUES ('$name','$email','$uploadedFile')";
	$insert=mysqli_query($con,$sql);
    //$insert = $db->query("INSERT tbl_yagan_documentmngt (name,email,file_name) VALUES ('".$name."','".$email."','".$uploadedFile."')");    
    echo $insert?'ok':'err';
	
}
?>