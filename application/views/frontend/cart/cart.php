<?php $this->load->view('frontend/layout/header'); ?>

<?php //print_r($cart); ?>

<div class="offcanvas-wrapper">
<div class="container padding-bottom-3x padding-top-2x mb-2">

  <div class="row">
      <?php if (count($cart) > 0) {
        $cartStore = $this->m_model->selectas('cart', $cart[0]->id, 'cart_store');
        if (count($cartStore) > 0) {
      ?>
      <div class="col-lg-9">

        <form>

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
    } else { echo "Store not found"; } ?></div>
      <div class="card-bodys">

        <div class="table-responsive shopping-cart" style="padding-left: 15px; padding-right: 15px;">
          <table class="table">
            <tbody>
              <?php
              $subTotalCart = 0;
              foreach ($cartDetail as $key => $valueCartDetail) {
              $productStore = $this->m_model->selectas('id', $valueCartDetail->product_store, 'product_store');
              if (count($productStore) > 0) {
                $product_master = $this->m_model->selectas('id', $productStore[0]->product, 'product');
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
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="<?= site_url('product/detail/'.$valueCartDetail->product_store.'/').$product_detail[0]->seo; ?>">
                      <img src="<?= $img; ?>" style="max-width: 80px;">
                    </a>
                    <div class="product-info">
                      <h4 class="product-title">
                        <a href="<?= site_url('product/detail/'.$valueCartDetail->product_store.'/').$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
                      </h4>
                      <span>
                        <em><?=$this->lang->line('Quantity');?>: </em> 
                        <div class="count-input">
                          <input type="number" name="qty[]" class="qty form-control" value="<?= $valueCartDetail->quantity; ?>" min="1" max="<?=$product_master[0]->quantity;?>">
                          <input type="hidden" name="product_id[]" value="<?= $productStore[0]->id; ?>">
                          <input type="hidden" name="session[]" value="<?= $cart[0]->user; ?>">
                        </div>
                      </span>
                      <span>
                        <em><?=$this->lang->line('keterangan');?>: </em> 
                          <textarea name="note[]" class="form-control" placeholder="<?= $this->lang->line('note_caption');?>" rows="2"><?= $valueCartDetail->note; ?></textarea>
                      </span>
                    </div>
                  </div>
                </td>
                <td class="text-center text-lg text-medium"><?= 'Rp '.number_format($valueCartDetail->price * $valueCartDetail->quantity); ?></td>
                <td class="text-center">
                  <a class="remove-from-cart" href="<?= site_url('cart/delete?rm=').$valueCartDetail->id.'&crt='.$cart[0]->id; ?>" data-toggle="tooltip" data-original-title="<?=$this->lang->line('Remove item');?>">
                    <i class="icon-x"></i>
                  </a>
                </td>

              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
<?php } } } ?>


        <div class="shopping-cart-footer">
          <!--
          <div class="column">
            <div class="coupon-form">
              <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required="">
              <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
            </div>
          </div>-->
          <div class="column text-lg"><?=$this->lang->line('Subtotal');?>: <span class="text-medium"><?= 'Rp '.number_format($subTotalCart); ?></span></div>
        </div>
        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>">
              <i class="icon-arrow-left"></i>&nbsp;<?=$this->lang->line('Back to Shopping');?>
            </a>
            </div>
          <div class="column">
            <a class="btn btn-sm btn-outline-danger" href="<?= site_url('cart/clear?act=clear'); ?>"><?=$this->lang->line('Clear Cart');?></a>

            <a class="updateCarts btn btn-sm btn-primary" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!"><?=$this->lang->line('Update Cart');?></a>

            <a class="btn btn-sm btn-success" href="<?= site_url('cart/checkout'); ?>"><?=$this->lang->line('Checkout');?></a>
          </div>
        </div>
        </form>

    <?php } } ?>
    </div>
    <?php 
      if (count($cart) > 0 && count($cartStore) > 0) {
    ?>
      <div class="col-lg-3">
        <?php $this->load->view('frontend/cart/sidebar-cart'); ?>
      </div>
    <?php
    }
    ?>

    <?php
      if (count($cart) == 0) {
    ?>
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <h1 class="card-title"><?=$this->lang->line('msg_empty_cart');?>.</h1>
            <h3>
              <?=$this->lang->line('Enjoy Your Shopping');?> - <b>Bazaarplace</b>
            </h3>
            <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>">
              <i class="icon-arrow-left"></i>&nbsp; <?=$this->lang->line('Back to Shopping');?>
            </a>
          </div>
        </div>
    <?php
      }
    ?>

  </div>

</div>
</div>

<?php $this->load->view('frontend/layout/footer'); ?>