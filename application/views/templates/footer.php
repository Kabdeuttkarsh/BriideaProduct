<div class="container" id="chatMsgWindow">


</div>

<script type="text/javascript">
  var cht_messages="";

  showUserListforChat();
  
  showGroupListforChat();

  function showUserListforChat(argument) {
    
     $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/User/showUserListforChat/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
               
                    var html="";
                  
                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;
                      html+='<li id="manageUserSubNav" style="padding: 5px 5px 5px 15px; display: block; font-size: 14px;">'+

                        '<a href="javascript:;"  class="item-OpenChatWindow" data="'+data[i].id+'" firstname="'+data[i].firstname+'"  lastname="'+data[i].lastname+'">'+

                          '<i class="fa fa-circle-o"></i> '+data[i].firstname+' '+data[i].lastname+'</a></li>';
                    }
                 
                   $('#showUserListforChat').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });


  }


  function showGroupListforChat(argument) {
    
     $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/ChatGroup/showGroupListforChat/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
               
                    var html="";
                  
                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;
                      html+='<li id="manageUserSubNav" style="padding: 5px 5px 5px 15px; display: block; font-size: 14px;">'+

                        '<a href="javascript:;"  class="item-OpenGroupChatWindow" data="'+data[i].group_id+'">'+

                          '<i class="fa fa-circle-o"></i> '+data[i].chat_group_name+'</a></li>';
                    }
                 
                   $('#showGroupListforChat').html(html);
                         },
                     error: function(response){
                     //  var data =JSON.parse(response.responseText);
                     //  toastr.error(data.message);
                        }

            });


  }
  
</script>


<script type="text/javascript">
  $(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});


$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});

$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
    if(size){
            size_total = parseInt(size) + 500;
    }
    else{
          size_total =  500;
    }

  //  alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});

$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});


$('#main_div_for_ref').on('click', '.item-OpenChatWindow', function(){
    var id = $(this).attr('data');
    var firstname = $(this).attr('firstname');
    var lastname = $(this).attr('lastname');

    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
            cht_messages=response.data;
            var html="";
             
            if(response.status){

                html=showWindow(firstname,lastname,id,cht_messages);
               

                $('#chatMsgWindow').html(html);
              

                // $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                    
                     $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                     $('#msg_container_base').animate({scrollTop: 999999});

            }

            else{

                  html=showWindow(firstname,lastname,id,cht_messages=null);

                
                   $('#chatMsgWindow').html(html);
                
                //     $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                $('#msg_container_base').animate({scrollTop: 999999});
               
            }
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});




$('#main_div_for_ref').on('click', '.item-OpenGroupChatWindow', function(){
   
    var id = $(this).attr('data');
    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
            var grp_cht_messages=response.data;
            group_row=response.group_row;
            var html="";
             
            if(response.status){

                html=showGroupChatWindow(group_row.chat_group_name,id,grp_cht_messages);
               

                $('#chatMsgWindow').html(html);
              

                // $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                    
                     $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                     $('#msg_container_base').animate({scrollTop: 999999});

            }

            else{

                  html=showGroupChatWindow(group_row.chat_group_name,id,null);

                
                   $('#chatMsgWindow').html(html);
                
                //     $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                $('#msg_container_base').animate({scrollTop: 999999});
               
            }
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});



</script>

