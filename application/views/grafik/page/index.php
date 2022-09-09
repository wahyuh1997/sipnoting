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
    <table id="myTable" class="table table-striped display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th>#</th>
          <th></th>
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
          <tr>
            <td><?= $i++; ?></td>
            <td>
              <button type="button" class="btn btn-sm btn-info">Detail</button>
            </td>
            <td><?= $res['nama']; ?></td>
            <td><?= $res['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
            <td><?= $res['usia']; ?></td>
            <td><?= $res['ayah']; ?></td>
            <td><?= $res['ibu']; ?></td>
            <td><?= $res['berat_balita'] / 1000; ?> Kg</td>
            <td><?= $res['tinggi_balita']; ?> cm</td>
            <td><?= $res['z_score']; ?></td>
            <td><?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<div class="card mt-4">
  <div class="card-body">
    <div class="widget-chart p-3">
      <canvas id="myLineChart" height="100"></canvas>
    </div>
    <div class="pt-2 card-body">
      <div class="row">
        <div class="col-md-4">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="widget-numbers fsize-3 text-muted">63%</div>
                </div>
                <div class="widget-content-right">
                  <div class="text-muted opacity-6">Berat Badan</div>
                </div>
              </div>
              <div class="widget-progress-wrapper mt-1">
                <div class="progress-bar-sm progress-bar-animated-alt progress">
                  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="widget-numbers fsize-3 text-muted">32%</div>
                </div>
                <div class="widget-content-right">
                  <div class="text-muted opacity-6">Tinggi Badan</div>
                </div>
              </div>
              <div class="widget-progress-wrapper mt-1">
                <div class="progress-bar-sm progress-bar-animated-alt progress">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-content">
            <div class="widget-content-outer">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="widget-numbers fsize-3 text-muted">71%</div>
                </div>
                <div class="widget-content-right">
                  <div class="text-muted opacity-6">Z-Score</div>
                </div>
              </div>
              <div class="widget-progress-wrapper mt-1">
                <div class="progress-bar-sm progress-bar-animated-alt progress">
                  <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: 71%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>