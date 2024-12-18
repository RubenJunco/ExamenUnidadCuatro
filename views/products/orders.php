<?php 

  include "../../app/config.php";
  include "../../app/OrdersController.php";
  include "../../app/clientController.php";
  include "../../app/AddressController.php";
  include "../../app/CuoponsController.php";

  $ordersController = new OrdersController();
  $clientController = new ClientController();
  $addresController = new AddressController();
  $cuoponsController = new CuoponsController();

  $ordersArray = $ordersController->getAll();
  $ordenes = $ordersArray['data'];

  var_dump($cliente);
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
                        
                        <li class="border-0 px-0 py-2" style="width: 550px; height: auto;">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">Añadir</button>
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
                    <?php foreach ($ordenes as $orden) : ?>
                      <div class="card product-card">
                        <div class="card-img-top">

                          
                        </div>
                        <div class="card-body">
                          <h3>Informacion de la compra</h3>
                          
                          <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                            <h4 class="mb-0 text-truncate">
                              <b><?= "$" . $orden['total'] ?></b> 
                              </h4>

                          </div>

                          <div>
                          <h4>Cliente:</h4>
                          <h5>
                          <?php 
                            $nombreCliente = $clientController->getClient($orden['client_id']);
                            $cliente = $nombreCliente['data'];

                            $clienteDireccion = $addresController->getAddressByClient($orden['address_id']);
                            $calle = $clienteDireccion['data'];

                            $cuponOrden = $cuoponsController->getCuopon($orden['coupon_id']);
                            $cupon = $cuponOrden['data'];

                            if ($cliente['name'] == null) {
                              echo "Sin nombre";
                            }else{
                              echo $cliente['name']; 
                            }
                          ?>
                          </h5>
                          </div>

                          <div>
                          <h4>Calle principal:</h4>
                          <h5>
                            <?php 
                              if ($calle['street_and_use_number'] == null) {
                                echo "Sin calle";
                              }else{
                                echo $calle['street_and_use_number']; 
                              }
                            ?>
                          </h5>
                          <h4>Codigo postal:</h4>
                          <h5>
                            <?php 
                              if ($calle['postal_code'] == null) {
                                echo "Sin codigo postal";
                              }else{
                                echo $calle['postal_code']; 
                              }
                            ?>
                          </h5>
                          <h4>Numero:</h4>
                          <h5>
                            <?php 
                              if ($cliente['phone_number'] == null) {
                                echo "Sin numero";
                              }else{
                                echo $cliente['phone_number']; 
                              }
                            ?>
                          </h5>
                          <h4>Ciudad:</h4>
                          <h5>
                            <?php 
                              if ($calle['city'] == null) {
                                echo "Sin ciudad";
                              }else{
                                echo $calle['city']; 
                              }
                            ?>
                          </h5>
                          </div>

                          <div>
                          <h4>Cupon:</h4>
                          <h5>
                            <?php
                              if ($cupon['name'] == null) {
                                echo "Sin cupon";
                              }else{
                                echo $cupon['name']; 
                              }
                            ?>
                          </h5>
                          </div>    

                          <div class="d-flex">
                            
                            <div class="flex-grow-1 ms-3">
                            <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">
                                Edit
                            </button>
                                <button type="button"  class="btn btn-danger">Delete</button>
                              </div>
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

    <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderModalLabel">Añadir Orden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="add_order_controller.php" method="POST">
                <div class="modal-body">
                    <!-- Folio -->
                    <div class="mb-3">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" class="form-control" id="folio" name="folio" required>
                    </div>
                    <!-- Total -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" step="0.01" class="form-control" id="total" name="total" required>
                    </div>
                    <!-- Is Paid -->
                    <div class="mb-3">
                        <label for="is_paid" class="form-label">¿Pagado?</label>
                        <select class="form-control" id="is_paid" name="is_paid" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <!-- Client ID -->
                    <div class="mb-3">
                        <label for="client_id" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="client_id" name="client_id" required>
                    </div>
                    <!-- Address ID -->
                    <div class="mb-3">
                        <label for="address_id" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address_id" name="address_id" required>
                    </div>
                    <!-- Order Status ID -->
                    <div class="mb-3">
                        <label for="order_status_id" class="form-label">Estado de la Orden</label>
                        <input type="text" class="form-control" id="order_status_id" name="order_status_id" required>
                    </div>
                    <!-- Payment Type ID -->
                    <div class="mb-3">
                        <label for="payment_type_id" class="form-label">Tipo de Pago</label>
                        <input type="text" class="form-control" id="payment_type_id" name="payment_type_id" required>
                    </div>
                    <!-- Coupon ID -->
                    <div class="mb-3">
                        <label for="coupon_id" class="form-label">Cupón</label>
                        <input type="text" class="form-control" id="coupon_id" name="coupon_id">
                    </div>
                    <!-- Presentations -->
                    <div id="presentations">
                        <h5>Presentaciones</h5>
                        <div class="presentation mb-3">
                            <label for="presentations[0][id]" class="form-label">ID Presentación</label>
                            <input type="text" class="form-control" name="presentations[0][id]" required>
                            <label for="presentations[0][quantity]" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="presentations[0][quantity]" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addPresentation">Añadir Presentación</button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Orden</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('newOrderForm').addEventListener('submit', function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      formData.append('action', 'new_order');

      fetch('../app/OrdersController.php', {
        method: 'POST',
        body: formData,
      })
        .then(response => response.json())
        .then(data => {
          console.log('Orden creada:', data);
          const modal = bootstrap.Modal.getInstance(document.getElementById('addOrderModal'));
          modal.hide();
        })
        .catch(error => console.error('Error:', error));
    });
</script>

    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="your_edit_product_controller.php" method="POST">
                <div class="modal-body">
                    <!-- Hidden field for the product ID -->
                    <input type="hidden" id="productId" name="productId" value="">

                    <!-- Field for the product name -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <!-- Field for CRUD -->
                    <div class="mb-3">
                        <label for="productCrud" class="form-label">CRUD</label>
                        <input type="text" class="form-control" id="productCrud" name="productCrud" required>
                    </div>
                    <!-- Field for the client -->
                    <div class="mb-3">
                        <label for="productClient" class="form-label">Client</label>
                        <input type="text" class="form-control" id="productClient" name="productClient" required>
                    </div>
                    <!-- Field for the main street -->
                    <div class="mb-3">
                        <label for="mainStreet" class="form-label">Main Street</label>
                        <input type="text" class="form-control" id="mainStreet" name="mainStreet" required>
                    </div>
                    <!-- Field for the colony -->
                    <div class="mb-3">
                        <label for="colony" class="form-label">Colony</label>
                        <input type="text" class="form-control" id="colony" name="colony" required>
                    </div>
                    <!-- Field for the postal code -->
                    <div class="mb-3">
                        <label for="postalCode" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                    </div>
                    <!-- Field for the number -->
                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="text" class="form-control" id="number" name="number" required>
                    </div>
                    <!-- Field for the city -->
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <!-- Field for the coupons -->
                    <div class="mb-3">
                        <label for="cupons" class="form-label">Coupons</label>
                        <input type="text" class="form-control" id="cupons" name="cupons">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
    <?php include "../layouts/footer.php" ?> 

    <?php include "../layouts/scripts.php" ?> 

    <?php include "../layouts/modals.php" ?>
  </body>
  <!-- [Body] end -->undefined
</html>