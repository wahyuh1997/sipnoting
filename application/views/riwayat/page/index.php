<div class="container mt-5">

  <h1 class="title-text"><?= $title; ?></h1>

  <?php if ($data['status'] == true) : ?>
    <?php foreach ($data['data'] as $res) : ?>
      <div class="card mt-4 text-white" style="background-color: #63CFC6;">
        <div class="card-header">
          <h5>Tgl. Diagnosis : <?= dateFormat($res['created_at']); ?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-7">
              <div class="row">
                <div class="col-lg-4">
                  Nama Balita
                </div>
                <div class="col-lg-8">
                  : <?= $res['nama']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Tinggi Badan Balita
                </div>
                <div class="col-lg-8">
                  : <?= $res['tinggi_balita']; ?> cm
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Berat Badan Balita
                </div>
                <div class="col-lg-8">
                  : <?= $res['berat_balita'] / 1000; ?> Kg
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Angka Z-Score
                </div>
                <div class="col-lg-8">
                  : <?= $res['z_score']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Hasil Kesimpulan
                </div>
                <div class="col-lg-8">
                  : <?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <label for="">Solusi :</label>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else : ?>
    <h2 class="text-white text-center">Anda Tidak Memiliki Riwayat Diagnosis</h2>
  <?php endif; ?>
</div>