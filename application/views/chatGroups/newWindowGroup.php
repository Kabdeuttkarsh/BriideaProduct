<link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>


<style type="text/css">
    body{
    background-color: #f4f7f6;
    /*margin-top:20px;*/
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
/*    margin-bottom: 30px;*/
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.people-list {
    -moz-transition: .5s;
    -o-transition: .5s;
    -webkit-transition: .5s;
    transition: .5s
}

.chat{
    min-height: 100%;
}

.chat-app .chat-list {
    height: 200px;  
    overflow-x: auto;
}

.people-list .chat-list li {
    padding: 2px 5px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.chat-app .chat-list1 {
    height: 150px;  
    overflow-x: auto;
}

.people-list .chat-list1 li {
    padding: 2px 5px;
    list-style: none;
    border-radius: 3px
}

.people-list .chat-list1 li:hover {
    background: #efefef;
    cursor: pointer
}

.people-list .chat-list1 li.active {
    background: #efefef
}

.people-list .chat-list1 li .name {
    font-size: 15px
}

.people-list .chat-list1 img {
    width: 45px;
    border-radius: 50%
}


.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: #efefef
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 30px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #efefef;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: #e8f1f3;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: #e8f1f3;
    left: 93%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {

    margin-left: 5px;
    margin-right: 2px;
    font-size: 12px;
    vertical-align: left
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

 .chat-app .chat-history {
        height: 400px;
        overflow-x: auto
    }

@media only screen and (max-width: 767px) {

    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-back{
        display: block;
    }

    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 250px;
        overflow-x: auto
    }

    .chat-app .chat-list1 {
        height: 150px;
        overflow-x: auto
    }

    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 250px;
        overflow-x: auto
    }

    .chat-app .chat-list1 {
        height: 150px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}

#contextMenu {
  position: absolute;
  display: none;
}


#contextMenuGroup {
  position: absolute;
  display: none;
}


</style>
<script type="text/javascript">
    $(function() {
        var id = '';
        var delivery_time ='';
        var seen_time = '';
        var $contextMenu = $("#contextMenu");

    $("body").on("contextmenu", "#UserSentMsg,#GroupSentMsg", function(e) {

          type = $(this).attr('type');
          id = $(this).attr('data');
     
          if(type=="UserChat") {

              delivery_time = $(this).attr('delivery_time');
              seen_time = $(this).attr('seen_time');
            


             convertedDate=dateChangeFormat(delivery_time);
             convertedSeenDate=dateChangeFormat(seen_time);

                
             if(delivery_time!=null){
                $('#delivery_time').html("Delivery :- "+convertedDate);
             }
             else{
                $('#delivery_time').html("Delivery :- -");
             }

             if(seen_time!=null){
                $('#seen_time').html("Seen :- "+convertedSeenDate);
             }
             else{
                $('#seen_time').html("Seen :- -");
             }
             // if(id!=null){
             //    $('#msg_delete').html('<a tabindex="-1" href="javascript:;" class="item-deleteUserMsg" data="'+id+'">Delete Message</a>');
             //    // 
             // }
             
      
          }

          if(type=="GroupChat"){

             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/ChatGroup_Messages/message_info_row',
                data:{'id': id},  
                async: false,
                dataType: 'json',
                success: function(response){
                    var seen_status_html="Seen Info<br>";
                    var delivery_status_html="Delivery Info<br>";

                    var seen_status=response.seen_status;
                    var delivery_status=response.delivery_status;
                     
                    if(response.status){

                        for (var i = 0; i < delivery_status.length; i++) {
                            
                            if(delivery_status[i].is_delivered==1){

                                    convertedDate=dateChangeFormat(delivery_status[i].delivery_time);
                                 }else{
                                    convertedDate='-';
                                 }
                           
                            delivery_status_html+=delivery_status[i].firstname+' '+ delivery_status[i].lastname+'-'+ convertedDate+'<br>';

                        }

                            for (var i = 0; i < seen_status.length; i++) {

                                if(seen_status[i].seen_time!=null){
                                     convertedSeenDate=dateChangeFormat(seen_status[i].seen_time);
                                 }else{
                                     convertedSeenDate='-';
                                 }
                            

                            seen_status_html+=seen_status[i].firstname+' '+ seen_status[i].lastname+'-'+ convertedSeenDate+'<br>';

                        }

                        $('#delivery_time').html(delivery_status_html);
                        $('#seen_time').html(seen_status_html);

                    }

                    else{

                        $('#delivery_time').html('');
                        $('#seen_time').html('');

                    }

                        // if(id!=null){
                        //     $('#msg_delete').html('<a tabindex="-1" href="javascript:;" class="item-deleteUserMsg" data="'+id+'">Delete Message</a>');
                        //     // 
                        //  }
                        
                },
                  error: function(response){
               
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });



         
          }
      
         $contextMenu.css({
              display: "block",
              left: e.pageX-150,
              top: e.pageY-100
         });
     
         return false;
    });

    $('html').click(function() {
         $contextMenu.hide();
    });
  
  $("#contextMenu li a").click(function(e){

    $contextMenu.css({
              display: "block",
              left: e.pageX-150,
              top: e.pageY-100
         });    
    var  f = $(this);
  
  });



});
</script>

<div class="content-wrapper" id="mainDiv">

        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="form-group">
             
                  <input type="text" class="form-control" placeholder="Search User or Group" name="UserSearch" id="UserSearch"> 
                </div>

                <!-- <ul class="list-unstyled chat-list mt-2 mb-0" style="overflow-y: auto;"> -->
                    <div id="showUserListforChat12"></div>
                  
                    <div id="showGroupListforChat12"></div>  
            </div>
            

            <div class="chat" id="ShowChatPerson">

                
            </div>


        </div>

    
    <!-- </div> -->
<!-- </div> -->
<!-- </div> -->
    <!-- </section> -->

