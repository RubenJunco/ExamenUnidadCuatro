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
                  <li class="breadcrumb-item" aria-current="page">Orders</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Orders</h2>
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

                        <div class="card">
                        
                        <li class="list-group-item border-0 px-0 py-2" style="width: 550px; height: auto;">
                          <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse2 " >
                            <div class="float-end" style="width: 300px; height: 10px;"><i class="ti ti-chevron-down ms-3 " ></i></div> 
                            Order by:
                          </a>
                          <div class="collapse show" id="filtercollapse2" >
                            <div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="categoryfilter1" value="option1" />
                                <label class="form-check-label" for="categoryfilter1">Date</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="categoryfilter2" value="option2" />
                                <label class="form-check-label" for="categoryfilter2">Default</label>
                              </div>
                          
                              </div>
                            </div>
                          </div>
                          <hr>
                        </li>
                      </ul>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ecom-content"> 
                
                <div class="row">
                  <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                      <div class="card-img-top">

                      
                        <a href="details">
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-3.jpg" alt="image" class="img-prod img-fluid" />
                        </a>
                        
                      </div>
                      <div class="card-body">
                        <h3>Informacion of the orther</h3>
                        <a>
                          <p class="prod-content mb-0 text-muted">Zapatos</p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h4 class="mb-0 text-truncate">
                             <b>$2369.00</b> 
                            </h4>

                        </div>

                        <div>
                        <h4>Client</h4>
                        <h5>bob</h5>
                        </div>

                        <div>
                        <h4>Mailing address</h4>
                        <h5>...</h5>
                        <h5>...</h5>
                        <h5>...</h5>
                        <h5>...</h5>
                        <h5>...</h5>
                        </div>

                        <div>
                        <h4>Cupon:</h4>
                        <h5>none</h5>
                        </div>    

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


    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas" aria-labelledby="productOffcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="productOffcanvasLabel">Product Details</h5>
        <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
          <i class="ti ti-x f-20"></i>
        </a>
      </div>
      <div class="offcanvas-body">
        <div class="card product-card shadow-none border-0">
          <div class="card-img-top p-0">
            <a href="<?= BASE_PATH ?>details">
              <img src="<?= BASE_PATH ?>assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
            </a>
            <div class="card-body position-absolute end-0 top-0">
              <div class="form-check prod-likes">
                <input type="checkbox" class="form-check-input" />
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-heart prod-likes-icon"
                >
                  <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"
                  ></path>
                </svg>
              </div>
            </div>
            <div class="card-body position-absolute start-0 top-0">
              <span class="badge bg-danger badge-prod-card">30%</span>
            </div>
          </div>
        </div>
        <h5>Glitter gold Mesh Walking Shoes</h5>
        <p class="text-muted"
          >Image Enlargement: After shooting, you can enlarge photographs of the objects for clear zoomed view. Change In Aspect Ratio:
          Boldly crop the subject and save it with a composition that has impact.</p
        >
        <ul class="list-group list-group-flush">
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Price</p>
              <h4 class="mb-0"><b>$299.00</b><span class="mx-2 f-14 text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Categories</p>
              <h6 class="mb-0">Shoes</h6>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Status</p>
              <h6 class="mb-0"><span class="badge bg-warning rounded-pill">Process</span></h6>
            </div>
          </li>
          <li class="list-group-item px-0">
            <div class="d-inline-flex align-items-center justify-content-between w-100">
              <p class="mb-0 text-muted me-1">Brands</p>
              <h6 class="mb-0"><img src="<?= BASE_PATH ?>assets/images/application/img-prod-brand-1.png" alt="user-image" class="wid-40" /></h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>