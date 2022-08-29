<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/style.css">

  <title><?= $title; ?></title>
</head>

<body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 d-flex justify-content-center" style="position: relative; height: 250px;">
          <img src="<?= base_url('assets/login/images/verif-success.png'); ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-12 contents">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="mb-4 text-center">
                <h3 class="primaryText"><strong><?= $title; ?></strong></h3>
                <p class="mb-4 text-white">Akun Anda sudah terdaftar. Harap login dengan menggunakan email</p>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-8">
                  <a href="<?= base_url('auth/login'); ?>" class="btn text-white btn-block rounded rounded-pill text-decoration-none pt-3" style="background-color: #A97798;">Login Dengan Email</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="<?= base_url('assets/login/'); ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/login/'); ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/login/'); ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/login/'); ?>js/main.js"></script>
</body>

</html>