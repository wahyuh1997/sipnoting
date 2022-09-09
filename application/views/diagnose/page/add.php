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

<form id="regCrudForm" data-redurl="<?= base_url('diagnose'); ?>" method="POST">
  <input type="hidden" name="created_by" value="<?= $_SESSION['sipnoting_admin']['id']; ?>">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Nama Balita <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <select name="balita_id" id="balita_id" class="form-control select2" required>
                <option value="">Pilih Balita</option>
                <?php foreach ($data['data'] as $res) : ?>
                  <option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Berapa Usia Saat Melahirkan ?</label>
            <div class="col-lg-9">
              <div class="input-group">
                <input type="number" id="usia_melahirkan" name="usia_melahirkan" step="0.1" min="0.1" value="0.1" max="80" class="form-control">
                <div class="input-group-append"><span class="input-group-text">Tahun</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Berat Badan Balita</label>
            <div class="col-lg-9">
              <div class="input-group">
                <input type="number" id="berat_lahir" name="berat_lahir" step="0.1" min="0.1" value="0.1" class="form-control">
                <div class="input-group-append"><span class="input-group-text">Kg</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Jarak Kehamilan Ibu Dari Anak Sebelumnya</label>
            <div class="col-lg-9">
              <div class="input-group">
                <input type="number" id="jarak_kehamilan" name="jarak_kehamilan" step="0.1" min="0" value="0" class="form-control">
                <div class="input-group-append"><span class="input-group-text">Tahun</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Tinggi Badan Balita Saat Ini</label>
            <div class="col-lg-9">
              <div class="input-group">
                <input type="number" id="tinggi_badan" name="tinggi_badan" min="0" value="0" class="form-control">
                <div class="input-group-append"><span class="input-group-text">CM</span>
                </div>
              </div>
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