<?php $this->load->view('frontend/layout/header'); ?>

<?php //print_r($cart); ?>

  <div class="offcanvas-wrapper">

<div class="container padding-bottom-3x padding-top-2x mb-2">
<div class="row">
      <div class="col-lg-9">
        <?php include 'step-wizard.php'; ?>
        <form action="" method="post">

      <?php if (count($cart) > 0) {
        $cartStore = $this->m_model->selectas('cart', $cart[0]->id, 'cart_store');
        if (count($cartStore) > 0) {
      ?>

<?php if (count($cartStore) > 0) {
  foreach ($cartStore as $key => $valueCartStore) {
    $weight = 0;
    $destination = 0;
    $storeLocation = 0;
    $store = $this->m_model->selectas('id', $valueCartStore->store, 'store');
    $address = $this->m_model->selectas('id', $cart[0]->address, 'address');
    //$cartDetail = $this->m_model->selectas('cart_store', $valueCartStore->id, 'cart_detail');
    $sql="select A.* from cart_detail A join product_store B on (A.product_store = B.id) where A.cart_store='".$valueCartStore->id."'";
    $cartDetail = $this->m_model->selectcustom($sql);
    if (count($cartDetail) > 0 && count($store) > 0 && count($address) > 0) {
      $storeLocation = $store[0]->city;
      $destination = $address[0]->district_id;
      $id_cartDetail=$cartDetail[0]->id;
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
                        <em><?=$this->lang->line('Quantity');?> : </em> 
                        <div class="count-input">
                          <?= $valueCartDetail->quantity; ?>
                        </div>
                      </span>
                      <span>
                        <em><?=$this->lang->line('keterangan');?>: </em> 
                          <input name="cart_detail_id[]" type="hidden" value="<?= $valueCartDetail->id; ?>">
                          <textarea name="note[<?=$id_cartDetail;?>]" class="form-control" placeholder="<?= $this->lang->line('note_caption');?>" rows="2"><?= $valueCartDetail->note; ?></textarea>
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

        <div class="card-body">
          <div class="table-responsive" style="background: #fafafa; border: 1px #e5e5e5 solid; border-radius: 4px">
            <table class="table table-hover" style="margin-bottom: 0;">
              <tbody>
              <?php
              $cart = $this->m_model->selectas('user', $this->session->userdata('user'), 'cart');
              if (count($cart) > 0) {
                $carts = $this->m_model->selectas('cart_store', $valueCartStore->id, 'cart_detail');
                if (count($carts) > 0) {
                  foreach ($carts as $key => $value) {
                    $weight += $value->weight * $value->quantity;
                  }
                }

                $shipments = $this->m_model->select('shipment');
                if (count($shipments) > 0) {
                  ?>
                  <tr>
                    <td class="align-middle"><?=$this->lang->line('Shipping Method');?></td>
                    <td class="align-middle">
                      <select class="form-control" name="courier[]">
                         <option  value="<?= $valueCartStore->id.'@C&C#Click & Collect.'; ?>" >C&C - Click & Collect <?= 'Rp '.number_format(0); ?>
                      </option>

                  <?php
                  foreach ($shipments as $keyShipment => $valueShipment) {
                    //--
                    $courier = getCour($storeLocation, $destination, $weight, $valueShipment->shipment);
                    if ($courier) {
                      if (count($courier['items']) > 0) {
                        foreach ($courier['items'] as $key => $value) {
                        ?>

                      <option  value="<?= $valueCartStore->id.'@'.$courier['code'].'#'.$value['service']; ?>" <?php if ($cart[0]->shipment == $courier['code'] && $cart[0]->shipment_serv == $value['service']) { echo "selected"; } ?>><?= ucwords($courier['code']); ?> - <?= ucwords($value['service']); ?> (<?= str_replace('HARI', '', $value['etd']); ?> days) <?= 'Rp '.number_format($value['cost']); ?>
                      </option>

                        <?php
                        }
                      }
                    }
                    //--
                  }
                  ?>
                  </select>
                  <?php
                }
              } //- cart
              ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
<?php } } } ?>

        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="<?= site_url('cart/address'); ?>">
              <i class="icon-arrow-left"></i>&nbsp;<?=$this->lang->line('Back to Address');?>
            </a>
            </div>
          <div class="column">
            <button type="submit" class="btn btn-primary">
              <span class="hidden-xs-down"><?=$this->lang->line('Continue');?> </span>
              <i class="icon-arrow-right"></i>
            </button>
          </div>
        </div>

    <?php } } ?>
      </form>
    </div>

      <div class="col-lg-3">
        <?php $this->load->view('frontend/cart/sidebar-cart'); ?>
      </div>
  </div>
</div>

<?php $this->load->view('frontend/layout/footer'); ?>