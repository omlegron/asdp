<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { //die("asdasd");?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Voucher</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Voucher Name">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Cupon</label>
                                        <input name="code" type="text" class="form-control" placeholder="Cupon Code">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Min Buy</label>
                                        <input name="min" type="number" class="form-control" placeholder="Minimal">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Start Date</label>
                                        <input name="start" type="text" class="datepickers form-control" placeholder="Start Date">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">End Date</label>
                                        <input name="end" type="text" class="datepickers form-control" placeholder="End Date">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Quota</label>
                                        <input name="kuota" type="number" class="form-control" placeholder="1 until 9999999">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Voucher Value</label>
                                        <input name="value" type="number" class="form-control" placeholder="Price Value / Percent Value">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Voucher Type</label>
                                        <div style="margin-top: 5px;">
                                            <input name="type" value="0" type="radio" id="radio_1" checked="">
                                            <label for="radio_1" style="padding-right: 15px;">Price</label>
                                            <input name="type" value="1" type="radio" id="radio_2">
                                            <label for="radio_2">Percent</label>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Free Shipping</label>
                                        <div style="margin-top: 5px;">
                                            <input name="shipping" value="0" type="radio" id="radio_4" checked="">
                                            <label for="radio_4" style="padding-right: 15px;">No</label>
                                            <input name="shipping" value="1" type="radio" id="radio_5">
                                            <label for="radio_5">Free</label>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Products</label>
                                        <div>
                                            <input name="product_all" value="0" type="checkbox" id="type_product">
                                            <label for="type_product">All</label>
                                        </div>
                                        <select id="validateSelect" name="product[]" class="form-control select-multiple" multiple="multiple">
                                        <?php
                                            $product = $this->m_model->select('product');
                                            if (count($product) > 0) {
                                                foreach ($product as $key => $value) {
                                                    $product_store = $this->m_model->selectas('product', $value->id, 'product_store');
                                                    foreach ($product_store as $key => $valueStore) {
                $product_detail = $this->m_model->selectaslang('product', $value->id, 'product_lang');
                                        ?>
                                                        <option value="<?= $value->id; ?>"><?= $product_detail[0]->title; ?> </option>
                                        <?php 
                                                    }
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Voucher</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'voucher');
                        $products="";
                        if (count($val)) {
                            $voucher_detail=$this->m_model->selectas('voucher', $val[0]->id, 'voucher_detail');
                            $products=array();
                            foreach($voucher_detail as $val_detail){
                                $products[]=$val_detail->product;
                            }
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $val[0]->name; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Cupon</label>
                                        <input name="code" type="text" class="form-control" value="<?= $val[0]->coupon; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Min Buy</label>
                                        <input name="min" type="number" class="form-control" value="<?= $val[0]->minimal; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Start Date</label>
                                        <input name="start" type="text" class="datepickers form-control" value="<?= date('m/d/Y', strtotime($val[0]->started)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">End Date</label>
                                        <input name="end" type="text" class="datepickers form-control" value="<?= date('m/d/Y', strtotime($val[0]->ended)); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Quota</label>
                                        <input name="kuota" type="number" class="form-control" placeholder="1 until 9999999" value="<?= $val[0]->kuota;?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if ($val[0]->status == 1) { echo "selected"; } ?>>Active</option>
                                            <option value="0" <?php if ($val[0]->status == 0) { echo "selected"; } ?>>Nonactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Voucher Value</label>
                                        <input name="value" type="number" class="form-control" value="<?= $val[0]->value; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Voucher Type</label>
                                        <div style="margin-top: 5px;">
                                            <input name="type" value="0" type="radio" id="radio_1" <?php if ($val[0]->variant == 0) { echo "checked"; } ?>>
                                            <label for="radio_1" style="padding-right: 15px;">Price</label>
                                            <input name="type" value="1" type="radio" id="radio_2" <?php if ($val[0]->variant == 1) { echo "checked"; } ?>>
                                            <label for="radio_2">Percent</label>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Free Shipping</label>
                                        <div style="margin-top: 5px;">
                                            <input name="shipping" value="0" type="radio" id="radio_4" <?php if ($val[0]->shipping == 0) { echo "checked"; } ?>>
                                            <label for="radio_4" style="padding-right: 15px;">No</label>
                                            <input name="shipping" value="1" type="radio" id="radio_5" <?php if ($val[0]->shipping == 1) { echo "checked"; } ?>>
                                            <label for="radio_5">Free</label>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Products</label>
                                        <div>
                                            <input name="product_all" value="0" type="checkbox" id="type_product">
                                            <label for="type_product">All</label>
                                        </div>
                                        <select id="validateSelect" name="product[]" class="form-control select-multiple validate[required]" multiple="multiple">
                                        <?php
                                            $product = $this->m_model->select('product');
                                            if (count($product) > 0) {
                                                foreach ($product as $key => $value) {
                                                    $product_store = $this->m_model->selectas('product', $value->id, 'product_store');
                                                    foreach ($product_store as $key => $valueStore) {
                $product_detail = $this->m_model->selectaslang('product', $value->id, 'product_lang');
                                        ?>
                                                        <option value="<?= $value->id; ?>"><?= $product_detail[0]->title; ?></option>
                                        <?php 
                                                    }
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Voucher</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/voucher?add=true'); ?>">Add Voucher</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Voucher Name</th>
                                    <th>Cupon Code</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Quota</th>                                  
                                    <th>Status</th>                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $voucher = $this->m_model->select('voucher');
                            if (count($voucher) > 0) {
                                foreach ($voucher as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td><?= $value->coupon; ?></td>
                                    <td><?= $value->started; ?></td>
                                    <td><?= $value->ended; ?></td>
                                    <td class="text-right"><?= $value->kuota; ?></td>
                                    <td><?php
                                    switch ($value->status) {
                                      case '1':
                                        echo '<span class="badge badge-success">Active</span>';
                                        break;
                                      
                                      case '0':
                                        echo '<span class="badge badge-warning">Nonactive</span>';
                                        break;

                                      default:
                                        # code...
                                        break;
                                    }
                                    ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/voucher?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/voucher?remove=').$value->id; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<script>
$("#validateSelect > option").each(function() {
    $(this).siblings('[value="'+ this.value +'"]').remove();
});

$(document).on('click', '#type_product', function(){
    if($(this).prop('checked') == true && $(this).val().toLowerCase() == '0'){
        $('#validateSelect').prop("disabled", true);
        $('#validateSelect').val(null).trigger('change');
    }
    else{
        $('#validateSelect').prop("disabled", false);
    }
})
</script>

<?php
if($this->input->get('edit')){
    //js ini berjalan jika sedang mengakses method edit
    //print_r($products);
    //die();
    if(!in_array(0, $products) && $products!= ""){
?>
    <script type="text/javascript">
        json_product=<?= json_encode($products); ?>
        //alert(arr_product);
        $('#validateSelect').val(json_product);
        $('#validateSelect').trigger('change');
    </script>
<?php
    }
    else if(in_array(0, $products) && $products!= ""){
        //products == 0 bearti all products
?>
        <script type="text/javascript">
            $('#type_product').prop("checked", true);
            $('#validateSelect').prop("disabled", true);
            $('#validateSelect').val(null).trigger('change');
        </script>
<?php

    }
}
?>
<?php include 'footer.php'; ?>