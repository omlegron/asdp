<?php $this->load->view('frontend/layout/header'); ?>

  <div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php include 'member-sidebar.php'; ?>
          <div class="col-lg-9">

          <?php if (count($order) > 0) {
            $shipping = 0;
            foreach ($order as $key => $value) {
              $orders = $this->m_model->selectas('id', $value->orders, 'orders');
              $value_voucher=0;
              $order_id=0;
              if (count($orders) > 0) {
              $type_voucher=$orders[0]->type_voucher;
              $coupon=$orders[0]->coupon;
              $order_id=$orders[0]->id;
          ?>
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <h5><?=$this->lang->line('Order No');?> - <?= $orders[0]->ref; ?></h5>
          <hr class="padding-bottom-1x">

          <div class="card">
            <div class="card-header"><span class="text-lg"><?=$this->lang->line('Order Details');?></span></div>
            <div class="card-body">
              <div class="row">

              <div class="col-md-6">
                <h6><?=$this->lang->line('Shipment Details');?></h6>
                <table>
                  <tr>
                    <td style="width: 70px;"><?=$this->lang->line('Courier');?> </td>
                    <td> <b><?= ucwords($value->shipment); ?> - <?= $value->shipment_serv; ?></b></td>
                  </tr>
                <?php $address = $this->m_model->selectas('id', $orders[0]->address, 'address');
                    if (count($address) > 0) { ?>
                  <tr>
                    <td><?=$this->lang->line('Address');?> </td>
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
                  <tr>
                    <td><?=$this->lang->line('Shipping');?></td>
                    <td>
                      <span class="badge badge-info badge-pill"><?= strtoupper($value->shipment).' - '.$value->shipment_serv;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Resi</td>
                    <td>
                      <b><?= $value->shipment_awb;?></b>
                    </td>
                  </tr>
                  <tr>
                    <td><?=$this->lang->line('Payment Status');?></td>
                    <td>
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
                  </tr>
                <?php } ?>
                </table>
              </div>
              <div class="col-md-6">
                <h6><?=$this->lang->line('Payment Method');?></h6>
                <table>
                  <tr>
                    <td colspan="2"><?=$orders[0]->pg_name;?></td>
                  </tr>
                <?php $address = $this->m_model->selectas('id', $orders[0]->address, 'address');
                    if (count($address) > 0) { ?>
                  <tr>
                    <td colspan="2"><b><?=$orders[0]->virtual_account;?></b></td>
                  </tr>
                <?php } ?>
                </table>
              <?php
                if ($orders[0]->payment_status == 0 && $orders[0]->payment==0 && $orders[0]->bukti_tf==null) { 
              ?>
                  <a data-toggle="modal" data-target="#modalConfirmPayment" class="btn btn-sm btn-primary"><?=$this->lang->line('Confirmation Payment');?></a>
              <?php
              }
              else if($orders[0]->bukti_tf!=null){
              ?>
                <div class="col-12 col-md-8">
                  <img src="<?=$orders[0]->bukti_tf;?>" class="img-responsive" style="image-orientation: from-image !important;">
                  <a data-toggle="modal" data-target="#modalConfirmPayment" class="btn btn-sm btn-primary"><i clas="fa fa-upload"></i><?=$this->lang->line('Confirmation Payment');?></a>
                </div>
              <?php
              }
              ?>
              </div>

              <?php
              if ($value->orders_status == 2) { ?>
                <div class="col-md-6">
                  <h5 class="card-title"><?=$this->lang->line('Order Status');?> : <span style="color: blue;"><?=$this->lang->line('Shipped');?></span></h5>
                  <label><?=$this->lang->line('limit_time_received');?>:<br><b class="text-danger"><?=convert_time_NdMYHis($value->est_received);?></b></label>
                  <div class="form-group">
                    <form action="" method="post">
                      <input type="hidden" name="order" value="<?= $value->id; ?>">
                      <!--<input name="courier" class="btn btn-sm btn-primary" type="submit" value="<?=$this->lang->line('Track order');?>">-->
                      <input name="confirm" class="btn btn-sm btn-success" type="submit" value="<?=$this->lang->line('Confirm Received');?>">
                    </form>
                  </div>
                </div>
              <?php } if ($value->orders_status == 3) { ?>
                <div class="col-md-6 text-center">
                  <h4 class="card-title" style="padding-top: 10px;"><?=$this->lang->line('Order Status');?> : <span style="color: green;"><?=$this->lang->line('Complete');?></span></h4>
                    <?php if ($value->orders_status == 3) { ?>
                      <br>
                      <a href="<?= site_url('member/review?orders=').$value->id; ?>">
                        <span class="btn btn-sm btn-success"><?=$this->lang->line('Review Products');?></span>
                      </a>
                    <?php } ?>
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
                  $orders = $this->m_model->selectas('orders_store', $value->id, 'orders_detail');
                  if (count($orders) > 0) {
                    $subtotal = 0;
                    $total_value_voucher=0;
                    foreach ($orders as $keys => $values) {
                    $productStore = $this->m_model->selectas('id', $values->product_store, 'product_store');
                    $value_voucher=$values->discount;
                    $total_value_voucher=$total_value_voucher+$value_voucher;
                    if (count($productStore) > 0) {
                      $shipping = $value->shipping_cost;
                      $product_detail = $this->m_model->selectaslang('product', $productStore[0]->product, 'product_lang');
                      $product_image = $this->m_model->selectas('product', $productStore[0]->product, 'product_image');
                      if (count($product_image) > 0) {
                        $img = site_url('images/product/').$product_image[0]->small;
                      } else {
                        $img = site_url('images/product/images.jpeg');
                      }
                      $subtotal += $values->price * $values->quantity;

                      //get agent/marketer if makerter's product
                      $store=array();
                      $store_name="";
                      $store_link="";
                      if($values->agent > 0){
                        $store= $this->m_model->selectas('id', $productStore[0]->store, 'store');
                        if(count($store)>0){
                          $store_name=$store[0]->brand;
                          $store_link=$store[0]->url;
                        }
                      }
                  ?>
                  <tr>
                    <td>
                      <div class="product-item">
                        <a class="product-thumb" href="<?= site_url('product/detail/'.$values->product_store.'/').$product_detail[0]->seo; ?>">
                          <img src="<?= $img; ?>" alt="Product">
                        </a>
                        <div class="product-info">
                          <h4 class="product-title">
                            <a href="<?= site_url('product/detail/'.$values->product_store.'/').$product_detail[0]->seo; ?>">
                              <?= $product_detail[0]->title; ?>
                            </a>
                          </h4>
                          <span><em><?=$this->lang->line('Quantity');?>:</em> <?= $values->quantity; ?></span>
                          <?php if($values->discount>0){
                          ?>
                            <span><em>Voucher:</em><i> <?= $coupon;?></i></span>
                          <?php
                          }
                          ?>
                          <?php if(count($store)>0){
                          ?>
                            <span>
                              <em><?=$this->lang->line('Reference from');?> </em>
                              <i>
                                <a style="text-decoration: none; color: gray;" href="<?= base_url()."m/".$store_link;?>">&nbsp
                                  <?= $store_name;?>
                                </a>
                              </i>
                            </span>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </td>
                    <td class="text-right text-lg"><?= 'Rp '.number_format($values->price * $values->quantity); ?>
                    <br>
                    <?php if($values->discount>0){
                    ?>
                      <span class="text-danger">
                        <em>
                        <?= '-Rp '.number_format($value_voucher); ?>
                      </em>
                      </span>
                    <?php
                    }
                    ?>
                    </td>
                  </tr>
                <?php
                    } 
                    }
                 } ?>
                </tbody>
              </table>
            </div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-2">
              <div class="px-2 py-1">
                <span class="text-muted"><?=$this->lang->line('Subtotal');?>:</span> 
                <span class="text-gray-dark">
                  <?= 'Rp '.number_format($subtotal-$total_value_voucher); ?>
                </span>
                <br>
              </div>
              <div class="px-2 py-1">
                <span class="text-muted"><?=$this->lang->line('Shipping');?>:</span> 
                <span class="text-gray-dark">
                  <?= 'Rp '.number_format($shipping); ?>
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
                  <?= 'Rp '.number_format($subtotal + $shipping - $total_value_voucher); ?>
                </span>
              </div>
            </div>
          </div>

          <?php } } } ?>
          </div>
        </div>
      </div>
      
      
    </div>

<!-- Upload TF Modal-->
<div class="modal fade" id="modalConfirmPayment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?=$this->lang->line('Confirmation Payment');?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input name="order_id" type="hidden" value="<?=$order_id;?>">
            <div class="col-12">
              <!--<div class="upload-wrap">
                <label for="file-input"><?=$this->lang->line('upload');?></label>
                <div class="uploadpreview 01" style="background-size: 100%;"></div>
                <input name="bukti_tf" id="01" type="file" accept="image/*">
                <br>
                <label><?=$this->lang->line('Max Size');?>*Bukti Transfer</label>
              </div>-->
              <div class="custom-file">
                  <input class="custom-file-input" type="file" id="bukti_tf" name="bukti_tf" accept="image/*" required="" >
                  <label class="custom-file-label" for="bukti_tf"><?=$this->lang->line('Choose file');?>...</label>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <hr>
          <input type="submit" name="ConfirmPayment" value="<?=$this->lang->line('Submit');?>" class="btn btn-primary" >
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  /*$('input[name=bukti_tf]').change(function(){
    var id = $(this).attr("id");
    var newimage = new FileReader();
    newimage.readAsDataURL(this.files[0]);
    newimage.onload = function(e){
      $('.uploadpreview.' + id ).css('background-image', 'url(' + e.target.result + ')' );
    }
  });*/
</script>
<?php $this->load->view('frontend/layout/footer'); ?>
