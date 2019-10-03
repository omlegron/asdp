<?php
//get user data from sender_id
$dataSender=$this->m_model->selectas('id', $sender_id, 'user');
$senderImg=base_url()."assets/frontend/img/profile_low.png";
$senderName="Sender";
if(count($dataSender)>0){
  $senderName=$dataSender[0]->name;
  if($dataSender[0]->image != null){
    $senderImg=$dataSender[0]->image;
  }
}
?>
<div id="parentDiscuss-<?= $id;?>" class="card bg-secondary" style="padding:1%; margin-top: 1%;">
  <div class="comment" style="margin-bottom: 0px !important; ">
    <div class="comment-author-ava">
      <img src="<?=$senderImg;?>" alt="Discuss author">
    </div>
    <div class="comment-body card-body" style="padding:1%">
      <div class="comment-header d-flex flex-wrap justify-content-between">
        <span class="comment-meta"><?=$senderName;?></span>
      </div>
      <p class="comment-text"><?= $message;?></p>
      <div class="comment-footer text-right text-sm">
        <span class="text-muted">
          <?=convert_time_HiMdY($created_at);?>
        </span>
      </div>
    </div>
    <div id="div_reply-<?= $id;?>" style="margin-top:1%;">
      <?php
        //discuss_reply
      ?>
    </div>
    <form class="row" method="post" style="margin-top: 1%;" action="<?= base_url();?>product/discuss_comment?add=true">
      <div class="comment col-12" style="margin-bottom: 0px !important; ">
        <div class="comment-header d-flex flex-wrap justify-content-between">
        </div>
        <input type="hidden" name="sender_id" value="<?=$sender_id;?>">
        <input type="hidden" name="discuss_id" value="<?= $id;?>">
        <textarea class="form-control form-control-rounded" id="message" name="message" rows="1" placeholder="Ketikan komentar anda..."></textarea>
        <button class="btn btn-outline-primary float-right" type="submit" style="margin-bottom: 0px !important; " onclick="event.preventDefault(); sendDiscussReply(this);">Kirim</button>
        <div class="comment-footer"></div>
      </div>
    </form>
  </div>
</div>