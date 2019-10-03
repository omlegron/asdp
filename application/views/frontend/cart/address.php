<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper">


      <div class="container padding-bottom-3x padding-top-2x mb-2">
        <div class="row">

          <div class="col-lg-9">
            <?php include 'step-wizard.php'; ?>

<div class="row">
  <div class="col-sm-">
    <h4><?=$this->lang->line('Address');?></h4>
  </div>
<?php if (count($listAddress) > 0) { ?>
  <div class="col-sm-3">
    <div class="dropdown show">
      <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?=$this->lang->line('Select')." ".$this->lang->line('Address');?> 
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<?php foreach ($listAddress as $key => $value) { ?>
        <a class="dropdown-item" href="<?= site_url('cart/address?addr=').$value->id; ?>"><?= $value->name; ?> - <?= $value->address; ?> <?php if ($value->main == 1) {
          echo "(Default Address)";
        } ?></a>
<?php } ?>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <a class="btn btn-primary btn-sm" href="<?=base_url();?>cart/address?action=addAddress">
        <?=$this->lang->line('Add').' '.$this->lang->line('Address');?> 
    </a>
  </div>
<?php } ?>
</div>
        <hr class="padding-bottom-1x">
          <form action="" method="post">

            <?php
            if (count($mainAddress) > 0 && !$this->input->get('addr') && !strtolower($this->input->get('action')) == 'addaddress') {
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
            } else if ($this->input->get('addr')) {
              $editAddress = $this->m_model->selectas('id', $this->input->get('addr'), 'address');
              if (count($editAddress) > 0) {
                $idAddr = $editAddress[0]->id;
                $name = $editAddress[0]->name;
                $title = $editAddress[0]->title;
                $phone = $editAddress[0]->phone;
                $address = $editAddress[0]->address;
                $province = $editAddress[0]->province_name;
                $city = $editAddress[0]->city_name;
                $district = $editAddress[0]->district_name;
                $provinceId = $editAddress[0]->province_id;
                $cityId = $editAddress[0]->city_id;
                $districtId = $editAddress[0]->district_id;
                $zip = $editAddress[0]->zip;
              } else {
                $idAddr = '';
                $name = '';
                $title = '';
                $phone = '';
                $address = '';
                $province = '';
                $city = '';
                $district = '';
                $zip = '';
                $provinceId = '';
                $cityId = '';
                $districtId = '';
              }
            } else {
                $idAddr = '';
                $name = '';
                $title = '';
                $phone = '';
                $address = '';
                $province = '';
                $city = '';
                $district = '';
                $zip = '';
                $provinceId = '';
                $cityId = '';
                $districtId = '';
            }
            ?>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Address Label')?></label>
                  <input name="title" value="<?= $title; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('ex : alamat kantor')?>" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn"><?=$this->lang->line('Recipients Name')?></label>
                  <input type="hidden" name="idAddr" value="<?= $idAddr; ?>">
                  <input name="fullname" value="<?= $name; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Fullname')?>" required="">
                </div>
              </div>
            </div>


            <?php if ((count($mainAddress) > 0 || $this->input->get('addr')) && !strtolower($this->input->get('action')) == 'addaddress') { ?>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Province')?></label>
                  <select name="province" id="province" class="form-control" required="">
                    <option value="<?= $provinceId; ?>"><?= $province; ?></option>
                    <?= provinsi(); ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('City')?></label>
                  <select name="city" id="city" class="form-control" required="">
                    <option value="<?= $cityId; ?>"><?= $city; ?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('District')?></label>
                  <select name="district" id="district" class="form-control" required="">
                    <option value="<?= $districtId; ?>"><?= $district; ?></option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-zip"><?=$this->lang->line('Postal Code')?></label>
                  <input name="zip" class="form-control" type="text" value="<?= $zip; ?>" required="">
                </div>
              </div>
            </div>

            <?php } else { ?>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Province')?></label>
                  <select name="province" id="province" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select')?></option>
                    <?= provinsi(); ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('City')?></label>
                  <select name="city" id="city" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select')?></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('District')?></label>
                  <select name="district" id="district" class="form-control" required="">
                    <option value=""><?=$this->lang->line('Select')?></option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-zip"><?=$this->lang->line('Postal Code')?></label>
                  <input name="zip" class="form-control" type="text" placeholder="<?=$this->lang->line('Postal Code')?>" required="">
                </div>
              </div>
            </div>

            <?php } ?>

            <div class="row padding-bottom-1x">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Address')?></label>
                  <input name="address" value="<?= $address; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Address')?>" required="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone"><?=$this->lang->line('Phone Number')?></label>
                  <input name="phone" value="<?= $phone; ?>" class="form-control" type="text" placeholder="<?=$this->lang->line('Phone Number')?>" required="">
                </div>
              </div>
            </div>

          <div class="d-flex justify-content-between paddin-top-1x mt-4">
            <a class="btn btn-outline-secondary" href="<?= site_url('cart'); ?>">
              <i class="icon-arrow-left"></i>
              <span class="hidden-xs-down">&nbsp;<?=$this->lang->line('Back To Cart')?></span>
            </a>
            <button type="submit" name="<?php if (strtolower($this->input->get('action')) == 'addaddress'){ echo 'addAddress'; } else if (count($mainAddress) > 0) { echo 'saveAddress'; } else if ($this->input->get('addr')) { echo 'saveAddress'; } else { echo 'addAddress'; } ?>" class="btn btn-primary" value="true">
              <span class="hidden-xs-down"><?=$this->lang->line('Continue')?></span>
              <i class="icon-arrow-right"></i>
            </button>
          </div>

        </form>
      </div>
      <div class="col-lg-3">
        <?php $this->load->view('frontend/cart/sidebar-cart'); ?>
      </div>

        </div>
      </div>

  </div>

<?php $this->load->view('frontend/layout/footer'); ?>