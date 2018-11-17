<?php
include 'dbreg.php'; 
// check first if record exists
	$code=$_GET['code'];
	//$code=$_POST['referer'];
	$sql = "SELECT id FROM tbl_yagan_user WHERE verification_code = '$code' AND verified = '0'";	
	$R=mysqli_query($con,$sql);
 if ((mysqli_num_rows($R))>0){ 
    // update the 'verified' field, from 0 to 1 (unverified to verified)
    $query = "UPDATE tbl_yagan_user
                SET verified = '1'
                where verification_code = '$code'";
		$R=mysqli_query($con,$query);      
	  if($R){
        // tell the user
        echo "<div>Your email is valid, thanks!. You may now login.</div>";
    }else{
        echo "<div>Unable to update verification code.</div>";        
    } 
}else{
    // tell the user he should not be in this page
    echo "<div>We can't find your verification code.</div>";
	}
?>