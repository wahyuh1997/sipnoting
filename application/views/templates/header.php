<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?= $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <meta name="msapplication-tap-highlight" content="no">

  <link href="<?= base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/datatables.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/buttons.dataTables.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/select2.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/main.css" rel="stylesheet">
  <style>
    body {
      overflow-x: hidden;
    }

    .tab-content>.tab-pane:not(.active) {
      display: block;
      height: 0;
      overflow-y: hidden;
    }

    /* .datepicker, */
    .table-condensed {
      width: 100%;
    }

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

    tr.selected {
      background-color: #bedff8 !important;
    }

    tr.selected:hover {
      background-color: #9fb2d6;
    }

    .select2-container {
      width: 100% !important;
    }

    .select2-container--default .select2-selection--single {
      height: calc(1.5em + .75rem + 2px) !important;
    }

    .font-icon-wrapper.active {
      background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%) !important;
      color: white;
    }

    .font-icon-wrapper.active i,
    .font-icon-wrapper.active p {
      color: white !important;
    }
  </style>
</head>

<body>
  <div class="bg-process d-flex justify-content-center" style="display: none !important;">
    <div class="spinner-border text-light align-self-center" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-amy-crisp header-text-dark">
      <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">

        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <a href="<?= base_url('auth/logout'); ?>" data-redurl="<?= base_url(); ?>" class="btn text-decoration-none text-white font-weight-bold btn-logout"><i class="fa fa-sign-out"></i> KELUAR</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="app-main">