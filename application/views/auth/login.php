


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title ?></title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?= base_url('assets/PosDash/html') ?>/assets/images/logo_coffee.jpg" />
      <link rel="stylesheet" href="<?= base_url('assets/PosDash/html') ?>/assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="<?= base_url('assets/PosDash/html') ?>/assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="<?= base_url('assets/PosDash/html') ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="<?= base_url('assets/PosDash/html') ?>/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="<?= base_url('assets/PosDash/html') ?>/assets/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">

                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Login</h2>
                                 <p>Silahkan login terlebih dahulu!</p>
                               <?= $this->session->flashdata('notif'); ?>

                                 <form method="POST" action="<?= base_url('auth') ?>">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder=" " name="username">
                                             <label>Username</label>
                                          </div>
                                          <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="password" placeholder=" " name="password">
                                             <label>Password</label>
                                          </div>
                                          <?php echo form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                       </div>
                                       
                                       
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <p class="mt-3">
                                       Belum punya akun ? <a href="<?= base_url('Auth/daftar') ?>" class="text-primary">Daftar!</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="<?= base_url('assets/PosDash/html') ?>/assets/images/login/coffee.gif" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="<?= base_url('assets/PosDash/html') ?>/assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="<?= base_url('assets/PosDash/html') ?>/assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url('assets/PosDash/html') ?>/assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="<?= base_url('assets/PosDash/html') ?>/assets/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="<?= base_url('assets/PosDash/html') ?>/assets/js/app.js"></script>
  </body>
</html>