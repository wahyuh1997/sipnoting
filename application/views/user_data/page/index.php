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
    <div class="page-title-actions">
      <a href="<?= base_url('balita/add'); ?>" class="btn btn-shadow btn-info">Tambah Data Pengguna</a>
    </div>
  </div>
</div>
<!-- End Main Content -->

<div class="card">
  <div class="card-body">
    <table id="myTable" class="table display nowrap" style="width: 100%;">
      <thead>
        <tr class="table-info">
          <th style="width: 8%;">#</th>
          <th></th>
          <th>Nama</th>
          <th>Email</th>
          <th>No. Hp</th>
        </tr>
      </thead>
      <?php
      $i = 1;
      foreach ($data as $res) : ?>
        <?php if ($res['is_admin'] == 0) : ?>
          <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td>
              <a href="<?= base_url('user_data/edit/' . $res['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?= base_url('user_data/delete/' . $res['id']); ?>" class="btn btn-danger btn-sm del-sel">Hapus</a>
              <a href="<?= base_url('user_data/reset_pass?email=' . $res['email']); ?>" class="btn btn-info btn-sm del-reset">Reset Password</a>
            </td>
            <td><?= $res['nama']; ?></td>
            <td><?= $res['email']; ?></td>
            <td><?= $res['no_hp']; ?></td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </table>
    <!-- <div class="table-responsive">
    </div> -->
  </div>
</div>