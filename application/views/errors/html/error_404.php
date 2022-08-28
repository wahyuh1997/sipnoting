<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>404 Error Page</title>
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
    <!-- BEGIN error -->
    <div class="error">
      <div class="error-code">404</div>
      <div class="error-content">
        <div class="error-message">We couldn't find it...</div>
        <div class="error-desc mb-4">
          The page you're looking for doesn't exist. <br />
          Perhaps, there pages will help find what you're looking for.
        </div>
        <div>
          <a href="<?= base_url(); ?>" class="btn btn-success px-3">Go Home</a>
        </div>
      </div>
    </div>
    <!-- END error -->

    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
  </div>
  <!-- END #app -->

  <!-- ================== BEGIN core-js ================== -->
  <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- ================== END core-js ================== -->
</body>

</html>