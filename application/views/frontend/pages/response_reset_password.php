<?php $this->load->view('frontend/layout/header');  //echo $note; die();?>
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-2">
    <div class="card text-center">
      <div class="card-body padding-top-2x">
        <?php
        if(strtolower($status)=='done' || strtolower($status)=='failed'){
          //setelah prosess request reset password
        ?>
          <h1 class="card-title"><?=$this->lang->line('title_sent_request');?> <?=$this->lang->line($status);?></h1>
        <?php
          if(strtolower($status)=='done'){
        ?>
            <?=$this->lang->line('msg_done_sent_request');?>
        <?php
          }
          else if(strtolower($status)=='failed' && strtolower($note)=='not_registered'){
        ?>
            <?=$this->lang->line('msg_failed_not_regis');?>
        <?php
          }
          else{
        ?>
            <?=$this->lang->line('msg_failed_somtehing_wrong');?>
        <?php
          }
        }
        else if(strtolower($status)=='password changed' || strtolower($status)=='password failed'){
          //setelah prosess pergantian password
        ?>
          <h1 class="card-title"><?= ucwords($note); ?></h1>
        <?php
        }
          if(strtolower($status)=='password changed'){
        ?>
            <?=$this->lang->line('msg_success_reset');?>
        <?php
          }
          else if(strtolower($status)=='password failed'){
        ?>
            <?=$this->lang->line('msg_failed_reset');?>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('frontend/layout/footer'); ?>