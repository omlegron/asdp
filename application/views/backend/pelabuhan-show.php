<?php include 'header.php'; ?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="btn-group">
                            <a href="<?=base_url();?>panel/pelabuhan"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
                        </div>
                    </div>

                </div>

                <h3><?= $record->nama_aspek;  ?></h3>
                <?php
                    $img=check_img($pelabuhan->foto);
                    // print_r($records);
                    // die();
                ?>
                <div class="wrapper content">
                    <div class="container-fluid">
                      <h3><?= $record->nama_aspek;  ?> <?= $pelabuhan->name; ?></h3>
                      <div class="row">
                        <div class="col-lg-8 mb-3 pr-0">
                          <img src="<?=$img['path'];?>" class="img-fluid" style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mb-3 p-0" style="background: #dadada">
                          <div class="bg-warning text-center py-1">
                            <h3 class="text-white font-weight-bold"><span style="font-weight: 1"><?= $record->nama_aspek;  ?></span></h3>
                          </div>
                          <div class="px-3 my-3">
                            <ul>
                                <?php
                                    if(count($records) > 0){
                                        foreach ($records as $k => $value) {
                                ?>              
                                        <li style="list-style: none;">
                                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block" style="padding-top: 2px;">
                                                <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= $k+1; ?></span>
                                                <span class="text-warning"><?= $value->name; ?></span>
                                            </a>
                                            <ul class="ml-menu" style="display: none;">
                                            <?php
                                                if(count($this->m_model->selectWhere2('trans_sub_id',$value->id,'status','Active','sub_aspeks_icon'))){
                                                    foreach ($this->m_model->selectWhere2('trans_sub_id',$value->id,'status','Active','sub_aspeks_icon') as $keySubIco => $valueSubIco) {
                                                            
                                                        $cekReal = $this->m_model->getOne($valueSubIco->trans_icon_id,'icon');
                                                        $imgs=check_img($cekReal['path_file']);
                                            ?>
                                                        <li>
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>">&nbsp;
                                                            <span style="font-size: 12px"><?= $cekReal['name']; ?></span>
                                                            <ul>
                                                                <?php 
                                                                    $iconSubIndex = $this->m_model->selectas('trans_id', $cekReal['id'], 'icon_sub');
                                                                    if (count($iconSubIndex) > 0) {
                                                                        foreach ($iconSubIndex as $k1 => $valueindex) {
                                                                            $num = $k1+1;
                                                                            echo '<li>'.$num.'. '.$valueindex->value.'</li>';
                                                                        }
                                                                    }
                                                                 ?>
                                                            </ul>
                                                        </li>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </ul>
                                        </li>
                                <?php          
                                        }
                                    }
                                ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>