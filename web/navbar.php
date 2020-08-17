
        <?php require 'address.php' ?>
        <nav style="font-size:1.2rem" class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
          <a href="<?php echo $address ?>" class="navbar-left"><img style="width:180px;" src="<?php echo $address ?>img/cover.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          <div style="margin-left: 1%;" class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item<?php echo ($link == 'https://github.com/pulzarlang/Pulzar/blob/master/docs/syntax.md' ? ' active' : '') ?>">
                 <a class="nav-link" href="https://github.com/pulzarlang/Pulzar/blob/master/docs/add/syntax.md">Docs</a>
              </li>
              <li class="nav-item<?php echo ($link == $address.'web/download.php' ? ' active' : '') ?>">
              <a class="nav-link" href="<?php echo $address ?>web/download/">Download</a>
              </li>
              <li class="nav-item<?php echo ($link == 'https://forum.pulzar.org' ? ' active' : '') ?>">
                <a class="nav-link" href="https://forum.pulzar.org">Forum </a>
              </li>
              <li class="nav-item">
                  <?php if (isset($_SESSION['username'])) : ?>
                    <p><a class="btn btn-lg btn-primary"  href="<?php echo $address ?>web/user/" role="button">Profile</a></p>
                  <?php elseif (!isset($_SESSION['username'])) : ?>
                    <p><a class="btn btn-lg btn-primary"  href="<?php echo $address ?>web/user/" role="button">Sign in</a></p>
                  <?php endif ?>
              </li>
            </ul>
            <form action="<?php echo $address ?>web/search_script.php" class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">Search</button>
            </form>
            <a class="nav-link" href="https://github.com/pulzarlang/pulzar/"><img style="height:40px;width:40px" src="<?php echo $address ?>img/github.png"></a>
          </div>
        </nav>
        