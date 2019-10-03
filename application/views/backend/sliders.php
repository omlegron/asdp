<?php include 'header.php'; ?>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>Sliders</h2>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Caption</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($sliders) > 0) {
                            foreach ($sliders as $key => $slider) {
                                ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $slider->title; ?></td>
                                    <td><?= $slider->caption; ?></td>
                                    <td><?= $slider->img_url; ?></td>
                                    <td><?= $slider->link_url; ?></td>
                                    <td>
                                        <a class="badge badge-info" href="#">Edit</a>
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


<?php include 'footer.php'; ?>