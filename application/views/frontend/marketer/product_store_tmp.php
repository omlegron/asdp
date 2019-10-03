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
                <a class="btn btn-sm btn-primary" href="<?= base_url().'marketer/product'; ?>">
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
                    <th><?=$this->lang->line('Action');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //$products ini dari table product_store_tmp
                    foreach ($products as $key_product => $valueProductStore) {
                      $store_supplier= $this->m_model->selectas('id', $valueProductStore->store_supplier, 'store');
                      if(count($store_supplier)>0){
                        $store_sup=$store_supplier[0]->brand;
                        $link_store_sup="m/".$store_supplier[0]->url;
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

                        $action="";
                        switch ($valueProductStore->approved) {
                          case '0':
                            # code...
                            //$lbl='<a href="'.site_url('marketer/agent/').$product_lang[0]->seo.'?edit='.$valueProductStore->id.'" style="text-decoration: none;"><span class="badge badge-primary badge-pill">'.$this->lang->line('Edit').'</span></a><br>';
                            $lbl='<span class="badge badge-warning badge-pill">'.$this->lang->line('waiting approval').'</span>';
                            $action='<a href="'.site_url('marketer/waitingApproval?edit=true&id='.$valueProductStore->id).'" style="text-decoration: none;" title="Edit" data-id="<?=$valueProductStore->id;?>"><span class="badge badge-primary badge-pill">'.$this->lang->line('Edit').'</span></a>';
                            break;
                          case '1':
                            # code...
                            //$lbl='<a href="'.site_url('marketer/agent/').$product_lang[0]->seo.'?edit='.$valueProductStore->id.'" style="text-decoration: none;"><span class="badge badge-primary badge-pill">'.$this->lang->line('Edit').'</span></a><br>';
                            $lbl='<span class="badge badge-success badge-pill">'.$this->lang->line('approved').'</span>';
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
                      <?=$key_product+1+$numStart;?>
                    </td>
                    <td style="padding-top: 25px;">
                      <a target="_blank" href="<?= site_url('product/detail/').$product_store_id.'/'.$product_lang[0]->seo; ?>" style="text-decoration: none;">
                      <img src="<?= $img; ?>" style="width: 50px; height: 50px;">
                        <?= $product_lang[0]->title; ?>
                      </a> 
                      <br>
                      <label>
                        <?=$this->lang->line('Supplier');?>:
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
                    <td style="padding-top: 25px;">
                      <?=$action;?>
                      <a id="btn_delet_product_tmp" href="<?= site_url('marketer/waitingApproval');?>" style="text-decoration: none;" onclick="event.preventDefault();" msg="Apa kamu yakin ingin menghapus data ini?" title="Hapus" data-id="<?=$valueProductStore->id;?>"><i class="text-danger fa fa-trash" style="font-size: 16pt;"></i></a>
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
                        <a class="page-link" href="<?= site_url('marketer/waitingApproval'.$param_active.'page='.$page_i);?>">
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
                <div class="padding-top-1x padding-bottom-1x">
                  <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Add Product');?></a>  
                </div>
              </div>
            </div>

          <?php } ?>
<?php }
else if (count($product_store_tmp) > 0 && $this->input->get('edit')) {
        $product = $this->m_model->selectas('id', $product_store_tmp[0]->product, 'product');

        if (count($product) > 0) {
          $product_image = $this->m_model->selectas('product', $product_store_tmp[0]->product, 'product_image');
          $product_lang = $this->m_model->selectas2('product', $product_store_tmp[0]->product, 'lang', 'id', 'product_lang');
          if (count($product_image) > 0) {
            $img1 = ''; $img2 = ''; $img3 = ''; $img4 = ''; $img5 = '';
            foreach ($product_image as $key => $value) {
              if ($key == 0) { $img1 = site_url('images/product/').$value->small; }
              if ($key == 1) { $img2 = site_url('images/product/').$value->small; }
              if ($key == 2) { $img3 = site_url('images/product/').$value->small; }
              if ($key == 3) { $img4 = site_url('images/product/').$value->small; }
              if ($key == 4) { $img5 = site_url('images/product/').$value->small; }
            }
          } else {
            $img1 = ''; $img2 = ''; $img3 = ''; $img4 = ''; $img5 = '';
          }
      ?>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-8 order-md-2">
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Sell Product');?></h6>
            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Images');?></label>
                <div class="col-3">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01" style="background-image: url('<?= $img1; ?>');"><i class="icon-image"></i></div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row" style="margin-top: -15px;">
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 02" style="background-image: url('<?= $img2; ?>');"><i class="icon-image"></i></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 03" style="background-image: url('<?= $img3; ?>');"><i class="icon-image"></i></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 04" style="background-image: url('<?= $img4; ?>');"><i class="icon-image"></i></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 05" style="background-image: url('<?= $img5; ?>');"><i class="icon-image"></i></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Title');?></label>
                <div class="col-9">
                  <input name="product_store_tmp" type="hidden" value="<?= $product_store_tmp[0]->id; ?>">
                  <input name="product" type="hidden" value="<?= $product[0]->id; ?>">
                  <input name="title" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Product Title');?>" value="<?= $product_lang[0]->title; ?>" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Basic Price');?></label>
                <div class="col-3">
                  <input name="price" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Basic Price');?>" value="<?= $product_store_tmp[0]->price_basic; ?>" readonly>
                </div>
                <label class="col-1 col-form-label" for="text-input"><?=$this->lang->line('Quantity');?></label>
                <div class="col-2">
                  <input name="quantity" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Quantity');?>" value="<?= $product[0]->quantity; ?>" readonly>
                </div>
                <label class="col-1 col-form-label" for="text-input"><?=$this->lang->line('Weight');?> Gram</label>
                <div class="col-2">
                  <input name="weight" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Weight');?> Gram" value="<?= $product[0]->weight; ?>" readonly>
                </div>
              </div>
 
              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Profit Type');?></label>
                <div class="col-4">
                  <div style="margin-top: 10px;">
                    <span style="margin-right: 15px;">
                      <input type="radio" value="0" style="margin-right: 7px;" simbol="Rp." name="profit_type" <?php if ($product_store_tmp[0]->profit_type == 0) { echo "checked"; $symbol="Rp.";} ?>> <?=$this->lang->line('Price');?>
                    </span>
                    <span style="margin-right: 15px;">
                      <input type="radio" value="1" style="margin-right: 7px;" simbol="%" name="profit_type" <?php if ($product_store_tmp[0]->profit_type == 1) { echo "checked"; $symbol="%";} ?>> <?=$this->lang->line('Percent');?>
                    </span>
                  </div>
                </div>
                <label class="col-2 col-form-label pr-0 px-0" for="text-input"><?=$this->lang->line('Profit Value');?><span class="float-right" id="label_profit"><?=$symbol;?></span></label>
                <div class="col-3 pl-1 px-1">
                  <?php
                    if ($product_store_tmp[0]->profit_type == 0) {
                        $profit = $product_store_tmp[0]->profit;
                    } else {
                        $profit = ($product_store_tmp[0]->profit / $product_store_tmp[0]->price_basic) * 100;
                    }
                  ?>
                  <input name="profit_value" class="form-control" type="text" required="" value="<?= $profit; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Parent');?></label>
                <div class="col-9">
                  <select name="category_parent" id="category_parent" class="form-control"  readonly>
                    <option value="<?= $product[0]->category_parent; ?>"><?= categoryParentName($product[0]->category_parent); ?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Sub Category');?></label>
                <div class="col-9">
                  <select name="category_sub" id="category_sub" class="form-control"  readonly>
                    <option value="<?= $product[0]->category_sub; ?>"><?= categorySubName($product[0]->category_sub); ?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Child');?></label>
                <div class="col-9">
                  <select name="category_child" id="category_child" class="form-control" readonly>
                    <option value="<?= $product[0]->category_child; ?>"><?= categoryChildName($product[0]->category_child); ?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Description');?></label>
                <div class="col-9">
                  <textarea readonly="" style="height: 200px;" name="description" class="form-control" id="textarea" rows="2" placeholder="<?=$this->lang->line('Product Description');?>"><?= $product_lang[0]->description; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3"></div>
                <div class="col-3">
                  <input type="submit" name="save" value="<?=$this->lang->line('Save Product');?>" class="btn btn-primary">
                </div>
              </div>

            </div>
          </form>
        <?php } } ?>

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