<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-user icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>
        <?= $title; ?>
        <div class="page-title-subheading">
          <?= $subtitle; ?>
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <a href="<?= base_url('user/edit'); ?>" class="btn btn-shadow btn-info">Ubah Profil</a>
      <a href="<?= base_url('user/change_password'); ?>" class="btn btn-shadow btn-danger">Ubah Kata Sandi</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-8 offset-2">
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-3">
          <img src="<?= base_url('assets/img/doctor.png'); ?>" width="150" alt="Pakar Gizi">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3">
                <h4 class="card-title">NAMA</h4>
              </div>
              <div class="col-lg-8">
                : <?= $_SESSION['sipnoting_admin']['nama']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <h4 class="card-title">EMAIL</h4>
              </div>
              <div class="col-lg-8">
                : <?= $_SESSION['sipnoting_admin']['email']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <h4 class="card-title">JABATAN</h4>
              </div>
              <div class="col-lg-8">
                : <?= $_SESSION['sipnoting_admin']['jabatan']; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <h4 class="card-title">NO TELP</h4>
              </div>
              <div class="col-lg-8">
                : <?= $_SESSION['sipnoting_admin']['no_hp']; ?>
              </div>
            </div>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>