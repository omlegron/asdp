<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 


<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $cabang=cabangs();
        //die("asdasd");
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Photo</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        
                                    <label>Cabang</label>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles=3){
                                            $cabangs = $this->m_model->selectOne('id',$this->session->userdata('admin_data')->id_cabang,'cabangs');
                                            if(isset($cabangs->name)){
                                    ?>
                                        <input type="hidden" class="form-control" name="cabang_id" value="<?= $cabangs->id; ?>">
                                        <input type="text" class="form-control" name="" value="<?= $cabangs->name; ?>" readonly>
                                    </div>
                                    <?php
                                            }else{
                                                ?>
                                                    <select name="cabang_id" class="form-control show-tick" required>
                                                            <option value="">Pilih</option>
                                                        <?php
                                                            foreach ($cabang as $keycabang => $valuecabang) {
                                                                # code...
                                                        ?>
                                                                <option value="<?=$valuecabang->id;?>"><?=$valuecabang->name;?></option>
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
                                                foreach ($cabang as $keycabang => $valuecabang) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valuecabang->id;?>"><?=$valuecabang->name;?></option>
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
                                    <input type="text" class="form-control" name="item" placeholder="Pelabuhan / Armada" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Foto</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                            </div>  
                            <div class="row clearfix float-right" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                            <br>
                            <br>
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
                        <h2>Edit Photo</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('edit')), 'photo');
                        if (count($val)) {
                            $img=check_img($val[0]->path_file);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-md-6">
                                    <label>Cabang</label>
                                    <?php
                                        if($this->session->userdata('admin_data')->roles=3){
                                            $cabangss = $this->m_model->selectOne('id',$this->session->userdata('admin_data')->id_cabang,'cabangs');
                                            if(isset($cabangss->name)){
                                    ?>
                                        <input type="hidden" class="form-control" name="cabang_id" value="<?= $cabangss->id; ?>">
                                        <input type="text" class="form-control" name="" value="<?= $cabangss->name; ?>">
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
                                        <input type="text" class="form-control" name="item" placeholder="Pelabuhan / Armada" required="" value="<?= $val[0]->item; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Foto</label>
                                    <label>*click below to browse file</label>
                                    <input name="photo" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?= $val[0]->deskripsi; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 200px; max-height:150px;" data-fancybox="images" href="<?=$img['path'];?>">
                                </div>
                            </div>
                            <div class="row clearfix float-right" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-md-6">
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

    <?php if ($this->input->get('details')) { 
        $cabangs=cabangs();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Detail Photo</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', cleartext($this->input->get('details')), 'photo');
                        if (count($val)) {
                            $img=check_img($val[0]->path_file);
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
                                </ul>
                                <div class="col-md-12">
                                    <center><img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 500px; max-height:500px;" data-fancybox="images" href="<?=$img['path'];?>"></center>
                                </div>
                            </div>
                            <div class="row clearfix " style="margin-top: 20px;">
                                <div class="col-md-3">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <!-- <input name="save" type="submit" value="Save" class="btn btn-block btn-primary"> -->
                                </div>
                            </div>
                        </form>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit') && !$this->input->get('details')) { ?>
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
                                <h2>List Foto</h2>
                            </div>
                            <div class="col-lg-2">
                                <?php
                                if($this->session->userdata('admin_data')->roles!=4){
                                ?>    
                                    <a class="btn btn-primary" href="<?= site_url('panel/photo?add=true'); ?>">Add Foto</a>
                                <?php
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
                                <tr style="text-align: center;"> 
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th style="width: 200px;text-align: center;">Pelabuhan / Armada</th>
                                    <th style="text-align: center;">Photo</th>                             
                                    <th style="width: 200px;text-align: center;">Deskripsi</th>                             
                                    <th>Tanggal</th>                             
                                    <th style="text-align: center;">Status</th>                             
                                    <th style="width: 80px;text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            <?php
                            if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                $data = $this->m_model->selectwhere('cabang_id', $this->session->userdata('admin_data')->id_cabang, 'photo');
                            }else{
                                $data = $this->m_model->all('photo');
                            }
                            if (count($data) > 0) {
                                $desk = '-';
                                foreach ($data as $key => $value) {
                                    $img=check_img($value->path_file);
                                    $cabangs=$this->m_model->selectOne('id', $value->cabang_id, 'cabangs');
                                    if($cabangs){$name_cabangs= $cabangs->name;}else{$name_cabangs= '-';}
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
                                        <img src="<?=$img['path'];?>" class="img-responsive" id="img-responsive" data-img="<?=$img['path'];?>" style="cursor: pointer; max-width: 200px; max-height:150px;" data-fancybox="images<?= $key + 1; ?>" href="<?=$img['path'];?>">
                                    </td>
                                    <td style="text-align: left;"><p><?= $desk; ?></p></td>
                                    <td><?= $value->created_at; ?></td>
                                    <td>
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
                                            $cekApprove = $this->m_model->selectOneWhere3('form_type','foto','form_id',$value->id,'user_id',$this->session->userdata('admin_data')->id,'trans_approval');
                                            if($this->session->userdata('admin_data')->roles!=4){
                                          ?>
                                                <a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('panel/photo?edit=').$value->id; ?>" >Edit</a>
                                                <a class="confirm badge badge-warning" msg="Are you sure to Delete data?" href="<?= site_url('panel/photo?remove=').$value->id; ?>">Delete</a>
                                        <?php
                                            }
                                        ?>
                                    
                                    </td>
                                </tr>
                            <?php 
                                } 
                            } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

<div class="modal fade " id="view-panel" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-md" role="document" style="margin:140px auto;position: relative;left: -50px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
              <form id="formModals" action="<?= base_url('backend/pelabuhan/store'); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="card ReadshowImg">
                    <div id="demo2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner showImg" style="width:100%;">
                          
                          
                        </div>
                      </div>
                    </div><br>
                  <div class="col-md-12 pull-right" style="text-align: right;">
                    <button type="button" class="btn btn-default" id="cancel-button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
      </div>
<script>
    $(document).on('click','#img-responsive',function(){
        // console.log('asd',$(this).data('img'));
        $("#view-panel").modal("show");
        $('.modal-backdrop').removeClass();
        var jt = `
            <div class="carousel-item active">
              <img src="`+$(this).data('img')+`" class="img-fluid" style="width:100%;height:420px;" alt="">
            </div>
        `;
        $('.showImg').html(jt);
        // /console.log('id',$(this).data('img'))
    });

$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>