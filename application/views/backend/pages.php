<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Page</h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#id">Indonesia</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#eng">English</a></li>
                        </ul>                        
                        <!-- Tab panes -->
                        <form class="form-horizontal" action="" method="post">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="id">
                                    <!-- Content in panel -->
                                    <div class="row clearfix" style="margin-top: 15px;">
                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Judul Halaman</label>
                                                <input name="id_title" type="text" class="form-control" placeholder="Judul Halaman">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="id_desc" id="ckeditor"></textarea>
                                        </div>
                                    </div>

                                    <div class="row clearfix" style="margin-top: 20px;">
                                        <div class="col-lg-2">
                                            <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                    <!-- End content panel -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="eng">
                                    <!-- Content in panel -->
                                    <div class="row clearfix" style="margin-top: 15px;">
                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Title</label>
                                                <input name="eng_title" type="text" class="form-control" placeholder="Page Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Description</label>
                                            <textarea name="eng_desc" id="ckeditor2"></textarea>
                                        </div>
                                    </div>

                                    <div class="row clearfix" style="margin-top: 20px;">
                                        <div class="col-lg-2">
                                            <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                    <!-- End content panel -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!--<script src="<?= site_url('assets/backend/js/pages/forms/editors.js'); ?>"></script>
    <script src="<?= site_url('assets/backend/plugins/ckeditor/ckeditor.js'); ?>"></script>-->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'#ckeditor2',
                    plugins: "advlist autolink link image lists charmap print preview code",
                    toolbar: "undo redo | styleselect | bold italic | link image | numlist bullist"});

        tinymce.init({ selector:'#ckeditor',
                        plugins: "advlist autolink link image lists charmap print preview code",
                        toolbar: "undo redo | styleselect | bold italic | link image | numlist bullist"});
    </script>
    <?php } ?>

    <?php if ($this->input->get('edit')) {?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Page</h2>
                    </div>
                    <div class="body">
                    <?php
                    $val1 = $this->m_model->selectas2('seo', $this->input->get('edit'), 'lang', 'id', 'pages');
                    $val2 = $this->m_model->selectas2('seo', $this->input->get('edit'), 'lang', 'eng', 'pages');
                    if (count($val1) > 0) {
                    ?>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#id">Indonesia</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#eng">English</a></li>
                        </ul>                        
                        <!-- Tab panes -->
                        <form class="form-horizontal" action="" method="post">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="id">
                                    <!-- Content in panel -->
                                    <div class="row clearfix" style="margin-top: 15px;">
                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Judul Halaman</label>
                                                <input name="ref" type="hidden" value="<?= $val1[0]->seo; ?>">
                                                <input name="id_title" type="text" class="form-control" value="<?= $val1[0]->title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="id_desc" id="ckeditor"><?= $val1[0]->description; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row clearfix" style="margin-top: 20px;">
                                        <div class="col-lg-2">
                                            <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                    <!-- End content panel -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="eng">
                                    <!-- Content in panel -->
                                    <div class="row clearfix" style="margin-top: 15px;">
                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Title</label>
                                                <input name="eng_title" type="text" class="form-control" value="<?= $val2[0]->title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Description</label>
                                            <textarea name="eng_desc" id="ckeditor2"><?= $val2[0]->description; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row clearfix" style="margin-top: 20px;">
                                        <div class="col-lg-2">
                                            <input name="save" type="submit" value="Save" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                    <!-- End content panel -->
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'#ckeditor2', plugins: "advlist autolink link image lists charmap print preview code",
  toolbar: "undo redo | styleselect | bold italic | link image | numlist bullist"});tinymce.init({ selector:'#ckeditor', plugins: "advlist autolink link image lists charmap print preview code",
  toolbar: "undo redo | styleselect | bold italic | link image | numlist bullist"});</script>
    <!--<script src="<?= site_url('assets/backend/js/pages/forms/editors.js'); ?>"></script>
    <script src="<?= site_url('assets/backend/plugins/ckeditor/ckeditor.js'); ?>"></script>-->
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Pages</h2>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-primary" href="<?= site_url('panel/pages?add=true'); ?>">Add Page</a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>URL</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $pages = $this->m_model->selectas('lang', 'eng', 'pages');
                            if (count($pages) > 0) {
                                foreach ($pages as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $value->title; ?></td>
                                    <td><a target="_blank" href="<?= site_url('page/p/').$value->seo; ?>"><?= site_url('page/p/').$value->seo; ?></a></td>
                                    <td>
                                        <a msg="Do you want to Edit data?" class="confirm badge badge-info" href="<?= site_url('panel/pages?edit=').$value->seo; ?>">Edit</a>
                                        <a msg="Are you sure to Delete data?" class="confirm badge badge-warning" href="<?= site_url('panel/pages?remove=').$value->seo; ?>">Delete</a>
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