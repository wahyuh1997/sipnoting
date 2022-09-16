<div class="container mt-5">
  <h1 class="title-text"><?= $title; ?></h1>

  <div class="card mb-4" style="background-color: #62648A;">
    <form id="regCrudForm" data-redurl="<?= base_url('profile'); ?>" method="POST">
      <div class="card-body">
        <div class="mb-3 row">
          <label for="email" class="col-form-label text-white col-lg-3">Email <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="email" name="email" value="<?= $_SESSION['sipnoting_user']['email']; ?>" autocomplete="off" autofocus required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-form-label text-white col-lg-3">Nama <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $_SESSION['sipnoting_user']['nama']; ?>" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="ayah" class="col-form-label text-white col-lg-3">Nama Ayah <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="ayah" name="ayah" autocomplete="off" value="<?= $data['ayah']; ?>" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="ibu" class="col-form-label text-white col-lg-3">Nama Ibu <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="ibu" name="ibu" autocomplete="off" value="<?= $data['ibu']; ?>" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="no_hp" class="col-form-label text-white col-lg-3">No Hp</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" id="no_hp" name="no_hp" maxlength="13" autocomplete="off" value="<?= $_SESSION['sipnoting_user']['no_hp']; ?>">
          </div>
        </div>
        <div class="col-lg-12 mt-4">
          <div class="d-grid gap-2">
            <button type="submit" class="primary-btn py-2" type="button" style="font-size: 20px;">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>