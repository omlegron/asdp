<?php
$voucher_all = array();
$voucher_product = array();
$voucher_desc = array();
$voucher_all = $this->m_model->selectas('product', 0, 'voucher_detail');
$produk_cart=implode(',', $list_produk_cart);
foreach ($list_produk_cart as $key => $value_produk_id) {
  # code...
  $voucher_product = $this->m_model->selectas('product', $value_produk_id, 'voucher_detail');
}
?>
<label class="form-label"><?=$this->lang->line('Voucher');?></label> <label id="lbl_valid"></label>
<input type="text" class="form-control" name="voucher" max="30" placeholder="<?=$this->lang->line('Please check');?>!">

<script type="text/javascript">
  function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }

  function val_percent(percent, subtotal) {
    discount=subtotal*percent/100;
    return discount;
  }
  
  $(document).on('keyup', 'input[name=voucher]', function(e){
    baseurl='<?= base_url();?>'
    dataMap={}
    dataMap['voucher']=$(this).val();
    if(dataMap['voucher'] == "" || dataMap['voucher'] == null){
      $('#lbl_valid').html('')
      return;
    }

    dataMap['ls_produk']=<?php echo json_encode($list_produk_cart); ?>;
    dataMap['amount_subtotal']=$('#lbl_subtotal').attr('pure_subtotal');
    $.post(baseurl+'cart/check_voucher', dataMap, function(data){
      json=$.parseJSON(data);
      product=[];
      kuota=0;
      $.each(json.voucher, function(i, item){
         product.push(item.product)
        type_voucher=item.variant;
        minimalAmount=item.minimal;
        kuota=item.kuota;
        value=item.value;
      })

      if(json.valid == 1){
        var btn='<div id="btn_apply_voucher" class="badge btn-primary" style="cursor:pointer;" voucher_id="'+dataMap['voucher']+'" type_voucher="'+type_voucher+'" value_voucher="'+value+'" product="'+product+'">Apply</div>'
        $('#lbl_valid').html('<i class="icon-check-circle text-success"> </i> '+btn)
      }
      else if(json.valid == 2){
        $('#lbl_valid').html('<i class="icon-check-circle text-danger"> </i>only for Min. Purchase '+"Rp "+numberWithCommas(minimalAmount))
      }
      else if(json.valid == 3){
        $('#lbl_valid').html('<i class="icon-x-circle text-danger"> </i> Oops, Unfortunately')
      }
      else{
        $('#lbl_valid').html('<i class="icon-x-circle text-danger"></i>')
      }
    })
  })

  $(document).on('click', '[id=btn_apply_voucher]', function(e){
    baseurl='<?= base_url();?>'
    $(this).removeAttr('id');
    dataMap={}
    dataMap['voucher']=$(this).attr('voucher_id');
    dataMap['product']=$(this).attr('product');
    dataMap['type_voucher']=$(this).attr('type_voucher');
    dataMap['value_voucher']=$(this).attr('value_voucher');
    dataMap['subtotal']=$('#lbl_subtotal').attr('pure_subtotal');
    dataMap['subtotal_wo_voucher']=$('#lbl_subtotal').attr('subtotal_wo_voucher');
    $.post(baseurl+'cart/apply_voucher', dataMap, function(data){
      json=$.parseJSON(data);
      dataMap['total_discount']=json.total_discount;
      if(json.success > 0){
        calculate_payment(dataMap);
      }
      $('#lbl_valid').html('');
    })
  })

  function calculate_payment(datavoucher){
      subtotal_wo_voucher=parseInt(datavoucher['subtotal_wo_voucher']);
      total_discount=parseInt(datavoucher['total_discount']);
      $('#row_voucher').show();
      $('#lbl_coupon').html(datavoucher['voucher']);

      if(datavoucher['type_voucher'] == 1){// == 1 untuk variant/type voucher percent
        var lbl_percent="  ("+datavoucher['value_voucher']+"%)"
        $('#lbl_coupon').append(lbl_percent);
      }

      $('#lbl_value').html("-Rp "+numberWithCommas(datavoucher['total_discount']));
      subtotal_wo_voucher=subtotal_wo_voucher-parseInt(datavoucher['total_discount']);
      $('#lbl_subtotal').html("Rp "+numberWithCommas(subtotal_wo_voucher));
  }
</script>