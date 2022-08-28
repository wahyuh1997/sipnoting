<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>TAMAN IDE POS | Login</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN core-css ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/vendor.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
  <!-- BEGIN #loader -->
  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>
  <!-- END #loader -->


  <!-- BEGIN #app -->
  <div id="app" class="app">
    <!-- BEGIN login -->
    <div class="login login-v2 fw-bold">
      <!-- BEGIN login-cover -->
      <div class="login-cover">
        <div class="login-cover-img" style="background-image: url(<?= base_url('assets/img/logo/logo.jpeg') ?>)" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
      </div>
      <!-- END login-cover -->

      <!-- BEGIN login-container -->
      <div class="login-container">
        <!-- BEGIN login-header -->
        <div class="login-header">
          <div class="brand">
            <div class="d-flex align-items-center">
              <span class="logo"></span> <b>TAMAN IDE POS</b>
            </div>
            <small>Login</small>
          </div>
          <div class="icon">
            <i class="fa fa-lock"></i>
          </div>
        </div>
        <!-- END login-header -->

        <!-- BEGIN login-content -->
        <div class="login-content">
          <?php if ($this->session->flashdata('notice')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?= $this->session->flashdata('notice'); ?></strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <form action="<?= base_url('login/process'); ?>" method="POST">
            <div class="form-floating mb-20px">
              <input type="text" class="form-control fs-13px h-45px border-0" placeholder="Username" name="username" id="username" />
              <label for="username" class="d-flex align-items-center text-gray-600 fs-13px">Username</label>
            </div>
            <div class="form-floating mb-20px">
              <input type="password" class="form-control fs-13px h-45px border-0" name="password" placeholder="Password" />
              <label for="password" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
            </div>
            <div class="mb-20px">
              <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Log in</button>
            </div>
          </form>
        </div>
        <!-- END login-content -->
      </div>
      <!-- END login-container -->
    </div>
    <!-- END login -->

    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
  </div>
  <!-- END #app -->

  <!-- ================== BEGIN core-js ================== -->
  <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- ================== END core-js ================== -->

  <!-- ================== BEGIN page-js ================== -->
  <script src="<?= base_url() ?>assets/js/demo/login-v2.demo.js"></script>
  <!-- ================== END page-js ================== -->
</body>

</html>