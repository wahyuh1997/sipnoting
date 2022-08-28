<?php if ($data_kitchen['status'] == true) : ?>
  <?php if (count($data_kitchen['data']) > 0) : ?>
    <?php foreach ($data_kitchen['data'] as $kitchen) : ?>
      <?php if (count($kitchen['order_detail']) > 0) : ?>
        <div class="pos-task-row">
          <div class="pos-task">
            <div class="pos-task-info">
              <div class="table-no">
                Table <b><?= $kitchen['no_meja']; ?></b>
              </div>
              <div class="order-no">
                No. Order: #<?= $kitchen['no_order']; ?>
              </div>
              <div class="time-pass" data-start-time="3">
                07:13 time
              </div>
            </div>
            <div class="pos-task-body">
              <div class="pos-task-completed">
                <?php
                $count = 0;
                for ($i = 0; $i < count($kitchen['order_detail']); $i++) {
                  if ($kitchen['order_detail'][$i]['status'] == 1) {
                    $count++;
                  }
                }; ?>
                Completed: <b>(<?= $count; ?>/<?= count($kitchen['order_detail']); ?>)</b>
              </div>
              <div class="pos-task-product-row">

                <?php foreach ($kitchen['order_detail'] as $menu) : ?>
                  <?php if ($menu['status'] != 0) : ?>
                    <div class="pos-task-product <?= $menu['status'] == 1 ? 'completed' : ''; ?>">
                      <div class="pos-task-product-img">
                        <div class="cover" style="background-image: url(<?= base_url('assets/img/product/' . $menu['image']); ?>);"></div>
                        <?php if ($menu['status'] == 1) : ?>
                          <div class="caption">
                            <div>Selesai</div>
                          </div>
                        <?php elseif ($menu['status'] == 3) : ?>
                          <div class="caption">
                            <div>Dibatalkan !</div>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="pos-task-product-info">
                        <div class="info">
                          <div class="title"><?= $menu['nama_menu']; ?></div>
                          <div class="desc">
                            - <?= $menu['name_attribute']; ?>
                          </div>
                        </div>
                        <div class="qty">
                          x<?= $menu['qty']; ?>
                        </div>
                      </div>
                      <?php if ($menu['status'] == 3) : ?>
                        <h3 class="text-center"><?= $menu['keterangan']; ?></h3>
                      <?php endif; ?>
                      <?php if ($menu['status'] == 2) : ?>
                        <div class="pos-task-product-action" data-id="<?= $menu['id']; ?>" data-qty="<?= $menu['qty']; ?>">
                          <a id="btn-complete" href="#" class="btn btn-success">Complete</a>
                          <a id="btn-cancel" href="#" class="btn btn-outline-inverse" data-menu="<?= $menu['nama_menu']; ?>">Cancel</a>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
<?php endif; ?>