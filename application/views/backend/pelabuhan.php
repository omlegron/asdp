<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $cabangs=cabangs();
        //die("asdasd");
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Pelabuhan</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Nama Pelabuhan</label>
                                        <input type="text" class="form-control" id="name" placeholder="Muara Karang" name="name" required >
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cabang</label>
                                    <?php 
                                        if(($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                    ?>
                                        <input type="text" readonly="" class="form-control" value="<?php echo $this->m_model->getOne($this->session->userdata('admin_data')->id_cabang, 'cabangs')['name'] ?>">
                                        <input type="hidden" name="cabang" class="form-control" value="<?php echo $this->session->userdata('admin_data')->id_cabang; ?>">
                                    <?php
                                        }else{
                                    ?>
                                    <select name="cabang" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                        <?php
                                            foreach ($cabangs as $keycabangs => $valuecabangs) {
                                                $selected = '';
                                                
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
                                <div class="col-lg-6">
                                    <label>Foto Pelabuhan (cover)</label>
                                    <label>*click below to browse file</label>
                                    <input name="cover" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
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
                        <h2>Edit Pelabuhan</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne($this->input->get('edit'), 'pelabuhans');
                        if (count($val)) {
                            $img=check_img($val['foto']);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val['id']; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Nama Pelabuhan</label>
                                        <input type="text" class="form-control" id="name" placeholder="Muara Karang" name="name" required value="<?=$val['name'];?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val['deskripsi'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cabang</label>
                                    <select name="cabang" class="form-control show-tick" required>
                                            <option value="">Pilih</option>
                                        <?php
                                            foreach ($this->m_model->all('cabangs') as $keycabangs => $valuecabangs) {
                                                # code...
                                        ?>
                                                <option value="<?=$valuecabangs->id;?>" <?php ($valuecabangs->id==$val['cabang_id']) ? "selected" : '';?>><?=$valuecabangs->name;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <img src="<?=$img['path'];?>" class="img-fluid" style="max-height: 300px;">
                                    <div class="clearfix"></div>
                                    <label>Foto Pelabuhan (cover)</label>
                                    <label>*click below to browse file</label>
                                    <input name="cover" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
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

    <?php if ($this->input->get('detail')) { ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Detail Pelabuhan</h2>
                        </div>
                        <div class="body">
                         <?php
                            $val = $this->m_model->getOne($this->input->get('detail'), 'pelabuhans');
                            if ($val) {
                                $img=check_img($val['foto']);
                        ?>
        <!--<div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><i class="zmdi zmdi-folder"></i> Master Data</li>
                    <li class="breadcrumb-item"><a href="../pelabuhan.html"> Pelabuhan</a></li>
                    <li class="breadcrumb-item active">Kayangan</li>
                </ul>
            </div>
        </div>-->   
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="btn-group">
                        <a href="<?=base_url();?>panel/pelabuhan"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
                    </div>
                </div>
                <div class="col-lg-4">
                   
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> aspek <span class="caret"></span> </button>
                            <ul class="dropdown-menu" style="left: 0px">
                                <?php 
                                    if(count($this->m_model->selectwhere('status','Pelabuhan','jenis_aspeks')) > 0){
                                        foreach ($this->m_model->selectwhere('status','Pelabuhan','jenis_aspeks') as $k => $value) {
                                          ?>
                                                <li><a href="<?php echo site_url(); ?>backend/pelabuhan/show/<?php echo slugify($value->nama_aspek); ?>/<?= $value->id; ?>/<?= $this->input->get('detail'); ?>"><?php echo $value->nama_aspek; ?></a></li>

                                        <?php
                                        }
                                    }
                                ?>
                            </ul>

                            <?php
                                $statusApprove = 'Approval';
                                $cekApprove = $this->m_model->selectOneWhere3('form_type','pelabuhan','form_id',$value->id,'user_id',$this->session->userdata('admin_data')->id,'trans_approval');
                                if($this->session->userdata('admin_data')->roles!=4){
                                    if(isset($cekApprove)){
                                    if($cekApprove->status == 'On Process'){
                            ?>
                                    <a class="btn btn-warning btn-sm" msg="Silahkan Tunggu Selesai Di Konfirmasi" href="javascript:void(0)"><?= $cekApprove->status; ?></a>
                            <?php
                                    }elseif($cekApprove->status == 'Rejected'){
                                        ?>
                                            <a class="confirm btn btn-danger btn-sm" msg="Pesan Rejected (`<?= $cekApprove->deskripsi; ?>`), Status Anda Telah Direject Approve Kembali?." href="<?= site_url('panel/approve/pelabuhan/').$value->id; ?>"><?= $cekApprove->status; ?></a>
                                        <?php
                                    }else{
                            ?>
                                    <a href="<?=base_url();?>panel/pelabuhan?edit=<?=$val['id'];?>"  class="btn btn-primary btn-sm" style="color: #fff">Edit</a>
                                    <a href="<?=base_url();?>panel/pelabuhan?remove=<?=$val['id'];?>"  class="confirm btn btn-danger btn-sm" msg="Are you sure to Delete data?" style="color: #fff">Delete</a>
                            <?php
                                    }
                                    }else{
                                        if(($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){

                                        ?>
                                            <a class="confirm btn btn-warning btn-sm" msg="Approve Terlebih Dahulu." href="<?= site_url('panel/approve/pelabuhan/').$value->id; ?>"><?= $statusApprove; ?></a>
                                        <?php
                                        }else{
                                        ?>
                                            <a href="<?=base_url();?>panel/pelabuhan?edit=<?=$val['id'];?>"  class="btn btn-primary btn-sm" style="color: #fff">Edit</a>
                                            <a href="<?=base_url();?>panel/pelabuhan?remove=<?=$val['id'];?>"  class="confirm btn btn-danger btn-sm" msg="Are you sure to Delete data?" style="color: #fff">Delete</a>
                                        <?php
                                        }
                                    }
                                }else{

                                }
                            ?>

                           
                        </div>
                    </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-6">
                    <img src="<?=$img['path'];?>" class="img-fluid" style="width: 100%;">
                </div>
                <div class="col-lg-6 bg-white" style="color: #000">
                    <div class="row">
                        <div class="col-md-12 pl-0">
                            <div class="card mb-0" style="border-bottom: 2px solid #000">
                                <div class="body">
                                    <h2><?=$val['name'];?></h2>
                                    <p><?=$val['deskripsi'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit') && !$this->input->get('detail')) { ?>
        <div class="row clearfix">
            <div class="col-lg-10">
            </div>
            <div class="col-lg-2">
                <a class="btn btn-primary" href="<?= site_url('panel/pelabuhan?add=true'); ?>">Add Pelabuhan</a>
            </div>
        </div>
        <br>
        <div class="row clearfix">
        <?php
            if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                $data = $this->m_model->selectwhere('cabang_id', $this->session->userdata('admin_data')->id_cabang, 'pelabuhans');
            }else{
                $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'pelabuhans', 'id', 'ASC');
            }

            
            if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $img=check_img($value->foto);
        ?>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <div class="card">
                      <a href="<?=base_url();?>panel/pelabuhan?detail=<?=$value->id;?>">
                        <img class="img-fluid" src="<?=$img['path'];?>" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                      </a>
                      <div class="body">
                        <a href="<?=base_url();?>panel/pelabuhan?detail=<?=$value->id;?>">
                        <h4 class="title"><?=$value->name;?></h4>
                        </a>
                      </div>
                    </div>
                </div>

        <?php
            }
        }
        ?>
            <!--<div class="col-lg-4 col-md-6 col-sm-12 text-center">
                <div class="card">
                  <a href="detail.html">
                    <img class="img-fluid" src="<?=base_url();?>assets/backend/images/map-1.png" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                  </a>
                  <div class="body">
                    <a href="detail.html">
                    <h4 class="title">Kayangan</h4>
                    </a>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                <div class="card">
                    <img class="img-fluid" src="<?=base_url();?>assets/backend/images/map-1.png" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                    <div class="body">
                    <h4 class="title">Galimanuk</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                <div class="card">
                    <img class="img-fluid" src="<?=base_url();?>assets/backend/images/map-1.png" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                    <div class="body">
                    <h4 class="title">Card title</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                <div class="card">
                    <img class="img-fluid" src="<?=base_url();?>assets/backend/images/map-1.png" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                    <div class="body">
                    <h4 class="title">Card title</h4>
                    </div>
                </div>
            </div>-->
        </div>
    <?php } ?>

<script>
$("#validateSelect > option").each(function() {
    $(this).siblings('[value="'+ this.value +'"]').remove();
});

$(document).on('click', '#type_product', function(){
    if($(this).prop('checked') == true && $(this).val().toLowerCase() == '0'){
        $('#validateSelect').prop("disabled", true);
        $('#validateSelect').val(null).trigger('change');
    }
    else{
        $('#validateSelect').prop("disabled", false);
    }
})

$(document).on('change', '[name=supplier]', function(){
    dataMap={};
    dataMap['store_id']=$(this).val();
    $.post('<?=base_url();?>ajax/product_store', dataMap, function(data){
        $('#product_store').html(data)
    })
})

$(function(){
    $('#product_store').select2();
    $('.select2').select2();
})
</script>

<?php include 'footer.php'; ?>