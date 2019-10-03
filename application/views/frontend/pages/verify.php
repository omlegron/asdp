<?php $this->load->view('frontend/layout/header'); ?>

	<div class="offcanvas-wrapper padding-top-2x">

    <div class="container padding-bottom-3x mb-2">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">


          <?php if ($this->input->get('i')) { 
              if($this->session->userdata('verify')== true){
          ?>
                <script type="text/javascript">
                    iziToast.show({
                        title: '',
                        message: '<?=$this->lang->line('Terima kasih atas verifikasi email Anda.');?>',
                        position: "topRight",
                        class: "iziToast-success",
                    });
                </script>
          <?php
                $this->session->unset_userdata('verify');
              }
          ?>
          <h4 class="text-center padding-top-7x"><?=$this->lang->line('your email');?> <span style="color: green;"><?= $this->input->get('i'); ?></span> <?=$this->lang->line('has been verified');?></h4>
          <p class="text-center">
            <?=$this->lang->line('you can login using your account');?>
            <h4 class="text-center">
              <?=$this->lang->line('Terima kasih atas verifikasi email Anda. Silahkan login');?>
            </h4>
          </p>
          <?php } else { ?>

          <?=$this->lang->line('title_verify_email');?>

          <form class="card mt-4" action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="email-for-pass"><?=$this->lang->line('Enter activation code');?></label>
                <input name="code" class="form-control" type="text" id="email-for-pass" required><small class="form-text text-muted"><?=$this->lang->line('caption_verify_email');?></small>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" type="submit"><?=$this->lang->line('Submit');?></button>
            </div>
          </form>

          <?php } ?>
        </div>
      </div>
    </div>    
      
  </div>
<?php $this->load->view('frontend/layout/footer'); ?>