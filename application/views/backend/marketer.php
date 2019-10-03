<?php include 'header.php'; ?>

    <?php if ($this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Marketer</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'user');
                        if (count($val)) {
                    ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $val[0]->name; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control" value="<?= $val[0]->email; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Phone</label>
                                        <input name="phone" type="text" class="form-control" value="<?= $val[0]->phone; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-control show-tick">
                                            <option value="0" <?php if ($val[0]->gender == 0) { echo "selected"; } ?>>Male</option>
                                            <option value="1" <?php if ($val[0]->gender == 1) { echo "selected"; } ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
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

    <?php if (!$this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Marketer</h2>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Name / Email</th>
                                    <th>Store</th>
                                    <th>Acc. Bank</th>
                                    <th>Phone</th>
                                    <th>Register</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $marketer = $this->m_model->selectas('user_role2', 3, 'user');
                            if (count($marketer) > 0) {
                                foreach ($marketer as $key => $value) {
                                    //get account bank
                                    $user_bank= $this->m_model->selectas('user', $value->id, 'user_bank');
                                    $store = $this->m_model->selectas('user', $value->id, 'store');
                                    $store_id= '-';
                                    $store_name= '-';
                                    if(count($store)>0){
                                        $store_id= $store[0]->id;
                                        $store_name= $store[0]->brand;
                                    }

                                    if(count($user_bank)>0){
                                        $bank= "(".$user_bank[0]->bank.")";
                                        $bankRek= $user_bank[0]->account_number;
                                        $nameRek= $user_bank[0]->account_name;
                                    }else{
                                        $bank= '';
                                        $bankRek= '-';
                                        }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $value->name." (".$value->id.")"; ?>
                                        <br>
                                        <?= $value->email; ?>
                                    </td>
                                    <td><?= $store_name." (".$store_id.")"; ?></td>
                                    <td>
                                        <strong>Name</strong>: <?=$bankRek;?>
                                        <br>
                                        <strong>Number</strong>: <?=$bankRek;?> <?=$bank;?>
                                    </td>
                                    <td><?= $value->phone; ?></td>
                                    <td><?= $value->register; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/marketer?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Deactive data?" href="<?= site_url('panel/marketer?remove=').$value->id; ?>">Deactive</a>
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