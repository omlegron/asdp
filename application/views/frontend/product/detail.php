<?php $this->load->view('frontend/layout/header'); ?>

<?php if (count($product_detail) > 0 && count($product_store) > 0) {
  $product = $this->m_model->selectas('id', $product_detail[0]->product, 'product');
  $product_image = $this->m_model->selectas('product', $product_detail[0]->product, 'product_image');
  $status_tobe=1;
 ?>

    <div class="offcanvas-wrapper padding-top-1x">
      <div class="page-title">
        <div class="container">
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="<?= site_url('product'); ?>"><?=$this->lang->line('Product');?></a>
              </li>
              <li class="separator"></li>
              <li><a href="<?= site_url('product/'); ?><?= categoryParentSEO($product[0]->category_parent); ?>"><?= categoryParentName($product[0]->category_parent, $this->session->userdata('language')); ?></a>
              </li>
              <li class="separator"></li>
              <li><?= categorySubName($product[0]->category_sub, $this->session->userdata('language')); ?></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container padding-bottom-3x mb-1">

<div class="row">
    <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <div class="product-gallery">
              <!--<span class="product-badge text-danger">30% Off</span>-->
              <div class="gallery-wrapper">
              <?php if (count($product_image) > 0) {
                  foreach ($product_image as $key => $value) { ?>
                <div class="gallery-item <?php if ($key == 0) { echo 'active'; } ?>">
                  <!--<a href="<?= $value->small; ?>" data-hash="<?= $key; ?>" data-size="1000x667"></a>-->
                </div>
              <?php } } else { ?>
                <div class="gallery-item active">
                  <!--<a href="<?= $value->small; ?>" data-hash="<?= $key; ?>" data-size="1000x667"></a>-->
                </div>
              <?php } ?>
              </div>
              <div class="product-carousel owl-carousel">
              <?php if (count($product_image) > 0) {
                  foreach ($product_image as $key => $value) { ?>
                    <div data-hash="<?= $key; ?>"><img src="<?= site_url('images/product/').$value->small; ?>" style="width: 100%;"></div>
              <?php } } else { ?>
                <div data-hash="0"><img src="<?= site_url('images/product/images.jpeg'); ?>" style="width: 100%;"></div>
              <?php } ?>
              </div>

              
              <ul class="product-thumbnails owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;margin&quot;: 10, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:3},&quot;576&quot;:{&quot;items&quot;:3},&quot;768&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
              <?php if (count($product_image) > 0) {
                  foreach ($product_image as $key => $value) { ?>
                    <li <?php if ($key == 0) { echo 'class="active"'; } ?>>
                      <a href="#<?= $key; ?>">
                      <img src="<?= site_url('images/product/').$value->thumbnail; ?>" style="width: 100%; height: 70px;"></a>
                    </li>
              <?php } } else { ?>
                    <li class="active">
                      <a href="#0">
                      <img src="<?= site_url('images/product/images.jpeg'); ?>" style="width: 100%; height: 70px;"></a>
                    </li>
              <?php } ?>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div class="padding-top-1x mt-2 hidden-md-up"></div>
            <h2 style="font-size: 20px;"><?= $product_detail[0]->title; ?></h2>
            <div class="padding-bottom-1x">
              <div class="ratings-container">
                <div class="ratings" style="width: <?= $product[0]->star; ?>%;"></div>
              </div>
            </div>
            <span class="h4 d-block" style="color: red;">Rp <?= number_format($product_store[0]->price); ?></span>
            <div class="row margin-top-1x">
              <div class="col-md-3 col-sm-12">
                <div class="form-group">
                  <label><?=$this->lang->line('Quantity');?></label>
                  <input type="number" name="qty" class="qty form-control" value="1" min="1" max="<?=$product[0]->quantity;?>">
                </div>
              </div>
              <div class="col-12" style="display: none;">
                <div class="form-group">
                  <label><?=$this->lang->line('keterangan');?></label>
                  <textarea name="note" class="note form-control" placeholder="<?= $this->lang->line('note_caption');?>" rows="2"></textarea>
                </div>
              </div>
            </div>
            <div class="">
              <span class="text-medium">
                <?=$this->lang->line('Stok');?>: 
              </span>
              <?= $product[0]->quantity;?>
            </div>
            <div class="">
              <span class="text-medium">
                <?=$this->lang->line('Weight');?>: 
              </span>
              <?= $product[0]->weight;?> gram
            </div>

            <!--<div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #123456</div>-->
            <div class="padding-bottom-1x mb-2"><span class="text-medium"><?=$this->lang->line('Categories');?>:&nbsp;</span>
              <a class="navi-link" href="<?= site_url('product/'); ?><?= categoryParentSEO($product[0]->category_parent); ?>"><?= categoryParentName($product[0]->category_parent); ?>, <?= categorySubName($product[0]->category_sub); ?></a>
            </div>
          
            <div class="mb-3"></div>
            <div class="d-flex flex-wrap justify-content-between">
              <div class="sp-buttons mt-2 mb-2">
                <!--<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Wishlist"><i class="icon-heart"></i></button>-->
                <button data-id="<?= $product_store[0]->id; ?>" class="btn btn-outline-secondary btn-sm btn-wishlist <?php if ($this->session->userdata('user_role') == 'customer') {
                   echo'wishlists ';
                   $status_tobe=1;
          $cekWishlist = $this->m_model->selectas2('user', $this->session->userdata('user'), 'product_store', $product_store[0]->id, 'wishlist'); //print_r($cekWishlist); die();
                if (count($cekWishlist) > 0){ echo 'active'; $status_tobe=2;} } ?>" data-toggle="tooltip" title="<?=$this->lang->line('Wishlist');?>" data-iteration="<?=$status_tobe;?>"><i class="icon-heart"></i></button>

              <?php if ($this->session->userdata('user_role2') == 'marketer') { ?>
                <a class="carts btn btn-primary" href="<?= site_url('marketer/agent/').$this->uri->segment(4).'?add=true'; ?>"><?=$this->lang->line('Sell this product');?></a>
              <?php }
                    if($product[0]->quantity>0){
              ?>
              <button data-id="<?= $product_store[0]->id; ?>" class="carts btn btn-primary" <?php if ($this->session->userdata('user_role') != 'supplier' && $this->session->userdata('user_role') != 'marketer') { echo'data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><i class="icon-bag"></i> <?=$this->lang->line('Add to Cart');?></button>
              <?php
                    }
                    else{
              ?>
                      <button class="carts btn btn-primary btn-disabled" disabled><i class="icon-bag"></i> <?=$this->lang->line('Add to Cart');?></button>   
              <?php
                    }
                ?>
              </div>




            </div>
          </div>
        </div>
        <!-- Product Tabs-->
        <div class="row padding-top-3x mb-3">
          <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab"><?=$this->lang->line('Description');?></a></li>
              <li class="nav-item"><a class="nav-link"  href="#discuss" data-toggle="tab" role="tab"><?=$this->lang->line('Discuss');?></a></li>
              <li class="nav-item"><a class="nav-link"  href="#reviews" data-toggle="tab" role="tab"><?=$this->lang->line('Reviews');?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="description" role="tabpanel">
                <div style="/*white-space: pre;*/"><?= nl2br($product_detail[0]->description); ?></div>
              </div>

              <div class="tab-pane fade" id="reviews" role="tabpanel">

                <?php
                $getReview = $this->m_model->selectas('product', $product_detail[0]->product, 'review');
                  if (count($getReview) > 0) {
                  foreach ($getReview as $key => $value) {
                  $user = $this->m_model->selectas('id', $value->user, 'user');
                  if (count($user) > 0) {
                    $name = $user[0]->name;
                    $img = site_url('images/product/images.jpeg');
                  } else {
                    $name = 'anonymous';
                    $img = site_url('images/product/images.jpeg');
                  }
                  ?>
                <!-- Review-->
                <div class="comment">
                  <div class="comment-author-ava"><img src="<?= $img; ?>" alt="Review author"></div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title"><?= $name; ?></h4>
                      <div class="mb-2">
                        <div class="ratings-container">
                          <div class="ratings" style="width: <?= $value->star; ?>%;"></div>
                        </div>
                      </div>
                    </div>
                    <p class="comment-text"><?= $value->review; ?></p>
                    <div class="comment-footer"><span class="comment-meta"><?= $value->date; ?></span></div>
                  </div>
                </div>
                <!-- Review-->
              <?php } } else { ?>
                <div class="text-center">
                  <h5><?=$this->lang->line('cap_Reviews');?></h5>
                </div>
              <?php } ?>

              </div>
              <div class="tab-pane fade" id="discuss" role="tabpanel">
                <div style="max-height:500px; overflow-y: auto;" id="bodyDiscuss">
                <!-- Dicuss-->
                <?php
                  //$getDiscuss = $this->m_model->selectas2('product_store_id', $product_store[0]->id, 'deleted_at IS NULL', null, 'discuss', 'created_at', 'DESC');
                $discussQuery="select * from discuss where product_store_id='".$product_store[0]->id."' && deleted_at IS NULL order by created_at DESC";
                  $getDiscuss = $this->m_model->selectcustom($discussQuery);
                  if(count($getDiscuss)>0){
                    foreach ($getDiscuss as $key => $value_discuss) {
                      # code...
                    //get user data from sender_id
                      $dataSender=$this->m_model->selectas('id', $value_discuss->sender_id, 'user');
                      $senderImg=base_url()."assets/frontend/img/profile_low.png";
                      $senderName="Sender";
                      if(count($dataSender)>0){
                        $senderName=$dataSender[0]->name;
                        if($dataSender[0]->image != null){
                          $senderImg=$dataSender[0]->image;
                        }
                      }
                ?>
                  <div id="parentDiscuss-<?= $value_discuss->id;?>" class="card bg-secondary" style="padding:1%; margin-top: 1%;">
                    <div class="comment" style="margin-bottom: 0px !important; ">
                      <div class="comment-author-ava">
                        <img src="<?=$senderImg;?>" alt="Discuss author">
                      </div>
                      <div class="comment-body card-body" style="padding:1%">
                        <div class="comment-header d-flex flex-wrap justify-content-between">
                          <span class="comment-meta"><?=$senderName;?></span>
                        </div>
                        <p class="comment-text"><?=$value_discuss->message;?></p>
                        <div class="comment-footer text-right text-sm">
                          <span class="text-muted">
                            <?=convert_time_HiMdY($value_discuss->created_at);?>
                          </span>
                        </div>
                      </div>
                      <div id="div_reply-<?= $value_discuss->id;?>" style="margin-top:1%;">
                        <?php
                          //discuss_reply
                          $this->load->view('frontend/product/discuss_comment', array('discuss_id'=>$value_discuss->id));
                        ?>
                      </div>
                      <form class="row" method="post" style="margin-top: 1%;" action="<?= base_url();?>product/discuss_comment?add=true">
                        <div class="comment col-12" style="margin-bottom: 0px !important; ">
                          <div class="comment-header d-flex flex-wrap justify-content-between">
                          </div>
                          <input type="hidden" name="sender_id" value="<?= $this->session->userdata('user');?>">
                          <input type="hidden" name="discuss_id" value="<?= $value_discuss->id;?>">
                          <textarea class="form-control form-control-rounded" id="message" name="message" rows="1" placeholder="Ketikan komentar anda..."></textarea>
                          <button class="btn btn-outline-primary float-right" type="submit" style="margin-bottom: 0px !important; " onclick="event.preventDefault(); sendDiscussReply(this);">Kirim</button>
                          <div class="comment-footer"></div>
                        </div>
                      </form>
                    </div>
                  </div>
                <!-- end history discuss-->
                <?php
                    }
                  }
                  else{
                ?>
                  <div class="text-center">
                    <h5>
                      <?=$this->lang->line('cap_Discuss');?>
                    </h5>
                  </div>
                <?php
                  }
                ?>
                </div>
                <!--<h5 class="mb-30 padding-top-1x">Leave Review</h5>-->
                <form class="row" method="post" style="margin-top: 1%;" action="<?= base_url();?>product/discuss?add=true">
                  <div class="col-12">
                    <input type="hidden" name="sender_id" value="<?= $this->session->userdata('user');?>">
                    <input type="hidden" name="product_store_id" value="<?= $product_store[0]->id;?>">
                    <textarea name="message" class="form-control form-control-rounded" id="review_text" rows="2" placeholder="Tanya tentang produk..."></textarea>
                  </div>
                  <div class="col-12 text-right" style="margin-bottom: 0px !important;">
                    <button class="btn btn-outline-primary" type="submit" style="margin-bottom: 0px !important; " onclick="event.preventDefault(); sendDiscuss(this);">Kirim</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
      <div class="col-md-2">
        <div class="card">
          <div class="card-body text-center">
            
            <?php
              $store = $this->m_model->selectas('id', $product_store[0]->store, 'store');
              if (count($store) > 0) {
            ?>

            <a href="<?= site_url('m/').$store[0]->url; ?>">
              <img src="<?= site_url('images/store/').$store[0]->logo; ?>">
            </a>
              <?php
                  if(count($store)>0 && $store[0]->badge !=null){
                ?>
                    <img src="<?=base_url();?>/assets/frontend/img/badge/<?=$store[0]->badge;?>.png" style="width: auto; height:2rem;">
                <?php
                  }
                ?>
            <h6 class="text-center" style="padding-top: 7px;">
              <a style="text-decoration: none; color: gray;" href="<?= site_url('m/').$store[0]->url; ?>"><?= $store[0]->brand; ?></a></h6>

            <i class="icon-map"></i> <?= getName($store[0]->city, 'city'); ?>
            <a href="<?=site_url('member/inbox?')."storeId=".$store[0]->id."&userId=".$store[0]->user;?>" class="btn btn-primary float-center"><?=$this->lang->line('Inbox');?></a>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>



        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x"><?=$this->lang->line('You May Also Like');?></h3>

        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">


          <?php
          //$similarProduct = $this->m_model->selectasnotlikemax('id', $product_store[0]->id, 4, 'product_store');
          $querySimilar="select A.*
                          from product_store A
                          join product B on (A.product = B.id)
                          where B.category_parent ='".$product[0]->category_parent."' || B.category_sub='".$product[0]->category_sub."'
                          ORDER BY RAND()
                          limit 4";
          $similarProduct = $this->m_model->selectcustom($querySimilar);
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


              <?php if ($this->session->userdata('user_role') == 'marketer') { ?>
                <a class="carts btn btn-sm btn-primary" href="<?= site_url('marketer/agent/').$product_detail[0]->seo.'?add=true'; ?>"><?=$this->lang->line('Sell');?></a>
              <?php } else if($this->session->userdata('user_role') != 'marketer' && $product[0]->quantity>0){ ?>
                <button data-id="<?= $value->id; ?>" class="carts btn btn-outline-primary btn-sm"
                <?php if ($this->session->userdata('user_role') != 'supplier' &&
                  $this->session->userdata('user_role') != 'marketer') { echo'
                 data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"'; } ?>><?=$this->lang->line('Add to Cart');?></button>
              <?php }
                          else{
                ?>
                        <button class="carts btn btn-primary btn-disabled" disabled><i class="icon-bag"></i> <?=$this->lang->line('Add to Cart');?></button>   
                <?php
                      }
               ?>

              </div>
            </div>
          </div>

          <?php } } } ?>

        </div>
      </div>

    </div>

