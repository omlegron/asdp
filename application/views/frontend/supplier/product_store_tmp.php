<?php $this->load->view('frontend/layout/header'); ?>

<style>
  .icon-home::before {
    content: "\e021";
  }
</style>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>


        <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
            <div class="row">
              <div class="col-md-9">
                <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Products');?></h6>
              </div>
              <div class="col-md-3">
                <a class="btn btn-sm btn-primary" href="<?= base_url().'supplier/product'; ?>">
                  <?=$this->lang->line('Back');?></a>
              </div>
            </div>

          <?php if (count($products) > 0) { ?>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?=$this->lang->line('Name');?></th>
                    <th><?=$this->lang->line('Basic Price');?></th>
                    <th><?=$this->lang->line('Profit');?></th>
                    <th><?=$this->lang->line('Price');?></th>
                    <th><?=$this->lang->line('Stok');?></th>
                    <th><?=$this->lang->line('Status');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //$products ini dari table product_store_tmp
                    foreach ($products as $key_product => $valueProductStore) {
                      $store_marketer= $this->m_model->selectas('id', $valueProductStore->store, 'store');
                      if(count($store_marketer)>0){
                        $store_sup=$store_marketer[0]->brand;
                        $link_store_sup="m/".$store_marketer[0]->url;
                      }
                      else{
                        $store_sup="-";
                        $link_store_sup="#"; 
                      }

                      $product = $this->m_model->selectas('id', $valueProductStore->product, 'product');
                      $Getproduct_store_id=$this->m_model->selectas2('product', $valueProductStore->product, 'store', $valueProductStore->store_supplier,'product_store');
                      if(count($Getproduct_store_id)>0){
                        $product_store_id=$Getproduct_store_id[0]->id;
                      }
                      else{
                        $product_store_id='';
                      }

                      if (count($product) > 0) {
                        foreach ($product as $key => $value) {
                        $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
                        $product_lang = $this->m_model->selectas('product', $value->id, 'product_lang');
                        if (count($product_image) > 0) {
                          $img = site_url('images/product/').$product_image[0]->small;
                        } else {
                          $img = site_url('images/product/images.jpeg');
                        }

                        switch ($valueProductStore->approved) {
                          case '0':
                            # code...
                            $lbl='<a class="btn_confirm" msg="'.$this->lang->line('confirm_approve').'" href="'.site_url('supplier/waitingApproval/').$product_lang[0]->seo.'?approve='.$valueProductStore->id.'" style="text-decoration: none;"><span class="badge badge-primary badge-pill">'.$this->lang->line('approve').'</span></a>';
                            $lbl.='<br><a class="btn_confirm" msg="'.$this->lang->line('confirm_unapproved').'" href="'.site_url('supplier/waitingApproval/').$product_lang[0]->seo.'?unapproved='.$valueProductStore->id.'" style="text-decoration: none;"><span class="badge badge-danger badge-pill">'.$this->lang->line('unapproved').'</span></a>';
                            /*$lbl='<span class="badge badge-warning badge-pill">'.$this->lang->line('approve').'</span>';*/
                            break;
                          case '1':
                            # code...
                            //$lbl='<a href="'.site_url('marketer/agent/').$product_lang[0]->seo.'?edit='.$valueProductStore->id.'" style="text-decoration: none;"><span class="badge badge-primary badge-pill">'.$this->lang->line('Edit').'</span></a><br>';
                            $lbl='<span class="badge badge-warning badge-pill">'.$this->lang->line('approved').'</span>';
                            break;
                          case '2':
                            # code...
                            $lbl='<span class="badge badge-danger badge-pill">'.$this->lang->line('Rejected').'</span>';
                            break;
                          
                          default:
                            # code...
                            $lbl='<span class="badge badge-danger badge-pill">Invalid</span>';
                            break;
                        }
                  ?>
                  <tr>
                    <td>
                      <?=$key_product+1;?>
                    </td>
                    <td style="padding-top: 25px;">
                      <img src="<?= $img; ?>" style="width: 50px; height: 50px;">
                      <a target="_blank" href="<?= site_url('product/detail/').$product_store_id.'/'.$product_lang[0]->seo; ?>" style="text-decoration: none;">
                        <?= $product_lang[0]->title; ?>
                      </a>
                      <br>
                      <label>
                        <?=$this->lang->line('Markter');?>:
                        <a href="<?=base_url().$link_store_sup;?>">
                        <?=$store_sup;?>
                      </label>
                    </td>
                    <td style="padding-top: 25px;">
                      <?= 'Rp'.number_format($valueProductStore->price_basic); ?>
                    </td>
                    <td style="padding-top: 25px;">
                  <?php
                    if ($valueProductStore->profit_type == 0) {
                        echo 'Rp'.number_format($valueProductStore->profit);
                    } else {
                        echo ($valueProductStore->profit / $valueProductStore->price_basic * 100).'%';
                    }
                  ?>
                    </td>
                    <td style="padding-top: 25px;">
                      <?= 'Rp'.number_format($valueProductStore->price); ?>
                    </td>
                    <td style="padding-top: 25px;"><?= $value->quantity; ?></td>
                    <td style="padding-top: 25px;">
                      <?=$lbl;?>
                    </td>
                  </tr>
                  <?php } } } ?>
                </tbody>
              </table>
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
                        <a class="page-link" href="<?= site_url('supplier/waitingApproval?page='.$page_i);?>">
                          <?=$page_i;?>
                        </a>
                      </li>
                <?php
                      }
                    }
                ?>
                  </ul>
                </div>
              </nav>
            </div>
          <?php } else { ?>

            <div class="card text-center margin-top-1x">
              <div class="card-body padding-top-2x">
                <h3 class="card-title"><?=$this->lang->line('Your product is empty!');?></h3>
                <p class="card-text"><?=$this->lang->line('Your product data will show here');?></p>
              </div>
            </div>

          <?php } ?>
        <?php } ?>

            </div>
          </div>
        </div>
      </div>

