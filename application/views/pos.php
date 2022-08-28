<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>TAMAN IDE | POS</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN core-css ================== -->
  <link rel="icon" href="<?= base_url('assets/img/logo/logo.jpeg') ?>" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/vendor.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/default/app.min.css" rel="stylesheet" />

  <link href="<?= base_url() ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

  <style>
    #reader {
      position: absolute !important;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 999;
      background: white;
    }
  </style>
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
    <?php if ($data_order['status'] == false) : ?>
      <?php if ($this->session->flashdata('notice')) : ?>
        <div class="flashdata"></div>
      <?php endif; ?>
      <div id="reader" width="600px"></div>
    <?php endif; ?>
    <!-- BEGIN #content -->
    <div id="content" class="app-content p-0">
      <!-- BEGIN pos -->
      <div class="pos pos-customer" id="pos-customer">
        <!-- BEGIN pos-menu -->
        <div class="pos-menu">
          <div class="logo">
            <a href="#">
              <div class="logo-img" style="height: 80px !important;">
                <img src="<?= base_url('assets/img/logo/logo.jpeg') ?>" width="80" />
              </div>
              <!-- <div class="logo-text">Pine & Dine</div> -->
            </a>
          </div>
          <div class="nav-container">
            <!-- data-scrollbar="true" data-height="100%" data-skip-mobile="true" -->
            <div>
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#" data-filter="all">
                    Semua Menu
                  </a>
                </li>
                <?php foreach ($data_kategori['data'] as $kat) : ?>
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-filter="<?= $kat['id']; ?>">
                      <?= $kat['nama_kategori']; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- END pos-menu -->

        <!-- BEGIN pos-content -->
        <input type="hidden" id="orderId" value="<?= $data_order['data']['id']; ?>">
        <div class="pos-content">
          <!-- data-scrollbar="true" data-height="100%" data-skip-mobile="true" -->
          <div class="pos-content-container">
            <div class="product-row">
              <?php foreach ($data_menu['data'] as $menu) : ?>
                <?php
                if ($menu['image'] == null) {
                  $menu['image'] = 'no-image-available.png';
                }; ?>
                <div class="product-container" data-type="<?= $menu['kategori_id']; ?>">
                  <a href="#" class="product <?= $menu['status'] == 0 ? 'not-available' : null; ?>" data-status="<?= $menu['status']; ?>" data-id="<?= $menu['id']; ?>">
                    <div class="img" style="background-image: url(<?= base_url('assets/img/product/' . $menu['image']) ?>)"></div>
                    <div class="text">
                      <div class="title"><?= $menu['nama_menu']; ?></div>
                      <?php if ($menu['keterangan'] != null) : ?>
                      <?php endif; ?>
                      <div class="desc"><?= $menu['keterangan']; ?></div>
                      <div class="price">Rp. <?= $menu['harga']; ?></div>
                    </div>
                    <?php if ($menu['status'] == 0) : ?>
                      <div class="not-available-text">
                        <div>Not Available</div>
                      </div>
                    <?php endif; ?>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <!-- END pos-content -->

        <!-- BEGIN pos-sidebar -->
        <div class="pos-sidebar" id="pos-sidebar">
          <div class="pos-sidebar-header">
            <input type="hidden" id="orderId" value="<?= check_null($data_order['data']['id']); ?>">
            <input type="hidden" id="tableNumber" value="<?= check_null($data_order['data']['no_meja']); ?>">

            <div class="back-btn">
              <button type="button" data-dismiss-class="pos-mobile-sidebar-toggled" data-target="#pos-customer" class="btn">
                <svg viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg>
              </button>
            </div>
            <div class="icon"><img src="<?= base_url() ?>assets/img/pos/icon-table.svg" /></div>
            <div class="title">Meja <?= $data_order['data']['no_meja']; ?></div>
            <div class="order">No. Pesanan: <b>#<?= $data_order['data']['no_order']; ?></b></div>
          </div>
          <div class="pos-sidebar-nav">
            <ul class="nav nav-tabs nav-fill">
              <li class="nav-item">
                <a class="nav-link active total-order" href="#" data-bs-toggle="tab" data-bs-target="#newOrderTab">Jumlah Pesanan (0)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tabOrderHistory" href="#" data-bs-toggle="tab" data-bs-target="#orderHistoryTab">Riwayat Pemesanan</a>
              </li>
            </ul>
          </div>
          <div class="pos-sidebar-body tab-content" data-scrollbar="true" data-height="100%">
            <div class="tab-pane fade h-100 show active" id="newOrderTab">
              <div class="pos-table">

              </div>
            </div>
            <div class="tab-pane fade h-100" id="orderHistoryTab">
              <!-- Order History -->
              <div id="load-history-order" class="h-100 py-4 px-2 pos-table">

              </div>
            </div>
          </div>
          <div class="pos-sidebar-footer">
            <div class="subtotal">
              <div class="text">Subtotal</div>
              <div class="price">0</div>
            </div>
            <div class="taxes">
              <div class="text">Taxes (6%)</div>
              <div class="price">0</div>
            </div>
            <div class="total">
              <div class="text">Total</div>
              <div class="price">0</div>
            </div>
            <div class="btn-row">
              <a href="#" id="btn-service" class="btn btn-default"><i class="fa fa-bell fa-fw fa-lg"></i> Service</a>
              <a href="<?= base_url('order/print_bill/' . $data_order['data']['id']); ?>" id="btn-bill" class="btn btn-success d-none"><i class="fa fa-file-invoice-dollar fa-fw fa-lg"></i> Bill</a>
              <a href="#" id="submit-order" class="btn btn-success"><i class="fa fa-check fa-fw fa-lg"></i> Submit Order</a>
            </div>
          </div>
        </div>
        <!-- END pos-sidebar -->
      </div>
      <!-- END pos -->

      <!-- BEGIN pos-mobile-sidebar-toggler -->
      <a href="#" class="pos-mobile-sidebar-toggler" data-toggle-class="pos-mobile-sidebar-toggled" data-target="#pos-customer">
        <svg viewBox="0 0 16 16" class="img" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
          <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
        </svg>
        <span class="badge">5</span>
      </a>
      <!-- END pos-mobile-sidebar-toggler -->
    </div>
    <!-- END #content -->
    <!-- END theme-panel -->
    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
  </div>
  <!-- END #app -->

  <!-- BEGIN #modalPosItem -->
  <div class="modal modal-pos-item fade" id="modalPosItem">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" id="btn-call-service" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END #modalPosItem -->

  <!-- ================== BEGIN core-js ================== -->
  <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- ================== END core-js ================== -->

  <!-- Assets -->
  <script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/select2/dist/js/select2.full.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

  <!-- ================== BEGIN page-js ================== -->

  <script src="<?= base_url(); ?>assets/plugins/gritter/js/jquery.gritter.js"></script>
  <script src="<?= base_url(); ?>assets/js/html5-qrcode-01.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/demo/form-plugins.demo.js"></script>
  <script src="<?= base_url(); ?>assets/js/demo/pos-customer-order.demo.js"></script>
  <!-- ================== END page-js ================== -->

  <!-- ================== CUSTOM-js ================== -->
  <script>
    var keranjang = [
      <?php if ($data_order['status'] == true) : ?>
        <?php foreach ($data_order['data']['order_detail'] as $value) : ?>
          <?php if ($value['status'] == 0) : ?> {
              id: '<?= $value['id'] ?>',
              menuDetailid: '<?= $value['id'] ?>',
              title: '<?= $value['nama_menu'] ?>',
              img: 'background-image: url(<?= base_url('assets/img/product/' . $value['image']) ?>)',
              qty: <?= $value['qty'] ?>,
              harga: <?= $value['harga'] ?>,
              sub_harga: <?= $value['sub_harga'] ?>,
              attributes: '<?= $value['name_attribute'] ?>'
            },
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    ];

    load_cart();
    /* Laod View menu in order */
    function load_cart() {
      let html = '';
      let subtotal = 0

      if (keranjang.length == 0) {
        // $('.btn-primary.create-new-order').addClass('d-none');
        //<h4>No order history found</h4>      
        html = `<div class="h-100 d-flex align-items-center justify-content-center text-center p-20">
                  <div>
                    <div style="margin-top: 3rem;">
                      <svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
                        <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
                      </svg>
                    </div>
                    <h4>Anda Belum Memesan Apapun!</h4>
                  </div>
                </div>`;
      } else {
        // $('.btn-primary.create-new-order').removeClass('d-none');
        for (let i = 0; i < keranjang.length; i++) {
          html += `<div class="row pos-table-row">
                      <div class="col-9">
                        <div class="pos-product-thumb">
                          <div class="img" style="${keranjang[i].img}"></div>
                          <div class="info">
                            <div class="title">${keranjang[i].title}</div>
                            <div class="single-price">Rp. ${keranjang[i].harga}</div>                            
                            <div class="desc">${keranjang[i].attributes}</div>                        
                            <div class="input-group qty" data-id="${keranjang[i].id}" data-arr="${i}">
                              <div class="input-group-append">
                                <a href="#" class="btn btn-default"><i class="fa fa-minus"></i></a>
                              </div>
                              <input type="text" class="form-control qty-input" value="${keranjang[i].qty}" />
                              <div class="input-group-prepend">
                                <a href="#" class="btn btn-default"><i class="fa fa-plus"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3 d-flex flex-column">
                        <div class="total-price">
                          Rp. ${keranjang[i].sub_harga}
                        </div>
                        <a href="#" class="mt-auto text-danger align-self-start text-decoration-none btn-delete-order" data-id="${keranjang[i].id}">
                          Delete
                        </a>
                      </div>                      
                    </div>`;
          subtotal += parseInt(keranjang[i].sub_harga);
        }
      }

      let tax = 0;
      let tax_text = '';
      tax = subtotal * 10 / 100;
      tax_text = 'PPn (10%)';

      let total = parseInt(tax) + parseInt(subtotal);

      $('.subtotal .price').html('Rp. ' + parseInt(subtotal));
      $('.taxes .text').html(tax_text);
      $('.taxes .price').html('Rp. ' + parseInt(tax));
      $('.total .price').html('Rp. ' + parseInt(total));
      $('.total-order').html(`Jumlah Pesanan (${keranjang.length})`)
      $('.pos-mobile-sidebar-toggler .badge').html(keranjang.length)
      $('.pos-table').html(html);
    }

    $(document).on('click', '.product', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      let status = $(this).data('status');

      if (status == 1) {
        $.get(`pos/get_detail_item/${id}`, function(data) {
          $('#modalPosItem .modal-content').html(data)
          $('#modalPosItem').modal('show');
        });
      }
    });

    /* Detail Area */
    $(document).on('click', '#add-to-cart', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      let title = $('.pos-product-info .title').html();
      let img = $('.pos-product-img .img').attr('style');
      let price = parseInt($('.pos-product-info .price').html().replace('Rp.', ''));
      let qty = parseInt($('#pos-product-qty').val());

      let orderId = $('#orderId').val();
      let size_price = document.querySelector(`.option-input:checked`)?.value;
      var size_name = $(".option-input:checked").map(function() {
        return $(this).data('attr')
      }).get();

      if (size_price == undefined) {
        size_price = 0
      }

      $.ajax({
        url: 'pos/new_orders',
        method: 'POST',
        dataType: 'JSON',
        data: {
          pesanan_id: orderId,
          menu_id: id,
          qty: parseInt(qty),
          harga: parseFloat(price),
          sub_harga: (price * qty) + parseInt(size_price),
          name_attribute: size_name.toString()
        },
        success: function(res) {
          let arr = keranjang.length

          let product = {
            id: res.data.order_detail[arr].id,
            title: title,
            img: img,
            qty: qty,
            harga: price,
            sub_harga: (price * qty) + parseInt(size_price),
            attributes: size_name.toString()
          }
          keranjang.push(product);

          load_cart();
        }
      })


      $('#modalPosItem').modal('hide');
    });

    $(document).on('click', '.pos-product-addqty', function() {
      let qty = $('#pos-product-qty').val();
      $('#pos-product-qty').val(parseInt(qty) + 1);
    })

    $(document).on('click', '.pos-product-minqty', function() {
      let qty = $('#pos-product-qty').val();
      if (qty > 1) {
        $('#pos-product-qty').val(parseInt(qty) - 1);
      }
    })
    /* End Of Detail Area */


    /* Order Item Area */
    /* Plus qty button */
    $(document).on('click', '.input-group-prepend .btn', function() {
      let id = $(this).parent().parent().data('id');
      let arr = $(this).parent().parent().data('arr');
      let orderId = $('#orderId').val();

      let total_price_attr = keranjang[arr].sub_harga - (keranjang[arr].harga * keranjang[arr].qty);
      let total_subprice = keranjang[arr].harga * (parseInt(keranjang[arr].qty) + parseInt(1)) + parseInt(total_price_attr);

      $.ajax({
        url: 'pos/update_orders/' + id,
        method: 'POST',
        dataType: 'JSON',
        data: {
          qty: parseInt(keranjang[arr].qty) + parseInt(1),
          harga: keranjang[arr].harga,
          sub_harga: total_subprice,
        },
        success: function(data) {
          if (data == true) {
            keranjang[arr].qty++
            keranjang[arr].sub_harga = total_subprice
            load_cart();
          }
        }
      });
    })
    /* On Input QTY */
    $(document).on('input', '.qty-input', function() {
      this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
      let id = $(this).parent().data('id');
      let arr = $(this).parent().data('arr');
      let valueQty = $(this).val();

      let total_price_attr = keranjang[arr].sub_harga - (keranjang[arr].harga * keranjang[arr].qty);
      let total_sub_harga = keranjang[arr].harga * valueQty + parseInt(total_price_attr);
      console.log(total_sub_harga);
      $.ajax({
        url: 'pos/update_orders/' + id,
        method: 'POST',
        dataType: 'JSON',
        data: {
          qty: valueQty,
          harga: keranjang[arr].harga,
          sub_harga: total_sub_harga,
        },
        success: function(data) {
          if (data == true) {
            keranjang[arr].qty = valueQty;
            keranjang[arr].sub_harga = total_sub_harga
            load_cart();
          }
        }
      });
    })

    /* Minus qty button */
    $(document).on('click', '.input-group-append .btn', function() {
      let id = $(this).parent().parent().data('id')
      let orderId = $('#orderId').val();
      let arr = $(this).parent().parent().data('arr');

      let total_price_attr = keranjang[arr].sub_harga - (keranjang[arr].harga * keranjang[arr].qty);
      let total_sub_harga = keranjang[arr].harga * (parseInt(keranjang[arr].qty) - parseInt(1)) + parseInt(total_price_attr);

      if (keranjang[arr].qty > 1) {
        $.ajax({
          url: 'pos/update_orders/' + id,
          method: 'POST',
          dataType: 'JSON',
          data: {
            qty: parseInt(keranjang[arr].qty) - parseInt(1),
            harga: keranjang[arr].harga,
            sub_harga: total_sub_harga,
          },
          success: function(data) {
            if (data == true) {
              keranjang[arr].qty--
              keranjang[arr].sub_harga = total_sub_harga
              load_cart();
            }
          }
        });
      }
    })

    /* Remove Order */
    $(document).on('click', '.btn-delete-order', function(e) {
      e.preventDefault();
      let id = $(this).data('id');

      /* Add Delete Confirmation */
      let html = `<div class="pos-remove-confirmation">
										<svg width="2em" height="2em" viewBox="0 0 16 16" class="me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
										</svg>
										Remove this item? 
										<a href="#" class="btn btn-white ms-auto me-2 cancel-remove">No</a>
										<a href="#" class="btn btn-danger yes-remove" data-id="${id}">Yes</a>
									</div>`;
      $(this).parent().parent().append(html);
    });

    $(document).on('click', '.cancel-remove', function() {
      $(this).parent().remove()
    });

    $(document).on('click', '.yes-remove', function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      let this_parent = $(this).parent().parent().remove();

      $.get(`pos/delete_order/` + id, function(data) {
        let res = JSON.parse(data)
        if (res == true) {
          for (let i = 0; i < keranjang.length; i++) {
            if (keranjang[i].id == id) {
              keranjang.splice(i, 1);
            }
          }
          this_parent;
          load_cart();
        }
        // /* Delete Function */      
      });

      // for (let i = 0; i < keranjang.length; i++) {
      //   if (keranjang[i].orderDetailId == orderDetailId) {
      //     keranjang.splice(i, 1);
      //   }
      // }
      // load_cart();
    });

    /* Submit Order button Trigger */
    $(document).on('click', '#submit-order', function(e) {
      e.preventDefault()
      let orderId = $('#orderId').val();
      let subtotal = $('.subtotal .price').html();
      let serviceFee = $('.taxes .price').html();
      let totalprice = $('.total .price').html();

      swal({
          title: 'Apakah anda yakin ?',
          text: 'Dengan Menu yang anda pesan ?',
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
        })
        .then((result) => {
          if (result == true) {
            $.ajax({
              url: 'pos/submit_order/' + orderId,
              method: 'POST',
              async: true,
              dataType: 'JSON',
              data: {
                sub_total: subtotal.replace('Rp. ', ''),
                total_harga: totalprice.replace('Rp. ', ''),
                pajak: serviceFee.replace('Rp. ', '')
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
                        location.reload();
                        keranjang = [];
                        load_cart()
                      }
                    })
                }
              }
            })
          } {
            return false
          }
        })
    });

    var historyActive = false
    $(document).on('click', '.total-order', function(e) {
      e.preventDefault();
      historyActive = false;
      $('#btn-bill').addClass('d-none');
      $('#submit-order').removeClass('d-none');
      $('#tabOrderHistory').removeClass('active');
      load_cart();

    });

    /* Tab Order History */
    $(document).on('click', '#tabOrderHistory', function(e) {
      e.preventDefault();
      load_history();
      historyActive = true;

      setInterval(function() {
        if (historyActive == true) {
          load_history(false)
        }
      }, 30000)

    });


    function load_history(load = true) {
      $.ajax({
        url: 'pos/get_history',
        method: 'get',
        beforeSend: function() {
          if (load == true) {
            $('#load-history-order').html(`<div class="d-flex justify-content-center h-100">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>`);
          }
        },
        success: function(res) {
          $('#load-history-order').html(res);
          $('.subtotal .price').html('Rp. ' + $('#historyPrice').val());
          $('.taxes .price').html('Rp. ' + $('#historyTax').val())
          $('.total .price').html('Rp. ' + $('#historyTotalPrice').val())
          $('#btn-bill').removeClass('d-none');
          $('#submit-order').addClass('d-none');
          // if (res.status == true) {}
        }
      })
    }
    /* End Of Order Item Area */

    /* Product Item Area */
    /* End Of Product Item Area */
    $(document).on('click', '#btn-service', function(e) {
      e.preventDefault()
      $('#exampleModal').modal('show')
    })
    // var handleDashboardGritterNotification = function(e) {

    // };

    $(document).on('click', '#btn-call-service', function() {
      let table = $('#tableNumber').val();
      let text = $('#keterangan').val()
      $.get("<?= base_url('dashboard/call_service?table='); ?>" + table + '&text=' + text, function(data) {
        // console.log(data);
        $('#exampleModal').modal('hide')
        $('#keterangan').val('')
      })
    });
  </script>


  <?php if ($data_order['status'] == false) : ?>
    <script>
      /* Function Success Scan */
      function onScanSuccess(qrMessage) {
        window.open(qrMessage);

        html5QrcodeScanner.clear();

        $('#btn-render').css('display', 'block');
      }
      /* Function Failure Scan */
      function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`QR error = ${error}`);
      }

      /* Init Function Scan */
      let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
          fps: 10,
          qrbox: 250
        }, /* verbose= */ false);

      html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
  <?php endif; ?>

  <script>
    if ($('.flashdata').length > 0) {
      swal({
        title: 'SCAN Gagal',
        text: 'Pesanan Anda Telah Berakhir',
        icon: 'error',
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
    }
  </script>
</body>

</html>