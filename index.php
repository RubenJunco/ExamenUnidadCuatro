<?php 

  include "app/config.php";
?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  <head>
    <?php include "views/layouts/head.php" ?>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main v2">
      <div class="bg-overlay bg-dark"></div>
      <div class="auth-wrapper">
        <div class="auth-sidecontent"> <div class="auth-sidefooter">
  <!-- <img src="assets/images/logo-dark.png" class="img-brand img-fluid" alt="images" /> -->
  <hr class="mb-3 mt-4" />
  <div class="row">
    <div class="col my-1">
      <p class="m-0">Made with ♥ by UABCS and Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p>
    </div>
    <div class="col-auto my-1">
      <ul class="list-inline footer-link mb-0">
        <li class="list-inline-item"><a href="../index.html">Home</a></li>
        <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
        <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
      </ul>
    </div>
  </div>
</div>
 </div>
        <div class="auth-form">
        <form action="app/AuthController.php" method="POST" class="auth-form">
    <div class="card p-3 mb-2 bg-black text-white" style="border: 1px solid white;">
    <div class="card-body">

      <div class="text-center mb-3">
        <img src="LogoMain.PNG" alt="Login Icon" class="img-fluid" style="max-width: 100px;">
      </div>
        <h4 class="f-w-500 mb-1 text-white">Login Usuario</h4>
      <!-- <p class="mb-3">Don't have an Account? <a href="register-v2.html" class="link-primary ms-1">Create Account</a></p>  -->
      
      <div class="p-3 mb-2 bg-body text-body rounded">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email Address" required />
      </div>
      
      <div class="p-3 mb-2 bg-body text-body rounded">
        <input type="password" class="form-control" id="floatingInput1" name="password" placeholder="Password" required />
      </div>
      
      <div class="d-flex mt-1 justify-content-between align-items-center">
        <div class="form-check">
         <!-- <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" name="remember_me" checked /> -->
          <!-- <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label> -->
        </div>
        
      </div>
      
      <div class="d-grid mt-4 ">
        <button type="submit" class="btn btn-secondary">Login</button>
        <input type="hidden" name="action" value="login">
      </div>
      
      <!--<div class="saprator my-3">
        <span>Or continue with</span>
      </div> 
      
      <div class="text-center">
        <ul class="list-inline mx-auto mt-3 mb-0">
          <li class="list-inline-item">
            <a href="https://www.facebook.com/" class="avtar avtar-s rounded-circle bg-facebook" target="_blank">
              <i class="fab fa-facebook-f text-white"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://twitter.com/" class="avtar avtar-s rounded-circle bg-twitter" target="_blank">
              <i class="fab fa-twitter text-white"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="https://myaccount.google.com/" class="avtar avtar-s rounded-circle bg-googleplus" target="_blank">
              <i class="fab fa-google text-white"></i>
            </a>
          </li>
        </ul>
      </div>-->
      
    </div>
  </div>
</form>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <?php include "views/layouts/scripts.php" ?>
    

  </body>
  <!-- [Body] end -->
</html>
