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

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Nama Balita</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Jenis Kelamin</label>
          <div class="col-lg-2">
            <div class="font-icon-wrapper"><i class="pe-7s-user"> </i>
              <p>Laki-laki</p>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="font-icon-wrapper"><i class="pe-7s-user-female"> </i>
              <p>Perempuan</p>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Tempat Lahir</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Tanggal Lahir</label>
          <div class="col-lg-9">
            <input type="text" class="form-control datepicker" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Nama Ayah</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Nama Ibu</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Email</label>
          <div class="col-lg-9">
            <input type="email" class="form-control" autocomplete="off" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Alamat Orang Tua</label>
          <div class="col-lg-9">
            <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-form-label col-lg-3">Nomor Hp</label>
          <div class="col-lg-9">
            <input type="telp" class="form-control" autocomplete="off" autofocus>
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