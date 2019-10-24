<script src="<?=base_url();?>assets/frontend/js/jquery.js"></script> 
<script src="<?=base_url();?>assets/frontend/js/konva.min.js"></script>

<style type="text/css">
	.color-red{
		background-color: red;
		color: white;

	}
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
<script type="text/javascript">
	$(document).on('change','select[name="deck_id"]',function(){
		var deckId = $(this).val();
		$('.showFind').attr('href','<?php echo site_url(); ?>backend/armada/showDetail/<?= $record->id; ?>/'+deckId+'/<?= $armada->id; ?>');
	});


    
</script>
<?php include 'header.php'; ?>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8">
						<div class="btn-group">
							<a href="<?=base_url();?>panel/armada"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>&nbsp;
               <a href="<?=base_url();?>backend/armada/showEdit/<?= $record->id ?>/<?= $armadaElments->id; ?>/<?= $armada->id ?>"  class="btn btn-success btn-sm" style="color: #fff">Edit</a>
						</div>
					</div>
					<div class="col-md-12 alertLah">
                      
                    </div>
				</div>


				<div class="wrapper content">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-4">      
								<div class="form-group">
									<div class="input-group" >     

										<select name="deck_id" class="form-control show-tick" required>
											<option value="-">Select One </option>

											<?php
											if(count($this->m_model->selectwhere('armada_id',$armada->id,'armada_elements')) > 0){
												foreach ($this->m_model->selectwhere('armada_id',$armada->id,'armada_elements') as $k => $value) {
													$cek = '';
													if($armadaElments->id == $value->id){
														$cek = 'selected';
													}
													?>
													<option value="<?=$value->id;?>" <?= $cek; ?>><?=$value->name;?></option>
													<?php
												}
											}else{
												echo '<option value="">No Data Found</option>';
											}
											?>
										</select>
										<div class="btn-group">
											<a href="" class="btn btn-primary btn-sm showFind" style="color: #fff">Find</a>
										</div>
									</div>
								</div>

							</div>
							<div class="col-md-8 " style="text-align: right">
								<h3><?= $armada->name; ?></h3>
								<h6><?= $armadaElments->name; ?></h6>
							</div>
							<div class="showAppendArmada">
								<div class="col-lg-12 col-md-12">
									<div class="card">
										<div id="demo2" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" style="width:100%;max-height: 350px !important;">
												<div class="carousel-item active">
													<?php 
													$imgs=check_img($armadaElments->path_file);
													?>
													<div style="background-image: url('<?=$imgs['path'];?>'); background-size: 100%;background-repeat: no-repeat;" id="containers" data-id="containers" class="img-fluid"></div>
													
												</div>
											</div>

											
										</div>
									</div>
								</div>   
								<div class="col-lg-12 mb-3 p-0" style="background: #fffafa">
									<div class="bg-warning text-center py-1">
										<h3 class="text-white font-weight-bold"><span style="font-weight: 1;" ><?= $record->nama_aspek; ?></span></h3>
									</div>
									<div class="row">
										<?php
										if(count($records) > 0){
											foreach ($records as $k => $value) {
												?>         
												<div class="col-md-6">
													<ul style="position: relative;left: -10px;">

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
                                    <?php 
                                      $coun = 0;
                                      $color = 'background-color: #f00;color: white;border-radius:20px;border:3px solid #f00 !important';
                                      if(count($this->m_model->selectas4('id_armada',$armada->id,'id_jenis_aspek',$record->id,'icon_id',$cekReal['id'],'id_armada_elments',$armadaElments->id,'trans_armada_hasil')) > 0){
                                        $coun = count($this->m_model->selectas4('id_armada',$armada->id,'id_jenis_aspek',$record->id,'icon_id',$cekReal['id'],'id_armada_elments',$armadaElments->id,'trans_armada_hasil'));

                                        $color = '-';
                                      }
                                    ?>
																		<li style="padding-bottom: 1px;">
                                      <div class="row">
                                          <div class="col-md-10">
                                            <img src="<?=$imgs['path'];?>" class="img-responsive drag" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px;padding-bottom: 1px;<?= $color; ?>" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>" data-key="<?= $keySubIco + 1; ?>" data-id="<?= $cekReal['id']; ?>" data-aspek="<?= $value->name; ?>" data-name="<?= $cekReal['name']; ?>" data-elment="<?= $armadaElments->id; ?>">&nbsp;
                                            <span style="font-size: 12px;">
                                              <?= $cekReal['name']; ?>     
                                            </span>
                                          </div>
                                          <div class="col-md-2">
                                            <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= $coun; ?></span>    
                                          </div>
                                        </div>
																			
																		</li>
																		<?php
																	}
																}
																?>
															</ul>
														</li>

													</ul>

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
		</div>
	</div>
