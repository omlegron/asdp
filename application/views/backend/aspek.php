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
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="nama_aspek">Jenis Aspek</label>
                                        <input type="text" class="form-control" id="nama_aspek" placeholder="Keamanan" name="nama_aspek" required >
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
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
                        $val = $this->m_model->selectas2('id', cleartext($this->input->get('edit')), 'deleted_at is NULL', NULL, 'jenis_aspeks');
                        if (count($val)) {
                    ?>

                        <form class="form-horizontal" action="" method="post">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="nama_aspek">Jenis Aspek</label>
                                        <input type="text" class="form-control" id="nama_aspek" placeholder="Keamanan" name="nama_aspek" required value="<?=$val[0]->nama_aspek;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
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
                                                foreach ($jenis_aspeks as $key => $value) {
                                                    echo '<option value="'.$value->id.'">'.$value->nama_aspek.'</option>';
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
                        <h2>Aspek</h2>
                    </div>
                    <div class="body">

                    <a class="btn btn-primary" href="<?= site_url('panel/aspek?add=true'); ?>">Add Aspek</a>
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Aspek</th>
                                    <th>Sub Aspek</th>
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
                                    <td><?= $value->nama_aspek; ?></td>
                                    <td><a class="badge badge-primary" href="<?= site_url('panel/aspek?addsub=true'); ?>">Add Sub Aspek</a></td>
                                    <td>
                                        <a class="confirm badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/aspek?edit=').$value->id; ?>">Edit</a>
                                        <?php
                                            if(count($subcategory)<=0 && $this->session->userdata('admin_data')->roles==1){
                                        ?>
                                                <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="#">Delete</a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            if (count($subcategory) > 0) {
                                foreach ($subcategory as $keysub => $valuesub) { ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td><?= $valuesub->name; ?></td>
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