<div class="modal fade" id="UserInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">User Info
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body" id="modal-body">
     

      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="multifileuploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Files Upload
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body" id="modal-body">

             <form action="<?php echo base_url('api/UserChat/uploadFilesUserChat'); ?>" class="dropzone" id="MessWithFile">
                  <input type="hidden" id="receiver_id" name="receiver_id" />

                <input type="hidden" name="firstname" value="" id="firstname" class="form-control" placeholder="Enter text here..."> 
                
                <input type="hidden" name="lastname" value="" id="lastname" class="form-control" placeholder="Enter text here..."> 

                  <div class="form-group">
                   <input type="text" name="new_message_with_files" id="new_message_with_files" class="form-control" placeholder="Enter text here..."/> 
                 </div>
             </form> 
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="button" class="btn btn-info" id='uploadfiles' value='Upload Files' >
   
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="multifileuploadModalGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
     
      <div class="modal-header modal-title">Files Upload
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
     
      <div class="modal-body" id="modal-body">

            <form action="<?php echo base_url('api/ChatGroup_Messages/uploadFilesGroupChat'); ?>" class="dropzone" id="MessWithFileGroupChat">
                
                <input type="hidden" id="group_id" name="group_id" />

                <input type="hidden" name="chat_group_name" value="" id="chat_group_name" class="form-control" placeholder="Enter text here..."> 
                
                <div class="form-group">
                   <input type="text" name="new_message_with_files_group" id="new_message_with_files_group" class="form-control" placeholder="Enter text here..."/> 
                </div>

             </form> 
      </div>

      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <input type="button" class="btn btn-info" id='uploadfilesGroup' value='Upload Files' >
   
      </form>
      </div>
    </div>
  </div>
</div>



<div id="contextMenu" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li><a tabindex="-1" href="#" id="delivery_time"></a>
      </li>
        <li class="divider"></li> 
      <li><a tabindex="-1" href="#" id="seen_time"></a>
      </li>
     
      <li class="divider"></li> 
      <li id="msg_delete">
      </li>
    </ul>
</div>


<div id="contextMenuGroup" class="dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li><a tabindex="-1" href="#" id="delivery_time"></a>
      </li>
      <li><a tabindex="-1" href="#" id="seen_time"></a>
      </li>
     
      <li class="divider"></li> 
      <li id="msg_delete">
      </li>
    </ul>
</div>

</div>


<script type="text/javascript">

var input_new_message='';
var input_new_group_message='';
var cht_messages='';
var grp_cht_messages='';
var appended_cht_messages='';
var chat_messages_length='';

var group_chat_messages_length='';

var chat_open_of_user='';

var chat_open_group='';

showUserListforChat();
showGroupListforChat();

  function showUserListforChat(argument) {
    
     $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/UserChat/showUserListforChat/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                    new_chat=response.new_chat;
               
                    var html='<p>User Chat History</p><ul class="list-unstyled chat-list mt-2 mb-0" style="overflow-y: auto;">';
                    var html2='';
                   
                    if(data!=null){

                    for (var i = 0; i < data.length; i++) {
                    

                      html+='<a href="javascript:;"  class="item-OpenChatWindow12" data="'+data[i].id+'" firstname="'+data[i].firstname+'"  lastname="'+data[i].lastname+'"><li class="clearfix">'+
                            
                             '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"  style="width:25px; height:25px;">'+
                                '<div class="about">'+
                                '<div class="name">'+data[i].firstname+' '+data[i].lastname+'<br><p class="offline" style="color:blue; font-size:10px;">'+data[i].designation_name+' - '+data[i].address+'</p>';
                        
                            if(data[i].count_unseenmessage_info>0){
                            
                             html+='<div id="showNewMsgDiv_'+data[i].id+'"><i class="fa fa-circle offline">'+data[i].count_unseenmessage_info+'</i></div>';
                             
                              }
                  
                                html+='</div>'+
                              '</li></a>';
                    }
      
                    }
                  
                    else{
                        html+='<p style="opacity:0.50; text-align:center;">No Chat History Found<p><br>';
                    }

                    if(new_chat!=null){

                        for(var j=0;j<new_chat.length;j++){

                             html2+='<a href="javascript:;"  class="item-OpenChatWindow12" data="'+new_chat[j].id+'" firstname="'+new_chat[j].firstname+'"  lastname="'+new_chat[j].lastname+'"><li class="clearfix">'+
                                
                                 '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"  style="width:25px; height:25px;">'+
                                    '<div class="about">'+
                                    '<div class="name">'+new_chat[j].firstname+' '+new_chat[j].lastname+'<br><p class="offline" style="color:blue; font-size:10px;">'+new_chat[j].designation_name+' - '+new_chat[j].address+'</p>';
                     
                                     html2+='</div>'+
                                  '</li></a>';
                        }

                    }
                    else{
                        html2+='<p style="opacity:0.50; text-align:center;">No Users Found<p><br>';
                    }
         
                    html+='New Chat<br>'+html2+'</ul>';


                    $('#showUserListforChat12').html(html);

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
                    new_group=response.new_group;

                    var html='<p>Group Chat History</p><ul class="list-unstyled chat-list1 mt-2 mb-0" style="overflow-y: auto;">';
                     var html2='';
                     if(data!=null){
                         for (var i = 0; i < data.length; i++) {
                    

                              html+='<a href="javascript:;"  class="item-OpenGroupChatWindow12" data="'+data[i].group_id+'"><li class="clearfix">'+
                                     '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"   style="width:25px; height:25px;">'+
                                        '<div class="about">'+
                                        '<div class="name">'+data[i].chat_group_name+'</div>';


                                          if(data[i].unseen_msgs>0){
                            
                                         html+='<div id="showGroupNewMsgDiv_'+data[i].group_id+'"><i class="fa fa-circle offline"> '+data[i].unseen_msgs+'</i></div>';
                                         
                                          }

                                         

                                        html+='</div>'+
                                      '</li></a>';
                         }
                     } 
                     else{
                        html+='<p style="opacity:0.50; text-align:center;">No Group Chat History Found<p><br>';
                     }

                     if(new_group!=null){

                         for (var i = 0; i < new_group.length; i++) {
                    

                              html2+='<a href="javascript:;"  class="item-OpenGroupChatWindow12" data="'+new_group[i].group_id+'"><li class="clearfix">'+
                                     '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"   style="width:25px; height:25px;">'+
                                        '<div class="about">'+
                                        '<div class="name">'+new_group[i].chat_group_name+'</div>';
                                         
                                        html2+='</div>'+
                                      '</li></a>';
                         }


                     }
                     else{
                        html2+='<p style="opacity:0.50; text-align:center;">No Group Found<p><br>';
                     }
                   

                    html+='New Group Chat<br>'+html2+'</ul>';
               
                   $('#showGroupListforChat12').html(html);

              },
                     error: function(response){
                     //  var data =JSON.parse(response.responseText);
                     //  toastr.error(data.message);
                        }

            });

}

