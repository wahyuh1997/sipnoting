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
              <form id="regCrudForm" data-redurl="<?= base_url('auth/verif_success'); ?>" method="post">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="form-group first">
                      <label for="kode_otp" class="text-warning">Kode OTP</label>
                      <input type="number" class="form-control text-white" id="kode_otp" minlength="6" maxlength="6" name="kode_otp" required>
                    </div>
                    <div id="countdown" class="text-white text-center mb-3">
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

    countdown();

    function countdown() {
      var timeleft = 15;
      var downloadTimer = setInterval(function() {
        if (timeleft <= 0) {
          clearInterval(downloadTimer);
          document.getElementById("countdown").innerHTML = `<a href="#" class="text-white send-code">Kirim Ulang Kode OTP</a>`;
        } else {
          document.getElementById("countdown").innerHTML = `Kirim Ulang (${timeleft})`;
        }
        timeleft -= 1;
      }, 1000);
    }

    $(document).on('click', '.send-code', function(e) {
      e.preventDefault();
      $.get('resend_otp', function(data) {});
      countdown();
    })
  </script>
</body>

</html>