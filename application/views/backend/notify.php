<?php include 'header.php'; ?>

        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">

            <?php if ($this->input->get('add')) { ?>
                <div class="card">
                    <div class="header">
                        <h2>Add Notify</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Notify Type</label>
                                        <select name="type" class="form-control show-tick">
                                            <option value="1">Login</option>
                                            <option value="2">Register</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Notify Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="1">Success</option>
                                            <option value="2">Error</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" rows="4" class="form-control no-resize" placeholder="Notify Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <input name="create" value="Create" type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->input->get('edit')) {
                $data = $this->m_model->selectas('nf_notificationid', $this->input->get('edit'), 'notification');
                if (count($data) > 0) {
            ?>
            
                <div class="card">
                    <div class="header">
                        <h2>Edit Notify</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post">
                            <input type="hidden" name="id" value="<?= $this->input->get('edit'); ?>">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Notify Type</label>
                                        <select name="type" class="form-control show-tick">
                                            <option value="1">Login</option>
                                            <option value="2">Register</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Notify Status</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="1">Success</option>
                                            <option value="2">Error</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" rows="4" class="form-control no-resize" placeholder="Notify Message"><?= $data[0]->nf_content; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <input name="update" value="Update" type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } } ?>


            <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
                <div class="card">
                    <div class="header">
                        <h2>Notify</h2>
                        <a href="<?= site_url('panel/notify?add=true'); ?>" class="btn btn-raised btn-primary m-t-15 waves-effect">Add</a>
                    </div>
                    <div class="body table-responsive members_profiles">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Content</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($notify) > 0) {
                                    foreach ($notify as $key => $value) {
                                ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                    <?php
                                    switch ($value->nf_typeid) {
                                        case '1':
                                            echo 'Login';
                                            break;

                                        case '2':
                                            echo "Register";
                                            break;

                                        default:
                                            # code...
                                            break;
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    switch ($value->nf_status_id) {
                                        case '1':
                                            echo "Success";
                                            break;

                                        case '2':
                                            echo "Error";
                                            break;

                                        default:
                                            # code...
                                            break;
                                    }
                                    ?>
                                    </td>
                                    <td><?= $value->nf_content; ?></td>
                                    <td><?= $value->nf_datecreated; ?></td>
                                    <td>
                                        <a class="badge badge-info" href="<?= site_url('panel/notify?edit=').$value->nf_notificationid; ?>">Edit</a>
                                        <a class="badge badge-warning" href="<?= site_url('panel/notify?remove=').$value->nf_notificationid; ?>">Remove</a>
                                    </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

<?php include 'footer.php'; ?>