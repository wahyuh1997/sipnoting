<div class="container mt-5">

  <div class="d-flex justidy-content-between">
    <h1 class="title-text d-inline"><?= $title; ?></h1>
    <a href="<?= base_url('profile/edit'); ?>" class="ms-auto mb-0 text-white text-decoration-none"><i class="fa-solid fa-xl fa-plus"></i> Tambah Data Balita</a>
  </div>

  <div class="card mb-3 mx-auto" style="max-width: 768px;">
    <div class="row g-0 py-3">
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img src="<?= base_url('assets/img/baby.png'); ?>" class="img-fluid rounded-start" alt="..." style="height: 128px;">
      </div>
      <div class="col-md-8">
        <div class="card-body" style="position: relative;">
          <a href="<?= base_url('profile/edit'); ?>" style="position: absolute; right: 1rem; top: 0;"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
          <div class="row">
            <div class="col-lg-3">Nama Balita</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3 pe-0">Tempat Lahir</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3">Tgl Lahir</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3 pe-0">Jenis Kelamin</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3">Usia</div>
            <div class="col-lg-9">:</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>