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
      <a href="<?= base_url('deviasi/female/add'); ?>" class="btn btn-shadow btn-info">Tambah Data</a>
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
      <tbody>
        <?php foreach ($data['data'] as $key => $res) : ?>
          <tr>
            <td class="text-center"><?= $key + 1; ?></td>
            <td>
              <a href="<?= base_url('deviasi/female/edit/' . $res['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?= base_url('deviasi/female/delete/' . $res['id']); ?>" class="btn btn-danger btn-sm del-sel">Hapus</a>
            </td>
            <td><?= $res['usia']; ?></td>
            <td class="text-center"><?= $res['minus_3_sd']; ?></td>
            <td class="text-center"><?= $res['minus_2_sd']; ?></td>
            <td class="text-center"><?= $res['minus_1_sd']; ?></td>
            <td class="text-center"><?= $res['median']; ?></td>
            <td class="text-center"><?= $res['1_sd']; ?></td>
            <td class="text-center"><?= $res['2_sd']; ?></td>
            <td class="text-center"><?= $res['3_sd']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>