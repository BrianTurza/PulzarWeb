<?php
require('address.php');
require('connect.php');
$errors = array();

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirm_password']);
  $hash = ( sha1( rand(1,1000) * rand(1,1000) ) );

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
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
  } else {
      $user_type = "user";
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);
    date_default_timezone_set("Europe/Bratislava");
    $time = date("Y-m-d h:i:sa");
  	$query = "INSERT INTO users (user_name, user_email, user_password, user_level, user_date, user_hash , user_verified) VALUES('$username', '$email', '$password', '$user_type', '$time', '$hash', 0)";
  	mysqli_query($db, $query);
    $msg = "Thanks for registration, activation link has been sent to $email. Please check your emailbox.";

    $from = "noreply@pulzar.org";
    $to = $email;
    $subject = "Account verification ( pulzar.org )";
    $message = "Hello $username,\nthank you for your registration. To activate your account please click on this link: https://pulzar.org/web/user/verify.php?email=$email&hash=$hash\n (If the link isnt working, copy and paste the url).
    If it wasnt you who registered this email, ignore it and delete it.";
    $headers = "From:" . $from;
    $mail = mail($to, $subject, $message, $headers);
    if ($mail == TRUE) {
      $msg = "An email has been sent to $email, check your mailbox.";
    } else {
        array_push($errors, "Error. Please try again later.");
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
    <img class="mb-4" src="<?php echo $address ?>img/icon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
	<?php  if (count($errors) > 0) : ?>
		<?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error ?>
      </div>
		<?php endforeach ?>
	<?php  endif ?>
	<?php  if (count($errors) == 0 and isset($msg)) : ?>
      <div class="alert alert-success" role="alert">
      <?php echo $msg ?>
      </div>
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
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>
  <div class="form-label-group">
    <input type="password" name="confirm_password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
    <label for="inputPassword">Confirm Password</label>
  </div>
  <div class="checkbox">
    <label style="margin-right: 16.666667%;">
      <input type="checkbox" required=""> I agree to the <a href="https://pulzar.org/web/privacy-policy.php">privacy policy</a>
    </label>
    <label>
      <input type="checkbox" required=""> I agree to the <a href="https://pulzar.org/web/terms-and-conditions.php">terms and conditions</a>
    </label>
  </div>
      <button name="reg_user" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <p>Are you already a member?<a href="signin.php"> Sign in</a></p>
      <p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 20</p>
    </form>
  </body>
</html>