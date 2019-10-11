<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script src="https://unpkg.com/konva@4.0.0/konva.min.js"></script>

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

                <?php
                    $img=check_img($pelabuhan->foto);
                    // print_r($records);
                    // die();
                ?>
                <div class="wrapper content">
                    <div class="container-fluid">
                      <h3><?= $record->nama_aspek;  ?> <?= $pelabuhan->name; ?></h3>
                      <div class="row">
                        <div class="col-lg-8 mb-3 pr-0" id="container" style="background-image: url('<?=$img['path'];?>');">
                        </div>
                        <div class="col-lg-4 mb-3 p-0" style="background: #fffafa">
                          <div class="bg-warning text-center py-1">
                            <h3 class="text-white font-weight-bold"><span style="font-weight: 1"><?= $record->nama_aspek;  ?></span></h3>
                          </div>
                          <div class="px-3 my-3">
                            <ul style="position: relative;left: -50px;font-size: 13px">
                                <?php
                                    if(count($records) > 0){
                                        foreach ($records as $k => $value) {
                                ?>              
                                        <li style="list-style: none;font-size: 13px">
                                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block" style="padding-top: 2px;height: 27px">
                                                <span class="rounded-circle text-white bg-warning mr-1" style="padding: 3px 8px;"><?= $k+1; ?></span>
                                                <span class="text-warning"><?= $value->name; ?></span>
                                            </a>
                                            <ul class="ml-menu" style="display: none;font-size: 13px;position: relative;left: -5px">
                                            <?php
                                                if(count($this->m_model->selectWhere2('trans_sub_id',$value->id,'status','Active','sub_aspeks_icon'))){
                                                    foreach ($this->m_model->selectWhere2('trans_sub_id',$value->id,'status','Active','sub_aspeks_icon') as $keySubIco => $valueSubIco) {
                                                            
                                                        $cekReal = $this->m_model->getOne($valueSubIco->trans_icon_id,'icon');
                                                        $imgs=check_img($cekReal['path_file']);
                                            ?>
                                                        <li style="font-size: 13px" id="drag-items">
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px;padding-bottom: 3px" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>" draggable="true">&nbsp;
                                                            <span style="font-size: 13px"><?= $cekReal['name']; ?></span>
                                                            <ul style="font-size: 13px">
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
<script>

      var width = window.innerWidth;
      var height = window.innerHeight;

      var stage = new Konva.Stage({
        container: 'container',
        width: width,
        height: height
      });
      var layer = new Konva.Layer();
      stage.add(layer);

      // what is url of dragging element?
      var itemURL = '';
      document
        .getElementById('drag-items')
        .addEventListener('dragstart', function(e) {
            console.log('asd',e.target.src)
          itemURL = e.target.src;
        });

      var con = stage.container();
      con.addEventListener('dragover', function(e) {
        e.preventDefault(); // !important
      });

      con.addEventListener('drop', function(e) {
        e.preventDefault();
        // now we need to find pointer position
        // we can't use stage.getPointerPosition() here, because that event
        // is not registered by Konva.Stage
        // we can register it manually:
        stage.setPointersPositions(e);

        Konva.Image.fromURL(itemURL, function(image) {
          layer.add(image);

          image.position(stage.getPointerPosition());
          image.draggable(true);

          layer.draw();
        });
      });

    </script>
<?php include 'footer.php'; ?>