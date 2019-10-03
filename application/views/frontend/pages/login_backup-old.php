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

        <div class="row flex chooseOne" <?php if ($this->input->get('note')) { echo'style="display:none;"'; }?>>
          <div class="col-md-12 text-center">
              <h3><?= $this->lang->line('Choose One');?></h3>
              <p><?= $this->lang->line('msg_klik_image_to_signin_up');?></p>
          </div>
          <div class="col-md-3 offset-md-2">
            <div class="c-bimage asBuyer">
              <img src="<?= site_url('assets/frontend/img/features/01.jpg') ?>" class="rounded">
            </div>
            <div class="text-center margin-top-1x">
              <h3><?= $this->lang->line('As Buyer');?></h3>
              <p><?= $this->lang->line('msg_take_to_register');?></p>
            </div>
          </div>
          <div class="col-md-2 sep">
            <span class="sepText">OR</span>
          </div>
          <div class="col-md-3">
            <div class="c-bimage asSupplier">
              <img src="<?= site_url('assets/frontend/img/features/03.jpg') ?>" class="rounded">
            </div>
            <div class="text-center margin-top-1x">
              <h3><?= $this->lang->line('As Supplier');?></h3>
              <p><?= $this->lang->line('msg_take_to_register');?></p>
            </div>
          </div>
          <div class="col-md-12 margin-top-1x">
            <div class="text-center">
              <div class="c-bimage asMarketer">
                <img src="<?= site_url('assets/frontend/img/features/04.jpg') ?>" class="rounded">
              </div>
              <div class="text-center margin-top-1x">
                <h3><?= $this->lang->line('As Marketer');?></h3>
                <p><?= $this->lang->line('msg_take_to_register');?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row buyerForm" <?php if ($this->input->get('cat') != 'member') { echo'style="display:none;"'; }?>>
          <div class="col-md-6">
            <form class="login-box" action="" method="post">
              <h4 class="margin-bottom-1x"><?= $this->lang->line('Buyer');?> <?= $this->lang->line('Login');?></h4>
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
                  <input name="name" class="form-control" type="text" required="" placeholder="<?= $this->lang->line('Fullname');?>" disabled="disabled">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Email');?></label>
                  <input name="email" class="form-control" disabled="disabled" type="email" required="" placeholder="<?= $this->lang->line('Email');?>">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Password');?></label>
                  <input name="password" class="form-control" disabled="disabled" type="password" required="" placeholder="<?= $this->lang->line('Password');?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Retype Password</label>
                  <input name="repassword" class="form-control " type="password" required="" placeholder="Password" disabled="disabled">
                </div>
              </div>
              <div class="col-6 offset-md-6">
                <input name="regBuyer" type="submit" class="btn btn-primary margin-bottom-none disabled" value="<?= $this->lang->line('Register');?>">
              </div>
            </form>
          </div>
        </div>

        <div class="row supplierForm" <?php if ($this->input->get('cat') != 'supplier') { echo'style="display:none;"'; }?>>
          <div class="col-md-6">
            <form class="login-box" action="" method="post">
              <h4 class="margin-bottom-1x"><?= $this->lang->line('Supplier');?> <?= $this->lang->line('Login');?></h4>
              <p><?= $this->lang->line('msg_login_to_access');?></p>
              <div class="form-group">
                <label><?= $this->lang->line('Email');?></label>
                <input name="jasdk" class="form-control" type="hidden" required="" value="2">
                <input name="email" class="form-control" type="email" placeholder="<?= $this->lang->line('Email');?>" required="" value="<?=$email;?>">
              </div>
              <div class="form-group">
                <label><?= $this->lang->line('Password');?></label>
                <input name="password" class="form-control" type="password" placeholder="<?= $this->lang->line('Password');?>" required="" value="<?=$userpassword;?>">
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="remember_me_3" name="remember_me" value="yes">
                  <label class="custom-control-label" for="remember_me_3"><?= $this->lang->line('Remember me');?></label>
                </div><a class="navi-link" href="<?= site_url('page/forgetpassword'); ?>"><?= $this->lang->line('Forgot password');?>?</a>
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
                  <input name="name" class="form-control" type="text" required="" placeholder="<?= $this->lang->line('Fullname');?>" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Email');?></label>
                  <input name="email" class="form-control" type="email" required="" placeholder="<?= $this->lang->line('Email');?>" >
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Password');?></label>
                  <input name="password" class="form-control" type="password" required="" placeholder="<?= $this->lang->line('Password');?>" >
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?= $this->lang->line('Retype')." ".$this->lang->line('Password');?></label>
                  <input name="repassword" class="form-control" type="password" required="" placeholder="Password" >
                </div>
              </div>
              <div class="col-sm-6 offset-md-6">
                <div class="form-group">
                  <input name="regSupplier" type="submit" class="btn btn-primary margin-bottom-none" value="<?=$this->lang->line('Register');?>">
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row marketerForm" <?php if ($this->input->get('cat') != 'marketer') { echo'style="display:none;"'; }?>>
          <div class="col-md-6">
            <form class="login-box" action="" method="post">
              <h4 class="margin-bottom-1x"><?= $this->lang->line('Markter');?> <?= $this->lang->line('Login');?></h4>
              <p><?= $this->lang->line('msg_login_to_access');?></p>
              <div class="form-group">
                <label><?=$this->lang->line('Email');?></label>
                <input name="jasdk" class="form-control" type="hidden" value="3">
                <input name="email" class="form-control" type="email" placeholder="<?=$this->lang->line('Email');?>" required="" value="<?=$email;?>">
              </div>
              <div class="form-group">
                <label><?=$this->lang->line('Password');?></label>
                <input name="password" class="form-control" type="password" placeholder="<?=$this->lang->line('Password');?>" required="" value="<?=$userpassword;?>">
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="remember_me_1" name="remember_me" value="yes">
                  <label class="custom-control-label" for="remember_me_1"><?=$this->lang->line('Remember me');?></label>
                </div>
                <a class="navi-link" href="<?= site_url('page/forgetpassword'); ?>"><?=$this->lang->line('Forgot password');?>?</a>
              </div>
              <div class="text-center text-sm-right">
                <input type="submit" name="login" class="btn btn-primary margin-bottom-none" value="<?=$this->lang->line('Login');?>">
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x"><?=$this->lang->line('Register');?></h3>
            <p><?= $this->lang->line('msg_regis_akun');?></p>
            <form class="row" action="" method="post">
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Name');?></label>
                  <input name="name" class="form-control" type="text" required="" placeholder="<?=$this->lang->line('Fullname');?>" disabled="disabled">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Email');?></label>
                  <input name="email" class="form-control" type="email" required="" placeholder="<?=$this->lang->line('Email');?>" disabled="disabled">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Password');?></label>
                  <input name="password" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('Password');?>" disabled="disabled">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Retype')." ".$this->lang->line('Password');?></label>
                  <input name="repassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('Password');?>" disabled="disabled">
                </div>
              </div>
              <div class="col-6 offset-md-6">
                <div class="form-group">
                  <input name="regMarketer" type="submit" class="btn btn-primary margin-bottom-none disabled" value="<?=$this->lang->line('Register');?>">
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      
      
    </div>
<script>
  $('.asBuyer').click(function() {
    $('.chooseOne').hide();
    $('.buyerForm').show();
  });
  $('.asSupplier').click(function() {
    $('.chooseOne').hide();
    $('.supplierForm').show();
  });
  $('.asMarketer').click(function() {
    $('.chooseOne').hide();
    $('.marketerForm').show();
  });
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-40y'
});
</script>
<?php $this->load->view('frontend/layout/footer'); ?>