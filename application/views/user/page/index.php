<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="pe-7s-user icon-gradient bg-mean-fruit">
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
      <a href="<?= base_url('user/add'); ?>" class="btn btn-shadow btn-info">Tambah <?= $title; ?></a>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <table id="myTable" class="table table-striped display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th class="text-center">#</th>
          <th></th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Email</th>
          <th>No. Telp</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $res) : ?>
          <tr>
            <td class="text-center"><?= $key + 1; ?></td>
            <td>
              <a href="" class="btn btn-primary btn-sm">Edit</a>
              <a href="" class="btn btn-danger btn-sm">Hapus</a>
            </td>
            <td><?= $res['nama']; ?></td>
            <td><?= $res['jabatan']; ?></td>
            <td><?= $res['email']; ?></td>
            <td><?= $res['no_hp']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>