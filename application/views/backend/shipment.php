<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Shipment</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Shipment</label>
                                        <input name="name" type="text" class="form-control" placeholder="Shipment Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Slug</label>
                                        <input name="shipment" type="text" class="form-control" placeholder="Shipment Slug">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Description</label>
                                        <textarea style="height: 100px;" name="description" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Save shipment" class="btn btn-block btn-primary">
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
                        <h2>Edit Shipment</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'shipment');
                        if (count($val)) {
                    ?>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Shipment</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $val[0]->name; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Slug</label>
                                        <input name="shipment" type="text" class="form-control" value="<?= $val[0]->shipment; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Description</label>
                                        <textarea style="height: 100px;" name="description" class="form-control"><?= $val[0]->description; ?></textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="save" type="submit" value="Save shipment" class="btn btn-block btn-primary">
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
                        <a class="btn btn-primary" href="<?= site_url('panel/shipment?add=true'); ?>">Add Shipment</a>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Shipment</th>
                                    <th>Slug</th>
                                    <th>Description</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $shipment = $this->m_model->select('shipment');
                            if (count($shipment) > 0) {
                                foreach ($shipment as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td><span class="badge badge-default"><?= $value->shipment; ?></span></td>
                                    <td><?= $value->description; ?></td>
                                    <td>
                                        <a class="badge badge-info" href="<?= site_url('panel/shipment?edit=').$value->id; ?>">Edit</a>
                                        <a class="badge badge-warning" href="<?= site_url('panel/shipment?remove=').$value->id; ?>">Delete</a>
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