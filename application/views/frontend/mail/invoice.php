<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Orders Detail Bazaarplace</title>
    <style>body,table td{font-family:sans-serif;font-size:14px}.body,body{background-color:#f6f6f6}.btn,.btn a,.content,.wrapper{box-sizing:border-box}.btn a,h1{text-transform:capitalize}.align-center,.btn table td,.footer,h1{text-align:center}.clear,.footer{clear:both}.first,.mt0{margin-top:0}.last,.mb0{margin-bottom:0}img{border:none;-ms-interpolation-mode:bicubic;max-width:100%}body{-webkit-font-smoothing:antialiased;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.container,.content{display:block;max-width:580px;padding:10px}table{border-collapse:separate;mso-table-lspace:0;mso-table-rspace:0;width:100%}table td{vertical-align:top}.body{width:100%}.btn a,.btn table td{background-color:#fff}.container{Margin:0 auto!important;width:580px}.btn,.footer,.main{width:100%}.content{Margin:0 auto}.main{background:#fff;border-radius:3px}.wrapper{padding:20px}.content-block{padding-bottom:10px;padding-top:10px}.footer{Margin-top:10px}h1,h2,h3,h4,ol,p,ul{font-family:sans-serif;margin:0}.footer a,.footer p,.footer span,.footer td{color:#999;font-size:12px;text-align:center}h1,h2,h3,h4{color:#000;font-weight:400;line-height:1.4;Margin-bottom:30px}.btn a,a{color:#3498db}h1{font-size:35px;font-weight:300}.btn a,ol,p,ul{font-size:14px}ol,p,ul{font-weight:400;Margin-bottom:15px}ol li,p li,ul li{list-style-position:inside;margin-left:5px}a{text-decoration:underline}.btn a,.powered-by a{text-decoration:none}.btn>tbody>tr>td{padding-bottom:15px}.btn table{width:auto}.btn table td{border-radius:5px}.btn a{border:1px solid #3498db;border-radius:5px;cursor:pointer;display:inline-block;font-weight:700;margin:0;padding:12px 25px}.btn-primary a,.btn-primary table td{background-color:#3498db}.btn-primary a{border-color:#3498db;color:#fff}.align-right{text-align:right}.align-left{text-align:left}.preheader{color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}hr{border:0;border-bottom:1px solid #f6f6f6;Margin:20px 0}@media only screen and (max-width:620px){table[class=body] h1{font-size:28px!important;margin-bottom:10px!important}table[class=body] a,table[class=body] ol,table[class=body] p,table[class=body] span,table[class=body] td,table[class=body] ul{font-size:16px!important}table[class=body] .article,table[class=body] .wrapper{padding:10px!important}table[class=body] .content{padding:0!important}table[class=body] .container{padding:0!important;width:100%!important}table[class=body] .main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}table[class=body] .btn a,table[class=body] .btn table{width:100%!important}table[class=body] .img-responsive{height:auto!important;max-width:100%!important;width:auto!important}}@media all{.btn-primary a:hover,.btn-primary table td:hover{background-color:#34495e!important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}.btn-primary a:hover{border-color:#34495e!important}}
    </style>
  </head>
  <body>
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
            <span class="preheader">Bazaarplace.com</span>

            <?php
            $order = $this->m_model->selectas('id', $orders_store, 'orders_store');
            if (count($order) > 0) {
                foreach ($order as $key => $value) {
                    $orders = $this->m_model->selectas('id', $value->orders, 'orders');
                    if (count($orders) > 0) {
            ?>

            <table class="main">
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <img src="http://bazaarplace.com/images/logo-bzaarplace-03.png" style="width: 150px;">
                        <h2 style="float: right;">Invoice<br><span style="font-size: 15px;"># <?= $orders[0]->ref; ?></span></h2>
                       <hr style="border-width: 1px;color:gray;line-height:1; width:100%;">
                        <!-- // -->

                        <table class="table no-border">
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

                        <br>

                        <table style="border: none;  border-spacing: 0px;">
                            <tr style="background: #333; border-radius: 3px; color: #FFF; font-weight: bold;">
                                <td style="width: 65%;">Item</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                            </tr>

                            <?php
                              $orders = $this->m_model->selectas('orders_store', $value->id, 'orders_detail');
                              if (count($orders) > 0) {
                                $subtotal = 0;
                                foreach ($orders as $keys => $values) {
                                $discount = 0;
                                $discount = $values->discount;
                                $productStore = $this->m_model->selectas('id', $values->product_store, 'product_store');
                                if (count($productStore) > 0) {
                                  $shipping = $value->shipping_cost;
                                  $product_detail = $this->m_model->selectaslang('product', $productStore[0]->product, 'product_lang');
                                  $product_image = $this->m_model->selectas('product', $productStore[0]->product, 'product_image');
                                  if (count($product_image) > 0) {
                                    $img = site_url('images/product/').$product_image[0]->small;
                                  } else {
                                    $img = site_url('images/product/images.jpeg');
                                  }
                                  $subtotal += ($values->price * $values->quantity)-$discount;
                            ?>
                              <tr>
                                <td>
                                  <div class="product-item">
                                    <a class="product-thumb" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>">
                                      <img src="<?= $img; ?>" style="width:60px; float:left; padding-right:5px;" alt="Product">
                                    </a>
                                    <div class="product-info" style="padding-top:15px;">
                                      <h4 class="product-title" style="padding-bottom:0px;">
                                        <a style="color:gray; text-decoration:none;" href="<?= site_url('product/detail/').$product_detail[0]->seo; ?>">
                                          <?= $product_detail[0]->title; ?>
                                        </a>
                                      </h4>
                                      <span>
                                        <em><?=$this->lang->line('keterangan');?>: </em> 
                                         <?= $values->note; ?>
                                      </span>
                                    </div>
                                  </div>
                                </td>
                                <td class="text-center text-lg" style="padding-top:15px; text-align:center;"><?= $values->quantity; ?></td>
                                <td class="text-center text-lg" style="padding-top:15px;"><?= 'Rp '.number_format(($values->price * $values->quantity)-$discount); ?></td>
                              </tr>
                            <?php 
                                if($discount>0){
                            ?>
                              <tr>
                                <td>
                                  <div class="product-info">
                                    <h6 class="product-title" style="color:gray; margin: 0px;padding: 0px;">
                                        <i>Discount</i>
                                    </h6>
                                  </div>
                                </td>
                                <td class="text-center text-lg"></td>
                                <td class="text-center text-lg" style="color:red;">-<?= 'Rp '.number_format($discount); ?></td>
                              </tr>
                            <?php
                                }
                            }}}
                            ?>
                        </table>

                        <table class="table no-border" style="border-top:1px #DDD solid; padding-top: 15px;">
                          <tr>
                            <td>Subtotal</td>
                            <td>Shipping</td>
                            <td><b>Total</b></td>
                          </tr>
                          <tr>
                            <td><?= 'Rp '.number_format($subtotal); ?></td>
                            <td><?= 'Rp '.number_format($shipping); ?></td>
                            <td><b><?= 'Rp '.number_format($subtotal + $shipping); ?></b></td>
                          </tr>
                        </table>

                        <br>
                        <div style="background: #FAFAFA; width: 100%; height: 30px; padding-top: 15px;">
                        <p style="color:#999;line-height:1.5; text-align: center;">
                        2019 © Bazaarplace.com
                        </p>
                        </div>
                        <!-- // -->
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <?php } } } ?>
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>