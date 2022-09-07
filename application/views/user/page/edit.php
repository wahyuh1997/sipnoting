<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-calculator icon-gradient bg-mean-fruit">
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
<form id="regCrudForm" data-redurl="<?= base_url('user'); ?>" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="email" class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['sipnoting_admin']['email']; ?>" autocomplete="off" autofocus required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-form-label col-lg-3">Nama <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['sipnoting_admin']['nama']; ?>" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jabatan" class="col-form-label col-lg-3">Jabatan </label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $_SESSION['sipnoting_admin']['jabatan']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label for="no_hp" class="col-form-label col-lg-3">No. Telp </label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $_SESSION['sipnoting_admin']['no_hp']; ?>" autocomplete="off">
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="<?= base_url('user'); ?>" class="btn btn-secondary mr-2">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>