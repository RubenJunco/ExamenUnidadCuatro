<?php 

include "../../app/config.php";
include "../../app/ProductsController.php";



if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $ViewProduct = new ProductsController();

    // Llama al método para obtener el producto por slug
    $view = $ViewProduct->getBySlug($slug);

    
} else {
    echo "El parámetro 'slug' no fue proporcionado.";
    exit;
}



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
                  <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
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
            <div class="card">
              <div class="card-body">
                <div class="row">
                  

                  <div class="col-md-6">
                    <span class="badge bg-success f-14">In stock</span>

                    <div class="card-body">

                    <img class="card-img-top" src="<?= $view -> cover ?>" alt="Product Image"> 
                     
                      <h5 class="card-title"><?= $view->name ?></h5>
                      <p></p>
                      <p class="card-text"><?= $view->description ?></p>
                      <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">Key word</h5>
                      <p class="card-text badge bg-primary"><?= $view->slug ?></p>
                    </div>
                    
                    <hr>
                   
                    <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">About this item</h5>
                    <ul>
                    <p class="card-text"><?= $view->features?></p>
                    </ul>

                    <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">Categories</h5>
                    <ul>
                    <p class="card-text">
                        <?php if (!empty($view->categories)): ?>
                            <?php foreach ($view->categories as $category): ?>
                                <?php if (isset($category->name)): ?>
                                    <span class="badge bg-primary"><?= htmlspecialchars($category->name) ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <em>No hay categorías disponibles</em>
                        <?php endif; ?>
                    </p>

                    </ul>

                    <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">Brands </h5>
                    <ul>
                    <p class="card-text">
                        <p class="badge bg-primary"><?= $view->brand->name?></p>
                    </p>
                    </ul>

                    <h5 class="mt-4 mb-sm-3 mb-2 f-w-500">Tags</h5>
                    <ul>
                    <p class="card-text">
                        <?php if (!empty($view->tags)): ?>
                            <?php foreach ($view->tags as $tag): ?>
                                <?php if (isset($tag->name)): ?>
                                    <span class="badge bg-primary"><?= htmlspecialchars($tag->name) ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <em>No hay tags disponibles</em>
                        <?php endif; ?>
                    </p>

                    </ul>

                    
                   
                  
                    <div class="mb-3 row">
                      <label class="col-form-label col-lg-3 col-sm-12">Quantity <span class="text-danger">*</span></label>
                      <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="btn-group btn-group-sm mb-2 border" role="group">
                          <button type="button" id="decrease" onclick="decreaseValue('number')" class="btn btn-link-secondary"
                            ><i class="ti ti-minus"></i
                          ></button>
                          <input
                            class="wid-35 text-center border-0 m-0 form-control rounded-0 shadow-none"
                            type="text"
                            id="number"
                            value="0"
                          />
                          <button type="button" id="increase" onclick="increaseValue('number')" class="btn btn-link-secondary"
                            ><i class="ti ti-plus"></i
                          ></button>
                        </div>
                      </div>
                    </div>
                    <h3 class="mb-4"
                      ><b>$299.00</b><span class="mx-2 f-16 text-muted f-w-400 text-decoration-line-through">$399.00</span></h3
                    >
                    <div class="row">
                      <div class="col-6">
                        <div class="d-grid">
                          <button type="button" class="btn btn-primary">Buy Now</button>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-grid">
                          <button type="button" class="btn btn-outline-secondary">Add to cart</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div>
              <h2>Order Table</h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">orders</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Flind</td>
                    <td>3</td>
                  </tr>
                </tbody>
              </table>
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