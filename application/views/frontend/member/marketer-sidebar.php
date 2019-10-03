<a class="list-group-item list-group-item-info">
  <h5 style="margin-bottom: 0px;"><?=$this->lang->line('Markter');?></h5>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'marketer' && $this->uri->segment(2) == '') { echo 'active'; } ?> with-badge" href="<?= site_url('marketer'); ?>">
  <i class="icon-shopping-bag"></i>Dashboard
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'marketer' && $this->uri->segment(2) == 'store') { echo 'active'; } ?> with-badge" href="<?= site_url('marketer/store'); ?>">
  <i class="icon-heart"></i></i><?=$this->lang->line('Store');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'marketer' && $this->uri->segment(2) == 'product' || $this->uri->segment(2) == 'agent') { echo 'active'; } ?> with-badge" href="<?= site_url('marketer/product'); ?>">
  <i class="icon-tag"></i></i><?=$this->lang->line('Product');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == '' && $this->uri->segment(2) == 'withdraw') { echo 'active'; } ?>" href="<?= site_url('marketer/withdraw'); ?>">
  <i class="icon-umbrella"></i></i><?=$this->lang->line('Withdraw');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'marketer' && $this->uri->segment(2) == 'report') { echo 'active'; } ?>" href="<?= site_url('marketer/report'); ?>">
  <i class="icon-file-text"></i></i><?=$this->lang->line('Report');?>
</a>
<a class="list-group-item <?php if($this->uri->segment(1) == 'marketer' && $this->uri->segment(2) == 'ListSupplier') { echo 'active'; } ?>" href="<?= site_url('marketer/ListSupplier'); ?>">
  <i class="icon-file-text"></i><?=$this->lang->line('ListSupplier');?>
</a>