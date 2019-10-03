<?php $this->load->view('frontend/layout/header'); ?>

<?php $this->load->view('frontend/sidebar_modal'); ?>
<div class="offcanvas-wrapper padding-top-2x">
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <div class="col-xl-3 col-lg-4 order-lg-1">
        <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
        <aside class="sidebar sidebar-offcanvas hidden-md-down">
          <?php $this->load->view('frontend/sidebar'); ?>
        </aside>
      </div>
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
          foreach ($product as $key => $value) {
            # code...
            $key_item++;
            $status_tobe=1;
            $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
            if(count($product_image)== 0 || empty($product_image[0]->small)){
              $img['path']=base_url().'images/images.jpeg';
            }
            else{
              $img=check_img('images/product/'.$product_image[0]->small);
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

              <?php if ($this->session->userdata('user_role') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>"><?=$this->lang->line('Sell');?></a>
              <?php } else { ?>
                <button data-id="<?= $value->product_store_id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php } ?>

              </div>
            </div>
          </div>
      <?php 
        }
      ?>
        </div>
        <nav class="pagination">
          <div class="column">
            <ul class="pages pull-right">
            <?php
              for ($page_i=1; $page_i<=$TotalOfPage; $page_i++) {
                # code...
                if($page==$page_i){
          ?>
                <li class="active" style="border-color: #0da9ef; background-color: #0da9ef; color: #fff;">
                  <span>
                    <?=$page_i;?>
                  </span>
                </li>
          <?php
                }
                else{
          ?>
                <li>
                  <a class="page-link" href="<?= base_url('product/'.$this->uri->segment(2)).$param_active.'page='.$page_i;?>">
                    <?=$page_i;?>
                  </a>
                </li>
          <?php
                }
              }
          ?>
              <!--<li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">12</a></li>-->
            </ul>
          </div>
        </nav>
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