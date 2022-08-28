<div class="d-flex justify-content-between">
  <h1 class="page-header"><?= $subtitle; ?></h1>
  <div class="ml-auto">
    <a href="<?= base_url('user/change_password'); ?>" class="btn btn-sm btn-info btn-round">Ubah Kata Sandi</a>
    <a href="<?= base_url('user/edit'); ?>" class="btn btn-sm btn-info btn-round">Ubah Profile</a>
    <a href="<?= base_url('user/add'); ?>" class="btn btn-sm btn-primary btn-round">Add New</a>
  </div>
</div>

<!-- panel datatable -->
<div class="panel panel-inverse">
  <div class="panel-heading">
    <h4 class="panel-title">Datatable</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <div class="panel-body">
    <!-- html -->
    <table id="dataTable" class="table table-striped table-bordered align-middle">
      <thead>
        <tr>
          <th width="1%">#</th>
          <th width="15%"></th>
          <th>Username</th>
          <th>Name</th>
          <th>Role</th>
          <th>Dibuat</th>
          <th>Di Ubah</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $user) : ?>
          <?php if ($user['id'] !== $_SESSION['pos_order']['id']) : ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td>
                <a href="<?= base_url('user/edit/' . $user['username']); ?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="<?= base_url('user/reset_password/' . $user['username']); ?>" class="btn btn-info btn-sm btn-reset">Reset</a>
                <a href="<?= base_url('user/delete/' . $user['username']); ?>" class="btn btn-danger btn-sm btn-del">Hapus</a>
              </td>
              <td><?= $user['username']; ?></td>
              <td><?= $user['name']; ?></td>
              <td><?= $user['role']; ?></td>
              <td><?= dateFormat($user['created_at']); ?></td>
              <td><?= dateFormat($user['updated_at']); ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- script -->
  </div>
</div>