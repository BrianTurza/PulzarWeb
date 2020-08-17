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
.text {
  margin-left:5%;
}
a {
  color: #343a40;
}
pre {
    background: #f4f4f4;
    border: 1px solid #ddd;
    border-left: 3px solid #f36d33;
    color: #666;
    page-break-inside: avoid;
    font-family: monospace;
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 1.6em;
    max-width: 70%;
    overflow: auto;
    padding: 1em 1.5em;
    display: block;
    word-wrap: break-word;
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
<h1>Install Pulzar on Windows</h1>	
<hr class="title-hr"></div>
<div class="text">	
<br><br>
<div>
<h2>Manual Installation</h2>
<a href="src/win32.zip" download><button class="btn btn-primary"><i class="fa fa-download"></i> Download x86 (32bit) zip</button></a>
<a href="src/win64.zip" download><button class="btn btn-primary"><i class="fa fa-download"></i> Download x86_64 (64bit) zip</button></a>
<p>Compress the zip file and run:</p>
<pre><code>cd &lt;directory&gt;/Pulzar</code></pre>
<pre><code>python3 setup.py</code></pre>
</div><br>
<div>
<h2>Installation using Git/Github</h2>
<pre><code>git clone https://github.com/pulzarlang/Pulzar.git</code></pre>
</div>
<br>

</main>

</body>
</html>
