<?php
include "db.php";
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
 $dir = 'uploads/';
 // create new directory with 744 permissions if it does not exist yet
 // owner will be the user/group the PHP script is run under
 if ( !file_exists($dir) ) {
     mkdir ($dir, 0744,true);
 }

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

//insert form data in the database
//$sqry=("INSERT INTO tbl_yagan_documentmngt (name,email,filename,file_type,upload_date,file_name,file_desc) 
//VALUES ('$name','$email','$path','$ftype','$fdate','$fname','$fdesc')";
//$q=mysqli_query($con,$sqry);
$insert = $con->query("INSERT INTO tbl_yagan_documentmngt (name,email,filename,file_type,upload_date,file_name,file_desc) 
VALUES ('".$name."','".$email."','".$path."','".$ftype."','".$fdate."','".$fname."','".$fdesc."')");
//$insert = $con->query("INSERT tbl_yagan_documentmngt (name,email,filename) 
//VALUES ('".$name."','".$email."','".$path."')");
//echo $insert?'ok':'err';
}
echo $insert?'ok':'err';
} 
else 
{
//echo 'invalid';
}
}
?>
