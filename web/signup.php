<?php
session_start();
$username = "";
$email    = "";
$errors = array(); 
$message = array();

require 'connect.php';
require 'address.php';
// REGISTER USER
if (isset($_POST['reg_user'])) {  

  $username = $db -> real_escape_string($_POST['username']);
  $email = $db -> real_escape_string($_POST['email']);
  $password_1 = $db -> real_escape_string($_POST['password_1']);
  $password_2 = $db -> real_escape_string($_POST['password_2']);

  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db_name, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

if ($username == "Admin") {
  $user_type = "admin";
}
else {
  $user_type = "user";
}
  if (count($errors) == 0) {
    $password = sha1($password_1, PASSWORD_DEFAULT);
    $hash = sha1(rand(1, 1000) * rand(1, 1000));
    $query = "INSERT INTO users (username, email, user_type, password, hash, verified) VALUES('$username', '$email', '$user_type', '$password', $hash, 0)";
    $result = $db -> query($query);
    $_SESSION['username'] = $username;
    $_SESSION['verify_email'] = "Thank you for registration, your account has been made,<br> please verify it by clicking the activation link that has been send to your email.";
    //$_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
if ($_SESSION['username']) {
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Flash - Sign up</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $address ?>css/font-awesome-5.11.2/css/font-awesome.min.css">

<link href="<?php echo $address ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $address ?>css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <header>
    <?php require 'navbar.php' ?>
    </header>
    <form class="form-signin" method="post" action="signup.php">
      <img class="mb-4" src="<?php echo $address ?>img/bolt.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
	<?php  if (count($errors) > 0) : ?>
		<?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error ?>
      </div>
		<?php endforeach ?>
	<?php  endif ?>
	<?php  if (count($errors) == 0 && count($message) > 0) : ?>
		<?php foreach ($errors as $error) : ?>
      <div class="alert alert-success" role="alert">
      <?php echo $msg ?>
      </div>
		<?php endforeach ?>
	<?php  endif ?>
  <div class="form-label-group">
    <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>
    <label for="inputEmail">Username</label>
  </div>
  <div class="form-label-group">
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
    <label for="inputEmail">Email</label>
  </div>
  <div class="form-label-group">
    <input type="password" name="password_1" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>
  <div class="form-label-group">
    <input type="password" name="password_2" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
    <label for="inputPassword">Confirm Password</label>
  </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button name="reg_user" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <p>Are you already a member?<a href="signin.php"> Sign in</a></p>
      <p>Have you forgotten your username or passoword?<a href="signin.php"> Sign in</a></p>
      <p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 19</p>
    </form>
  </body>
</html>
