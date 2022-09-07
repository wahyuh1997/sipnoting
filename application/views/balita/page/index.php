<style>
  .app-main__inner {
    width: calc(100% - 150px) !important;
  }
</style>
<!-- Main Content -->
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-smile icon-gradient bg-mean-fruit">
        </i>
      </div>
      <div>
        <?= $title; ?>
        <div class="page-title-subheading">
          <?= $subtitle; ?>
        </div>
      </div>
    </div>
    <!-- <div class="page-title-actions">
      <a href="<?= base_url('balita/add'); ?>" class="btn btn-shadow btn-info">Tambah Data Balita</a>
    </div> -->
  </div>
</div>
<!-- End Main Content -->

<div class="card">
  <div class="card-body">
    <table id="myTable" class="table table-striped display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th>#</th>
          <!-- <th></th> -->
          <th>Nama Balita</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tgl Lahir</th>
          <th>Usia</th>
          <th>Nama Ayah</th>
          <th>Nama Ibu</th>
          <th>Email</th>
          <th>No. Hp</th>
        </tr>
      </thead>
      <?php foreach ($data['data'] as $key => $res) : ?>
        <tr>
          <td class="text-center"><?= $key + 1; ?></td>
          <td><?= $res['nama']; ?></td>
          <td><?= $res['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
          <td><?= $res['tempat_lahir']; ?></td>
          <td><?= dateFormat($res['tanggal_lahir']); ?></td>
          <td><?= $res['usia_tahun'] != 0 ? $res['usia_tahun'] . ' Tahun' : null; ?> <?= $res['usia_bulan'] . ' Bulan'; ?></td>
          <td><?= $res['ayah']; ?></td>
          <td><?= $res['ibu']; ?></td>
          <td><?= $res['email']; ?></td>
          <td><?= $res['no_hp']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <!-- <div class="table-responsive">
    </div> -->
  </div>
</div>