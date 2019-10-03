<?php
  if($this->input->get('add_role') == 'success' && $this->input->get('updateSession') == 'success'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('Registration Seller Successed');?>',
            position: "topRight",
            class: "iziToast-success",
        });
        setTimeout(function() {
          window.location.href = "<?=base_url();?>member";
        }, 5000);
    </script>
<?php
  }
  else if($this->input->get('add_role') == 'success' && $this->input->get('updateSession') == 'failed'){
?>
    <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('Registration Seller Successed not all');?>',
            position: "topRight",
            class: "iziToast-warning",
        });
        setTimeout(function() {
          window.location.href = "<?=base_url();?>member/logout";
        }, 5000);
    </script>
<?php
  }
  else if($this->input->get('add_role') && $this->input->get('updateSession')){
?>
  <script type="text/javascript">
        iziToast.show({
            title: '',
            message: '<?= $this->lang->line('Registration Seller Failed');?>',
            position: "topRight",
            class: "iziToast-danger",
        });
        setTimeout(function() {
          window.location.href = "<?=base_url();?>member";
        }, 5000);
    </script>
<?php
  }
$userdata = $this->m_model->selectas('id', $this->session->userdata('user'), 'user');
if(count($userdata)>0){
  $user_data=$userdata[0];
}
?>
          <div class="col-lg-3">
            <aside class="user-info-wrapper">
              <div class="user-cover" style="background-image: url(<?= site_url('assets/frontend/img/account/user-cover-img.jpg'); ?>);">
                <?php
                  if($this->session->userdata('user_role2')!= null){
                ?>
                  <div class="info-label" data-toggle="tooltip" title="" data-original-title="Saldo">
                    <i class="icon-medal"></i><?= 'Rp '.number_format($user_data->wallet); ?>
                  </div>
                <?php
                  }
                ?>
                <!--<div class="info-label" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward Points to spend"><i class="icon-medal"></i>290 points</div>-->
              </div>
              <div class="user-info">
                <div class="user-avatar">
                  <img src="<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>" alt="User">
                </div>
                <div class="user-data">
                  <h4><?= $user_data->name; ?></h4>
                </div>
              </div>
            </aside>
            <nav class="list-group">
              <a class="list-group-item <?php if($this->uri->segment(2) == '' || $this->uri->segment(2) == 'order') { echo 'active'; } ?> with-badge" href="<?= site_url('member'); ?>">
                <i class="icon-shopping-bag"></i><?=$this->lang->line('Orders');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'profile') { echo 'active'; } ?>" href="<?= site_url('member/profile'); ?>">
                <i class="icon-user"></i><?=$this->lang->line('Profile');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'address') { echo 'active'; } ?>" href="<?= site_url('member/address'); ?>">
                <i class="icon-map"></i><?=$this->lang->line('Address');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'wishlist') { echo 'active'; } ?> with-badge" href="<?= site_url('member/wishlist'); ?>">
                <i class="icon-heart"></i><?=$this->lang->line('Wishlist');?>
              </a>
              <?php
                if($this->session->userdata('user_data')->user_role2 == 0){
              ?>
                  <a class="list-group-item <?php if($this->uri->segment(2) == 'OpenStore') { echo 'active'; } ?> with-badge" data-toggle="modal" data-target="#modalDefault" style="cursor: pointer;">
                    <i class="icon-package"></i><?=$this->lang->line('Register Seller');?>
                  </a>
              <?php
                }
                else if($this->session->userdata('user_data')->user_role2 == 2){
                  $this->load->view('frontend/member/supplier-sidebar');
                }
                else if($this->session->userdata('user_data')->user_role2 == 3){
                  $this->load->view('frontend/member/marketer-sidebar');
                }
              ?>
            </nav>
          </div>

<!-- Default Modal-->
<div class="modal fade" id="modalDefault" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?=$this->lang->line('Register Seller');?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="form_open_store" action="<?=base_url();?>member/OpenStore" method="POST">
          <div class="form-group">
            <select id="store_type" name="store_type" class="form-control">
              <option value="0" disabled selected>
                <?=$this->lang->line('Choose One');?>
              </option>
              <option value="2"><?=$this->lang->line('Supplier');?></option>
              <option value="3"><?=$this->lang->line('Markter');?></option>
            </select>
          </div>
        </form>
        <label class="badge badge-danger"><?= $this->lang->line('valid for a lifetime');?></label>
      </div>
      <div class="modal-footer">
        <a href="<?=base_url();?>page/p/term-and-condition">
          <?=$this->lang->line('Terms & Conditions');?>
        </a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).on('change', '#store_type', function(e){
    e.preventDefault();
    var r = confirm("Are you sure?");
    if (r == true) {
      $('#form_open_store').submit();
    } 
  })
</script>