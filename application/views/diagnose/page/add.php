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

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Nama Balita</label>
          <div class="col-lg-9">
            <select name="" id="" class="form-control">
              <option value="">Pilih Balita</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Berapa Usia Saat Melahirkan ?</label>
          <div class="col-lg-9">
            <div class="input-group">
              <input type="number" step="0.1" class="form-control" autocomplete="off" autofocus>
              <div class="input-group-append"><span class="input-group-text">Tahun</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Berat Badan Balita</label>
          <div class="col-lg-9">
            <div class="input-group">
              <input type="number" step="0.1" class="form-control" autocomplete="off" autofocus>
              <div class="input-group-append"><span class="input-group-text">Kg</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Jarak Kehamilan Ibu Dari Anak Sebelumnya</label>
          <div class="col-lg-9">
            <div class="input-group">
              <input type="number" step="0.1" class="form-control" autocomplete="off" autofocus>
              <div class="input-group-append"><span class="input-group-text">Tahun</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Tinggi Badan Balita Saat Ini</label>
          <div class="col-lg-9">
            <div class="input-group">
              <input type="number" step="0.1" class="form-control" autocomplete="off" autofocus>
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

<!-- End Main Content -->