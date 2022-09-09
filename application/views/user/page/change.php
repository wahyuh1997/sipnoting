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
          <div class="mb-3 row">
            <label for="password" class="col-form-label col-lg-3">Masukan Kata Sandi Baru <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="" required>
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