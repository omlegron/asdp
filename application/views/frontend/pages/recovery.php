<?php $this->load->view('frontend/layout/header'); ?>

    <div class="offcanvas-wrapper padding-top-2x">
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <h2><?=$this->lang->line('Forgot your password');?>?</h2>
            <?=$this->lang->line('msg_Forgot_password');?>
            
            <form class="card mt-4" action="" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="email-for-pass"><?=$this->lang->line('Enter your email address');?></label>
                  <input class="form-control" type="text" id="email-for-pass" name="email-for-pass" required="">
                  <?=$this->lang->line('msg_Forgot_password_2');?>

                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="btn_recovery" value="1"><?=$this->lang->line('Request Reset Password');?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('frontend/layout/footer'); ?>