<?php $this->load->view('frontend/layout/header'); ?>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAACWdZfvsxk4RffdTsNZ5vXdi4Y8onJ1I" type="text/javascript"></script>
<?php if (count($content)>0){
?>
	<?= $content[0]->description; ?>
<?php
 }else{
 	redirect(base_url().'My404');
 }
?>

<?php $this->load->view('frontend/layout/footer'); ?>