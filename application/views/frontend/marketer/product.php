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


        <?php
        if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Products');?></h6>
              </div>
              <div class="col-md-3">
                <a class="btn btn-sm btn-primary" href="<?= base_url().'marketer/waitingApproval?idStore='.$user_store[0]->id; ?>"><?=$this->lang->line('waiting approval');?></a>
              </div>
              <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Add Product');?></a>
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

          <?php
          if (count($product) > 0) { ?>
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
                    <th><?=$this->lang->line('Action');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($product as $key => $value) {
                      $img=array();
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
                      <a target="_blank" href="<?= site_url('product/detail/').$value->product_store_id.'/'.$value->seo; ?>" style="text-decoration: none;">
                        <?= $value->title; ?>
                      </a> 
                    </td>
                    <td style="padding-top: 25px;">
                      <?= 'Rp'.number_format($value->price_basic); ?>
                    </td>
                    <td style="padding-top: 25px;">
                  <?php
                    if ($value->profit_type == 0) {
                        echo 'Rp'.number_format($value->profit);
                    } else {
                        echo ($value->profit / $value->price_basic * 100).'%';
                    }
                  ?>
                    </td>
                    <td style="padding-top: 25px;">
                      <?= 'Rp'.number_format($value->price); ?>
                    </td>
                    <td style="padding-top: 25px;"><?= $value->quantity; ?></td>
                    <td style="padding-top: 25px;">
                      <a href="<?= site_url('marketer/agent/').$value->seo.'?edit='.$value->product_store_id; ?>" style="text-decoration: none;"><span class="badge badge-primary badge-pill"><?=$this->lang->line('Edit');?></span></a>
                      <a href="<?= site_url('marketer/agent?remove=').$value->product_store_id; ?>&token=<?=md5($value->product_store_id);?>" class="confirm" style="text-decoration: none;" onclick="event.preventDefault();" msg="Apa kamu yakin ingin menghapus data ini?" title="Hapus"><i class="text-danger fa fa-trash" style="font-size: 16pt;"></i></a>
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
                        <a class="page-link" href="<?= site_url('marketer/product?page='.$page_i);?>">
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
          ?>    
              <div class="card text-center margin-top-1x">
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
  $(document).on('click', '[class=confirm]', function(e){
    e.preventDefault();
    msg=$(this).attr('msg');
    href=$(this).attr('href');
    var notif = confirm(msg);
    if (notif == true) {
      window.location.href = href;
    } 
  })
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