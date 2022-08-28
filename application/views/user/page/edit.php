<?php

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Base;
?>
<!-- BEGIN breadcrumb -->
<ol class="breadcrumb float-xl-end">
  <li class="breadcrumb-item"><a href="javascript:;"><?= $title; ?></a></li>
  <li class="breadcrumb-item"><a href="javascript:;"><?= $subtitle; ?></a></li>
</ol>
<!-- END breadcrumb -->
<!-- BEGIN page-header -->
<h1 class="page-header"><?= $subtitle; ?></h1>

<!-- panel search -->
<div class="panel panel-inverse">
  <div class="panel-heading">
    <h4 class="panel-title">Form Add</h4>
    <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-minus"></i></a>
    </div>
  </div>
  <form id="regCrudForm" data-redurl="<?= base_url('user'); ?>" method="POST">
    <div class="panel-body">

      <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" autocomplete="off">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>" autocomplete="off">
        </div>
      </div>
      <div class="mb-3 row <?= $_SESSION['pos_order']['id'] == $data['id'] ? 'd-none' : ''; ?>">
        <label for="role" class="col-sm-2 col-form-label">Posisi</label>
        <div class="col-sm-6">
          <select class="form-select default-select2" id="role" name="role" required>
            <option value="kasir" <?= $data['role'] == 'kasir' ? 'selected' : null; ?>>Kasir</option>
            <option value="dapur" <?= $data['role'] == 'dapur' ? 'selected' : null; ?>>Dapur</option>
            <!-- <option value="owner" <?= $data['role'] == 'owner' ? 'selected' : null; ?>>Owner</option> -->
          </select>
        </div>
      </div>
      <div class="panel-footer text-end">
        <a href="<?= base_url('user'); ?>" class="btn btn-secondary">Back</a>
        <button class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>