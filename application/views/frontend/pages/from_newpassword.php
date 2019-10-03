<?php $this->load->view('frontend/layout/header');  //echo $note; die();?>
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">

<?php 
if ($this->input->get('err')) {
?>
  <div class="row margin-bottom-1x">
    <div class="col-md-12">
      <?php
        if ($this->input->get('err') == 'not_match_password' && isset($status_token) && $status_token==1) { 
      ?>
          <div class="alert alert-warning" role="alert">
            <?=$this->lang->line('msg_fill_new_password');?>
          </div>
      <?php
        }
        ?>
    </div>
  </div>
<?php
}
?>
<?php
  if($status_token == 1) {
    //form ini work jika token benar
?>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-2">
    <div class="card">
      <div class="card-body padding-top-2x">
        <h1 class="card-title text-center"><?=$this->lang->line('msg_fill_new_password');?></h1>
        <form class="row" action="" method="post">
            <input name="email" class="form-control" type="hidden" required="" value="<?= $email; ?>">
          <div class="col-md-6">
            <div class="form-group">
              <label><?=$this->lang->line('New Password');?></label>
              <input name="newPassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('New Password');?>">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group" style="text">
              <label><?=$this->lang->line('Retype')." ".$this->lang->line('Password');?></label>
              <input name="rePassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('Retype')." ".$this->lang->line('Password');?>">
            </div>
          </div>
          <div class="form-group">
            <div class="mt-4">
              <input type="submit" value="<?=$this->lang->line('Update')." ".$this->lang->line('Password');?>" name="updatePassword" class="btn btn-primary margin-right-none">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
}
else if($status_token == 0) {
?>
    <div class="container padding-bottom-3x mb-2">
      <div class="card">
        <div class="card-body padding-top-2x">
          <?=$this->lang->line('msg_reset_token_expire');?> 
        </div>
      </div>
    </div>
<?php
  }
?>
</div>
<?php $this->load->view('frontend/layout/footer'); ?>