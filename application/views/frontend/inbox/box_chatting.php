<div class="mesgs">
    
  <div class="msg_history">
  <div id="div_history_chat" >
    <!-- Content Message from AJAX -->

  </div>
</div>
  <div class="type_msg">
    <div class="input_msg_write">
      <?php
      //print_r($user_data);
      ?>
        <input type="hidden" value="<?= $user_data->id;?>" id="user_id_sender"/>
        <input type="hidden" id="receiver_id" value="<?= $receiver_id;?>"/>
        <input id="message_box" type="text" class="write_msg" placeholder="<?=$this->lang->line('Type a message');?>" />
        <button id="btn_send_message" class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    function get_history(sender_id, receiver_id){
      dataMap={};
      dataMap['sender_id']=sender_id;
      dataMap['receiver_id']=receiver_id;
      $.post('<?= site_url('member/mailHistory'); ?>', dataMap, function(data){
        $("#div_history_chat").html(data);
        //$("#div_history_chat").scrollTop(1000000000000000);
        $("#div_history_chat").animate({scrollTop: 1000000000}, 800);
      })
    }

    function send_message(sender_id, receiver_id, $message){
      dataMap={};
      dataMap['sender_id']=sender_id;
      dataMap['receiver_id']=receiver_id;
      dataMap['message']=message;
      $.post('<?= site_url('member/send_message'); ?>', dataMap, function(data){
        json=$.parseJSON(data);
        if(json.send==1){
          var message='<div class="incoming_msg">'+
                        '<div class="received_msg">'+
                          '<div class="received_withd_msg">'+
                            '<p>'+
                              dataMap['message']+
                            '</p>'+
                            '<span class="time_date" style="margin-top:0px !important; " >'+
                              json.time+
                              '<span class="float-right">Me</span>'+
                            '</span>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
          $('#div_history_chat').append(message);
          $('.msg_send_btn').attr('id', 'btn_send_message');
          $('.msg_send_btn').html('<i class="fa fa-paper-plane-o"></i>')
        }
        else{
          alert("Send message failed!")
        }
        $('#message_box').val(null);
        $('#message_box').removeAttr('disabled');
        //$("#div_history_chat").scrollTop(1000000000000000);
        $("#div_history_chat").animate({scrollTop: -1000000000000000}, 800);

      })
    }

    var receiver_id=$("#receiver_id").val();
    var user_id_sender=$("#user_id_sender").val();
    if(receiver_id != '' && receiver_id >0){
      get_history(user_id_sender, receiver_id);
    }

    $(document).on('click', '[id^=contact_]', function(e){
      user_id_sender=$("#user_id_sender").val();
      receiver_id=$(this).attr('receiver_id');
      $('#receiver_id').val(receiver_id);
      get_history(user_id_sender, receiver_id);
    })

    $(document).on('click', '[id=btn_send_message]', function(e){
      e.preventDefault();
      event_now=$(this);
      event_now.html('<i class="fa fa-spinner fa-pulse"></i>');
      event_now.removeAttr('id');
      if($('#message_box').val().trim() === '' || $('#receiver_id').val() === '' || $('#user_id_sender').val()  === '' ){
        event_now.attr('id', 'btn_send_message');
        return;
      }
      user_id_sender=$("#user_id_sender").val();
      receiver_id=$('#receiver_id').val();
      message=$('#message_box').val();
      $('#message_box').attr('disabled', 'disabled');
      send_message(user_id_sender, receiver_id);
      //event_now.attr('id', 'btn_send_message');
    })
  })
</script>