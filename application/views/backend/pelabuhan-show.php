<script src="<?=base_url();?>assets/frontend/js/jquery.js"></script> 
<script src="<?=base_url();?>assets/frontend/js/konva.min.js"></script>

<?php include 'header.php'; ?>
<style type="text/css">
  
</style>
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
                    <div class="col-md-12 alertLah">
                      
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
                        <div class="col-lg-7 mb-3 pr-0">
                          <div style="background-image: url('<?=$img['path'];?>'); background-size: 100%;background-repeat: no-repeat;" id="containers" data-id="containers" class="img-fluid"></div>
                          
                        </div>
                        <div class="col-lg-5 mb-3 p-0" style="background: #fffafa">
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
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive drag" data-key="<?= $keySubIco + 1; ?>" data-id="<?= $cekReal['id']; ?>" data-aspek="<?= $value->name; ?>" data-name="<?= $cekReal['name']; ?>" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px;padding-bottom: 3px" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>" draggable="true">&nbsp;
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

      var width = 613;
      var height = 1250;
      console.log('width(integer)',width,'height',height)
      var stage = new Konva.Stage({
        container: 'containers',
        width: width,
        height: height
      });
      var layer = new Konva.Layer();
      stage.add(layer);
      
      // ADD FOTO DARI KUMPULAN ARRAY
      // var GetData = [
      //   { x: '140', y: '211.46665954589844' , img:'https://localhost/application/images/icon/5d9193038982b.png' },
      //   { x: '371', y: '180.46665954589844' , img:'https://localhost/application/images/icon/5d91934c8f569.png' }
      // ];
      
      // $.each(GetData,function(k,v){
      //   console.log('v',v,'k',k);
      //   var group = new Konva.Group({
      //           x: v.x,
      //           y: v.y,
      //   });

      //   layer.add(group);
      //   // 3. Create an Image node and add it to group
      //   Konva.Image.fromURL(v.img, function(yoda) {
      //     console.log('YODA',yoda);
      //     yoda.setAttrs({
      //       width: 30,
      //       height: 30
      //     });
      //     // 4. Add it to group.
      //     group.add(yoda);
      //     layer.batchDraw(); // It
      //   });

      // });  
      // END ADD FOTO DARI KUMPULAN ARRAY
      
      // what is url of dragging element?
      var itemURL = '';
      var dataIds = '';
      var dataAspek = '';
      var dataName = '';
        $(document).on('dragstart','#drag-items', function(e) {
          itemURL = e.target.src;
          dataIds = e.target.dataset.id;
          $('input[name="icon_id"]').val(dataIds);
          $('input[name="url"]').val(e.target.src);
          $('input[name="aspek"]').val(e.target.dataset.aspek);
          $('input[name="nama"]').val(e.target.dataset.name);
        });

      stage.on('click', function() {
        console.log('click',itemURL);
      });

      var con = stage.container();
      con.addEventListener('dragover', function(e) {
        e.preventDefault(); 
      });

      arrayHasil = [];
      con.addEventListener('drop', function(e) {
        e.preventDefault();
        stage.setPointersPositions(e);
        console.log('e',e)
        Konva.Image.fromURL(itemURL, function(image) {
          layer.add(image);

          image.position(stage.getPointerPosition());
          image.width(30);
          image.height(30);
          image.draggable(false);
          arrayHasil.push(stage.getPointerPosition());
          console.log('arrayHasil',arrayHasil)
          layer.draw();
          $("#add-panel").modal("show");
          $('.modal-backdrop').removeClass();
          $('input[name="pointer_x"]').val(stage.getPointerPosition().x);
          $('input[name="pointer_y"]').val(stage.getPointerPosition().y);
          $('input[name="primary_key"]').val(arrayHasil.length);
        });
      });

      stage.on('click', function() {
        console.log('click',itemURL);
      });


    </script>
    <div class="modal fade " id="add-panel" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-md" role="document" style="margin:140px auto;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" style="text-align: left">Buat Keterangan Data</h4>
          </div>
          <div class="modal-body">
              <form id="formModals" action="<?= base_url('pelabuhan/store'); ?>" method="POST" accept-charset="utf-8">
                <div class="row">
                  <input type="hidden" name="id">
                  <input type="hidden" name="id_pelabuhan" value="<?= $pelabuhan->id; ?>">
                  <input type="hidden" name="id_jenis_aspek" value="<?= $record->id; ?>">
                  <input type="hidden" name="icon_id">
                  <input type="hidden" name="url">
                  <input type="hidden" name="pointer_x">
                  <input type="hidden" name="pointer_y">
                  <input type="hidden" name="primary_key">
                  <input type="hidden" name="kategori" value="Pelabuhan">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nama</label>
                      <input name="nama" placeholder="Nama" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Aspek</label>
                      <input name="aspek" placeholder="Aspek" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nomor</label>
                      <input name="nomor" placeholder="Nomor" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Kondisi</label>
                      <input name="kondisi" placeholder="Kondisi" type="text" class="form-control" />
                    </div>
                  </div>
                   <div class="col-lg-4">
                    <div class="form-group">
                      <label>Posisi</label>
                      <input name="posisi" placeholder="Posisi" type="text" class="form-control" />
                    </div>
                  </div>
                   <div class="col-lg-4">
                    <div class="form-group">
                      <label>Tahun Pengadaan</label>
                      <input name="tahun" placeholder="Tahun Pengadaan" type="text" class="form-control" />
                    </div>
                  </div>

                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="cancel-button" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary saveBtn" id="confirm-button">Save</button>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $(document).on('click','.saveBtn',function(){
          var data = $('#formModals').serializeArray();
          console.log('data',data)
          $.ajax({
            url: '<?= site_url('backend/pelabuhan/store'); ?>',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(response){
                if(response.status == true){
                  $('.alertLah').html(`
                    <div class="alert alert-success">
                      `+ response.message +`
                    </div>
                  `);
                }else{
                  $('.alertLah').html(`
                    <div class="alert alert-danger">
                      Gagal Menyimpan Data
                    </div>
                  `);
                }
                $("#add-panel").modal("hide");

            },
            error: function() {
              $('.alertLah').html(`
                <div class="alert alert-danger">
                  Terjadi Kesalahan!
                </div>
              `);
                $("#add-panel").modal("hide");

            }
          });
        });
      </script>
<?php include 'footer.php'; ?>