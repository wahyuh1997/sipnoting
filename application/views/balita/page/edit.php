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
  <input type="hidden" name="bayi_id" value="<?= $data['id']; ?>">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="user_id" class="col-form-label col-lg-3">Email Orang Tua</label>
            <div class="col-lg-9">
              <select name="user_id" id="user_id" class="form-control select2" required>
                <option value="">Pilih Balita</option>
                <?php foreach ($user as $res) : ?>
                  <?php if ($res['is_admin'] == 0) : ?>
                    <option value="<?= $res['id']; ?>" <?= $res['id'] == $data['user_id'] ? 'selected' : null; ?>><?= $res['email']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-form-label col-lg-3">Nama Balita</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" autocomplete="off" id="nama" name="nama" value="<?= $data['nama']; ?>" autofocus required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Jenis Kelamin</label>
            <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>">
            <div class="col-lg-2">
              <div class="font-icon-wrapper <?= $data['jenis_kelamin'] == 'L' ? 'active' : null; ?>" data-val="L">
                <i class="pe-7s-user"> </i>
                <p>Laki-laki</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="font-icon-wrapper <?= $data['jenis_kelamin'] == 'P' ? 'active' : null; ?>" data-val="P">
                <i class="pe-7s-user-female"> </i>
                <p>Perempuan</p>
              </div>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-form-label col-lg-3">Tempat Lahir</label>
            <div class="col-lg-9">
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-form-label col-lg-3">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" autocomplete="off" required>
            </div>
          </div>
          <div class="mb-3 row d-none">
            <label for="ayah" class="col-form-label col-lg-3">Nama Ayah</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="ayah" name="ayah" value="<?= $data['ayah']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row d-none">
            <label for="ibu" class="col-form-label col-lg-3">Nama Ibu</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $data['ibu']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-form-label col-lg-3">Alamat Orang Tua</label>
            <div class="col-lg-9">
              <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?= $data['alamat']; ?></textarea>
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