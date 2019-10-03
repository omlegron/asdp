<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { //die("asdasd");?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Business Creator</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Supplier</label>
                                        <select id="validateSelect" name="supplier" class="select2 form-control validate[required]" required>
                                            <option value="" selected="selected" disabled="">
                                                Choose
                                            </option>
                                            <?php
                                                $supplier = $this->m_model->selectas('marketer', '0', 'store', 'brand', 'ASC');
                                                if (count($supplier) > 0) {
                                                    foreach ($supplier as $key_supplier => $value_supplier) {
                                                        $selected="";
                                            ?>
                                                            <option value="<?= $value_supplier->id; ?>" <?=$selected;?>>
                                                                <?= $value_supplier->brand; ?>
                                                            </option>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product</label>
                                        <select id="product_store" name="product_store" class="select2 form-control validate[required]" required>
                                            <option value="" selected="selected" disabled="">
                                                Choose
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Agent</label>
                                        <select id="validateSelect" name="user_agent" class="select2 form-control validate[required]" required>
                                            <option value="" selected="selected" disabled="">
                                                Choose
                                            </option>
                                        <?php
                                            $sql_agent="select A.id as user_id, A.name, B.brand, B.id as brand_id
                                                        from user A 
                                                        join store B on (B.user = A.id)
                                                        where B.marketer='1'
                                                        order by A.name ASC";
                                            $agent = $this->m_model->selectcustom($sql_agent);
                                            if (count($agent) > 0) {
                                                foreach ($agent as $key_agent => $value_agent) {
                                                    $selected="";
                                        ?>
                                                        <option value="<?= $value_agent->user_id; ?>" <?=$selected;?>>
                                                            <?= $value_agent->name." (".$value_agent->brand.")"; ?>
                                                        </option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form-float">
                                        <label class="form-label">Fee (% example 2.75)</label>
                                        <input name="fee" type="text" class="form-control" placeholder="2.75 (decimal with point(.))" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group form-float">
                                        <label class="form-label">Catatan</label>
                                        <textarea class="form-control" name="keterangan" placeholder="Keterangan dari perjajian Business Creator"></textarea>
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
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Save" class="btn btn-block btn-primary">
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
                        <h2>Edit Business Creator</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'business_creator');
                        if (count($val)) {
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Supplier</label>
                                        <select id="validateSelect" name="supplier" class="select2 form-control validate[required]" required>
                                            <option value="" selected="selected" disabled="">
                                                Choose
                                            </option>
                                        <?php
                                            $supplier = $this->m_model->selectas('marketer', '0', 'store', 'brand', 'ASC');
                                            if (count($supplier) > 0) {
                                                foreach ($supplier as $key_supplier => $value_supplier) {
                                                    $selected="";
                                                    if($val[0]->store_id_supplier == $value_supplier->id){
                                                        $selected="selected='selected'";
                                                    }
                                        ?>
                                                        <option value="<?= $value_supplier->id; ?>" <?=$selected;?>>
                                                            <?= $value_supplier->brand; ?>
                                                        </option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product</label>
                                        <select id="product_store" name="product_store" class="select2 form-control validate[required]" required>
                                            <option value="" selected disabled="">
                                                Choose
                                            </option>
                                        <?php
                                            //get_product
                                            $product_store=$this->m_model->selectas('store', $val[0]->store_id_supplier, 'product_store');
                                            $name_product="";
                                            if(count($product_store)>0){
                                                foreach ($product_store as $keyproduct_store => $valueproduct_store) {
                                                    $selected='';
                                                    # code...
                                                    $product_lang=$this->m_model->selectas('product', $valueproduct_store->product, 'product_lang');
                                                    if(count($product_lang)>0){
                                                        if($valueproduct_store->id == $val[0]->product_store_id){
                                                            $selected='selected';
                                                        }
                                                        echo $name_product='<option value="'.$valueproduct_store->id.'" '.$selected.'>'.$product_lang[0]->title.'</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    //$('#product_store').val('<?=$val[0]->product_store_id;?>')
                                </script>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Agent</label>
                                        <select id="validateSelect" name="user_agent" class="select2 form-control validate[required]" required>
                                            <option value="" selected="selected" disabled="">
                                                Choose
                                            </option>
                                        <?php
                                            $sql_agent="select A.id as user_id, A.name, B.brand, B.id as brand_id
                                                        from user A 
                                                        join store B on (B.user = A.id)
                                                        where B.marketer='1'
                                                        order by A.name ASC";
                                            $agent = $this->m_model->selectcustom($sql_agent);
                                            if (count($agent) > 0) {
                                                foreach ($agent as $key_agent => $value_agent) {
                                                    $selected="";
                                                    if($val[0]->user_id_agent == $value_agent->user_id){
                                                        $selected="selected='selected'";
                                                    }
                                        ?>
                                                        <option value="<?= $value_agent->user_id; ?>" <?=$selected;?>>
                                                            <?= $value_agent->name." (".$value_agent->brand.")"; ?>
                                                        </option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group form-float">
                                        <label class="form-label">Fee (% example 2.75)</label>
                                        <input name="fee" type="text" class="form-control" value="<?= $val[0]->fee; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group form-float">
                                        <label class="form-label">Catatan</label>
                                        <textarea class="form-control" name="keterangan"><?=$val[0]->keterangan;?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Start Date</label>
                                        <input name="start" type="text" class="datepickers form-control" placeholder="Start Date" value="<?php if($val[0]->start != '0000-00-00') { echo convert_time_dmy($val[0]->start); } ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">End Date</label>
                                        <input name="end" type="text" class="datepickers form-control" placeholder="End Date" value="<?php if($val[0]->end != '0000-00-00') { echo convert_time_dmy($val[0]->end); } ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" <?php if ($val[0]->status == 1) { echo "selected"; } ?>>Active</option>
                                            <option value="0" <?php if ($val[0]->status == 0) { echo "selected"; } ?>>Inactive</option>
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
                                <h2>Business Creator</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/business_creator?add=true'); ?>">Add Business Creator</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Supplier/Product</th>
                                    <th>Agent</th>
                                    <th>Fee (%)</th>
                                    <th>Status</th>                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $business_creator = $this->m_model->select('business_creator');
                            $supplier="Unknown";
                            $agent_store="Unknown";
                            $agent="Unknown";
                            $status="<span class='text-danger'>Inactive</span>";
                            if (count($business_creator) > 0) {
                                foreach ($business_creator as $key => $value) {
                                    //inisiasi awal dulu
                                    $supplier="Unknown";
                                    $agent_store="Unknown";
                                    $agent="Unknown";
                                    $status="<span class='text-danger'>Inactive</span>";

                                    $supplier=$this->m_model->selectas('id', $value->store_id_supplier, 'store');
                                    $agent=$this->m_model->selectas('id', $value->user_id_agent, 'user');
                                    if(count($supplier)>0){
                                        $supplier=$supplier[0]->brand;
                                    }else{
                                            $supplier="Unknown";
                                    }

                                    if(count($agent)>0){
                                        $agent_store=$this->m_model->selectas('user', $agent[0]->id, 'store');
                                        $agent=$agent[0]->name;
                                        if(count($agent_store)>0){
                                            $agent_store=$agent_store[0]->brand;
                                        }else{
                                            $agent_store="Unknown";
                                        }
                                    }else{
                                            $agent="Unknown";
                                    }

                                    switch ($value->status) {
                                        case 1:
                                            # code...
                                            $status="<span class='text-success'>Active</span>";
                                            break;
                                        case 2:
                                            # code...
                                            $status="<span class='text-danger'>Inactive</span>";
                                            break;
                                        
                                        default:
                                            $status="<span class='text-danger'>Inactive</span>";
                                            # code...
                                            break;
                                    }
                                    //get_product
                                    $product_store=$this->m_model->selectas('id', $value->product_store_id, 'product_store');
                                    $name_product="";
                                    if(count($product_store)>0){
                                        $product_lang=$this->m_model->selectas('product', $product_store[0]->product, 'product_lang');
                                        if(count($product_lang)>0){
                                            $name_product='<option value="'.$product_store[0]->product.'">'.$product_lang[0]->title.'</option>';
                                        }
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <b>Toko: </b>
                                        <?= $supplier; ?>
                                        <br>
                                        <b>Product: </b>
                                        <?= $name_product; ?>
                                    </td>
                                    <td><?= $agent." (".$agent_store.")"; ?></td>
                                    <td><?= $value->fee; ?></td>
                                    <td><?= $status; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/business_creator?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/business_creator?remove=').$value->id; ?>">Delete</a>
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

$(document).on('change', '[name=supplier]', function(){
    dataMap={};
    dataMap['store_id']=$(this).val();
    $.post('<?=base_url();?>ajax/product_store', dataMap, function(data){
        $('#product_store').html(data)
    })
})

$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>