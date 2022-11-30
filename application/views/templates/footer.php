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
