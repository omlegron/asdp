<?php include 'header.php'; ?>
    <?php
    if (isset($err) && $err=="failed_update_product_featured") {
    ?>
    <script type="text/javascript">
        alert("Update Product Featured Failed");
    </script>
    <?php
    }
    ?>
    <?php
    if (isset($err) && $err=="CSV is NULL") {
    ?>
    <script type="text/javascript">
        alert("CVS is Null!");
    </script>
    <?php
    }
    ?>

    <?php if ($this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="body">
                     <?php
                        $data=array();
                        $data['product_store'] = $this->m_model->selectas('product', $this->input->get('edit'), 'product_store');
                        if(count($data['product_store']) >0){
                             $product = $this->m_model->selectas('id', $data['product_store'][0]->product, 'product');
                             $product_image = $this->m_model->selectas('product', $data['product_store'][0]->product, 'product_image');
                            
                        }
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'product_store');
                        if (count($val) > 0) {
                            $cat = $this->m_model->select('category_parent');
                            $catsub = $this->m_model->select('category_sub');
                            $catchild = $this->m_model->select('category_child');
                            $product = $this->m_model->selectas('id', $val[0]->product, 'product');
                            $productDetail = $this->m_model->selectas('product', $val[0]->product, 'product_lang');
                    ?>
                            <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Name</label>
                                        <input name="product_id" type="hidden" value="<?= $product[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $productDetail[0]->title; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Code (SKU)</label>
                                        <input name="code" type="text" class="form-control" value="<?= $product[0]->sku; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name SEO</label>
                                        <input name="seo" type="text" class="form-control" value="<?= $productDetail[0]->seo; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Price</label>
                                        <input name="price" type="text" class="form-control" value="<?= $val[0]->price; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Weight</label>
                                        <input name="weight" type="text" class="form-control" value="<?= $product[0]->weight; ?>" disabled>
                                    </div>
                                </div>

                                <!--<div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Product Status</label>
                                        <select name="statusid" class="form-control show-tick">
                                            <option value="1" <?php if ($val[0]->p_status_id == 1) { echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if ($val[0]->p_status_id == 2) { echo "selected"; } ?>>Nonactive</option>
                                        </select>
                                    </div>
                                </div>-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product Category</label>
                                        <select id="category_parent" name="category_parent" class="form-control show-tick">
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($cat as $key => $value) {

                                            ?>
                                            <option value="<?= $value->id; ?>" <?php if ($value->id == $product[0]->category_parent) { echo "selected"; } ?>><?= $value->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product SubCategory</label>
                                        <select id="category_sub"  name="category_sub" class="form-control show-tick">
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($catsub as $key => $valuesub) {

                                            ?>
                                            <option value="<?= $valuesub->id; ?>" <?php if ($valuesub->id == $product[0]->category_sub) { echo "selected"; } ?>><?= $valuesub->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product Child Category</label>
                                        <select id="category_child" name="category_child" class="form-control show-tick">
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($catchild as $key => $valuechild) {

                                            ?>
                                            <option value="<?= $valuechild->id; ?>" <?php if ($valuechild->id == $product[0]->category_child  ) { echo "selected"; } ?>><?= $valuechild->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-lg-12">
                                    <label class="form-label">Product Description</label>
                                    <textarea name="desc" id="ckeditor"><?= $productDetail[0]->description;; ?></textarea>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" name="save" value="true">Save</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= site_url('assets/backend/js/pages/forms/editors.js'); ?>"></script>
    <script src="<?= site_url('assets/backend/plugins/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
        $(document).on('change', '#category_parent', function(){
            dataMap={};
            dataMap['category_parent']=$(this).val()
            $.post('<?=base_url();?>panel/subcategory', dataMap, function(data){
                $('#category_sub').html(data);
                $('#category_child').html('<option value="">Pilih</option>');
                $('#category_child').val('');
            })
        })

        $(document).on('change', '#category_sub', function(){
            dataMap={};
            dataMap['category_sub']=$(this).val()
            $.post('<?=base_url();?>panel/childcategory', dataMap, function(data){
                $('#category_child').html(data);
            })
        })
    </script>
    <?php } ?>

    <?php if ($this->input->get('upload-product')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Upload Products</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">CVS Product</label>
                                        <input type="file" name="cvs_product"  accept=".csv">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2">
                                    <input name="upload_product" type="submit" value="Save" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= site_url('assets/backend/js/pages/forms/editors.js'); ?>"></script>
    <script src="<?= site_url('assets/backend/plugins/ckeditor/ckeditor.js'); ?>"></script>
    <?php } ?>

    <?php if ($this->input->get('view') && $this->input->get('type')==null) { 
        $data=array();
        $data['product_store'] = $this->m_model->selectas('product', $this->input->get('view'), 'product_store');
        if(count($data['product_store']) >0){
             $product = $this->m_model->selectas('id', $data['product_store'][0]->product, 'product');
             $product_image = $this->m_model->selectas('product', $data['product_store'][0]->product, 'product_image');
            
        }
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>View Product</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('view'), 'product_store');
                        if (count($val) > 0) {
                            $cat = $this->m_model->select('category_parent');
                            $catsub = $this->m_model->select('category_sub');
                            $catchild = $this->m_model->select('category_child');
                            $product = $this->m_model->selectas('id', $val[0]->product, 'product');
                            $productDetail = $this->m_model->selectas('product', $val[0]->product, 'product_lang');
                    ?>
                        <form class="form-horizontal" action="" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Name</label>
                                        <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                                        <input name="name" type="text" class="form-control" value="<?= $productDetail[0]->title; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Code (SKU)</label>
                                        <input name="code" type="text" class="form-control" value="<?= $product[0]->sku; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Name SEO</label>
                                        <input name="seo" type="text" class="form-control" value="<?= $productDetail[0]->seo; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Price</label>
                                        <input name="price" type="text" class="form-control" value="<?= $val[0]->price; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group form-float">
                                        <label class="form-label">Product Weight</label>
                                        <input name="weight" type="text" class="form-control" value="<?= $product[0]->weight; ?>" disabled>
                                    </div>
                                </div>

                                <!--<div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Product Status</label>
                                        <select name="statusid" class="form-control show-tick">
                                            <option value="1" <?php if ($val[0]->p_status_id == 1) { echo "selected"; } ?>>Active</option>
                                            <option value="2" <?php if ($val[0]->p_status_id == 2) { echo "selected"; } ?>>Nonactive</option>
                                        </select>
                                    </div>
                                </div>-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product Category</label>
                                        <select name="category_parent" class="form-control show-tick" disabled>
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($cat as $key => $value) {

                                            ?>
                                            <option value="<?= $value->id; ?>" <?php if ($value->id == $product[0]->category_parent) { echo "selected"; } ?>><?= $value->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product SubCategory</label>
                                        <select name="category_sub" class="form-control show-tick" disabled>
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($catsub as $key => $valuesub) {

                                            ?>
                                            <option value="<?= $valuesub->id; ?>" <?php if ($valuesub->id == $product[0]->category_sub) { echo "selected"; } ?>><?= $valuesub->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Product Child Category</label>
                                        <select name="category_child" class="form-control show-tick" disabled="">
                                            <option value="">Pilih</option>
                                            <?php if (count($cat) > 0) {
                                                foreach ($catchild as $key => $valuechild) {

                                            ?>
                                            <option value="<?= $valuechild->id; ?>" <?php if ($valuechild->id == $product[0]->category_child  ) { echo "selected"; } ?>><?= $valuechild->name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-lg-12">
                                    <label class="form-label">Product Description</label>
                                    <textarea name="desc" id="ckeditor"><?= $productDetail[0]->description;; ?></textarea>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= site_url('assets/backend/js/pages/forms/editors.js'); ?>"></script>
    <script src="<?= site_url('assets/backend/plugins/ckeditor/ckeditor.js'); ?>"></script>
    <?php } ?>

    <?php if (!$this->input->get('edit') && !$this->input->get('view') && !$this->input->get('view_product_featured') && !$this->input->get('upload-product')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-3">
                                <h2>Products</h2>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?= site_url('panel/products?view=true && type=most_popular'); ?>" class="btn btn-primary center" id="btn_most_popular">
                                    <i class="zmdi zmdi-view-list-alt"></i> Most Popular Products
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?= site_url('panel/products?view=true && type=best_seller'); ?>" class="btn btn-primary float-right" id="btn_best_seller">
                                    <i class="zmdi zmdi-view-list-alt"></i> Best Seller Products
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <a href="<?= site_url('panel/products?view=true && type=product_featured'); ?>" class="btn btn-primary float-right" id="btn_product_featured">
                                    <i class="zmdi zmdi-view-list-alt"></i> Products Featured
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <a href="<?= site_url('panel/products?upload-product=true'); ?>" class="btn btn-primary" id="btn_product_featured">
                                    <i class="zmdi zmdi-file-add"></i> Upload Products
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>                                    
                                    <th>Category</th>                                    
                                    <th>Supplier</th>                                    
                                    <th>Status</th>                                    
                                    <th>Price</th>                                    
                                    <!--
                                    <th>Created</th>                                    
                                    <th>Updated</th>
                                    -->                                
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $productStore = $this->m_model->select('product_store');
                            $num_product_featured=0;
                            $num_best_seller=0;
                            $num_most_popular=0;
                            $num_fs=0;
                            if (count($productStore) > 0) {
                                foreach ($productStore as $key => $value) {
                                    $product = $this->m_model->selectas('id', $value->product, 'product');
                                    $productDetail = $this->m_model->selectas('product', $value->product, 'product_lang');
                                    if($value->product_featured ==1){
                                        $ico_pf='<i id="ico_pf" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_pf='success';
                                        $num_product_featured++;
                                    }
                                    else{
                                        $ico_pf='<i id="ico_pf" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_pf='danger';
                                    }

                                    if($value->best_seller ==1){
                                        $ico_bs='<i id="ico_bs" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_bs='success';
                                        $num_best_seller++;
                                    }
                                    else{
                                        $ico_bs='<i id="ico_pf" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_bs='danger';
                                    }

                                    if($value->most_popular ==1){
                                        $ico_mp='<i id="ico_mp" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_mp='success';
                                        $num_most_popular++;
                                    }
                                    else{
                                        $ico_mp='<i id="ico_mp" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_mp='danger';
                                    }

                                    if($value->flash_sale ==1){
                                        $ico_fs='<i id="ico_mp" class="zmdi zmdi-check" style="font-size:12px;"></i>';
                                        $theme_fs='success';
                                        $num_fs++;
                                    }
                                    else{
                                        $ico_fs='<i id="ico_mp" class="zmdi zmdi-close" style="font-size:12px;"></i>';
                                        $theme_fs='danger';
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?php if (count($productDetail) > 0) {
                                        echo $productDetail[0]->title;
                                    } ?>
                                    </td>
                                    <td>
                                    <?php
                                    if (count($product) > 0) {
                                        $cat = $this->m_model->selectas('id', $product[0]->category_parent, 'category_parent');
                                        if (count($cat) > 0) {
                                            echo $cat[0]->name;
                                        }
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                        $sup = $this->m_model->selectas('id', $value->user, 'user');
                                        if (count($sup) > 0) {
                                            echo $sup[0]->name;
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                    if (count($product) > 0) {
                                        switch ($product[0]->status) {
                                            case '0':
                                                echo '<span class="badge badge-success">Active</span>';
                                                break;
                                            case '1':
                                                echo '<span class="badge badge-warning">Nonaktif</span>';
                                                break;                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                    }
                                    ?>
                                    </td>
                                    <td><?= 'Rp'.number_format($value->price); ?></td>
                                    <!--
                                    <td><?= $value->p_datecreated; ?></td>
                                    <td><?= $value->p_dateupdate; ?></td>
                                    -->
                                    <td>
                                        <!--<a class="badge badge-info" href="#">Edit</a>-->
                                        <a class="badge badge-warning" href="<?= site_url('panel/products?edit=').$value->id; ?>">Edit</a>
                                        <a class="badge badge-info" href="<?= site_url('panel/products?view=').$value->id; ?>">View</a>
                                        <a href="<?= site_url('panel/products?update='.$value->id.'&&flash_sale='.$value->flash_sale); ?>" class="badge badge-<?=$theme_fs;?>">
                                            <?=$ico_fs;?>&nbsp Flash Sale
                                        </a>
                                        <a href="<?= site_url('panel/products?update='.$value->id.'&&product_featured='.$value->product_featured); ?>" class="badge badge-<?=$theme_pf;?>">
                                            <?=$ico_pf;?>&nbsp Product Featured
                                        </a>
                                        <a href="<?= site_url('panel/products?update='.$value->id.'&&best_seller='.$value->best_seller); ?>" class="badge badge-<?=$theme_bs;?>">
                                            <?=$ico_bs;?>&nbsp Best Seller
                                        </a>
                                        <a href="<?= site_url('panel/products?update='.$value->id.'&&most_popular='.$value->most_popular); ?>" class="badge badge-<?=$theme_mp;?>">
                                            <?=$ico_mp;?>&nbsp Most Popular
                                        </a>
                                    </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#btn_product_featured').append(" (<?=$num_product_featured;?>)")
            $('#btn_best_seller').append(" (<?=$num_best_seller;?>)")
            $('#btn_most_popular').append(" (<?=$num_most_popular;?>)")
        </script>
    <?php } ?>

    <?php
    if($this->input->get('view')!=null && $this->input->get('type')!=null){
        $title='';
        switch (strtolower($this->input->get('type'))) {
            case 'best_seller':
                # code...
                    $title="Best Seller Products";
                    $where="best_seller=1";
                break;
            case 'product_featured':
                # code...
                    $title="Products Featured";
                    $where="product_featured=1";
                break;
            case 'most_popular':
                # code...
                    $title="Most Popular Products";
                    $where="most_popular=1";
                break;
            
            default:
                # code...
                break;
        }
    ?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-lg-10">
                            <a class="float-left mr-4" href="<?= site_url('panel/products'); ?>" title="back">
                                <i class="zmdi zmdi-arrow-left zmdi-hc-2x"></i>
                            </a>
                            <h2 class="float-left">List <?=$title;?></h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="row">
    <?php
        $similarProduct = $this->m_model->selectasmax(4, $where, 'product_store');
            if (count($similarProduct)) { 
            foreach ($similarProduct as $key => $value) {
                $product = $this->m_model->selectas('id', $value->product, 'product');
                if (count($product) > 0) {
                    $product_detail = $this->m_model->selectaslang('product', $product[0]->id, 'product_lang');
                    $product_image = $this->m_model->selectas('product', $product[0]->id, 'product_image');
                    if (count($product_image) > 0) {
                        $img = base_url('images/product/').$product_image[0]->small;
                    } else {
                        $img = base_url('images/product/images.jpeg');
                    }
    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product-card d-flex flex-column" style="min-height: 410px;">
                            <a class="product-thumb" href="<?= base_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>">
                                <img src="<?= $img; ?>" alt="Product" style="width: 100%;">
                            </a>
                            <h3 class="product-title">
                                <a href="<?= base_url('product/detail/').$value->id.'/'.$product_detail[0]->seo; ?>"><?= $product_detail[0]->title; ?></a>
                            </h3>
                            <h4 class="product-price mt-auto">
                                <?= 'Rp '.number_format($value->price); ?>
                            </h4>
                        </div>
                    </div>
    <?php
                }
            }
        }
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

<?php include 'footer.php'; ?>