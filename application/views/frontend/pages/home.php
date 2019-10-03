<?php $this->load->view('frontend/layout/header'); ?>
    <div class="offcanvas-wrapper">
      <!--<section class="hero-slider" style="min-height: 0px !important;/*background-image: url(<?= site_url('images/slider/bazaar.jpg'); ?>); background-size: 100% 100%;*/">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
          <div class="item" style="min-height: 0px !important;" >-->
            <!--<div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                  <div class="from-bottom">
                    <div class="h2 text-body text-normal mb-2 pt-1"><b></b></div>
                    <div class="h2 text-body text-normal mb-4 pb-1"></div>
                  </div>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"></div>
              </div>
            </div>-->
           <!-- <img src="<?= base_url('images/slider/bannerbazaar-croped.jpg'); ?>">
          </div>
        </div>
      </section>-->
      <section class="hero-slider p-3">
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true,&quot;autoplay&quot;: true, &quot;margin&quot;: 20, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:1},&quot;768&quot;:{&quot;items&quot;:1},&quot;991&quot;:{&quot;items&quot;:2},&quot;1200&quot;:{&quot;items&quot;:2}} }">
          <div class="item" style="min-height: 0px !important;" >
            <img src="<?= base_url('images/slider/blackkelly.jpg'); ?>" class="img-fluid" style="height: 100%; width: 100%;">
          </div>
          <div class="item" style="min-height: 0px !important;" >
            <img src="<?= base_url('images/slider/inficlo.jpg'); ?>" class="img-fluid" style="height: 100%; width: 100%;">
          </div>
        </div>
      </section>

      <section class="container padding-top-3x">
        <h3 class="text-center mb-30"><?=$this->lang->line('Top Categories');?></h3>
        <div class="row">
        <?php
          $TopCategories = $this->m_model->selectasmax(3, 'top_category=1', 'category_parent');
          if(count($TopCategories)>0){
            $main_thum="";
            $thum1="";
            $thum2="";
            foreach ($TopCategories as $key => $valueTopCategories) {
              # code...
              $main_thum=check_img($valueTopCategories->main_thumbnail);
              $thum1=check_img($valueTopCategories->thumbnail1);
              $thum2=check_img($valueTopCategories->thumbnail2);

        ?>
            <div class="col-md-4 col-sm-6">
              <div class="card mb-30"><a class="card-img-tiles" href="<?= site_url("product/".$valueTopCategories->seo);?>">
                  <div class="inner">
                    <div class="main-img">
                      <img src="<?= $main_thum['path']; ?>" alt="<?=$valueTopCategories->name.'-main_thumb';?>">
                    </div>
                    <div class="thumblist">
                      <img src="<?= $thum1['path']; ?>" alt="<?=$valueTopCategories->name.'-thum1';?>">
                      <img src="<?= $thum2['path']; ?>" alt="<?=$valueTopCategories->name.'-thum2';?>"></div>
                  </div></a>
                <div class="card-body text-center">
                  <h4 class="card-title">
                    <?php
                      if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                        echo  $valueTopCategories->name_id; 
                      }
                      else{
                        echo  $valueTopCategories->name; 
                      }
                    ?>
                  </h4>
                  <a class="btn btn-outline-primary btn-sm" href="<?= site_url("product/".$valueTopCategories->seo);?>"><?=$this->lang->line('View Products');?></a>
                </div>
              </div>
            </div>
        <?php
            }
          }
        ?>
          <!--<div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="#">
                <div class="inner">
                  <div class="main-img"><img src="<?= site_url('assets/frontend/img/shop/categories/04.jpg'); ?>" alt="Category"></div>
                  <div class="thumblist"><img src="<?= site_url('assets/frontend/img/shop/categories/05.jpg'); ?>" alt="Category"><img src="<?= site_url('assets/frontend/img/shop/categories/06.jpg'); ?>" alt="Category"></div>
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title">Electronics</h4>
                <a class="btn btn-outline-primary btn-sm" href="#">View Products</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="#">
                <div class="inner">
                  <div class="main-img"><img src="<?= site_url('assets/frontend/img/shop/categories/07.jpg'); ?>" alt="Category"></div>
                  <div class="thumblist"><img src="<?= site_url('assets/frontend/img/shop/categories/08.jpg'); ?>" alt="Category"><img src="<?= site_url('assets/frontend/img/shop/categories/09.jpg'); ?>" alt="Category"></div>
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title">Machinery & Industrial Parts</h4>
                <a class="btn btn-outline-primary btn-sm" href="#">View Products</a>
              </div>
            </div>
          </div>-->
        </div>
        <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="<?= site_url("product/");?>"><?=$this->lang->line('All Categories');?></a></div>
      </section>

      <!--
      <section class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12">
            <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(<?= site_url('assets/frontend/img/banners/home02.jpg'); ?>);"><span class="overlay rounded" style="opacity: 0;"></span>
              <div class="text-center">
                <h3 class="display-4 text-normal text-white text-shadow mb-1">Collection</h3>
                <h2 class="display-2 text-bold text-white text-shadow">Open Global Market!</h2>
                <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">Visit us</h4><br><a class="btn btn-primary margin-bottom-none" href="#">Locate Stores</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    -->


      <section class="container padding-top-3x">
        <h3 class="text-center mb-30 text-danger">Flash Sale</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          

          <?php
          $similarProduct = $this->m_model->selectasmax(4, 'flash_sale=1', 'product_store');
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            $product = $this->m_model->selectas('id', $value->product, 'product');
            if (count($product) > 0) {
              $product_detail = $this->m_model->selectaslang('product', $product[0]->id, 'product_lang');
              $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
              if (count($product_image) > 0) {
                $img = site_url('images/product/').$product_image[0]->small;
              } else {
                $img = site_url('images/product/images.jpeg');
              }
              if(count($product_detail)==0){
                $product_detail[0]->title='-';
                $product_detail[0]->seo='-';
              }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <?php $status_tobe=1; ?>
                <button data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2; } } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>



              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom:2%;"><?=$this->lang->line('Sell');?></a>
              <?php } //else { ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>
              </div>
            </div>
          </div>

          <?php } } } ?>


        </div> 
      </section>

      <section class="container padding-top-3x">
        <h3 class="text-center mb-30"><?=$this->lang->line('Featured Products');?></h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          

          <?php
          $similarProduct = $this->m_model->selectasmax(4, 'product_featured=1', 'product_store');
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            $product = $this->m_model->selectas('id', $value->product, 'product');
            if (count($product) > 0) {
              $product_detail = $this->m_model->selectaslang('product', $product[0]->id, 'product_lang');
              $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
              if (count($product_image) > 0) {
                $img = site_url('images/product/').$product_image[0]->small;
              } else {
                $img = site_url('images/product/images.jpeg');
              }
              if(count($product_detail)==0){
                $product_detail[0]->title='-';
                $product_detail[0]->seo='-';
              }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <?php $status_tobe=1; ?>
                <button data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2; } } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>



              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php } // else { ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>
              </div>
            </div>
          </div>

          <?php } } } ?>


        </div> 
      </section>

      <section class="container padding-top-3x">
        <h3 class="text-center mb-30"><?=$this->lang->line('New Products');?></h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          

          <?php
          $similarProduct = $this->m_model->selectcustom("select B.*, A.id as product_id from product A join product_store B on(B.product = A.id) where B.store_type='0' group by A.id order by A.created DESC LIMIT 4");
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            if (count($product) > 0) {
              $product_detail = $this->m_model->selectaslang('product', $value->product_id, 'product_lang');
              $product_image = $this->m_model->selectas('product', $value->product_id, 'product_image');
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
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <button data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>



              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php }// else { ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>
              </div>
            </div>
          </div>

          <?php } } } ?>


        </div> 
      </section>
      <section class="container padding-top-3x">
        <h3 class="text-center mb-30"><?=$this->lang->line('Best Seller Products');?></h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          

          <?php
          $similarProduct = $this->m_model->selectasmax(4, 'best_seller=1', 'product_store');
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            $product = $this->m_model->selectas('id', $value->product, 'product');
            if (count($product) > 0) {
              $product_detail = $this->m_model->selectaslang('product', $product[0]->id, 'product_lang');
              $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
              if (count($product_image) > 0) {
                $img = site_url('images/product/').$product_image[0]->small;
              } else {
                $img = site_url('images/product/images.jpeg');
              }
                   $status_tobe=1;
              if(count($product_detail)==0){
                $product_detail[0]->title='-';
                $product_detail[0]->seo='-';
              }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <button data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>



              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php } //else { ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>
              </div>
            </div>
          </div>

          <?php } } } ?>


        </div> 
      </section>

      <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30"><?=$this->lang->line('Most Popular Products');?></h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          

          <?php
          $similarProduct = $this->m_model->selectasmax(4, 'most_popular=1', 'product_store');
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            $product = $this->m_model->selectas('id', $value->product, 'product');
            if (count($product) > 0) {
              $product_detail = $this->m_model->selectaslang('product', $product[0]->id, 'product_lang');
              $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
              if (count($product_image) > 0) {
                $img = site_url('images/product/').$product_image[0]->small;
              } else {
                $img = site_url('images/product/images.jpeg');
              }
              $status_tobe=1;
              if(count($product_detail)==0){
                $product_detail[0]->title='-';
                $product_detail[0]->seo='-';
              }
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($value->price); ?>
              </h4>

              <div class="product-buttons">
                <button data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>



              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>" style="margin-bottom: 2%;"><?=$this->lang->line('Sell');?></a>
              <?php } //else { ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php //} ?>
              </div>
            </div>
          </div>

          <?php } } } ?>


        </div> 
      </section>

      <!--<section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2"><?=$this->lang->line('Popular Brands');?></h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }">
            <?php
              /*$Pop_Brand = $this->m_model->selectas('popular_brand', 1, 'brands');
              if (count($Pop_Brand)) { 
                foreach ($Pop_Brand as $key => $valuePop_Brand) {
                  $thumbnail = check_img($valuePop_Brand->thumbnail_logo);
            ?>
                  <img class="d-block w-110 opacity-75 m-auto" src="<?= $thumbnail['path']; ?>" alt="<?= $valuePop_Brand->seo;?>" title="<?= $valuePop_Brand->name;?>">
            <?php
                }
              }*/
              ?>
          </div>
        </div>
      </section>-->

  </div>
<?php $this->load->view('frontend/layout/footer'); ?>