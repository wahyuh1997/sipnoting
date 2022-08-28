<?php if ($data['status'] == true) : ?>
  <?php if (count($data['data']['order_detail']) > 0) : ?>
    <input type="hidden" id="historyPrice" value="<?= $data['data']['sub_total'] == null ? 0 : $data['data']['sub_total']; ?>">
    <input type="hidden" id="historyTotalPrice" value="<?= $data['data']['total_harga'] == null ? 0 : $data['data']['total_harga']; ?>">
    <input type="hidden" id="historyTax" value="<?= $data['data']['pajak'] == null ? 0 : $data['data']['pajak']; ?>">
    <?php foreach ($data['data']['order_detail'] as $key => $menu) : ?>
      <?php if ($menu['status'] != 0) : ?>
        <div class="row pos-table-row">
          <div class="col-9">
            <div class="pos-product-thumb">
              <div class="img" style="background-image: url(<?= base_url('assets/img/product/' . $menu['image']) ?>)"></div>
              <div class="info">
                <div class="title"><?= $menu['nama_menu']; ?></div>
                <div class="desc"><?= $menu['name_attribute']; ?></div>
                <div class="single-price">Rp. <?= $menu['harga']; ?></div>
                <div class="desc">x<?= $menu['qty']; ?></div>
              </div>
            </div>
          </div>
          <div class="col-3 d-flex flex-column">
            <div class="total-price">
              Rp. <?= $menu['sub_harga']; ?>
            </div>
          </div>
          <div class="col-12 text-center">
            <div class="info">
              <!-- Notice -->
              <?php switch ($menu['status']) {
                case 2:
                  $status = 'Pesanan Anda Sedang Di Proses';
                  break;
                case 1:
                  $status = 'Pesanan Selesai';
                  break;
                default:
                  $status = 'Pesanan Dibatalkan';
                  break;
              }; ?>
              <div class="single-price">- <?= $status; ?> -</div>
              <!-- End Of Notice -->
            </div>
          </div>
          <?php if ($menu['status'] == 3) : ?>
            <div class="pos-remove-confirmation d-block text-center">
              <p><?= $status; ?></p>
              <?= $menu['keterangan']; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php else : ?>
    <input type="hidden" id="historyPrice" value="0">
    <input type="hidden" id="historyTotalPrice" value="0">
    <input type="hidden" id="historyTax" value="0">
    <div>
      <div class="mb-3 text-center">
        <svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
          <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
        </svg>
      </div>
      <h4 class="text-center">Anda Belum Memesan Menu Apapun !</h4>
    </div>
  <?php endif; ?>
<?php else : ?>
  <input type="hidden" id="historyPrice" value="0">
  <input type="hidden" id="historyTotalPrice" value="0">
  <input type="hidden" id="historyTax" value="0">
  <div>
    <div class="mb-3 text-center">
      <svg width="6em" height="6em" viewBox="0 0 16 16" class="text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z" />
        <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z" />
      </svg>
    </div>
    <h4 class="text-center">Anda Belum Memesan Menu Apapun !</h4>
  </div>
<?php endif; ?>