$('#mainDiv').on('click', '.item-OpenChatWindow12', function(){
    // alert("id");

    var id = $(this).attr('data');
    var firstname = $(this).attr('firstname');
    var lastname = $(this).attr('lastname');
    chat_open_of_user=id;
    chat_open_group='';
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/row',
        data:{'id': id,'start':0},  
        async: false,
        dataType: 'json',
        success: function(response){
             appended_cht_messages='';
            cht_messages=response.data;
              if(cht_messages){

                if(cht_messages[cht_messages.length-1].is_seen==0){

                  sendSeenReceiptToSenderForUserChat(id);

                }

              }

            receiver_data_row=response.receiver_data_row;
            if(cht_messages){
               chat_messages_length=Number(cht_messages.length); 
            }
            
            var html="";
             
            if(response.status){

                html=showWindow12(firstname,lastname,id,cht_messages,receiver_data_row.last_online_at);

              

                $('#ShowChatPerson').html(html);
                document.getElementById("new_message").focus();
                input_new_message = document.getElementById("new_message");
                input_new_message.addEventListener("keypress", function(event) {
                  if (event.key === "Enter") {
                     btnSendUserMessageByEnter();
                  }
                });
              }

            else{

                  html=showWindow12(firstname,lastname,id,cht_messages=null,receiver_data_row.last_online_at);

                
                   $('#ShowChatPerson').html(html);
                    document.getElementById("new_message").focus();
                     input_new_message = document.getElementById("new_message");
                        input_new_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                                 btnSendUserMessageByEnter();
                          }
                        });
            }
           
           $('#showNewMsgDiv_'+id).html('');
           var objDiv = document.getElementById("chatHistoryMessage");
       
              
           if(objDiv){
             objDiv.scrollTop = objDiv.scrollHeight;
           }
          
           

        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});




$('#mainDiv').on('click', '.item-OpenGroupChatWindow12', function(){
    // alert("id");
    chat_open_of_user='';
    var id = $(this).attr('data');
    chat_open_group=id;
     $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/row',
        data:{'id': id,'start':0},  
        async: false,
        dataType: 'json',
        success: function(response){
             appended_cht_messages='';
             // sendSeenReceiptToSenderForGroupChat(id);
            var grp_cht_messages=response.data;

             if(grp_cht_messages){
               group_chat_messages_length=Number(grp_cht_messages.length); 
            }

            group_row=response.group_row;
            var html="";


              if( grp_cht_messages!=null){
                if(grp_cht_messages[grp_cht_messages.length-1].group_message_sender_id!=<?php echo $this->session->userdata('id') ?>){
                     sendSeenReceiptToSenderForGroupChat(id);
                 }
            }
            if(response.status){

               // html=showGroupChatWindow(group_row.chat_group_name,id,grp_cht_messages);
               
                html=showGroupChatWindow12(group_row.chat_group_name,id,grp_cht_messages);
               
                $('#ShowChatPerson').html(html);
                document.getElementById("new_message_group").focus();
                input_new_group_message = document.getElementById("new_message_group");
                input_new_group_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            btnSendGroupMessageByEnter();
                          }
                        });
            

            }

            else{

                 // html=showGroupChatWindow(group_row.chat_group_name,id,null);

                  html=showGroupChatWindow12(group_row.chat_group_name,id,grp_cht_messages);
                  
                  $('#ShowChatPerson').html(html);
                document.getElementById("new_message_group").focus();
               input_new_group_message = document.getElementById("new_message_group");
                input_new_group_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            btnSendGroupMessageByEnter();
                          }
                        });
            
               
            }
             $('#showGroupNewMsgDiv_'+id).html('');
             var objDiv = document.getElementById("chatHistoryMessage");
             if(objDiv){
             objDiv.scrollTop = objDiv.scrollHeight;
           }
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });


});



