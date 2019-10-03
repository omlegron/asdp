<?php $userdata = $this->m_model->selectas('id', $this->session->userdata('user'), 'user');
if (count($userdata) > 0) {
  foreach ($userdata as $key => $user_data) {
?>
          <div class="col-lg-3">
            <aside class="user-info-wrapper">
              <div class="user-cover" style="background-image: url(<?= site_url('assets/frontend/img/account/user-cover-img.jpg'); ?>);">
                <div class="info-label" data-toggle="tooltip" title="" data-original-title="Saldo">
                  <i class="icon-medal"></i><?= 'Rp '.number_format($user_data->wallet); ?>
                </div>
              </div>
              <div class="user-info">
                <div class="user-avatar">
                  <img src="<?php if($user_data->image == '') { echo site_url('assets/frontend/img/profile.png');  } else { echo $user_data->image; } ?>" alt="User">
                </div>
                <div class="user-data">
                  <h4>
                    <?= $user_data->name; ?>
                    <?php
                      $user_store_side = $this->m_model->selectas3('user', $this->session->userdata('user'), 'badge !=', '','badge IS NOT NULL', null , 'store');
                      if(count($user_store_side)>0){
                    ?>
                        <img src="<?=base_url();?>/assets/frontend/img/badge/<?=$user_store_side[0]->badge;?>.png" style="width: auto; height:2rem;">
                    <?php
                      }
                    ?>
                  </h4>
                  <span><?= $user_data->register; ?></span>
                </div>
              </div>
            </aside>
            <nav class="list-group">
              <a class="list-group-item <?php if($this->uri->segment(2) == '') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier'); ?>">
                <i class="icon-shopping-bag"></i>Dashboard
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'store') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier/store'); ?>">
                <i class="icon-heart"></i><?=$this->lang->line('Store');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'product') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier/product'); ?>">
                <i class="icon-tag"></i><?=$this->lang->line('Products');?>
              </a>
              <!--
              <a class="list-group-item with-badge" href="#">
                <i class="icon-tag"></i>Product <span class="badge badge-primary badge-pill">4</span>
              </a>
              -->
              <a class="list-group-item <?php if($this->uri->segment(2) == 'profile') { echo 'active'; } ?>" href="<?= site_url('supplier/profile'); ?>">
                <i class="icon-user"></i><?=$this->lang->line('Profile');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'withdraw') { echo 'active'; } ?>" href="<?= site_url('supplier/withdraw'); ?>">
                <i class="icon-umbrella"></i><?=$this->lang->line('Withdraw');?>
              </a>
              <a class="list-group-item <?php if($this->uri->segment(2) == 'report') { echo 'active'; } ?>" href="<?= site_url('supplier/report'); ?>">
                <i class="icon-file-text"></i><?=$this->lang->line('Report');?>
              </a>
              <!--<a class="list-group-item <?php if($this->uri->segment(2) == 'membership') { echo 'active'; } ?>" href="<?= site_url('supplier/membership'); ?>">
                <i class="icon-bookmark"></i><?=$this->lang->line('membership');?>
              </a>-->
            </nav>
          </div>
<?php } } ?>