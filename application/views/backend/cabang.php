<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { //die("asdasd");?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Pelabuhan</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Cabang</label>
                                        <input type="text" class="form-control" id="name" placeholder="Merak" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control show-tick" required>
                                        <option value="1">Active</option>
                                        <option value="0">UnActive</option>
                                    </select>
                                </div>
                                <!--<div class="form-group col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail Logo</label>
                                        <input name="thumbnail_logo" type="file" class="form-control">
                                    </div>
                                </div>-->
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
                        <h2>Edit Cabang</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne(cleartext($this->input->get('edit')), 'cabangs');
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden" value="<?= isset($val['id']) ? $val['id'] : ''; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Cabang</label>
                                        <input type="text" class="form-control" id="name" placeholder="Merak" name="name" required value="<?=isset($val['name']) ? $val['name']: '';?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control show-tick" required>
                                        <?php
                                            $sel = '';
                                            $sel1 = '';
                                            if(isset($val['status'])){
                                                if($val['status'] == 1){
                                                    $sel = 'selected';
                                                }elseif($val['status'] == 0){
                                                    $sel1 = 'selected';
                                                }
                                            }
                                        ?>
                                        <option value="1" <?php echo $sel; ?>>Active</option>
                                        <option value="0" <?php echo $sel1; ?>>UnActive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>

                        
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
                                <h2>List Cabang</h2>
                            </div>
                            <div class="col-lg-2">
                                <?php
                                    if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                ?>
                                <?php
                                    }else{
                                ?>
                                    <a class="btn btn-primary" href="<?= site_url('panel/cabang?add=true'); ?>">Add Cabang</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cabang</th>
                                    <th>Status</th>                             
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cabang = $this->session->userdata("admin_data")->id_cabang;
                            if(isset($this->session->userdata("admin_data")->id_cabang) && ($this->session->userdata("admin_data")->id_cabang != 0)){
                                $data = $this->m_model->selectcustom("select * from cabangs where id ='$cabang'");
                            }else{
                                $data = $this->m_model->selectcustom("select * from cabangs");
                            }
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    switch ($value->status) {
                                        case 1:
                                            # code...
                                            $status="<span class='text-success'>Active</span>";
                                            $act_status='<a class="confirm badge badge-danger" msg="Do you want to Edit status?" href="'.site_url('panel/cabang?id='.$value->id.'&status=unactive').'">Unactive</a';
                                            break;
                                        case 0:
                                            # code...
                                            $status="<span class='text-danger'>Inactive</span>";
                                            $act_status='<a class="confirm badge badge-success" msg="Do you want to Edit status?" href="'.site_url('panel/cabang?id='.$value->id.'&status=active').'">Active</a';
                                            break;
                                        
                                        default:
                                            $status="<span class='text-danger'>Inactive</span>";
                                            $act_status='<a class="confirm badge badge-success" msg="Do you want to Edit status?" href="'.site_url('panel/cabang?id='.$value->id.'&status=active').'">Active</a';
                                            # code...
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $value->name; ?>
                                    </td>
                                    <td><?= $status; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/cabang?edit=').$value->id; ?>">Edit</a>
                                        <?php
                                              if(($this->session->userdata('admin_data')->roles == 1) || ($this->session->userdata('admin_data')->roles == 2)){
                                        ?>
                                                <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/cabang?remove=').$value->id; ?>">Delete</a>
                                        <?php
                                            }
                                        ?>
                                        <?=$act_status;?>
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