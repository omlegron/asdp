<?php $this->load->view('frontend/layout/header'); 
  $data['voucher']="choose";
?>

    <div class="offcanvas-wrapper">

      <div class="container padding-bottom-3x padding-top-2x mb-2">
        <form action="" method="post">
          <div class="row">

          <div class="col-lg-8">
            <?php include 'step-wizard.php'; ?>

            <input type="hidden" name="payment_cost" value="90000">

            <h4><?=$this->lang->line('Payment Method');?></h4>
            <hr class="padding-bottom-1x">
            <div class="accordion" id="accordion" role="tablist">

              <!--<div class="card">
                <div class="card-header" role="tab">
                  <h6><a href="#card" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="icon-credit-card"></i><?=$this->lang->line('Pay with Credit Card');?></a></h6>
                </div>
                <div class="collapse" id="card" data-parent="#accordion" role="tabpanel" style="">
                  <div class="card-body">
                    <p><?=$this->lang->line('Pay with Visa / Mastercard');?></p>
                    <div class="custom-control custom-radio">
                      <input name="payment" value="1" class="custom-control-input" type="radio" id="channel_payment-CC">
                      <label class="custom-control-label" for="channel_payment-CC">Visa / Mastercard</label>
                    </div>
                  </div>
                </div>
              </div>-->
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="collapsed" href="#paypal" data-toggle="collapse" aria-expanded="false"><i class="socicon-paypal"></i><?=$this->lang->line('Pay with Payment Gatway');?></a></h6>
                </div>
                <div class="collapse" id="paypal" data-parent="#accordion" role="tabpanel" style="">
                  <div class="card-body">
                      <input type="hidden" id="name_payment" name="name_payment" value="" >
                      <?php
                        $channelPayment=getChannelPayment();
                        foreach ($channelPayment['payment_channel'] as $key => $value) {
                          # code...
                      ?>  
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="channel_payment-<?=$key;?>" name="payment" value="<?= $value['pg_code'];?>" >
                            <label class="custom-control-label" for="channel_payment-<?=$key;?>"><?= $value['pg_name'];?></label>
                          </div>
                      <?php
                        }
                      ?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="" href="#points" data-toggle="collapse" aria-expanded="true">
                    <i class="icon-award"></i><?=$this->lang->line('Bank Transfer');?></a></h6>
                </div>
                <div class="collapse show" id="points" data-parent="#accordion" role="tabpanel" style="">
                  <div class="card-body">
                    <p><?=$this->lang->line('Payment by Bank Transfer');?></p>
                    <div class="custom-control custom-radio">
                      <input name="payment" value="0" class="custom-control-input" type="radio" id="channel_payment-manual">
                      <label class="custom-control-label" for="channel_payment-manual">Mandiri 155-00-0985957-3 </label> a/n PT Indo Bazaar Utama
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between paddin-top-1x mt-4">
              <a class="btn btn-outline-secondary" href="<?= site_url('cart/shipping'); ?>">
                <i class="icon-arrow-left"></i>
                <span class="hidden-xs-down"><?=$this->lang->line('Back');?></span>
              </a>
              <button type="submit" class="btn btn-primary">
                <span class="hidden-xs-down"><?=$this->lang->line('Continue');?> </span>
                <i class="icon-arrow-right"></i>
              </button>
            </div>


        </div>
        <div class="col-lg-4">
          <?php $this->load->view('frontend/cart/sidebar-cart', $data); ?>
        </div>
        </div>
      </form>

      </div>

  </div>
  <script type="text/javascript">
    $(document).on('click', '[for^=channel_payment]', function(e){
      name_payment=$(this).html();
      $('#name_payment').val(name_payment);
    })
  </script>
  <?php 
    if($cart[0]->payment!=''){
  ?>
      <script type="text/javascript">
        $("[value=<?= $cart[0]->payment;?>]").attr("checked", "checked");
      </script>
  <?php
  }
  ?>
<?php $this->load->view('frontend/layout/footer'); ?>