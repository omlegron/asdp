<?php $this->load->view('frontend/layout/header'); ?>

	<div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php include 'sidebar.php'; ?>
          <div class="col-lg-9">

          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <h5 class="card-title"><?=$this->lang->line('Orders Report');?></h5>
          <form action="" method="get">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <select id="ls_month" class="form-control" name="month">
                  <?php
                  $month=date('n');
                  $year=date('Y');
                  $month_query=date('m');
                  if($this->input->get('month')){
                    $month=$this->input->get('month');
                    $month_query=$this->input->get('month');
                  }
                  if($this->input->get('year')){
                    $year=$this->input->get('year');
                  }
                  foreach (get_month() as $key => $value) {
                    # code...
                  ?>
                    <option value="<?=$key;?>" <?php if($key==$month) echo 'selected="selected"';?> ><?=$value;?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-sm-6 col-md-3">
                <!--<input class="form-control" type="hidden" name="year" value="<?= date("Y"); ?>">-->
                <select id="year" class="form-control" name="year">
                    <option value="<?= date("Y", strtotime("+1 years")); ?>"><?= date("Y", strtotime("+1 years")); ?></option>
                    <option value="<?= date("Y"); ?>" selected><?= date("Y");?></option>
                    <option value="<?= date("Y", strtotime("-1 years")); ?>"><?= date("Y", strtotime("-1 years")); ?></option>
                </select>
                <!--<input class="form-control" type="text" name="year_display" value="<?= date("Y"); ?>" disabled>-->
              </div>
            </div>
          </form>

<?php
  $checkStore = $this->m_model->selectas('user', $this->session->userdata('user'), 'store');
  $grand_total=0;
  if (count($checkStore) > 0) {
    //$ordersStore = $this->m_model->selectas('store', $checkStore[0]->id, 'orders_store', 'orders', 'DESC');
    $sql_ordersStore="select A.* 
                      from orders_store A 
                      join orders B on (A.orders = B.id)
                      where MONTH(created) = '".$month_query."' && YEAR(created) = '".$year."' && store='".$checkStore[0]->id."' 
                      order by A.orders DESC";
    $ordersStore = $this->m_model->selectcustom($sql_ordersStore);
    ?>
    <div class="table-responsive">
            <table class="table table-hover margin-bottom-none">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center"><?=$this->lang->line('Date');?></th>
                  <th class="text-center"><?=$this->lang->line('Product');?></th>
                  <th class="text-center"><?=$this->lang->line('Quantity');?></th>
                  <th class="text-center"><?=$this->lang->line('Buyer');?></th>
                  <th class="text-center"><?=$this->lang->line('Price');?></th>
                </tr>
              </thead>
              <tbody>
    <?php
    if (count($ordersStore) > 0) {
      //echo count($ordersStore);
      $i_number=0;
        foreach ($ordersStore as $key_order => $valueStore) {
          $subtotal = 0;
          $orders = $this->m_model->selectas3('id', $valueStore->orders, 'MONTH(created)', $month_query, 'YEAR(created)', $year, 'orders');
          $orderDetail = $this->m_model->selectas('orders_store', $valueStore->id, 'orders_detail');
          if (count($orders) > 0 && count($orderDetail) > 0) {
            foreach ($orderDetail as $key => $valueDetail) {
              $subtotal += $valueDetail->price * $valueDetail->quantity;
              $grand_total+=$subtotal;

            $product_store = $this->m_model->selectas('id', $orderDetail[0]->product_store, 'product_store');
            $img = site_url('images/images.jpeg');
            $name_product="-";
            if (count($product_store) > 0) {
              $product_image = $this->m_model->selectas('product', $product_store[0]->product, 'product_image');
              $product_lang = $this->m_model->selectas('product', $product_store[0]->product, 'product_lang');
              if (count($product_image) > 0) {
                $img = site_url('images/product/').$product_image[0]->small;
              } else {
                $img = site_url('images/images.jpeg');
              }

              if(count($product_lang)>0){
                $name_product=$product_lang[0]->title;
              }
            }

            $user = $this->m_model->selectas('id', $orders[0]->user, 'user');
            if (count($user) > 0) {
              $users = $user[0]->name;
            } else {
              $users = 'not found';
            }
            
      ?>
      <tr>
        <td class="text-center"><?= ++$i_number; ?></td>
        <td class="text-center"><?= substr($orders[0]->created, 0, -9); ?></td>
        <td>
          <img src="<?=$img;?>" style="width: 50px; height: 50px;">
          <?=   $name_product ?>
        </td>
        <td class="text-center"><?= number_format($valueDetail->quantity); ?></td>
        <td class="text-center"><?= $users;?></td>
        <td class="text-right"><?= 'Rp '.number_format($subtotal); ?></td>
      </tr>
<?php   }
      }
    }
  }
?>
         <tr>
          <th class="text-right" colspan="5" style="border-top:1px solid #333;"><?=$this->lang->line('Total');?></th>
          <th class="text-right" style="border-top:1px solid #333;"><?= 'Rp '.number_format($grand_total); ?></th>
        </tr>
      </tbody>
    </table>
  </div>
<?php
}
?>


          </div>
        </div>
      </div>
      
      
    </div>

    <script>
      $('#ls_month').change(function(){
          $(this).parents('form').submit();
      });
      $('#year').change(function(){
          $(this).parents('form').submit();
      });
    </script>
    <?php
      if($this->input->get('year')){
    ?>
        <script type="text/javascript">
          $('#year').val('<?=$this->input->get('year');?>')
        </script>
    <?php
      }
    ?>

<?php $this->load->view('frontend/layout/footer'); ?>