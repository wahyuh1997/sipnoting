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
        <div class="col-md-6 order-md-2 d-flex justify-content-center" style="position: relative; height: 350px;">
          <img src="<?= base_url('assets/login/images/rectangle.png'); ?>" alt="Image" width="80%" class="img-fluid rectangle">
          <img src="<?= base_url('assets/login/images/img-login.png'); ?>" alt="Image" class="img-fluid rectangle">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3 class="primaryText"><strong>SIPNOTING</strong></h3>
                <p class="mb-4 text-white">Sistem Pakar Diagnosis Stunting.</p>
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username" class="text-warning">Email</label>
                  <input type="email" class="form-control text-white" id="username">

                </div>
                <div class="form-group last mb-4">
                  <label for="password" class="text-warning">Password</label>
                  <input type="password" class="form-control text-white" id="password">

                </div>

                <button type="submit" class="btn text-white btn-block rounded rounded-pill" style="background-color: #A97798;">Masuk</button>
              </form>
              <h2 class="mt-5">
                <a href="<?= base_url('auth/register'); ?>" class="text-decoration-none">Belum Punya Akun ? <span>Daftar</span></a>
              </h2>
              <div class="row">
                <div class="col-lg-12 text-center">
                  <a href="<?= base_url('home'); ?>" class="text-decoration-none text-white">Kembali Ke Beranda</a>
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