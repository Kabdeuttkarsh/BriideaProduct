<!-- <div class="container" id="chatMsgWindow">


</div>

 -->
 
<script type="text/javascript">
    function sendDeliveryReceiptToSenderForGroup(message_id) {

        if(message_id!=''){
             $.ajax({
                    type: 'ajax',
                    method:'post',
                    url: '<?php echo base_url();?>api/ChatGroup_Messages/sendDeliveryReceiptToSenderForGroup',
                    data: {'group_message_id':message_id},
                    async: false,
                    dataType: 'json',
                    success: function(response){

                            if (response.status) {
                                
                            }
                            else{
                               toastr.error(response.message);
                            }
                            
                         
                    },

                  error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                    }

                });
        }

    }
  function  sendDeliveryReceiptToSenderForUserChat(message_id){
         if(message_id!=''){

                $.ajax({
                    type: 'ajax',
                    method:'post',
                    url: '<?php echo base_url();?>api/UserChat/sendDeliveryReceiptToSenderForUserChat',
                    data: {'message_id':message_id},
                    async: false,
                    dataType: 'json',
                    success: function(response){

                            if (response.status) {
                                
                            }
                            else{
                               toastr.error(response.message);
                            }
                            
                         
                    },

                  error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                    }

                });
            }
    }
</script>

<script type="text/javascript">

    var Connection2 = (function(){

  function Connection2(url) {


      this.open = false;

      this.socket = new WebSocket("wss://" + url);
      
         this.setupConnectionEvents();

    }

  Connection2.prototype = {
    
    setupConnectionEvents : function () {
          var self = this;

          self.socket.onopen = function(evt) { self.connectionOpen(evt); };
          self.socket.onmessage = function(evt) { self.connectionMessage(evt); };
          self.socket.onclose = function(evt) { self.connectionClose(evt); };
      },

      connectionOpen : function(evt){
          this.open = true;
          this.addSystemMessage("Connected");
           console.log("connection Established");
    },
      connectionMessage : function(evt){
          var data = JSON.parse(evt.data);
         //   console.log(data.msg);
          this.addChatMessage(data.msg);
      },
      connectionClose : function(evt){
          this.open = false;
          this.addSystemMessage("Disconnected");
      },

      sendMsg : function(message){
        
          this.socket.send(JSON.stringify({
              msg : message
          }));

     
      },

      addChatMessage : function(data){
      
        switch(data.broadType) {
          case Broadcast.POST : this.addNewPost(data); break;
          default : console.log("nothing to do");
        }
      },
    
      addNewPost : function(data){

        if(data.chatType=="OneToOneChat"){

             var newPost = data.receiver_id;

             // Code at receivers end after sender sends message

            if (<?php echo $this->session->userdata('id')?>==newPost) {

                if(<?php echo $this->session->userdata('logged_in')?>){

                    // send Delivery Report to Sender if receiver Online

                    sendDeliveryReceiptToSenderForUserChat(data.data.message_id);

                    if('<?php echo $this->session->userdata('sess_page') ?>'=='Chat_Window' ||'<?php echo  $this->session->userdata('sess_page') ?>'=='Group_Chat_Window')

                    {

                        showUserListforChat();
                      
                        if(chat_open_of_user==data.data.sender_message_id){


                            refreshChatNew(data.data.sender_message_id,data.firstnameSend,data.lastnameSend);

                        }
                        
                        else{

                            $('#showNewMsgDiv_'+data.data.sender_message_id).html('<i class="fa fa-circle offline"> New</i>');

                            toastr.info('You have new Message from '+data.sender_first_name+' ' +data.sender_last_name);
                        }
                             
                    }

                    else{
                        $('#showNewMsgDiv_'+data.data.sender_message_id).html('<i class="fa fa-circle offline"> New</i>');
                           toastr.info('You have new Message from '+data.sender_first_name+' ' +data.sender_last_name);
                        }

                
                }

              
            }

            //      Code at sender end after sends message

            else{
                
                if(data.data.sender_message_id==<?php echo $this->session->userdata('id')?>){
                 
                   // showWindow12(data.firstnameSend,data.lastnameSend,data.data.receiver_id,cht_messages);
                    
                     showUserListforChat();

                     refreshChatNew(data.receiver_id,data.firstnameSend,data.lastnameSend);
                
                }           
                 
          
            
              }
        }

        if(data.chatType=="GroupChat"){
            var data1 = data.data;
            
                
            for (var i = 0; i < data1.length; i++) {
             
               if(data1[i].user_id==<?php echo $this->session->userdata('id')?>){

                    sendDeliveryReceiptToSenderForGroup(data1[i].group_messages_id);


                    if('<?php echo $this->session->userdata('sess_page') ?>'=='Chat_Window' ||'<?php echo  $this->session->userdata('sess_page') ?>'=='Group_Chat_Window')

                    {
                        showGroupListforChat();
                        if(chat_open_group==data.grp_id){
                            refreshGroupChatNew(data1[i].user_id,data.grp_id);
                        }
                        else{
                           $('#showGroupNewMsgDiv_'+data.grp_id).html('<i class="fa fa-circle offline"> New</i>');
                           toastr.info('You have new Message from '+data.chat_group_name);
                        }
                     
                    }
                    
                    else{
                        $('#showGroupNewMsgDiv_'+data.grp_id).html('<i class="fa fa-circle offline"> New</i>');
                           toastr.info('You have new Message from '+data.chat_group_name);
                    }
                    

                }
               
            }
        
        }

     
        
      },
    
      addSystemMessage : function(msg){
          // this.chatwindow.innerHTML += "<p>" + msg + "</p>";
      }
    };

    return Connection2;

})();

</script>

<script type="text/javascript">
  
var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
</script>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>&copy; 2021 - <?php echo date('Y'); ?> |</strong> All rights
    reserved and Developed by <a href="" target="_BLANK">Uttkarsh Kabde</a>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



</body>
</html>