function showWindow12(firstname,lastname,id,messages,last_online_at) {

    var html='';
      
        html+='<div class="chat-header clearfix">'+
                    '<div class="row">'+
                       ' <div class="col-lg-6">'+

                           ' <a href="javascript:void(0);" class="showUserInfoModal" data-toggle="modal" data='+id+'>'+
                               ' <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" style="width:50px; height:50px;">'+
                           ' </a>'+

                           '<div class="chat-about">'+
                                '<p>'+firstname+' '+lastname+'</p>';
                              
                                if(last_online_at=='online'){
                                    html+=' <small class="online">Online</small>';
                                }else{
                                   html+=' <small>Last seen: '+last_online_at+'</small>';
                                }
                              
                          html+='</div>'+
                     '</div>'+
                       ' <div class="col-lg-6 hidden-sm text-right">'+
                           // ' <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-camera"></i></a>'+
                          '<a href="javascript:;" class="btn btn-primary item-file-upload-user-chat" data="'+id+'" firstname="'+firstname+'" lastname="'+lastname+'"><i class="fa fa-file"></i></a>'+
                         //   ' <a href="javascript:void(0);" class="btn btn-info"><i class="fa fa-cogs"></i></a>'+
                         // '   <a href="javascript:void(0);" class="btn btn-warning"><i class="fa fa-question"></i></a>'+
                       ' </div>'+
                  '  </div>'+
              '  </div>';
            
            if(messages){

               html+='<div class="chat-history" id="chatHistoryMessage">'+
                        '<p style="text-align:center;"><a href="javascript:;" class="load-previous-user-messages" data="'+id+'"> Load Previous Messages</a></p>'+
                    
                  '<div id="append-newly-loaded-user-messages"></div>'+
              
                  '<ul class="m-b-0" id="prev_msgs">';
           

                     for (var i = 0; i < messages.length; i++) {

                            var changed_dateFormat=dateChangeFormat(messages[i].message_time);

                          if(messages[i].sender_message_id==<?php echo $this->session->userdata('id')?>)  {
                             

                            html+= '<li class="clearfix" id="sent_msg_'+messages[i].message_id+'">'+
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+changed_dateFormat;

                                         if (messages[i].is_sent==0) {
                                             html+= ' <i class="fa fa-clock-o fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                         }
                                         else{
                                        
                                         
                                            if (messages[i].is_sent==1 && messages[i].is_delivered==1 && messages[i].is_seen==0) {
                                                html+= '<i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i><i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                            }
                                            else if(messages[i].is_seen==1 && messages[i].is_sent==1 && messages[i].is_delivered==1){
                                                html+= ' <i class="fa fa-eye fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                            }
                                            else{

                                                html+= ' <i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';

                                            }
                                         
                                         }
                                        
                                        html+= '</span>'+

                                  '  </div>';

                                  if(messages[i].message!=null){
                                    html+='<div data="'+messages[i].message_id+'" delivery_time="'+messages[i].delivery_time+'" seen_time="'+messages[i].seen_time+'"class="message other-message float-right" id="UserSentMsg" type="UserChat" >'+messages[i].message+'</div>';
                                  }


                                 if(messages[i].message_file!=null){

                                    html+='<div data="'+messages[i].message_id+'" delivery_time="'+messages[i].delivery_time+'" seen_time="'+messages[i].seen_time+'"class="message other-message float-right" id="UserSentMsg" type="UserChat" >';
                                   
                                        if(messages[i].message_file_extension=="gif" ||
                                           messages[i].message_file_extension=="jpg" || 
                                           messages[i].message_file_extension=="png")  {
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'"><img src="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'"width="50" height="50" /></a>';
                                        }
                                        else{
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'">'+messages[i].message_file+'</a>';
                                        }
                                     

                                    html+'</div>';

                                  }
                                 
                           
                              html+='</li>';
                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix" id="sent_msg_'+messages[i].message_id+'">'+
                                    '<div class="message-data">'+
                                        '<span class="message-data-time">'+changed_dateFormat;

 
                                        html+='</span>'+
                                  '  </div>';

                                    if(messages[i].message!=null){
                                         html+=' <div class="message my-message">'+messages[i].message+'</div>';    
                                    }
                                    
                                    if(messages[i].message_file!=null){
                                          html+=' <div class="message my-message">';
                                             if(messages[i].message_file_extension=="gif" ||
                                               messages[i].message_file_extension=="jpg" || 
                                               messages[i].message_file_extension=="png")  {
                                            
                                               html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'"><img src="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'" alt="Girl in a jacket" width="50" height="50" /></a>';

                                            }
                                          
                                           else{
                                                  html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+messages[i].message_file+'">'+messages[i].message_file+'</a>';
                                            }
                                          html+='</div>';    

                                    }
                                                                
                                html+='</li> ';
                            
                             }
                     
                        }
                          html+=' </ul></div>';
                        
                    }

                  else{
                    html+='<div class="chat-history" id="chatHistoryMessage"><p style="text-align:center;">No Previous Chat History. Start New Chat</p></div>';
                  }


              html+='<div class="form-group">'+
                 
                 ' <div class="row">'+
                     ' <div class="col-lg-11">'+
                          '<input type="text" name="new_message" id="new_message" class="form-control" placeholder="Enter text here...">'+  
                       
                          '<input type="hidden" name="receiver_id" value="'+id+'" id="receiver_id" class="form-control" placeholder="Enter text here...">'+  
                          
                          '<input type="hidden" name="firstname" value="'+firstname+'" id="firstname" class="form-control" placeholder="Enter text here...">'+  
                          
                          '<input type="hidden" name="lastname" value="'+lastname+'" id="lastname" class="form-control" placeholder="Enter text here...">'+  
                  
                      '</div>'+
                     ' <div class="col-lg-1">'+

                       // '<button id="btnSendMessageNew" class="btn btn-info" ><i class="fa fa-send"></i></button>';
     
                      '<a href="javascript:;" class="btn btn-primary btn-sm btnSendMessageNew">Send</a>';


                     html+='</div>'+
                '  </div>'+
                 '</div>';


  return html;
}


function showGroupChatWindow12(chat_group_name,id,messages) {


    var html='';
      
        html+='<div class="chat-header clearfix">'+
                    '<div class="row">'+
                       ' <div class="col-lg-6">'+


                           ' <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">'+
                               ' <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">'+
                           ' </a>'+

                           ' <div class="chat-about">'+
                                '<p>'+chat_group_name+'</p>'+
                              
                               // ' <small>Last seen: 2 hours ago</small>'+
                          '  </div>'+
                     '</div>'+

                     '<div class="col-lg-6 hidden-sm text-right">'+
                           // ' <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-camera"></i></a>'+
                          '<a href="javascript:void(0);" class="btn btn-primary item-file-upload-group-chat" data="'+id+'" chat_group_name="'+chat_group_name+'"><i class="fa fa-file"></i></a>'+
                         //   ' <a href="javascript:void(0);" class="btn btn-info"><i class="fa fa-cogs"></i></a>'+
                         // '   <a href="javascript:void(0);" class="btn btn-warning"><i class="fa fa-question"></i></a>'+
                     '</div>'+

                  '  </div>'+
              '  </div>';
            
            if(messages){

           
                 html+='<div class="chat-history" id="chatHistoryMessage">'+
                        '<p style="text-align:center;"><a href="javascript:;" class="load-previous-group-messages" data="'+id+'"> Load Previous Messages</a></p>'+
                    
                  '<div id="append-newly-loaded-group-messages"></div>'+
                
                  '<ul class="m-b-0" id="prev_msgs">';
                 

                     for (var i = 0; i < messages.length; i++) {

                           var changed_dateFormat=dateChangeFormat(messages[i].group_message_time);

                          if(messages[i].group_message_sender_id==<?php echo $this->session->userdata('id')?>)  {
                            
                            html+='<li class="clearfix">'+
                                   
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+messages[i].firstname+' '+messages[i].lastname+'-'+changed_dateFormat+'</span>'+
                                    '</div>';

                                 if(messages[i].group_message!=null){
                                   
                                   html+='<div id="GroupSentMsg" class="message other-message float-right" type="GroupChat" data="'+messages[i].group_messages_id+'">'+messages[i].group_message+'</div>';
                                  }

                                 if(messages[i].group_message_file!=null){

                                    html+='<div id="GroupSentMsg" class="message other-message float-right" type="GroupChat" data="'+messages[i].group_messages_id+'">';
                                   
                                        if(messages[i].group_message_extension=="gif" ||
                                           messages[i].group_message_extension=="jpg" || 
                                           messages[i].group_message_extension=="png")  {
                                          
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'"><img src="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'"width="50" height="50" /></a>';
                                        }
                                        else{
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'">'+messages[i].group_message_file+'</a>';
                                        }
                                     

                                    html+'</div>';

                                  }
                                

                               html+=' </li>';
                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix">'+
                                    '<div class="message-data">'+
                                          '<span class="message-data-time">'+messages[i].firstname+' '+messages[i].lastname+'-'+changed_dateFormat+'</span>'+
                                  '  </div>';
                                
                                  if(messages[i].group_message!=null){
                                  
                                   html+=' <div class="message my-message">'+messages[i].group_message+'</div>  ';
                                  }

                                  if(messages[i].group_message_file!=null){
                                          html+=' <div class="message my-message">';
                                             if(messages[i].group_message_extension=="gif" ||
                                               messages[i].group_message_extension=="jpg" || 
                                               messages[i].group_message_extension=="png")  {
                                            
                                               html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'"><img src="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'" width="50" height="50" /></a>';

                                            }
                                          
                                           else{
                                                  html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+messages[i].group_message_file+'">'+messages[i].group_message_file+'</a>';
                                            }

                                          html+='</div>';    

                                    }


                               html+=' </li> ';
                            
                             }

                      
                        }
                          html+=' </ul></div>';
                        
                    }


                  else{
                    html+='<div class="chat-history" id="chatHistoryMessage"><p style="text-align:center;">No Previous Chat History. Start New Chat</p></div>';
                  }


              html+='<div class="form-group">'+
                 
                 ' <div class="row">'+
                     ' <div class="col-lg-11">'+
                          '<input type="text" name="new_message_group" id="new_message_group" class="form-control" placeholder="Enter text here...">'+  
                       
                          '<input type="hidden" name="group_id" value="'+id+'" id="group_id" class="form-control">'+  
                        
                          '<input type="hidden" name="chat_group_name" value="'+chat_group_name+'" id="chat_group_name" class="form-control" >'+  
                          
                       
                  
                      '</div>'+
                     ' <div class="col-lg-1">'+

                    
                     
                       '<a href="javascript:;" class="btn btn-primary btn-sm btnGroupSendMessageNew">Send</a>'+

                     ' </div>'+
                '  </div>'+
                 '</div>';
  return html;
}


$('#mainDiv').on('click', '.btnSendMessageNew', function(){
    // $('#btnSendMessageNew12').click(function(){

       btnSendUserMessageByEnter();

});



$('#mainDiv').on('click', '.btnGroupSendMessageNew', function(){
     btnSendGroupMessageByEnter();
});



function  refreshChatNew(id,firstname,lastname) {

    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/row',
        data:{'id': id,'start':0},  
        async: false,
        dataType: 'json',
        success: function(response){
             appended_cht_messages='';
            cht_messages=response.data;
            
            chat_messages_length=Number(cht_messages.length);

            sender_data_row=response.sender_data_row;
            receiver_data_row=response.receiver_data_row;
            
            // if(cht_messages[chat_messages_length-1].sender_message_id!="<?php echo $this->session->userdata('id')?>"){
               // sendSeenReceiptToSenderForUserChat(receiver_data_row.id);
           // }
             
            var html="";
             
            if(response.status){


                html=showWindow12(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,cht_messages,receiver_data_row.last_online_at);
               
                  $('#ShowChatPerson').html(html);
                   document.getElementById("new_message").focus();
                 input_new_message = document.getElementById("new_message");
                  input_new_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            btnSendUserMessageByEnter();
                          }
                        });

            }

            else{

                  html=showWindow12(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,null,receiver_data_row.last_online_at);

                
                   $('#ShowChatPerson').html(html);
                    document.getElementById("new_message").focus();
                      input_new_message = document.getElementById("new_message");
                       input_new_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                          btnSendUserMessageByEnter();
                          }
                        });
            }
               $('#showNewMsgDiv_'+id).html('');
               var objDiv = document.getElementById("chatHistoryMessage");
              
             if(objDiv){
                     objDiv.scrollTop = objDiv.scrollHeight;
              }
           
           
        },
          error: function(response){
       
               // var data =JSON.parse(response.responseText);
               // toastr.error(data.message);
        }
    });

}


