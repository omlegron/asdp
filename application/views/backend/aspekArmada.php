<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 

<!-- Lib Scripts Plugin Js --> 

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
                        <h2>Add Jenis Aspek Armada</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label for="nama_aspek">Kategori Status</label>
                                        <input type="text" name="status" value="Armada" readonly="" class="form-control">
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
                        <h2>Edit Jenis Aspek Armada</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne($this->input->get('edit'),'jenis_aspeks');
                        if ($val) {
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden" value="<?= $val['id']; ?>">
                            <div class="row clearfix">
                                
                                <div class="form-group col-md-6">
                                        <label for="status">Kategori Status</label>
                                        <input type="text" name="status" value="Armada" class="form-control" readonly="" >
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        <label for="nama_aspek">Jenis Aspek</label>
                                        <input type="text" class="form-control" id="nama_aspek" placeholder="Keamanan" name="nama_aspek" required value="<?=$val['nama_aspek'];?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#example').dataTable( {
                    "paging": false,
                    // 'filter': false,
                    // processing: true,
                } );
                $('#example_filter').hide()
            });   
            $(document).on('click','.searchs', function () {
                var table = $('#example').DataTable();
                table.columns( 1 ).search( $('input[name="filter[name]"]').val() ).draw();
                table.columns( 2 ).search( $('select[name="filter[status]"]').val() ).draw();
            } );
            $(document).ready(function(){
                $.fn.dataTable.ext.errMode = 'none';

                $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
                }) ;
            });   

            $(document).on('click','.reset',function(e){
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 2 ).search("").draw();
            });     

            $(document).on('click','.buttonAddSub',function(e){
                console.log('console')
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 2 ).search("").draw();
                e.preventDefault();
                $( ".buttonConfirm" ).trigger('click');
            });
        </script>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Sub Aspek</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" id="formSubmit">
                            <div class="row clearfix">
                                                
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Aspek</label>
                                        <input type="hidden" name="jenis_aspeks" value="<?= $this->input->get('addsub') ?>">
                                        <?php 
                                            $jA = $this->m_model->selectOne('id',$this->input->get('addsub'),'jenis_aspeks');
                                            $valueJA = '';
                                            if(isset($jA->nama_aspek)){
                                                $valueJA = $jA->nama_aspek;
                                            }
                                        ?>
                                        <input type="text" class="form-control" name="" value="<?= $valueJA; ?>" readonly="">
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
                                <div class="col-lg-6 pull-right" style="position: relative;left: 20px;top: 20px;">
                                    <div class="input-group" >                                               
                                        <input type="text" name="filter[name]" placeholder="Name" class="form-control" style="border: 1px solid black !important;position: relative;top: 10px;width: 150px;">&nbsp;&nbsp;&nbsp;
                                      <select name="filter[status]" class="form-control show-tick" id="removeSlect">
                                          <option value="">Choose One</option>
                                          <option value="Pelabuhan">Pelabuhan</option>
                                          <option value="Armada">Armada</option>
                                      </select>
                                      <div class="input-group-btn">
                                        <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                                      </div>
                                      <div class="input-group-btn">
                                          <button type="reset" class="btn btn-primary reset" style="position: relative;top: 4px;">Reset </button>
                                      </div>
                                    </div><!-- /input-group -->
                                </div>  
                                <div class="col-md-12" >
                                    <table class="table table-responsive table-bordered table-striped table-hover dataTable js-basic-example" id="example" style="max-height: 350px;overflow-x: scroll;">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th style="width: 50px;text-align: center;">#</th>
                                                <th style="width: 550px;text-align: center;">Name</th>
                                                <th style="width: 550px;text-align: center;">Description</th>
                                                <th style="width: 150px;text-align: center;">Icon</th>
                                                <th style="width: 350px;text-align: center;">Sub</th>
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
                                                        <td><?php echo $value->deskripsi; ?></td>
                                                        
                                                        <td style="text-align:center;">
                                                            <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $k + 1; ?>" href="<?=$img['path'];?>">
                                                        </td>
                                                        <td><?php 
                                                            $iconSub = $this->m_model->selectas('trans_id', $value->id, 'icon_sub');
                                                            if (count($iconSub) > 0) {
                                                                foreach ($iconSub as $k1 => $value) {
                                                                    $num = $k1+1;
                                                                    echo ''.$num.'. '.$value->value.'<br>';
                                                                }
                                                            }else{
                                                                echo 'Tidak Ada Deskripsi';
                                                            }
                                                         ?></td>
                                                        <td style="text-align: center">
                                                            <select name="icon[<?php echo $value->id; ?>]" class="form-control show-tick">
                                                                <option value="Active" >Active</option>
                                                                <option value="Non Active" selected>Non Active</option>
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
                                    <input name="" type="submit" value="Add Sub Aspek" class="btn btn-block btn-primary buttonAddSub">

                                    <input name="addsubaspek" type="submit" value="Add Sub Aspek" class="btn btn-block btn-primary buttonConfirm" style="display: none;">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('editsub')) { ?>
         <script type="text/javascript">
            $(document).ready(function(){
                $('#example').dataTable( {
                    "paging": false
                } );
                $('#example_filter').hide();
            });   
            $(document).on('click','.searchs', function () {
                var table = $('#example').DataTable();
                table.columns( 1 ).search( $('input[name="filter[name]"]').val() ).draw();
                table.columns( 2 ).search( $('select[name="filter[status]"]').val() ).draw();
            } );
            $(document).ready(function(){
                $.fn.dataTable.ext.errMode = 'none';

                $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
                }) ;
            });   

            $(document).on('click','.reset',function(e){
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 2 ).search("").draw();
            });     

            $(document).on('click','.buttonAddSub',function(e){
                console.log('console')
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 2 ).search("").draw();
                e.preventDefault();
                $( ".buttonConfirm" ).trigger('click');
            });

            // $(document).on('click','.searchs', function () {
            //     var table = $('#example').DataTable();
            //     console.log('ads',$('select[name="filter[status]"]').val())
            //     table.columns( 2 ).search( $('select[name="filter[status]"]').val() ).draw();
            // } );
            // $(document).ready(function(){
            //     $.fn.dataTable.ext.errMode = 'none';

            //     $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
            //         // console.log( 'An error has been reported by DataTables: ', message );
            //     }) ;
            // });        
        </script>
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
                                        <input type="hidden" name="jenis_aspeks" value="<?= $sub_aspek[0]->jenis_aspek_id ?>">
                                        <?php 
                                            $jA = $this->m_model->selectOne('id',$sub_aspek[0]->jenis_aspek_id,'jenis_aspeks');
                                            $valueJA = '';
                                            if(isset($jA->nama_aspek)){
                                                $valueJA = $jA->nama_aspek;
                                            }
                                        ?>
                                        <input type="text" class="form-control" name="" value="<?= $valueJA; ?>" readonly="">
                                        
                                        
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
                                <div class="col-lg-6 pull-right" style="position: relative;left: 20px;top: 20px;">
                                    <div class="input-group" style="width: 150px;">                                               <input type="text" name="filter[name]" placeholder="Name" class="form-control" style="border: 1px solid black !important;position: relative;top: 10px;">&nbsp;&nbsp;&nbsp;
                                      
                                      <div class="input-group-btn">
                                        <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                                      </div>
                                      <div class="input-group-btn">
                                          <button type="reset" class="btn btn-primary reset" style="position: relative;top: 4px;">Reset </button>
                                      </div>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-12">
                                    <?php
                                        $subNewId = $sub_aspek[0]->id;

                                    ?>
                                    <table class="table table-responsive table-bordered table-bordered table-striped table-hover dataTable js-basic-example" id="example" style="max-height: 350px;overflow-x: scroll;">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th style="width: 50px;text-align: center;">#</th>
                                                <th style="width: 550px;text-align: center;">Name</th>
                                                <th style="width: 550px;text-align: center;">Description</th>
                                                <th style="width: 150px;text-align: center;">Icon</th>
                                                <th style="width: 350px;text-align: center;">Sub</th>
                                                <th style="width: 100px;text-align: center;">
                                                    Action Add
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="appendBody">
                                            <?php
                                                $cekAll = $this->m_model->selectcustom("select * from sub_aspeks_icon where trans_sub_id='$subNewId'");
                                                if(count($cekAll) > 0){
                                                    foreach ($this->m_model->all('icon') as $k => $valuess) {
                                                        $img=check_img($valuess->path_file);
                                                        $cek = $this->m_model->selectOneWhere2('trans_sub_id',$this->input->get('editsub'),'trans_icon_id',$valuess->id,'sub_aspeks_icon');
                                                        
                                                       
                                            ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $k+1; ?></td>
                                                        <td><?php echo $valuess->name; ?></td>
                                                        <td><?php echo $valuess->deskripsi; ?></td>
                                                        <td style="text-align:center;">
                                                            <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $k + 1; ?>" href="<?=$img['path'];?>">
                                                        </td>
                                                        <td><?php 
                                                            $iconSub = $this->m_model->selectas('trans_id', $valuess->id, 'icon_sub');
                                                            if (count($iconSub) > 0) {
                                                                foreach ($iconSub as $k1 => $value) {
                                                                    $num = $k1+1;
                                                                    echo ''.$num.'. '.$value->value.'<br>';
                                                                }
                                                            }else{
                                                                echo 'Tidak Ada Deskripsi';
                                                            }
                                                         ?></td>
                                                        <td style="text-align: center">
                                                            <?php
                                                            $active = '';
                                                            $nonAct = '';
                                                             if(isset($cek['status'])){
                                                                if($cek['status'] == 'Active'){
                                                                    $active = 'selected';
                                                                }elseif($cek['status'] == 'Non Active'){
                                                                    $nonAct = 'selected';
                                                                }
                                                            }
                                                            ?>
                                                            <select name="icon[<?php echo $valuess->id; ?>]" class="form-control show-tick">
                                                                <option value="Non Active" <?= $nonAct ?> >Non Active</option>
                                                                <option value="Active" <?= $active ?> >Active</option>
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
                                    <input name="" type="submit" value="Edit Sub Aspek" class="btn btn-block btn-primary buttonAddSub">
                                    <input name="savesub" type="submit" value="Edit Sub Aspek" class="btn btn-block btn-primary buttonConfirm" style="display: none;">
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
                        <h2>Aspek Armada</h2>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn btn-primary pull-right" href="<?= site_url('panel/aspekArmada?add=true'); ?>">Add Aspek</a>
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
                        <table id="example" class="table table-bordered table-striped table-hover dataTable js-basic-example" style="font-size: 12px">
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
                            <?php $category = $this->m_model->selectwhere('status', 'Armada', 'jenis_aspeks');
                            // print_r($category);
                            // die();
                            if (count($category) > 0) {
                                $num_top_category=0;
                                $num_potrait_banner=0;
                                foreach ($category as $key => $value) {
                                    $subcategory = $this->m_model->selectas2('jenis_aspek_id', $value->id,'deleted_at IS NULL', NULL, 'sub_aspeks');
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><b><?= $value->nama_aspek; ?></b></td>
                                    <td colspan="5" style="text-align: center;"><a class="badge" style="background-color:#025aa5;color: white " href="<?= site_url('panel/aspekArmada?addsub='.$value->id); ?>">Add Sub Aspek</a></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $statuse = '';
                                            if($value->status == 'Pelabuhan'){
                                                $statuse = '<span class="badge" style="background-color:#F7FA23;color:black;text-align:center;">Pelabuhan</span>';
                                            }else{
                                                $statuse = '<span class="badge" style="background-color:#DAF7A6;color:black;text-align:center;">Armada</span>';
                                            }
                                        ?>
                                        <?= $statuse; ?></td>
                                    <td style="text-align: center;">
                                        <a class="confirm badge badge-primary"  msg="Do you want to Edit data?" href="<?= site_url('panel/aspekArmada?edit=').$value->id; ?>">Edit</a>
                                        <?php
                                            // if($this->session->userdata('admin_data')->roles==1){
                                        ?>
                                                <a class="confirm badge badge-danger" msg="Are you sure to Delete data?" href="<?= site_url('panel/aspekArmada?remove=').$value->id; ?>">Delete</a>
                                        <?php
                                            // }
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
                                                    foreach ($this->m_model->selectWhere2('trans_sub_id',$valuesub->id,'status','Active','sub_aspeks_icon') as $keySubIco => $valueSubIco) {
                                                        
                                                        $cekReal = $this->m_model->getOne($valueSubIco->trans_icon_id,'icon');
                                                        $imgs=check_img($cekReal['path_file']);
                                                ?>
                                                <li style="list-style: none">
                                                    <div class="list-group">
                                                        <a href="javascript:void(0)" class="list-group-item ">
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>">&nbsp;
                                                            <p class="list-group-item-header">  <?php echo $cekReal['name']; ?>. <br></p>&nbsp;&nbsp;&nbsp; 
                                                            <p class="list-group-item-text"><?php echo $cekReal['deskripsi'] ?></p> 
                                                            <div class="col-md-12">
                                                                <p class="list-group-item-text" style="position: relative;left: 60px">
                                                                    <?php 
                                                                        $iconSubIndex = $this->m_model->selectas('trans_id', $cekReal['id'], 'icon_sub');
                                                                        if (count($iconSubIndex) > 0) {
                                                                            foreach ($iconSubIndex as $k1 => $valueindex) {
                                                                                $num = $k1+1;
                                                                                echo ''.$num.'. '.$valueindex->value.'<br>';
                                                                            }
                                                                        }else{
                                                                            echo 'Tidak Ada Deskripsi';
                                                                        }
                                                                     ?>
                                                                </p> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                        
                                    </td>
                                    <td style="text-align: center;">
                                        <a class="badge badge-primary"  msg="Do you want to Edit data?" href="<?= site_url('panel/aspekArmada?editsub=').$valuesub->id; ?>">Edit</a>
                                        <?php
                                            // if($this->session->userdata('admin_data')->roles==1){
                                        ?>
                                            <a class="badge badge-danger" msg="Are you sure to Delete data?" href="<?= site_url('panel/aspekArmada?removesub=').$valuesub->id; ?>">Delete</a>
                                        <?php
                                        // }
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