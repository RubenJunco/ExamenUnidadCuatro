<?php 
   include "../../app/config.php";
   include "../../app/UserController.php";
   $userController = new UserController();
   $usersArray = $userController->getAll();
   $users = $usersArray['data'];

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
                <?php if (isset($users) && count($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <!-- [ sample-page ] start -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card user-card shadow-sm">
                                <div class="card-body">
                                    <div class="position-relative">
                                        <img src="../assets/images/application/img-user-cover-1.jpg" alt="cover-image" class="img-fluid rounded-top" />
                                        <div class="position-absolute bottom-0 start-0 p-2 bg-dark bg-opacity-50 rounded text-white d-inline-flex align-items-center">
                                            <i class="ph-duotone ph-star text-warning me-1"></i>
                                            4.5 <small class="text-white text-opacity-75 ms-1">/ 5</small>
                                        </div>
                                    </div>
                                    <div class="position-relative text-center mt-n5">
                                        <img src="../assets/images/user/avatar-1.jpg" alt="user-image" class="img-thumbnail rounded-circle border border-3 border-white" style="width: 80px; height: 80px;">
                                        <i class="bg-success position-absolute bottom-0 end-0 border border-white rounded-circle" style="width: 12px; height: 12px;"></i>
                                    </div>
                                    <div class="text-center mt-3">
                                        <h6 class="mb-0"><?php echo $user['name']; ?></h6>
                                        <h6 class="mb-0"><?php echo $user['lastname']; ?></h6>
                                        <p class="text-muted text-sm mb-1"><a href="#" class="text-primary"><?php echo $user ['email']; ?></a></p>
                                    </div>
                                    <div class="border-top border-light my-3 pt-2 text-center">
              

                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="badge bg-light-secondary border rounded-pill border-secondary bg-transparent f-14 me-1 mt-1"><?php echo $user['role']; ?></span>
                                        <span class="badge bg-light-secondary border rounded-pill border-secondary bg-transparent f-14 me-1 mt-1"><?php echo $user['phone_number']; ?></span>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        
                                        
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- [ sample-page ] end -->
            </div>
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
</html>