function  refreshGroupChatNew(id,grp_id) {
 
 $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/row',
        data:{'id': grp_id,'start':0},  
        async: false,
        dataType: 'json',
        success: function(response){
        appended_cht_messages='';
           var grp_cht_messages=response.data;

            appended_cht_messages='';
            group_chat_messages_length=Number(grp_cht_messages.length);

            group_row=response.group_row;
            var html="";


            if( grp_cht_messages!=null){
                if(grp_cht_messages[grp_cht_messages.length-1].group_message_sender_id!=<?php echo $this->session->userdata('id') ?>){
                     sendSeenReceiptToSenderForGroupChat(grp_id);
                 }
            }
            
            if(response.status){

                html=showGroupChatWindow12(group_row.chat_group_name,grp_id,grp_cht_messages);

               $('#ShowChatPerson').html(html);
               document.getElementById("new_message_group").focus();
                input_new_group_message = document.getElementById("new_message_group");
                input_new_group_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            btnSendGroupMessageByEnter();
                          }
                        });
             

            }

            else{

                  html=showGroupChatWindow12(group_row.chat_group_name,grp_id,null);
         
                   $('#ShowChatPerson').html(html);
                   document.getElementById("new_message_group").focus();
                input_new_group_message = document.getElementById("new_message_group");
                input_new_group_message.addEventListener("keypress", function(event) {
                        if (event.key === "Enter") {
                            btnSendGroupMessageByEnter();
                          }
                        });
               
            }
            $('#showGroupNewMsgDiv_'+grp_id).html('');
             var objDiv = document.getElementById("chatHistoryMessage");
              if(objDiv){
             objDiv.scrollTop = objDiv.scrollHeight;
           }
           
           
        },
          error: function(response){
       
               // var data =JSON.parse(response.responseText);
               // toastr.error(data.message);
        }
    });

}

function sendSeenReceiptToSenderForUserChat(sender_id) {
    // body...

    if(sender_id!=''){

        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url();?>api/UserChat/sendSeenReceiptToSenderForUserChat',
            data: {'sender_id':sender_id},
            async: false,
            dataType: 'json',
            success: function(response){

                    if (response.status) {
                        return response.status;

                    }

                    else{

                       toastr.error(response.message);
                    }
                    
                 
            },

          error: function(response){
                   // var data =JSON.parse(response.responseText);
                   // toastr.error(data.message);
            }

        });
    }
}

