<?php include 'header.php'; ?>

    <?php if ($this->input->get('order-navbar')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Order Navbar</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                $sql="select * from category_parent ORDER BY order_nav ASC, id ASC";
                                $category = $this->m_model->selectcustom($sql);
                            if (count($category) > 0) {
                                $num_category=count($category);
                                foreach ($category as $key => $value) {
                            ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value->name; ?></td>
                                            <td>
                                                <input name="id_<?=$value->id;?>" type="hidden" class="form-control" placeholder="Category Id" value="<?= $value->id; ?>">
                                                <input name="order_navbar_<?=$value->id;?>" type="number" class="form-control" placeholder="Order" value="<?= $value->order_nav; ?>" max="<?=$num_category;?>" min="0" required>
                                            </td>
                                        </tr>
                            <?php
                                }
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="save_order_nav" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Categories</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Main Thumbnail</label>
                                        <input name="main_thumbnail" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail #1</label>
                                        <input name="thumbnail1" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail #2</label>
                                        <input name="thumbnail2" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="add" type="submit" value="Add Category" class="btn btn-block btn-primary">
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
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'category_parent');
                        $main_thumb="";
                        $thumb1="";
                        $thumb2="";
                        if (count($val)) {
                            if($val[0]->main_thumbnail!=null){
                                $main_thumb='<img style="width:30%; height:auto;" src="'.site_url($val[0]->main_thumbnail).'">';
                            }
                            if($val[0]->thumbnail1!=null){
                                $thumb1='<img style="width:30%; height:auto;" src="'.site_url($val[0]->thumbnail1).'">';
                            }
                            if($val[0]->thumbnail2!=null){
                                $thumb2='<img style="width:30%; height:auto;" src="'.site_url($val[0]->thumbnail2).'">';
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
                                        <label class="form-label">Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" value="<?= $val[0]->name_id; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Main Thumbnail</label>
                                        <input name="main_thumbnail" type="file" class="form-control">
                                    </div>
                                    <?= $main_thumb; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail #1</label>
                                        <input name="thumbnail1" type="file" class="form-control">
                                    </div>
                                    <?= $thumb1; ?>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Thumbnail #2</label>
                                        <input name="thumbnail2" type="file" class="form-control">
                                    </div>
                                    <?= $thumb2; ?>
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

    <?php if ($this->input->get('addsub')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Sub Categories</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category</label>
                                        <select name="category_parent" class="form-control">
                                            <?php $category = $this->m_model->select('category_parent');
                                            if (count($category) > 0) {
                                                foreach ($category as $key => $value) {
                                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Sub Category Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" placeholder="Sub Category Name">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="addsub" type="submit" value="Add Sub Category" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('editsub')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Sub Categories</h2>
                    </div>
                    <div class="body">
                        <?php
                        $category_sub = $this->m_model->selectas('id', $this->input->get('editsub'), 'category_sub');
                        if (count($category_sub) > 0) {
                        ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category</label>
                                        <select name="category_parent" class="form-control">
                                            <?php $category = $this->m_model->select('category_parent');
                                            if (count($category) > 0) {
                                                foreach ($category as $key => $value) {
                                                    if ($category_sub[0]->category_parent == $value->id) {
                                                        echo '<option value="'.$value->id.'" selected>'.$value->name.'</option>';
                                                    } else {
                                                        echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                    }
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category Name</label>
                                        <input name="id" type="hidden" value="<?= $category_sub[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $category_sub[0]->name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" value="<?= $category_sub[0]->name_id; ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="savesub" type="submit" value="Edit Sub Category" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('addchild')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Sub Child</h2>
                    </div>
                    <div class="body">

                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category</label>
                                        <select name="category_parent" id="category_parent" class="form-control" required="">
                                            <?php $category = $this->m_model->select('category_parent');
                                            if (count($category) > 0) {
                                                foreach ($category as $key => $value) {
                                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category</label>
                                        <select name="category_sub" id="category_sub" class="form-control" required="">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Child Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Sub Child Name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Child Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" placeholder="Sub Child Name" required="">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="addchild" type="submit" value="Add Sub Child" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('editchild')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Sub Child</h2>
                    </div>
                    <div class="body">
                        <?php
                        $category_child = $this->m_model->selectas('id', $this->input->get('editchild'), 'category_child');
                        if (count($category_child) > 0) {
                        ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Category</label>
                                        <select name="category_parent" id="category_parent" class="form-control" required="">
                                            <?php $category = $this->m_model->select('category_parent');
                                            if (count($category) > 0) {
                                                foreach ($category as $key => $value) {
                                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                             } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Category</label>
                                        <select name="category_sub" id="category_sub" class="form-control" required="">
                                            <option value="<?= $category_child[0]->category_sub; ?>">
                                            <?php $category_subs =  $this->m_model->selectas('id', $category_child[0]->category_sub, 'category_sub');
                                            if (count($category_subs) > 0) {
                                                 echo $category_subs[0]->name;
                                             } ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Child Name</label>
                                        <input name="id" type="hidden" value="<?= $category_child[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $category_child[0]->name; ?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Sub Child Name (Indonesia)</label>
                                        <input name="name_id" type="text" class="form-control" value="<?= $category_child[0]->name_id; ?>" required="">
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <input name="savechild" type="submit" value="Save Sub Child" class="btn btn-block btn-primary">
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
            && !$this->input->get('addsub')
            && !$this->input->get('editsub')
            && !$this->input->get('addchild')
            && !$this->input->get('editchild')
            && !$this->input->get('order-navbar')
            ) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Categories</h2>
                    </div>
                    <div class="body">

                    <a class="btn btn-primary" href="<?= site_url('panel/categories?add=true'); ?>">Add Categories</a>
                    <a class="btn btn-primary" href="<?= site_url('panel/categories?order-navbar=true'); ?>">Category Order</a><br>

                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name / Bahasa</th>
                                    <th>Sub Category</th>                                    
                                    <th>Sub Child</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $category = $this->m_model->select('category_parent');
                            if (count($category) > 0) {
                                $num_top_category=0;
                                foreach ($category as $key => $value) {
                                    if($value->top_category ==1){
                                        $ico_tc='<i id="ico_mp" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_tc='success';
                                        $num_top_category++;
                                    }
                                    else{
                                        $ico_tc='<i id="ico_mp" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_tc='danger';
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->name; ?> / <?= $value->name_id; ?> <br>(<?= $value->id; ?>)</td>
                                    <td><a class="badge badge-primary" href="<?= site_url('panel/categories?addsub=true'); ?>">Add Sub Category</a></td>
                                    <td></td>
                                    <td>
                                        <a class="confirm badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/categories?edit=').$value->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="#">Delete</a>
                                        <a class="badge badge-<?= $theme_tc;?>" href="<?= site_url('panel/categories?update='.$value->id.'&&top_category='.$value->top_category); ?>">
                                            <?=$ico_tc;?>
                                            Top Category
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            $subcategory = $this->m_model->selectas('category_parent', $value->id, 'category_sub');
                            if (count($subcategory) > 0) {
                                foreach ($subcategory as $keysub => $valuesub) { ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td><?= $valuesub->name; ?> / <?= $valuesub->name_id; ?><br>(<?= $valuesub->id; ?>)</td>
                                    <td><a class="badge badge-primary" href="<?= site_url('panel/categories?addchild=true'); ?>">Add Sub Child</a></td>
                                    <td>
                                        <a class="badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/categories?editsub=').$valuesub->id; ?>">Edit</a>
                                        <a class="badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/categories?removesub=').$valuesub->id; ?>">Delete</a>
                                    </td>
                                </tr>


                            <?php
                            $subchild = $this->m_model->selectas('category_sub', $valuesub->id, 'category_child');
                            if (count($subchild) > 0) {
                                foreach ($subchild as $keychild => $valuechild) { ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><?= $valuechild->name; ?> / <?= $valuechild->name_id; ?><br>(<?= $valuechild->id; ?>)</td>
                                    <td>
                                        <a class="confirm badge badge-info"  msg="Do you want to Edit data?" href="<?= site_url('panel/categories?editchild=').$valuechild->id; ?>">Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/categories?removechild=').$valuechild->id; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            ?>


                                <?php
                                }
                            }
                            ?>

                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<script>
$(document).ready(function(){

    $("#category_parent").change(function(){
        var catid = $(this).val();
        $.ajax({
            url: '<?= site_url('ajax/subcat'); ?>',
            type: 'post',
            data: {category:catid},
            dataType: 'json',
            success:function(response){
                console.log(response);
                var len = response.length;
                $("#category_sub").empty();

                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $("#category_sub").append("<option value='"+id+"'>"+name+"</option>");
                }
                
            },
            error: function() {
                $("#category_sub").empty();
                $("#category_sub").append("<option value=''>Select</option>");
           }
        });
    });

});
</script>

<?php include 'footer.php'; ?>