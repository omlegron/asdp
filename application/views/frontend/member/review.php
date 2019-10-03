<?php
 $this->load->view('frontend/layout/header'); 
 ?>

  <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php include 'member-sidebar.php'; ?>
          <div class="col-lg-9">

        <?php
        if ($this->input->get('orders')) {
          $orderStore = $this->m_model->selectas('id', $this->input->get('orders'), 'orders_store');

          if (count($orderStore) > 0) {
          $orders = $this->m_model->selectas('id', $orderStore[0]->orders, 'orders');
          if (count($orders) > 0) {
        ?>
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <h5>Review</h5>
          <hr class="padding-bottom-1x">

            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">

              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th></th>
                    <th><?=$this->lang->line('Product');?></th>
                    <th><?=$this->lang->line('Rating & Review');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($orderStore as $key => $value) {
                    $orderDetail = $this->m_model->selectas('orders_store', $value->id, 'orders_detail');
                    if (count($orderDetail) > 0) {
                      foreach ($orderDetail as $key => $valueDetail) {
                        $productStore = $this->m_model->selectas('id', $valueDetail->product_store, 'product_store');
                        if (count($productStore) > 0) {
                          $product_detail = $this->m_model->selectaslang('product', $productStore[0]->product, 'product_lang');
                          $product_image = $this->m_model->selectas('product', $productStore[0]->product, 'product_image');
                          if (count($product_image) > 0) {
                            $keymg = site_url('images/product/').$product_image[0]->small;
                          } else {
                            $keymg = site_url('images/product/images.jpeg');
                          }
                  ?>


                  <?php $getReview = $this->m_model->selectas3('product', $productStore[0]->product, 'orders', $value->orders, 'user', $this->session->userdata('user'), 'review');
                  if (count($getReview) > 0) { ?>
                  <tr>
                    <td><img src="<?= $keymg; ?>" style="width: 50px; height: 50px;"></td>
                    <td>
                      <a style="text-decoration: none;" target="_blank" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
                    </td>
                    <td>

                        <div class="ratings-container">
                          <div class="ratings" style="width: <?= $getReview[0]->star; ?>%;"></div>
                        </div>
                        <textarea name="review" class="form-control" readonly=""><?= $getReview[0]->review; ?></textarea>
                    </td>
                  </tr>
                <?php } else { ?>

                  <tr>
                    <td><img src="<?= $keymg; ?>" style="width: 50px; height: 50px;"></td>
                    <td>
                      <a style="text-decoration: none;" target="_blank" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
                    </td>
                    <td>
                      <form action="" method="post">
                      <input type="hidden" name="order" value="<?= $value->orders; ?>">
                      <input type="hidden" name="product" value="<?= $productStore[0]->product; ?>">
                      <span class="rating">
                          <input type="radio" class="rating-input" id="rating-input-<?= $key; ?>-5" name="star" value="100">
                          <label for="rating-input-<?= $key; ?>-5" class="rating-star"></label>
                          <input type="radio" class="rating-input" id="rating-input-<?= $key; ?>-4" name="star" value="80">
                          <label for="rating-input-<?= $key; ?>-4" class="rating-star"></label>
                          <input type="radio" class="rating-input" id="rating-input-<?= $key; ?>-3" name="star" value="60">
                          <label for="rating-input-<?= $key; ?>-3" class="rating-star"></label>
                          <input type="radio" class="rating-input" id="rating-input-<?= $key; ?>-2" name="star" value="40">
                          <label for="rating-input-<?= $key; ?>-2" class="rating-star"></label>
                          <input type="radio" class="rating-input" id="rating-input-<?= $key; ?>-1" name="star" value="20">
                          <label for="rating-input-<?= $key; ?>-1" class="rating-star"></label>
                      </span>
                        <textarea name="review" class="form-control"></textarea>
                        <input type="submit" name="sendreview" class="btn btn-sm btn-primary" value="<?=$this->lang->line('Review');?>">
                        </form>
                    </td>
                  </tr>

                <?php } ?>

                  <?php } } } } ?>
                </tbody>
              </table>

            </div>
            <hr>

          <?php } } else { ?>



          <?php } } ?>
          </div>
        </div>
      </div>
      
      
    </div>

<?php $this->load->view('frontend/layout/footer'); ?>