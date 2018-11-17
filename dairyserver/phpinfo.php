<?php //phpinfo(); 
$admin_email="chepken@gmail.com";
$subject="Try send email";
$comment="Works!";
$email="chepken@gmail.com";
$ret = mail($admin_email, $subject, $comment);
if ($ret === true)
  echo 'Success'.PHP_EOL;
else
  echo 'Error'.PHP_EOL;

?>