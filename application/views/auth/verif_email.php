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
        <div class="col-md-12 contents">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="mb-4 text-center">
                <h3 class="primaryText"><strong><?= $title; ?></strong></h3>
                <p class="mb-4 text-white">Masukkan kode verifikasi (OTP) yang telah dikirim melalui email</p>
              </div>
              <form action="<?= base_url('auth/verif_success'); ?>" method="post">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="form-group first">
                      <label for="username" class="text-warning">Kode OTP</label>
                      <input type="email" class="form-control text-white" id="username">
                    </div>
                    <button type="submit" class="btn text-white btn-block rounded rounded-pill" style="background-color: #A97798;">Verifikasi</button>
                  </div>
                </div>
              </form>
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