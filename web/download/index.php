<?php require 'address.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Brian Turza">
    <?php echo '<link rel="icon" href="'.$address.'img/bolt.ico">' ?>

    <title>Pulzar - Download</title>

<link rel="stylesheet" href="<?php echo $address ?>css/bootstrap-4.3.1/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<style>
a {
  color: #343a40;
}
</style>
</head>
<body>
    <header>
      <?php require 'navbar.php' ?>
    </header>
<br>
<br><br><br>
<main>
<div align="center" class="content">
<h1>Install Pulzar</h1>	
<hr class="title-hr">
<div class="text">	
<br><br>
<div style="content-align:center" class="container download" id="downloads">
    <h2>Releases:</h2>
    <p class="lead"></p>
    <div style="margin-left:20%" class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="windows.php">
            <h3>Windows:</h3>
            <i style="font-size:800%" class="fab fa-windows" aria-hidden="true"></i>
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="linux.php">
          <h3>Linux:</h3>
          <i style="font-size:800%" class="fab fa-linux" aria-hidden="true"></i>
        </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="mac.php">
          <h3>Mac OS:</h3>
          <i style="font-size:800%" class="fab fa-apple" aria-hidden="true"></i>
        </a>
        </div>
    </div>
  </div>

<br>
</div>
</main>

</body>
</html>
