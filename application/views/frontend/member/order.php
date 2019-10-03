<?php $this->load->view('frontend/layout/header'); ?>

  <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php include 'member-sidebar.php'; ?>
          <div class="col-lg-9">

          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <h5><?=$this->lang->line('Order History');?></h5>
          <hr class="padding-bottom-1x">

          <?php if (count($order) > 0) { ?>
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th class="text-center"><?=$this->lang->line('Date');?></th>
                    <th class="text-center"><?=$this->lang->line('Status');?></th>
                    <th class="text-center"><?=$this->lang->line('Subtotal');?></th>
                    <th class="text-center"><?=$this->lang->line('Shipping');?></th>
                    <th class="text-center"><?=$this->lang->line('Voucher');?></th>
                    <th class="text-center"><?=$this->lang->line('Payment');?></th>
                    <th class="text-center"><?=$this->lang->line('Total');?></th>
                    <th class="text-center"><?=$this->lang->line('Action');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($order as $key => $value) {
                      $orderStore = $this->m_model->selectas('orders', $value->id, 'orders_store');
                      $value_voucher=$value->value_voucher;
                      if (count($orderStore) > 0) {
                        foreach ($orderStore as $key => $valueStore) {
                          $shipping = $valueStore->shipping_cost;
                          $subtotal = 0;

                          $orderDetail = $this->m_model->selectas('orders_store', $valueStore->id, 'orders_detail');
                          if (count($orderDetail) > 0) {
                            foreach ($orderDetail as $key => $valueDetail) {
                              $subtotal += $valueDetail->price * $valueDetail->quantity;
                            }
                            if($value->type_voucher ==1){
                              //untuk menghitung value_voucher jika menggunakan percent
                              $value_voucher=$subtotal*$value->value_voucher/100;
                            }
                          }
                  ?>

                  <tr>
                    <td class="text-center"><?= substr($value->created, 0, -9); ?></td>
                    
                    <td class="text-center">
                    <?php
                    switch ($valueStore->orders_status) {
                      case '0':
                        echo '<span class="badge badge-default badge-pill">'.$this->lang->line('Pending').'</span>';
                        break;
                      case '1':
                        echo '<span class="badge badge-info badge-pill">'.$this->lang->line('Process').'</span>';
                        break;
                      case '2':
                        echo '<span class="badge badge-primary badge-pill">'.$this->lang->line('Shipped').'</span>';
                        break;
                      case '3':
                        echo '<span class="badge badge-success badge-pill">'.$this->lang->line('Complete').'</span>';
                        break;
                      case '4':
                        echo '<span class="badge badge-danger badge-pill">'.$this->lang->line('Canceled').'</span>';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?>
                    </td>
                    <td class="text-right"><?= 'Rp'.number_format($subtotal); ?></td>
                    <td class="text-right"><?= 'Rp'.number_format($shipping); ?></td>
                    <td>
                      <?php
                        if($value->coupon == "" || $value->coupon == null){
                          echo "-";
                        }
                        else{
                          echo $value->coupon;
                        }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php
                        if ($value->payment_status == 1 ){
                      ?>
                          <span class="badge badge-success badge-pill"><?=$this->lang->line('Confirmed');?></span>
                      <?php
                        }
                        else if ($value->payment_status == 2 ){
                      ?>
                          <span class="badge badge-info badge-pill"><?=$this->lang->line('Paid');?></span>
                      <?php
                        }
                        else if ($value->payment_status == 0 ){
                      ?>
                          <span class="badge badge-default badge-pill"><?=$this->lang->line('Unpaid');?></span>
                      <?php
                        }
                        else if ($value->payment_status == 3 ){
                      ?>
                          <span class="badge badge-danger badge-pill"><?=$this->lang->line('Canceled');?></span>
                      <?php
                        }
                      ?>
                    </td>
                    <td class="text-right"><?= 'Rp'.number_format($subtotal + $shipping - $value_voucher); ?></td>
                    <td class="text-center">
                      <a class="text-medium" href="<?= site_url('member/order/').$valueStore->id; ?>">
                        <span class="badge badge-info badge-pill">Detail</span>
                      </a>
                    </td>
                  </tr>


                  <?php } } } ?>
                </tbody>
              </table>
              <nav class="pagination">
                <div class="column">
                  <ul class="pages pull-right">
                  <?php
                    for ($page_i=1; $page_i<=$TotalOfPage; $page_i++) {
                      # code...
                      if($page==$page_i){
                ?>
                      <li class="active" style="border-color: #0da9ef; background-color: #0da9ef; color: #fff;">
                        <span>
                          <?=$page_i;?>
                        </span>
                      </li>
                <?php
                      }
                      else{
                ?>
                      <li>
                        <a class="page-link" href="<?= site_url('member?page='.$page_i);?>">
                          <?=$page_i;?>
                        </a>
                      </li>
                <?php
                      }
                    }
                ?>
                  </ul>
                </div>
              </nav>
            </div>

          <?php } else { ?>

          <div class="card text-center margin-top-1x">
            <div class="card-body padding-top-2x">
              <h3 class="card-title"><?=$this->lang->line('msg_empty_order');?></h3>
              <p class="card-text"><?=$this->lang->line('msg_go_shopping_to_history_order');?></p>
              <div class="padding-top-1x padding-bottom-1x">
                <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>">Go Shopping</a>  
              </div>
            </div>
          </div>

          <?php } ?>
          </div>
        </div>
      </div>
      
      
    </div>

<?php $this->load->view('frontend/layout/footer'); ?>