
<script src="<?=base_url();?>assets/frontend/js/jquery.js"></script> 
<script src="<?=base_url();?>assets/frontend/js/konva.min.js"></script>
<script src="<?=base_url();?>assets/frontend/js/html2canvas.min.js"></script>

<style type="text/css">
	.color-red{
		background-color: red;
		color: white;

	}
</style>


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
							<a href="<?=base_url();?>panel/armada"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
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
																		<li style="padding-bottom: 1px;" id="drag-items">
																			<img src="<?=$imgs['path'];?>" class="img-responsive drag" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px;padding-bottom: 1px;<?= $color; ?>" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>" data-key="<?= $keySubIco + 1; ?>" data-id="<?= $cekReal['id']; ?>" data-aspek="<?= $value->name; ?>" data-name="<?= $cekReal['name']; ?>" data-elment="<?= $armadaElments->id; ?>" data-sub="<?= $value->id; ?>">&nbsp;
																			<span style="font-size: 12px;">
                                        <?= $cekReal['name']; ?>
                                          <span class="rounded-circle text-white bg-warning mr-1" style="padding: 1px 8px;"><?= $coun; ?></span>    
                                        </span>
																			<!-- <ul>
																				<?php 
																				$iconSubIndex = $this->m_model->selectas('trans_id', $cekReal['id'], 'icon_sub');
																				if (count($iconSubIndex) > 0) {
																					foreach ($iconSubIndex as $k1 => $valueindex) {
																						$num = $k1+1;
																						echo '<li >'.$num.'. '.$valueindex->value.'</li>';
																					}
																				}
																				?>
																			</ul> -->
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
                      yoda.setAttrs({
                        width: 30,
                        height: 30,
                        id_armada: v.id_armada,
                        id_armada_elments: v.id_armada_elments,
                        id_jenis_aspek: v.id_jenis_aspek,
                        id_sub_jenis_aspek:v.id_sub_jenis_aspek,
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
          $('input[name="id_sub_jenis_aspek"]').val(e.target.dataset.sub);
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
                    $('input[name="nama"]').val(response.record.nama);
                    $('input[name="aspek"]').val(response.record.aspek);
                    $('input[name="nomor"]').val(response.record.nomor);
                    $('input[name="kondisi"]').val(response.record.kondisi);
                    $('input[name="posisi"]').val(response.record.posisi);
                    $('input[name="tahun"]').val(response.record.tahun);
                    $('.deletesData').show();
                    // if(response.record_file.lenght > 0){
                      $.each(response.record_file,function(k,v){
                        $('.showImg').append(`
                          <a href="<?= base_url(); ?>`+v.fileurl+`" title=""><img src="<?php echo base_url(); ?>`+v.fileurl+`" class="img-responsive" alt="" style="width:120px;height:150px"></a> 
                        `);
                      })
                    // }
                }
              },
              error: function() {
                $('.alertLah').html(`
                  <div class="alert alert-danger">
                    Terjadi Kesalahan!
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
              <input type="hidden" name="id_sub_jenis_aspek">
              <input type="hidden" name="icon_id">
              <input type="hidden" name="url">
              <input type="hidden" name="pointer_x">
              <input type="hidden" name="pointer_y">
              <input type="hidden" name="primary_key">
              <input type="hidden" name="kategori" value="Armada">
              <textarea name="url_canvas" id="url_canvas" style="display: none;"></textarea>
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
                    <input name="icon[]" type="file" class="form-control" style="cursor: pointer;" accept="image/*" multiple="">
                </div>
              </div><br>
              <div class="row showImg">
              	
              </div>
              <div class="col-md-12 floted-right pull-right" style="text-align: right;"><br>
              	 <button type="button" class="btn btn-default" id="cancel-button" data-dismiss="modal">Cancel</button>
        			<button type="button" class="btn btn-danger deleteDatak deletesData" id="cancel-button" data-dismiss="modal" style="display: none">Delete</button>
        			<button name="store" type="button" class="btn btn-primary saveBtn" id="confirm-button">Save</button>
              <button type="submit" class="btn btn-primary" id="bnke_btn" style="display: none;">Save</button>
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
  <script type="text/javascript">
        $(document).on('click','.saveBtn',function(){
            console.log('asda')
            var element = $('#containers');
            var getCanvas= '';
            html2canvas(element, {
             onrendered: function (canvas) {
                    getCanvas = canvas;
                    var imgageData = getCanvas.toDataURL("image/png");
                    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                    console.log('newData',newData)
                    $('#url_canvas').val(imgageData);
                    // window.open(imgageData);
                    // $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
                 }
             });
            // console.log('asd',getCanvas)
                      
            var data = $('#formModals').serializeArray();
            console.log('data',data)
            time = 5;
            interval = setInterval(function(){
              time--;
              if(time == 0){
                clearInterval(interval);
                $( "#bnke_btn" ).trigger('click');
                
              }
            },1000);
        });

        $(document).on('click','.deleteDatak',function(){
          var element = $('#containers');
          var getCanvas= '';
          html2canvas(element, {
           onrendered: function (canvas) {
                  getCanvas = canvas;
                  var imgageData = getCanvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                   var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                  console.log('newData',newData)
                  // $('#url_canvas').val(imgageData);
                  // window.open(imgageData);
                  // $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
               }
           });

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
              // $('.alertLah').html(`
              //   <div class="alert alert-danger">
              //     Terjadi Kesalahan!
              //   </div>
              // `);
                $("#add-panel").modal("hide");

            }
          });
        });
      </script>
<?php include 'footer.php'; ?>