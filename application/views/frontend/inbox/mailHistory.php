
<?php
if(count($history_chat)>0){
  foreach ($history_chat as $key => $value) {
    # code...
?>
  <?php
    if($value->sender_id == $sender_id){
  ?>
  <div class="incoming_msg">
    <!--<div class="incoming_msg_img">
      <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
    </div>-->
    <div class="received_msg">
      <div class="received_withd_msg">
        <p>
          <?= $value->message;?>
        </p>
        <span class="time_date" style="margin-top:0px !important; " >
          <?= convert_time_HiMdY($value->entry_time);?>
          <span class="float-right"><?=$this->lang->line('Me');?></span>
        </span>
      </div>
    </div>
  </div>
  <?php
    }else{
  ?>
    <div class="outgoing_msg">
      <div class="sent_msg">
        <p>
          <?= $value->message;?>
        </p>
        <span class="time_date">
          <?= convert_time_HiMdY($value->entry_time);?>
        </span>
      </div>
    </div>
  <?php
    }
  }
}
?>