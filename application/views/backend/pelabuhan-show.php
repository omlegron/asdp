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
                    // print_r($records);
                    // die();
                ?>
                <div class="row clearfix">
                    <div class="row">
                        <br>
                        <ul>
                            <?php
                                if(count($records) > 0){
                                    foreach ($records as $k => $value) {
                            ?>                                        
                                    <li>
                                        <span class="badge badge-warning" style="font-size: 12px"><?= $value->name; ?></span>
                                        <ul>
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
                        <!-- <ul>
                          <li>Parent</li>
                          <li>Parent
                            <ul>
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li> 
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li> 
                              <li>Child
                                <ul>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                  <li>Grandchild</li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li>Parent
                            <ul>
                              <li>Child</li>
                              <li>Child</li>
                              <li>Child</li>
                            </ul>
                          </li>
                          <li>Parent
                            <ul>
                              <li>Child</li>
                              <li>Child</li>
                              <li>Child</li>
                            </ul>
                          </li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>