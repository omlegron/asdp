<?php $this->load->view('frontend/layout/header'); ?>
<?php
  if($this->session->userdata('status_update_password') == 'success'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('Update Password Successed');?>',
            position: "topRight",
            class: "iziToast-info",
        });
    </script>
<?php
    $this->session->unset_userdata('status_update_password');
  }

  $email="";
  $userpassword="";
  if($this->input->cookie('user_login',true) != null){
    $email=$this->input->cookie('user_login',true);
  }
  if($this->input->cookie('userpassword',true) != null){
    $userpassword=base64_decode($this->input->cookie('userpassword',true));
  }
?>

	<div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">

        <div class="row margin-bottom-1x">
          <div class="col-md-12">
            <?php if ($this->input->get('note')) { ?>

              <?php if ($this->input->get('note') == 'ok') { ?>
              <div class="alert alert-success" role="alert">
                <?= $this->lang->line('Register Success You can signin using your account');?>
              </div>
              <?php } ?>

              <?php if ($this->input->get('note') == 'err') { ?>
              <div class="alert alert-warning" role="alert">
                <?= $this->lang->line('Something wrong Please check your data and try again');?>
              </div>
              <?php } ?>

            <?php } ?>
          </div>
        </div>

        <div class="row buyerForm">
          <div class="col-md-6">
            <form class="login-box" action="" method="post">
              <h4 class="margin-bottom-1x"><?= $this->lang->line('Login');?></h4>
              <p><?= $this->lang->line('msg_login_to_access');?></p>
              <div class="form-group">
                <label><?= $this->lang->line('Email');?></label>
                <input name="jasdk" class="form-control" type="hidden" required="" value="1">
                <input name="email" class="form-control" type="email" placeholder="<?= $this->lang->line('Email');?>" required="" value="<?=$email;?>">
              </div>
              <div class="form-group">
                <label><?= $this->lang->line('Password');?></label>
                <input name="password" class="form-control" type="password" placeholder="<?= $this->lang->line('Password');?>" required="" value="<?=$userpassword;?>">
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="remember_me_2" name="remember_me" value="yes">
                  <label class="custom-control-label" for="remember_me_2"><?= $this->lang->line('Remember me');?></label>
                </div>
                <a class="navi-link" href="<?= site_url('page/forgetpassword'); ?>"><?= $this->lang->line('Forgot password');?>?</a>
              </div>
              <div class="text-center text-sm-right">
                <input type="submit" name="login" class="btn btn-primary margin-bottom-none" value="<?= $this->lang->line('Login');?>">
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x"><?= $this->lang->line('Register');?></h3>
            <p><?= $this->lang->line('msg_regis_akun');?></p>
            <form class="row" action="" method="post">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Name');?></label>
                  <input name="name" class="form-control" type="text" required="" placeholder="<?= $this->lang->line('Fullname');?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Email');?></label>
                  <input name="email" class="form-control" type="email" required="" placeholder="<?= $this->lang->line('Email');?>">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Password');?></label>
                  <input name="password" class="form-control" type="password" required="" placeholder="<?= $this->lang->line('Password');?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Retype Password</label>
                  <input name="repassword" class="form-control " type="password" required="" placeholder="Password" >
                </div>
              </div>
              <div class="col-6 offset-md-6">
                <input name="regBuyer" type="submit" class="btn btn-primary margin-bottom-none" value="<?= $this->lang->line('Register');?>">
              </div>
            </form>
          </div>
        </div>
      </div>
      
      
    </div>
<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-40y'
});
</script>
<?php $this->load->view('frontend/layout/footer'); ?>