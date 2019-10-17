<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Lib Scripts Plugin Js --> 
<?php include 'header.php'; ?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="header">
				<div class="row">
					<div class="col-lg-6">
						<h2>List Pelabuhan</h2>
					</div>
					<div class="col-lg-6 pull-right" style="position: relative;left: 350px;">
						<div class="input-group" style="width: 150px;">
							<!-- <select name="filter[status]" class="form-control show-tick">
								<option value="Pelabuhan">Pelabuhan</option>
								<option value="Armada">Armada</option>
							</select>
							<div class="input-group-btn">
								<button type="button" class="btn btn-success searchs" style="position: relative;top: 4px;">Search </button>
							</div> -->
							<!-- <div class="input-group-btn">
								<a class="btn btn-primary" href="<?= site_url('panel/icon?add=true'); ?>" style="position: relative;top: 4px;">Add Icon</a>
							</div> --><!-- /btn-group -->
						</div><!-- /input-group -->
					</div>
				</div>
			</div>
			<div class="body">

				<table class="table table-bordered table-striped table-hover dataTable js-basic-example" id="example">
					<thead>
						<tr>
							<th style="width: 50px;text-align: center;">No</th>
							<th>Cabang</th>                             
							<th>Nama</th>                             
							<th>Foto</th>                             
							<th>Dibuat Pada</th>                             
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$data = $this->m_model->all('pelabuhans');
						if (count($data) > 0) {
							foreach ($data as $key => $value) {
								$img=check_img($value->foto);
								$cabang=$this->m_model->selectOne('id',$value->cabang_id,'cabangs');
								$cabs = isset($cabang->name) ? $cabang->name : '';
								?>
								<tr>
									<td style="text-align: center;"><?= $key + 1; ?></td>
									<td><?= $cabang->name; ?></td>
									<td>
										<?= $value->name; ?>
									</td>
									<td style="text-align: center;">
										<img src="<?=$img['path'];?>" class="img-responsive" style="cursor: pointer; max-width: 50px; max-height:50px;" data-fancybox="images<?= $key + 1; ?>" href="<?=$img['path'];?>">
									</td>
									<td>
										<?= $value->created_at; ?>
									</td>
									<td style="width: 70px">
										<a class="confirm badge badge-info" msg="Do you want to Edit data?" href="<?= site_url('backend/laporan/print/').$value->id; ?>">Export Pdf</a>
									</td>
								</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>