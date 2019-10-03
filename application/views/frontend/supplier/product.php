<?php $this->load->view('frontend/layout/header'); 
  if($this->input->get('err') == 'limit_product'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('msg_limit_product');?>',
            position: "topRight",
            class: "iziToast-danger",
        });
    </script>
<?php
  }
  else if($this->input->get('err') == 'limit_hotlist'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('msg_limit_hotlist');?>',
            position: "topRight",
            class: "iziToast-danger",
        });
    </script>
<?php
  }
  if($this->session->userdata('status_remove')=='remove_failed' && $this->input->get('err') == 'remove_failed'){
    $this->session->unset_userdata('status_remove');
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('msg_remove_product_failed');?>',
            position: "topRight",
            class: "iziToast-danger",
        });
    </script>
<?php
  }
?>
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

      <?php if ($this->input->get('edit')) {
        $productStore = $this->m_model->selectas2('product', $this->input->get('edit'), 'store', $user_store[0]->id, 'product_store');

        if (count($productStore) > 0) {
          $product = $this->m_model->selectas('id', $productStore[0]->product, 'product');
          $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
          $product_lang = $this->m_model->selectas2('product', $product[0]->id, 'lang', 'id', 'product_lang');
          $delimg1 = ''; $delimg2 = ''; $delimg3 = ''; $delimg4 = ''; $delimg5 = '';
          if (count($product_image) > 0) {
            $img1 = ''; $img2 = ''; $img3 = ''; $img4 = ''; $img5 = '';
            foreach ($product_image as $key => $value) {
              if ($key == 0) { $img1 = site_url('images/product/').$value->small; $delimg1 = base_url()."supplier/deleteImage/".$value->id; }
              if ($key == 1) { $img2 = site_url('images/product/').$value->small; $delimg2 = base_url()."supplier/deleteImage/".$value->id;}
              if ($key == 2) { $img3 = site_url('images/product/').$value->small; $delimg3 = base_url()."supplier/deleteImage/".$value->id;}
              if ($key == 3) { $img4 = site_url('images/product/').$value->small; $delimg4 = base_url()."supplier/deleteImage/".$value->id;}
              if ($key == 4) { $img5 = site_url('images/product/').$value->small; $delimg5 = base_url()."supplier/deleteImage/".$value->id;}
            }
          } else {
            $img1 = ''; $img2 = ''; $img3 = ''; $img4 = ''; $img5 = '';
          }

          $sku=explode($this->session->userdata('user_data')->id.'--', $product[0]->sku);
          if(count($sku)>1){
            $sku=$sku[1];
          }
          else{
            $sku="";
          }
          
      ?>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-8 order-md-2">
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Edit Product');?></h6>
            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-6 col-sm-6 col-md-3 col-lg-3 col-form-label" for="text-input"><?=$this->lang->line('Images');?></label>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01" style="background-image: url('<?= $img1; ?>');"><i class="icon-image"></i>
                      <?php
                        if($delimg1!= null){
                      ?>
                          <a href="<?=$delimg1;?>" >
                            <span class="badgeUser" style="margin-right: 5%; background: transparent;">
                              <i class="text-danger fa fa-trash"></i>
                            </span>
                          </a>
                      <?php
                        }
                      ?>
                    </div>
                    <input name="file1" id="01" type="file" accept="image/*">
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                  <div class="row" style="margin-top: -15px;">
                    <div class="col-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 02" style="background-image: url('<?= $img2; ?>');"><i class="icon-image"></i>
                          <?php
                            if($delimg2!= null){
                          ?>
                              <a href="<?=$delimg2;?>" >
                                <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                                  <i class="text-danger fa fa-trash"></i>
                                </span>
                              </a>
                          <?php
                            }
                          ?>
                         </div>
                        <input name="file2" id="02" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 03" style="background-image: url('<?= $img3; ?>');">
                          <i class="icon-image"></i>
                          <?php
                            if($delimg3!= null){
                          ?>
                              <a href="<?=$delimg3;?>" >
                                <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                                  <i class="text-danger fa fa-trash"></i>
                                </span>
                              </a>
                          <?php
                            }
                          ?>
                        </div>
                        <input name="file3" id="03" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 04" style="background-image: url('<?= $img4; ?>');">
                          <i class="icon-image"></i>
                          <?php
                            if($delimg3!= null){
                          ?>
                              <a href="<?=$delimg4;?>" >
                                <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                                  <i class="text-danger fa fa-trash"></i>
                                </span>
                              </a>
                          <?php
                            }
                          ?>
                        </div>
                        <input name="file4" id="04" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 05" style="background-image: url('<?= $img5; ?>');">
                          <i class="icon-image"></i>
                          <?php
                            if($delimg3!= null){
                          ?>
                              <a href="<?=$delimg5;?>" >
                                <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                                  <i class="text-danger fa fa-trash"></i>
                                </span>
                              </a>
                          <?php
                            }
                          ?>
                        </div>
                        <input name="file5" id="05" type="file" accept="image/*">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input">SKU-<?=$this->lang->line('Product');?></label>
                <div class="col-9">
                  <input name="sku" class="form-control" type="text" placeholder="82910jhk12-9083" value="<?=$sku;?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Title');?></label>
                <div class="col-9">
                  <input name="product" type="hidden" value="<?= $product[0]->id; ?>">
                  <input name="seo_old" type="hidden" value="<?= $product_lang[0]->seo; ?>">
                  <input name="title" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Product Title');?>" value="<?= $product_lang[0]->title; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Parent');?></label>
                <div class="col-9">
                  <select name="category_parent" id="category_parent" class="form-control" required="">
                    <option value="<?= $product[0]->category_parent; ?>"><?= categoryParentName($product[0]->category_parent); ?></option>
                    <?php $category = $this->m_model->select('category_parent');
                    if (count($category) > 0) {
                      foreach ($category as $key => $value) {
                        if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                          echo '<option value="'.$value->id.'">'.$value->name_id.'</option>';
                        }
                        else{
                          echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                        }
                      }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Sub Category');?></label>
                <div class="col-9">
                  <select name="category_sub" id="category_sub" class="form-control" required="">
                    <option value="<?= $product[0]->category_sub; ?>"><?= categorySubName($product[0]->category_sub); ?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Child');?></label>
                <div class="col-9">
                  <select name="category_child" id="category_child" class="form-control">
                    <option value="<?= $product[0]->category_child; ?>"><?= categoryChildName($product[0]->category_child); ?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Weight');?> Gram</label>
                <div class="col-3">
                  <input name="weight" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Weight');?> Gram" value="<?= $product[0]->weight; ?>">
                </div>
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Quantity');?></label>
                <div class="col-3">
                  <input name="quantity" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Quantity');?>" value="<?= $product[0]->quantity; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Basic Price');?></label>
                <div class="col-3">
                  <input name="price_basic" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Price');?>" value="<?= $productStore[0]->price_basic; ?>">
                </div>
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Price');?></label>
                <div class="col-3">
                  <input name="price" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Price');?>" value="<?= $productStore[0]->price; ?>">
                  <label id="validate_label_price" style="padding-left:0px !important;"></label>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Description');?></label>
                <div class="col-9">
                  <textarea style="height: 200px;" name="description" class="form-control" id="textarea" rows="2" placeholder="<?=$this->lang->line('Product Description');?>"><?= $product_lang[0]->description; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-9">

                </div>
                <?php
                  $disabled="";
                  if( $productStore[0]->price < $productStore[0]->price_basic){
                    $disabled="disabled";
                  }
                ?>
                <div class="col-3">
                  <input id="btn_save" type="submit" name="save" value="<?=$this->lang->line('Save Product');?>" class="btn btn-primary" <?= $disabled;?>>
                </div>
              </div>

            </div>
          </form>
        <?php } } ?>

      <?php if ($this->input->get('add')) { ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-8 order-md-2">
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Add Product');?></h6>
            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Images');?></label>
                <div class="col-3">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01">
                      <i class="icon-image"></i>
                      <a onclick="event.preventDefault(); $('[name=file1]').val(''); $('.uploadpreview.01').removeAttr('style');">
                        <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                          <i class="text-danger fa fa-trash"></i>
                        </span>
                      </a>
                    </div>
                    <input name="file1" id="01" type="file" accept="image/*">
                  </div>

                </div>
                <div class="col-6">
                  <div class="row" style="margin-top: -15px;">
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 02">
                          <i class="icon-image"></i>
                          <a onclick="event.preventDefault(); $('[name=file2]').val(''); $('.uploadpreview.02').removeAttr('style')">
                            <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                              <i class="text-danger fa fa-trash"></i>
                            </span>
                          </a>
                        </div>
                        <input name="file2" id="02" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 03">
                          <i class="icon-image"></i>
                          <a onclick="event.preventDefault(); $('[name=file3]').val(''); $('.uploadpreview.03').removeAttr('style')">
                            <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                              <i class="text-danger fa fa-trash"></i>
                            </span>
                          </a>
                        </div>
                        <input name="file3" id="03" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 04">
                          <i class="icon-image"></i>
                          <a onclick="event.preventDefault(); $('[name=file4]').val(''); $('.uploadpreview.04').removeAttr('style')">
                            <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                              <i class="text-danger fa fa-trash"></i>
                            </span>
                          </a>
                        </div>
                        <input name="file4" id="04" type="file" accept="image/*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="upload-wraps">
                        <div class="uploadpreviews 05">
                          <i class="icon-image"></i>
                          <a onclick="event.preventDefault(); $('[name=file5]').val(''); $('.uploadpreview.51').removeAttr('style')">
                            <span class="badgeUser" style="margin-right: 15%; background: transparent;">
                              <i class="text-danger fa fa-trash"></i>
                            </span>
                          </a>
                        </div>
                        <input name="file5" id="05" type="file" accept="image/*">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input">SKU-<?=$this->lang->line('Product');?></label>
                <div class="col-9">
                  <input name="sku" class="form-control" type="text" placeholder="82910jhk12-9083">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Title');?></label>
                <div class="col-9">
                  <input name="title" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Product Title');?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Parent');?></label>
                <div class="col-9">
                  <select name="category_parent" id="category_parent" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select');?></option>
                    <?php $category = $this->m_model->select('category_parent');
                    if (count($category) > 0) {
                      foreach ($category as $key => $value) {
                        if($this->session->userdata('language') ==null || $this->session->userdata('language') == 'bahasa'){
                          echo '<option value="'.$value->id.'">'.$value->name_id.'</option>';
                        }
                        else{
                          echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                        }
                      }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Sub Category');?></label>
                <div class="col-9">
                  <select name="category_sub" id="category_sub" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Category Child');?></label>
                <div class="col-9">
                  <select name="category_child" id="category_child" class="form-control">
                    <option value=""><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Weight');?> Gram</label>
                <div class="col-3">
                  <input name="weight" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Weight');?> Gram">
                </div>
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Quantity');?></label>
                <div class="col-3">
                  <input name="quantity" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Quantity');?>">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Basic Price');?></label>
                <div class="col-3">
                  <input name="price_basic" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Basic Price');?>">
                </div>
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Price');?></label>
                <div class="col-3">
                  <input name="price" class="form-control" type="number" required="" placeholder="<?=$this->lang->line('Price');?>">
                  <label id="validate_label_price" style="padding-left:0px !important;"></label>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-3 col-form-label" for="text-input"><?=$this->lang->line('Product Description');?></label>
                <div class="col-9">
                  <textarea style="height: 200px;" name="description" class="form-control" id="textarea" rows="2" placeholder="<?=$this->lang->line('Product Description');?>"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-9">

                </div>
                <div class="col-3">
                  <input id="btn_save" type="submit" name="add" value="<?=$this->lang->line('Save Product');?>" class="btn btn-primary" disabled>
                </div>
              </div>

            </div>
          </form>
        <?php } ?>


        <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Products');?></h6>
              </div>
              <div class="col-md-3">
                <a class="btn btn-sm btn-primary" href="<?= base_url().'supplier/waitingApproval?idStore='.$user_store[0]->id; ?>"><?=$this->lang->line('waiting approval');?></a>
              </div>
              <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="<?= site_url('supplier/product?add=true'); ?>"><?=$this->lang->line('Add Product');?></a>
              </div>
            </div>
            <form method="get" action="">
              <div class="input-group" style="margin-right: 2%;">
                <span class="input-group-btn">
                  <button type="submit" id="search_general"><i class="icon-search"></i></button>
                </span>
                <input class="form-control" name="key" type="search" placeholder="<?=$this->lang->line('msg_search');?>" style="background: #fff !important;" value="<?=$this->input->get('key');?>">
              </div>
            </form>

          <?php if (count($product) > 0) { ?>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center"><?=$this->lang->line('Name');?></th>
                    <th class="text-center"><?=$this->lang->line('Category');?></th>
                    <th class="text-center"><?=$this->lang->line('Price');?></th>
                    <th class="text-center"><?=$this->lang->line('Stok');?></th>
                    <th class="text-center"><?=$this->lang->line('Action');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $checkmembership=checkmembership($user_data->id);
                    foreach ($product as $key => $value) {
                      $img=array();
                      //$key_item++;
                      $status_tobe=1;
                      if($value->hot_list == 1){
                        $hotlist=0;
                      }
                      else if($value->hot_list == 0){
                        $hotlist=1;
                      }
                      $product_image = $this->m_model->selectas('product', $value->id, 'product_image');
                      if(count($product_image)== 0 || empty($product_image[0]->thumbnail)){
                        $img['path']=base_url().'images/images.jpeg';
                      }
                      else{
                        $img=check_img('images/product/'.$product_image[0]->thumbnail);
                      }
                  ?>
                  <tr>
                    <td>
                      <?=$key+1+$numStart;?>
                    </td>
                    <td style="padding-top: 25px;">
                      <img src="<?= $img['path']; ?>" style="width: 50px; height: 50px;">
                      <a target="_blank" href="<?= site_url('product/detail/').$value->product_store_id.'/'.$value->seo; ?>" style="text-decoration: none; color:#555;">
                        <?= $value->title; ?>
                      </a> 
                    </td>
                    <td style="padding-top: 25px;" class="text-center">
                      <?php
                      $cat = $this->m_model->selectas('id', $value->category_parent, 'category_parent');
                      if (count($cat) > 0) {
                        echo $cat[0]->name;
                      }
                      ?>  
                    </td>
                    <td style="padding-top: 25px;" class="text-right">
                      <?= 'Rp '.number_format($value->price); ?>
                    </td>
                    <td style="padding-top: 25px;" class="text-center"><?= $value->quantity; ?></td>
                    <td style="padding-top: 25px;"  class="text-center">
                      <a href="<?= site_url('supplier/product?edit=').$value->id; ?>" style="text-decoration: none;">
                        <span class="badge badge-primary badge-pill"><?=$this->lang->line('Edit');?></span>
                      </a>
                      &nbsp;
                      <?php
                      if($checkmembership['status']==1){
                        if($value->hot_list == 0){
                        ?>
                          <a href="<?= site_url('supplier/product?hot_list=true&product_storeId=').$value->product_store_id.'&val_hot_list='.$hotlist; ?>" style="text-decoration: none;"><span class="badge badge-info badge-pill"><?=$this->lang->line('hot_list');?></span></a>
                          &nbsp;
                        <?php
                        }
                        else{
                        ?>
                          <a href="<?= site_url('supplier/product?hot_list=true&product_storeId=').$value->product_store_id.'&val_hot_list='.$hotlist; ?>" style="text-decoration: none;"><span class="badge badge-warning badge-pill"><?=$this->lang->line('hot_list');?></span></a>
                          &nbsp;
                      <?php
                        }
                      }
                      ?>
                      <a class="confirm" href="<?= site_url('supplier/product?remove=').$value->product_store_id; ?>" style="text-decoration: none;" onclick="event.preventDefault();" msg="<?=$this->lang->line('confirm_delete');?>" title='<?=$this->lang->line('Delete');?>'>
                        <i class="text-danger fa fa-trash" style="font-size: 16pt;"></i>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?= $pagingnation;?>
              <!--<nav class="pagination">
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
                        <a class="page-link" href="<?= site_url('supplier/product?page='.$page_i);?>">
                          <?=$page_i;?>
                        </a>
                      </li>
                <?php
                      }
                    }
                ?>
                  </ul>
                </div>
              </nav>-->
            </div>
          <?php
            }
            else { 
              if($this->input->get('key')){
          ?>
                <div class="card text-center margin-top-1x">
                  <div class="card-body padding-top-2x">
                    <h3 class="card-title"><?=$this->lang->line('Opps....');?></h3>
                    <p class="card-text"><?=$this->lang->line('Opps_cap');?></p>
                  </div>
                </div>
          <?php 
              }
              else{
          ?>    <div class="card text-center margin-top-1x">
                  <div class="card-body padding-top-2x">
                    <h3 class="card-title"><?=$this->lang->line('Your product is empty!');?></h3>
                    <p class="card-text"><?=$this->lang->line('Your product data will show here');?></p>
                    <div class="padding-top-1x padding-bottom-1x">
                      <a class="btn btn-outline-secondary" href="<?= site_url('supplier/product?add=true'); ?>"><?=$this->lang->line('Add Product');?></a>  
                    </div>
                  </div>
                </div>
          <?php
              }
            }
          }
          ?>

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
    function validate_price(basic_price, price, selector){
      //$('#lbl_valid').html('<i class="icon-check-circle text-success"> </i>'+btn)
     // $('#lbl_valid').html('<i class="icon-x-circle text-danger"></i>')
     basic_price=basic_price+(basic_price * 10 /100);
     if(basic_price==0 || basic_price=='' || price==0 || price=='' || isNaN(basic_price) || isNaN(price)){
      $("#"+selector).html("");
      $("#btn_save").attr("disabled", "disabled");
      return;
     }
      if(basic_price>price){
        notif='<i class="icon-x-circle text-danger"></i> > <b>'+basic_price+' (Basic Price)</b>';
        $("#btn_save").attr("disabled", "disabled");
      }
      else{
        notif='<i class="icon-check-circle text-success">';
        $("#btn_save").removeAttr("disabled");
      }
      $("#"+selector).html(notif);
      return;
    }

    $("[name=price]").keyup(function(){
        basic_price=parseInt($('[name=price_basic]').val());
        price=parseInt($('[name=price]').val());
        selector_dom="validate_label_price";
        validate_price(basic_price, price, selector_dom)
    });
    $("[name=price_basic]").keyup(function(){
        basic_price=parseInt($('[name=price_basic]').val());
        price=parseInt($('[name=price]').val());
        selector_dom="validate_label_price";
        validate_price(basic_price, price, selector_dom)
    });

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

    $(document).on('click', '[class=confirm]', function(e){
      e.preventDefault();
      msg=$(this).attr('msg');
      href=$(this).attr('href');
      var notif = confirm(msg);
      if (notif == true) {
        window.location.href = href;
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