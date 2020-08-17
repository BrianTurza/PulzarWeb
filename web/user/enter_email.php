<?php
require 'connect.php';
require 'address.php';
session_start();
$errors = [];
if (isset($_POST['reset_password'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $results = mysqli_query($db, $query);
  
    if (empty($email)) {
        array_push($errors, "Your email is required");
    } else if(mysqli_num_rows($results) <= 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(50));
  
    if (count($errors) == 0) {
        // store token in the password-reset database table against the user's email
        $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($db, $sql);
    
        // Send email to user with the token in a link they can click on
        $from = "noreply@pulzar.org";
        $to = $email;
        $subject = "Password reset ( pulzar.org )";
        $message = "Hi there, click on this ".$address."web/user/reset.php?token=" . $token . " to reset your password.\nIf it wasn't you who applied reset on ghis account, please ignore this email and delete it.";
        $headers = "From:" . $from;
        $msg = wordwrap($msg,70);
        mail($to, $subject, $message, $headers);
        $msg = "An email has been send to reset your password. Please check your mailbox.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=".">

    <title>Pulzar - Reset</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/signin.css">
  </head>
  <body class="text-center">
    <header>
    <?php require 'navbar.php' ?>
    </header>
    <main role="main"></main>
    <form class="form-signin" method="post" action="enter_email.php">
      <!--<img class="mb-4" src="<?php echo $address ?>img/bolt.png" alt="" width="72" height="72">-->
      <h1 class="h3 mb-3 font-weight-normal">Reset password</h1>
<?php  if (count($errors) > 0) : ?>
    <?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error ?>
      </div>
    <?php endforeach ?>
<?php  endif ?>
    <?php  if (isset($msg)) : ?>
      <div class="alert alert-success"><?php echo $msg ?></div>
    <?php endif ?> 
    <div class="form-label-group">
        <input type="text" name="email" id="inputUsername" class="form-control" data-toggle="password" placeholder="Password"><span class="add-on"><i class="icon-eye-open"></i></span>
        <label for="inputEmail">Your Username (optional)</label>
    </div>
    <div class="form-label-group">
        <input type="email" name="email" id="inputEmail" class="form-control" data-toggle="password" placeholder="Password" required><span class="add-on"><i class="icon-eye-open"></i></span>
        <label for="inputEmail">Your Email address</label>
    </div>
      <button name="reset_password" class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 20</p>
      
    </form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </body>
</html>
