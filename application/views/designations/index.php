

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Designations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">designations</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php 
             if(in_array('createDesignation', $user_permission)):

             ?>
           <!--  <a href="javascript:;" class="btn btn-success item-addDesignation">Add Designation</a> -->

             <button type="button" id="addDesignation" class="btn btn-success item-addDesignation" data-toggle="modal" data-target="#exampleModalCenter"> Add Designation</button>

            <br/> <br/>
          <?php 
         endif; 
        ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Designations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="groupTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Designation Name</th>
                  <?php if(in_array('updateDesignation', $user_permission) || in_array('deleteDesignation', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody id="DesignationData"> 
                 
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
      <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">Add Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="myformDesignation" action="">
          <input type="hidden" name="id">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Designation Name</label>
              <input type="text" id="designation_name" name="designation_name" class="form-control" placeholder="Designation Name">
            
            </div>

               <div class="form-group">
                  <label for="permission">Table Permissions</label>

                   
                  <table class="table table-responsive table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"class="type_checkbox"></td>
                      </tr>
                      
                      <tr>
                        <td>Designations</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDesignation"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDesignation"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDesignation"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDesignation"class="type_checkbox"></td>
                      </tr>


                      <tr>
                        <td>Company</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCompany"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCompany"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCompany"class="type_checkbox"></td>
                      </tr>

                      <tr>
                        <td>Group</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"class="type_checkbox"></td>
                      </tr>

                     

                      <tr>
                        <td>Report</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReport" class="type_checkbox"></td>
                        <td> - </td>
                      </tr>
                    
                    </tbody>
                  </table>
                 
                  <label for="permission">Chat Permissions</label>
                  
                  <table class="table table-responsive table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Send</th>
                        <th>Edit</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                       <tr>
                        <td>One to One</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createOnetoOneChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateOnetoOneChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewOnetoOneChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteOnetoOneChat"class="type_checkbox"></td>
                      </tr>

                      <tr>
                        <td>Group</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroupChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroupChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroupChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroupChat"class="type_checkbox"></td>
                      </tr>

                      <tr>
                        <td>BroadCast</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBroadCastChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBroadCastChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBroadCastChat"class="type_checkbox"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBroadCastChat"class="type_checkbox"></td>
                      </tr>

                    </tbody>
                  </table>
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

<div class="modal fade" id="myModal_for_delete_message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
                Are sure to delete this designation.
             </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-outline-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="btdelete">Delete</button>
            </div>
        </div>
    </div>
</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      
      $('#DesignationMainNav').addClass('active');
      $('#manageDesignationSubMenu').addClass('active');
    });

          $('#addDesignation').click(function(){
          $('#myformDesignation')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add Designation');
          $('#myformDesignation').attr('action','<?php echo base_url(); ?>api/Designation/insert');
      });

  </script>


<script type="text/javascript">
  showDesignationData();

var user_permission = <?php echo json_encode($user_permission); ?>;


  function showDesignationData() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Designation/",
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
                  
                      html+='<tr><td>'+x+'</td><td>'+data[i].designation_name+'</td>';
             
                      html+='<td>';
                      
                      if(jQuery.inArray("updateDesignation", user_permission) ) {

                        
                         html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';
                      
                      }
                    
                       if(jQuery.inArray("deleteDesignation", user_permission) ) {

                         html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><i class="fa fa-trash"></i></a>';
                            
                       }

                       html+='</td></tr>';

                    }
                 
                   $('#DesignationData').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

  }

    //edit
