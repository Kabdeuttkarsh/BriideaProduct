<style type="text/css">
	body{
    background-color: #f4f7f6;
    /*margin-top:20px;*/
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
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
	min-height: 500px;
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
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
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
</style>

<div class="content-wrapper" id="mainDiv">
  	
<!--   	<section class="content">
 -->  		
  	<!-- 	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->

<!-- <div class="container"> -->
 
<!-- <div class="row clearfix"> -->
    <!-- <div class="col-lg-12"> -->
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="form-group">
                  <!--   <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div> -->
                    <input type="text" class="form-control" placeholder="Search...">
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

</div>
<script type="text/javascript">
var cht_messages='';

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
               
                    var html='<p>User Chat List</p><ul class="list-unstyled chat-list mt-2 mb-0" style="overflow-y: auto;">';
                  
                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;

                      html+='<a href="javascript:;"  class="item-OpenChatWindow12" data="'+data[i].id+'" firstname="'+data[i].firstname+'"  lastname="'+data[i].lastname+'"><li class="clearfix">'+
                      		 '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"  style="width:25px; height:25px;">'+
                      			'<div class="about">'+
                      			'<div class="name"> '+data[i].firstname+' '+data[i].lastname+'</div>'+
                      				// '<div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>'+
                      			'</div>'+
                      		  '</li></a>';
                    }

                    html+='</ul>';

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
               

                    var html='<p>Group Chat List</p><ul class="list-unstyled chat-list1 mt-2 mb-0" style="overflow-y: auto;">';
                  
                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;

                      html+='<a href="javascript:;"  class="item-OpenGroupChatWindow12" data="'+data[i].group_id+'"><li class="clearfix">'+
                             '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar"   style="width:25px; height:25px;">'+
                                '<div class="about">'+
                                '<div class="name">'+data[i].chat_group_name+'</div>'+
                                    // '<div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>'+
                                '</div>'+
                              '</li></a>';
                    }

                    html+='</ul>';
               
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

                html=showWindow12(firstname,lastname,id,cht_messages);
               

                $('#ShowChatPerson').html(html);
            
            }

            else{

                  html=showWindow12(firstname,lastname,id,cht_messages=null);

                
                   $('#ShowChatPerson').html(html);
                
        
               
            }
          
           var objDiv = document.getElementById("chatHistoryMessage");
           objDiv.scrollTop = objDiv.scrollHeight;
           

        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});


$('#mainDiv').on('click', '.item-OpenGroupChatWindow12', function(){
    // alert("id");
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

               // html=showGroupChatWindow(group_row.chat_group_name,id,grp_cht_messages);
               
                html=showGroupChatWindow12(group_row.chat_group_name,id,grp_cht_messages);
               
                $('#ShowChatPerson').html(html);
            

            }

            else{

                 // html=showGroupChatWindow(group_row.chat_group_name,id,null);

                  html=showGroupChatWindow12(group_row.chat_group_name,id,grp_cht_messages);
                  
                  $('#ShowChatPerson').html(html);
            
               
            }

             var objDiv = document.getElementById("chatHistoryMessage");
             objDiv.scrollTop = objDiv.scrollHeight;
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });


});



