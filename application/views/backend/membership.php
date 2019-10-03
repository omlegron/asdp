<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Membership</h2>
                    </div>                    
                    <div class="body">
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Type</label>
                                        <input name="type" type="text" class="form-control" placeholder="Type">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                            <!-- End content panel -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('edit')) {?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Page</h2>
                    </div>
                    <div class="body">
                    <?php
                    $val1 = $this->m_model->selectas('id', $this->input->get('edit'), 'membership');
                    if (count($val1) > 0) {
                    ?>                  
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Type</label>
                                        <input name="id" type="hidden" value="<?=$val1[0]->id;?>">
                                        <input name="type" type="text" class="form-control" placeholder="Type" value="<?=$val1[0]->type;?>">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-4">
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                            <!-- End content panel -->
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
                                <h2>Membership</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/membership?add=true'); ?>">Add Page</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $Membership = $this->m_model->select('membership');
                            if (count($Membership) > 0) {
                                foreach ($Membership as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->type; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/membership?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/membership?remove=').$value->id; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php include 'footer.php'; ?>