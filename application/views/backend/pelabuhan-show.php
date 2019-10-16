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
                            <a href="<?=base_url();?>panel/pelabuhan"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>&nbsp;
                            <a href="<?=base_url();?>backend/pelabuhan/edit/edit/<?= $record->id ?>/<?= $pelabuhan->id ?>"  class="btn btn-success btn-sm" style="color: #fff">Edit</a>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-12 alertLah">
                      
                    </div>
                </div>

                <?php
                    $img=check_img($pelabuhan->foto);
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

                                                        // $cekSubHasil = $this->m_model->selectOneWhere3('id_pelabuhan',$pelabuhan->id,'id_jenis_aspek',$record->id,'id_icon',$cekReal['id'],'trans_pelabuhans_hasil_sub');
                                            ?>
                                            <?php 
                                              $coun = 0;
                                              $color = 'background-color: red;color: white;';
                                              if(count($this->m_model->selectas3('id_pelabuhan',$pelabuhan->id,'id_jenis_aspek',$record->id,'icon_id',$cekReal['id'],'trans_pelabuhans_hasil')) > 0){
                                                $coun = count($this->m_model->selectas3('id_pelabuhan',$pelabuhan->id,'id_jenis_aspek',$record->id,'icon_id',$cekReal['id'],'trans_pelabuhans_hasil'));
                                                $color = 'background-color: blue;color: white;';
                                              }
                                            ?>
                                                        <li style="font-size: 13px" >
                                                            <img src="<?=$imgs['path'];?>" class="img-responsive drag" data-key="<?= $keySubIco + 1; ?>" data-id="<?= $cekReal['id']; ?>" data-aspek="<?= $value->name; ?>" data-name="<?= $cekReal['name']; ?>" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px;padding-bottom: 3px;" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>" draggable="true">&nbsp;
                                                            <span style="font-size: 13px;<?= $color; ?>">
                                                              <?= $cekReal['name']; ?>

                                                              <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= $coun; ?></span>    
                                                            </span>
                                                           <!--  <table>
                                                              <tbody class="appendChildSub<?= $pelabuhan->id; ?>-<?= $cekReal['id']; ?>">
                                                              <tr>
                                                                <td colspan="" rowspan="" headers="">
                                                                  <input type="text" name="sub_text[]" id="subText" data-pelabuhanid="<?= $pelabuhan->id; ?>" data-idaspek="<?= $record->id; ?>" data-icon="<?= $cekReal['id']; ?>" class="form-control" style="width: 150px;height:25px;border:1px solid black !important;font-size: 11px">
                                                                </td>
                                                                <td colspan="" rowspan="" headers="">
                                                                  <input type="text" name="sub_value[]" class="form-control" style="width: 100px;height:25px;border:1px solid black !important;font-size: 11px" id="subValue" data-pelabuhanid="<?= $pelabuhan->id; ?>" data-idaspek="<?= $record->id; ?>" data-icon="<?= $cekReal['id']; ?>">
                                                                </td>
                                                                <td colspan="" rowspan="" headers="">
                                                                  <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="position:relative;top:-3px;height:25px;width: 15px">
                                                                    <i class="zmdi zmdi-close appendDelete" style="position: relative;right: 5px;top: -2px;"></i>
                                                                  </a>
                                                                </td>
                                                                <td colspan="" rowspan="" headers="">
                                                                  <a href="javascript:void(0)" data-id1="<?= $pelabuhan->id; ?>" data-cekreal="<?= $cekReal['id']; ?>" class="btn btn-sm btn-success appendAdd" id="appendAdd" style="position:relative;top:-3px;height:25px;width: 15px">
                                                                    <i class="zmdi zmdi-plus" style="position: relative;right: 5px;top:-2px;"></i>
                                                                  </a>
                                                                </td>
                                                              </tr>
                                                              </tbody>
                                                            </table> -->
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
      
        $.ajax({
            url: '<?= site_url('backend/pelabuhan/getData'); ?>',
            type: 'post',
            data: {id_jenis_aspek: '<?= $record->id; ?>',id_pelabuhan:'<?= $pelabuhan->id; ?>'},
            dataType: 'json',
            success:function(response){
                if(response.length > 0){
                  $.each(response,function(k,v){
                    var group = new Konva.Group({
                            x: v.pointer_x,
                            y: v.pointer_y,
                    });

                    layer.add(group);
                    // 3. Create an Image node and add it to group
                    Konva.Image.fromURL(v.url, function(yoda) {
                      yoda.setAttrs({
                        width: 30,
                        height: 30,
                        id_pelabuhan: v.id_pelabuhan,
                        id_jenis_aspek: v.id_jenis_aspek,
                        primary_key: v.primary_key,
                        pointer_x: v.pointer_x,
                        pointer_y: v.pointer_y,
                        cek_target:'true'
                      });
                      // 4. Add it to group.
                      group.add(yoda);
                      layer.batchDraw(); // It
                    });

                  });  
                }
            },
            error: function() {
              // $('.alertLah').html(`
              //   <div class="alert alert-danger">
              //     Terjadi Kesalahan!
              //   </div>
              // `);
            }
          });

      
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
          $('.deletesData').hide();
        });
      });

      // stage.on('click', function(e) {
      //   if(e.target.attrs.cek_target === 'true'){
      //        $.ajax({
      //         url: '<?= site_url('backend/pelabuhan/getDataOne/'); ?>',
      //         type: 'post',
      //         data: {id_jenis_aspek: e.target.attrs.id_jenis_aspek, id_pelabuhan:e.target.attrs.id_pelabuhan, primary_key:e.target.attrs.primary_key,pointer_x:e.target.attrs.pointer_x,pointer_y:e.target.attrs.pointer_y},
      //         dataType: 'json',
      //         success:function(response){
      //           console.log('response',response)
      //           if(response){
      //             $("#add-panel").modal("show");
      //               $('.modal-backdrop').removeClass();
                   
      //               $('input[name="id"]').val(response.id);
      //               $('input[name="id_pelabuhan"]').val(response.id_pelabuhan);
      //               $('input[name="id_jenis_aspek"]').val(response.id_jenis_aspek);
      //               $('input[name="icon_id"]').val(response.icon_id);
      //               $('input[name="url"]').val(response.url);
      //               $('input[name="pointer_x"]').val(response.pointer_x);
      //               $('input[name="pointer_y"]').val(response.pointer_y);
      //               $('input[name="primary_key"]').val(response.primary_key);
      //               $('input[name="kategori"]').val(response.kategori);
      //               $('input[name="nama"]').val(response.nama);
      //               $('input[name="aspek"]').val(response.aspek);
      //               $('input[name="nomor"]').val(response.nomor);
      //               $('input[name="kondisi"]').val(response.kondisi);
      //               $('input[name="posisi"]').val(response.posisi);
      //               $('input[name="tahun"]').val(response.tahun);
      //               $('.deletesData').show();
      //               if(response.fileurl){
      //                 $('.showImg').html(`
      //                   <img src="<?php echo base_url(); ?>`+response.fileurl+`" class="img-responsive" alt="" style="width:250px;height:150px">
      //                 `);
      //               }
      //           }
      //         },
      //         error: function() {
      //           $('.alertLah').html(`
      //             <div class="alert alert-danger">
      //               Terjadi Kesalahan!
      //             </div>
      //           `);
      //         }
      //       });
      //   }
      // });


    </script>
    <div class="modal fade " id="add-panel" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-md" role="document" style="margin:140px auto;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Keterangan Data Jenis Aspek</h4>
          </div>
          <div class="modal-body">
              <form id="formModals" action="<?= base_url('backend/pelabuhan/store'); ?>" method="POST" enctype="multipart/form-data">
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
                  <div class="col-lg-12">
                    <div class="form-line">
                        <div class="clearfix"></div>
                        <label>*click below to browse file</label>
                        <input name="icon" type="file" class="form-control" style="cursor: pointer;" accept="image/*">
                    </div>
                  </div>
                  <div class="col-lg-12 showImg">
                
                  </div><br>
                  <div class="col-md-12 pull-right" style="text-align: right;">
                    <button type="button" class="btn btn-default" id="cancel-button" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger deleteDatak deletesData" id="cancel-button" data-dismiss="modal" style="display: none">Delete</button>
                    <button type="submit" class="btn btn-primary saveBtn" id="confirm-button">Save</button>
                  </div>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>

      <!-- EDIT MODAL -->
      

      <script type="text/javascript">
        // $(document).on('click','.saveBtn',function(){
        //   var data = $('#formModals').serializeArray();
        //   console.log('data',data)
        //   $.ajax({
        //     url: '<?= site_url('backend/pelabuhan/store'); ?>',
        //     type: 'post',
        //     data: data,
        //     dataType: 'json',
        //     success:function(response){
        //         if(response.status == true){
        //           $('.alertLah').html(`
        //             <div class="alert alert-success">
        //               `+ response.message +`
        //             </div>
        //           `);
        //         }else{
        //           $('.alertLah').html(`
        //             <div class="alert alert-danger">
        //               Gagal Menyimpan Data
        //             </div>
        //           `);
        //         }
        //         $("#add-panel").modal("hide");

        //     },
        //     error: function() {
        //       $('.alertLah').html(`
        //         <div class="alert alert-danger">
        //           Terjadi Kesalahan!
        //         </div>
        //       `);
        //         $("#add-panel").modal("hide");

        //     }
        //   });
        // });

        $(document).on('click','.deleteDatak',function(){
          var data = $('#formModals').serializeArray();
          console.log('data',data)
          $.ajax({
            url: '<?= site_url('backend/pelabuhan/delete'); ?>',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(response){
                if(response.status == true){
                  window.location.reload();
                }else{
                  $('.alertLah').html(`
                    <div class="alert alert-danger">
                      Gagal Menghapus Data
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

        $(document).on('click','#appendAdd',function(){
          console.log('asd');
          console.log($(this).data('id1'),$(this).data('cekreal'));
          var id = '.appendChildSub'+$(this).data('id1')+'-'+$(this).data('cekreal');
          console.log('id',id);
          $('.appendChildSub'+$(this).data('id1')+'-'+$(this).data('cekreal')).append(`
            <tr>
               <td colspan="" rowspan="" headers="">
                  <input type="text" name="sub_text[]" id="subText" data-pelabuhanid="<?= $pelabuhan->id; ?>" data-idaspek="<?= $record->id; ?>" data-icon="<?= $cekReal['id']; ?>" class="form-control" style="width: 150px;height:25px;border:1px solid black !important;font-size: 11px">
                </td>
                <td colspan="" rowspan="" headers="">
                  <input type="text" name="sub_value[]" class="form-control" style="width: 100px;height:25px;border:1px solid black !important;font-size: 11px" id="subValue" data-pelabuhanid="<?= $pelabuhan->id; ?>" data-idaspek="<?= $record->id; ?>" data-icon="<?= $cekReal['id']; ?>">
                </td>
              <td colspan="" rowspan="" headers="">
                <a href="javascript:void(0)" class="btn btn-sm btn-danger appendDelete" id="appendDelete" style="position:relative;top:-3px;height:25px;width: 15px">
                  <i class="zmdi zmdi-close" style="position: relative;right: 5px;top: -2px;"></i>
                </a>
              </td>
              
            </tr>
          `);
        });

        $(document).on('click','#appendDelete',function(){
          $(this).closest('tr').remove();
        });

        $(document).on('keypress keydown keyup','#subText',function(){
          var data = {title:$(this).val(),id_pelabuhan:$(this).data('pelabuhanid'),idaspek:$(this).data('idaspek'),id_icon:$(this).data('icon')};

          $.ajax({
            url: '<?= site_url('backend/pelabuhan/subtitle'); ?>',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(response){
              console.log('success')
            },
            error: function() {
              console.log('error')
            }
          });
          
        });

        $(document).on('keypress keydown keyup','#subValue',function(){
          var data = {value:$(this).val(),id_pelabuhan:$(this).data('pelabuhanid'),idaspek:$(this).data('idaspek'),id_icon:$(this).data('icon')};

          $.ajax({
            url: '<?= site_url('backend/pelabuhan/subvalue'); ?>',
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(response){
              console.log('success')
            },
            error: function() {
              console.log('error')
            }
          });
        });
      </script>
<?php include 'footer.php'; ?>