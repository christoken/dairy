<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory
 
if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['file']){
$img = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name']; 
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); 
// can upload same image using rand function
$final_image = rand(1000,1000000).$img; 
// check's valid format
if(in_array($ext, $valid_extensions)) { 
$path = $path.strtolower($final_image); 
if(move_uploaded_file($tmp,$path)) 
{
//echo "<img src='$path' />";
$name = $_POST['name'];
$email = $_POST['email']; 
$ftype = $_POST['file_type']; 
$fdate = $_POST['upload_date']; 
$fname = $_POST['file_name']; 
$fdesc = $_POST['file_desc'];
//include database configuration file
include_once 'db.php'; 
//insert form data in the database
$insert = $con->query("INSERT tbl_yagan_documentmngt (name,email,filename,file_type,upload_date,file_name,file_desc) 
VALUES ('".$name."','".$email."','".$path."','".$ftype."','".$fdate."','".$fname."','".$fdesc."')");
//$insert = $con->query("INSERT tbl_yagan_documentmngt (name,email,filename) 
//VALUES ('".$name."','".$email."','".$path."')");
echo $insert?'ok':'err';
}
} 
else 
{
//echo 'invalid';
}
}
?>