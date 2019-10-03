<?php $this->load->view('frontend/layout/header'); ?>

  <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <?php include 'member-sidebar.php'; ?>
          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <h4 class="float-left"><?=$this->lang->line('Address');?></h4>
            <?php if (!$this->input->get('edit') && !$this->input->get('add')) {
              ?>
            <a style="margin:0px !important;" class="float-right btn btn-primary" href="<?= site_url('member/address?add='.uniqid()); ?>"><?=$this->lang->line('Add');?></a>
              <?php
            }
            ?>
            <div class="clearfix padding-bottom-1x"></div>
            <hr>

          <?php
          if ($this->input->get('add')) {
          ?>

          <form action="" method="post">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Address Name');?></label>
                  <input name="title" value="" class="form-control" type="text" placeholder="Address Name" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn"><?=$this->lang->line('Fullname');?></label>
                  <input type="hidden" name="idAddr" value="">
                  <input name="fullname" value="" class="form-control" type="text" placeholder="<?=$this->lang->line('Fullname');?>" required="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Province');?></label>
                  <select name="province" id="province" class="form-control" required="">
                    <option value="" selected><?=$this->lang->line('Select');?></option>
                    <?= provinsi(); ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('City');?></label>
                  <select name="city" id="city" class="form-control" required="">
                    <option value="" selected><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('District');?></label>
                  <select name="district" id="district" class="form-control" required="">
                    <option value="" selected><?=$this->lang->line('Select');?></option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-zip"><?=$this->lang->line('Postal Code');?></label>
                  <input name="zip" class="form-control" type="text" value="" required="" placeholder="<?=$this->lang->line('Postal Code');?>">
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Address');?></label>
                  <input name="address" value="" class="form-control" type="text" placeholder="<?=$this->lang->line('Address');?>" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Phone Number');?></label>
                  <input name="phone" value="" class="form-control" type="text" placeholder="<?=$this->lang->line('Phone Number');?>" required="">
                </div>
              </div>
            </div>

          <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <button type="submit" name="addAddress" class="btn btn-primary" value="true">
              <span class="hidden-xs-down"><?=$this->lang->line('Add')." ".$this->lang->line('Address') ;?> </span>
              <span class="hidden-sm-up"><?=$this->lang->line('Add') ;?></span>
            </button>
          </div>

        </form>

      <?php } ?>
      <?php
          if ($this->input->get('edit')) {
          $mainAddress = $this->m_model->selectas2('id', $this->input->get('edit'), 'user', $this->session->userdata('user'), 'address');
          if (count($mainAddress) > 0) {
              $idAddr = $mainAddress[0]->id;
              $title = $mainAddress[0]->title;
              $name = $mainAddress[0]->name;
              $phone = $mainAddress[0]->phone;
              $address = $mainAddress[0]->address;
              $province = $mainAddress[0]->province_name;
              $city = $mainAddress[0]->city_name;
              $district = $mainAddress[0]->district_name;
              $provinceId = $mainAddress[0]->province_id;
              $cityId = $mainAddress[0]->city_id;
              $districtId = $mainAddress[0]->district_id;
              $zip = $mainAddress[0]->zip;
          ?>

          <form action="" method="post">

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Address Name');?></label>
                  <input name="title" value="<?= $title; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Address Name');?>" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn"><?=$this->lang->line('Fullname');?></label>
                  <input type="hidden" name="idAddr" value="<?= $idAddr; ?>">
                  <input name="fullname" value="<?= $name; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Fullname');?>" required="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Province');?></label>
                  <select name="province" id="province" class="form-control" required="">
                    <option value="<?= $provinceId; ?>"><?= $province; ?></option>
                    <?= provinsi(); ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('City');?></label>
                  <select name="city" id="city" class="form-control" required="">
                    <option value="<?= $cityId; ?>"><?= $city; ?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('District');?></label>
                  <select name="district" id="district" class="form-control" required="">
                    <option value="<?= $districtId; ?>"><?= $district; ?></option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-zip"><?=$this->lang->line('Postal Code');?></label>
                  <input name="zip" class="form-control" type="text" value="<?= $zip; ?>" required="" placeholder="<?=$this->lang->line('Postal Code');?>">
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Address');?></label>
                  <input name="address" value="<?= $address; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Address');?>" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Phone Number');?></label>
                  <input name="phone" value="<?= $phone; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Phone Number');?>" required="">
                </div>
              </div>
            </div>

          <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <button type="submit" name="saveAddress" class="btn btn-primary" value="true">
              <span class="hidden-xs-down"><?=$this->lang->line('Save')." ".$this->lang->line('Address');?></span>
            </button>
          </div>

        </form>

        <?php }
      } ?>

          <?php if (!$this->input->get('edit') && !$this->input->get('add')) {
          if (count($address) > 0) {
          ?>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th><?=$this->lang->line('Name');?></th>
                    <th><?=$this->lang->line('Address');?></th>
                    <th><?=$this->lang->line('Action');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($address as $key => $value) {
                  ?>
                  <tr>
                    <td>
                      <?= $value->title; ?>
                    </td>
                    <td>
                      <b><?= $value->name; ?></b><br>
                      <?= $value->address; ?><br>
                      <?= $value->district_name; ?>, <?= $value->city_name; ?><br>
                      <?= $value->province_name; ?>, <?= $value->zip; ?><br>
                      Phone: <?= $value->phone; ?><br>
                    </td>
                    <td>
                      <a href="<?= site_url('member/address?edit=').$value->id; ?>"><span class="badge badge-primary badge-pill"><?=$this->lang->line('Edit');?></span></a>
                      <a href="<?= site_url('member/address?remove=').$value->id; ?>&token=<?=md5($value->id);?>" class="confirm" style="text-decoration: none;" onclick="event.preventDefault();" msg="Apa kamu yakin ingin menghapus data ini?" title="Hapus"><i class="text-danger fa fa-trash" style="font-size: 16pt;"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <hr>

          <?php } else { ?>

          <div class="card text-center margin-top-1x">
            <div class="card-body padding-top-2x">
              <h3 class="card-title"><?=$this->lang->line('msg_empty_address');?></h3>
              <p class="card-text"><?=$this->lang->line('Go shopping now, add new address');?></p>
              <div class="padding-top-1x padding-bottom-1x">
                <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Go Shopping');?></a>  
              </div>
            </div>
          </div>

          <?php } } ?>

          </div>
        </div>
      </div>
    </div>

<?php $this->load->view('frontend/layout/footer'); ?>
<script type="text/javascript">
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