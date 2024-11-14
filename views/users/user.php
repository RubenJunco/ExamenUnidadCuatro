<?php 

  include "../../app/config.php";

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
                  <li class="breadcrumb-item" aria-current="page">Users</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Users</h2>
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
            <div class="ecom-wrapper">
              <div class="offcanvas-xxl offcanvas-start ecom-offcanvas" tabindex="-1" id="offcanvas_mail_filter">
                <div class="offcanvas-body p-0 sticky-xxl-top">
                  <div id="ecom-filter" class="show collapse collapse-horizontal">
                    <div class="ecom-filter">

                    <div>
                    <button type="button" class="btn btn-success">Add User</button>
                    </div>
                    <hr>
                      
                              </li>
                            </ul>
                          </div>
                        </hr>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ecom-content"> 
                
                <div class="row">
                  <div class="col-sm-6 col-xl-2">
                    <div class="card product-card">
                      <div class="card-img-top">

                        <a href="<?= BASE_PATH ?>users/usersDetails">
                          <img src="<?= BASE_PATH ?>assets/images/user/avatar-8.jpg" alt="image" class="img-prod img-fluid" />
                        </a>
                        
                      </div>
                      <div class="card-body">
                        <a href="<?= BASE_PATH ?>users/usersDetails">
                          <p class="prod-content mb-0 text-muted">Ruben Junco</p>
                        </a>
                        
                        <div class="d-flex">     
                          <div class="flex-grow-1 ms-3">
                            <div class="d-flex gap-2">
                              <button type="button" class="btn btn-primary">Edit</button>
                              <button type="button"  class="btn btn-danger">Delete</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
  <!-- [Body] end -->undefined
</html>