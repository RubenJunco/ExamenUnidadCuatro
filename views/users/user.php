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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Add User
                    </button>
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
                        
                      <div class="col">
                      <div class="card-body">
                        <a href="<?= BASE_PATH ?>users/usersDetails">
                          <p class="prod-content mb-0 text-muted">Ruben Abdel</p>
                        </a>
                        
                        <div class="d-flex">     
                          <div class="flex-grow-1 ms-3">
                            <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                Edit
                            </button>
                              
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
          </div>
          <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
      <!--Agregar Ususario-->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="ruta_a_tu_controlador_usuario.php" method="POST">
                <div class="modal-body">
              
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="userName" required>
                    </div>
                  
                    <div class="mb-3">
                        <label for="userLastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="userLastname" name="userLastname" required>
                    </div>
                   
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                    </div>
                  
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Rol</label>
                        <select class="form-control" id="userRole" name="userRole" required>
                            <option value="">Select a role</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                            
                        </select>
                    </div>
                  
                    <div class="mb-3">
                        <label for="createdBy" class="form-label">Created by</label>
                        <input type="text" class="form-control" id="createdBy" name="createdBy" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="ruta_a_tu_controlador_editar_usuario.php" method="POST">
                <div class="modal-body">
                   
                    <input type="hidden" id="userId" name="userId" value="">

                   
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" name="userName" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editUserLastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="editUserLastname" name="userLastname" required>
                    </div>
                   
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="userEmail" required>
                    </div>
                  
                    <div class="mb-3">
                        <label for="editUserRole" class="form-label">Rol</label>
                        <select class="form-control" id="editUserRole" name="userRole" required>
                            <option value="">Seleccione un rol</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">viewer</option>
                            
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <label for="editCreatedBy" class="form-label">Created Por</label>
                        <input type="text" class="form-control" id="editCreatedBy" name="createdBy" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Cambios</button>
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