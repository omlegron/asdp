<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Payment</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Payment</label>
                                        <input name="name" type="text" class="form-control" placeholder="Payment Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control" placeholder="Account">
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
                                    <input name="add" type="submit" value="Save payment" class="btn btn-block btn-primary">
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
                        <h2>Edit Payment</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'payment');
                        if (count($val)) {
                    ?>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Payment</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $val[0]->name; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Account</label>
                                        <input name="account" type="text" class="form-control" value="<?= $val[0]->account; ?>">
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
                                    <input name="save" type="submit" value="Save payment" class="btn btn-block btn-primary">
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
                        <a class="btn btn-primary" href="<?= site_url('panel/payment?add=true'); ?>">Add Payment</a>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Payment</th>
                                    <th>Account</th>
                                    <th>Description</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $payment = $this->m_model->select('payment');
                            if (count($payment) > 0) {
                                foreach ($payment as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td><span class="badge badge-default"><?= $value->account; ?></span></td>
                                    <td><?= $value->description; ?></td>
                                    <td>
                                        <a msg="Do you want to Edit data?" class="confirm badge badge-info" href="<?= site_url('panel/payment?edit=').$value->id; ?>">Edit</a>
                                        <a msg="Are you sure to Delete data?" class="confirm badge badge-warning" href="<?= site_url('panel/payment?remove=').$value->id; ?>">Delete</a>
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