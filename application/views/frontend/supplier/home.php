<?php $this->load->view('frontend/layout/header'); ?>

	<div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">

          <div class="padding-top-2x mt-2 hidden-lg-up"></div>

        <?php
        if ($this->input->get('detail')) {
          $orderStore = $this->m_model->selectas('id', $this->input->get('detail'), 'orders_store');
          if (count($orderStore) > 0) {
            $orders = $this->m_model->selectas('id', $orderStore[0]->orders, 'orders');
            if (count($orders) > 0) {

            $checkNotify = $this->m_model->selectas2('user', $this->session->userdata('user'), 'global_id', $this->input->get('detail'), 'user_notify');
            if (count($checkNotify) > 0) {
                foreach ($checkNotify as $key => $valueNotify) {
                    $this->m_model->updateas('id', $valueNotify->id, array('status' => 1), 'user_notify');
                }
            }
        ?>
          <?php
            $user = $this->m_model->selectas('id', $orders[0]->user, 'user');
            if (count($user) > 0) {
              $users = $user[0]->name;
            } else {
              $users = 'not found';
            }
          ?>

          <div class="card">
            <div class="card-header"><span class="text-lg"><?=$this->lang->line('Order Details');?></span></div>
            <div class="card-body">
              <div class="row">

              <div class="col-md-6">
                <h6><?=$this->lang->line('Shipment Details');?></h6>
                <table>
                  <tr>
                    <td style="width: 70px;"><?=$this->lang->line('Courier');?></td>
                    <td> <b><?= ucwords($orderStore[0]->shipment); ?> - <?= $orderStore[0]->shipment_serv; ?></b></td>
                  </tr>
                <?php $address = $this->m_model->selectas('id', $orders[0]->address, 'address');
                    if (count($address) > 0) { ?>
                  <tr>
                    <td><?=$this->lang->line('Address');?></td>
                    <td> <?= $address[0]->name; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td> <?= $address[0]->province_name; ?>, <?= $address[0]->city_name; ?>, <?= $address[0]->district_name; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td> <?= $address[0]->address; ?>, <?= $address[0]->zip; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td> <?= $address[0]->phone; ?></td>
                  </tr>
                <?php } ?>
                </table>
              </div>

              <?php if ($orderStore[0]->orders_status == 0) { ?>
              <div class="col-md-6">
                <h5 class="card-title"><?=$this->lang->line('Order Status');?> : <span style="color: orange;"><?=$this->lang->line('Pending');?></span></h5>
                <?php
                if ($orders[0]->payment_status == 1 ){
                ?>
                <div class="col-12 col-md-8">
                    <img src="<?=$orders[0]->bukti_tf;?>" class="img-responsive" style="image-orientation: from-image !important;">
                  </div>
                <form action="" method="post">
                  <input type="hidden" name="order" value="<?= $orderStore[0]->id; ?>">
                  <input type="submit" class="btn btn-sm btn-primary" name="status" value="<?=$this->lang->line('Process Order');?>">
                </form>
                <?php
                }else if ($orders[0]->payment_status == 2 ){
                ?>
                  <h5 class="card-title">
                    <?=$this->lang->line('Payment Status');?> :
                    <span style="color: orange;"><?=$this->lang->line('Paid');?></span>
                  </h5>
                  <div class="col-12 col-md-8">
                    <img src="<?=$orders[0]->bukti_tf;?>" class="img-responsive" style="image-orientation: from-image !important;">
                  </div>
                <?php
                }else{
                ?>
                  <h5 class="card-title">
                    <?=$this->lang->line('Payment Status');?> :
                    <span style="color: orange;"><?=$this->lang->line('Unpaid');?></span>
                  </h5>
                <?php
                }
                ?>
                <form action="" method="post">
                  <input type="hidden" name="order" value="<?= $orderStore[0]->id; ?>">
                  <input type="submit" class="btn btn-sm btn-warning" name="cancel" value="<?=$this->lang->line('Cancel Order');?>">
                </form>
              </div>
              <?php } if ($orderStore[0]->orders_status == 1) { 
                        $resi='';
                        if(strtolower($orderStore[0]->shipment) == 'c&c'){
                          $resi='Click & Collect';
                        }
              ?>
                <div class="col-md-6">
                  <h5 class="card-title"><?=$this->lang->line('Order Status');?> : <span style="color: green;"><?=$this->lang->line('Process');?></span></h5>
                  <div class="form-group">
                    <form action="" method="post">
                      <input type="hidden" name="order" value="<?= $orderStore[0]->id; ?>">
                      <input name="awb" class="form-control" type="text" placeholder="No. Resi" required="" value="<?=$resi;?>">
                      <input name="shipment" class="form-control" type="hidden" required="" value="<?=$orderStore[0]->shipment;?>">
                      <input name="courier" class="btn btn-primary" type="submit" value="Submit">
                    </form>
                  </div>
                </div>
              <?php } if ($orderStore[0]->orders_status == 2) { ?>
                <div class="col-md-6">
                  <h5 class="card-title"><?=$this->lang->line('Order Status');?> : <span style="color: blue;"><?=$this->lang->line('Shipped');?></span></h5>
                  <!--<div class="form-group">
                      <input name="courier" class="btn btn-primary" type="submit" value="<?=$this->lang->line('Track order');?>">
                  </div>-->
                </div>
              <?php } if ($orderStore[0]->orders_status == 3) { ?>
                <div class="col-md-6 text-center">
                  <h4 class="card-title" style="padding-top: 50px;"><?=$this->lang->line('Order Status');?> : <span style="color: green;"><?=$this->lang->line('Complete');?></span></h4>
                </div>
              <?php } ?>
            </div>

            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive shopping-cart mb-0">
              <table class="table">
                <thead>
                  <tr>
                    <th><?=$this->lang->line('Product Name');?></th>
                    <th class="text-center"><?=$this->lang->line('Subtotal');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $orderDetail = $this->m_model->selectas('orders_store', $orderStore[0]->id, 'orders_detail');
                  //print_r($orderDetail);
                  //die();
                  if (count($orderDetail) > 0) {
                    $subtotal = 0;
                    foreach ($orderDetail as $keys => $valueDetail) {
                      $subtotal += $valueDetail->price * $valueDetail->quantity;
                      $productStore = $this->m_model->selectas('id', $valueDetail->product_store, 'product_store');
                      if (count($productStore) > 0) {

                        $product_detail = $this->m_model->selectaslang('product', $productStore[0]->product, 'product_lang');
                        $product_image = $this->m_model->selectas('product', $productStore[0]->product, 'product_image');
                        if (count($product_image) > 0) {
                          $img = site_url('images/product/').$product_image[0]->small;
                        } else {
                          $img = site_url('images/product/images.jpeg');
                        }
                  ?>
                  <tr>
                    <td>
                      <div class="product-item">
                        <a class="product-thumb" href="<?= site_url('product/detail/'.$valueDetail->product_store.'/').$product_detail[0]->seo; ?>">
                          <img src="<?= $img; ?>" alt="Product">
                        </a>
                        <div class="product-info">
                          <h4 class="product-title">
                            <a href="<?= site_url('product/detail/'.$valueDetail->product_store.'/').$product_detail[0]->seo; ?>">
                              <?= $product_detail[0]->title; ?>
                            </a>
                          </h4><span><em><?=$this->lang->line('Quantity');?>:</em> <?= $valueDetail->quantity; ?></span>
                        </div>
                      </div>
                    </td>
                    <td class="text-center text-lg"><?= 'Rp '.number_format($valueDetail->price * $valueDetail->quantity); ?></td>
                  </tr>
                <?php } } } ?>
                </tbody>
              </table>
            </div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
              <div class="px-2 py-1">
                <span class="text-muted"><?=$this->lang->line('Subtotal');?>:</span> 
                <span class="text-gray-dark">
                  <?= 'Rp '.number_format($subtotal); ?>
                </span>
              </div>
              <div class="px-2 py-1">
                <span class="text-muted"><?=$this->lang->line('Shipping');?>:</span> 
                <span class="text-gray-dark">
                  <?= 'Rp '.number_format($orderStore[0]->shipping_cost); ?>
                </span>
              </div>
              <!--
              <div class="px-2 py-1">
                <span class="text-muted">Tax:</span> 
                <span class="text-gray-dark">-</span>
              </div>-->
              <div class="text-lg px-2 py-1">
                <span class="text-muted"><?=$this->lang->line('Total');?>:</span> 
                <span class="text-gray-dark">
                  <?= 'Rp '.number_format($orderStore[0]->shipping_cost + $subtotal); ?>
                </span>
              </div>
            </div>
          </div>

          <?php } ?>

<?php } } else {
  $checkStore = $this->m_model->selectas('user', $this->session->userdata('user'), 'store');
  if (count($checkStore) > 0) {
    //$ordersStore = $this->m_model->selectas('store', $checkStore[0]->id, 'orders_store', 'orders', 'DESC');
    $numLimit=10;
    if(!$this->input->get('page')){
        $page=1;
        $numStart=($numLimit*$page)-$numLimit;
    }
    else{
        $page=$this->input->get('page');
        $numStart=($numLimit*$page)-$numLimit;
    }
    $query_ordersStore="select * from orders_store where store='".$checkStore[0]->id."'";
    $order_by=" order by orders DESC ";
    $limit='LIMIT '.$numStart.', '.$numLimit;
    $ordersStore = $this->m_model->selectcustom($query_ordersStore.$order_by.$limit);
    $TotalOfProduct=TotalOfProduct($query_ordersStore);
    $TotalOfPage=TotalOfPage($TotalOfProduct,  $numLimit);
    if (count($ordersStore) > 0) {
?>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th class="text-center"><?=$this->lang->line('Date');?></th>
                    <th class="text-center"><?=$this->lang->line('Status');?></th>
                    <th class="text-center"><?=$this->lang->line('Subtotal');?></th>
                    <th class="text-center"><?=$this->lang->line('Shipping');?></th>
                    <th class="text-center"><?=$this->lang->line('Total');?></th>
                    <th class="text-center"><?=$this->lang->line('Shipment');?></th>
                    <th class="text-center"><?=$this->lang->line('Payment');?></th>
                    <th class="text-center"><?=$this->lang->line('Action');?></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php
                    foreach ($ordersStore as $key => $valueStore) {
                      $subtotal = 0;
                      $orders = $this->m_model->selectas('id', $valueStore->orders, 'orders');
                      $orderDetail = $this->m_model->selectas('orders_store', $valueStore->id, 'orders_detail');
                      if (count($orders) > 0 && count($orderDetail) > 0) {
                        foreach ($orderDetail as $key => $valueDetail) {
                          $subtotal += $valueDetail->price * $valueDetail->quantity;
                        }

                        $user = $this->m_model->selectas('id', $orders[0]->user, 'user');
                        if (count($user) > 0) {
                          $users = $user[0]->name;
                        } else {
                          $users = 'not found';
                        }
                        
                  ?>
                  <tr>
                    <td class="text-center"><?= substr($orders[0]->created, 0, -9); ?></td>
                    <td class="text-center"><?php
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
                    ?></td>
                    <td class="text-right"><?= 'Rp'.number_format($subtotal); ?></td>
                    <td class="text-right"><?= 'Rp'.number_format($valueStore->shipping_cost); ?></td>
                    <td class="text-right"><?= 'Rp'.number_format($valueStore->shipping_cost + $subtotal); ?></td>
                    <td class="text-center"><?= ucwords($valueStore->shipment); ?> - <?= $valueStore->shipment_serv; ?></td>
                    <td class="text-center">
                      <?php
                        if ($orders[0]->payment_status == 1 ){
                      ?>
                          <span class="badge badge-success badge-pill"><?=$this->lang->line('Confirmed');?></span>
                      <?php
                        }
                        else if ($orders[0]->payment_status == 2 ){
                      ?>
                          <span class="badge badge-info badge-pill"><?=$this->lang->line('Paid');?></span>
                      <?php
                        }
                        else if ($orders[0]->payment_status == 0 ){
                      ?>
                          <span class="badge badge-default badge-pill"><?=$this->lang->line('Unpaid');?></span>
                      <?php
                        }
                        else if ($orders[0]->payment_status == 3 ){
                      ?>
                          <span class="badge badge-danger badge-pill"><?=$this->lang->line('Canceled');?></span>
                      <?php
                        }
                      ?>
                    </td>
                    <td class="text-center">
                    <a href="<?= site_url('supplier?detail=').$valueStore->id; ?>" style="text-decoration: none;">
                      <span class="badge badge-info badge-pill"><?=$this->lang->line('Detail');?></span>
                    </a>
                    </td>
                  </tr>
                  <?php } } ?>
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
                        <a class="page-link" href="<?= site_url('supplier/?page='.$page_i);?>">
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
                <h3 class="card-title"><?=$this->lang->line('');?></h3>
                <div class="padding-top-1x padding-bottom-1x">
                  <a class="btn btn-outline-secondary" href="<?= site_url('supplier/product?add=true'); ?>"><?=$this->lang->line('Add Product');?></a>  
                </div>
              </div>
            </div>

<?php } } else { ?>
            <div class="card text-center margin-top-1x">
              <div class="card-body padding-top-2x">
                <h3 class="card-title"><?=$this->lang->line('msg_no_order');?></h3>
                <div class="padding-top-1x padding-bottom-1x">
                  <a class="btn btn-outline-secondary" href="<?= site_url('supplier/store?add=true'); ?>"><?=$this->lang->line('Create Store');?></a>  
                </div>
              </div>
            </div>
<?php } ?>


<?php } ?>

          </div>
        </div>
      </div>
      
      
    </div>

<?php $this->load->view('frontend/layout/footer'); ?>