<?php $this->load->view('frontend/layout/header'); ?>
<div class="offcanvas-wrapper padding-top-2x">
  	<div class="container padding-bottom-3x mb-2">
        <div class="row">
          <?php //include 'sidebar.php'; 
             $this->load->view('frontend/member/member-sidebar');
          ?>
          <div class="col-lg-9">
          	<a class="btn btn-sm btn-primary" href="<?= base_url().'supplier/ProductUpdate?token='.$this->input->get('token').'&action=getCSV';?>"><?=$this->lang->line('download_csv');?></a>
          	<label class="text-info">* <?= $this->lang->line('cap_downloadFirstCSV');?></label>
          	<hr class="margin-bottom-1x">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <form  action="" method="post" enctype="multipart/form-data">
				<div class="form-group row">
	              	<label class="col-2 col-form-label" for="file-input">File (CSV)</label>
	              	<div class="col-10">
	                	<div class="custom-file">
	                  		<input class="custom-file-input" type="file" id="file-input" accept="csv/*" required="" disabled>
	                  		<label class="custom-file-label" for="file-input"><?=$this->lang->line('Choose file');?>...</label>
	                	</div>
	              	</div>
	            </div>
	            <input type="submit" name="upload_csv" value="<?=$this->lang->line('upload_csv');?>" class="btn btn-primary" disabled>
            </form>
            <label class="text-danger">*Masih dilakukan perbaikan pada proses upload</label>
	        </div>
	    </div>
	</div>
</div>
<?php $this->load->view('frontend/layout/footer'); ?>