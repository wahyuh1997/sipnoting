<?php
if ($data['image'] == null) {
  $data['image'] = 'no-image-available.png';
};
?>
<div class="modal-body p-0">
  <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
  <div class="pos-product">
    <div class="pos-product-img">
      <div class="img" style="background-image: url(<?= base_url('assets/img/product/' . $data['image']) ?>)"></div>
    </div>
    <div class="pos-product-info">
      <div class="title"><?= $data['nama_menu']; ?></div>
      <div class="price">Rp. <?= $data['harga']; ?></div>
      <hr />
      <div class="option-row">
        <div class="qty">
          <div class="input-group">
            <a href="#" class="btn btn-default pos-product-minqty"><i class="fa fa-minus"></i></a>
            <input type="text" id="pos-product-qty" class="form-control border-0 text-center" name="" value="1" />
            <a href="#" class="btn btn-default pos-product-addqty"><i class="fa fa-plus"></i></a>
          </div>
        </div>
      </div>
      <?php if (count($data['atribute']) > 0) : ?>
        <div class="option-row">
          <div class="option-title">Ukuran</div>
          <div class="option-list">
            <div class="option">
              <input type="radio" id="size3" name="size" value="0" data-attr="Kecil" class="option-input" checked />
              <label class="option-label" for="size3">
                <span class="option-text">Kecil</span>
                <span class="option-price">+ Rp. 0</span>
              </label>
            </div>
            <div class="option">
              <input type="radio" id="size1" name="size" value="3000" data-attr="Besar" class="option-input" />
              <label class="option-label" for="size1">
                <span class="option-text">Besar</span>
                <span class="option-price">+ Rp. 3000</span>
              </label>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="btn-row" <?= count($data['atribute']) == 0 ? 'style="margin-top: 90px;"' : null; ?>>
        <a href="#" class="btn btn-default" data-bs-dismiss="modal">Cancel</a>
        <a href="#" id="add-to-cart" class="btn btn-success" data-id="<?= $data['id']; ?>">Add to cart <i class="fa fa-plus fa-fw ms-2"></i></a>
      </div>
    </div>
  </div>
</div>