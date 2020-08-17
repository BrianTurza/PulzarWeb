<?php require 'address.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Brian Turza">
    <?php echo '<link rel="icon" href="'.$address.'img/bolt.ico">' ?>

    <title>Pulzar - Main Page</title>

<link rel="stylesheet" href="css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="web/docs/code.css">

  </head>
  <body>
  <header>
  <?php require 'web/navbar.php' ?>
  </header>

    <main role="main">
      <div style="width:100%" id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" style="filter: blur(3px);" src="img/lightning.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Welcome to Pulzar</h1>
                <h4>Pulzar is modern high-level programming language <br>that allows both dynamic and static typing</h4>
                <p><a class="btn btn-lg btn-primary" href="<?php echo $address ?>web/about.html" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="img/profile-back.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>New Pulzar version is here!</h1>

                <h4>Pulzar v0.4 has been just realesed. Get it now</h4>
                  <p><a class="btn btn-lg btn-success" href="<?php echo $address ?>web/download.html" role="button">Download</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  <div class="container marketing" >
      <strong><h2 align="center">With flash you can create:</h2></strong>
      <br>
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/terminal.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Console Applications</h2>
            <p>You can create powerful console, but also window-based applications with many gui tools.</p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/browser.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Browser Applications</h2>
            <p>Also with flash its simple to create powerful browser applications.</p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/server.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Server-side Apps</h2>
            <p>You can easily use localhost and also ...</p>
          </div>
        </div>
    </div>

<hr class="featurette-divider">
<div>
<h2 align="center">Try Pulzar Online:</h2>
<div id="editor" contenteditable="True" style="margin-left:10%;align:center;color:lightblue;background-color:black;resize:none;width:80%;height:500px;overflow:scroll;">
      <span class="func">Program </span><span class="normal">Console; </span><span class="comment">\\Creating console program</span><br>
      <span class="func">int </span><span class="normal">x</span><span class="op"> = </span><span class="num">10</span><span class="normal">;</span><br>
      <span class="func">int </span><span class="normal">y</span><span class="op"> = </span><span class="num">20</span><span class="normal">;</span><br>
      <span class="func">echo</span><span class="normal"> x </span><span class="op">+ </span><span class="normal">y;</span>
      <span class=""></span>
</div>
<a style="margin-left:10%" href="<?php echo $adress?>web/flash_editor/"><button type="button" class="btn btn-primary">Try it</button></a>
</div>
<br>
<div>
<h1>lol</h1>

</div>
        <hr class="featurette-divider">

        <div style="margin-left:5%">
			<h2 >This is a FizzBuzz program in Pulzar.</h2>
          <div class="col-md-7 order-md-2">
            
            <p class="lead"></p>
          </div>
          <div class="col-md-5" style="background-color:black">
          <code class="code1">
            <span class="func">Program </span><span class="normal">Console; </span><span class="comment">\\ Console Program</span><br>
            <span class="func">int</span><span class="normal"> x;</span><br>
            <span class="func">for</span><span class="normal"> x</span><span class="op"> :: </span><span class="normal">x</span><span class="op"> < </span><span class="num">100</span><span class="op"> :: </span><span class="normal"> x++ </span><br>
            <span class="normal">{</span>
            <br>
				<span style="margin-right:1.66rem"></span><span class="func">if</span><span class="normal"> (x</span><span class="op"> mod </span><span class="normal">3<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0 </span><span class="normal"> { </span><br>
				<span style="margin-right:3.32rem"></span><span class="func">echo</span><span class="str"> "Fizz"</span><span class="normal">;</span><br>
				<span style="margin-right:1.66rem"></span><span class="normal">}</span><br>
				<span style="margin-right:1.66rem"></span><span class="func">else if</span><span class="normal"> (x</span><span class="op"> mod </span><span class="normal">5<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0 </span><span class="normal"> { </span><br>
				<span style="margin-right:3.32rem"></span><span class="func">echo</span><span class="str"> "Buzz"</span><span class="normal">;</span><br>
				<span style="margin-right:1.66rem"></span><span class="normal">}</span><br>
				<span style="margin-right:1.66rem"></span><span class="func">else if</span><span class="normal"> (x</span><span class="op"> mod </span><span class="normal">3<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0 </span><span class="op"> || </span><span class="normal"> (x</span><span class="op"> % </span><span class="normal">5<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0<span class="normal"> { </span><br>
				<span style="margin-right:3.32rem"></span><span class="func">echo</span><span class="str"> "FizzBuzz"</span><span class="normal">;</span>
				<br><span style="margin-right:1.66rem"></span><span class="normal">}</span><br>
				<span style="margin-right:1.66rem"></span><span class="func">else</span><span class="normal"> {</span><br>
				<span style="margin-right:3.32rem"></span><span class="func">echo</span><span class="normal"> x;</span><br>
				
			<span class="normal">}</span><br>


          </code>
          </div>
        </div>

      </div>
<br><br>
<div class="ide">
	<h1 class="heading">Editors:<br><br>
	<span>VSCode</span>
	<p>lore impsum</p>
	<br><br>
	<p></p>
      <br>
</div>

    </main>
<footer class="site-footer">
<?php require 'web/footer.php' ?>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
