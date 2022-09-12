<style>
  .app-main__inner {
    width: calc(100% - 15px) !important;
  }
</style>

<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-calculator icon-gradient bg-mean-fruit">
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
      <a href="<?= base_url('diagnose/add'); ?>" class="btn btn-shadow btn-info">Tambah Data <?= $title; ?></a>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table id="myTable" class="table display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th>#</th>
          <th></th>
          <th>Nama Balita</th>
          <th>Jenis Kelamin</th>
          <th>Usia</th>
          <th>Berat Badan</th>
          <th>Tinggi Badan</th>
          <th>Z-Score</th>
          <th>Kesimpulan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['data'] as $key => $res) : ?>
          <?php if ($res['kesimpulan'] == 'HK01') : ?>
            <tr>
              <td class="text-center"><?= $key + 1; ?></td>
              <td>
                <a href="<?= base_url('diagnose/delete/' . $res['id']); ?>" class="btn btn-danger btn-sm del-sel">Hapus</a>
              </td>
              <td><?= $res['nama']; ?></td>
              <td><?= $res['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
              <td><?= $res['usia']; ?> Bulan</td>
              <td><?= $res['berat_balita'] / 1000; ?> Kg</td>
              <td><?= $res['tinggi_balita']; ?> cm</td>
              <td><?= $res['z_score']; ?></td>
              <td><?= $res['kesimpulan'] == 'HK01' ? 'Stunting' : 'Tidak Stunting'; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>