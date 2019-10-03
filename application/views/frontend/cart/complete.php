<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper">
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1><?=$this->lang->line('Checkout');?></h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="#"><?=$this->lang->line('Home');?></a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><?=$this->lang->line('Checkout');?></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container padding-bottom-3x mb-2">
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <?=$this->lang->line('msg_thankyou_order');?>
              <span class="text-medium"><?= $this->input->get('inv'); ?></span></p>
              <?php
              //if member used payment gateway
                if($this->input->get('param')){
                  $param=json_decode(base64_decode($this->input->get('param')));
                  $param=(array)$param;
                  $pg_data=(array)$param['pg_data'];
              ?>
               <p class="card-text">
                  Virtual Account: <?=$param['pg_name'];?>
               </p>
               <h3>
                  <?= $pg_data['trx_id']; ?>
               </h3>
               <label style="color: red;">
                  Expired: <?= $param['expired_payment']; ?>
               </label>
              <?php
                }
              ?>
            <?=$this->lang->line('msg_thankyou_order2');?>
            <div class="padding-top-1x padding-bottom-1x">
              <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Go Back Shopping');?></a>
              <a class="btn btn-outline-primary" href="<?= site_url('member/order/'.$this->input->get('orderId')); ?>"><i class="icon-location"></i>&nbsp;<?=$this->lang->line('Order Details');?></a>
              <a class="btn btn-outline-primary" href="<?= site_url('member'); ?>"><i class="icon-location"></i>&nbsp;<?=$this->lang->line('Track order');?></a>
            </div>
          </div>
        </div>
      </div>

    </div>
<?php $this->load->view('frontend/layout/footer'); ?>