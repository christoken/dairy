<?php
//include("auth.php");
include("dbreg.php");
//This file is for savibg breeding serviceprovider
				$data="";			 			 
				$dairyphone=$_POST['dairyphone'];
				$dairyemail=$_POST['dairyemail'];
				$dairysurname=$_POST['dairysurname'];
				$dairyothernames=$_POST['dairyothernames'];
				$dairyusername=$_POST['dairyusername'];
				$dairybrandname=$_POST['dairybrandname'];
				$serverURL=$_POST['serverURL'];				
				$regdate=date("Y-m-d");				
				$endtrialdate=date('Y-m-d', strtotime($regdate .'+30 day'));
				//$con="";				
				// check if the email or organization has been used
		$sql1="SELECT id FROM tbl_yagan_user WHERE email = '$dairyemail' AND verified = '1'";	
		$rows=0;
		if ($R2=mysqli_query($con,$sql1)){
			$rows=mysqli_num_rows($R2);			
		}
		
		if ($rows>0){
			 $data="Your email is already activated";			
		}else{
		$sql1="SELECT id FROM tbl_yagan_user WHERE email = '$dairyemail' AND verified = '0'";	
		
		$rows=0;
		if ($R3=mysqli_query($con,$sql1)){
			$rows=mysqli_num_rows($R3);
		}
		if ($rows>0){
			$data="Your email is already in the system but not yet verified";
		}
		else{ 
                // now, compose the content of the verification email, it will be sent to the email provided during sign up
                // generate verification code, acts as the "key"
				$random = substr(number_format(time() * rand(),0,'',''),0,10);
                $verificationCode = md5(uniqid($random, true)); 
                // send the email verification			
			
		
               $verificationLink = $serverURL . "activate.php?code=" . $verificationCode;
				//$verificationLink = $serverURL . "activate.php";
		// Please specify your Mail Server - Example: mail.example.com.
			//ini_set("SMTP","localhost");
			// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
				//ini_set("smtp_port","25");
			// Please specify the return address to use
		//	ini_set('sendmail_from', 'chepken@gmail.com');
			
                $htmlStr = "";
                $htmlStr .= "Hi " . $dairyemail . ",<br /><br />"; 
                $htmlStr .= "Please click the button below to verify your registration and have access to the system.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
 
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='http://threepillars.co.ke/' target='_blank'>Our home </a><br />";
  
                $name = "Dairy management System";
                $email_sender = "chumbalken@yahoo@co.uk";
                $subject = "Verification Link | The Dairy | Registration";
                $recipient_email = $dairyemail;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr; 
                // send email using the mail function, you can also use php mailer library if you want
				$ret = mail($recipient_email, $subject, $body,$headers);
                //if( mail($recipient_email, $subject, $body, $headers) )
				if ($ret === true){
                    // tell the user a verification email were sent
                    $data= "A verification email was sent to: " . $recipient_email . " , please open your email inbox and click the given link so you can login.";
                     // save the email in the database
                    $created = date('Y-m-d H:i:s'); 
                    //write query
					$v=0; $ul=9;
					$pswd=md5($dairyphone);
		//$con = mysqli_connect('localhost','root','chep','dbdairy');		
		$sql="INSERT INTO tbl_yagan_user(
		surname,othernames,username,password,orgtel,email,userlevel,organization,
		verification_code,regdate,endtrialdate
		) 
		VALUES ('$dairysurname','$dairyothernames','$dairyusername','$pswd','$dairyphone',
		'$dairyemail','$ul','$dairybrandname','$verificationCode','$regdate','$endtrialdate')";
		$r1=mysqli_query($con,$sql);	
                    // Execute the query
                    if($r1){
                        // echo "<div>Unverified email was saved to the database.</div>";
                    }else{
                      $data="Unable to save your email to the database.";
                        //print_r($stmt->errorInfo());
                    }
                }else{
                    die("Sending failed.");
                }
            }		
		}		
		//createdbconfigphp($newdb);	
	function createdbconfigphp($dbname){
		$file = 'db.php';
		// Open the file to get existing content
		$server="localhost";
		$usn="root";
		$pass="chep";
		$db=$dbname;
		//echo \"I like the color \".\$_SESSION['color'].\"!!!!\";
		$current="<?php
		session_start();
		\$newdbname=\$_SESSION['a'];
		\$con = mysqli_connect('$server','$usn','$pass',\$newdbname);
		if (mysqli_connect_errno()) {
		  echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
		  }  
		 ?>"; 
	file_put_contents($file, $current);
}		
	
	/*
	if (!$result1){ $data="There seems to be an error; Your data has not updated";
	}
	else{ $data="Your data has been updated successfully"; }*/
echo json_encode($data);
?>