<!-- list kontak chat-->
<?php
	//$getContact = $this->m_model->selectcustom('select * from chats where sender_id = '.$user_data->id.'  OR receiver_id = '.$user_data->id.' group by receiver_id order by entry_time DESC');
	$getContact = $this->m_model->selectasgroup('sender_id', $user_data->id, 'receiver_id', 'chats', 'id', 'DESC');
?>
<div class="inbox_people">
  	<div class="headind_srch">
    	<div class=" col-xs-12">
     		<h4 class="float-left"><?=$this->lang->line('Recent');?></h4>
    	</div>
    	<!--<div class="srch_bar">
     		<div class="stylish-input-group">
        		<input type="text" class="search-bar"  placeholder="Search" >
        		<span class="input-group-addon">
        		<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
        		</span>
        	</div>
		</div>-->
  	</div>
  	<div class="inbox_chat">
    		<?php
    			if(count($getContact)>0){	
	    			foreach ($getContact as $key => $value) {
	    				# code...
	    				//get user_data
						$getUser = $this->m_model->selectas('id', $value->receiver_id, 'user');
						$last_message="";
						if($value->sts !=3){
							$last_message=$value->message;
						}
						if(count($getUser)>0){
							$nameStore="";
							foreach ($getUser as $key => $valueUser) {
								$getStore = $this->m_model->selectas('user', $value->receiver_id, 'store');
								# code...
								$imgReceiver="";
								$nameReceiver=$valueUser->name;
								if(count($getStore) > 0){
									$nameStore=" (<i>".$getStore[0]->brand."</i>)";
								}
								if($valueUser->image == '') { 
									$imgReceiver=site_url('assets/frontend/img/profile.png');
								}
								else { 
									$imgReceiver=$valueUser->image; 
								}
							}
			?>
							<div id="contact_<?=$valueUser->id;?>" class="chat_list cursor_link" receiver_id="<?=$valueUser->id;?>">
								<div class="chat_people">
					        		<div class="chat_img">
					        			<img src="<?=$imgReceiver;?>" alt="<?=$nameReceiver;?>"> </div>
					        		<div class="chat_ib">
					          			<h5 style="margin-top:10px;">
					          				<?= $nameReceiver.$nameStore;?>
					          				<span class="chat_date">
					          					<?= convert_tgl_mdY($value->entry_time);?>
					          					&nbsp&nbsp
					          					<a onclick="event.preventDefault()">
						          					<i class="fa fa-refresh" aria-hidden="true"></i>
						          				</a>
				          					</span>
				          				</h5>
					          			<!--<p>
					          				<?php //echo substr($last_message, 0, 50)."...";?>
				          				</p>-->
					        		</div>
					      		</div>
					      	</div>
			<?php
						}
	    			}
    			}else{
			?>
						<div class="chat_list">
							<div class="chat_people text-center">
								<h6><?=$this->lang->line('No Chat');?></h6>
				        		<!--<div class="chat_img">
				        			<img src="<?=site_url('assets/frontend/img/profile.png');?>" alt="user">
				        		</div>
				        		<div class="chat_ib">
				          			<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
				          			<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
				        		</div>-->
				      		</div>
			      		</div>
			<?php
    			}
    		?>
    </div>
</div>
<script type="text/javascript">
	$('#contact_<?=$receiver_id;?>').attr('class', 'chat_list active_chat');
</script>