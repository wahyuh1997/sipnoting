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
  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/bootstrap.css">

  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/style-02.css">

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
              <?php if ($this->session->flashdata('alert')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('alert'); ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
              <form action="#" method="post">
                <div class="form-group mb-4 first">
                  <label for="username" class="text-warning">Email</label>
                  <input type="email" class="form-control text-white" id="email" name="email" autofocus required>
                </div>
                <div class="form-group last mb-4">
                  <label for="password" class="text-warning">Password</label>
                  <input type="password" class="form-control text-white" id="password" name="password" minlength="6" required>
                </div>

                <button type="submit" class="btn text-white btn-block rounded rounded-pill" style="background-color: #A97798;">Masuk</button>
              </form>
              <h2 class="mt-5 line">
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
  <script src="<?= base_url('assets/login/'); ?>js/bootstrap.js"></script>
  <script src="<?= base_url('assets/login/'); ?>js/main.js"></script>
</body>

</html>