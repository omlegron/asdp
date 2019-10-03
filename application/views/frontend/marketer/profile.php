<?php $this->load->view('frontend/layout/header');

if($this->session->userdata('status_update_password') == 'failed'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: 'Update Password Failed!',
            position: "topRight",
            class: "iziToast-danger",
        });
    </script>
<?php
  $this->session->unset_userdata('status_update_password');
}

if (count($user_data) > 0) {
  foreach ($profile as $key => $user_data) {
?>

    <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">

          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>

          <div class="col-lg-9">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <h5><?=$this->lang->line('Edit Profile');?></h5>
            <hr class="padding-bottom-1x">

            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <form class="row" action="" method="post" enctype="multipart/form-data">
              <div class="col-md-9">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Name');?></label>
                      <input name="name" class="form-control" type="text" value="<?= $user_data->name; ?>" required="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Email');?></label>
                      <input name="email" class="form-control" type="email" value="<?= $user_data->email; ?>" disabled="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Birthday');?></label>
                      <input name="birthday" class="datepicker form-control" type="text" value="<?php if($user_data->birthday != '0000-00-00') { echo convert_time_dmy($user_data->birthday); } ?>" required="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Gender');?></label>
                      <select name="gender" class="form-control">
                        <option value="0" <?php if($user_data->gender == 0) { echo 'selected'; } ?>><?=$this->lang->line('Male');?></option>
                        <option value="1" <?php if($user_data->gender == 1) { echo 'selected'; } ?>><?=$this->lang->line('Female');?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label><?=$this->lang->line('Phone Number');?></label>
                      <div class="d-flex">
                        <?php $this->load->view('list_country_code');?>
                        <input name="phone" class="form-control" type="text"  value="<?= $user_data->phone; ?>" required="">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="mt-4">
                        <input type="submit" value="<?=$this->lang->line('Update Profile');?>" name="updateProfile" class="btn btn-primary margin-right-none">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="upload-wrap">
                    <div class="uploadpreview 01" style="background-size: 80%; background-image: url('<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>'); "></div>
                    <input name="userfile" id="01" type="file" accept="image/*">
                    <br>
                    <label><?=$this->lang->line('Max Size');?> 512 x 512 px</label>
                  </div>
                </div>
              </div>
            </form>

            <hr class="mt-4 mb-4">
            <div class="padding-top-4x mt-2 hidden-lg-up"></div>
            <h5 class="padding-bottom-1x"><?=$this->lang->line('Update Password');?></h5>

            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <form class="row" action="" method="post">

              <div class="col-md-6">
                <div class="form-group">
                  <label><?=$this->lang->line('New Password');?></label>
                  <input name="newPassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('New Password');?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Retype')." ".$this->lang->line('Password');?></label>
                  <input name="rePassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('Retype')." ".$this->lang->line('Password');?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label><?=$this->lang->line('Old Password');?></label>
                  <input name="oldPassword" class="form-control" type="password" required="" placeholder="<?=$this->lang->line('Old Password');?>">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <div class="mt-4">
                    <input type="submit" value="<?=$this->lang->line('Update Password');?>" name="updatePassword" class="btn btn-primary margin-right-none">
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

<script>
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-100y'
  });
  (function($) {
    $.fn.inputFilter = function(inputFilter) {
      return this.on("input", function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      });
    };
  }(jQuery));

  $('[name=phone]').inputFilter(function(value) {
    return /^-?\d*$/.test(value);
  });
</script>
<?php
  if(isset($user_data->code_country) && $user_data->code_country!=0){
?>
    <script type="text/javascript">
      $('[name=code_country]').val('<?=$user_data->code_country;?>')
    </script>
<?php
  }
?><?php } } $this->load->view('frontend/layout/footer'); ?>