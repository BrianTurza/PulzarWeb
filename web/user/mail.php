<?php
require('connect.php');
/*
function send_mail($name, $email, $hash) {
    $from = "noreply@pulzar.org";
    $to = $email;
    $subject = "Account verification ( pulzar.org )";
    $message = "Hello $name,\nthank you for your registration. To activate your account please click on this link: https://pulzar.org/web/user/verify.php?email=$email&hash=$hash 	\n
    If it wasnt you who registered this email, ignore and delete it.";
    $headers = "From:" . $from;
    $mail = mail($to, $subject, $message, $headers);
    if ($mail == TRUE) {
        echo "An email has been sent to $email, check your mailbox.";
    } else {
        echo "Error";
    }    
}
*/
$hash = sha1( rand( 1, 1000 ) * rand( 1, 1000 ) );
$sql = "UPDATE users SET user_hash='$hash' WHERE user_id=3";
if (mysqli_query($db, $sql)) {
    echo "Done";
}
else {
    echo "Error";
}