function sendSeenReceiptToSenderForGroupChat(group_id) {
    // body...

    if(group_id!=''){

        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url();?>api/ChatGroup_Messages/sendSeenReceiptToSenderForGroupChat',
            data: {'group_id':group_id},
            async: false,
            dataType: 'json',
            success: function(response){

                    if (response.status) {
                         return response.status;
                    }


                    else{
                       toastr.error(response.message);
                    }
                    
                 
            },

          error: function(response){
                   // var data =JSON.parse(response.responseText);
                   // toastr.error(data.message);
            }

        });
    }
}

</script>

<script>
    

$('#mainDiv').on('click', '.load-previous-user-messages', function(){

    var id = $(this).attr('data');
  
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/row',
        data:{'id': id,'start':chat_messages_length} ,  
        async: false,
        dataType: 'json',
        success: function(response){

            // if(cht_messages){
            //     cht_messages.concat(response.data);
            // }
            // else{
               cht_messages=response.data;

                if(appended_cht_messages){
                      cht_messages=cht_messages.concat(appended_cht_messages);
                }
                    appended_cht_messages=cht_messages;
            
            // }

            chat_messages_length=Number(chat_messages_length)+50;

        
            var html='<ul class="m-b-0" id="prev_msgs">';
             
            if(response.status){

                for (var i = 0; i < cht_messages.length; i++) {

                    var changed_dateFormat=dateChangeFormat(cht_messages[i].message_time);

                    if(cht_messages[i].sender_message_id==<?php echo $this->session->userdata('id')?>)  {
                            
                            html+= '<li class="clearfix" id="sent_msg_'+cht_messages[i].message_id+'">'+
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+changed_dateFormat+'</span>';

                                         if (cht_messages[i].is_sent==0) {
                                             html+= ' <i class="fa fa-clock-o fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                         }
                                         else{
                                        
                                         
                                            if (cht_messages[i].is_sent==1 && cht_messages[i].is_delivered==1 && cht_messages[i].is_seen==0) {
                                                html+= '<i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i><i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                            }
                                            else if(cht_messages[i].is_seen==1 && cht_messages[i].is_sent==1 && cht_messages[i].is_delivered==1){
                                                html+= ' <i class="fa fa-eye fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';
                                            }
                                            else{

                                                html+= ' <i class="fa fa-check fa-2xs" aria-hidden="true" style="opacity: 0.25;"></i>';

                                            }
                                         
                                         }
                                        
                                        html+= '</span>'+

                                  '  </div>';

                                  
                             if(cht_messages[i].message!=null){

                                    html+='<div data="'+cht_messages[i].message_id+'" delivery_time="'+cht_messages[i].delivery_time+'" seen_time="'+cht_messages[i].seen_time+'"class="message other-message float-right" id="UserSentMsg" type="UserChat" >'+cht_messages[i].message+'</div>';
                                  }


                                 if(cht_messages[i].message_file!=null){

                                    html+='<div data="'+cht_messages[i].message_id+'" delivery_time="'+cht_messages[i].delivery_time+'" seen_time="'+cht_messages[i].seen_time+'"class="message other-message float-right" id="UserSentMsg" type="UserChat" >';
                                   
                                        if(cht_messages[i].message_file_extension=="gif" ||
                                           cht_messages[i].message_file_extension=="jpg" || 
                                           cht_messages[i].message_file_extension=="png")  {
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'"><img src="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'"width="50" height="50" /></a>';
                                        }
                                        else{
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'">'+cht_messages[i].message_file+'</a>'
                                        }
                                     

                                    html+='</div>';

                                  }

                           
                               html+= ' </li>';
                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix" id="sent_msg_'+cht_messages[i].message_id+'">'+
                                    '<div class="message-data">'+
                                        '<span class="message-data-time">'+changed_dateFormat+'</span>';

                                        html+='</span>'+
                                  '  </div>';

                                  
                                    if(cht_messages[i].message!=null){
                                         html+=' <div class="message my-message">'+cht_messages[i].message+'</div>';    
                                    }
                                    
                                    if(cht_messages[i].message_file!=null){
                                          html+=' <div class="message my-message">';
                                             if(cht_messages[i].message_file_extension=="gif" ||
                                               cht_messages[i].message_file_extension=="jpg" || 
                                               cht_messages[i].message_file_extension=="png")  {
                                            
                                               html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'"><img src="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'" alt="Girl in a jacket" width="50" height="50" /></a>';

                                            }
                                          
                                           else{
                                                  html+='<a target="_BLANK" href="<?php echo base_url("uploads/user_chat_files/");?>'+cht_messages[i].message_file+'">'+cht_messages[i].message_file+'</a>'
                                            }
                                          html+='</div>';    

                                    }


                               html+= ' </li> ';
                            
                             }
                     
                        }
                        html+='</ul>';


                     $('#append-newly-loaded-user-messages').html(html);
                    
                 
            }
   
        },
          error: function(response){       
               // var data =JSON.parse(response.responseText);
               // toastr.error(data.message);
        }
    });


});




