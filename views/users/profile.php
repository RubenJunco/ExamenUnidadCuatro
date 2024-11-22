<?php 

  include "../../app/config.php";

session_start();


?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <?php include "../layouts/head.php" ?>
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
    <?php include "../layouts/sidebar.php" ?> 
    <?php include "../layouts/navbar.php" ?>
    
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Main</a></li>
                  <li class="breadcrumb-item" aria-current="page">User</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">User</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ sample-page ] start -->
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="sticky-md-top product-sticky">
                      <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider" data-bs-ride="carousel">
                        <div class="carousel-inner bg-light rounded position-relative">
                          <div class="card-body position-absolute end-0 top-0">
                            <div class="form-check prod-likes">
                              <input type="checkbox" class="form-check-input" />
                              
                            </div>
                          </div>
                          <div class="card-body position-absolute bottom-0 end-0">
                            <ul class="list-inline ms-auto mb-0 prod-likes">
                              <li class="list-inline-item m-0">
                                <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                  <i class="ti ti-zoom-in f-18"></i>
                                </a>
                              </li>
                              <li class="list-inline-item m-0">
                                <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                  <i class="ti ti-zoom-out f-18"></i>
                                </a>
                              </li>
                              <li class="list-inline-item m-0">
                                <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                  <i class="ti ti-rotate-clockwise f-18"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="carousel-item active">
                            <img src="<?= BASE_PATH ?>assets/images/user/avatar-8.jpg" class="d-block w-100" alt="Product images" />
                          </div>
                         
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">

                  <h2>General information</h2>
                    <h4>Name</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->name); ?></h5>
                    <h4>Lastname</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->lastname); ?></h5>
                    <h4>Email</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->email); ?></h5>
                    <h4>Role</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->role); ?></h5>
    
                    <hr>
                    <h2>Specific information</h2>
                    <h4>Id</h4>
                    <h5><?php echo ($_SESSION["user_data"]->id); ?></h5>
                    <h4>Created by</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->created_by); ?></h5>
                    <h4>Created at</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->created_at); ?></h5>
                    <h4>Updated at</h4>
                    <h5 class="my-3"><?php echo ($_SESSION["user_data"]->updated_at); ?></h5>
                    <hr>
                    
                    
                    
                  </div>
                </div>
              </div>
           
            
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->
</html>