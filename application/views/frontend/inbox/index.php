<?php $this->load->view('frontend/layout/header'); ?>
<div class="offcanvas-wrapper">
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h3><?=$this->lang->line('Chat');?></h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="messaging">
			<div class="inbox_msg">
				<?php
					if($user_data->user_role2 == '1'){
				?>
					<?php $this->load->view('frontend/inbox/list_contact'); ?>
					<?php $this->load->view('frontend/inbox/box_chatting'); ?>
				<?php
					}
					else{
				?>
						<?php $this->load->view('frontend/inbox/list_contact_for_supplier_marketer'); ?>
						<?php $this->load->view('frontend/inbox/box_chatting'); ?>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('frontend/layout/footer'); ?>