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
  $checkStore = $this->m_model->selectas('user', $this->session->userdata('user'), 'store');
  if (count($checkStore) > 0) {
    //$orders = $this->m_model->selectas('agent', $checkStore[0]->id, 'orders_detail', 'orders', 'DESC');
    $numLimit=5;
    if(!$this->input->get('page')){
        $page=1;
        $numStart=($numLimit*$page)-$numLimit;
    }
    else{
        $page=$this->input->get('page');
        $numStart=($numLimit*$page)-$numLimit;
    }
    $query_ordersStore="select * from orders_detail where agent='".$checkStore[0]->id."'";
    $order_by=" order by orders DESC ";
    $limit='LIMIT '.$numStart.', '.$numLimit;
    $orders = $this->m_model->selectcustom($query_ordersStore.$order_by.$limit);
    $TotalOfProduct=TotalOfProduct($query_ordersStore);
    $TotalOfPage=TotalOfPage($TotalOfProduct,  $numLimit);
    if (count($orders) > 0) {
?>
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?=$this->lang->line('Date');?></th>
                    <th><?=$this->lang->line('Product');?></th>
                    <th><?=$this->lang->line('Supplier');?></th>
                    <!--<th>Customer</th>-->
                    <th><?=$this->lang->line('Price');?></th>
                    <th><?=$this->lang->line('Profit');?></th>
                    <th><?=$this->lang->line('Status');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($orders as $key => $value) {
                      $orders = $this->m_model->selectas('id', $value->orders, 'orders');
                      $orders_store = $this->m_model->selectas('id', $value->orders_store, 'orders_store');

                      if (count($orders) > 0 && count($orders_store) > 0) {
                        /*$store = $this->m_model->selectas('id', $value->agent, 'store');
                        if (count($store) > 0) {
                          $store = $store[0]->brand;
                        } else {
                          $store = 'not found';
                        }*/

                        $user = $this->m_model->selectas('id', $orders[0]->user, 'user');
                        if (count($user) > 0) {
                          $users = $user[0]->name;
                        } else {
                          $users = 'not found';
                        }

                        $product_store = $this->m_model->selectas('id', $value->product_store, 'product_store');
                        if (count($product_store) > 0) {
                          $product_image = $this->m_model->selectas('product', $product_store[0]->product, 'product_image');
                          $product_lang = $this->m_model->selectas('product', $product_store[0]->product, 'product_lang');
                          if (count($product_image) > 0) {
                            $img = site_url('images/product/').$product_image[0]->small;
                          } else {
                            $img = site_url('images/product/images.jpeg');
                          }
                          //get_supplier product dari table product->store
                          $q_supplier="select B.*
                                        from product A 
                                        join store B on (B.id = A.store)
                                        where A.id = ".$product_store[0]->product;
                          $data_supplier = $this->m_model->selectcustom($q_supplier);
                          if(count($data_supplier)>0){
                            $store_supplier=$data_supplier[0]->brand;
                          }
                          else{
                            $store_supplier="-";
                          }
                  ?>
                  <tr>
                    <td>
                      <?= ($key+1)+$numStart;?>
                    </td>
                    <td><?= substr($orders[0]->created, 0, -9); ?></td>
                    <td style="max-width: 200px;">
                      <img src="<?= $img; ?>" style="width: 50px; height: 50px;">
                      <a target="_blank" href="<?= site_url('product/detail/'.$value->product_store.'/').$product_lang[0]->seo; ?>" style="text-decoration: none;">
                        <?= $product_lang[0]->title; ?>
                      </a> 
                    </td>
                    <td>
                      <!--<a target="_blank" href="#" style="text-decoration: none;">-->
                        <?= $store_supplier; ?>
                      <!--</a> -->
                    </td>
                    <!--<td>
                      <a target="_blank" href="#" style="text-decoration: none;">
                        <?= $users; ?>
                      </a> 
                    </td>-->
                    <td><?= 'Rp'.number_format($value->price); ?></td>
                    <td><?= 'Rp'.number_format($value->price - $value->price_basic); ?></td>
                    <td><?php
                    switch ($orders_store[0]->orders_status) {
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
                        echo '<span class="badge badge-warning badge-pill">'.$this->lang->line('Canceled').'</span>';
                        break;
                      default:
                        # code...
                        break;
                    }
                    ?></td>
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
                        <a class="page-link" href="<?= site_url('marketer/?page='.$page_i);?>">
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
                <h3 class="card-title"><?=$this->lang->line('msg_no_order');?></h3>
                <div class="padding-top-1x padding-bottom-1x">
                  <!-- <a class="btn btn-outline-secondary" href="<?= site_url('marketer/product'); ?>">Add Product</a> -->
                  <a class="btn btn-outline-secondary" href="<?= site_url('product'); ?>"><?=$this->lang->line('Add Product');?></a>
                </div>
              </div>
            </div>

<?php } } else { ?>
            <div class="card text-center margin-top-1x">
              <div class="card-body padding-top-2x">
                <h3 class="card-title"><?=$this->lang->line('Your product is empty!');?></h3>
                <div class="padding-top-1x padding-bottom-1x">
                  <a class="btn btn-outline-secondary" href="<?= site_url('marketer/store?add=true'); ?>"><?=$this->lang->line('Create Store');?></a>  
                </div>
              </div>
            </div>
<?php } ?>


          </div>
        </div>
      </div>
      
      
    </div>

<?php $this->load->view('frontend/layout/footer'); ?>
