<aside class="sidebar">
  <div class="padding-top-2x hidden-lg-up"></div>
  <div class="card mb-4">
    <div class="card-header"><?=$this->lang->line('Order Summary')?></div>
    <div class="card-body">
    <!-- Order Summary Widget-->
      <section class="widget widget-order-summary">
        <table class="table">
        <?php
        $type_voucher = 0;
        if ($this->session->userdata('user_role') == 'customer') {
          $member = $this->session->userdata('user');
        } else {
          $member = $this->session->userdata('guest');
        }

        $carts = $this->m_model->selectas('user', $member, 'cart');
        $arr=array();
        $arr['voucher_actived']=0;
        if (count($carts) > 0) {
          $subCartSidebar = 0;
          $coupon = $carts[0]->coupon;
          $type_voucher = $carts[0]->type_voucher;
          $value_voucher = $carts[0]->value_voucher;
          $arr['voucher_actived']=$coupon."|".$type_voucher."|".$value_voucher;
          //$cartDetail = $this->m_model->selectas('cart', $carts[0]->id, 'cart_detail');
          $sql="select A.* from cart_detail A join product_store B on (A.product_store = B.id) where A.cart='".$carts[0]->id."'";
          $cartDetail = $this->m_model->selectcustom($sql);

          if (count($cartDetail) > 0) {
            if ($carts[0]->shipping_cost != 0) {
              $shippingSidebar = $carts[0]->shipping_cost;
            } else {
              $shippingSidebar = 0;
            }

            foreach ($cartDetail as $key => $value) {
              $checkProductStore = $this->m_model->selectas('id', $value->product_store, 'product_store');

              $subCartSidebar += $value->price * $value->quantity;
              if(count($checkProductStore)>0){
                $arr['list_produk_cart'][]=$checkProductStore[0]->product;
              }
              else{
                $arr['list_produk_cart'][]=array();
              }
            }
        ?>
          <tr>
            <td><?=$this->lang->line('Cart Subtotal')?>:</td>
            <td class="text-medium"><?= 'Rp '.number_format($subCartSidebar); ?></td>
          </tr>
          <tr>
            <td><?=$this->lang->line('Shipping')?>:</td>
            <td class="text-medium">
              <?php if ($shippingSidebar != 0) {
                echo 'Rp '.number_format($shippingSidebar);
              } else {
                echo "-";
              }
              ?>
            </td>
          </tr>
          <?php
            $lbl_percent="";
            if($type_voucher == 1){// ==1 untuk tipe voucher percent
              $lbl_percent="(".$value_voucher."%)";
              $value_voucher=$subCartSidebar*$value_voucher/100;
            }
          ?>
          <tr id="row_voucher">
            <td>
              <?=$this->lang->line('Voucher')?>:
              <br>
              <i id="lbl_coupon"><?php echo $coupon." ".$lbl_percent; ?></i>
              <br>
              <div id="btn_cancel_voucher" class="badge btn-danger" style="cursor:pointer;" cartId="<?=$carts[0]->id;?>">Cancel</div>
            </td>
            <td class="text-medium" style="color: #b71c1c;" id="lbl_value">
              <?php
                echo '-Rp '.number_format($value_voucher);
              ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td class="text-lg text-medium" id="lbl_subtotal" pure_subtotal="<?=$subCartSidebar?>"subtotal_wo_voucher="<?=$subCartSidebar+$shippingSidebar; ?>" id="lbl_subtotal"><?= 'Rp '.number_format($subCartSidebar + $shippingSidebar-$value_voucher); ?></td>
          </tr>

        <?php } } ?>
        </table>
      </section>
      <?php
      if(isset($voucher) && $voucher=="choose"){
        $this->load->view('frontend/cart/check_voucher', $arr);
      }
      else if(isset($voucher) && $voucher=="actived"){

      }
      ?>
    </div>
  </div>
</aside>
<?php
 if(empty($value_voucher) && empty($coupon) && $type_voucher==0) {
              //kalau statement dibawah ini tidak tampil bearti semua masih kondisi default dan belum ada voucher yang digunakan
?>
  <script type="text/javascript">
    $('#row_voucher').hide();
  </script>
<?php
  }

?>
