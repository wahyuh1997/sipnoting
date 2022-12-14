<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-home icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>Dashboard
        <div class="page-title-subheading">
          Halaman Utama
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content bg-midnight-bloom">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading text-uppercase">Total Seluruh Balita</div>
          <!-- <div class="widget-subheading">Last year expenses</div> -->
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-white"><span><?= $balita['data']['total_bayi']; ?></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content bg-arielle-smile">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading text-uppercase">Rata-Rata Z-Score Balita</div>
          <!-- <div class="widget-subheading">Total Clients Profit</div> -->
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-white"><span><?= count($data['data']['rerata']) > 0 ? $data['data']['rerata'] : 0; ?></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content bg-grow-early">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading text-uppercase">Persentase Stunting Balita</div>
          <!-- <div class="widget-subheading">People Interested</div> -->
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-white"><span><?= count($percent['data']['persentase']) > 0 ? $percent['data']['persentase'] : 0; ?>%</span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
    <div class="card mb-3 widget-content bg-premium-dark">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading">Products Sold</div>
          <div class="widget-subheading">Revenue streams</div>
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-warning"><span>$14M</span></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$stun = 0;
$not_stun = 0;
foreach ($report['data'] as $res) {
  if ($res['kesimpulan'] == 'HK01') {
    $stun++;
  } else {
    $not_stun++;
  }
}; ?>
<div class="row">
  <div class="col-md-6">
    <div class="card mb-3 widget-content bg-success">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading text-uppercase">Total Balita Stunting</div>
          <!-- <div class="widget-subheading">Last year expenses</div> -->
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-white"><span><?= $stun; ?></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-3 widget-content bg-danger">
      <div class="widget-content-wrapper text-white">
        <div class="widget-content-left">
          <div class="widget-heading text-uppercase">Total Balita Tidak Stunting</div>
          <!-- <div class="widget-subheading">Total Clients Profit</div> -->
        </div>
        <div class="widget-content-right">
          <div class="widget-numbers text-white"><span><?= $not_stun; ?></span></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row d-none">
  <div class="col-md-12 col-lg-6">
    <div class="mb-3 card">
      <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
          <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
          Analisis Perbandingan Z-Score Pada Balita
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-lg-6">
    <div class="mb-3 card">
      <div class="card-header-tab card-header">
        <div class="card-header-title">
          <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
          Grafik Persentase Stunting Pada Balita
        </div>
      </div>
      <div class="card-body">
        <canvas id="myLineChart"></canvas>
      </div>
    </div>
  </div>
</div>