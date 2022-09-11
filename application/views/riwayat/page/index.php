<div class="container mt-5">

  <h1 class="title-text"><?= $title; ?></h1>

  <?php if ($data['status'] == true) : ?>
    <?php foreach ($data['data'] as $res) : ?>
      <?php if (isset($id)) : ?>
        <?php if ($res['bayi_id'] == $id) : ?>
          <div class="card mt-4 text-white" style="background-color: #63CFC6;">
            <div class="card-header">
              <h5>Tgl. Diagnosis : <?= dateFormat($res['created_at']); ?></h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-5">
                  <div class="row">
                    <div class="col-lg-7">
                      Nama Balita
                    </div>
                    <div class="col-lg-5">
                      : <?= $res['nama']; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-7">
                      Tinggi Badan Balita
                    </div>
                    <div class="col-lg-5">
                      : <?= $res['tinggi_balita']; ?> cm
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-7">
                      Berat Badan Balita
                    </div>
                    <div class="col-lg-5">
                      : <?= $res['berat_balita'] / 1000; ?> Kg
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-7">
                      Angka Z-Score
                    </div>
                    <div class="col-lg-5">
                      : <?= $res['z_score']; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-7">
                      Hasil Kesimpulan
                    </div>
                    <div class="col-lg-5">
                      : <?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <label for="">Solusi :</label>
                  <?php foreach (json_decode($res['keterangan']) as $ket) : ?>
                    <p class="mb-0">- <?= $ket; ?></p>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php else : ?>
        <div class="card mt-4 text-white" style="background-color: #63CFC6;">
          <div class="card-header">
            <h5>Tgl. Diagnosis : <?= dateFormat($res['created_at']); ?></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-lg-7">
                    Nama Balita
                  </div>
                  <div class="col-lg-5">
                    : <?= $res['nama']; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    Tinggi Badan Balita
                  </div>
                  <div class="col-lg-5">
                    : <?= $res['tinggi_balita']; ?> cm
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    Berat Badan Balita
                  </div>
                  <div class="col-lg-5">
                    : <?= $res['berat_balita'] / 1000; ?> Kg
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    Angka Z-Score
                  </div>
                  <div class="col-lg-5">
                    : <?= $res['z_score']; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    Hasil Kesimpulan
                  </div>
                  <div class="col-lg-5">
                    : <?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <label for="">Solusi :</label>
                <?php foreach (json_decode($res['keterangan']) as $ket) : ?>
                  <p class="mb-0">- <?= $ket; ?></p>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php else : ?>
    <h2 class="text-white text-center">Anda Tidak Memiliki Riwayat Diagnosis</h2>
  <?php endif; ?>
</div>