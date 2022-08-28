<!-- Load Menu -->
<?php foreach ($data['data'] as $key => $menu) : ?>
  <div class="product-container" data-type="<?= strtolower($menu['menuCatName']); ?>">
    <a href="#" class="product" data-id="<?= $key ?>">
      <div class="img" style="background-image: url(<?= $this->image_server . $menu['menuImage']; ?>)"></div>
      <div class="text">
        <div class="title"><?= $menu['menuName']; ?></div>
        <!-- <div class="desc">chicken, egg, mushroom, salad</div> -->
        <div class="price">TWD <?= $menu['menuPrice']; ?></div>
      </div>
    </a>
  </div>
<?php endforeach; ?>