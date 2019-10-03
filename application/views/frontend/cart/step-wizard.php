<?php
$member = $this->session->userdata('user');
$cart   = $this->m_model->selectas('user', $member, 'cart');
if (count($cart) > 0) {

?>
          <div class="steps flex-sm-nowrap mb-5">
            <a class="step <?php if ($this->uri->segment(2) == 'address') { echo 'active'; } ?>" href="<?= site_url('cart/address'); ?>">
              <h4 class="step-title">
                <?php if ($cart[0]->address != NULL) { ?><i class="icon-check-circle"></i><?php } ?> 1. <?=$this->lang->line('Address');?>
              </h4>
            </a>
            <a class="step <?php if ($this->uri->segment(2) == 'shipping') { echo 'active'; } ?>" href="<?= site_url('cart/shipping'); ?>">
              <h4 class="step-title">
                <?php if ($cart[0]->shipment != 0) { ?><i class="icon-check-circle"></i><?php } ?> 2. <?=$this->lang->line('Shipping');?>
              </h4>
            </a>
            <a class="step <?php if ($this->uri->segment(2) == 'payment') { echo 'active'; } ?>" href="<?= site_url('cart/payment'); ?>">
              <h4 class="step-title">
                <?php if ($cart[0]->payment != NULL) { ?><i class="icon-check-circle"></i><?php } ?> 3. <?=$this->lang->line('Payment');?>
              </h4>
            </a>
            <a class="step <?php if ($this->uri->segment(2) == 'checkout') { echo 'active'; } ?>" href="<?= site_url('cart/checkout'); ?>">
              <h4 class="step-title">
                4. <?=$this->lang->line('Review');?>
              </h4>
            </a>
          </div>
<?php } ?>