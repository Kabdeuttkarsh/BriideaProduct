

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Chat Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Groups</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if(in_array('createGroup', $user_permission)): ?>
             <button type="button" id="addChatGroup" class="btn btn-success item-addChatGroup" data-toggle="modal" data-target="#exampleModalCenter"> Add Chat Group</button>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Chat Groups</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="chatGroupTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Group Name</th>
                  <th>Group Description</th>
                  <th>Company Name</th>
                  <th>Admin</th>
                  

                  <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody id="ChatGroupData">
                  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
 


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">Add Chat Group
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="myformChatGroup" action="">
          <input type="hidden" name="id">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Group Name</label>
              <input type="text" id="chat_group_name" name="chat_group_name" class="form-control" placeholder="Group Name">
            
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect2">Group Description</label>
              <textarea  id="group_description" name="group_description" class="form-control" placeholder="Group Description"></textarea>
            
            </div>

            <div class="form-group">
                  <label for="exampleFormControlSelect2">Group Members</label>
                  
                  
              <div id="showListGroupMembers"></div>
               
                </div>


          </form>
      </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>


  <script type="text/javascript">
    $(document).ready(function() {
    
      $("#groupMainNav").addClass('active');
    
      $('#addChatGroup').click(function(){
          $('#myformChatGroup')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add Chat Group');
          $('#myformChatGroup').attr('action','<?php echo base_url(); ?>api/ChatGroup/insert');
 

     $.ajax({

                type: 'ajax',
                url: "<?php echo base_url() ?>api/User/showUserListforChat/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                   var html='<select class="form-control select_group" style="width:100%;" id="group_members" name="group_members[]" multiple="multiple">';
                    for (var i = 0; i < data.length; i++) {
                      html+='<option value="'+data[i].id+'">'+data[i].firstname+' '+data[i].lastname+'</option>';
                    }
                html+='</select>';
                    $('#showListGroupMembers').html(html);
                },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }
             
            });
         $(".select_group").select2();
      });
    
      

          $('#btnSave').click(function(){
             var url = $('#myformChatGroup').attr('action');
             var data = $('#myformChatGroup').serialize();
             var chat_group_name = $('input[name=chat_group_name]');
             var group_description = $('textarea[name=group_description]');
             var group_members = $('#group_members').val();
              // var result = '';

              // alert(group_members[0]);
        
          if (chat_group_name.val()=='') {
             toastr.error("Please Enter Group Name");
          }
          else if(group_description.val()==''){
              toastr.error("Please Enter Group Description");
          }
           else if(group_members.length==0){
               toastr.error("Please Select atlease one Group Member");
          }
          else{
              $.ajax({
                  type: 'ajax',
                  method:'post',
                  url: url,
                  data: data,
                  async: false,
                  dataType: 'json',
                  success: function(response){

                         $('#myformChatGroup')[0].reset();
                         $('#exampleModalCenter').modal('hide');

                          if (response.status) {
                           toastr.success(response.message);
                          }
                          else{
                             toastr.error(response.message);
                          }
                          
                          showChatGroupData();
                  },

                error: function(response){
                         var data =JSON.parse(response.responseText);
                         toastr.error(data.message);
                  }

              });
              }
          });
         
    });


  </script>


<script type="text/javascript">
  
  showChatGroupData();

  var user_permission = <?php echo json_encode($user_permission); ?>;
 // alert(user_permission);

  function showChatGroupData() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/ChatGroup/showCompanyAllChatGroup",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                    var html="";
                    var tbt="";
                    var i ="";

                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;
                  
                      html+='<tr><td>'+x+'</td>'+
                                '<td>'+data[i].chat_group_name+'</td>'+
                                '<td>'+data[i].group_description+'</td>'+
                                '<td>'+data[i].company_name+'</td>'+
                                '<td>'+data[i].firstname+' '+data[i].lastname+'</td>';
                  
                      html+='<td>';
                      <?php if(in_array('updateGroup', $user_permission)){ ?>

                     //  if(jQuery.inArray("updateGroup", user_permission) ) {
                        // if($.inArray("deleteGroup", user_permission) !== -1 ) {
                        
                         html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';
                      
                  //    }

                    <?php  } ?>

                     <?php if(in_array('deleteGroup', $user_permission)){ ?>
                    
                      // if(jQuery.inArray("deleteGroup", user_permission) ) {
                          //   if($.inArray("deleteGroup", user_permission) !== -1 ) {
                                
                         html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><i class="fa fa-trash"></i></a>';
                            
                     //  }

                     
                    <?php  } ?>

                       html+='</td></tr>';

                    }
                 
                   $('#ChatGroupData').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

  }


</script>