<?php
require 'connect.php';
require 'address.php';
session_start();
$errors = [];
  // ENTER A NEW PASSWORD
  if (isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
  
    // Grab to token that came from the email link
    $token = $_GET['token'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];
  
        if ($email) {
            $new_pass = md5($new_pass);
            $sql = "UPDATE users SET user_password='$new_pass' WHERE user_email='$email'";
            $results = mysqli_query($db, $sql);
            $_SESSION['message'] = "Your password has been succesfully changed";
            header('location: index.php');
        }
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
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="<?php echo $address ?>img/bolt.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Reset password</h1>
<?php  if (count($errors) > 0) : ?>
    <?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error ?>
      </div>
    <?php endforeach ?>
<?php  endif ?>
<?php  if (isset($msg)) : ?>
      <div class="alert alert-success"><?php echo $msg; ?></div>
          <?php endif ?> 

    <div class="form-label-group">
			<input type="password" id="inputPassword" class="form-control" data-toggle="password" placeholder="Password" name="new_pass">
      <label for="inputPassword">New Password</label>
		</div>
		<div class="form-label-group">
			<input type="password" id="inputPassword" class="form-control" data-toggle="password" placeholder="Password" name="new_pass_c">
      <label for="inputPassword">Confirm new Password</label>
		</div>
		<div class="form-label-group">
			<button name="new_password" class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
		</div>
      <p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 20</p>
      
    </form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </body>
</html>
