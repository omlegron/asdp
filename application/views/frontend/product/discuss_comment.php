<?php
 //get discuss_reply
$getDiscuss_reply = $this->m_model->selectas('discuss_id',$discuss_id, 'discuss_comment', 'created_at', 'ASC');
if(count($getDiscuss_reply)>0){
	foreach ($getDiscuss_reply as $key => $valueDiscuss_reply) {
		# code...
		//get user data from sender_id
		$dataReplySender=$this->m_model->selectas('id', $valueDiscuss_reply->sender_id, 'user');
		$senderReplyImg=base_url()."assets/frontend/img/profile_low.png";
		$senderReplyName="Sender";
		if(count($dataReplySender)>0){
		  $senderReplyName=$dataReplySender[0]->name;
		  if($dataReplySender[0]->image != null){
		    $senderReplyImg=$dataReplySender[0]->image;
		  }
		}
		?>
		<div class="comment" style="margin-bottom:1%">
		    <div class="comment-author-ava"><img src="<?=$senderReplyImg;?>" alt="Discuss author"></div>
		    <div class="comment-body" style="padding:1%">
		      	<div class="comment-header d-flex flex-wrap justify-content-between">
		        	<span class="comment-meta"><?= $senderReplyName;?></span>
		      	</div>
		      	<p class="comment-text"><?=$valueDiscuss_reply->message;?></p>
		     	<div class="comment-footer text-right text-sm">
	            	<span class="text-muted">
	                	<?=convert_time_HiMdY($valueDiscuss_reply->created_at);?>
	              	</span>
	            </div>
		    </div>
		</div>
<?php
	}
}
?>