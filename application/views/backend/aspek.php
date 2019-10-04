<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Lib Scripts Plugin Js --> 

<script type="text/javascript">
    // #myInput is a <input type="text"> element
    $(document).on('click','.searchs', function () {
        var table = $('#example').DataTable();
        table.columns( 3 ).search( $('input[name="filter[status]"]').val() ).draw();
    } );
    $(document).ready(function(){
        $.fn.dataTable.ext.errMode = 'none';

        $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
            // console.log( 'An error has been reported by DataTables: ', message );
        }) ;
    });
</script>
<?php include 'header.php'; ?>
    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Jenis Aspek</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label for="nama_aspek">Kategori Status</label>
                                        <select name="status" class="form-control show-tick" required="">
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Pelabuhan">Pelabuhan</option>
                                            <option value="Armada">Armada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label for="nama_aspek">Jenis Aspek</label>
                                        <input type="text" class="form-control" id="nama_aspek" placeholder="Keamanan" name="nama_aspek" required >
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                            </div>
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

    <?php if ($this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Jenis Aspek</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne($this->input->get('edit'),'jenis_aspeks');
                        if ($val) {
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden" value="<?= $val['id']; ?>">
                            <div class="row clearfix">
                                <?php
                                    $checkPela = '';
                                    $checkArma = '';
                                    if($val['status'] == 'Pelabuhan'){
                                        $checkPela = 'selected';
                                    }elseif($val['status'] == 'Armada'){
                                        $checkArma = 'selected';
                                    }           
                                ?>
                                <div class="form-group col-lg-6">
                                        <label for="nama_aspek">Kategori Status</label>
                                        <select name="status" class="form-control show-tick" required="">
                                            <option value="Pelabuhan" <?php $checkPela; ?> >Pelabuhan</option>
                                            <option value="Armada" <?php $checkArma; ?> >Armada</option>
                                        </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="nama_aspek">Jenis Aspek</label>
                                        <input type="text" class="form-control" id="nama_aspek" placeholder="Keamanan" name="nama_aspek" required value="<?=$val['nama_aspek'];?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" placeholder="Please type what you want..."><?=$val['deskripsi'];?></textarea>
                                    </div>
                                </div>
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

    <?php if ($this->input->get('addsub')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Sub Aspek</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                                
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Aspek</label>
                                        <select name="jenis_aspeks" class="form-control show-tick">
                                            <option value="">Pilih Aspek</option>
                                            <?php $jenis_aspeks = $this->m_model->select('jenis_aspeks');
                                            if (count($jenis_aspeks) > 0) {
                                                $slectd = '';
                                                foreach ($jenis_aspeks as $key => $value) {
                                                    if($this->input->get('addsub') == $value->id){
                                                        $slectd = 'selected';
                                                    }
                                                    echo '<option value="'.$value->id.'" '.$slectd.'>'.$value->nama_aspek.'</option>';
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float ">
                                        <div class="form-line">
                                            <label class="form-label">Sub Aspek</label>
                                            <input name="sub_aspek" type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="max-height: 350px;overflow-x: scroll;">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th style="width: 50px;text-align: center;">#</th>
                                                <th style="width: 550px;text-align: center;">Name</th>
                                                <th style="width: 350px;text-align: center;">Icon</th>
                                                <th style="width: 100px;text-align: center;">
                                                    Action Add
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="appendBody">
                                            <?php
                                                if(count($this->m_model->all('icon')) > 0){
                                                    foreach ($this->m_model->all('icon') as $k => $value) {
                                                        $img=check_img($value->path_file);
                                            ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $k+1; ?></td>
                                                        <td><?php echo $value->name; ?></td>
                                                        <td style="text-align:center;">
                                                            <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $k + 1; ?>" href="<?=$img['path'];?>">
                                                        </td>
                                                        <td style="text-align: center">
                                                            <select name="icon[<?php echo $value->id; ?>]" class="form-control show-tick">
                                                                <option value="Active" selected>Active</option>
                                                                <option value="Non Active">Non Active</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <input name="addsubaspek" type="submit" value="Add Sub Aspek" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('editsub')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Sub Aspek</h2>
                    </div>
                    <div class="body">
                        <?php
                        $sub_aspek = $this->m_model->selectas('id', $this->input->get('editsub'), 'sub_aspeks');
                        if (count($sub_aspek) > 0) {
                        ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Aspek</label>
                                        <select name="jenis_aspeks" class="form-control show-tick">
                                            <option value="">Pilih Aspek</option>
                                            <?php $jenis_aspeks = $this->m_model->select('jenis_aspeks');
                                            if (count($jenis_aspeks) > 0) {
                                                foreach ($jenis_aspeks as $key => $value) {
                                                    $selected="";
                                                    if($value->id == $sub_aspek[0]->jenis_aspek_id){
                                                        $selected="selected";
                                                    }
                                                    echo '<option value="'.$value->id.'" '.$selected.'>'.$value->nama_aspek.'</option>';
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float ">
                                        <div class="form-line focused">
                                            <label class="form-label">Sub Aspek</label>
                                            <input name="id" type="hidden" class="form-control" placeholder="" value="<?=$sub_aspek[0]->id;?>">
                                            <input name="sub_aspek" type="text" class="form-control" placeholder="" value="<?=$sub_aspek[0]->name;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="max-height: 350px;overflow-x: scroll;">
                                    <?php
                                        $subNewId = $sub_aspek[0]->id;

                                    ?>
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th style="width: 50px;text-align: center;">#</th>
                                                <th style="width: 550px;text-align: center;">Name</th>
                                                <th style="width: 350px;text-align: center;">Icon</th>
                                                <th style="width: 100px;text-align: center;">
                                                    Action Add
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="appendBody">
                                            <?php
                                                $cekAll = $this->m_model->selectcustom("select * from sub_aspeks_icon where trans_sub_id='$subNewId'");
                                                if(count($cekAll) > 0){
                                                    foreach ($cekAll as $k => $value) {
                                                        $cekONe = $this->m_model->getOne($value->trans_icon_id,'icon');
                                                        $img=check_img($cekONe['path_file']);
                                            ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $k+1; ?></td>
                                                        <td><?php echo $cekONe['name']; ?></td>
                                                        <td style="text-align:center;">
                                                            <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $k + 1; ?>" href="<?=$img['path'];?>">
                                                        </td>
                                                        <td style="text-align: center">
                                                            <select name="icon[<?php echo $cekONe['id']; ?>]" class="form-control show-tick">
                                                                <option value="Active" <?php ($value->status == 'Active') ? 'selected' : ''; ?>>Active</option>
                                                                <option value="Non Active" <?php ($value->status == 'Non Active') ? 'selected' : '';  ?>>Non Active</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <input name="savesub" type="submit" value="Edit Sub Aspek" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add')
            && !$this->input->get('edit')
            && !$this->input->get('addsub')
            && !$this->input->get('editsub')
            && !$this->input->get('addchild')
            && !$this->input->get('editchild')
            && !$this->input->get('order-navbar')
            ) {
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                     <div class="row">
                         
                    <div class="col-lg-10">
                        <h2>Aspek</h2>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn btn-primary pull-right" href="<?= site_url('panel/aspek?add=true'); ?>">Add Aspek</a>
                    </div>
                   
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group" style="width: 150px;border: 1px solid black !important;height: 39px">
                                  <input type="text" class="form-control" name="filter[status]" placeholder="Search Status" style="">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                                  </div><!-- /btn-group -->
                                </div><!-- /input-group -->
                            </div>
                        </div>
                        <table id="example" class="table table-bordered table-striped table-hover dataTable js-basic-example" style="font-size: 11px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aspek</th>
                                    <th colspan="5">Sub Aspek</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $category = $this->m_model->selectas('deleted_at IS NULL', NULL, 'jenis_aspeks');
                            if (count($category) > 0) {
                                $num_top_category=0;
                                $num_potrait_banner=0;
                                foreach ($category as $key => $value) {
                                    $subcategory = $this->m_model->selectas2('jenis_aspek_id', $value->id,'deleted_at IS NULL', NULL, 'sub_aspeks');
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><b><?= $value->nama_aspek; ?></b></td>
                                    <td colspan="5"><a class="badge badge-primary" href="<?= site_url('panel/aspek?addsub='.$value->id); ?>">Add Sub Aspek</a></td>
                                    <td><?= $value->status; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/aspek?edit=').$value->id; ?>">Edit</a>
                                        <?php
                                            if(count($subcategory)<=0 && $this->session->userdata('admin_data')->roles==1){
                                        ?>
                                                <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/aspek?remove=').$value->id; ?>">Delete</a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            if (count($subcategory) > 0) {
                                foreach ($subcategory as $keysub => $valuesub) { ?>
                                <tr>
                                    <td colspan=""></td>
                                    <td colspan="7">
                                        <li style="list-style: none"> <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block"><span class="badge badge-warning" style="font-size: 12px"><?= $valuesub->name; ?></span></a>
                                            <ul class="ml-menu" style="display: none;">
                                                <?php  
                                                    foreach ($this->m_model->selectwhere('trans_sub_id',$valuesub->id,'sub_aspeks_icon') as $keySubIco => $valueSubIco) {
                                                        $cekReal = $this->m_model->getOne($valueSubIco->trans_icon_id,'icon');
                                                        $imgs=check_img($cekReal['path_file']);
                                                ?>
                                                <li style="list-style: none">
                                                    <div class="list-group">
                                                        <a href="javascript:void(0)" class="list-group-item ">
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>">&nbsp;
                                                            <p class="list-group-item-header">  <?php echo $cekReal['name']; ?>. <br></p>&nbsp;&nbsp;&nbsp; 
                                                            <p class="list-group-item-text"><?php echo $cekReal['deskripsi'] ?></p> 
                                                        </a>
                                                    </div>
                                                </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                        
                                    </td>
                                    <td>
                                        <a class="badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/aspek?editsub=').$valuesub->id; ?>">Edit</a>
                                        <?php
                                            if($this->session->userdata('admin_data')->roles==1){
                                        ?>
                                            <a class="badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/aspek?removesub=').$valuesub->id; ?>">Delete</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            ?>

                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<script>
$(document).ready(function(){

    $("#category_parent").change(function(){
        var catid = $(this).val();
        $.ajax({
            url: '<?= site_url('ajax/subcat'); ?>',
            type: 'post',
            data: {category:catid},
            dataType: 'json',
            success:function(response){
                console.log(response);
                var len = response.length;
                $("#category_sub").empty();

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#category_sub").append("<option value='"+id+"'>"+name+"</option>");
                }
                
            },
            error: function() {
                $("#category_sub").empty();
                $("#category_sub").append("<option value=''>Select</option>");
           }
        });
    });

});
</script>

<?php include 'footer.php'; ?>