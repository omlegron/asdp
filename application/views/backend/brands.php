<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Brand</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Brand Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Brand Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                    </div>
                                </div>
                                <!--<div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail Logo</label>
                                        <input name="thumbnail_logo" type="file" class="form-control">
                                    </div>
                                </div>-->
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Add Brand" class="btn btn-block btn-primary">
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
                        <h2>Edit Categories</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'brands');
                        $logo="";
                        $thumbnail_logo="";
                        if (count($val)) {
                            if($val[0]->logo!=null){
                                $logo='<img style="width:30%; height:auto;" src="'.site_url($val[0]->logo).'">';
                            }
                            if($val[0]->thumbnail_logo!=null){
                                $thumbnail_logo='<img style="width:30%; height:auto;" src="'.site_url($val[0]->thumbnail_logo).'">';
                            }
                    ?>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                        <input name="old_logo" type="hidden" value="<?=$val[0]->logo;?>">
                                        <input name="old_thumbnail_logo" type="hidden" value="<?=$val[0]->thumbnail_logo;?>">
                                    </div>
                                    <?= $logo; ?>
                                </div>
                                <!--<div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail Logo</label>
                                        <input name="thumbnail_logo" type="file" class="form-control">
                                    </div>
                                    <?= $thumbnail_logo; ?>
                                </div>-->
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

    <?php if (!$this->input->get('add')
            && !$this->input->get('edit')
            ) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Categories</h2>
                    </div>
                    <div class="body">

                    <a class="btn btn-primary" href="<?= site_url('panel/brands?add=true'); ?>">Add Brand</a><br>

                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name</th>
                                    <th>Logo Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $brands = $this->m_model->select('brands');
                            if (count($brands) > 0) {
                                $num_popular_brand=0;
                                foreach ($brands as $key => $value) {
                                    $thumbnail_logo=check_img($value->thumbnail_logo);
                                    if($value->popular_brand ==1){
                                        $ico_pb='<i id="ico_mp" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_pb='success';
                                        $num_popular_brand++;
                                    }
                                    else{
                                        $ico_pb='<i id="ico_mp" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_pb='danger';
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->name; ?></td>
                                    <td>
                                        <img style="width:20%; height:auto;" src="<?=$thumbnail_logo['path']; ?>"/>
                                    </td>
                                    <td>
                                        <a class="confirm badge badge-info" href="<?= site_url('panel/brands?edit=').$value->id; ?>" msg="Do you want to Edit data?">Edit</a>
                                        <a class="confirm badge badge-warning"  href="<?= site_url('panel/brands?remove=').$value->id; ?>" msg="Are you sure to Delete data?">Delete</a>
                                        <a class="badge badge-<?= $theme_pb;?>" href="<?= site_url('panel/brands?update='.$value->id.'&&popular_brand='.$value->popular_brand); ?>">
                                            <?=$ico_pb;?>
                                            Popular Brand
                                        </a>
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