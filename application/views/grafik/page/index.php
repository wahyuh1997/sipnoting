<style>
  .app-main__inner {
    width: calc(100% - 120px) !important;
  }
</style>

<!-- Main Content -->
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>
        <?= $title; ?>
        <div class="page-title-subheading">
          <?= $subtitle; ?>
        </div>
      </div>
    </div>
    <div class="row ml-auto">
      <div class="col-3">Pilih Bulan</div>
      <div class="col-6">
        <input type="text" class="form-control datemonth" value="<?= $date; ?>">
      </div>
      <div class="col-lg-3">
        <button type="button" id="select-date" class="btn btn-sm btn-info">Pilih</button>
      </div>
    </div>
  </div>
</div>
<!-- End Main Content -->

<div class="card">
  <div class="card-body">
    <table id="export-table" class="table display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th>#</th>
          <th>Nama Balita</th>
          <th>Jenis Kelamin</th>
          <th>Usia</th>
          <th>Ayah</th>
          <th>Ibu</th>
          <th>Berat Badan</th>
          <th>Tinggi Badan</th>
          <th>Z-Score Akhir</th>
          <th>Kesimpulan Akhir</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($data['data'] as $res) : ?>
          <?php if ($res['kesimpulan'] == 'HK01') : ?>
            <tr class="list-data" data-id="<?= $res['bayi_id']; ?>">
              <td><?= $i++; ?></td>
              <td><?= $res['nama']; ?></td>
              <td><?= $res['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
              <td class="text-center"><?= $res['usia']; ?></td>
              <td><?= $res['ayah']; ?></td>
              <td><?= $res['ibu']; ?></td>
              <td class="text-center"><?= $res['berat_balita'] / 1000; ?> Kg</td>
              <td class="text-center"><?= $res['tinggi_balita']; ?> cm</td>
              <td class="text-right"><?= $res['z_score']; ?></td>
              <td class="text-center"><?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<div class="card mt-4 chart-view d-none">
  <div class="card-body">
    <div class="widget-chart p-3">
      <canvas id="myLineChart" height="100"></canvas>
    </div>
  </div>
</div>