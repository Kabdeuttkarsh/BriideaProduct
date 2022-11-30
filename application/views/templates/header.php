<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $page_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ?>">
 
  <!-- jvectormap -->
<!--   <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ?>"> -->

  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <!-- Daterange picker -->  
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fileinput/fileinput.min.css') ?>">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="<?php echo base_url('assets/dist/css/toastr.css'); ?>" rel="stylesheet">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
  <!-- jvectormap -->

  
<!--   <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script> -->

  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('assets/bower_components/Chart.js/Chart.js') ?>"></script>
  <!-- AdminLTE App -->  
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>



  <!-- DataTables -->
<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('assets/dist/js/toastr.min.js') ?>"></script>



<script type="text/javascript">
      var BASE_URL = "<?php echo base_url(); ?>";
      var Broadcast = {
            
              POST : "<?php echo POST; ?>",
              BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
              BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
              };



    
    </script>
  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/app/Connection2.js"></script> -->

<style type="text/css">
  
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:100px;
    margin-bottom: 50px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}

.msg_container_base  >.scrollbar{
    display: none;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
   
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;

}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
</style>

</head>

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
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper" id="main_div_for_ref">

  