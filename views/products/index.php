<?php 
  
  

  include "../../app/config.php";
  require "../../app/ProductsController.php";

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
                  <li class="breadcrumb-item" aria-current="page">Products</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="page-header-title">
                  <h2 class="mb-0">Products</h2>
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</button>
                    </div>

                   



                    <hr>
                      <div class="card">
                        
                              <li class="list-group-item border-0 px-0 py-2" style="width: 550px; height: auto;">
                                <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse2 " >
                                  <div class="float-end" style="width: 300px; height: 10px;"><i class="ti ti-chevron-down ms-3 " ></i></div> 
                                  Categories
                                </a>
                                <div class="collapse show" id="filtercollapse2" >
                                  <div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter1" value="option1" />
                                      <label class="form-check-label" for="categoryfilter1">All</label>
                                    </div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter2" value="option2" />
                                      <label class="form-check-label" for="categoryfilter2">Electronics</label>
                                    </div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter3" value="option3" />
                                      <label class="form-check-label" for="categoryfilter3">Fashion</label>
                                    </div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter4" value="option1" />
                                      <label class="form-check-label" for="categoryfilter4">Kitchen</label>
                                    </div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter5" value="option2" />
                                      <label class="form-check-label" for="categoryfilter5">Books</label>
                                    </div>
                                    <div class="form-check my-2 ms-2">
                                      <input class="form-check-input" type="checkbox" id="categoryfilter6" value="option3" />
                                      <label class="form-check-label" for="categoryfilter6">Toys</label>
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-primary ms-2">Add Categories</button>
                                </div>
                              </li>
                            </ul>

                            
                            <div>
                            <li class="list-group-item border-0 px-0 py-2" style="width: 550px; height: auto;">
                          <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse2 " >
                            <div class="float-end" style="width: 300px; height: 10px;"><i class="ti ti-chevron-down ms-3 " ></i></div> 
                            Cupons available
                          </a>
                          <div class="collapse show" id="filtercollapse2" >
                            <div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option1" />
                                <label class="form-check-label" for="categoryfilter1">DOOM</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option2" />
                                <label class="form-check-label" for="categoryfilter2">ELLE</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option3" />
                                <label class="form-check-label" for="categoryfilter3">POPIPOM</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option4" />
                                <label class="form-check-label" for="categoryfilter4">ACCTION10</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option5" />
                                <label class="form-check-label" for="categoryfilter5">SCHOOLBACK</label>
                              </div>
                              <div class="form-check my-2 ms-2">
                                <input class="form-check-input" type="checkbox" id="" value="option6" />
                                <label class="form-check-label" for="categoryfilter6">БОКЪ КУПОНЫ</label>
                              </div>
                            </div>
                            <button type="button" class="btn btn-primary ms-2">Add Cupon</button>
                          </div>
                        </li>
                        </div>
                       </div>


                          
                        </hr>
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
                          <img src="<?= BASE_PATH ?>assets/images/application/img-prod-1.jpg" alt="image" class="img-prod img-fluid" />
                        </a>
                        <div class="card-body position-absolute end-0 top-0">
                          <div class="form-check prod-likes">
                            <input type="checkbox" class="form-check-input" />
                            <i data-feather="heart" class="prod-likes-icon"></i>
                          </div>
                        </div>
                      </div>
                      <?php foreach ($products as $product): ?>
                      <div class="card-body">
                        <a href="<?= BASE_PATH ?>products/details?id=<?= $product['id'] ?>">
                          <p class="prod-content mb-0 text-muted"><?= htmlspecialchars($product['name']) ?></p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                          <h4 class="mb-0 text-truncate">
                            <b>$<?= number_format($product['price'], 2) ?></b>
                            <?php if ($product['discounted_price']): ?>
                              <span class="text-sm text-muted f-w-400 text-decoration-line-through">$<?= number_format($product['discounted_price'], 2) ?></span>
                            <?php endif; ?>
                          </h4>
                          <div class="d-inline-flex align-items-center">
                            <i class="ph-duotone ph-star text-warning me-1"></i>
                            <?= number_format($product['rating'], 1) ?> <small class="text-muted">/ 5</small>
                          </div>
                        </div>
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <a href="#" class="avtar avtar-s btn-link-secondary btn-prod-card" data-bs-toggle="offcanvas" data-bs-target="#productOffcanvas">
                              <i class="ph-duotone ph-eye f-18"></i>
                            </a>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <div class="d-flex gap-2">
                              <button type="button" class="btn btn-primary">Edit</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                              <button class="btn btn-warning btn-prod-card">Add to cart</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
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


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addModalLabel">Añadir Producto</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="agregar.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                  <label for="productName" class="form-label">Nombre del Producto</label>
                                  <input type="text" class="form-control" id="productName" name="productName" placeholder="Ingresa el nombre del producto" required>
                                </div>
                                <div class="mb-3">
                                  <label for="productDescription" class="form-label">Descripción</label>
                                  <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Descripción breve" required>
                                </div>
                                <div class="mb-3">
                                  <label for="productSlug" class="form-label">slug</label>
                                  <input type="text" class="form-control" id="productSlug" name="productSlug" placeholder="Precio del producto" required>
                                </div>
                                <div class="mb-3">
                                  <label for="productFeactures" class="form-label">Caracteristicas</label>
                                  <input type="text" class="form-control" id="productFeactures" name="productFeactures" placeholder="Precio del producto" required>
                                </div>
                                <div class="mb-3">
                                  <label for="productCategory" class="form-label">Categoría</label>
                                  <select class="form-control" id="productCategory" name="productCategory" required>
                                    
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="productImage" class="form-label">Imagen del Producto</label>
                                  <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-success">Añadir Producto</button>
                                <input type="hidden" name="addProduct">
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
    <!-- [ Main Content ] end -->
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>