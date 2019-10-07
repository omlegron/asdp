<script type="text/javascript">

</script>
<style type="text/css">

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
							<a href="<?=base_url();?>panel/armada"  class="btn btn-primary btn-sm" style="color: #fff">Kembali</a>
						</div>
					</div>
					<div class="col-lg-4">

					</div>
				</div>


				<div class="wrapper content">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-4">      
								<div class="form-group">
									<div class="input-group" >     

										<select name="deck_id" class="form-control show-tick" required>
											<option value="">Select One </option>

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
							</div>
							<div class="showAppendArmada">
								<div class="col-lg-12 col-md-4">
									<div class="card">
										<div id="demo2" class="carousel slide" data-ride="carousel">
											
											<ul class="carousel-indicators">
												<li data-target="#demo2" data-slide-to="2" class="active"></li>
											</ul>

											
											<div class="carousel-inner" style="width:100%;max-height: 350px !important;">
												<div class="carousel-item active">
													<?php 
													$imgs=check_img($armadaElments->path_file);
													?>
													<img src="<?= $imgs['path']; ?>" class="img-fluid center" style="width:100%;max-height: 350px !important;" alt="">
													<div class="carousel-caption">
														<h3><?= $armadaElments->name; ?></h3>
													</div>
												</div>
											</div>

											
										</div>
									</div>
								</div>   
								<div class="col-lg-12 mb-3 p-0" style="background: #dadada">
									<div class="bg-warning text-center py-1">
										<h3 class="text-white font-weight-bold"><span style="font-weight: 1"><?= $record->nama_aspek; ?></span></h3>
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
																		<li style="padding-bottom: 5px">
																			<img src="<?=$imgs['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;width: 30px" data-fancybox="images<?= $keySubIco + 1; ?>" href="<?=$imgs['path'];?>">&nbsp;
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

<?php include 'footer.php'; ?>