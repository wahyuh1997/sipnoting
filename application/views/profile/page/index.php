<div class="container mt-5">

  <div class="d-flex justidy-content-between">
    <h1 class="title-text d-inline"><?= $title; ?></h1>
    <a href="<?= base_url('profile/edit'); ?>" class="ms-auto mb-0 text-white text-decoration-none"><i class="fa-solid fa-xl fa-plus"></i> Tambah Data Balita</a>
  </div>

  <?php if ($data['status'] == true) : ?>
    <?php foreach ($data['data'] as $baby) : ?>
      <div class="card mb-3 mx-auto" style="max-width: 768px;">
        <div class="row g-0 py-3">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="<?= base_url('assets/img/baby.png'); ?>" class="img-fluid rounded-start" alt="..." style="height: 128px;">
          </div>
          <div class="col-md-8">
            <div class="card-body" style="position: relative;">
              <div class="action" style="position: absolute; right: 1rem; top: 0;">
                <a href="<?= base_url('profile/edit'); ?>" class="me-2"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                <a href="<?= base_url('profile/delete'); ?>" class="text-danger"><i class="fa-solid fa-xl fa-trash"></i></a>
              </div>
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
    <?php endforeach; ?>
  <?php else : ?>
    <h2 class="text-white text-center">Anda Belum Memiliki Data Balita</h2>
  <?php endif; ?>

  <div class="row mt-5">
    <div class="col-lg-8 offset-lg-2">
      <div class="d-grid gap-2">
        <a href="<?= base_url('auth/logout'); ?>" data-redurl="<?= base_url(); ?>" class="btn primary-btn py-2 btn-logout" type="button" style="font-size: 20px;">KELUAR</a>
      </div>
    </div>
  </div>
</div>