<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-smile icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>
        <?= $title; ?>
        <div class="page-title-subheading">
          <?= $subtitle; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<form id="regCrudForm" data-redurl="<?= base_url('user_data'); ?>" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="nama" class="col-form-label col-lg-3">Nama Pengguna <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-form-label col-lg-3">Password <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="password" minlength="6" class="form-control" id="password" name="password" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="no_hp" class="col-form-label col-lg-3">No Hp</label>
            <div class="col-lg-9">
              <input type="number" class="form-control" maxlength="" id="no_hp" name="no_hp" autocomplete="off">
            </div>
          </div>

        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="<?= base_url('user_data'); ?>" class="btn btn-secondary mr-2">Kembali</a>
          <button class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- End Main Content -->