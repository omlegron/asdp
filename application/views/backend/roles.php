<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Roles</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Roles Name</label>
                                        <input name="roles" type="text" class="form-control" placeholder="Roles" required="">
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

    <?php if ($this->input->get('edit')) { 
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Roles</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'roles');
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Roles Name</label>
                                        <input name="roles" type="text" class="form-control" placeholder="Roles Name" value="<?=$val[0]->roles;?>">
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
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php 
                    $data=$this->session->flashdata('sukses');
                    if($data!=""){ ?>
                    <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
                    <?php } ?>
                    <?php 
                    $data2=$this->session->flashdata('error');
                    if($data2!=""){ ?>
                    <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                <?php } ?>

                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>List Roles</h2>
                                
                            </div>
                            <div class="col-lg-2">
                               <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th style="width: 15px">#</th>
                                    <th>Roles</th>                             
                                    <th style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = $this->m_model->selectcustom('select * from roles');
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $value->roles; ?>
                                    </td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/roles?edit=').$value->id; ?>">Edit</a>
                                   
                                        <?php
                                            if($this->session->userdata('admin_data')->roles==1){
                                        ?>
                                            <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/roles?remove=').$value->id; ?>">Delete</a>
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