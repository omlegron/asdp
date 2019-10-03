        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x"><?=$this->lang->line('You May Also Like');?></h3>

        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">


          <?php
          $similarProduct = $this->m_model->selectasnotlikemax('product', $product[0]->id, 4, 'product_store');
          if (count($similarProduct)) { 
          foreach ($similarProduct as $key => $value) {
            $product_detail = $this->m_model->selectaslang('product', $value->id, 'product_lang');
            $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
            if (count($product_image) > 0) {
              $img = site_url('images/product/').$product_image[0]->thumbnail;
            } else {
              $img = site_url('images/product/images.jpeg');
            }
            $status_tobe=1;
          ?>

          <div class="grid-item">
            <input type="hidden" class="qty" name="qty" value="1">
            <div class="product-card d-flex flex-column" style="min-height: 410px;">
              <a class="product-thumb" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>">
                <img src="<?= $img; ?>" alt="Product">
              </a>
              <h3 class="product-title">
                <a href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>"><?= $value->title; ?></a>
              </h3>
              <h4 class="product-price mt-auto">
                <?= 'Rp '.number_format($product_store[0]->price); ?>
              </h4>

              <div class="product-buttons">
                <button data-id="<?= $product_store->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $value->id, 'wishlist');
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>
                <button data-id="<?= $product_store->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              </div>
            </div>
          </div>

          <?php } } ?>

        </div>