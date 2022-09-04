<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Rubik:wght@400;700&display=swap" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-02.css'); ?>">
</head>

<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url(); ?>">SIPNOTING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link me-3 <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'active' : null; ?>" href="<?= base_url(); ?>">HOME</a>
          <a class="nav-link me-3 <?= $this->uri->segment(1) == 'diagnosis' ? 'active' : null; ?>" href="<?= base_url('diagnosis'); ?>">DIAGNOSIS</a>
          <a class="nav-link me-5 <?= $this->uri->segment(1) == 'riwayat' ? 'active' : null; ?>" href="<?= base_url('riwayat'); ?>">RIWAYAT</a>
          <a class="nav-link me-5 <?= $this->uri->segment(1) == 'profile' ? 'active' : null; ?>" href="<?= base_url('profile'); ?>">PROFILE</a>
          <a class="nav-link" href="<?= base_url('auth/login'); ?>">LOGIN</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Of Header -->