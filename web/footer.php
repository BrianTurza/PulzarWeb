      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Pulzar is modern programming language which aims on simple soultion on complex problems.It supports both static and dynamic typing.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="<?php echo $address ?>">About</a></li>
              <li><a href="https://github.com/pulzarlang/Pulzar/blob/master/docs/syntax.md">Documentation</a></li>
              <li><a href="<?php echo $address ?>web/download/">Download</a></li>
              <li><a href="<?php echo $address ?>web/user/">Sing in /Sign up</a></li>
              <li><a href="<?php echo $address ?>forum/">Forum</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="https://github.com/pulzarlang/pulzar">Contribute</a></li>
              <li><a href="<?php echo $address ?>privacy-policy/">Privacy Policy</a></li>
              <button type="button" class="btn btn-success">Donate</button>
            </ul>
          </div>
          <div class="col-xs-6 col-md-3">
            <h6>Subscribe</h6>
              <form method="POST" action="<?php echo $address ?>">
                <input class="form-control mr-sm-2" type="text" name="subscribe_email" placeholder="Enter email" aria-label="Search">
              </form>
              <?php
              $sub_email = $_POST['subscribe_email'];
              if(isset($sub_email)) {
                echo "\nThanks for submiting your email";
              }
             ?>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <strong><p class="copyright-text">Copyright Pulzar &copy; 2018 - 20 <br>All Rights Reserved 
            </p></strong>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="forum" href="<?php echo $address ?>web/forum"><i class="fa fa-comments"></i></a></li>
              <li><a class="blog" href="https://reddit.com/r/Pulzar"><i class="fa fa-reddit"></i></a></li>
              <li><a class="github" href="#"><i class="fa fa-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>