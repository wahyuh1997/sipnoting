<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>
        <?= $title; ?>
        <div class="page-title-subheading">
          <?= $subtitle; ?>
        </div>
      </div>
    </div>
    <div class="page-title-actions">
      <a href="<?= base_url('deviasi/male/add'); ?>" class="btn btn-shadow btn-info">Tambah Data</a>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table id="myTable" class="table table-striped display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th>#</th>
          <th></th>
          <th>Usia (Bulan)</th>
          <th class="text-center">-3 SD</th>
          <th class="text-center">-2 SD</th>
          <th class="text-center">-1 SD</th>
          <th class="text-center">Median</th>
          <th class="text-center">1 SD</th>
          <th class="text-center">2 SD</th>
          <th class="text-center">3 SD</th>
        </tr>
      </thead>
    </table>
  </div>
</div>