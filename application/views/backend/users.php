<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
         $roles = $this->m_model->select('roles');
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Users</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" minlength="8" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label >Role User</label>
                                        <select name="roles" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                            <?php
                                                foreach ($roles as $key => $valueRoles) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valueRoles->id;?>"><?=$valueRoles->roles;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="form-group col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail Logo</label>
                                        <input name="thumbnail_logo" type="file" class="form-control">
                                    </div>
                                </div>-->
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Add Users" class="btn btn-block btn-primary">
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
                        <h2>Edit Users</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'users');
                        $roles = $this->m_model->select('roles');
                        if(count($val)>0){
                    ?>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <label for="username">Username</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$val[0]->id;?>" required>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?=$val[0]->username;?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?=$val[0]->email;?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Fill if you want change the Password" name="password" minlength="8">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label >Role User</label>
                                    <select name="roles" class="form-control show-tick" required>
                                        <option value="">Pilih</option>
                                        <?php
                                            foreach ($roles as $key => $valueRoles) {
                                                # code...
                                                $selected="";
                                                if($valueRoles->id == $val[0]->roles){
                                                    $selected="selected";
                                                }
                                        ?>
                                                <option value="<?=$valueRoles->id;?>" <?=$selected;?>><?=$valueRoles->roles;?></option>
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
                                    <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
            <?php       } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add')
            && !$this->input->get('edit')
            ) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Users</h2>
                    </div>
                    <div class="body">

                    <a class="btn btn-primary" href="<?= site_url('panel/users?add=true'); ?>">Add User</a><br>

                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $brands = $this->m_model->select('users');
                            if (count($brands) > 0) {
                                $num_popular_brand=0;
                                foreach ($brands as $key => $value) {
                                    //$thumbnail_logo=check_img($value->thumbnail_logo);
                                    $roles="-";
                                    if($value->roles ==1){
                                        $roles="Super Admin";
                                    }
                                    else if($value->roles ==2){
                                        $roles="Admin Pusat";
                                    }
                                    else if($value->roles ==3){
                                        $roles="Admin Cabang";
                                    }
                                    else if($value->roles ==4){
                                        $roles="Viewer";
                                    }
                                    else if($value->roles ==5){
                                        $roles="Admin Sistem";
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->username; ?></td>
                                    <td><?= $value->email; ?></td>
                                    <td><?= $roles; ?></td>
                                    <td>
                                        <a class="confirm badge badge-info" href="<?= site_url('panel/users?edit=').$value->id; ?>" msg="Do you want to Edit data?">Edit</a>
                                        <?php 
                                        if($this->session->userdata('admin_data')->roles == '1'){
                                            //only superadmin
                                        ?>
                                        <a class="confirm badge badge-warning"  href="<?= site_url('panel/users?remove=').$value->id; ?>" msg="Are you sure to Delete data?">Delete</a>
                                        <?php
                                        }?>
                                    </td>
                                </tr>
                            <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<?php include 'footer.php'; ?>