<?php

$auth = false;
$user=$_SERVER[PHP_AUTH_USER];
$pwd=$_SERVER[PHP_AUTH_PW];
if (($user == "User") && ($pwd=="Yzs&8Y"))
  $auth=true;
  
 if ( ! $auth) {
     
     header('WWW-Authenticate: Basic realm="Admin Zone"' );
     header( 'HTTP/1.0 401 Unauthorized');
     echo 'Authorization Required';
     exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Cloud</title>
</head>
<body>
    <iframe style="position: absolute; height: 100%; width: 100%" src="keydfnfandfnnaffdna_insight-intermediate-teacherx27s-book(1).pdf">
</body>
</html>