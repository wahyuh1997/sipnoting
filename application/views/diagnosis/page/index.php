<?php if ($data['status'] == true) : ?>
  <form action="<?= base_url('diagnosis/result'); ?>" method="POST">
    <div class="container mt-5">
      <div class="card" style="background-color: #62648A;">
        <div class="card-body">
          <div class="row">
            <input type="hidden" name="created_by" value="<?= $_SESSION['sipnoting_user']['id']; ?>">
            <div class="col-lg-12 mb-3">
              <label for="balita_id" class="text-white">Nama Balita</label>
              <!-- <input type="test" step="0" min="0.1" value="Andi" class="form-control"> -->
              <select name="balita_id" id="balita_id" class="form-control">
                <?php foreach ($data['data'] as $res) : ?>
                  <option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-lg-12">
              <label for="usia_melahirkan" class="text-white">Berapa Usia Ibu Saat Melahirkan ?</label>
              <div class="input-group mb-3">
                <input type="number" id="usia_melahirkan" name="usia_melahirkan" step="0.1" min="0.1" value="0.1" max="80" class="form-control">
                <span class="input-group-text">Tahun</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="berat_lahir" class="text-white">Berat Badan Balita</label>
              <div class="input-group mb-3">
                <input type="number" id="berat_lahir" name="berat_lahir" step="0.1" min="0.1" value="0.1" class="form-control">
                <span class="input-group-text">Kg</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="jarak_kehamilan" class="text-white">Berapa Jarak Kehamilan Ibu Dari Anak Sebelumnya ?</label>
              <div class="input-group mb-3">
                <input type="number" id="jarak_kehamilan" name="jarak_kehamilan" step="0.1" min="0" value="0" class="form-control">
                <span class="input-group-text">Tahun</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="tinggi_badan" class="text-white">Tinggi Badan Balita Saat Ini</label>
              <div class="input-group mb-3">
                <input type="number" id="tinggi_badan" name="tinggi_badan" min="0" value="0" class="form-control">
                <span class="input-group-text">CM</span>
              </div>
            </div>
            <div class="col-lg-12 mt-4">
              <div class="d-grid gap-2">
                <button type="submit" class="primary-btn py-2" type="button" style="font-size: 20px;">Hitung</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php endif; ?>