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
  <link rel="stylesheet" href="<?= base_url('assets/login/'); ?>css/style-02.css">

  <title><?= $title; ?></title>
  <style>
    .bg-process {
      position: fixed;
      z-index: 9999;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, .6);
    }

    .bg-process .spinner-border {
      width: 4rem;
      height: 4rem;
      border-width: 5px;
    }
  </style>
</head>

<body>
  <div class="bg-process d-flex justify-content-center" style="display: none !important;">
    <div class="spinner-border text-light align-self-center" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 contents">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="mb-4 text-center">
                <h3 class="primaryText"><strong><?= $title; ?></strong></h3>
                <p class="mb-4 text-white">Masukan Email Anda</p>
              </div>
              <form id="regCrudForm" data-redurl="<?= base_url('auth/check_otp_reset'); ?>" method="post">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="form-group first">
                      <label for="email" class="text-warning">Alamat Email</label>
                      <input type="text" class="form-control text-white" id="email" name="email" required>
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
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
  <script>
    $('#regCrudForm').on('submit', function(e) {
      e.preventDefault();
      // init
      var url = $(this).attr('action');
      var redUrl = $(this).data('redurl');
      var form_data = new FormData($(this)[0]);
      $.ajax({
        type: 'POST',
        url: url,
        data: form_data,
        dataType: 'JSON',
        async: true,
        processData: false,
        contentType: false,
        beforeSend: function() {
          $('.bg-process').fadeIn();
        },
        success: function(textParse) {
          $('.bg-process').attr('style', 'display: none !important');
          if (textParse.status == true) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: textParse.message,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = redUrl;
              }
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: textParse.message,
            })
          }
        }
      }).fail(function(jqXHR, ajaxOptions, thrownError) {
        $('.bg-process').attr('style', 'display: none !important');
        Swal.fire({
          icon: 'error',
          title: 'Failed',
          text: 'Server Not Responding',
        })
      });
    });
  </script>
</body>

</html>