<script>
$('.upload-wrap input[type=file]').change(function(){
    var id = $(this).attr("id");
    var newimage = new FileReader();
    newimage.readAsDataURL(this.files[0]);
    newimage.onload = function(e){
      $('.uploadpreview.' + id ).css('background-image', 'url(' + e.target.result + ')' );
    }
  });
$('.upload-wraps input[type=file]').change(function(){
    var id = $(this).attr("id");
    var newimage = new FileReader();
    newimage.readAsDataURL(this.files[0]);
    newimage.onload = function(e){
      $('.uploadpreviews.' + id ).css('background-image', 'url(' + e.target.result + ')' );
    }
  });
</script>
<script>
$(document).ready(function(){

    $("#category_parent").change(function(){
        var catid = $(this).val();
        $.ajax({
            url: '<?= site_url('ajax/subcat'); ?>',
            type: 'post',
            data: {category:catid},
            dataType: 'json',
            success:function(response){
                console.log(response);
                var len = response.length;
                $("#category_sub").empty();

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#category_sub").append("<option value='"+id+"'>"+name+"</option>");
                }
                
            },
            error: function() {
                $("#category_sub").empty();
                $("#category_sub").append("<option value=''>Select</option>");
           }
        });
    });

    $(".btn_confirm").click(function(e){
      e.preventDefault();
      msg=$(this).attr('msg');
      link=$(this).attr('href');
      tanya=confirm(msg);
      if(tanya == true){
        window.location.href =  link;
      }

    })
    $("#category_sub").change(function(){
        var catid = $(this).val();
        $.ajax({
            url: '<?= site_url('ajax/subchild'); ?>',
            type: 'post',
            data: {category:catid},
            dataType: 'json',
            success:function(response){
                console.log(response);
                var len = response.length;
                $("#category_child").empty();

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#category_child").append("<option value='"+id+"'>"+name+"</option>");
                }
                
            },
            error: function() {
                $("#category_child").empty();
                $("#category_child").append("<option value=''>Select</option>");
           }
        });
    });

});
</script>

<?php $this->load->view('frontend/layout/footer'); ?>