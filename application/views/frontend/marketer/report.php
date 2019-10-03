<?php $this->load->view('frontend/layout/header'); ?>

	<div class="offcanvas-wrapper padding-top-2x">

      <div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">

          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <h5 class="card-title"><?=$this->lang->line('Orders Report');?></h5>
          <form action="" method="get">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <select id="ls_month" class="form-control" name="month">
                  <?php
                  $month=date('n');
                  $month_query=date('m');
                  $year=date('Y');
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
                <!--<input class="form-control" type="hidden" name="year" value="<?= date("Y"); ?>">
                <input class="form-control" type="text" name="year_display" value="<?= date("Y"); ?>" disabled>-->
                <select id="year" class="form-control" name="year">
                    <option value="<?= date("Y", strtotime("+1 years")); ?>"><?= date("Y", strtotime("+1 years")); ?></option>
                    <option value="<?= date("Y"); ?>" selected><?= date("Y");?></option>
                    <option value="<?= date("Y", strtotime("-1 years")); ?>"><?= date("Y", strtotime("-1 years")); ?></option>
                </select>
              </div>
            </div>
          </form>

<?php
  $checkStore = $this->m_model->selectas('user', $this->session->userdata('user'), 'store');
  if (count($checkStore) > 0) {
    //$orders = $this->m_model->selectas('agent', $checkStore[0]->id, 'orders_detail', 'orders', 'DESC');
    $sql_OrderDetail="select A.*, SUM(A.quantity) as sum_quantity
                      from orders_detail A 
                      join orders B on (A.orders = B.id)
                      join orders_store C on (C.orders = B.id)
                      where MONTH(created) = '".$month_query."' && YEAR(created) = '".$year."' && agent='".$checkStore[0]->id."' && C.orders_status=3
                      group by A.product_store
                      order by A.orders DESC";
                      //orders_status=3 adalah complete jadi masuk kedalam laporan yang orders_status = 3
    $orders = $this->m_model->selectcustom($sql_OrderDetail);
    $grand_profit=0;
    ?>
    <div class="table-responsive">
        <table class="table table-hover margin-bottom-none">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center"><?=$this->lang->line('Product');?></th>
              <th class="text-center"><?=$this->lang->line('Price');?></th>
              <th class="text-center"><?=$this->lang->line('Quantity');?></th>
              <th class="text-center"><?=$this->lang->line('Profit');?></th>
              <th class="text-center"><?=$this->lang->line('Subtotal');?> <?=$this->lang->line('Profit');?></th>
            </tr>
          </thead>
          <tbody>
    <?php
    if (count($orders) > 0) {
              $i_number=0;
              foreach ($orders as $key => $value) {
                $Subtotal_profit=0;
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
                  $Subtotal_profit=($value->price - $value->price_basic) * $value->sum_quantity;
                  $grand_profit+=$Subtotal_profit;
          ?>
              <tr>
                <td class="text-center">
                  <?= ++$i_number;?>
                </td>
                <td style="max-width: 200px;">
                  <img src="<?= $img; ?>" style="width: 50px; height: 50px;">
                  <a target="_blank" href="<?= site_url('product/detail/'.$value->product_store.'/').$product_lang[0]->seo; ?>" style="text-decoration: none;">
                    <?= $product_lang[0]->title; ?>
                  </a> 
                  <br>
                  Store: 
                  <?= $store_supplier; ?>
                </td>
                <td class="text-right"><?= 'Rp '.number_format($value->price); ?></td>
                <td class="text-right"><?= number_format($value->sum_quantity); ?></td>
                <td class="text-right"><?= 'Rp '.number_format($value->price - $value->price_basic); ?></td>
                <td class="text-right">
                  <?= 'Rp '.number_format($Subtotal_profit); ?>
                </td>
              </tr>
        <?php 
            }
          }
        }
          ?>
                  <tr>
                    <th class="text-right" colspan="5" style="border-top:1px solid #333;"><?=$this->lang->line('Total');?></th>
                    <th class="text-right" style="border-top:1px solid #333;"><?= 'Rp '.number_format($grand_profit); ?></th>
                  </tr>
          </tbody>
        </table>
        <label class="text-danger">*<?=$this->lang->line('msg_potong_20_percent');?></label>
      </div>

          </div>
        </div>
      </div>
<?php
}
?>
      
      
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