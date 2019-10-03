<?php include 'header.php'; ?>

    <?php if ($this->input->get('detail')) {
        $val = $this->m_model->selectas('id', $this->input->get('detail'), 'orders_store');
        if (count($val)) {
            $orders = $this->m_model->selectas('id', $val[0]->orders, 'orders');
            if (count($orders) > 0) {
            $detail = $this->m_model->selectas('orders', $orders[0]->id, 'orders_detail');
    ?>

        <div class="row clearfix">
            <div class="col-lg-12">

          <?php
            foreach ($val as $key => $value) {
            $user = $this->m_model->selectas('id', $orders[0]->user, 'user');
            if (count($user) > 0) {
              $users = $user[0]->name;
            } else {
              $users = 'not found';
            }
          ?>
          <div class="card">
            <div class="card-header"><span class="text-lg">Order Details</span></div>
            <div class="card-body">
              <div class="row">

              <div class="col-md-6">
                <h6>Shipment Details</h6>
                <table>
                  <tr>
                    <td style="width: 70px;">Courier </td>
                    <td> <b><?= ucwords($value->shipment); ?> - <?= $value->shipment_serv; ?></b></td>
                  </tr>
                <?php $address = $this->m_model->selectas('id', $orders[0]->address, 'address');
                    if (count($address) > 0) { ?>
                  <tr>
                    <td>Address </td>
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

              <div class="col-md-6">
                <h5 class="card-title">Order Status : <span class="badge badge-default badge-pill">
                    <?php
                    switch ($value->orders_status) {
                      case '0':
                        echo 'Pending';
                        break;
                      case '1':
                        echo 'Proccess';
                        break;
                      case '2':
                        echo 'Shipped';
                        break;
                      case '3':
                        echo 'Complete';
                        break;
                      case '4':
                        echo 'Canceled';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?></span></h5>
                  <h5 class="card-title">Payment Status : <span class="badge badge-danger badge-pill">
                    <?php
                    $button_ConfirmPay="";
                    switch ($orders[0]->payment_status) {
                      case '0':
                        echo 'Unpaid';
                        break;
                      case '1':
                        echo 'Confirmed';
                        break;
                      case '2':
                        echo 'Paid';
                        $button_ConfirmPay='<a class="btn btn-sm btn-primary" href="'.base_url().'panel/confirmPayment/'.$orders[0]->id.'">Confirm Payment</a>';
                        break;
                      case '3':
                        echo 'Cancle/Expired';
                        break;
                      default:
                        # code...
                        echo 'Cancle/Expired';
                        break;
                    }
                    ?></span>
                    <?=  $button_ConfirmPay; ?>
                  </h5>

                  <!--<div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" name="status" value="Track Order">
                  </div>-->

                  <div class="row" >
                      <?php
                      if($orders[0]->bukti_tf!=null){
                      ?>
                        <img src="<?=$orders[0]->bukti_tf;?>" class="img-responsive" style="image-orientation: from-image !important;">
                      <?php
                      }
                      ?>
                  </div>
                  <hr>
                  <!--<div class="row" >
                    <div class="col-12 col-md-6" >
                      <form action="" method="post">
                        <input type="hidden" name="order" value="<?= $value->id; ?>">
                        <input name="confirm" class="btn btn-sm btn-success" type="submit" value="Confirm Received">
                      </form>
                    </div>

                    <div class="col-12 col-md-6" >
                      <form action="" method="post">
                        <input type="hidden" name="order" value="<?= $value->id; ?>">
                        <input name="cancel" class="btn btn-sm btn-warning" type="submit" value="Cancel Order">
                      </form>
                    </div>-->
                  </div>

              </div>
            </div>

            </div>
          </div>
        <?php } ?>



                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <img src="<?= site_url('images/logo-bzaarplace-03.png'); ?>" width="200" alt="">
                                <h4 class="float-md-right">Invoice # <br>
                                    <strong><?= $orders[0]->ref; ?></strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <address>
                                    <strong>PT Bazaarplace Digital Indonesia</strong><br>
                                    Jakarta Pusat, Central Jakarta City<br>
                                    Jakarta 54656<br><br>
                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p><strong>Order Date: </strong> <?= substr($orders[0]->created, 0, 9); ?></p>
                                <p class="m-t-10"><strong>Order Status: </strong>
                                    <span>
                    <?php
                    switch ($val[0]->orders_status) {
                      case '0':
                        echo 'Pending';
                        break;
                      case '1':
                        echo 'Proccess';
                        break;
                      case '2':
                        echo 'Shipped';
                        break;
                      case '3':
                        echo 'Complete';
                        break;
                      case '4':
                        echo 'Canceled';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-40"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                        <thead>
                                            <tr><th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                        <?php $subtotal = 0;
                                        if (count($detail) > 0) {
                                            foreach ($detail as $key => $value) {
                                            $subtotal += $value->price * $value->quantity;
                                        ?>
                                            <tr>
                                                <td><?= $key + 1; ?></td>
                                                <td>
                                                <?php
                                                $productStore = $this->m_model->selectas('id', $value->product_store, 'product_store');
                                                if (count($productStore) > 0) {
                                                  $productDetail = $this->m_model->selectas('product', $productStore[0]->product, 'product_lang');
                                                  if (count($productDetail) > 0) {
                                                    echo '<a href="#" target="_blank">'.$productDetail[0]->title.'</a>';
                                                  }
                                                } else {
                                                    echo "not found";
                                                }
                                                ?>
                                                </td>
                                                <td><?= $value->quantity; ?></td>
                                                <td><?= 'Rp.'.number_format($value->price); ?></td>
                                                <td><?= 'Rp.'.number_format($value->price * $value->quantity); ?></td>
                                            </tr>
                                        <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <p class="text-right"><b>Sub-total:</b> <?= 'Rp.'.number_format($subtotal); ?></p>
                                <p class="text-right">Shipping: <?= 'Rp.'.number_format($val[0]->shipping_cost); ?></p>
                                <hr>
                                <h3 class="text-right"><?= 'Rp.'.number_format($subtotal + $val[0]->shipping_cost); ?></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print col-md-12 text-right">
                            <a href="#" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
                            <a href="#" class="btn btn-raised btn-default">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } } } ?>

    <?php if (!$this->input->get('detail')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Orders</h2>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Store</th>
                                <th>Customer</th>
                                <th>Payment</th>
                                <th>Subtotal</th>
                                <th>Shipping</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                  <?php
                  $order = $this->m_model->selectas('id>0', null,'orders','id', 'DESC');
                  if (count($order) > 0) {
                    foreach ($order as $keyOrder => $value) {
                      $orderStore = $this->m_model->selectas('orders', $value->id, 'orders_store');
                      if (count($orderStore) > 0) {
                        foreach ($orderStore as $key => $valueStore) {
                          $shipping = $valueStore->shipping_cost;
                          $subtotal = 0;

                          $orderDetail = $this->m_model->selectas('orders_store', $valueStore->id, 'orders_detail');
                          if (count($orderDetail) > 0) {
                            foreach ($orderDetail as $key => $valueDetail) {
                              $subtotal += $valueDetail->price * $valueDetail->quantity;
                            }
                          }
                  ?>

                  <tr>
                    <td><?= $keyOrder+1; ?></td>
                    <td><?= substr($value->created, 0, -9); ?></td>
                    <td>
                      <?php
                      $getSupplier = $this->m_model->selectas('id', $valueStore->store, 'store');
                      if (count($getSupplier) > 0) {
                        $getUser = $this->m_model->selectas('id', $getSupplier[0]->user, 'user');
                        if (count($getUser) > 0) {
                          echo $getUser[0]->name;
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                        $getUser = $this->m_model->selectas('id', $value->user, 'user');
                        if (count($getUser) > 0) {
                          echo $getUser[0]->name;
                        }
                      ?>
                    </td>
                    <td><?php
                    switch ($value->payment) {
                      case '0':
                        echo '<span class="badge badge-info badge-pill">Manual</span>';
                        break;
                      default:
                        # code...
                        echo '<span class="badge badge-warning badge-pill">VA</span>';
                        break;
                    }
                    switch ($value->payment_status) {
                      case '0':
                        echo '<span class="badge badge-default badge-pill">Pending</span>';
                        break;
                      case '1':
                        echo '<span class="badge badge-success badge-pill">Paid</span>';
                        break;                    
                      default:
                        # code...
                        break;
                    }
                    ?></td>
                    <td><?= 'Rp'.number_format($subtotal); ?></td>
                    <td><?= 'Rp'.number_format($shipping); ?></td>
                    <td><?= 'Rp'.number_format($subtotal + $shipping); ?></td>
                    <td>
                    <?php
                    switch ($valueStore->orders_status) {
                      case '0':
                        echo '<span class="badge badge-default badge-pill">Pending</span>';
                        break;
                      case '1':
                        echo '<span class="badge badge-info badge-pill">Process</span>';
                        break;
                      case '2':
                        echo '<span class="badge badge-primary badge-pill">Shipped</span>';
                        break;
                      case '3':
                        echo '<span class="badge badge-success badge-pill">Complete</span>';
                        break;
                      case '4':
                        echo '<span class="badge badge-warning badge-pill">Canceled</span>';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?>
                    </td>
                                    <td>
                                        <a class="badge badge-info" href="<?= site_url('panel/orders?detail=').$valueStore->id; ?>">
                                            Detail
                                        </a>
                                        <!--
                                        <a class="badge badge-warning" href="<?= site_url('panel/orders?remove=').$valueStore->id; ?>">
                                            Delete
                                        </a>-->
                                    </td>
                  </tr>


                  <?php } } } } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php include 'footer.php'; ?>