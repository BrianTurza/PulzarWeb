
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="navbar-brand" href="<?php echo $address?>">Pulzar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item<?php echo ($link == $address ? 'active' : '') ?>">
                <a class="nav-link" href="<?php echo $address ?>">Home</a>
              </li>
              <li class="nav-item<?php echo ($link == 'https://docs.pulzar.org' ? ' active' : '') ?>">
                 <a class="nav-link" href="https://docs.pulzar.org">Docs</a>
              </li>
              <li class="nav-item<?php echo ($link == $address.'web/download.php' ? ' active' : '') ?>">
              <a class="nav-link" href="<?php echo $address ?>web/download/">Download</a>
              </li>
              <li class="nav-item<?php echo ($link == 'https://forum.pulzar.org' ? ' active' : '') ?>">
                <a class="nav-link" href="https://forum.pulzar.org">Forum </a>
              </li>
              <li class="nav-item">
                 <p><a class="btn btn-lg btn-primary"  href="<?php echo $adress ?>web/user/" role="button">Sign up </a></p>
              </li>
            </ul>
            <form action="<?php echo $address ?>web/search_script.php" class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">Search</button>
            </form>
            <a class="nav-link" href="https://github.com/pulzarlang/pulzar/"><img style="height:40px;width:40px" src="<?php echo $address ?>img/github.png"></a>
          </div>
        </nav>
        