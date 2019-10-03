<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <div class="col-xl-9 col-lg-8 order-lg-2">
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div id="lbl_showing" class="shop-sorting">
                  <?php if (count($product) > 0) { ?>
                    <span class="text-muted"><?=$this->lang->line('Showing');?>:&nbsp;</span><span><?= count($product); ?> <?=$this->lang->line('items');?></span>
                  <?php } else { ?>
                    <span class="text-muted"><?=$this->lang->line('Showing');?>:&nbsp;</span><span>0 <?=$this->lang->line('items');?></span>
                  <?php }?>
                </div>
              </div>
              <div class="column ">
                <div class="shop-sorting">
                  <label for="sorting"><?=$this->lang->line('Sort by');?>:</label>
                  <select class="form-control" id="sorting" name="sort">
                    <!--<option>Popularity</option>
                    <option>Avarage Rating</option>-->
                    <option value="" selected="selected" disabled="disabled"><?=$this->lang->line('Select');?></option>
                    <option value="L-H"><?=$this->lang->line('LH');?></option>
                    <option value="H-L"><?=$this->lang->line('HL');?></option>
                    <option value="A-Z"><?=$this->lang->line('AZ');?></option>
                    <option value="Z-A"><?=$this->lang->line('ZA');?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="isotope-grid cols-3 mb-2" id="div_list_product">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>

          <?php
          $key_item=0;
          if ((count($product) && $sort_status == false) || !isset($product[0]->product_store_id)) {
          foreach ($product as $key => $value) {
            $product_store = $this->m_model->selectas('product', $value->id, 'product_store');
            if (count($product_store) > 0) {
              foreach ($product_store as $key => $valueStore) {
                $key_item++;
                $product_detail = $this->m_model->selectaslang('product', $value->id, 'product_lang');
                $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
                if (count($product_image) > 0) {
                  $img = site_url('images/product/').$product_image[0]->small;
                } else {
                  $img = site_url('images/product/images.jpeg');
                }
                $status_tobe=1;
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

              <div class="product-buttons">
                <button data-id="<?= $valueStore->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $valueStore->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart" ></i></button>

              <?php if ($this->session->userdata('user_role') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>"><?=$this->lang->line('Sell');?></a>
              <?php } else { ?>
                <button data-id="<?= $valueStore->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php } ?>

              </div>
            </div>
          </div>

          <?php } } }
        } 
        else if(isset($product[0]->product_store_id))
        {//ini untuk tampilan jika sort product list jalan, karena query pada tampilan product list yang sudah ada tidak dapat mensort secara keseluruhan dari product store sekaligus
          //print_r($product);
          //die();
          foreach ($product as $key => $value) {
            $product_store = $this->m_model->selectas('id', $value->product_store_id, 'product_store');
            if (count($product_store) > 0) {
              foreach ($product_store as $key => $valueStore) {
                $key_item++;
                $product_detail = $this->m_model->selectaslang('product', $value->id, 'product_lang');
                $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
                if (count($product_image) > 0) {
                  $img = site_url('images/product/').$product_image[0]->small;
                } else {
                  $img = site_url('images/product/images.jpeg');
                }
                $status_tobe=1;
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

              <div class="product-buttons">
                <button data-id="<?= $valueStore->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                  echo'wishlists ';
                  $status_tobe=1;
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>

              <?php if ($this->session->userdata('user_role') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>"><?=$this->lang->line('Sell');?></a>
              <?php } else { ?>
                <button data-id="<?= $valueStore->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php } ?>

              </div>
            </div>
          </div>

          <?php } } }
        }
        ?>

        </div>
        <!--
            <nav class="pagination">
              <div class="column">
                <ul class="pages">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">12</a></li>
                </ul>
              </div>
              <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
            </nav>
          -->
          </div>

          <div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
            <aside class="sidebar sidebar-offcanvas">
              <?php $this->load->view('frontend/sidebar'); ?>
            </aside>
          </div>
        </div>
      </div>

  </div>
  <script type="text/javascript">
      $("#lbl_showing").html('<span class="text-muted">'+
                              '<?= $this->lang->line('Showing');?>:&nbsp;</span>'+
                              '<span><?= $key_item; ?> <?=$this->lang->line('items');?></span>')
  </script>
<?php $this->load->view('frontend/layout/footer'); ?>