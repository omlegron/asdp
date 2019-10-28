<?php include 'header.php'; ?>
<script src="<?=base_url();?>assets/frontend/js/jquery.js"></script> 
<style type="text/css">
        
.bg_load {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    background: #EEE;
}

.wrapper {
    /* Size and position */
    font-size: 25px; /* 1em */
    width: 8em;
    height: 8em;
    position: fixed;
    left: 60%;
    top: 50%;
    margin-top: -100px;
    margin-left: -100px;

    /* Styles */
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    border: 1em dashed rgba(138,189,195,0.5);
    box-shadow: 
        inset 0 0 2em rgba(255,255,255,0.3),
        0 0 0 0.7em rgba(255,255,255,0.3);
    animation: rota 3.5s linear infinite;

    /* Font styles */
    font-family: 'Racing Sans One', sans-serif;
    
    color: #444;
    text-align: center;
    text-transform: uppercase;
    text-shadow: 0 .04em rgba(255,255,255,0.9);
    line-height: 6em;
}

.wrapper:before,
.wrapper:after {
    content: "";
    position: absolute;
    z-index: -1;
    border-radius: inherit;
    box-shadow: inset 0 0 2em rgba(255,255,255,0.3);
    border: 1em dashed;
}

.wrapper:before {
    border-color: rgba(138,189,195,0.2);
    top: 0; right: 0; bottom: 0; left: 0;
}

.wrapper:after {
    border-color: rgba(138,189,195,0.4);
    top: 1em; right: 1em; bottom: 1em; left: 1em; 
}

.wrapper .inner {
    width: 100%;
    height: 100%;
    animation: rota 3.5s linear reverse infinite;
}

.wrapper span {
    display: inline-block;
    animation: placeholder 1.5s ease-out infinite;
}

.wrapper span:nth-child(1)  { animation-name: loading-1;  }
.wrapper span:nth-child(2)  { animation-name: loading-2;  }
.wrapper span:nth-child(3)  { animation-name: loading-3;  }
.wrapper span:nth-child(4)  { animation-name: loading-4;  }
.wrapper span:nth-child(5)  { animation-name: loading-5;  }
.wrapper span:nth-child(6)  { animation-name: loading-6;  }
.wrapper span:nth-child(7)  { animation-name: loading-7;  }

@keyframes rota {
    to { transform: rotate(360deg); }
}

@keyframes loading-1 {
    14.28% { opacity: 0.3; }
}

@keyframes loading-2 {
    28.57% { opacity: 0.3; }
}

@keyframes loading-3 {
    42.86% { opacity: 0.3; }
}

@keyframes loading-4 {
    57.14% { opacity: 0.3; }
}

@keyframes loading-5 {
    71.43% { opacity: 0.3; }
}

@keyframes loading-6 {
    85.71% { opacity: 0.3; }
}

@keyframes loading-7 {
    100% { opacity: 0.3; }
}
</style>
<script type="text/javascript">
    $(document).on('click','.saveVid',function(){
        $('.row.clearfix').append(`
            <center>  
            <div class="wrapper">
                <div class="inner"></div>
            </div>
            </center>
        `);
        time = 5;
        interval = setInterval(function(){
          time--;
          if(time == 0){
            clearInterval(interval);
            $( "#bnke_btn" ).trigger('click');
            
          }
        },1000);
    });
