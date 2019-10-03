<?php $this->load->view('frontend/layout/header'); if (count($store) > 0) { ?>

    <div class="offcanvas-wrapper">

      <div class="container padding-bottom-3x margin-top-2x mb-1">
        <div class="row">
          <div class="col-xl-9 col-lg-8 order-lg-2">

          <div class="card mt-4">
            <div class="card-bodys">

          <?php
            if($store[0]->banner==''){
              //$image=base_url().'assets/frontend/img/features/04.jpg';
              $image=base_url().'assets/frontend/img/store_default.jpg';
            }
            else{
              $image=site_url('images/store/').$store[0]->banner;
            }
          ?>
          <div class="alert alert-image-bg" style="background-image: url(<?= $image ;?>)">
            <div class="mt-5 padding-top-1x padding-bottom-1x">
              <div class="mt-3"></div>
            </div>
            <a href="<?=site_url('member/inbox?')."storeId=".$store[0]->id."&userId=".$store[0]->user;?>" class="btn btn-primary float-right"><?=$this->lang->line('Inbox');?></a>
          </div>

            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-lg-4">
                  <span>
                    <?php
                  if(count($store)>0 && $store[0]->badge !=null){
                ?>
                    <img src="<?=base_url();?>/assets/frontend/img/badge/<?=$store[0]->badge;?>.png" style="width: auto; height:2rem;">
                <?php
                  }
                ?>
                    <b><?= $store[0]->brand; ?></b>
                  </span>
                </div>
                <div class="col-lg-8" style="text-align: right;">
                  <span class="lead"><?= $store[0]->description; ?></span>
                </div>
              </div>
            </div>
          </div>

<?php
  $product_store = $this->m_model->selectas2('store', $store[0]->id, 'hot_list', 1, 'product_store');
  if (count($product_store) > 0) {
?>
            <h3 class="text-center mt-30">Hot Lists</h3>
            <div class="isotope-grid cols-3 mb-2 margin-top-1x">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>

          <?php
          //print_r($product);
          //if (count($product)) {
         //foreach ($product_store as $key => $value) {
            //$product_store = $this->m_model->selectas('id', $value->id, 'product_store');
            if (count($product_store) > 0) {
              foreach ($product_store as $key => $valueStore) {
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
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $valueStore->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;  } } ?>" data-toggle="tooltip" title="Whishlist" data-iteration="<?=$status_tobe;?>"><i class="icon-heart" ></i></button>
                <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php } //else {
                ?>
                <button data-id="<?= $valueStore->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
                <?php
              //}
              ?>
              </div>
            </div>
          </div>
          <?php } } 
          //}
          // } ?>

        </div>
        <hr>
        <?php
      }?>
        <div class="shop-toolbar padding-bottom-1x padding-top-1x mb-2">
          <div class="column">
            <form method="get" action="">
              <div class="input-group" style="margin-right: 2%;">
                <span class="input-group-btn">
                  <button type="submit" id="search_general"><i class="icon-search"></i></button>
                </span>
                <input class="form-control" name="key" type="search" placeholder="<?=$this->lang->line('msg_search');?>" style="background: #fff !important;" value="<?=$this->input->get('key');?>">
              </div>
            </form>
          </div>
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
        <div class="isotope-grid cols-3 mb-2 margin-top-1x">
          <div class="gutter-sizer"></div>
          <div class="grid-sizer"></div>
        <?php
          $key_item=0;
          if(count($product)>0){
          foreach ($product as $key => $value) {
            # code...
            $img=array();
            $key_item++;
            $status_tobe=1;
            $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
            if(count($product_image)== 0 || empty($product_image[0]->thumbnail)){
              $img['path']=base_url().'images/images.jpeg';
            }
            else{
              $img=check_img('images/product/'.$product_image[0]->thumbnail);
            }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->product_store_id.'/'.$value->seo; ?>">
                <img src="<?= $img['path']; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->product_store_id.'/'.$value->seo; ?>"><?= $value->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <button data-id="<?= $value->product_store_id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
                $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->product_store_id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart" ></i></button>

              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$value->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php } //else { ?>
                <button data-id="<?= $value->product_store_id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>

              </div>
            </div>
          </div>
      <?php 
        }
      ?>
      <?php
        }else{
      ?>
          <div class="card text-center margin-top-1x">
            <div class="card-body padding-top-2x">
              <h3 class="card-title"><?=$this->lang->line('Opps....');?></h3>
              <p class="card-text"><?=$this->lang->line('Opps_cap');?></p>
            </div>
          </div>
      <?php
        }
      ?>
        </div>
        <?=$pagingnation;?>
      </div>

          <div class="col-xl-3 col-lg-4 order-lg-1">
            <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
            <aside class="sidebar sidebar-offcanvas">
              <?php
                $data['store_id']=$store[0]->id;
                $this->load->view('frontend/sidebar_store', $data);
              ?>

            </aside>
          </div>
        </div>
      </div>

  </div>
<?php } $this->load->view('frontend/layout/footer'); ?>