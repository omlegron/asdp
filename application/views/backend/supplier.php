<?php include 'header.php'; ?>

    <?php if ($this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Supplier</h2>
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
    <?php if ($this->input->get('viewBank')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Supplier</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('viewBank'), 'user_bank');
                        if (count($val)) {
                            if(count($val)>0){
                                $bank= "(".$val[0]->bank.")";
                                $bankRek= $val[0]->account_number;
                                $nameRek= $val[0]->account_name;
                            }else{
                                $bank= '';
                                $bankRek= '-';
                                $nameRek= '-';
                            }
                    ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Bank</label>
                                        <input name="name" type="text" class="form-control" value="<?= $bank; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name Rek</label>
                                        <input name="email" type="text" class="form-control" value="<?= $nameRek; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Bank Rek</label>
                                        <input name="phone" type="text" class="form-control" value="<?= $bankRek; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label">Foto KTP</label>
                                            <br>
                                            <img src="<?=base_url().$val[0]->foto_ktp;?>" class="img-responsive">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Foto Buku Tabungan</label>
                                            <br>
                                            <img src="<?=base_url().$val[0]->foto_buku_tabungan;?>" class="img-responsive">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=base_url();?>panel/supplier" class="btn btn-block btn-primary">Back</a>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('edit') && !$this->input->get('viewBank')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Supplier</h2>
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
                            <?php $supplier = $this->m_model->selectas('user_role2', 2, 'user');
                            if (count($supplier) > 0) {
                                foreach ($supplier as $key => $value) {
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
                                        $userBankId= $user_bank[0]->id;
                                    }else{
                                        $bank= '';
                                        $bankRek= '-';
                                        $nameRek= '-';
                                        $userBankId= '';
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
                                        <br>
                                        <?php
                                            if($userBankId!=null){
                                        ?>
                                                <a class="badge badge-info" href="<?= site_url('panel/supplier?viewBank=').$userBankId; ?>">View</a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?= $value->phone; ?></td>
                                    <td><?= $value->register; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/supplier?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning"  msg="Are you sure to Deactive data?" href="<?= site_url('panel/supplier?remove=').$value->id; ?>">Deactive</a>
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