<?php 
include '../../app/ProductsController.php';
include '../../app/CategoryController.php';
include '../../app/CuoponsController.php';
include '../../app/TagsController.php';
include '../../app/BrandController.php';

$productsController = new ProductsController();
$categoryController = new CategoryController();
$cuoponsController = new CuoponsController();
$tagsController = new TagController();
$brandsController = new BrandController();

$products = array_reverse($productsController->get());

$categorias = $categoryController->getAll(); 

$cupones = $cuoponsController->getAll();

$tags = $tagsController->getAllTags();

$brands = $brandsController->getAll();




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
    <?php include "../layouts/navbar.php"?>
   
    
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

                   


                    <!--Categorias-->
                    <hr>
                      <div class="card" style="width: 250px;">
                        
                              <li class="list-group-item border-0 px-0 py-2" >  </li>
                                <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2"data-bs-toggle="collapse" href="#filtercollapse"> 
                               
                                  <div class="float-end" ><p class="ti ti-chevron-down ms-3 "  style="width: 40px;"><p/></div> 
                                  </a> </li>
                                  <h4>Categories</h4>
                                
                                <div class="collapse show" id="filtercollapse" >
                                  <div>
                                  <select class="form-select">
                                    <option>Todas las categorias</option>
                                    <?php foreach ($categorias["data"] as $categoria): ?>
                                      
                                      <option value="<?= $categoria['id'] ?>"><?= $categoria['name'] ?></option>
                                    <?php endforeach; ?>
                               
                                  </select>
                                  </div>
                                  <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                      Add Categories
                                  </button>
                                </div>
                           
                            
                            
                            <div>
                            <!-- Cupones -->  
                          <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse" >
                            <h4>Cupons available</h4>
                          </a>
                          <div class="collapse show" id="filtercollapse" >
                            <div>
                            <select class="form-select">
                              <option>Todos los cupones</option>
                              <?php foreach ($cupones["data"] as $cupon): ?>
                                
                                <option value="<?= $cupon['id'] ?>"><?= $cupon['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                            </div>
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addModal2">
                                Add Cupon
                            </button>
                          </div>
                       
                        </div>

                              <!--tags-->
                        <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse" >
                            <h4>Tags available</h4>
                          </a>
                          <div class="collapse show" id="filtercollapse" >
                            <div>
                            <select class="form-select">
                              <option>Todos los Tags</option>
                              <?php foreach ($tags["data"] as $tag): ?>
                                
                                <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                            </div>
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addTagModal">
                                Add Tag
                            </button>
                          </div>


                           
                        <a class="btn border-0 px-0 text-start w-100 pb-0 ms-2" data-bs-toggle="collapse" href="#filtercollapse" >
                            <h4>Brans available</h4>
                          </a>
                          <div class="collapse show" id="filtercollapse">
                            <div>
                                <select class="form-select">
                                    <option>Todos los Brands</option>
                                    <?php foreach ($brands["data"] as $brand): ?>
                                        <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addTagModal">
                                Add Brand
                            </button>

                          </div>

                       </div>


                          
                        </hr>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container mt-4">
    <div class="row g-4">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card card-custom">
                    <a href="<?php echo BASE_PATH . "products/details/" . $product->slug; ?>" class="text-decoration-none text-dark">
                        <img src="<?= $product->cover ?>" class="card-img-top" alt="<?= $product->name ?>">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($product->name) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product->description) ?></p>
                        <button type="button" class="btn btn-primary w-50 py-3" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product->id ?>">Edit</button>
                        
                        <!-- Formulario para eliminar el producto -->
                        <form method="POST" action="../../app/ProductsController.php" style="display:inline-block;">
                            <input type="hidden" name="action" value="delete_producto">
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <button type="submit" class="btn btn-danger w-50 py-3" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

              <!-- Modal para edición -->
              <div class="modal fade" id="editProductModal<?= $product->id ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Edit Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="../../app/ProductsController.php" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <!-- ID del Producto -->
                                  <input type="hidden" name="id" value="<?= $product->id ?>">
                                  <input type="hidden" name="action" value="update_producto">

                                  <!-- Nombre del Producto -->
                                  <div class="mb-3">
                                      <label for="name<?= $product->id ?>" class="form-label">Name</label>
                                      <input type="text" class="form-control" id="name<?= $product->id ?>" name="name" value="<?= htmlspecialchars($product->name) ?>">
                                  </div>

                                  <!-- Slug -->
                                  <div class="mb-3">
                                      <label for="slug<?= $product->id ?>" class="form-label">Slug</label>
                                      <input type="text" class="form-control" id="slug<?= $product->id ?>" name="slug" value="<?= htmlspecialchars($product->slug) ?>">
                                  </div>

                                  <!-- Descripción -->
                                  <div class="mb-3">
                                      <label for="description<?= $product->id ?>" class="form-label">Description</label>
                                      <textarea class="form-control" id="description<?= $product->id ?>" name="description" rows="3"><?= htmlspecialchars($product->description) ?></textarea>
                                  </div>

                                  <!-- Características -->
                                  <div class="mb-3">
                                      <label for="features<?= $product->id ?>" class="form-label">Characteristics</label>
                                      <textarea class="form-control" id="features<?= $product->id ?>" name="features" rows="3"><?= htmlspecialchars($product->features) ?></textarea>
                                  </div>

                                  <!-- ID de Brand -->
                                  <div class="mb-3">
                                      <label for="brand_id<?= $product->id ?>" class="form-label">Brand</label>
                                      <select class="form-select" id="brand_id<?= $product->id ?>" name="brand_id">
                                          <option value="">Select a Brand</option>
                                          <?php foreach ($brands["data"] as $brand): ?>
                                              <option value="<?= $brand['id'] ?>" <?= $product->brand_id == $brand['id'] ? 'selected' : '' ?>>
                                                  <?= htmlspecialchars($brand['name']) ?>
                                              </option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>

                                  <!-- Imagen de Portada -->
                                  <div class="mb-3">
                                      <label for="cover<?= $product->id ?>" class="form-label">Cover Image</label>
                                      <input type="file" class="form-control" id="cover<?= $product->id ?>" name="cover" accept="image/*">
                                      <small class="text-muted">Current: <?= htmlspecialchars($product->cover) ?></small>
                                  </div>

                                  <!-- Categorías -->
                                  <div class="mb-3">
                                      <label for="categories<?= $product->id ?>" class="form-label">Category</label>
                                      <select class="form-control" id="categories<?= $product->id ?>" name="categories">
                                          <option value="">Select a Category</option>
                                          <?php foreach ($categorias['data'] as $categoria): ?>
                                              <option value="<?= $categoria['id'] ?>" <?= $product->categories == $categoria['id'] ? 'selected' : '' ?>>
                                                  <?= htmlspecialchars($categoria['name']) ?>
                                              </option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>

                                  <!-- Tags -->
                                  <div class="mb-3">
                                      <label for="tags<?= $product->id ?>" class="form-label">Tags</label>
                                      <select class="form-control" id="tags<?= $product->id ?>" name="tags">
                                          <option value="">Select Tags</option>
                                          <?php foreach ($tags['data'] as $tag): ?>
                                              <option value="<?= $tag['id'] ?>" <?= $product->tags == $tag['id'] ? 'selected' : '' ?>>
                                                  <?= htmlspecialchars($tag['name']) ?>
                                              </option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                          </form>
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
            <a href="<?= BASE_PATH ?>">
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

              <!--Añadir producto-->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                              <div class="container mt-5">
                                <h2 class="mb-4">Crear Producto</h2>
                                <form action="../../app/ProductsController.php" method="POST" enctype="multipart/form-data">
                                   

                                    <!-- Nombre del Producto -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre del Producto</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <!-- Slug -->
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" required>
                                    </div>

                                    <!-- Descripción -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>

                                    <!-- Características -->
                                    <div class="mb-3">
                                        <label for="features" class="form-label">Características</label>
                                        <textarea class="form-control" id="features" name="features" rows="3" required></textarea>
                                    </div>

                                    <!-- ID de brand -->
                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select  type="number" class="form-select"  id="brand_id" name="brand_id" required >
                                          <option>Todos los Brands</option>
                                          <?php foreach ($brands["data"] as $brand): ?>
                                              <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                                          <?php endforeach; ?>
                                        </select> 
                                    </div>

                                    <!-- Imagen de Portada -->
                                    <div class="mb-3">
                                        <label for="cover" class="form-label">Imagen de Portada</label>
                                        
                                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*" required>
                                
                                        
                                    </div>
                                    <!-- Categorías -->
                                    <div class="mb-3">
                                      <label for="categories" class="form-label">Categoría</label>
                                      <select class="form-control" id="categories" name="categories" required>
                                        <?php foreach ($categorias['data'] as $categoria): ?>
                                          <option value="<?= $categoria['id'] ?>"><?= $categoria['name'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>

                                    <!-- Tags -->
                                    <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                      <select class="form-control" id="tags" name="tags" required>
                                        <?php foreach ($tags['data'] as $tags): ?>
                                          <option value="<?= $tags['id'] ?>"><?= $tags['name'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    
                                    <!-- Botón de Enviar -->
                                    <button type="submit" class="btn btn-primary">Crear Producto</button>
                                    <input type="hidden" name="action" value="crear_producto">
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>



          <!-- agregar cupon-->      
          <div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="addModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal2Label">Add Cupón</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/CuoponsController.php" method="POST">
                <div class="modal-body">
                  
                    <div class="mb-3">
                        <label for="name" class="form-label">Name of Cupón</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Code of Cupón</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="mb-3">
                        <label for="percentage_discount" class="form-label">Percentage Discount</label>
                        <input type="text" class="form-control" id="percentage_discount" name="percentage_discount" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_amount_required" class="form-label">Min Amount Required</label>
                        <input type="text" class="form-control" id="min_amount_required" name="min_amount_required" required>
                    </div>
                    <div class="mb-3">
                        <label for="min_product_required" class="form-label">Min Product Required</label>
                        <input type="text" class="form-control" id="min_product_required" name="min_product_required" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="text" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="text" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_uses" class="form-label">Max Uses</label>
                        <input type="text" class="form-control" id="max_uses" name="max_uses" required>
                    </div>
                    <div class="mb-3">
                        <label for="count_uses" class="form-label">Count Uses</label>
                        <input type="text" class="form-control" id="count_uses" name="count_uses" required>
                    </div>
                    <div class="mb-3">
                        <label for="valid_only_first_purchase" class="form-label">Valid Only First Purchase</label>
                        <input type="text" class="form-control" id="valid_only_first_purchase" name="valid_only_first_purchase" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Coupon</button>
                    <input type="hidden" name="action" value="new_cuopon">
                </div>
            </form>
        </div>
    </div>
</div>

          <!--agregar categoria-->

          <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/CategoryController.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <!-- Variable para category_id -->
                    <input type="hidden" name="category_id" value="0">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                    <input type="hidden" name="action" value="create_category">
                </div>
            </form>
        </div>
    </div>
</div>


 <!--agregar tag-->

 <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTagModalLabel">Add Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/TagsController.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tagName" class="form-label">Tag Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Tag</button>
                    <input type="hidden" name="action" value="new_tag">
                </div>
            </form>
        </div>
    </div>
</div>

<!--agregar brand-->

<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/BrandController.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="brandName" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Brand</button>
                    <input type="hidden" name="action" value="new_brand">
                </div>
            </form>
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