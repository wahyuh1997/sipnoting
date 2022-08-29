<div class="container mt-5">

  <div class="d-flex justidy-content-between">
    <h1 class="title-text d-inline"><?= $title; ?></h1>
    <a href="<?= base_url('profile/edit'); ?>" class="ms-auto mb-0"><i class="fa-solid fa-2x fa-pen-to-square text-white"></i></a>
  </div>

  <div class="card mb-3 mx-auto" style="max-width: 768px;">
    <div class="row g-0 py-3">
      <div class="col-md-4 d-flex justify-content-center align-items-center">
        <img src="<?= base_url('assets/img/baby.png'); ?>" class="img-fluid rounded-start" alt="..." style="height: 128px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <!-- <h5 class="card-title">Card title</h5> -->
          <div class="row">
            <div class="col-lg-3">Nama Balita</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3 pe-0">Tempat Lahir</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3">Tgl Lahir</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3 pe-0">Jenis Kelamin</div>
            <div class="col-lg-9">:</div>
          </div>
          <div class="row">
            <div class="col-lg-3">Usia</div>
            <div class="col-lg-9">:</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>