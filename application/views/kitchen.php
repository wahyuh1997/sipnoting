<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>I2B | POS - Customer Order System</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN core-css ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/plugins/select2/dist/css/select2.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/plugins/select2/dist/css/select2-bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/vendor.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
  <!-- BEGIN #loader -->
  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>
  <!-- END #loader -->

  <!-- BEGIN #app -->
  <div id="app" class="app app-content-full-height app-without-sidebar app-without-header bg-white">
    <!-- BEGIN #content -->
    <div id="content" class="app-content p-0">
      <!-- BEGIN pos-kitchen -->
      <div class="pos pos-kitchen" id="pos-kitchen">
        <div class="pos-kitchen-header">
          <div class="logo">
            <a href="#">
              <div class="logo-img"><img src="<?= base_url(); ?>assets/img/pos/logo.svg" /></div>
              <div class="logo-text">Pine & Dine</div>
            </a>
          </div>
          <div class="time" id="time">00:00</div>
          <div class="nav">
            <div class="nav-item">
              <a href="<?= base_url('login/logout'); ?>" class="btn-logout dropdown-item" data-redurl="<?= base_url('login'); ?>"><b>KELUAR</b></a>
            </div>
          </div>
        </div>
        <div class="pos-kitchen-body">

        </div>
      </div>
      <!-- END pos-kitchen -->
    </div>
    <!-- END #content -->

    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
  </div>
  <!-- END #app -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Alasan Pembatalan :</label>
            <select class="form-select default-select2" id="keterangan" name="keterangan">
              <option selected value="Stok Habis">Stok Habis</option>
              <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btn-submit-cancel" class="btn btn-danger">Batalkan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================== BEGIN core-js ================== -->
  <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
  <!-- ================== END core-js ================== -->

  <!-- ================== BEGIN page-js ================== -->
  <script src="<?= base_url(); ?>assets/plugins/select2/dist/js/select2.full.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/demo/pos-kitchen-order.demo.js"></script>
  <!-- ================== END page-js ================== -->

  <script>
    load_kitchen();

    function load_kitchen() {
      $.get('kitchen/load_kitchen', function(html) {
        $('.pos-kitchen-body').html(html);
      });
    }

    $(document).on('click', '#btn-complete', function(e) {
      e.preventDefault();
      let menuId = $(this).parent().data('id');
      let qty = $(this).parent().data('qty');

      update_kitchen(menuId, 1, 'complete', qty);
    })

    $(document).on('click', '#btn-cancel', function(e) {
      e.preventDefault()
      selectRefresh()
      let menuId = $(this).parent().data('id');
      let menu = $(this).data('menu');
      $('#btn-submit-cancel').attr('data-id', menuId)
      $('#btn-submit-cancel').attr('data-menu', menu)

      $('#exampleModal').modal('show')
    })

    $(document).on('click', '#btn-submit-cancel', function(e) {
      let menuId = $(this).data('id');
      let menu = $(this).data('menu');
      let message = $('#keterangan').val();

      $.get("<?= base_url('dashboard/call_service?menu='); ?>" + menu + '&text=' + message, function(data) {

        $('#exampleModal').modal('hide')
        // $('#keterangan').val('')
      })

      update_kitchen(menuId, 3, 'cancel', 0, $('#keterangan').val());
      $('#exampleModal').modal('hide')
    })

    function selectRefresh() {
      $('.default-select2').each(function() {
        $(this).select2({
          dropdownParent: $(this).parent()
        });
      });
    }

    function update_kitchen(menuId, status, param, qty, keterangan = '') {
      let text;

      if (param === 'complete') {
        text = 'Pesanan ini telah selesai dibuat ?';
      } else {
        text = 'Ingin Membatalkan Pesanan ini ?';
      }

      swal({
        title: 'Apakah anda yakin ?',
        text: text,
        icon: 'info',
        buttons: {
          cancel: {
            text: 'Tidak',
            value: null,
            visible: true,
            className: 'btn btn-default',
            closeModal: true,
          },
          confirm: {
            text: 'Ya',
            value: true,
            visible: true,
            className: 'btn btn-primary',
            closeModal: true
          }
        }

      }).then((result) => {
        if (result == true) {
          $.ajax({
            url: 'kitchen/order_completed/' + menuId + '/' + param,
            method: 'POST',
            async: true,
            dataType: 'JSON',
            data: {
              status: status,
              qty: qty,
              keterangan: keterangan,
            },
            success: function(res) {
              if (res.status == true) {
                swal({
                    title: 'Success',
                    text: res.message,
                    icon: 'success',
                    buttons: {
                      confirm: {
                        text: 'Ok',
                        value: true,
                        visible: true,
                        className: 'btn btn-primary',
                        closeModal: true
                      }
                    }
                  })
                  .then((result) => {
                    if (result == true) {
                      load_kitchen()
                    }
                  })
              } else {
                swal({
                  icon: 'error',
                  title: 'Failed',
                  text: res['message'],
                })
              }
            }
          })
        } {
          return false
        }
      })
    }

    setInterval(function() {
      load_kitchen()
    }, 30000)

    /* Logout Function */
    $(document).on('click', '.btn-logout', function(e) {
      e.preventDefault();

      // init
      var url = $(this).attr('href');
      var redUrl = $(this).data('redurl');

      // confirmation
      swal({
        title: 'Are you sure?',
        text: 'Want To Logout ?',
        icon: 'info',
        buttons: {
          cancel: {
            text: 'No',
            value: null,
            visible: true,
            className: 'btn btn-default',
            closeModal: true,
          },
          confirm: {
            text: 'Yes',
            value: true,
            visible: true,
            className: 'btn btn-primary',
            closeModal: true
          }
        }
      }).then((result) => {
        // check if confirmed
        if (result == false) {
          return false;
        } else if (result == true) {
          $.get(url, function() {
            window.location.href = redUrl;
          });
        }
      });
    });
  </script>
</body>

</html>