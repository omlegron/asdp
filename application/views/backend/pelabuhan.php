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
                                    <?php 
                                        if(($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                    ?>
                                    <div class="form-line">    
                                        <input type="text" readonly="" class="form-control" value="<?php echo $this->m_model->getOne($this->session->userdata('admin_data')->id_cabang, 'cabangs')['name'] ?>">
                                        <input type="hidden" name="cabang" class="form-control" value="<?php echo $this->session->userdata('admin_data')->id_cabang; ?>">
                                    </div>
                                    <?php
                                        }else{
                                    ?>
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
                                    <?php
                                            }
                                        ?>
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
                            ?>
                                    <a href="<?=base_url();?>panel/pelabuhan?edit=<?=$val['id'];?>"  class="btn btn-primary btn-sm" style="color: #fff">Edit</a>
                                    <a href="<?=base_url();?>panel/pelabuhan?remove=<?=$val['id'];?>"  class="confirm btn btn-danger btn-sm" msg="Are you sure to Delete data?" style="color: #fff">Delete</a>
                            <?php
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
                 <div class="col-md-12" >
                    <div class="col-md-12 pl-0 pt-4">
                        <div class="panel panel-default">
                            <h4 class="panel-heading">Diagram Pelabuhan</h4>
                            <div class="panel-body"> 
                                <div class="row">
                                    <?php
                                    $hasil = 0;
                                        if(count($this->m_model->selectwhere('status','Pelabuhan','jenis_aspeks')) > 0){
                                            foreach ($this->m_model->selectwhere('status','Pelabuhan','jenis_aspeks') as $k => $value) {
                                                $no = 0;
                                                $subAsspek = $this->m_model->selectwhere('jenis_aspek_id',$value->id,'sub_aspeks');
                                                if(count($subAsspek)){
                                                    foreach ($subAsspek as $k => $value1) {
                                                        $no1 = 0;
                                                        // print_r($value1);
                                                        $subIconAspk = $this->m_model->selectas2('trans_sub_id',$value1->id,'status','Active','sub_aspeks_icon');
                                                        if(count($subIconAspk) > 0){
                                                            foreach ($subIconAspk as $k => $value2) {
                                                                $cekListHasil = $this->m_model->selectcustom('select * from trans_pelabuhans_hasil where id_pelabuhan = '.$this->input->get('detail').' && id_jenis_aspek='.$value->id.' && icon_id = '.$value2->trans_icon_id.' group by icon_id');
                                                                // print_r($cekListHasil);
                                                                $no1 += count($cekListHasil);

                                                            }
                                                        }
                                                        $no += count($subIconAspk);
                                                        if($no1 == 0){
                                                            // echo 'cek Kosong';
                                                            $hasil = 0;
                                                        }else{
                                                            $hasil = ($no1 / $no) * 100;

                                                        }
                                                    }
                                                }
                                            ?>
                                                <div class="col-lg-3 col-md-12 col-sm-12 text-center">
                                                    <div class="card tasks_report">
                                                        <div class="body">
                                                            <input type="text" class="knob dial<?= $value->id; ?>-" value="<?= round($hasil,1) ?>" data-width="50" data-height="50" data-thickness="0.2" data-fgColor="#00ced1" readonly>
                                                            <h6 class="m-t-20"><?= $value->nama_aspek; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php                
                                            }
                                        }
                                    ?>         
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

    <?php
         if ($this->input->get('details')) { 
    ?>

 <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Detail Pelabuhan</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->getOne($this->input->get('details'), 'pelabuhans');
                        if (count($val)) {
                            $img=check_img($val['foto']);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val['id']; ?>">
                            <div class="row clearfix">
                                <ul>
                                    <li>Nama Pelabuhan : <?=$val['name'];?></li>
                                    <li>Nama Deskripsi : <?=$val['deskripsi'];?></li>
                                    <li>Nama Cabang : 
                                        <?php
                                            $cabs = $val['cabang_id'];
                                            $cb = $this->m_model->selectOne('id',$cabs,'cabangs');
                                            echo $cb->name;
                                        ?>                
                                    </li>
                                    <li>Foto Cabang</li>
                                </ul>
                                <div class="col-md-12">
                                        <center><img src="<?=$img['path'];?>"></center>
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-md-6">
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
    <?php
        }
    ?>

    <?php if (!$this->input->get('add') && !$this->input->get('edit') && !$this->input->get('detail') && !$this->input->get('details')) { ?>
        <div class="row clearfix">
            <div class="col-lg-10">
            </div>
            <?php
                if($this->session->userdata('admin_data')->roles == 4){

                }else{
                    ?>
                        <div class="col-lg-2">
                            <a class="btn btn-primary" href="<?= site_url('panel/pelabuhan?add=true'); ?>">Add Pelabuhan</a>
                        </div>
                    <?php
                }
            ?>
        </div>
        <br>
        <div class="row clearfix">
        <?php
            if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                $data = $this->m_model->selectwhere('cabang_id', $this->session->userdata('admin_data')->id_cabang, 'pelabuhans');
            }else{
                $data = $this->m_model->all('pelabuhans');
            }

            
            if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $img=check_img($value->foto);
        ?>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <div class="card">
                      <a href="<?=base_url();?>panel/pelabuhan?detail=<?=$value->id;?>">
                        <img class="img-fluid" src="<?=$img['path'];?>" style="width:350px;height:200px;max-height: 200px !important;" alt="Card image cap">
                      </a>
                      <div class="body">
                        <a href="<?=base_url();?>panel/pelabuhan?detail=<?=$value->id;?>">
                        <h4 class="title"><?=$value->name;?></h4>
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