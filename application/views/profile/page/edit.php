<form action="<?= base_url('diagnosis/result'); ?>" method="POST">
  <div class="container mt-5">
    <h1 class="title-text"><?= $title; ?></h1>

    <div class="card mb-4" style="background-color: #62648A;">
      <div class="card-body">
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Email</label>
          <div class="col-lg-9">
            <input type="email" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Nama Balita <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off" autofocus required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Jenis Kelamin <span class="text-danger">*</span></label>
          <div class="col-lg-2">
            <div class="font-icon-wrapper border border-dark rounded-4 d-flex flex-column justify-content-center text-white active">
              <i class="fa-solid fa-2x fa-person mt-2"></i>
              <p class="align-self-center mb-2">Laki-laki</p>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="font-icon-wrapper border border-white rounded-4 d-flex flex-column justify-content-center text-white">
              <i class="fa-solid fa-2x fa-person-dress mt-2"></i>
              <p class="align-self-center mb-2">Perempuan</p>
            </div>
          </div>

        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Tempat Lahir</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Tanggal Lahir <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <input type="text" class="form-control datepicker" autocomplete="off" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Nama Ayah</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Nama Ibu</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Alamat Orang Tua</label>
          <div class="col-lg-9">
            <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="" class="col-form-label text-white col-lg-3">Nomor Hp</label>
          <div class="col-lg-9">
            <input type="telp" class="form-control" autocomplete="off">
          </div>
        </div>
        <div class="col-lg-12 mt-4">
          <div class="d-grid gap-2">
            <button type="submit" class="primary-btn py-2" type="button" style="font-size: 20px;">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>