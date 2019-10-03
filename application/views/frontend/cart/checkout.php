<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper">


    <?php if (count($cart) > 0) { ?>
    <div class="container padding-bottom-3x padding-top-2x mb-2">
      <div class="row">

        <div class="col-lg-8">
          <?php include 'step-wizard.php'; ?>

        <form action="<?= site_url('cart/order'); ?>" method="post">

          <h4 class="padding-bottom-1x"><?=$this->lang->line('Review Your Order');?></h4>

      <?php if (count($cart) > 0) {
        $cartStore = $this->m_model->selectas('cart', $cart[0]->id, 'cart_store');
        if (count($cartStore) > 0) {
      ?>

<?php if (count($cartStore) > 0) {
  foreach ($cartStore as $key => $valueCartStore) {
    $store = $this->m_model->selectas('id', $valueCartStore->store, 'store');
    //$cartDetail = $this->m_model->selectas('cart_store', $valueCartStore->id, 'cart_detail');
    $sql="select A.* from cart_detail A join product_store B on (A.product_store = B.id) where A.cart_store='".$valueCartStore->id."'";
    $cartDetail = $this->m_model->selectcustom($sql);
    if (count($cartDetail) > 0) {
?>

  <div class="card mb-4">
    <div class="card-header"><i class="icon-home"></i> <?php if (count($store) > 0) {
      echo $store[0]->brand;
    } else { echo $this->lang->line('Review Your Order'); } ?></div>
      <div class="card-bodys">

        <div class="table-responsive shopping-cart" style="padding-left: 15px; padding-right: 15px;">
          <table class="table">
            <tbody>
              <?php
              $subTotalCart = 0;
              foreach ($cartDetail as $key => $valueCartDetail) {
              $productStore = $this->m_model->selectas('id', $valueCartDetail->product_store, 'product_store');
              if (count($productStore) > 0) {
                $product_detail = $this->m_model->selectaslang('product', $productStore[0]->product, 'product_lang');
                $product_image = $this->m_model->selectas('product', $productStore[0]->product, 'product_image');
                if (count($product_image) > 0) {
                  $img = site_url('images/product/').$product_image[0]->small;
                } else {
                  $img = site_url('images/product/images.jpeg');
                }
                $subTotalCart += $valueCartDetail->price * $valueCartDetail->quantity;
              ?>
              <tr>
                <td style="max-width: 80px;">
                  <div class="product-item">
                    <a class="product-thumb" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>">
                      <img src="<?= $img; ?>" style="width: 70px;">
                    </a>
                  </div>
                </td>
                <td class="align-middle">
                  <div class="product-item">
                    <div class="product-info">
                      <h4 class="product-title">
                        <a href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
                      </h4>
                      <span>
                        <em><?=$this->lang->line('Quantity');?>: </em> 
                        <div class="count-input">
                          <?= $valueCartDetail->quantity; ?>
                        </div>
                      </span>
                      <span>
                        <em><?=$this->lang->line('keterangan');?>: </em> 
                          <input name="cart_detail_id[]" type="hidden" value="<?= $valueCartDetail->id; ?>">
                          <?= $valueCartDetail->note; ?>
                      </span>
                    </div>
                  </div>
                </td>
                <td class="text-center text-lg text-medium"><?= 'Rp '.number_format($valueCartDetail->price * $valueCartDetail->quantity); ?></td>

              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>



      </div>
    </div>
<?php } } } ?>


    <?php } } ?>


          <div class="row padding-top-1x mt-3">
            <div class="col-sm-6">
              <h5><?=$this->lang->line('Shipping to');?>:</h5>
              <ul class="list-unstyled">
              <?php
              $address = $this->m_model->selectas('id', $cart[0]->address, 'address');
              if (count($address) > 0) {
              ?>
                <li><span class="text-muted"><?=$this->lang->line('Name');?>:&nbsp; </span><?= $address[0]->name; ?></li>
                <li><span class="text-muted"><?=$this->lang->line('Address');?>:&nbsp; </span><?= $address[0]->address.', '.$address[0]->city_name.', '.$address[0]->province_name; ?></li>
                <li><span class="text-muted"><?=$this->lang->line('Phone');?>:&nbsp; </span><?= $address[0]->phone; ?></li>
              <?php } ?>
              </ul>
            </div>
            <div class="col-sm-6">
              <h5><?=$this->lang->line('Payment Method');?>:</h5>
              <ul class="list-unstyled">
              <?php
              //$payment = $this->m_model->selectas('id', $cart[0]->payment, 'payment');
              if (!empty($cart[0]->payment) || $cart[0]->payment==0) {
              ?>
                <li><span class="text-muted"><?= $cart[0]->pg_name; ?> </span></li>
              <?php } ?>
              </ul>
            </div>
          </div>


          <input type="hidden" name="checkout" value="true">

          <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <a class="btn btn-outline-secondary" href="<?= site_url('cart/payment'); ?>">
              <i class="icon-arrow-left"></i>
              <span class="hidden-xs-down"><?=$this->lang->line('Back');?></span>
            </a>
            <button type="submit" class="btn btn-primary pull-right" onclick="$('#loading').show();">
              <span class="hidden-xs-down"><?=$this->lang->line('Payment Completing');?></span>
              <i class="icon-arrow-right"></i>
            </button>
          </div>

          </form>
        </div>

      <div class="col-lg-4">
        <?php $this->load->view('frontend/cart/sidebar-cart'); ?>
      </div>


        </div>
      </div>
      <?php } else { ?>

      <?php } ?>

  </div>
<?php $this->load->view('frontend/layout/footer'); ?>