<?php
require 'connect.php';
require ''
session_start();
  $usr = "admin";
  $psw = "password";
  $username = '$_POST[username]';
  $password = '$_POST[password]';
  //$usr == $username && $psw == $password
  if ($_SESSION['login'] == true || ($_POST['username']=="admin" && $_POST['password']=="password")) {
    echo "<meta http-equiv='refresh' content='0; url=https://mtorrentcloud.net/flash/web/admin/users.php'>";

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

    <title>Flash - Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://mtorrentcloud.net/flash/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" style="float:left;" href="#"><h3>Flash</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="web/doc.html">Documantation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="web/download.html">Download</a>
            </li>
            <li class="nav-item">
                <p><a class="btn btn-lg btn-primary"  href="#" role="button">Sign up </a></p>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <form class="form-signin" method="post" action="login.php">
      <img class="mb-4" src="https://mtorrentcloud.net/flash/img/bolt.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
<?php  if (count($errors) > 0) : ?>
  <div class="error">
    <?php foreach ($errors as $error) : ?>
      <p><?php echo $error ?></p>
    <?php endforeach ?>
  </div>
<?php  endif ?>
      <label for="inputEmail" class="sr-only">Nickname</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button name="login_user" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p>Not yet member?<a href="signup.php"> Sign up</a></p>
      <p class="mt-5 mb-3 text-muted">&copy;Flash 2018</p>
    </form>
  </body>
</html>
