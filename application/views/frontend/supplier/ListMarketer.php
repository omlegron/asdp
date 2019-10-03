<?php $this->load->view('frontend/layout/header'); 
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
        <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
            <div class="row">
              <div class="col-md-6">
                <h6 class="text-muted text-normal text-uppercase"><?=$this->lang->line('ListMarketer');?></h6>
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

          <?php if (count($product) > 0) {
          ?>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center"><?=$this->lang->line('Markter');?></th>
                    <th class="text-center"><?=$this->lang->line('Email');?></th>
                    <th class="text-center"><?=$this->lang->line('Product');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($product as $keyProduct => $ListMarketer) {
                      # code...
                      if(empty($ListMarketer->logo)){
                        $img['path']=base_url().'images/images.jpeg';
                      }
                      else{
                        $img=check_img('images/product/'.$ListMarketer->logo);
                      }
                  ?>
                  <tr>
                    <td>
                      <?=$keyProduct+1+$numStart;?>
                    </td>
                    <td style="padding-top: 25px;">
                      <img src="<?= $img['path']; ?>" style="width: 50px; height: 50px;">
                      <a target="_blank" href="<?= site_url('m/').$ListMarketer->url; ?>" style="text-decoration: none; color:#555;">
                        <b><?= $ListMarketer->brand; ?></b> - <?= $ListMarketer->user; ?>
                      </a> 
                    </td>
                    <td style="padding-top: 25px;" class="text-center">
                      <?= $ListMarketer->email; ?>
                    </td>
                    <td style="padding-top: 25px;" class="text-right">
                      <?= $ListMarketer->num_of_product; ?> 
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?= $pagingnation;?>
            </div>
          <?php
            }
            else { 
              if($this->input->get('key')){
          ?>
                <div class="card text-center margin-top-1x">
                  <div class="card-body padding-top-2x">
                    <h3 class="card-title"><?=$this->lang->line('Opps....mkt');?></h3>
                    <p class="card-text"><?=$this->lang->line('Opps_cap');?></p>
                  </div>
                </div>
          <?php 
              }
              else{
          ?>    <div class="card text-center margin-top-1x">
                  <div class="card-body padding-top-2x">
                    <h3 class="card-title"><?=$this->lang->line('no marketer to sell your product');?></h3>
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

<?php $this->load->view('frontend/layout/footer'); ?>