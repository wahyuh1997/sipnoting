<div class="container mt-5">
  <h1 class="title-text"><?= $title; ?></h1>

  <div class="card mb-4" style="background-color: #62648A;">
    <form id="regCrudForm" data-redurl="<?= base_url('profile'); ?>" method="post">
      <input type="hidden" name="user_id" value="<?= $_SESSION['sipnoting_user']['id']; ?>">
      <div class="card-body">
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Email</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" value="<?= $_SESSION['sipnoting_user']['email']; ?>" autocomplete="off" disabled>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nama" class="col-form-label text-white col-lg-3">Nama Balita <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Jenis Kelamin <span class="text-danger">*</span></label>
          <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" value="L">
          <div class="col-lg-2">
            <div class="font-icon-wrapper border border-dark rounded-4 d-flex flex-column justify-content-center text-white active" data-val="L">
              <i class="fa-solid fa-2x fa-person mt-2"></i>
              <p class="align-self-center mb-2">Laki-laki</p>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="font-icon-wrapper border border-white rounded-4 d-flex flex-column justify-content-center text-white" data-val="P">
              <i class="fa-solid fa-2x fa-person-dress mt-2"></i>
              <p class="align-self-center mb-2">Perempuan</p>
            </div>
          </div>

        </div>
        <div class="mb-3 row">
          <label for="tempat_lahir" class="col-form-label text-white col-lg-3">Tempat Lahir</label>
          <div class="col-lg-9">
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal_lahir" class="col-form-label text-white col-lg-3">Tanggal Lahir <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" required>
          </div>
        </div>
        <div class="mb-3 row d-none">
          <label for="ayah" class="col-form-label text-white col-lg-3">Nama Ayah</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="ayah" name="ayah" value="<?= $parent['ayah']; ?>" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row d-none">
          <label for="ibu" class="col-form-label text-white col-lg-3">Nama Ibu</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $parent['ibu']; ?>" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="alamat" class="col-form-label text-white col-lg-3">Alamat Orang Tua</label>
          <div class="col-lg-9">
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"></textarea>
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