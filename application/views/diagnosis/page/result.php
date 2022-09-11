<div class="container mt-5">

  <div class="d-flex justify-content-between">
    <h1 class="title-text"><?= $title; ?></h1>
    <a data-bs-toggle="modal" href="#exampleModal" class="h5 text-white" role="button">Disclaimer</a>
  </div>

  <h2 class="text-white">Angka Z-Score :</h2>
  <h3 class="text-white border-bottom"><?= $data['data']['z_score']; ?></h3>

  <h2 class="text-white mt-5">Kesimpulan Akhir :</h2>
  <h3 class="text-white border-bottom"><?= $data['data']['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?></h3>
  <div class="card mt-4 text-white" style="background-color: #63CFC6;">
    <div class="card-header">
      <h2>Solusi</h2>
    </div>
    <div class="card-body">
      <?php foreach (json_decode($data['data']['keterangan']) as $ket) : ?>
        <p>- <?= $ket; ?></p>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="col-lg-12 my-4">
    <div class="d-grid gap-2">
      <a href="<?= base_url('diagnosis'); ?>" class="btn primary-btn py-2" type="button" style="font-size: 20px;">Kembali</a>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disclaimer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p>Sistem ini bukanlah sebuah alat diagnosis medis ataupun pengganti konsultasi dokter Spesialis/Ahli Gizi. Sistem ini hanya untuk skrining yang bisa anda lakukan mandiri, sebelum memeriksakan anak anda ke dokter. setelah melihat hasil ini, sebaiknya tetap konsultasikan ke Ahli Gizi atau Puskesmas.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>