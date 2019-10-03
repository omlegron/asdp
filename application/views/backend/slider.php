<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Slider</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Title</label>
                                        <input name="title" type="text" class="form-control" placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Caption</label>
                                        <input name="caption" type="text" class="form-control" placeholder="Caption">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Link Slider</label>
                                        <input name="link" type="text" class="form-control" placeholder="URL Slider">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Image</label>
                                        <input name="userfile" type="file" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Save Slider" class="btn btn-block btn-primary">
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
                        <h2>Edit Slider</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'slider');
                        if (count($val)) {
                    ?>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Title</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="title" type="text" class="form-control" value="<?= $val[0]->title; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Caption</label>
                                        <input name="caption" type="text" class="form-control" value="<?= $val[0]->caption; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Link</label>
                                        <input name="link" type="text" class="form-control" value="<?= $val[0]->link; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Image</label>
                                        <input name="userfile" type="file" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="save" type="submit" value="Save Slider" class="btn btn-block btn-primary">
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
                        <a class="btn btn-primary" href="<?= site_url('panel/slider?add=true'); ?>">Add Slider</a>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Caption</th>
                                    <th>URL</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $slider = $this->m_model->select('slider');
                            if (count($slider) > 0) {
                                foreach ($slider as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><img src="<?= site_url('images/slider/').$value->image; ?>" style="width: 70px;"></td>
                                    <td><?= $value->title; ?></td>
                                    <td><?= $value->caption; ?></td>
                                    <td><?= $value->link; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?"  href="<?= site_url('panel/slider?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/slider?remove=').$value->id; ?>">Delete</a>
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