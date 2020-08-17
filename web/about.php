<!DOCTYPE html>
<html>
<head>
    <title>Flash - About</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Own code-->
<link href="css/style.css" rel="stylesheet">
<link href="css/add.css" rel stylesheet>
<link rel="stylesheet" type="text/css" href="<?php echo $address?>web/doc/code.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" style="float:left;" href="<?php echo $address?>"><h3>Flash</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo $address ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo address?>">About<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="<?php echo $address?>web/doc/index.html">Documantation</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="<?php echo $address ?>web/download.html">Download</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $address ?>web/forum/">Forum</a>
              </li>
              <li class="nav-item">
                 <p><a class="btn btn-lg btn-primary"  href="<?php echo $adress ?>web/signin.php" role="button">Sign up </a></p>
              </li>
  
              <li class="nav-item">
                
              </li>
            </ul>
            <form action="<?php echo $address ?>web/search_script.php" class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="query" 
                   placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">Search</button>
            </form>
            <a class="nav-link" href="https://github.com/BrianTurza/flash/"><img style="height:40px;width:40px" src="<?php echo $address ?>/img/github.png"></a>
          </div>
        </nav>
    </header>
    <main style="margin-botton:100px;">
    <br><br><br><br>
    <div style="align:center">
        <h1>About Flash</h1>
    </div>
        <hr class="title-hr">
        <br><h5>Flash is toy language developed Brian Turza.<br>It is high-level language
        </h5>
    </main>
<!-- start of Footer -->
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="<?php echo $address?>img/bolt.png" alt="" width="24" height="24"><small class="d-block mb-3 text-muted">&copy; 2018 -19</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>

    
</body>
</html>