<?php } ?>
<script type="text/javascript">
  function sendDiscuss(ini){
    var url_action = $(ini).parents('form').closest('form').attr('action');
    var formData = $(ini).parents('form').closest('form').serialize();
    var message = $(ini).parents('form').closest('form').find('[name=message]').val();
    if(message != null && message != undefined){
      $.ajax({
          type: 'POST',
          url: url_action,
          data: formData,
          success: function(data){
            if(data!=0){
              $('#bodyDiscuss').prepend(data);
            }
            else{
              alert("Message failed to send!")
            }
            $(ini).parents('form').closest('form').find('[name=message]').val('')
          }
      })
    }
  }

  function sendDiscussReply(balas){
    var url_action = $(balas).parents('form').closest('form').attr('action');
    var formData = $(balas).parents('form').closest('form').serialize();
    var message = $(balas).parents('form').closest('form').find('[name=message]').val();
    var discuss_id = $(balas).parents('form').closest('form').find('[name=discuss_id]').val();
    if(message != null && message != undefined){
      $.ajax({
          type: 'POST',
          url: url_action,
          data: formData,
          success: function(data){
            if(data!=0){
              $('#div_reply-'+discuss_id).html(data);
            }
            else{
              alert("Comment failed to send!")
            }
            $(balas).parents('form').closest('form').find('[name=message]').val('')
          }
      })
    }
  }
</script>
<?php $this->load->view('frontend/layout/footer'); ?>