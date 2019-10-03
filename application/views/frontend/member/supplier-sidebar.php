<a class="list-group-item list-group-item-info">
  <h5 style="margin-bottom: 0px;"><?=$this->lang->line('Supplier');?></h5>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == '') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier'); ?>">
  <i class="icon-shopping-bag"></i>Dashboard
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'store') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier/store'); ?>">
  <i class="icon-heart"></i><?=$this->lang->line('Store');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'product') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier/product'); ?>">
  <i class="icon-tag"></i><?=$this->lang->line('Products');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'ProductUpdate') { echo 'active'; } ?> with-badge" href="<?= site_url('supplier/ProductUpdate?token='.md5($this->session->userdata('user'))); ?>">
  <i class="icon-refresh-cw"></i><?=$this->lang->line('update').' '.$this->lang->line('Products');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'withdraw') { echo 'active'; } ?>" href="<?= site_url('supplier/withdraw'); ?>">
  <i class="icon-umbrella"></i><?=$this->lang->line('Withdraw');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'report') { echo 'active'; } ?>" href="<?= site_url('supplier/report'); ?>">
  <i class="icon-file-text"></i><?=$this->lang->line('Report');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'ListMarketer') { echo 'active'; } ?>" href="<?= site_url('supplier/ListMarketer'); ?>">
  <i class="icon-file-text"></i><?=$this->lang->line('ListMarketer');?>
</a>