<div class="container mt-5">
  <h1 class="title-text"><?= $title; ?></h1>

  <div class="card mb-4" style="background-color: #62648A;">
    <form id="regCrudForm" data-redurl="<?= base_url('profile'); ?>" method="POST">
      <!-- <input type="hidden" id="now" value=""> -->
      <div class="card-body">
        <!-- <div class="mb-3 row">
          <label for="old_password" class="col-form-label text-white col-lg-3">Kata Sandi Saat Ini <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="password" class="form-control" id="old_password" name="old_password" value="" autocomplete="off" autofocus required>
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="password" class="col-form-label text-white col-lg-3">Masukan Kata Sandi Baru <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="" required>
          </div>
        </div>
        <div class="col-lg-12 mt-4">
          <div class="d-grid gap-2">
            <button type="submit" class="primary-btn py-2" id="btn-submit" type="button" style="font-size: 20px;">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>