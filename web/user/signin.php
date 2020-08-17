<?php
session_set_cookie_params(0, '/', '.pulzar.org');
session_start();
$username = "";
$email    = "";
$errors = array(); 

require 'connect.php';
require 'address.php';


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
  	$query = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $result = mysqli_fetch_assoc($results);
        $_SESSION['username_id'] = $result['user_id'];
        $_SESSION['user_email'] = $result['user_email'];
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $result['user_level'];
        $_SESSION['success'] = "You are now logged in";
        $location = $_GET['location'];
        if (isset($_GET['topic_id'])) {
          header('location: '.$address.'web/forum/topic.php?id='.$topic_id);
          exit();
        } else {
          header('location: '.$address.'web/user/');
          exit();
        }
    } else {
      array_push($errors, "Wrong username or password combination");
    }
  }
}
if ($_SESSION['username'] and !isset($_GET['topic_id'])) {
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
    <link rel="icon" href=".">

    <title>Pulzar - Sign in</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/style.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $address ?>css/signin.css">
  </head>
  <body class="text-center">
    <header>
    <?php require 'navbar.php' ?>
    </header>
    <main role="main"></main>
    <form class="form-signin" method="post" action="signin.php">
      <img class="mb-4" src="<?php echo $address ?>img/icon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
<?php  if (count($errors) > 0) : ?>
    <?php foreach ($errors as $error) : ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error ?>
      </div>
    <?php endforeach ?>
<?php  endif ?>
<?php  if (isset($_SESSION['message'])) : ?>
      <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
          <?php endif ?> 
  <div class="form-label-group">
    <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>
    <label for="inputEmail">Username</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" data-toggle="password" placeholder="Password" required><span class="add-on"><i class="icon-eye-open"></i></span>
    <label for="inputPassword">Password</label>
  </div>
    <div>
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button name="login_user" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p>Not yet member?<a href="signup.php"> Sign up</a></p>
      <p>Have you forgotten your username or password?<a href="enter_email.php"> Reset</a></p>
      <p class="mt-5 mb-3 text-muted">&copy;Pulzar 2018 - 20</p>
      
    </form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  </body>
</html>