<script type="text/javascript">

    function showWindow(firstname,lastname,id,messages) {
      

        var html='';
        var size = $( ".chat-window:last-child" ).css("margin-left");
       
        if(size){
         
           size_total = parseInt(size) + 500;
       
        }
        
        else{

           size_total =  500;
      
        }
       
        var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
        clone.css("margin-left", size_total);
        

        html+='<div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-right:10px;" >'+
        '<div class="col-xs-12 col-md-12">'+
          '<div class="panel panel-default">'+
                '<div class="panel-heading top-bar">'+
                    '<div class="col-md-8 col-xs-8">'+
                        '<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> '+firstname+' '+lastname+'</h3>'+
                    '</div>'+
                    '<div class="col-md-4 col-xs-4" style="text-align: right;">'+
                        '<a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>'+

                        '<a href="#"><span id="max_chat_window" class="glyphicon glyphicon-fullscreen icon_maxim"></span></a>'+
                        
                        '<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>'+
                    '</div>'+
                '</div>'+

                '<div class="panel-body msg_container_base" id="msg_container_base">';
                  
                if(messages){
                     for (var i = 0; i < messages.length; i++) {

                    // messages[i]
                    if(messages[i].sender_message_id!=<?php echo $this->session->userdata('id')?>){
                       html+='<div class="row msg_container base_sent">'+
                                            '<div class="col-md-12 col-xs-12">'+
                                                '<div class="messages msg_sent" style=" background-color: #dcf8c6;">'+
                                                    '<p>'+messages[i].message+'</p>'+
                                                    '<time datetime="'+messages[i].message_time+'">'+messages[i].message_time+'</time>'+
                                                '</div>'+
                                           ' </div>'+
                                           // ' <div class="col-md-2 col-xs-2 avatar">'+
                                           //      '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                                           //  '</div>'+
                                        '</div>';

                    }

                    else{


                         html+= '<div class="row msg_container base_receive">'+
                           // ' <div class="col-md-2 col-xs-2 avatar">'+
                           //      '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                           //  '</div>'+
                            '<div class="col-md-12 col-xs-12">'+
                                '<div class="messages msg_receive">'+
                                   '<p>'+messages[i].message+'</p>'+
                                    '<time datetime="2009-11-13T20:00">'+messages[i].message_time+'</time>'+
                                '</div>'+
                           ' </div>'+
                       ' </div>';
                    }

                }

                }
               
                 html+='</div>'+
                '<div class="panel-footer">'+
                   ' <div class="input-group">'+
                     
                        '<input id="firstnameSend" name="firstnameSend" type="hidden" class="form-control input-sm chat_input" value="'+firstname+'" />'+
                      
                        '<input id="lastnameSend" name="lastnameSend" type="hidden" class="form-control input-sm chat_input" value="'+lastname+'" />'+

                        '<input id="btn-inputID" name="btn-inputID" type="hidden" class="form-control input-sm chat_input" value="'+id+'" />'+

                        '<input id="btn-input" type="text" name="btn-input" class="form-control input-sm chat_input" placeholder="Write your message here..." />'+
                        '<span class="input-group-btn">'+
                        '<a href="javascript:;" class="btn btn-primary btn-sm btnSendMessage">Send</a>'+
                        '</span>'+
                    '</div>'+
               ' </div>'+
       ' </div>'+
        '</div>'+
     ' </div>';

     return html;
    }

</script>



