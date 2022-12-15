<?php 

?>

<script type="text/javascript">
	var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);


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
          console.log("Message Sent");
      },
      connectionClose : function(evt){
          this.open = false;
          this.addSystemMessage("Disconnected");
          console.log("Disconnected");
      },

      sendMsg : function(message){
        
          this.socket.send(JSON.stringify({
              msg : message
          }));

     
      },

      // addChatMessage : function(data){
      
      //   switch(data.broadType) {
      //     case Broadcast.POST : this.addNewPost(data); break;
      //     default : console.log("nothing to do");
      //   }
      // },
    
      // addNewPost : function(data){

      //   if(data.chatType=="OneToOneChat"){

      //        var newPost = data.receiver_id;

      //        // Code at receivers end after sender sends message

      //       if (<?php echo $this->session->userdata('id')?>==newPost) {

      //           if(<?php echo $this->session->userdata('logged_in')?>){

      //               // send Delivery Report to Sender if receiver Online

      //                sendDeliveryReceiptToSenderForUserChat(data.data.message_id);

      //            if('<?php echo $this->session->userdata('sess_page') ?>'=='Chat_Window' ||'<?php echo  $this->session->userdata('sess_page') ?>'=='Group_Chat_Window')

      //               {

      //                   showUserListforChat();
                      
      //                   if(chat_open_of_user==data.data.sender_message_id){


      //                      refreshChatNew(data.data.sender_message_id,data.firstnameSend,data.lastnameSend);
                           
      //                       sendSeenReceiptToSenderForUserChat(data.data.sender_message_id);

      //                   }
                        
      //                   else{

      //                     // $('#showNewMsgDiv_'+data.data.sender_message_id).html('<i class="fa fa-circle offline"> New</i>');

      //                       speech.text = 'You have new Message from '+data.sender_first_name+' ' +data.sender_last_name;
      //                      window.speechSynthesis.speak(speech);

      //                       toastr.info('You have new Message from '+data.sender_first_name+' ' +data.sender_last_name);
      //                   }
                             
      //               }

      //               else{
      //                   // $('#showNewMsgDiv_'+data.data.sender_message_id).html('<i class="fa fa-circle offline"> New</i>');


      //                       speech.text = 'You have new Message from '+data.sender_first_name+' ' +data.sender_last_name;
      //                      window.speechSynthesis.speak(speech);
                        
      //                      toastr.info('You have new Message from '+data.sender_first_name+' ' +data.sender_last_name);
      //                   }

                
      //           }

              
      //       }

      //       //      Code at sender end after sends message

      //       else{
                
      //           if(data.data.sender_message_id==<?php echo $this->session->userdata('id')?>){
                 
      //              // sendDeliveryReceiptToSenderForUserChat(data.data.message_id);
      //               showUserListforChat();
                   
      //               refreshChatNew(data.receiver_id,data.firstnameSend,data.lastnameSend);
                    
                
      //           }           
                 
          
            
      //         }
      //   }

      //   if(data.chatType=="GroupChat"){
      //       var data1 = data.data;
            
                
      //       for (var i = 0; i < data1.length; i++) {
             
      //          if(data1[i].user_id==<?php echo $this->session->userdata('id')?>){



      //               if(data1[i].group_message_sender_id!=<?php echo $this->session->userdata('id')?>){

      //                   sendDeliveryReceiptToSenderForGroup(data1[i].group_messages_id,<?php echo $this->session->userdata('id')?>,data.grp_id);
      //               }
                    



      //               if('<?php echo $this->session->userdata('sess_page') ?>'=='Chat_Window' ||'<?php echo  $this->session->userdata('sess_page') ?>'=='Group_Chat_Window')

      //               {
      //                   showGroupListforChat();
      //                   if(chat_open_group==data.grp_id){

      //                       refreshGroupChatNew(data1[i].user_id,data.grp_id);
                        
      //                   }
      //                   else{
                          

      //                       speech.text = 'You have new Message from Group '+data.chat_group_name;
      //                      window.speechSynthesis.speak(speech);
      //                      toastr.info('You have new Message from '+data.chat_group_name);
      //                   }
                     
      //               }
                    
      //               else{

      //                    speech.text = 'You have new Message from Group '+data.chat_group_name;
      //                      window.speechSynthesis.speak(speech);
                       
      //                      toastr.info('You have new Message from '+data.chat_group_name);
      //               }
                    

      //           }
               
      //       }
        
      //   }


        
      // },
    
      // addSystemMessage : function(msg){
      //     // this.chatwindow.innerHTML += "<p>" + msg + "</p>";
      // }
    };

    return Connection2;

})();

</script>