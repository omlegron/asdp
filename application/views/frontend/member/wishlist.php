<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php include 'member-sidebar.php'; ?>
          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>

          <?php
          //print_r($product);
          if (count($product)) { ?>

            <div class="isotope-grid cols-3 mb-2">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>






          <?php
          if (count($product)) {
          foreach ($product as $key => $value) {
            $product_store = $this->m_model->selectas('id', $value->product_store, 'product_store');
            if (count($product_store) > 0) {
              foreach ($product_store as $key => $valueStore) {
                //get table product
                $products_tbl = $this->m_model->selectas('id', $valueStore->product, 'product');
                $product_detail = $this->m_model->selectaslang('product', $valueStore->product, 'product_lang');
                $product_image = $this->m_model->selectas('product', $valueStore->product, 'product_image');
                if (count($product_image) > 0) {
                  $img = site_url('images/product/').$product_image[0]->small;
                } else {
                  $img = site_url('images/product/images.jpeg');
                }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$valueStore->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$valueStore->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($valueStore->price); ?>
              </h4>
              <?php $status_tobe=1; ?>
              <div class="product-buttons">
                <button data-id="<?= $valueStore->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->product_store, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>
                <?php
                  if($products_tbl[0]->quantity >0){
                ?>
                <button data-id="<?= $valueStore->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
                 <?php
                  }
                  else{
                ?>
                     <button class="carts btn btn-outline-primary btn-sm btn-disabled" disabled><i class="icon-bag"></i> <?=$this->lang->line('Add to Cart');?></button> 
                <?php
                  }
                ?>
              </div>
            </div>
          </div>

          <?php } } } } ?>

        </div>
          <?php } else { ?>
          <div class="card text-center margin-top-1x">
            <div class="card-body padding-top-2x">
              <h3 class="card-title"><?=$this->lang->line('msg_wishlist');?></h3>
              <div class="padding-top-1x padding-bottom-1x">
                <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Go Shopping');?></a>  
              </div>
            </div>
          </div>

          <?php } ?>

          </div>
        </div>
      </div>
      
      
    </div>
<?php $this->load->view('frontend/layout/footer'); ?>