<script type="text/javascript">

    function showGroupChatWindow(group_name,id,messages) {
      

        var html='';
        var size = $( ".chat-window:last-child" ).css("margin-left");
       
        if(size){
         
           size_total = parseInt(size) + 500;
       
        }
        
        else{

           size_total =  500;
      
        }
       
        var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
        clone.css("margin-left", size_total);
        

        html+='<div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-right:10px;" >'+
        '<div class="col-xs-12 col-md-12">'+
          '<div class="panel panel-default">'+
                '<div class="panel-heading top-bar">'+
                    '<div class="col-md-8 col-xs-8">'+
                        '<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> '+group_name+'</h3>'+
                    '</div>'+
                    '<div class="col-md-4 col-xs-4" style="text-align: right;">'+
                        '<a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>'+

                        '<a href="#"><span id="max_chat_window" class="glyphicon glyphicon-fullscreen icon_maxim"></span></a>'+
                        
                        '<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>'+
                    '</div>'+
                '</div>'+

                '<div class="panel-body msg_container_base" id="msg_container_base">';
                  
                if(messages){
                     for (var i = 0; i < messages.length; i++) {

                    // messages[i]
                    if(messages[i].group_message_sender_id!=<?php echo $this->session->userdata('id')?>){
                       html+='<div class="row msg_container base_sent">'+
                                            '<div class="col-md-12 col-xs-12">'+
                                                '<div class="messages msg_sent" style=" background-color: #dcf8c6;"><p style="color:red;">'+messages[i].firstname+' '+messages[i].lastname+'</p>'+
                                                    '<p>'+messages[i].group_message+'</p>'+
                                                    '<time datetime="'+messages[i].group_message_time+'">'+messages[i].group_message_time+'</time>'+
                                                '</div>'+
                                           ' </div>'+
                                           // ' <div class="col-md-2 col-xs-2 avatar">'+
                                           //      '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                                           //  '</div>'+
                                        '</div>';

                    }

                    else{


                         html+= '<div class="row msg_container base_receive">'+
                           // ' <div class="col-md-2 col-xs-2 avatar">'+
                           //      '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                           //  '</div>'+
                            '<div class="col-md-12 col-xs-12">'+
                                '<div class="messages msg_receive"><p style="color:red;">'+messages[i].firstname+' '+messages[i].lastname+'</p>'+
                                   '<p>'+messages[i].group_message+'</p>'+
                                    '<time datetime="2009-11-13T20:00">'+messages[i].group_message_time+'</time>'+
                                '</div>'+
                           ' </div>'+
                       ' </div>';
                    }

                }

                }
               
                 html+='</div>'+
                '<div class="panel-footer">'+
                   ' <div class="form-group">'+
                      
                       '<input id="btn-inputGroupID" name="btn-inputGroupID" type="hidden" class="form-control input-sm group_chat_input" value="'+id+'" />'+

                        '<input id="btn-inputGroupMessage" type="text" name="btn-inputGroupMessage" class="form-control input-sm chat_input" placeholder="Write your message here..." />'+
                        '<span class="input-group-btn">'+
                        '<a href="javascript:;" class="btn btn-primary btn-sm btnSendGroupMessage">Send</a>'+
                        '</span>'+
                    '</div>'+
               ' </div>'+
       ' </div>'+
        '</div>'+
     ' </div>';

     return html;
    }

</script>


<script type="text/javascript">

  // main_div_for_ref
