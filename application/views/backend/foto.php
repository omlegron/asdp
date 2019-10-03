<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $cabang=cabangs();
        //die("asdasd");
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Photo</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <label>Foto</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
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
                                            foreach ($cabang as $keycabang => $valuecabang) {
                                                # code...
                                        ?>
                                                <option value="<?=$valuecabang->id;?>"><?=$valuecabang->name;?></option>
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
                        <h2>Edit Photo</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'photo');
                        if (count($val)) {
                            $img=check_img($val[0]->path_file);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <label>Foto</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
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
                                                <option value="<?=$valuecabangs->id;?>" <?php if($val[0]->cabang_id==$valuecabangs->id){echo 'selected="selected"';}?>><?=$valuecabangs->name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 200px; max-height:150px;" data-fancybox="images" href="<?=$img['path'];?>">
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
                                <h2>List Foto</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/photo?add=true'); ?>">Add Foto</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cabang</th>
                                    <th>Photo</th>                             
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'photo', 'id', 'ASC');
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    $img=check_img($value->path_file);
                                    //get pelabuhan
                                    $cabangs=$this->m_model->selectas3('id', $value->cabang_id, 'deleted_at is NULL', NULL, 'status', 1, 'cabangs');
                                    if(count($cabangs)>0){
                                        $name_cabangs= $cabangs[0]->name;
                                    }
                                    else{
                                        $name_cabangs= '-';
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $name_cabangs; ?>
                                    </td>
                                    <td>
                                        <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 200px; max-height:150px;" data-fancybox="images<?= $key + 1; ?>" href="<?=$img['path'];?>">
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
    <?php } ?>

<script>
$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>