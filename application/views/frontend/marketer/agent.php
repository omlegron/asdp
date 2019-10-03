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

      <?php if (count($product_supplier) > 0 && $this->input->get('edit')) {
        $productMarketer = $this->m_model->selectas2('id', $this->input->get('edit'), 'store', $user_store[0]->id, 'product_store');
        if (count($productMarketer) > 0) {
        $product = $this->m_model->selectas('id', $product_supplier[0]->product, 'product');

        if (count($product) > 0) {
          $product_store = $this->m_model->selectas2('product', $product[0]->id, 'store', $user_store[0]->id, 'product_store');
          $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
          $product_lang = $this->m_model->selectas2('product', $product[0]->id, 'lang', 'id', 'product_lang');
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
                  <input name="product" type="hidden" value="<?= $product[0]->id; ?>">
                  <input name="title" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Product Title');?>" value="<?= $product_lang[0]->title; ?>" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Basic Price');?></label>
                <div class="col-3">
                  <input name="price" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Basic Price');?>" value="<?= $product_store[0]->price_basic; ?>" readonly>
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
                      <input type="radio" value="0" style="margin-right: 7px;" simbol="Rp." name="profit_type" <?php if ($productMarketer[0]->profit_type == 0) { echo "checked"; $symbol="Rp.";} ?>> <?=$this->lang->line('Price');?>
                    </span>
                    <span style="margin-right: 15px;">
                      <input type="radio" value="1" style="margin-right: 7px;" simbol="%" name="profit_type" <?php if ($productMarketer[0]->profit_type == 1) { echo "checked"; $symbol="%";} ?>> <?=$this->lang->line('Percent');?>
                    </span>
                  </div>
                </div>
                <label class="col-2 col-form-label pr-0 px-0" for="text-input"><?=$this->lang->line('Profit Value');?><span class="float-right" id="label_profit"><?=$symbol;?></span></label>
                <div class="col-3 pl-1 px-1">
                  <?php
                    if ($productMarketer[0]->profit_type == 0) {
                        $profit = $productMarketer[0]->profit;
                    } else {
                        $profit = ($productMarketer[0]->profit / $productMarketer[0]->price_basic) * 100;
                    }
                  ?>
                  <input name="product_store" type="hidden" value="<?= $productMarketer[0]->id; ?>">
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
        <?php } } } ?>

      <?php if (count($product_supplier) > 0 && $this->input->get('add')) {
        $product = $this->m_model->selectas('id', $product_supplier[0]->product, 'product');
        if (count($product) > 0) {
          $productMarketer = $this->m_model->selectas2('product', $product[0]->id, 'store', $user_store[0]->id, 'product_store');
          if (count($productMarketer) == 0) {
          $product_store = $this->m_model->selectas2('product', $product[0]->id, 'store_type', '0', 'product_store');
          $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
          $product_lang = $this->m_model->selectas2('product', $product[0]->id, 'lang', 'id', 'product_lang');
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
                  <input name="product" type="hidden" value="<?= $product[0]->id; ?>">
                  <input name="title" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Product Title');?>" value="<?= $product_lang[0]->title; ?>" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Basic Price');?></label>
                <div class="col-3">
                  <input name="price" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Basic Price');?>" value="<?= $product_store[0]->price_basic; ?>" readonly>
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
                      <input type="radio" value="0" style="margin-right: 7px;" simbol="Rp." name="profit_type" checked> <?=$this->lang->line('Price');?>
                    </span>
                    <span style="margin-right: 15px;">
                      <input type="radio" value="1" style="margin-right: 7px;" simbol="%" name="profit_type"> <?=$this->lang->line('Percent');?>
                    </span>
                  </div>
                </div>
                <label class="col-2 col-form-label pr-0 px-0" for="text-input"><?=$this->lang->line('Profit Value');?><span class="float-right" id="label_profit">Rp.</span></label>
                <div class="col-3 pl-1 px-1">
                  <input name="profit_value" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Set Profit Value');?>">
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
                  <textarea readonly="" style="height: 200px;" name="description" class="form-control" id="textarea" rows="2" placeholder="Product Description"><?= $product_lang[0]->description; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3"></div>
                <div class="col-3">
                  <input type="submit" name="add" value="<?=$this->lang->line('Save Product');?>" class="btn btn-primary">
                </div>
              </div>

            </div>
          </form>
        <?php } else { redirect('marketer/agent/'.$this->uri->segment(3).'?edit='.$productMarketer[0]->id, 'refresh'); } } } ?>

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

    $("input[name=profit_type]").click(function(){
        var simbol=$(this).attr('simbol');
        $('#label_profit').html(simbol)
    });

});
</script>

<?php $this->load->view('frontend/layout/footer'); ?>