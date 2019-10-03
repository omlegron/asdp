<?php $this->load->view('frontend/layout/header'); ?>
<div class="offcanvas-wrapper"><!-- Page Title-->
	<div class="page-title">
		<div class="container">
			<div class="column">
				<h1>Membership for Seller</h1>
			</div>
			<div class="column">
				<ul class="breadcrumbs" style="text-align: right;">
					<li style="text-align: right;"><a href="https://www.bazaarplace.com">Home</a></li>
					<li class="separator" style="text-align: right;">&nbsp;</li>
					<li style="text-align: right;">Membership</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Page Content-->
	<div class="container padding-bottom-2x mb-2">
		<div class="row align-items-center padding-bottom-2x">
			<div class="comparison">
				<table>
					<thead>
						<tr>
							<th class="tl tl2">&nbsp;</th>
							<th class="tl tl2">&nbsp;</th>
							<th class="tl tl2">&nbsp;</th>
							<th class="tl tl2">
								&nbsp;
							</th>
							<th class="tl tl2">&nbsp;</th>
						</tr>
						<tr>
							<th>&nbsp;</th>
					<?php
						$membership_detail = $this->m_model->selectasmax('4', 'status_promotion=1 AND order_display!=0', 'membership_detail', 'order_display', 'ASC');
						$ls_membership_detail=array();
						if(count($membership_detail)>0){
							foreach ($membership_detail as $key => $value) {
								//get type membership
								$ls_membership_detail[]=$value->id;
								$type_membership="-";
								$membership=$this->m_model->selectas('id', $value->membership_id, 'membership');
								if(count($membership)>0){
									$type_membership=$membership[0]->type;
								}
								# code...
								if($value->price==0){
									$th='<th class="price-info">
								<div class="card cm-bg-gray text-center hidden-xs-down" style="margin-bottom: 0.5em;">
									<div class="card-body">
										<h6 class="card-title">'.$type_membership.'</h6>
										<p class="card-text">
											<h2 class="card-title">Free</h2>
										</p>
										&nbsp;
										<br>
										<br>
										<br>
									</div>
								</div>
								<div class="hidden-sm-up">
									<h4>
										Free
									</h4>
								</div>
							</th>';
								}
								else if($value->price>0 && $value->status_best==1){
									$th='<th class="price-info">
								<div class="card text-center cm-shadow cm-txt-white hidden-xs-down" style="margin-bottom: 0.5em; background-image: url(\''.base_url().'assets/frontend/img/bg-best-card.png\');">
									<div class="card-body">
										<div class="cm-label-bg">
					                        <span class="float-right cm-label-harga">Best</span>
					                    </div>
										<br>
										<h4 class="card-title cm-txt-white">'.$type_membership.'</h4>
										<p class="card-text best">
											<h2 class="card-title cm-txt-white">Rp. '.number_format($value->price).'</h2>
											'.$value->period.' '.$this->lang->line('bulan').'
											<div class="hidden-md-down">
												<a class="btn cm-bg-gradient-1 btn-sm " href="subscribeMembership?membershipDetail='.$value->id.'">'.$this->lang->line('subscribe').'</a>
											</div>
											<div class="hidden-sm-down">
											<a class="btn cm-bg-gradient-1  btn-sm " href="subscribeMembership?membershipDetail='.$value->id.'"><i class="fa fa-rss"></i></a>
											</div>
										</p>
									</div>
								</div>
								<div class="hidden-sm-up text-center  cm-txt-white" style="background-image: url(\''.base_url().'assets/frontend/img/bg-best-card.png\'); background-size:100% 100%; position:relative;">
									<h6 class="cm-txt-white" style="margin:0px; background:#ec2427; width:100%;">Best</h6>
									<h6 class="cm-txt-white">'.$type_membership.'</h6>
									<br>
									<br>
									<b>Rp. '.number_format($value->price).'</b>
									<br>
									'.$value->period.' '.$this->lang->line('bulan').'
									<a class="btn btn-sm cm-bg-gradient-1" href="subscribeMembership?membershipDetail='.$value->id.'" title="'.$this->lang->line('subscribe').'"><i class="fa fa-rss"></i></a>
								</div>
							</th>';	
								}
								else {
									$th='<th class="price-info">
								<div class="card text-center hidden-xs-down" style="margin-bottom: 0.5em;">
									<div class="card-body">
										<h6 class="card-title ">'.$type_membership.'</h6>
										<p class="card-text">
											<h2 class="card-title">Rp. '.number_format($value->price).'</h2>
											'.$value->period.' '.$this->lang->line('bulan').'
											<div class="hidden-md-down">
												<a class="btn cm-bg-gradient-1  btn-sm" href="subscribeMembership?membershipDetail='.$value->id.'">'.$this->lang->line('subscribe').'</a>
											</div>
											<div class="hidden-sm-down">
												<a class="btn cm-bg-gradient-1  btn-sm" href="subscribeMembership?membershipDetail='.$value->id.'"><i class="fa fa-rss"></i></a>
											</div>
										</p>
									</div>
								</div>
								<div class="hidden-sm-up text-center">
									'.$type_membership.'
									<br>
									<br>
									<b>Rp. '.number_format($value->price).'</b>
									<br>
									'.$value->period.' '.$this->lang->line('bulan').'
									<a class="btn btn-sm cm-bg-gradient-1" href="subscribeMembership?membershipDetail='.$value->id.'" title="'.$this->lang->line('subscribe').'"><i class="fa fa-rss"></i></a>
								</div>
							</th>';	
								}
								echo $th;
							}
						}
					?>
						</tr>
					</thead>
					<tbody>
						<?php
							$membership_desc=$this->m_model->select('membership_desc');
							if(count($membership_desc)>0){
								foreach ($membership_desc as $key_desc => $value_desc) {
									# code...
									$membership_desc_id=$value_desc->id;
									if($this->session->userdata('language') !=null){
							            if($this->session->userdata('language') == 'bahasa'){
							            	$description=$value_desc->title;
							            }
							            else if($this->session->userdata('language') == 'english'){
							            	$description=$value_desc->title_eng;
							            }
							        }
							        else{
							            $description=$value_desc->title;
							        }
						?>
									<tr>
										<td style="border-top: 5px solid #fff;">&nbsp;</td>
										<td colspan="4" style="border-top: 5px solid #fff;"><?= $description;?></td>
									</tr>
									<tr class="<?php if($key_desc%2 == 0) echo 'compare-row';?>">
										<td><?= $description;?></td>
									<?php
									foreach ($ls_membership_detail as $key_membership_detail => $value_membership_detail) {
										# code...
										$membership_fitur=$this->m_model->selectas2('membership_detail_id', $value_membership_detail, 'membership_desc_id', $membership_desc_id, 'membership_detail_fitur');
										if(count($membership_fitur) > 0){
											switch (strtolower($membership_fitur[0]->note)) {
												case 'no':
													# code...
													$val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
													break;
												case 'yes':
													# code...
													$val_note='<span class="text-success"><i class="icon-check-circle"></i></span>';
													break;
												case '':
													# code...
													$val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
													break;
												case '0':
													# code...
													$val_note='<span class="text-danger"><i class="icon-x-circle"></i></span>';
													break;
												default:
													# code...
													$val_note='<span class="tickblue">'.$membership_fitur[0]->note.'<span class="tickblue">';
													break;
											}
										}
								?>
									<td><?=$val_note;?></td>
						<?php
									}
								}
							}
						?>
						</tr>
					</tbody>
				</table>
			</div>
			<hr />
		</div>
		<p>&nbsp;</p>
	</div>
</div>
<?php $this->load->view('frontend/layout/footer'); ?>