$('#main_div_for_ref').on('click', '.btnSendMessage', function(){
    var typed_message = $('input[name=btn-input]').val();
    var receiver_id = $('input[name=btn-inputID]').val();
    var firstnameSend = $('input[name=firstnameSend]').val();
    var lastnameSend = $('input[name=lastnameSend]').val();
   
    if(typed_message==''){
        toastr.error("Please Enter message and then send");
    }  

    else if (receiver_id=='') {
            toastr.error("Please try again");
    }

    else{

        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url();?>api/UserChat/sendUserMessage',
            data: {'typed_message':typed_message,'receiver_id':receiver_id},
            async: false,
            dataType: 'json',
            success: function(response){

                    if (response.status) {

                       var message_row=response.data;
                       var sender_id_n=response.sender_id_n;
                    // alert(response.data.sender_first_name);

                         var typeData = {broadType : Broadcast.POST, chatType:"OneToOneChat",data : message_row, receiver_id:receiver_id,firstnameSend:firstnameSend,lastnameSend:lastnameSend,cht_messages:cht_messages,sender_first_name:message_row.sender_first_name,sender_last_name:message_row.sender_last_name};


                         conn.sendMsg(typeData);
                   
                     

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


});


$('#main_div_for_ref').on('click', '.btnSendGroupMessage', function(){
    var typed_grp_message = $('input[name=btn-inputGroupMessage]').val();
    var grp_id = $('input[name=btn-inputGroupID]').val();

    if(typed_grp_message==''){
        toastr.error("Please Enter message and then send");
    }  

    else if (grp_id=='') {
            toastr.error("Please try again");
    }

    else{

        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url();?>api/ChatGroup_Messages/sendGroupMessage',
            data: {'typed_grp_message':typed_grp_message,'grp_id':grp_id},
            async: false,
            dataType: 'json',
            success: function(response){

                    if (response.status) {
                       var message_row=response.data;

                        var grp_members=response.grp_members;

                         var typeData = {broadType : Broadcast.POST, chatType:"GroupChat", data : message_row, grp_id:grp_id,grp_members:grp_members};

                         conn.sendMsg(typeData);
                   
                     

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


});



function  refreshChat(id,firstname,lastname) {
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
            cht_messages=response.data;

            sender_data_row=response.sender_data_row;
            receiver_data_row=response.receiver_data_row;
          
            var html="";
             
            if(response.status){



                html=showWindow(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,cht_messages);
               

                $('#chatMsgWindow').html(html);

                  $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                  $('#msg_container_base').animate({scrollTop: 999999});
            }

            else{
                  html=showWindow(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,null);

                
                  $('#chatMsgWindow').html(html);

                    $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                   $('#msg_container_base').animate({scrollTop: 999999});
            }
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

}



function  refreshGroupChat(id,grp_id) {
 
 $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/row',
        data:{'id': grp_id},  
        async: false,
        dataType: 'json',
        success: function(response){
            var grp_cht_messages=response.data;
            group_row=response.group_row;
            var html="";
             
            if(response.status){

                html=showGroupChatWindow(group_row.chat_group_name,grp_id,grp_cht_messages);

                $('#chatMsgWindow').html(html);
              

                // $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                    
                     $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                     $('#msg_container_base').animate({scrollTop: 999999});

            }

            else{

                  html=showGroupChatWindow(group_row.chat_group_name,grp_id,null);

                
                   $('#chatMsgWindow').html(html);
                
                //     $('#msg_container_base').stop().animate({
                //   scrollTop: $("#msg_container_base")[0].scrollHeight
                // }, 800);

                $('#msg_container_base').animate({scrollTop: 999999}).delay(0);
                $('#msg_container_base').animate({scrollTop: 999999});
               
            }
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

}



</script>


<script type="text/javascript">
    var Connection2 = (function(){

  function Connection2(url) {


      this.open = false;

      this.socket = new WebSocket("ws://" + url);
      
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
             var link='<a href="<?php echo base_url("ChatGroups/newWindow/");?>">Click Here</a>';

            if (<?php echo $this->session->userdata('id')?>==newPost) {
                  // console.log(newPost); 
           
             //   refreshChat(data.data.sender_message_id,data.firstnameSend,data.lastnameSend);
                if('<?php echo $this->session->userdata('sess_page') ?>'=='Chat_Window' ||'<?php echo  $this->session->userdata('sess_page') ?>'=='Group_Chat_Window'){

                    refreshChatNew(data.data.sender_message_id,data.firstnameSend,data.lastnameSend);     
                }

                else{
                       toastr.info('You have new Message from '+data.sender_first_name+' ' +data.sender_last_name+'.'+data.data.message+' '+link);

                }
               
            }

            //      Code at sender end after sends message

            else{
                if(data.data.sender_message_id==<?php echo $this->session->userdata('id')?>){
                  //  refreshChat(data.receiver_id,data.firstnameSend,data.lastnameSend);
                    refreshChatNew(data.receiver_id,data.firstnameSend,data.lastnameSend);
                }           
                 
          
                 // console.log("RefreshSenderChat");

              }
        }

        if(data.chatType=="GroupChat"){
            var data1 = data.data;
            
            var grp_mem=data.grp_members;
                
            for (var i = 0; i < grp_mem.length; i++) {
               if(grp_mem[i].user_id==<?php echo $this->session->userdata('id')?>){

//                     refreshGroupChat(grp_mem[i].user_id,data.grp_id)
                    refreshGroupChatNew(grp_mem[i].user_id,data.grp_id)

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
