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

<form id="regCrudForm" data-redurl="<?= base_url('balita'); ?>" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="user_id" class="col-form-label col-lg-3">Email Orang Tua</label>
            <div class="col-lg-9">
              <select name="user_id" id="user_id" class="form-control select2" required>
                <option value="">Pilih Balita</option>
                <?php foreach ($data as $res) : ?>
                  <?php if ($res['jabatan'] == null) : ?>
                    <option value="<?= $res['id']; ?>"><?= $res['email']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-form-label col-lg-3">Nama Balita</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Jenis Kelamin</label>
            <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" value="L">
            <div class="col-lg-2">
              <div class="font-icon-wrapper active" data-val="L">
                <i class="pe-7s-user"> </i>
                <p>Laki-laki</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="font-icon-wrapper" data-val="P">
                <i class="pe-7s-user-female"> </i>
                <p>Perempuan</p>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="tempat_lahir" class="col-form-label col-lg-3">Tempat Lahir</label>
            <div class="col-lg-9">
              <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" autocomplete="off" autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal_lahir" class="col-form-label col-lg-3">Tanggal Lahir</label>
            <div class="col-lg-9">
              <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" autofocus>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ayah" class="col-form-label col-lg-3">Nama Ayah</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="ayah" name="ayah" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="ibu" class="col-form-label col-lg-3">Nama Ibu</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="ibu" name="ibu" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-form-label col-lg-3">Alamat Orang Tua</label>
            <div class="col-lg-9">
              <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"></textarea>
            </div>
          </div>

        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="<?= base_url('balita'); ?>" class="btn btn-secondary mr-2">Kembali</a>
          <button class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- End Main Content -->