function showWindow12(firstname,lastname,id,messages) {


    var html='';
      
        html+='<div class="chat-header clearfix">'+
                    '<div class="row">'+
                       ' <div class="col-lg-6">'+

                            
                                ' <a href="javascript:void(0);" class="btn btn-dark btn-backToChat" style="float: left; margin-right: 5px;" >'+
                                   ' <i class="fa fa-arrow-left" aria-hidden="true"></i>'+
                                ' </a>'+
                            

                           ' <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">'+
                               ' <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar" style="width:50px; height:50px;">'+
                           ' </a>'+

                           ' <div class="chat-about">'+
                                '<p>'+firstname+' '+lastname+'</p>'+
                              
                               ' <small>Last seen: 2 hours ago</small>'+
                          '  </div>'+
                     '</div>'+
                       ' <div class="col-lg-6 hidden-sm text-right">'+
                           ' <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-camera"></i></a>'+
                          '  <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-image"></i></a>'+
                           ' <a href="javascript:void(0);" class="btn btn-info"><i class="fa fa-cogs"></i></a>'+
                         '   <a href="javascript:void(0);" class="btn btn-warning"><i class="fa fa-question"></i></a>'+
                       ' </div>'+
                  '  </div>'+
              '  </div>';
            
            if(messages){

               html+='<div class="chat-history" id="chatHistoryMessage">'+
                
                  '<ul class="m-b-0">';
                 

                     for (var i = 0; i < messages.length; i++) {
                          
                          if(messages[i].sender_message_id==<?php echo $this->session->userdata('id')?>)  {
                            
                            
                            html+= '<li class="clearfix">'+
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+messages[i].message_time+', Today</span>'+
                                     
                                  '  </div>'+
                                  '  <div class="message other-message float-right">'+messages[i].message+'</div>'+
                               ' </li>';
                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix">'+
                                    '<div class="message-data">'+
                                        '<span class="message-data-time">'+messages[i].message_time+'</span>'+
                                  '  </div>'+
                                   ' <div class="message my-message">'+messages[i].message+'</div>  '+                                  
                               ' </li> ';
                            
                             }

                      
                        }
                          html+=' </ul></div>';
                        
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

                       // ' <button type="button" id="btnSendMessageNew12" class="btn btn-info" ><i class="fa fa-send"></i></button>'+
                     
                       '<a href="javascript:;" class="btn btn-primary btn-sm btnSendMessageNew">Send</a>'+

                     ' </div>'+
                '  </div>'+
                 '</div>';
  return html;
}



function showGroupChatWindow12(chat_group_name,id,messages) {


    var html='';
      
        html+='<div class="chat-header clearfix">'+
                    '<div class="row">'+
                       ' <div class="col-lg-6">'+

                            
                                ' <a href="javascript:void(0);" class="btn btn-dark btn-backToChat" style="float: left; margin-right: 5px;" >'+
                                   ' <i class="fa fa-arrow-left" aria-hidden="true"></i>'+
                                ' </a>'+
                            

                           ' <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">'+
                               ' <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">'+
                           ' </a>'+

                           ' <div class="chat-about">'+
                                '<p>'+chat_group_name+'</p>'+
                              
                               ' <small>Last seen: 2 hours ago</small>'+
                          '  </div>'+
                     '</div>'+
                       ' <div class="col-lg-6 hidden-sm text-right">'+
                           ' <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-camera"></i></a>'+
                          '  <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-image"></i></a>'+
                           ' <a href="javascript:void(0);" class="btn btn-info"><i class="fa fa-cogs"></i></a>'+
                         '   <a href="javascript:void(0);" class="btn btn-warning"><i class="fa fa-question"></i></a>'+
                       ' </div>'+
                  '  </div>'+
              '  </div>';
            
            if(messages){

               html+='<div class="chat-history" id="chatHistoryMessage">'+
                
                  '<ul class="m-b-0">';
                 

                     for (var i = 0; i < messages.length; i++) {
                          
                          if(messages[i].group_message_sender_id==<?php echo $this->session->userdata('id')?>)  {
                            
                            
                            html+= '<li class="clearfix">'+
                                    '<div class="message-data text-right">'+
                                        '<span class="message-data-time">'+messages[i].firstname+' '+messages[i].lastname+'-'+messages[i].group_message_time+', Today</span>'+
                                     
                                  '  </div>'+
                                  '  <div class="message other-message float-right">'+messages[i].group_message+'</div>'+
                               ' </li>';
                            
                            }
                    
                            else{
                            
                              html+=' <li class="clearfix">'+
                                    '<div class="message-data">'+
                                        '<span class="message-data-time">'+messages[i].firstname+' '+messages[i].lastname+'-'+messages[i].group_message_time+', Today</span>'+
                                  '  </div>'+
                                   ' <div class="message my-message">'+messages[i].group_message+'</div>  '+                                  
                               ' </li> ';
                            
                             }

                      
                        }
                          html+=' </ul></div>';
                        
                    }


              html+='<div class="form-group">'+
                 
                 ' <div class="row">'+
                     ' <div class="col-lg-11">'+
                          '<input type="text" name="new_message_group" id="new_message_group" class="form-control" placeholder="Enter text here...">'+  
                       
                          '<input type="hidden" name="group_id" value="'+id+'" id="group_id" class="form-control" placeholder="Enter text here...">'+  
                          
                       
                  
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



$('#mainDiv').on('click', '.btnGroupSendMessageNew', function(){
    var typed_grp_message = $('input[name=new_message_group]').val();
    var grp_id = $('input[name=group_id]').val();

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



function  refreshChatNew(id,firstname,lastname) {
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



                html=showWindow12(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,cht_messages);
               
                  $('#ShowChatPerson').html(html);
              
            }

            else{
                  html=showWindow(receiver_data_row.firstname,receiver_data_row.lastname,receiver_data_row.id,null);

                
                   $('#ShowChatPerson').html(html);
            }

               var objDiv = document.getElementById("chatHistoryMessage");
               objDiv.scrollTop = objDiv.scrollHeight;
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

}


function  refreshGroupChatNew(id,grp_id) {
 
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

                html=showGroupChatWindow12(group_row.chat_group_name,grp_id,grp_cht_messages);

               $('#ShowChatPerson').html(html);
              

            

            }

            else{

                  html=showGroupChatWindow12(group_row.chat_group_name,grp_id,null);

                
                   $('#ShowChatPerson').html(html);
                
             
               
            }

             var objDiv = document.getElementById("chatHistoryMessage");
               objDiv.scrollTop = objDiv.scrollHeight;
           
           
        },
          error: function(response){
       
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

}



</script>
