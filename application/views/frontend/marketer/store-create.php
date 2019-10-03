<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>

          <div class="col-lg-12 col-md-8 order-md-2">

            <?php
            if (count($user_store) > 0) {
            ?>

            <?php if ($this->input->get('edit')) { ?>
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Store Information');?></h6>
            <hr class="margin-bottom-1x">

            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Name');?></label>
                <div class="col-4">
                  <input name="brand" class="form-control" type="text" id="text-input" value="<?= $user_store[0]->brand; ?>" placeholder="<?=$this->lang->line('Store Name');?>" required="">
                </div>
                <label class="col-2 col-form-label" for="text-input">
                  <?=$this->lang->line('Store URL');?>
                  <label id="lbl_valid" class="float-right"></label>
                </label>
                <div class="col-4">
                  <input name="url" type="text" class="form-control" placeholder="<?=$this->lang->line('Brand Name');?>" aria-describedby="basic-addon3" value="<?= $user_store[0]->url; ?>" required="">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Description');?></label>
                <div class="col-10">
                  <textarea name="description" class="form-control" id="textarea" rows="2" placeholder="<?=$this->lang->line('Store Description');?>" required=""><?= $user_store[0]->description; ?></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Logo');?></label>
                <div class="col-4">

                  <div class="upload-wrap">
                    <div class="uploadpreview 01" style="background-image: url('<?= site_url('images/store/').$user_store[0]->logo; ?>'); "></div>
                    <input name="file1" id="01" type="file" accept="image/*">
                  </div>

                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Banner');?></label>
                <div class="col-4">

                  <div class="upload-wrap">
                    <div class="uploadpreview 02" style="background-image: url('<?= site_url('images/store/').$user_store[0]->banner; ?>'); "></div>
                    <input name="file2" id="02" type="file" accept="image/*">
                  </div>

                </div>
              </div>

            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Province');?></label>
                <div class="col-4">
                  <select name="province" id="province" class="form-control" required="">
                    <?php if ($user_store[0]->province != 0) { ?>
                      <option value="<?= $user_store[0]->province; ?>">
                        <?= getName($user_store[0]->province, 'province'); ?>
                      </option>
                    <?php } ?>
                    <?= provinsi(); ?>
                  </select>
                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('City');?></label>
                <div class="col-4">
                  <select name="city" id="city" class="form-control" required="">
                    <?php if ($user_store[0]->city != 0) { ?>
                      <option value="<?= $user_store[0]->city; ?>">
                        <?= getName($user_store[0]->city, 'city'); ?>
                      </option>
                    <?php } else { ?>
                      <option value=""><?=$this->lang->line('Select');?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('District');?></label>
                <div class="col-4">
                  <select name="district" id="district" class="form-control" required="">
                    <?php if ($user_store[0]->district != 0) { ?>
                      <option value="<?= $user_store[0]->district; ?>"><?= getName($user_store[0]->district, 'district'); ?></option>
                    <?php } else { ?>
                      <option value=""><?=$this->lang->line('Select');?></option>
                    <?php } ?>
                  </select>
                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Address');?></label>
                <div class="col-4">
                  <input name="address" class="form-control" type="text" placeholder="<?=$this->lang->line('Address');?>" value="<?= $user_store[0]->address; ?>" required="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-9">

                </div>
                <div class="col-3">
                  <input id="btn_save" type="submit" name="save" value="<?=$this->lang->line('Save Store');?>" class="btn btn-primary">
                </div>
              </div>
            </form>
          <?php } else { ?>

            <div class="row">
              <div class="col-md-9">
                <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Store Information');?></h6>
              </div>
              <div class="col-md-2">
                <a class="btn btn-sm btn-primary" href="<?= site_url('marketer/store?edit=true'); ?>"><?=$this->lang->line('Edit Store');?></a>
              </div>
            </div>
            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Store Name');?></div>
                <div class="col-4">
                  <b><?= $user_store[0]->brand; ?></b>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Store URL');?></div>
                <div class="col-4">
                  <b><a href="<?= site_url('m/').$user_store[0]->url; ?>"><?= site_url('m/').$user_store[0]->url; ?></a></b>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Description');?></div>
                <div class="col-10">
                  <?= $user_store[0]->description; ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Store Logo');?></div>
                <div class="col-4">
                  <img src="<?= site_url('images/store/').$user_store[0]->logo; ?>">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Store Banner');?></div>
                <div class="col-4">
                  <img src="<?= site_url('images/store/').$user_store[0]->banner; ?>">
                </div>
              </div>

            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Province');?></div>
                <div class="col-4">
                  <?= getName($user_store[0]->province, 'province'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('City');?></div>
                <div class="col-4">
                  <?= getName($user_store[0]->city, 'city'); ?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('District');?></div>
                <div class="col-4">
                  <?= getName($user_store[0]->district, 'district'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><?=$this->lang->line('Address');?></div>
                <div class="col-4">
                  <?= $user_store[0]->address; ?>
                </div>
              </div>

          <?php } ?>

          <?php } else { ?>
          <?php if ($this->input->get('add')) { ?>
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Store Information');?></h6>
            <hr class="margin-bottom-1x">

            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Name');?></label>
                <div class="col-4">
                  <input name="brand" class="form-control" type="text" id="text-input" placeholder="<?=$this->lang->line('Store Name');?>" required="">
                </div>
                <label class="col-2 col-form-label" for="text-input">
                  <?=$this->lang->line('Store URL');?>
                  <label id="lbl_valid" class="float-right"></label>
                </label>
                <div class="col-4">
                  <input name="url" type="text" class="form-control" placeholder="<?=$this->lang->line('Brand Name');?>" required="">
                  <label id="lbl_valid"></label>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Description');?></label>
                <div class="col-10">
                  <textarea name="description" class="form-control" id="textarea" rows="2" placeholder="<?=$this->lang->line('Store Description');?>" required=""></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Logo');?></label>
                <div class="col-4">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01"></div>
                    <input name="file1" id="01" type="file" accept="image/*">
                  </div>
                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Store Banner');?></label>
                <div class="col-4">
                  <div class="upload-wrap">
                    <div class="uploadpreview 02"></div>
                    <input name="file2" id="02" type="file" accept="image/*">
                  </div>
                </div>
              </div>

            <hr class="margin-bottom-1x">

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Province');?></label>
                <div class="col-4">
                  <select name="province" id="province" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select');?></option>
                    <?= provinsi(); ?>
                  </select>
                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('City');?></label>
                <div class="col-4">
                  <select name="city" id="city" class="form-control" required="">
                      <option value=""><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('District');?></label>
                <div class="col-4">
                  <select name="district" id="district" class="form-control" required="">
                      <option value=""><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
                <label class="col-2 col-form-label" for="text-input"><?=$this->lang->line('Address');?></label>
                <div class="col-4">
                  <input name="address" class="form-control" type="text" placeholder="<?=$this->lang->line('Address');?>" required="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-9">

                </div>
                <div class="col-3">
                  <input id="btn_save" type="submit" name="create" value="<?=$this->lang->line('Create Store');?>" class="btn btn-primary">
                </div>
              </div>
            </form>

            <?php } else { ?>
            <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('Store Information');?></h6>
            <hr class="margin-bottom-1x">

            <div class="card text-center margin-top-1x">
              <div class="card-body padding-top-2x">
                <h3 class="card-title"><?=$this->lang->line('You dont have store');?></h3>
                <div class="padding-top-1x padding-bottom-1x">
                  <a class="btn btn-outline-secondary" href="<?= site_url('marketer/store?add=true'); ?>"><?=$this->lang->line('Create Store');?></a>  
                </div>
              </div>
            </div>
                  <?php
                    if(isset($err)){
                      switch (strtolower($err)) {
                        case 'no_store':
                          # code...
                        ?>
                          <script type="text/javascript">alert("<?=$this->lang->line('You dont have store');?>")</script>
                        <?php
                          break;
                        
                        default:
                          # code...
                          break;
                      }
                    }
                  ?>
          <?php } ?>

          <?php } ?>

            </div>
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

  (function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      });
    };
  }(jQuery));

  $('[name=url]').inputFilter(function(value) {
    if(/^[a-zA-Z0-9-]*$/.test(value)){
      dataMap={};
      dataMap ['url']=value;
      dataMap ['id']=$("store_id").val();
      if(dataMap['url'].trim() != '' && dataMap['url'].trim() != null){
        //do validating url
        $.post('<?= site_url("marketer/check_url_store"); ?>', dataMap, function(data){
          json= $.parseJSON(data);
          if(json.status=='not_use'){
            $('#lbl_valid').html('<i class="icon-check-circle text-success"> </i>')
            $('#btn_save').removeAttr('disabled');
          }
          else if (json.status=='used'){
            $('#lbl_valid').html('<i class="icon-x-circle text-danger"></i> Already use!')
            $('#btn_save').attr('disabled', 'disabled');
          }

        })
      }else{
        $('#lbl_valid').html('')
        $('#btn_save').attr('disabled', 'disabled');

      }
    }
    return /^[a-zA-Z0-9-]*$/.test(value);
  });
</script>
<?php $this->load->view('frontend/layout/footer'); ?>