</script>
    <?php if ($this->input->get('add')) { 
        $cabangs=cabangs();
        //die("asdasd");
    ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Video</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-md-6">
                                    <div class="form-line">                                        
                                    <label>Cabang</label>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles=3){
                                            $cabangss = $this->m_model->selectOne('id',$this->session->userdata('admin_data')->id_cabang,'cabangs');
                                            if(isset($cabangss->name)){
                                    ?>
                                        <input type="hidden" class="form-control" name="cabang_id" value="<?= $cabangss->id; ?>">
                                        <input type="text" class="form-control" name="" value="<?= $cabangss->name; ?>" readonly>
                                    </div>
                                    <?php
                                            }else{
                                                ?>
                                                    <select name="cabang_id" class="form-control show-tick" required>
                                                            <option value="">Pilih</option>
                                                        <?php
                                                            foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                                # code...
                                                        ?>
                                                                <option value="<?=$valuecabangs->id;?>"><?=$valuecabangs->name;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    </select>
                                                <?php
                                            }
                                        }else{
                                    ?>
                                        <select name="cabang_id" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                            <?php
                                                foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valuecabangs->id;?>"><?=$valuecabangs->name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="form-line">
                                        <label>Pelabuhan / Armada</label>
                                        <input type="text" name="item" placeholder="Pelabuhan / Armada" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>File Video</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="video/mp4,video/x-m4v,video/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-block btn-primary saveVid" title="" style="color:white">Simpan</a>
                                    <!-- <input name="add" type="submit" value="Add" class="btn btn-block btn-primary"> -->
                                    <input name="add" type="submit" value="Add" id="bnke_btn" class="btn btn-block btn-primary" style="display: none;">
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
                        <h2>Edit Video</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'video');
                        if (count($val)) {
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                 <div class="form-group col-md-6">
                                    <div class="form-line">                                        
                                    <label>Cabang</label>
                                     <?php
                                        if($this->session->userdata('admin_data')->roles=3){
                                            $cabangss = $this->m_model->selectOne('id',$this->session->userdata('admin_data')->id_cabang,'cabangs');
                                            if(isset($cabangss->name)){
                                    ?>
                                        <input type="hidden" class="form-control" name="cabang_id" value="<?= $cabangss->id; ?>">
                                        <input type="text" class="form-control" name="" value="<?= $cabangss->name; ?>">
                                    </div>

                                    <?php
                                            }else{
                                                ?>
                                                    <select name="cabang_id" class="form-control show-tick" required>
                                                            <option value="">Pilih</option>
                                                        <?php
                                                            foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                                # code...
                                                        ?>
                                                                <option value="<?=$valuecabangs->id;?>" <?php if($val[0]->cabang_id==$valuecabangs->id){echo 'selected="selected"';}?>><?=$valuecabangs->name;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                <?php
                                            }
                                        }else{
                                    ?>
                                        <select name="cabang_id" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                            <?php
                                                foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valuecabangs->id;?>" <?php if($val[0]->cabang_id==$valuecabangs->id){echo 'selected="selected"';}?>><?=$valuecabangs->name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                </div>
                                 <div class="col-md-6 form-group">
                                    <div class="form-line">
                                        <label>Pelabuhan / Armada</label>
                                        <input type="text" name="item" placeholder="Pelabuhan / Armada" class="form-control" value="<?= $val[0]->item; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>File Video</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="video/mp4,video/x-m4v,video/*">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-block btn-primary saveVid" title="" style="color:white">Simpan</a>
                                    <input name="save" type="submit" value="Save" id="bnke_btn" class="btn btn-block btn-primary" style="display: none;">
                                </div>
                               
                            </div>
                        </form>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->input->get('details')) { 
        $cabangs=cabangs();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Detail Video</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('details')), 'video');
                        if (count($val)) {
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <ul>
                                    <li>Cabang : 
                                        <?php
                                            $cabs = $val[0]->cabang_id;
                                            $cb = $this->m_model->selectOne('id',$cabs,'cabangs');
                                            echo $cb->name;
                                        ?>
                                    </li>
                                    <li>Pelabuhan / Armada : <?= $val[0]->item; ?></li>
                                    <li>Deskripsi : <?= $val[0]->deskripsi; ?></li>
                                    <li>Filename : <?= $val[0]->filename; ?></li>
                                </ul>
                                <div class="col-md-12">
                                    <iframe src="<?=site_url().$val[0]->path_file;?>" style="width: 100%;height: 500px">
                                    </iframe>
                                </div>
                                 
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-md-12">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <!-- <div class="col-md-6"> -->
                                    <!-- <a class="btn btn-block btn-primary saveVid" title="" style="color:white">Simpan</a> -->
                                    <!-- <input name="save" type="submit" value="Save" id="bnke_btn" class="btn btn-block btn-primary" style="display: none;"> -->
                                <!-- </div> -->
                               
                            </div>
                        </form>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit') && !$this->input->get('details')) { ?>
        <script src="<?=base_url();?>assets/backend/plugins/jquery/jquery-v3.2.1.min.js"></script>
            
        <!--fancy box-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
         <script>
            $(document).ready(function(){
                $('#example').dataTable( {
                    "paging": true,
                    "dom": '<"toolbar">frtip',
                    // 'filter': false,
                    // processing: true,
                } );
                $('#example_filter').hide()
            });
            $(document).on('click','.searchs', function () {
                var table = $('#example').DataTable();
                table.columns( 1 ).search( $('input[name="filter[name]"]').val() ).draw();
                table.columns( 2 ).search( $('input[name="filter[item]"]').val() ).draw();
            } );
            $(document).ready(function(){
                $.fn.dataTable.ext.errMode = 'none';

                $('#example').on( 'error.dt', function ( e, settings, techNote, message ) {
                }) ;
            });   

            $(document).on('click','.reset',function(e){
                $('input').val('');
                $('select').val('')
                var table = $('#example').DataTable();
                table.columns( 1 ).search("").draw();
                table.columns( 2 ).search("").draw();
            });     

        </script>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-10">
                                <h2>List Video</h2>
                            </div>
                            <div class="col-lg-2">
                                <?php
                                    if($this->session->userdata('admin_data')->roles!=4){
                                ?>
                                    <a class="btn btn-primary" href="<?= site_url('panel/video?add=true'); ?>">Add Video</a>
                                <?php

                                    }else{
                                    
                                    }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pull-right" style="position: relative;left: 20px;top: 20px;">
                        <div class="input-group" style="width: 150px;"> 
                          <div class="form-line">
                                <input type="text" name="filter[name]" placeholder="Cabang" class="form-control" style="position: relative;top: 10px;width: 150px">
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="form-line">
                                <input type="text" name="filter[item]" placeholder="Pelabuhan / Armada" class="form-control" style="position: relative;top: 10px;width: 150px">&nbsp;&nbsp;&nbsp;
                            </div>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
                          </div>
                          <div class="input-group-btn">
                              <button type="reset" class="btn btn-primary reset" style="position: relative;top: 4px;">Reset </button>
                          </div>
                        </div><!-- /input-group -->
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-responsive table-striped table-hover dataTable js-basic-example" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>Pelabuhan / Armada</th>
                                    <th>Link Video</th>                             
                                    <th>Deskripsi</th>                             
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                $data = $this->m_model->selectwhere('cabang_id', $this->session->userdata('admin_data')->id_cabang, 'video');
                            }else{
                                $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'video', 'id', 'ASC');
                            }
                            if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    //get pelabuhan
                                    $cabangs=$this->m_model->selectOne('id', $value->cabang_id, 'cabangs');
                                    if(count($cabangs)>0){
                                        $name_cabangs= $cabangs->name;
                                    }
                                    else{
                                        $name_cabangs= '-';
                                    }

                                    if(filter_var($value->path_file, FILTER_VALIDATE_URL) === FALSE && $value->path_file !=NULL){
                                        $path_file=base_url().$value->path_file;
                                        $path_file='<a data-fancybox href="'.$path_file.'">'.$value->filename.'</a>';
                                    }
                                    else if(filter_var($value->path_file, FILTER_VALIDATE_URL) == TRUE && $value->path_file !=NULL) {
                                        $path_file='<a data-fancybox href="'.$value->path_file.'">'.$value->filename.'</a>';
                                    }
                                    else{
                                        $path_file="-";
                                    }

                                    $desk = '-';
                                    if(isset($value->deskripsi)){
                                        $desk = $value->deskripsi;
                                    }
                            ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td>
                                        <?= $name_cabangs; ?>
                                    </td>
                                    <td>
                                        <?= $value->item; ?>
                                    </td>
                                    <td>
                                        <?=$path_file;?>
                                    </td>
                                    <td>
                                        <?= $desk; ?>
                                    </td>
                                    <td>
                                        <?= $value->created_at; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php 
                                            if($value->status == 1){
                                                echo '<a class="btn btn-primary" title="" style="color:white;">Open</a>';
                                            }elseif($value->status == 2){
                                                echo '<a class="btn btn-warning" title="" style="color:white;">Waiting For Approval</a>';
                                            }elseif($value->status == 3){
                                                echo '<a class="btn btn-success" title="" style="color:white;">Approved</a>';
                                            }elseif($value->status == 4){
                                                echo '<a class="btn btn-danger" title="" style="color:white;">Rejected</a>';
                                            }
                                        ?>        
                                    </td>
                                    <td>
                                    <?php
                                        $statusApprove = 'Approval';
                                        $cekApprove = $this->m_model->selectOneWhere3('form_type','video','form_id',$value->id,'user_id',$this->session->userdata('admin_data')->id,'trans_approval');
                                        if($this->session->userdata('admin_data')->roles!=4){
                                    ?>
                                            <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/video?edit=').$value->id; ?>">Edit</a>
                                            <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/video?remove=').$value->id; ?>">Delete</a>
                                    <?php
                                        }else{

                                        }
                                    ?>
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