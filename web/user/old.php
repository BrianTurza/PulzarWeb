<?php require 'address.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Brian Turza">
    <link rel="icon" href=".ico">

    <title>Pulzar - Profile</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="<?php echo $address ?>css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">
 .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width:25%;
  max-width: 300px;
  position: absolute;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}


.a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
.profile-back {
  height: 300px;
  width:720px;

}
</style>
  </head>
  <body>
  <header>
    <?php require 'navbar.php' ?>
    </header>
<br><br><br><br>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signin.php");
  }
?>
     <h3>Profile:</h3> 
      <div class="card">
        <img src="<?php echo $address ?>img/profile.png" alt="" style="width:100%">
        <p> <strong></strong></p> <h1><?php echo $_SESSION['username']; ?></h1><br><p><?php echo $_SESSION['user_type']; ?></p>
        <p class="title"></p>
     <div style="margin: 24px 0;">
    </div>
        <p><a href="index.php?logout='1'" style="color: red;"><img src="<?php echo $address ?>img/signout.png"> logout</a> </p>
      </div>
  <div style="margin-left:30%">
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
          <h3>
            <?php 
              echo $_SESSION['success']; 
              unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home"><i class="fa fa-home" data-toggle="pill"></i>Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#posts"><i class="fa fa-comments" data-toggle="pill"></i>Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#settings"><i class="fa fa-cog" data-toggle="pill"></i>Settings</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>Home</h3>
    </div>
    <div id="posts" class="container tab-pane fade"><br>
      <h3>Posts</h3>
      <p>You havent posted any messages yet. Visit <a href="https://forum.pulzar.org">Forum</a></p>
    </div>
    <div id="settings" class="container tab-pane fade"><br>
    <h3>Settings</h3>
    <form method="POST" action="">
      <?php
      require 'functions.php';
      if (isset($_POST['submit_reset'])) {
        if (isset($_POST['password']) and $_POST['password'] != '') {
            $password = mysqli_real_escape_string($_POST['password']);
            $msg = reset_email($_SESSION['id'], md5($password));
            return $msg;

        } elseif (isset($_POST['email']) and $_POST['email'] != '') {
            $email = mysqli_real_escape_string($_POST['email']);
            $msg = reset_pswd($_SESSION['id'], $email);
            return $msg;
        } if ($msg) {
            echo '<div class="alert alert-success">'.$msg.'</div>';
        }
      }
      ?>
      <div class="form-group">
        <label for="exampleInputEmail1">Change Email address</label>
        <input name="email" placeholder="<?php echo $email ?>" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Change Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit_reset" class="btn btn-success">Reset</button>
    </form>
  </div>
</div>
<script>
  $(window).load(function() {
    $('#loading').hide();
  });
</script>
  <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
