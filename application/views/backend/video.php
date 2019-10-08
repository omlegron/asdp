<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $cabangs=cabangs();
        //die("asdasd");
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Video</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <label>Video</label>
                                    <input name="link" type="text" class="form-control" placeholder="http://videoaskdla.com/asjkdhaksjdhak or videos/askljfaslkd.mp4">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cabang</label>
                                    <select name="cabang_id" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                        <?php
                                            foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                # code...
                                        ?>
                                                <option value="<?=$valuecabangs->id;?>"><?=$valuecabangs->name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
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

    <?php if ($this->input->get('edit')) { 
        $cabangs=cabangs();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Video</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'video');
                        if (count($val)) {
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <label>Video</label>
                                    <input name="link" type="text" class="form-control" placeholder="http://videoaskdla.com/asjkdhaksjdhak or videos/askljfaslkd.mp4" value="<?=$val[0]->path_file;?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cabang</label>
                                    <select name="cabang_id" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                        <?php
                                            foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                # code...
                                        ?>
                                                <option value="<?=$valuecabangs->id;?>" <?php if($val[0]->cabang_id==$valuecabangs->id){echo 'selected="selected"';}?>><?=$valuecabangs->name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
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

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
        <script src="<?=base_url();?>assets/backend/plugins/jquery/jquery-v3.2.1.min.js"></script>
            
        <!--fancy box-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
         <script>
            $(document).ready(function(){
                $('#example').dataTable( {
                    "paging": true,
                    "dom": '<"toolbar">frtip',
                    // 'filter': false,
                    // processing: true,
                } );
                $('#example_filter').hide()
            });
            $(document).on('click','.searchs', function () {
                var table = $('#example').DataTable();
                table.columns( 1 ).search( $('input[name="filter[name]"]').val() ).draw();
                table.columns( 3 ).search( $('select[name="filter[status]"]').val() ).draw();
            } );
            $(document).ready(function(){
                $.fn.dataTable.ext.errMode = 'none';

                $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
                }) ;
            });   

            $(document).on('click','.reset',function(e){
                $('input').val('');
                $('select').val('')
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 3 ).search("").draw();
            });     

        </script>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>List Video</h2>
                            </div>
                            <div class="col-lg-2">
                                <?php
                                    if(isset($this->session->userdata('admin_data')->id_cabang)){

                                    }else{
                                ?>
                                <a class="btn btn-primary" href="<?= site_url('panel/video?add=true'); ?>">Add Video</a>
                                <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pull-right" style="position: relative;left: 20px;top: 20px;">
                        <div class="input-group" style="width: 150px;"> 
                          <input type="text" name="filter[name]" placeholder="Cabang" class="form-control" style="border: 1px solid black !important;position: relative;top: 10px;width: 150px">&nbsp;&nbsp;&nbsp;
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
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cabang</th>
                                    <th>Link Video</th>                             
                                    <th>Deskripsi</th>                             
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'video', 'id', 'ASC');
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    //get pelabuhan
                                    $cabangs=$this->m_model->selectas3('id', $value->cabang_id, 'deleted_at is NULL', NULL, 'status', 1, 'cabangs');
                                    if(count($cabangs)>0){
                                        $name_cabangs= $cabangs[0]->name;
                                    }
                                    else{
                                        $name_cabangs= '-';
                                    }

                                    if(filter_var($value->path_file, FILTER_VALIDATE_URL) === FALSE && $value->path_file !=NULL){
                                        $path_file=base_url().$value->path_file;
                                        $path_file='<a data-fancybox href="'.$path_file.'">'.$value->path_file.'</a>';
                                    }
                                    else if(filter_var($value->path_file, FILTER_VALIDATE_URL) == TRUE && $value->path_file !=NULL) {
                                        $path_file='<a data-fancybox href="'.$value->path_file.'">'.$value->path_file.'</a>';
                                    }
                                    else{
                                        $path_file="-";
                                    }

                                    $desk = '-';
                                    if(isset($value->deskripsi)){
                                        $desk = $value->deskripsi;
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $name_cabangs; ?>
                                    </td>
                                    <td>
                                        <?=$path_file;?>
                                    </td>
                                    <td>
                                        <?= $desk; ?>
                                    </td>
                                    <td>
                                        <?php
                                            if(isset($this->session->userdata('admin_data')->id_cabang)){

                                            }else{
                                        ?>
                                                <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/video?edit=').$value->id; ?>">Edit</a>
                                        <?php
                                            }
                                        ?>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles==1){
                                    ?>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/video?remove=').$value->id; ?>">Delete</a>
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

<?php include 'footer.php'; ?>