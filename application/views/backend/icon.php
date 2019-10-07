<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Lib Scripts Plugin Js --> 

<script type="text/javascript">
    $(document).ready(function(){
        var no = $('#tabIc tr:last').data('no')+1;
        $(document).on('click','.addIc',function(){
            var appen = `<tr data-no="`+no+`">
                            <td>
                                <input type="text" class="form-control" name="ic_desc[`+no+`]" placeholder="Input Here ..." value="" style="height: 25px" required>
                            </td>
                            <td style="text-align: center;">
                                <div class="btn btn-danger btn-sm deleteRow">
                                    Delete
                                </div>
                            </td>
                        </tr>`;
            $('.appendIc').append(appen);
        });
        $(document).on('click', '.deleteRow', function (e){
            $(this).closest('tr').remove();
        });
    });

    $(document).on('click','.searchs', function () {
        var table = $('#example').DataTable();
        console.log('ads',$('select[name="filter[status]"]').val())
        table.columns( 3 ).search( $('select[name="filter[status]"]').val() ).draw();
    } );
    $(document).ready(function(){
        $.fn.dataTable.ext.errMode = 'none';

        $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
            // console.log( 'An error has been reported by DataTables: ', message );
        }) ;
    });
</script>
<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $pelabuhan=pelabuhan();
        //die("asdasd");
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Icon</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-line col-lg-6">
                                    <label>Icon *with ratio size 1:1 (square)</label>
                                    <div class="clearfix"></div>
                                    <label>*click below to browse file</label>
                                    <input name="icon" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Name Icon</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <table class="table table-responsive table-bordered" id="tabIc">
                                <thead>
                                    <tr>
                                        <th style="width: 800px">Deskripsi Icon</th>
                                        <th>
                                            <div class="btn btn-success btn-sm addIc">
                                                Add Field
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="appendIc">
                                    <tr data-no="1">
                                        <td>
                                            <input type="text" class="form-control" name="ic_desc[1]" placeholder="Input Here ..." value="" style="height: 25px" required>
                                        </td>
                                        <td style="text-align: center;">
                                            -
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
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

    <?php if ($this->input->get('edit')) { 
        $pelabuhan=pelabuhan();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Pelabuhan</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'icon');
                        if (count($val)) {
                            $img=check_img($val[0]->path_file);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <label>Icon *with ratio size 1:1 (square)</label>
                                    <div class="clearfix"></div>
                                    <label>*click below to browse file</label>
                                    <input name="icon" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Icon *current</label>
                                    <div class="clearfix"></div>
                                    <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 100px; max-height:100px;" data-fancybox="images" href="<?=$img['path'];?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Name Icon</label>
                                        <input name="name" type="text" class="form-control" value="<?=$val[0]->name;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <table class="table table-responsive table-bordered" id="tabIc">
                                    <thead>
                                        <tr>
                                            <th style="width: 800px">Deskripsi Icon</th>
                                            <th>
                                                <div class="btn btn-success btn-sm addIc">
                                                    Add Field
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="appendIc">
                                        <?php
                                        $iconSub = $this->m_model->selectas('trans_id', $this->input->get('edit'), 'icon_sub');
                                        if (count($iconSub) > 0) {
                                            foreach ($iconSub as $k => $value) {
                                        ?>
                                            <tr data-no="<?= $k+1; ?>">
                                                <td>
                                                    <input type="text" class="form-control" name="ic_desc[<?= $k+1; ?>]" placeholder="Input Here ..." value="<?= $value->value; ?>" style="height: 25px" required>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php
                                                        if($k == 0){
                                                            echo '-';
                                                        }else{
                                                            echo '<div class="btn btn-danger btn-sm deleteRow">
                                                                    Delete
                                                                </div>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
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
                            <div class="col-lg-6">
                                <h2>List Icon</h2>
                            </div>
                            <div class="col-lg-6 pull-right" style="position: relative;left: 115px;">
                                <div class="input-group" style="width: 150px;">
                                  <select name="filter[status]" class="form-control show-tick">
                                      <option value="Pelabuhan">Pelabuhan</option>
                                      <option value="Armada">Armada</option>
                                  </select>
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                                  </div>
                                  <div class="input-group-btn">
                                    <a class="btn btn-primary" href="<?= site_url('panel/icon?add=true'); ?>" style="position: relative;top: 4px;">Add Icon</a>
                                  </div><!-- /btn-group -->
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>                             
                                    <th>Icon</th>                             
                                    <th>Deskripsi</th>                             
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'icon', 'id', 'ASC');
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    $img=check_img($value->path_file);
                                    // print_r($value);
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $value->name; ?>
                                    </td>
                                    <td>
                                        <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $key + 1; ?>" href="<?=$img['path'];?>">
                                    </td>
                                    <td>
                                        <?= $value->deskripsi; ?>
                                    </td>
                                    
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/icon?edit=').$value->id; ?>">Edit</a>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles==1){
                                    ?>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/icon?remove=').$value->id; ?>">Delete</a>
                                    <?php
                                        }
                                    ?>
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
$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>