$('#mainDiv').on('click', '.load-previous-group-messages', function(){

   var id = $(this).attr('data');
   $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/row',
        data:{'id': id,'start':group_chat_messages_length},  
        async: false,
        dataType: 'json',
        success: function(response){
            
           // sendSeenReceiptToSenderForGroupChat(id);
            
            grp_cht_messages=response.data;

                if(appended_cht_messages){
                      grp_cht_messages=grp_cht_messages.concat(appended_cht_messages);
                }
            appended_cht_messages=grp_cht_messages;

           group_chat_messages_length=Number(group_chat_messages_length)+50;

             var html='<ul class="m-b-0" id="prev_msgs">';

       
            if(response.status){


                     for (var i = 0; i < grp_cht_messages.length; i++) {

             convertedDate=dateChangeFormat(grp_cht_messages[i].group_message_time);
            

             if(grp_cht_messages[i].group_message_sender_id==<?php echo $this->session->userdata('id')?>)  {
                           
                            html+= '<li class="clearfix">'+
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+grp_cht_messages[i].firstname+' '+grp_cht_messages[i].lastname+'-'+convertedDate+'</span>'+

                                      
                                     
                                  '</div>';

                                if(grp_cht_messages[i].group_message!=null){
                                   
                                   html+='<div id="GroupSentMsg" class="message other-message float-right" type="GroupChat" data="'+grp_cht_messages[i].group_messages_id+'">'+grp_cht_messages[i].group_message+'</div>';
                                  }

                                 if(grp_cht_messages[i].group_message_file!=null){

                                    html+='<div id="GroupSentMsg" class="message other-message float-right" type="GroupChat" data="'+grp_cht_messages[i].group_messages_id+'">';
                                   
                                        if(grp_cht_messages[i].group_message_extension=="gif" ||
                                           grp_cht_messages[i].group_message_extension=="jpg" || 
                                           grp_cht_messages[i].group_message_extension=="png")  {
                                          
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'"><img src="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'"width="50" height="50" /></a>';
                                        }
                                        else{
                                            html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'">'+grp_cht_messages[i].group_message_file+'</a>';
                                        }
                                     

                                    html+'</div>';

                                  }

                              html+=  '</li>';

                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix">'+
                                    '<div class="message-data">'+
                                        '<span class="message-data-time">'+grp_cht_messages[i].firstname+' '+grp_cht_messages[i].lastname+'-'+convertedDate+'</span>'+
                                  '  </div>';


                                  if(grp_cht_messages[i].group_message!=null){
                                  
                                   html+=' <div class="message my-message">'+grp_cht_messages[i].group_message+'</div>  ';
                                  }

                                  if(grp_cht_messages[i].group_message_file!=null){
                                          html+=' <div class="message my-message">';
                                             if(grp_cht_messages[i].group_message_extension=="gif" ||
                                               grp_cht_messages[i].group_message_extension=="jpg" || 
                                               grp_cht_messages[i].group_message_extension=="png")  {
                                            
                                               html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'"><img src="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'" width="50" height="50" /></a>';

                                            }
                                          
                                           else{
                                                  html+='<a target="_BLANK" href="<?php echo base_url("uploads/group_chat_files/");?>'+grp_cht_messages[i].group_message_file+'">'+grp_cht_messages[i].group_message_file+'</a>';
                                            }

                                          html+='</div>';    

                                    }


                             html+=   ' </li> ';
                            
                             }

                        }

                   html+='</ul>';
                     $('#append-newly-loaded-group-messages').html(html);

            }

           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });


});


$('#mainDiv').on('click', '.showUserInfoModal', function(){

   var id = $(this).attr('data');


       $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/User/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
            var html='';
            if(response.status){
            data=response.data;
                html+='<table class="table table-striped">'+
                '<thead>'+
                  '<tr>'+
                    '<th>Firstname</th>'+
                    '<td>'+data.firstname+'</td>'+
                  ' </tr>'+
                    '<tr>'+
                    '<th>Lastname</th>'+
                    '<td>'+data.lastname+'</td>'+
                  ' </tr>'+
                  '<tr>'+
                    '<th>Email</th>'+
                    '<td>'+data.email+'</td>'+
                  ' </tr>'+

                  '<tr>'+
                    '<th>Gender</th>';
                    if(data.gender==1){
                        var gender='Male';
                    }else{
                         var gender='Female';
                    }
                    html+= '<td>'+gender+'</td>'+
                  ' </tr>'+
                ' </thead>'+
             

              '</table>';
      
             $('#modal-body').html(html);

            }
  


        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

   $('#UserInfoModal').modal('show');


});


function dateChangeFormat(date_time) {
    // body...

  var delivery_message_time=new Date(date_time);
              var delivery_to_date=new Date();

              var del_date_seperated=delivery_message_time.toLocaleDateString('en-GB');
             
              if(delivery_to_date.toLocaleDateString('en-GB')==del_date_seperated){
                var del_today='Today, ';
              }
              else{
                var del_today=del_date_seperated+', ' ;
              }

              var del_hours = delivery_message_time.getHours();
              var del_min = delivery_message_time.getMinutes();
              var del_ampm = del_hours >= 12 ? 'pm' : 'am';
              del_hours = del_hours % 12;
              del_hours = del_hours ? del_hours : 12; // the hour '0' should be '12'
              del_min = del_min < 10 ? '0'+del_min : del_min;
              var delStrTime = del_hours + ':' + del_min + ' ' + del_ampm;

              return del_today+delStrTime;

}


    $("#UserSearch").keyup(function() {
         var filter = $(this).val();
         count = 0;
         $('#showUserListforChat12 ul a').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

        $('#showGroupListforChat12 ul a').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });


    });


$('#mainDiv').on('click', '.item-file-upload-user-chat', function(){
    
    $('#MessWithFile')[0].reset();
   
    var id = $(this).attr('data');
    var firstname = $(this).attr('firstname');
    var lastname = $(this).attr('lastname');
  
    $('#multifileuploadModal').modal('show');
    $('input[name=receiver_id]').val(id);
    $('input[name=firstname]').val(firstname);
    $('input[name=lastname]').val(lastname);

});

$('#mainDiv').on('click', '.item-file-upload-group-chat', function(){
    
    $('#MessWithFileGroupChat')[0].reset();

    var id = $(this).attr('data');
    var chat_group_name = $(this).attr('chat_group_name');
    
    $('#multifileuploadModalGroup').modal('show');
    $('input[name=group_id]').val(id);
    $('input[name=chat_group_name]').val(chat_group_name);
 
});

</script>


<script type="text/javascript">
    
   Dropzone.autoDiscover = false;
   var myDropzone = new Dropzone(".dropzone", { 

   autoProcessQueue: false,
   parallelUploads: 30,
   
   init: function () {

           this.on('success', function(file,resp){

            var receiver_id=$('input[name=receiver_id]').val();
            var typed_message=$('input[name=new_message_with_files]').val();
            var firstnameSend=$('input[name=firstname]').val();
            var lastnameSend=$('input[name=lastname]').val();

           
            var message_row=resp.data;
            var is_receiver_online=resp.is_receiver_online;

            var typeData = {broadType : Broadcast.POST, chatType:"OneToOneChat",data : message_row, receiver_id:receiver_id,firstnameSend:firstnameSend,lastnameSend:lastnameSend,cht_messages:'',sender_first_name:message_row.sender_first_name,sender_last_name:message_row.sender_last_name,is_receiver_online:is_receiver_online};

            conn.sendMsg(typeData); 
        });

        
    this.on("complete", function (file) {

      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

             myDropzone.removeAllFiles( true );

            var receiver_id=$('input[name=receiver_id]').val();
            var typed_message=$('input[name=new_message_with_files]').val();
            var firstnameSend=$('input[name=firstname]').val();
            var lastnameSend=$('input[name=lastname]').val();

            var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
            $.ajax({

                type: 'ajax',
                method:'post',
                url: '<?php echo base_url();?>api/UserChat/sendUserMessage',
                data: {'typed_message':typed_message,'receiver_id':receiver_id},
                async: false,
                dataType: 'json',
                success: function(response){

                        if (response.status) {


                          // $('#MessWithFile')[0].reset();
                           $('#multifileuploadModal').modal('hide');
                           var message_row=response.data;
                           var sender_id_n=response.sender_id_n;
                           var is_receiver_online=response.is_receiver_online;
                           
                           var typeData = {broadType : Broadcast.POST, chatType:"OneToOneChat",data : message_row, receiver_id:receiver_id,firstnameSend:firstnameSend,lastnameSend:lastnameSend,cht_messages:'',sender_first_name:message_row.sender_first_name,sender_last_name:message_row.sender_last_name,is_receiver_online:is_receiver_online};

                           conn.sendMsg(typeData);
                         

                        }
                        else{
                           toastr.error(response.message);
                        }
                        
                     
                },

              error: function(response){
                       // var data =JSON.parse(response.responseText);
                       // toastr.error(data.message);
                }

            });

      }

    //  $('#MessWithFile')[0].reset();
    });
  }

});

