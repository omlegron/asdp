

<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $cabang=cabangs();
        //die("asdasd");
    ?>
        <script type="text/javascript">
           
        </script>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add File PDF</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <label>File PDF</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="application/pdf" required="">
                                </div>
                                <div class="col-lg-6">
                                    <label>Filename</label>
                                    <input name="filename" type="text" class="form-control" placeholder="Filename" required="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Kategori</label>
                                    <select class="form-control show-tick" name="kategori" required="">
                                        <option value="">Pilih Salah Satu</option>
                                        <option value="Pelabuhan">Pelabuhan</option>
                                        <option value="Armada">Armada</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
                                    
                                    
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('edit')) { 
        $cabangs=cabangs();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit File PDF</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'file');
                        if (count($val)) {
                            $img=check_img($val[0]->fileurl);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <label>File PDF</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="application/pdf">
                                </div>
                                <div class="col-lg-6">
                                    <label>Filename</label>
                                    <input name="filename" type="text" class="form-control" placeholder="Filename" value="<?= $val[0]->filename; ?>" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?= $val[0]->deskripsi; ?></textarea>
                                    </div>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label>Kategori</label>
                                    <?php
                                        $pelaB = '';
                                        $armaD = '';
                                        if($val[0]->kategori == 'Pelabuhan'){
                                            $pelaB = 'selected';
                                        }elseif($val[0]->kategori == 'Armada'){
                                            $armaD = 'selected';
                                        }
                                    ?>
                                    <select class="form-control show-tick" name="kategori" required="">
                                        <option value="">Pilih Salah Satu</option>
                                        <option value="Pelabuhan" <?= $pelaB; ?> >Pelabuhan</option>
                                        <option value="Armada" <?= $armaD; ?> >Armada</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <iframe src="<?=site_url().$val[0]->fileurl;?>" style="width: 100%;height: 500px">
                                    </iframe>
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

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit')) { ?>
       <script>
            // $(document).ready(function(){
            //     $('#example').dataTable( {
            //         "paging": true,
            //         "dom": '<"toolbar">frtip',
            //         // 'filter': false,
            //         // processing: true,
            //     } );
            //     $('#example_filter').hide()
            // });
            // $(document).on('click','.searchs', function () {
            //     var table = $('#example').DataTable();
            //     table.columns( 1 ).search( $('input[name="filter[name]"]').val() ).draw();
            //     table.columns( 3 ).search( $('select[name="filter[status]"]').val() ).draw();
            // } );
            // $(document).ready(function(){
            //     $.fn.dataTable.ext.errMode = 'none';

            //     $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
            //     }) ;
            // });   

            // $(document).on('click','.reset',function(e){
            //     $('input').val('');
            //     $('select').val('')
            //     var table = $('#example').DataTable();
            //     table.columns( 1 ).search("").draw();
            //     table.columns( 3 ).search("").draw();
            // });     

        </script>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>Standarisasi</h2>
                            </div>
                            <div class="col-lg-2">
                                <?php
                                if(($this->session->userdata('admin_data')->roles != 4) && ($this->session->userdata('admin_data')->roles != 3)){
                                ?>    
                                    <a class="btn btn-primary" href="<?= site_url('panel/file?add=true'); ?>">Add File</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 pull-right" style="position: relative;left: 20px;top: 20px;">
                        <div class="input-group" style="width: 150px;"> 
                          <input type="text" name="filter[name]" placeholder="Cabang" class="form-control" style="border: 1px solid black !important;position: relative;top: 10px;width: 150px">&nbsp;&nbsp;&nbsp;
                          <select name="filter[status]" class="form-control show-tick" id="removeSlect">
                              <option value="">Choose One</option>
                              <option value="Pelabuhan">Pelabuhan</option>
                              <option value="Armada">Armada</option>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                          </div>
                          <div class="input-group-btn">
                              <button type="reset" class="btn btn-primary reset" style="position: relative;top: 4px;">Reset </button>
                          </div>
                        </div>
                    </div> -->
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Filename</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>                             
                                    <th style="width: 120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = $this->m_model->all('file');
                            
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                $desk = '-';
                                if(isset($value->deskripsi)){
                                    $desk = $value->deskripsi;
                                }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $value->filename; ?>
                                    </td>
                                    <td>
                                        <?= $value->kategori; ?>
                                    </td>
                                    <td><p><?= $desk; ?></p></td>
                                    <td>
                                        <?php
                                            if(($this->session->userdata('admin_data')->roles != 4) && ($this->session->userdata('admin_data')->roles != 3)){
                                        ?>
                                        <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/file?edit=').$value->id; ?>" >Edit</a>
                                        <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/file?remove=').$value->id; ?>">Delete</a>
                                        <?php
                                            }
                                        ?>
                                        <a class="badge badge-primary" target="_blank" href="<?= site_url('').$value->fileurl; ?>">Download</a>
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

<script>
$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>