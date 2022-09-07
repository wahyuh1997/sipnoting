<?php if ($data['status'] == true) : ?>
  <form action="<?= base_url('diagnosis/result'); ?>" method="POST">
    <div class="container mt-5">
      <div class="card" style="background-color: #62648A;">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 mb-3">
              <label for="" class="text-white">Nama Balita</label>
              <!-- <input type="test" step="0.1" min="0.1" value="Andi" class="form-control"> -->
              <select name="" id="" class="form-control">
                <?php foreach ($data['data'] as $res) : ?>
                  <option value="<?= $res['id']; ?>"><?= $res['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-lg-12">
              <label for="" class="text-white">Berapa Usia Ibu Saat Melahirkan ?</label>
              <div class="input-group mb-3">
                <input type="number" step="0.1" min="0.1" value="0.1" class="form-control">
                <span class="input-group-text">Tahun</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="" class="text-white">Berat Badan Balita Saat Lahir</label>
              <div class="input-group mb-3">
                <input type="number" step="0.1" min="0.1" value="0.1" class="form-control">
                <span class="input-group-text">Kg</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="" class="text-white">Berapa Jarak Kehamilan Ibu Dari Anak Sebelumnya ?</label>
              <div class="input-group mb-3">
                <input type="number" step="0.1" min="0.1" value="0.1" class="form-control">
                <span class="input-group-text">Tahun</span>
              </div>
            </div>
            <div class="col-lg-12">
              <label for="" class="text-white">Tinggi Badan Balita Saat Ini</label>
              <div class="input-group mb-3">
                <input type="number" min="0" value="0" class="form-control">
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