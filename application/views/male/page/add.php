<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
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

<form id="regCrudForm" data-redurl="<?= base_url('deviasi/male'); ?>" method="POST">
  <input type="hidden" name="jenis_kelamin" value="L">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Umur <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="input-group">
                <input type="number" class="form-control" name="usia" autocomplete="off" value="0" min="0" autofocus required>
                <div class="input-group-append"><span class="input-group-text">Bulan</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">-3 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" class="form-control" name="minus_3_sd" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">-2 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="minus_2_sd" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">-1 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="minus_1_sd" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">Median <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="median" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">1 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="1_sd" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">2 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="2_sd" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-form-label col-lg-3">3 SD <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <input type="number" step="0.1" name="3_sd" class="form-control" autocomplete="off" value="0" min="0" required>
            </div>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <a href="<?= base_url('deviasi/male'); ?>" class="btn btn-secondary mr-2">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>