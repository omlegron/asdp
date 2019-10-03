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
                        <h2>Edit Pelabuhan</h2>
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
                                    <label>Video Pelabuhan</label>
                                    <input name="link" type="text" class="form-control" placeholder="http://videoaskdla.com/asjkdhaksjdhak or videos/askljfaslkd.mp4" value="<?=$val[0]->path_file;?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Pelabuhan</label>
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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>List Video</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/video?add=true'); ?>">Add Video</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pelabuhan</th>
                                    <th>Link Video</th>                             
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
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/photo?edit=').$value->id; ?>">Edit</a>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles==1){
                                    ?>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/photo?remove=').$value->id; ?>">Delete</a>
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

        <script src="<?=base_url();?>assets/backend/plugins/jquery/jquery-v3.2.1.min.js"></script>
            
        <!--fancy box-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <?php } ?>

<?php include 'footer.php'; ?>