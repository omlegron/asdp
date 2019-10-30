<?php include 'header.php'; ?>

    <?php if ($this->input->get('add')) { 
        $pelabuhan=cabangs();
        //die("asdasd");
    ?>
           <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Armada</h2>
                    </div>
                    <div class="body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Nama Armada</label>
                                        <input type="text" class="form-control" id="name" placeholder="KM Surapati" name="name" required >
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi_armada" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Cabang</label>
                                    <?php 
                                        if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                    ?>
                                        <input type="text" readonly="" class="form-control" value="<?php echo $this->m_model->getOne($this->session->userdata('admin_data')->id_cabang, 'cabangs')['name'] ?>">
                                        <input type="hidden" name="cabang_id" class="form-control" value="<?php echo $this->session->userdata('admin_data')->id_cabang; ?>">
                                    <?php
                                        }else{
                                    ?>
                                        <select name="cabang_id" class="form-control show-tick" required>
                                                <option value="">Pilih</option>
                                            <?php
                                                foreach ($pelabuhan as $keypelabuhan => $valuepelabuhan) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valuepelabuhan->id;?>"><?=$valuepelabuhan->name;?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    <?php
                                            }
                                        ?>

                                        
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label>Foto Armada (cover)</label>
                                    <label>*click below to browse file</label>
                                    <input name="cover" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                            </div>
                            <div class="row clearfix" id="div_deck">
                                <div class="form-group col-lg-12">
                                    <h4 style="float: left;">Deck</h4>
                                    <a id="add_deck" href="#" onclick="event.preventDefault();"  class="btn btn-primary btn-sm" style="color: #fff; float: right;">Add Deck</a>
                                </div>
                                <div class="form-group col-lg-3" style="margin-top: 0px;">
                                    <div class="form-line">
                                        <label>Name</label>
                                        <input name="deck[]" type="text" class="form-control" placeholder="Deck Atas">
                                    </div>
                                </div>
                                <div class="form-group col-lg-5" style="margin-top: 0px;">
                                    <div class="form-line">
                                        <label>Deskripsi</label>
                                        <textarea rows="4" name="deskripsi[]" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Foto Deck</label>
                                    <div>
                                        <input name="foto1" type="file" class="form-control" placeholder="Deck Atas">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-6">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-6">
                                    <input name="add" type="submit" value="Add" class="btn btn-block btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url();?>assets/backend/plugins/jquery/jquery-v3.2.1.min.js"></script>
    <?php } ?>

    <?php if ($this->input->get('edit')) { 
        $pelabuhan=cabangs();
    ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit Armada</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('edit'), 'armada');
                        if (count($val)) {
                            $sub_val = $this->m_model->selectas2('armada_id', $this->input->get('edit'), 'deleted_at IS NULL', NULL, 'armada_elements');
                            $img=check_img($val[0]->foto);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="name">Nama Armada</label>
                                        <input type="text" class="form-control" id="name" placeholder="KM Surapati" name="name" required value="<?=$val[0]->name;?>">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea rows="4" name="deskripsi_armada" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$val[0]->deskripsi;?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                        
                                    <label>Cabang</label>
                                    <?php 
                                        if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                                    ?>
                                    <div class="form-line">
                                        <input type="text" readonly="" class="form-control" value="<?php echo $this->m_model->getOne($this->session->userdata('admin_data')->id_cabang, 'cabangs')['name'] ?>">
                                        <input type="hidden" name="cabang_id" class="form-control" value="<?php echo $this->session->userdata('admin_data')->id_cabang; ?>">
                                    </div>

                                    <?php
                                        }else{
                                    ?>
                                        <select name="cabang_id" class="form-control show-tick" required>
                                                <option value="">Pilih</option>
                                            <?php
                                                foreach ($pelabuhan as $keypelabuhan => $valuepelabuhan) {
                                                    # code...
                                            ?>
                                                    <option value="<?=$valuepelabuhan->id;?>" <?php if($valuepelabuhan->id==$val[0]->cabang_id){echo "selected";}?>>
                                                        <?=$valuepelabuhan->name;?>
                                                    </option>
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
                                    <label>Foto Armada (cover)</label>
                                    <label>*click below to browse file</label>
                                    <input name="cover" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                                </div>
                            </div>
                            <div class="row clearfix" id="div_deck">
                                <div class="form-group col-lg-12">
                                    <h4 style="float: left;">Deck</h4>
                                    <a id="add_deck" href="#" onclick="event.preventDefault();"  class="btn btn-primary btn-sm" style="color: #fff; float: right;">Add Deck</a>
                                </div>
                                <?php
                                    if(count($sub_val)>0){
                                        foreach ($sub_val as $keySub => $valueSub) {
                                            # code...
                                        $imgDeck=check_img($valueSub->path_file);
                                ?>
                                        <div class="form-group col-lg-3" style="margin-top: 0px;">
                                            <div class="form-line">
                                                <label>Name</label>
                                                <input name="deck_id[]" type="hidden" value="<?=$valueSub->id;?>">
                                                <input name="deck[]" type="text" class="form-control" placeholder="Deck Atas" value="<?=$valueSub->name;?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5" style="margin-top: 0px;">
                                            <div class="form-line">
                                                <label>Deskripsi</label>
                                                <textarea rows="4" name="deskripsi[]" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."><?=$valueSub->deskripsi;?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Foto Deck</label>
                                            <div>
                                                <img src="<?=$imgDeck['path'];?>" class="img-fluid" style="max-height: 100px;">
                                                <div class="clearfix"></div>
                                                <input name="foto_<?= $keySub+1;?>" type="file" class="form-control" placeholder="Deck Atas">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="<?=base_url();?>/panel/armada?removeElement=<?=$valueSub->id;?>" class="confirm" style="cursor:pointer;" msg="Are you sure to Delete data?"><i class="zmdi zmdi-close text-danger"></i></a>
                                        </div>
                                    <?php
                                        }
                                    }else{
                                ?>
                                        <div class="form-group col-lg-3" style="margin-top: 0px;">
                                            <div class="form-line">
                                                <label>Name</label>
                                                <input name="deck[]" type="text" class="form-control" placeholder="Deck Atas">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-5" style="margin-top: 0px;">
                                            <div class="form-line">
                                                <label>Deskripsi</label>
                                                <textarea rows="4" name="deskripsi[]" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Foto Deck</label>
                                            <div>
                                                <input name="foto1" type="file" class="form-control" placeholder="Deck Atas" accept="image/*">
                                            </div>
                                        </div>
                                <?php 
                                    }
                                ?>
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
        <script src="<?=base_url();?>assets/backend/plugins/jquery/jquery-v3.2.1.min.js"></script>
    <?php } ?>

    <?php if ($this->input->get('details')) { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Detail Armada</h2>
                    </div>
                    <div class="body">
                     <?php
                        $val = $this->m_model->selectas('id', $this->input->get('details'), 'armada');
                        if (count($val)) {
                            $sub_val = $this->m_model->selectas2('armada_id', $this->input->get('details'), 'deleted_at IS NULL', NULL, 'armada_elements');
                            $img=check_img($val[0]->foto);
                    ?>

                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?= $val[0]->id; ?>">
                            <div class="row clearfix">
                                <ul>
                                    <li>Nama Armada : <?= $val[0]->name; ?></li>
                                    <li>Deskripsi : <?= $val[0]->deskripsi; ?></li>
                                    <li>Cabang : 
                                        <?php
                                            $cabs = $val[0]->cabang_id;
                                            $cb = $this->m_model->selectOne('id',$cabs,'cabangs');
                                            echo $cb->name;
                                        ?>           
                                    </li>
                                </ul>
                                <div class="col-md-12">
                                        <center><img src="<?=$img['path'];?>"></center>
                                </div>
                            </div>

                            <div class="row clearfix" style="margin-top: 20px;">
                                <div class="col-lg-2">
                                    <a href="<?=$this->uri->segment('2');?>" class="btn btn-block btn-danger">Back</a>
                                </div>
                                <div class="col-lg-2">
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

    <?php if (!$this->input->get('add') && !$this->input->get('edit') && !$this->input->get('detail') && !$this->input->get('details')) { ?>
        <div class="row clearfix">
            <div class="col-lg-10">
            </div>
            <?php
                if($this->session->userdata('admin_data')->roles == 4){

                }else{
                    ?>
                        <div class="col-lg-2">
                            <a class="btn btn-primary" href="<?= site_url('panel/armada?add=true'); ?>">Add Armada</a>
                        </div>
                    <?php
                }
            ?>
        </div>
        <br>
        <div class="row clearfix">
        <?php
            if(isset($this->session->userdata('admin_data')->id_cabang) && ($this->session->userdata('admin_data')->id_cabang != 0)){
                $data = $this->m_model->selectwhere('cabang_id', $this->session->userdata('admin_data')->id_cabang, 'armada');
            }else{
                $data = $this->m_model->selectas('deleted_at is NULL', NULL, 'armada', 'id', 'ASC');
            }
            if (count($data) > 0) {
            foreach ($data as $key => $value) {
                $img=check_img($value->foto);

        ?>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <div class="card">
                      <a href="<?=base_url();?>panel/armada?detail=<?=$value->id;?>">

                        <img class="img-fluid" src="<?=$img['path'];?>" style="width:100%;max-height: 200px !important;" alt="Card image cap">
                      </a>
                      <div class="body">
                        <a href="<?=base_url();?>panel/armada?detail=<?=$value->id;?>">
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
        </div>
    <?php } ?>

    <?php if ($this->input->get('detail')) { ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Detail Armada</h2>
                        </div>
                        <div class="body">
                         <?php
                            $val = $this->m_model->selectas('id', $this->input->get('detail'), 'armada');
                            if (count($val)) {
                                //$img=check_img($val[0]->foto);
                                //get element armada (deck)
                                $data_img = $this->m_model->selectas('armada_id', $val[0]->id, 'armada_elements');

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
                        <a href="<?=base_url();?>/panel/armada"  class="btn btn-primary btn-sm" style="color: #fff">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> aspek <span class="caret"></span> </button>
                            <ul class="dropdown-menu" style="left: 0px">
                                <?php 
                                    if(count($this->m_model->selectwhere('status','Armada','jenis_aspeks')) > 0){
                                        foreach ($this->m_model->selectwhere('status','Armada','jenis_aspeks') as $k => $value) {
                                        ?>
                                            <li><a href="<?php echo site_url(); ?>backend/armada/show/<?php echo slugify($value->nama_aspek); ?>/<?= $value->id; ?>/<?= $this->input->get('detail'); ?>"><?php echo $value->nama_aspek; ?></a></li>

                                        <?php                
                                        }
                                    }
                                ?>
                            </ul>
                            <?php
                                $statusApprove = 'Approval';
                                $cekApprove = $this->m_model->selectOneWhere3('form_type','armada','form_id',$val[0]->id,'user_id',$this->session->userdata('admin_data')->id,'trans_approval');
                                if($this->session->userdata('admin_data')->roles!=4){
                            ?>
                                    <a href="<?=base_url();?>panel/armada?edit=<?=$val[0]->id;?>"  class="btn btn-primary btn-sm" style="color: #fff">Edit</a>
                                    <a href="<?=base_url();?>panel/armada?remove=<?=$val[0]->id;?>"  class="confirm btn btn-danger btn-sm" msg="Are you sure to Delete data?" style="color: #fff">Delete</a>
                            <?php
                                
                                }else{

                                }
                            ?>
                           
                        </div>
                    </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-6">
                    <?php
                        $img=check_img($val[0]->foto);
                    ?>
                            <img src="<?=$img['path'];?>" class="img-responsive" style="width: 100%; margin-bottom: 1%">
                    
                </div>
                <div class="col-lg-6 bg-white" style="color: #000">
                    <div class="row">
                        <div class="col-md-12 pl-0">
                            <div class="card mb-0" style="border-bottom: 2px solid #000">
                                <div class="body">
                                    <h2><?=$val[0]->name;?></h2>
                                    <p><?=$val[0]->deskripsi;?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" >
                    <div class="col-md-12 pl-0 pt-4">
                        <div class="panel panel-default">
                            <h4 class="panel-heading">Diagram Armada</h4>
                            <div class="panel-body"> 
                                <div class="row">
                                    <?php
                                    $hasil = 0;
                                        if(count($this->m_model->selectwhere('status','Armada','jenis_aspeks')) > 0){
                                            foreach ($this->m_model->selectwhere('status','Armada','jenis_aspeks') as $k => $value) {
                                                $no = 0;
                                                $subAsspek = $this->m_model->selectwhere('jenis_aspek_id',$value->id,'sub_aspeks');
                                                if(count($subAsspek)){
                                                    foreach ($subAsspek as $k => $value1) {
                                                        $no1 = 0;
                                                        $subIconAspk = $this->m_model->selectas2('trans_sub_id',$value1->id,'status','Active','sub_aspeks_icon');
                                                        if(count($subIconAspk) > 0){
                                                            foreach ($subIconAspk as $k => $value2) {
                                                                $cekListHasil = $this->m_model->selectcustom('select * from trans_armada_hasil where id_armada = '.$this->input->get('detail').' && icon_id = '.$value2->trans_icon_id.' group by icon_id');
                                                                $no1 += count($cekListHasil);

                                                            }
                                                        }
                                                        $no += count($subIconAspk);
                                                        if($no1 == 0){
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
                                                            <input type="text" class="knob dial<?= $value->id; ?>" value="<?= round($hasil,1) ?>" data-width="50" data-height="50" data-thickness="0.05" data-fgColor="#00ced1" readonly>
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
<script>
$(document).on('click', '#add_deck', function(){
    id=uniqid()
    var html='<hr>'
                +'<div class="row" style="width:100%; padding-right: 15px; padding-left: 15px;">'
                +'<div class="form-group col-lg-3" style="margin-top: 0px;">'
                +'<div class="form-line">'
                    +'<label>Name</label>'
                    +'<input name="deck[]" type="text" class="form-control" placeholder="Deck Atas">'
                +'</div>'
            +'</div>'
            +'<div class="form-group col-lg-5" style="margin-top: 0px;">'
                +'<div class="form-line">'
                    +'<label>Deskripsi</label>'
                    +'<textarea rows="4" name="deskripsi[]" id="deskripsi" placeholder="Deskripsi" class="form-control no-resize" placeholder="Please type what you want..."></textarea>'
                +'</div>'
            +'</div>'
            +'<div class="col-lg-3">'
                +'<label>Foto Deck</label>'
                +'<div>'
                    +'<input name="'+id+'" type="file" class="form-control" placeholder="Deck Atas">'
                +'</div>'
            +'</div>'
            +'<div class="col-lg-1"><i id="delete_row" class="zmdi zmdi-close text-danger" style="cursor:pointer;"></i>'
            +'</div></div>';
    $('#div_deck').append(html)
})

$(document).on('click', '[id=delete_row]', function(){
    $(this).parent().parent().fadeOut(300, function(){$(this).remove();});
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

function uniqid() {
    var ts=String(new Date().getTime()), i = 0, out = '';
    for(i=0;i<ts.length;i+=2) {        
       out+=Number(ts.substr(i, 2)).toString(36);    
    }
    return ('d'+out);
}
</script>

<?php include 'footer.php'; ?>