</div>
<script type="text/javascript">
	  var width = 900;
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
      var widths = 30;
    	$.ajax({
            url: '<?= site_url('backend/armada/getData'); ?>',
            type: 'post',
            data: {id_jenis_aspek: '<?= $record->id; ?>',id_armada:'<?= $armada->id; ?>',id_armada_elments:'<?= $armadaElments->id; ?>'},
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
                      if(v.width == null){
                        widths = 30
                      }else{
                        widths = v.width;
                      }

                      yoda.setAttrs({
                        width: widths,
                        height: widths,
                        id_armada: v.id_armada,
                        id_armada_elments: v.id_armada_elments,
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
              //     Silahkan Refresh Halaman Kembali
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

       stage.on('click', function(e) {
        if(e.target.attrs.cek_target === 'true'){
             $.ajax({
              url: '<?= site_url('backend/armada/getDataOne/'); ?>',
              type: 'post',
              data: {id_jenis_aspek: e.target.attrs.id_jenis_aspek, id_armada:e.target.attrs.id_armada, id_armada_elments:e.target.attrs.id_armada_elments, primary_key:e.target.attrs.primary_key,pointer_x:e.target.attrs.pointer_x,pointer_y:e.target.attrs.pointer_y},
              dataType: 'json',
              success:function(response){
                console.log('response',response)
                if(response){
                  $("#add-panel").modal("show");
                    $('.modal-backdrop').removeClass();
                   
                    $('input[name="id"]').val(response.record.id);
                    $('input[name="id_armada"]').val(response.record.id_armada);
                    $('input[name="id_armada_elments"]').val(response.record.id_armada_elments);
                    $('input[name="id_jenis_aspek"]').val(response.record.id_jenis_aspek);
                    $('input[name="id_sub_jenis_aspek"]').val(response.record.id_sub_jenis_aspek);
                    $('input[name="icon_id"]').val(response.record.icon_id);
                    $('input[name="url"]').val(response.record.url);
                    $('input[name="pointer_x"]').val(response.record.pointer_x);
                    $('input[name="pointer_y"]').val(response.record.pointer_y);
                    $('input[name="primary_key"]').val(response.record.primary_key);
                    $('input[name="kategori"]').val(response.record.kategori);
                    $('.Nama').text(response.record.nama);
                    $('.Aspek').text(response.record.aspek);
                    $('.Nomor').text(response.record.nomor);
                    $('.Kondisi').text(response.record.kondisi);
                    $('.Posisi').text(response.record.posisi);
                    $('.Pengadaan').text(response.record.tahun);
                    // $('.deletesData').show();
                    // if(response.record_file.lenght > 0){
                      $('.showImg').html('');
                      $.each(response.record_file,function(k,v){
                        if(k == 0){
                          $('.showImg').append(`
                            <div class="carousel-item active">
                              <img src="<?php echo base_url(); ?>`+v.fileurl+`" class="img-fluid" style="width:100%;height:420px;" alt="">
                            </div>
                          `);
                        }else{
                          $('.showImg').append(`
                            <div class="carousel-item">
                              <img src="<?php echo base_url(); ?>`+v.fileurl+`" class="img-fluid" style="width:100%;height:420px;" alt="">
                            </div>
                          `);
                        }
                      })
                    // }
                }
              },
              error: function() {
                $('.alertLah').html(`
                  <div class="alert alert-danger">
                    Silahkan Refresh Halaman Kembali
                  </div>
                `);
              }
            });
        }
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
          <form id="formModals" class="form-horizontal" action="<?= site_url('backend/armada/store'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <input type="hidden" name="id">
              <input type="hidden" name="id_armada" value="<?= $armada->id; ?>">
              <input type="hidden" name="id_armada_elments" value="<?= $armadaElments->id; ?>">
              <input type="hidden" name="id_jenis_aspek" value="<?= $record->id; ?>">
              <input type="hidden" name="icon_id">
              <input type="hidden" name="url">
              <input type="hidden" name="pointer_x">
              <input type="hidden" name="pointer_y">
              <input type="hidden" name="primary_key">
              <input type="hidden" name="kategori" value="Armada">
              <div class="col-lg-12">
                <ul>
                  <li>Nama : <span class="Nama"></span></li>
                  <li>Aspek : <span class="Aspek"></span></li>
                  <li>Nomor : <span class="Nomor"></span></li>
                  <li>Kondisi : <span class="Kondisi"></span></li>
                  <li>Posisi : <span class="Posisi"></span></li>
                  <li>Tahun Pengadaan : <span class="Pengadaan"></span></li>
                </ul>
              
              <div class="card">
                <div id="demo2" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                        <!-- <ul class="carousel-indicators">
                          <li data-target="#demo2" data-slide-to="0" class=""></li>
                          <li data-target="#demo2" data-slide-to="1" class=""></li>
                          <li data-target="#demo2" data-slide-to="2" class=""></li>
                        </ul> -->

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner showImg" style="width:100%;">


                        </div>

                        <!-- Controls -->
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo2" data-slide="prev" >
                          <span class="carousel-control-prev-icon" style="background-color: #1f91f3"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo2" data-slide="next">
                          <span class="carousel-control-next-icon" style="background-color: #1f91f3"></span>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-12 floted-right pull-right" style="text-align: right;"><br>
                     <button type="button" class="btn btn-default" id="cancel-button" data-dismiss="modal">Tutup</button>
                   </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
  <script type="text/javascript">
        // $(document).on('click','.saveBtn',function(){
        //   var data = $('#formModals').serializeArray();
        //   console.log('data',data)
        //   $.ajax({
        //     url: '<?= site_url('backend/armada/store'); ?>',
        //     type: 'post',
        //     data: data,
        //     dataType: 'json',
        //     success:function(response){
        //         if(response.status == true){
        //           // $('.alertLah').html(`
        //           //   <div class="alert alert-success">
        //           //     `+ response.message +`
        //           //   </div>
        //           // `);
        //           window.location.reload();
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
        //           Silahkan Refresh Halaman Kembali
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
            url: '<?= site_url('backend/armada/delete'); ?>',
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
                  Silahkan Refresh Halaman Kembali
                </div>
              `);
                $("#add-panel").modal("hide");

            }
          });
        });
      </script>
<?php include 'footer.php'; ?>