$('#DesignationData').on('click', '.item-edit', function(){
    var id = $(this).attr('data');
    $('#exampleModalCenter').modal('show');
     $('#btnSave').html('Update');
    $('#exampleModalCenter').find('.modal-title').text('Edit Designation Details');
    $('#myformDesignation').attr('action','<?php echo base_url(); ?>api/Designation/update')
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Designation/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
           data=response.data;
           permissions=response.permissions; 
          //permissions=data.permissions;
            $('input[name=designation_name]').val(data.designation_name);
            $('input[name=id]').val(data.id);
              
              $("input[value='createUser']").prop('checked', false);
              $("input[value='updateUser']").prop('checked', false);
              $("input[value='viewUser']").prop('checked', false);
              $("input[value='deleteUser']").prop('checked', false);
              $("input[value='createDesignation']").prop('checked', false);
              $("input[value='updateDesignation']").prop('checked', false);
              $("input[value='viewDesignation']").prop('checked', false);
              $("input[value='deleteDesignation']").prop('checked', false);
              $("input[value='viewReport']").prop('checked', false);

              $("input[value='createCompany']").prop('checked', false);
              $("input[value='updateCompany']").prop('checked', false);
              $("input[value='viewCompany']").prop('checked', false);
              $("input[value='deleteCompany']").prop('checked', false);

              $("input[value='createGroup']").prop('checked', false);
              $("input[value='updateGroup']").prop('checked', false);
              $("input[value='viewGroup']").prop('checked', false);
              $("input[value='deleteGroup']").prop('checked', false);
               
              $("input[value='createOnetoOneChat']").prop('checked', false);
              $("input[value='updateOnetoOneChat']").prop('checked', false);
              $("input[value='viewOnetoOneChat']").prop('checked', false);
              $("input[value='deleteOnetoOneChat']").prop('checked', false);
               
              $("input[value='createGroupChat']").prop('checked', false);
              $("input[value='updateGroupChat']").prop('checked', false);
              $("input[value='viewGroupChat']").prop('checked', false);
              $("input[value='deleteGroupChat']").prop('checked', false);
               
              $("input[value='createBroadCastChat']").prop('checked', false);
              $("input[value='updateBroadCastChat']").prop('checked', false);
              $("input[value='viewBroadCastChat']").prop('checked', false);
              $("input[value='deleteBroadCastChat']").prop('checked', false);
              
               if( $.inArray("createUser", permissions) !== -1 ) {

              $("input[value='createUser']").prop('checked', true);
              }
           
              if( $.inArray("updateUser", permissions) !== -1 ) {

              $("input[value='updateUser']").prop('checked', true);
              }
               if( $.inArray("viewUser", permissions) !== -1 ) {

              $("input[value='viewUser']").prop('checked', true);
              }
               if( $.inArray("deleteUser", permissions) !== -1 ) {

              $("input[value='deleteUser']").prop('checked', true);
              }

               if( $.inArray("createDesignation", permissions) !== -1 ) {

              $("input[value='createDesignation']").prop('checked', true);
              }
           
              if( $.inArray("updateDesignation", permissions) !== -1 ) {

              $("input[value='updateDesignation']").prop('checked', true);
              }
               if( $.inArray("viewDesignation", permissions) !== -1 ) {

              $("input[value='viewDesignation']").prop('checked', true);
              }
               if( $.inArray("deleteDesignation", permissions) !== -1 ) {

              $("input[value='deleteDesignation']").prop('checked', true);
              }

              if( $.inArray("createCompany", permissions) !== -1 ) {

              $("input[value='createCompany']").prop('checked', true);
              }
           
              if( $.inArray("updateCompany", permissions) !== -1 ) {

              $("input[value='updateCompany']").prop('checked', true);
              }
               if( $.inArray("viewCompany", permissions) !== -1 ) {

              $("input[value='viewCompany']").prop('checked', true);
              }
               if( $.inArray("deleteCompany", permissions) !== -1 ) {

              $("input[value='deleteCompany']").prop('checked', true);
              }


              if( $.inArray("createGroup", permissions) !== -1 ) {

              $("input[value='createGroup']").prop('checked', true);
              }
           
              if( $.inArray("updateGroup", permissions) !== -1 ) {

              $("input[value='updateGroup']").prop('checked', true);
              }
               if( $.inArray("viewGroup", permissions) !== -1 ) {

              $("input[value='viewGroup']").prop('checked', true);
              }
               if( $.inArray("deleteGroup", permissions) !== -1 ) {

              $("input[value='deleteGroup']").prop('checked', true);
              }



              if( $.inArray("viewReport", permissions) !== -1 ) {

              $("input[value='viewReport']").prop('checked', true);
              }


              /// Chat Purpose


              if( $.inArray("createOnetoOneChat", permissions) !== -1 ) {

              $("input[value='createOnetoOneChat']").prop('checked', true);
              }
           
              if( $.inArray("updateOnetoOneChat", permissions) !== -1 ) {

              $("input[value='updateOnetoOneChat']").prop('checked', true);
              }
               if( $.inArray("viewOnetoOneChat", permissions) !== -1 ) {

              $("input[value='viewOnetoOneChat']").prop('checked', true);
              }
               if( $.inArray("deleteOnetoOneChat", permissions) !== -1 ) {

              $("input[value='deleteOnetoOneChat']").prop('checked', true);
              }


              if( $.inArray("createGroupChat", permissions) !== -1 ) {

              $("input[value='createGroupChat']").prop('checked', true);
              }
           
              if( $.inArray("updateGroupChat", permissions) !== -1 ) {

              $("input[value='updateGroupChat']").prop('checked', true);
              }
               if( $.inArray("viewGroupChat", permissions) !== -1 ) {

              $("input[value='viewGroupChat']").prop('checked', true);
              }
               if( $.inArray("deleteGroupChat", permissions) !== -1 ) {

              $("input[value='deleteGroupChat']").prop('checked', true);
              }



              if( $.inArray("createBroadCastChat", permissions) !== -1 ) {

              $("input[value='createBroadCastChat']").prop('checked', true);
              }
           
              if( $.inArray("updateBroadCastChat", permissions) !== -1 ) {

              $("input[value='updateBroadCastChat']").prop('checked', true);
              }
               if( $.inArray("viewBroadCastChat", permissions) !== -1 ) {

              $("input[value='viewBroadCastChat']").prop('checked', true);
              }
               if( $.inArray("deleteBroadCastChat", permissions) !== -1 ) {

              $("input[value='deleteBroadCastChat']").prop('checked', true);
              }



           
        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});


$('#btnSave').click(function(){
   var url = $('#myformDesignation').attr('action');
   var data = $('#myformDesignation').serialize();
   var designation_name = $('input[name=designation_name]');
   var permissions = $('input[name=permission]');
    // var result = '';
var permission = document.getElementById('permission');

if (designation_name.val()=='') {
   toastr.error("Please Enter Designation Name");
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

               $('#myformDesignation')[0].reset();
               $('#exampleModalCenter').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
                
                showDesignationData();
        },

      error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }

    });
    }
});



$('#DesignationData').on('click','.item-delete',function(){
    var id= $(this).attr('data');
     
    $('#myModal_for_delete_message').find('.modal-title').text('Delete Designation');
    $('#myModal_for_delete_message').modal('show');

    $('#btdelete').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'post',
            async: false,
            url: '<?php echo base_url(); ?>api/Designation/delete/'+id,
            data: {'id': id},
            dataType: 'json',
            success: function(response)
            {
                  $('#myModal_for_delete_message').modal('hide');
                  
                  toastr.success(response.message);
                  showDesignationData();
            },

               error: function() 
            {
              $('#myModal_for_delete_message').modal('hide');
                     showDesignationData();
              toastr.error(response.message);

            }
        });

    });

});
</script>