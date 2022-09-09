<div class="container mt-5">

  <div class="d-flex justidy-content-between">
    <h1 class="title-text d-inline"><?= $title; ?></h1>
    <a href="<?= base_url('profile/add'); ?>" class="ms-auto mb-0 text-white text-decoration-none"><i class="fa-solid fa-xl fa-plus"></i> Tambah Data Balita</a>
  </div>

  <div class="row">
    <div class="col-lg">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
            <div class="mt-3">
              <h4><?= $_SESSION['sipnoting_user']['nama'] == null ? 'Belum Ada Nama' : $_SESSION['sipnoting_user']['nama']; ?></h4>
              <p class="text-secondary mb-1"><?= $_SESSION['sipnoting_user']['email']; ?></p>
              <p class="text-muted font-size-sm"><?= $_SESSION['sipnoting_user']['no_hp']; ?></p>
              <a href="<?= base_url('profile/edit_user'); ?>" class="btn btn-primary">Ubah Data</a>
              <a href="<?= base_url('profile/change_pass'); ?>" class="btn btn-outline-primary">Ganti Password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if ($data['status'] == true) : ?>
      <?php foreach ($data['data'] as $baby) : ?>
        <div class="col-lg-7">
          <div class="card mb-3">
            <div class="row g-0 py-3">
              <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/img/baby.png'); ?>" class="img-fluid rounded-start" alt="..." style="height: 128px;">
              </div>
              <div class="col-md-8">
                <div class="card-body" style="position: relative;">
                  <div class="action" style="position: absolute; right: 1rem; top: 0;">
                    <a href="<?= base_url('profile/edit/' . $baby['id']); ?>" class="me-2"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                    <a href="<?= base_url('profile/delete/' . $baby['id']); ?>" class="text-danger del-sel"><i class="fa-solid fa-xl fa-trash"></i></a>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">Nama Balita</div>
                    <div class="col-lg-8">: <?= $baby['nama']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 pe-0">Tempat Lahir</div>
                    <div class="col-lg-8">: <?= $baby['tempat_lahir']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">Tgl Lahir</div>
                    <div class="col-lg-8">: <?= dateFormat($baby['tanggal_lahir']); ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 pe-0">Jenis Kelamin</div>
                    <div class="col-lg-8">: <?= $baby['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">Usia</div>
                    <div class="col-lg-8">: <?= $baby['usia_tahun'] != 0 ? $baby['usia_tahun'] . ' Tahun' : null; ?> <?= $baby['usia_bulan'] . ' Bulan'; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <h2 class="text-white text-center mt-3">Anda Belum Memiliki Data Balita</h2>
    <?php endif; ?>
  </div>


  <div class="row my-5">
    <div class="col-lg-7 mx-auto">
      <div class="d-grid gap-2">
        <a href="<?= base_url('auth/logout'); ?>" data-redurl="<?= base_url(); ?>" class="btn primary-btn py-2 btn-logout" type="button" style="font-size: 20px;">KELUAR</a>
      </div>
    </div>
  </div>
</div>