$('#uploadfiles').click(function(){
      
   myDropzone.processQueue();
});


   var myDropzone1 = new Dropzone("#MessWithFileGroupChat", { 

   autoProcessQueue: false,
   parallelUploads: 30,
   
   init: function () {

        this.on('success', function(file,resp){

            var group_id=$('input[name=group_id]').val();
            var new_message_with_files_group=$('input[name=new_message_with_files_group]').val();
            var chat_group_name=$('input[name=chat_group_name]').val();
         
            var message_row=resp.data;
            
            var typeData = {broadType : Broadcast.POST, chatType:"GroupChat", data : message_row, grp_id:group_id,chat_group_name:chat_group_name};

            conn.sendMsg(typeData);
        });

        
    this.on("complete", function (file) {

      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
           
            myDropzone1.removeAllFiles( true );
          
            var group_id=$('input[name=group_id]').val();
            var new_message_with_files_group=$('input[name=new_message_with_files_group]').val();
            var chat_group_name=$('input[name=chat_group_name]').val();
             var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
           $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url();?>api/ChatGroup_Messages/sendGroupMessage',
            data: {'typed_grp_message':new_message_with_files_group,'grp_id':group_id},
            async: false,
            dataType: 'json',
            success: function(response){

                    if (response.status) {
                       var message_row=response.data;
                        $('#multifileuploadModalGroup').modal('hide');
                       //var grp_members=response.grp_members;

                       var typeData = {broadType : Broadcast.POST, chatType:"GroupChat", data : message_row, grp_id:group_id,chat_group_name:chat_group_name};

                         conn.sendMsg(typeData);
                   

                    }
                    else{
                       toastr.error(response.message);
                    }
                    
                 
            },

          error: function(response){
                   // var data =JSON.parse(response.responseText);
                   // toastr.error(data.message);
            }

         });


      }

    });
  }

});

$('#uploadfilesGroup').click(function(){
     myDropzone1.processQueue();
});

</script>

<script type="text/javascript">

var loginche="<?php echo $this->session->userdata('LoginAfterLogout')?>";
if (loginche) {
  checkForNewUserMessages();
  checkForNewGroupMessages();
}
  function checkForNewUserMessages(){
         $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/UserChat/checkForNewUserMessages',
        async: false,
        dataType: 'json',
        success: function(response){
        
            var html="";
             
            if(response.status){

               toastr.info('You have new One To One Messages. Please Check it.');


            }

            else{
    
            }
           
        },
          error: function(response){
       
               // var data =JSON.parse(response.responseText);
               // toastr.error(data.message);
        }
    });

  }


  function checkForNewGroupMessages(){
         $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/ChatGroup_Messages/checkForNewGroupMessages',
        async: false,
        dataType: 'json',
        success: function(response){
        
            var html="";
             
            if(response.status){

               toastr.info('You have new Group Messages. Please Check it.');
            }

            else{
    
            }
           
        },
          error: function(response){
       
               // var data =JSON.parse(response.responseText);
               // toastr.error(data.message);
        }
    });

  }


  function btnSendUserMessageByEnter(argument) {
         // $('#btnSendMessageNew12').click(function(){

    var typed_message = $('input[name=new_message]').val();
    var receiver_id = $('input[name=receiver_id]').val();
    var firstnameSend = $('input[name=firstname]').val();
    var lastnameSend = $('input[name=lastname]').val();
   
    if(typed_message==''){
        toastr.error("Please Enter message and then send");
    }  

    else if (receiver_id=='') {
            toastr.error("Please try again");
    }

    else{
         var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
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
                       var is_receiver_online=response.is_receiver_online;
                       
                       var typeData = {broadType : Broadcast.POST, chatType:"OneToOneChat",data : message_row, receiver_id:receiver_id,firstnameSend:firstnameSend,lastnameSend:lastnameSend,cht_messages:cht_messages,sender_first_name:message_row.sender_first_name,sender_last_name:message_row.sender_last_name,is_receiver_online:is_receiver_online};

                       conn.sendMsg(typeData);
                     

                    }
                    else{
                       toastr.error(response.message);
                    }
                    
                 
            },

          error: function(response){
                   // var data =JSON.parse(response.responseText);
                   // toastr.error(data.message);
            }

        });

    }

  }

  function btnSendGroupMessageByEnter(argument) {

       var typed_grp_message = $('input[name=new_message_group]').val();
        var grp_id = $('input[name=group_id]').val();
        var chat_group_name = $('input[name=chat_group_name]').val();

        if(typed_grp_message==''){
            toastr.error("Please Enter message and then send");
        }  

        else if (grp_id=='') {
                toastr.error("Please try again");
        }

        else{
            var conn = new Connection2(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);

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

                           var typeData = {broadType : Broadcast.POST, chatType:"GroupChat", data : message_row, grp_id:grp_id,chat_group_name:chat_group_name};

                             conn.sendMsg(typeData);
                       
                         

                        }
                        else{
                           toastr.error(response.message);
                        }
                        
                     
                },

              error: function(response){
                       // var data =JSON.parse(response.responseText);
                       // toastr.error(data.message);
                }

            });

        }

  }

</script>