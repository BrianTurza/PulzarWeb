<?php require 'address.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pulzar programming language offical website">
    <meta name="keywords" content="Pulzar,programming language, static and dynamic typing,">
    <meta name="author" content="Brian Turza">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulzar- Main Page</title>

    <link rel="stylesheet" href="css/bootstrap-4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="web/docs/code.css">

</head>
<body>
<div id="cover">        
  <div class="jumbotron jumbotron-fluid">
  <?php require 'web/navbar.php'?>
    <div class="container">
      <h1 class="title display-3 text-center" style="font-weight:100;"><strong style="font-weight:600;">Pulzar</strong></h1>
      <p class="lead string-1 text-center">Pulzar is modern high-level programming language <br>that allows both dynamic and static typing</p>
      <p class="lead text-center">
        <a class="btn btn-outline-primary btn-lg text-center" href="#about" role="button">Learn more</a>
      </p>
    </div>
  </div>
</div>

<div class="content">
<section id="about">
  <div class="container marketing" >
      <strong><h2 align="center">With pulzar you can create:</h2></strong>
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
            <p>Also with pulzar its simple to create powerful browser applications.</p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/ai.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Machine learning</h2>
            <p>It has simple tools for buliding neural networks</p>
          </div>
        </div>
    </div>
</section>


<hr class="featurette-divider">
<div>
<h2 align="center">Try Pulzar Online:</h2>
<div class="col-md-9" id="editor" contenteditable="True" style="margin-left:15%;align:center;color:lightblue;background-color:black;resize:none;width:80%;height:500px;overflow:scroll;">
<code class="code1">
            <span class="func">Program </span><span class="normal">Console; </span><span class="comment">\\ Console Program</span><br>
            <span class="func">int </span><span class="normal">x</span><span class="op"> = </span><span class="num">10</span><span class="normal">;</span><br>
            <span class="func">int </span><span class="normal">y</span><span class="op"> = </span><span class="num">20</span><span class="normal">;</span><br>
            <span class="func">echo</span><span class="normal"> x </span><span class="op">+ </span><span class="normal">y;</span>
      <span class=""></span>
</code>
</div>
<a style="margin-left:15%" href="<?php echo $adress?>web/editor/"><button type="button" class="btn btn-primary">Try it</button></a>
</div>
<br>
<div>

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
				<span style="margin-right:1.66rem"></span><span class="func">else if</span><span class="normal"> (x</span><span class="op"> mod </span><span class="normal">3<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0 </span><span class="op"> || </span><span class="normal"> (x</span><span class="op"> mod </span><span class="normal">5<span class="normal">)</span></span><span class="op"> == </span><span class="num"> 0<span class="normal"> { </span><br>
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
</div>
</main>
</div>
<footer class="site-footer">
<?php require 'web/footer.php' ?>
</footer>
<script>
$('html, body').animate({
    scrollTop: target
  }, 2000);
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162965591-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162965591-1');
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>