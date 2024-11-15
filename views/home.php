<?php 
session_start();
if(!isset($_SESSION["user_data"])){
  header("Location:" . BASE_PATH . "index.php");
 }

  include "../app/config.php";

?>
<!doctype html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <?php include "layouts/head.php" ?>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body data-pc-preset="preset-1" data-pc-theme="dark">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    
    <!-- [ Pre-loader ] End --> 
    <?php include "layouts/sidebar.php" ?> 
    <?php include "layouts/navbar.php" ?>
    <!-- [ Main Content ] start -->
    
     <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li> 
                  <li class="breadcrumb-item" aria-current="page">Home</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Home</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
  
          <div class="col-md-6 col-xl-7">
            <div class="card">
              <div class="card-header">
                <h5>Users of all using the page right now</h5>
              </div>
              <div class="card-body">
                <div id="world-map-markers" class="set-map" style="height: 365px"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-5">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Net profits</h5>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="avtar avtar-s bg-dark-primary flex-shrink-0">
                    <i class="ph-duotone ph-money f-20"></i>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 text-muted">Total Earnings</p>
                    <h5 class="mb-0">$462.45</h5>
                  </div>
                </div>
                <div id="earnings-users-chart"></div>
              </div>
            </div>
            
          <div class="col-md-12 col-xl-4">
            <div class="card statistics-card-1 overflow-hidden">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Recent Users</h5>
                <div class="dropdown">
                  <a
                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                    href="#"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="material-icons-two-tone f-18">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">View</a>
                    <a class="dropdown-item" href="#">Edit</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h2 class="mb-3"
                    ><b>4.7<small class="text-muted f-18">/5</small></b></h2
                  >
                  <div class="star mb-3 f-20">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star-half-alt text-warning"></i>
                  </div>
                </div>
                <div class="row align-items-center g-3 mb-2">
                  <div class="col-auto">
                    <h6 class="mb-0">5 <i class="fas fa-star text-warning"></i></h6>
                  </div>
                  <div class="col">
                    <div class="progress" style="height: 8px">
                      <div class="progress-bar bg-primary" style="width: 70%"></div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <p class="mb-0 text-muted">384</p>
                  </div>
                </div>
                <div class="row align-items-center g-3 mb-2">
                  <div class="col-auto">
                    <h6 class="mb-0">4 <i class="fas fa-star text-warning"></i></h6>
                  </div>
                  <div class="col">
                    <div class="progress" style="height: 8px">
                      <div class="progress-bar bg-primary" style="width: 55%"></div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <p class="mb-0 text-muted">145</p>
                  </div>
                </div>
                <div class="row align-items-center g-3 mb-2">
                  <div class="col-auto">
                    <h6 class="mb-0">3 <i class="fas fa-star text-warning"></i></h6>
                  </div>
                  <div class="col">
                    <div class="progress" style="height: 8px">
                      <div class="progress-bar bg-primary" style="width: 40%"></div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <p class="mb-0 text-muted">24</p>
                  </div>
                </div>
                <div class="row align-items-center g-3 mb-2">
                  <div class="col-auto">
                    <h6 class="mb-0">2 <i class="fas fa-star text-warning"></i></h6>
                  </div>
                  <div class="col">
                    <div class="progress" style="height: 8px">
                      <div class="progress-bar bg-primary" style="width: 25%"></div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <p class="mb-0 text-muted">1</p>
                  </div>
                </div>
                <div class="row align-items-center g-3">
                  <div class="col-auto">
                    <h6 class="mb-0">1 <i class="fas fa-star text-warning"></i></h6>
                  </div>
                  <div class="col">
                    <div class="progress" style="height: 8px">
                      <div class="progress-bar bg-primary" style="width: 10%"></div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <p class="mb-0 text-muted">0</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-8">
            <div class="card table-card">
              <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Recent Users</h5>
              </div>
              <div class="card-body py-2 px-0">
                <div class="table-responsive">
                  <table class="table table-hover table-borderless table-sm mb-0">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="<?= BASE_PATH ?>assets/images/user/avatar-1.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Ruben Junco</h6>
                              <p class="m-b-0">Front end developer</p>
                            </div>
                          </div>
                        </td>
                        <td
                          ><p class="mb-0"><i class="ph-duotone ph-circle text-warning f-12"></i> 17 nov 1:30</p></td
                        >
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="<?= BASE_PATH ?>assets/images/user/avatar-2.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Carlos Carballo</h6>
                              <p class="m-b-0">Back-end developer</p>
                            </div>
                          </div>
                        </td>
                        <td
                          ><p class="mb-0"><i class="ph-duotone ph-circle text-success f-12"></i> 17 nov 3:30</p></td
                        >
                      </tr>
                      <tr>
                        <td>
                          <div class="d-inline-block align-middle">
                            <img
                              src="<?= BASE_PATH ?>assets/images/user/avatar-3.jpg"
                              alt="user image"
                              class="img-radius align-top m-r-15"
                              style="width: 40px"
                            />
                            <div class="d-inline-block">
                              <h6 class="m-b-0">Mario Gragueda</h6>
                              <p class="m-b-0">Q.A developer</p>
                            </div>
                          </div>
                        </td>
                        <td
                          ><p class="mb-0"><i class="ph-duotone ph-circle text-primary f-12"></i> 17 nov 12:30</p></td
                        >
                      </tr>
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    
    <?php include "layouts/footer.php" ?> 

    <script src="<?= BASE_PATH ?>assets/js/plugins/apexcharts.min.js"></script>
    <script src="<?= BASE_PATH ?>assets/js/plugins/jsvectormap.min.js"></script>
    <script src="<?= BASE_PATH ?>assets/js/plugins/world.js"></script>
    <script src="<?= BASE_PATH ?>assets/js/plugins/world-merc.js"></script>
    <script src="<?= BASE_PATH ?>assets/js/pages/dashboard-default.js"></script>

    <?php include "layouts/scripts.php" ?> 

    <?php include "layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>