

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

    
            <button type="button" id="changePassword" class="btn btn-info item-changePassword" data-toggle="modal" data-target="#exampleModalCenterChangePassword">Change Password</button>
            <br /> <br />
       


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Company</th>
                  <th>Designation</th>

                  <th>Action</th>
             
                </tr>
                </thead>
                <tbody id="UserData">
                  
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
 



<div class="modal fade" id="exampleModalCenterChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterChangePasswordTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Change Password</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body">
        <form id="myformPassword" action="" >
         <input type="" name="password_id" hidden="">
         
              <div class="col form-group">
                <label>Old Password</label>
                  <input type="Password" name="old_password" class="form-control" name="Old Password"  value="">
              </div> 
                <div class="col form-group">
                  <label>New Password</label>
                    <input type="Password" name="new_password" class="form-control" name="Old Password"  value="">
                </div> 
                <div class="col form-group">
                  <label>confirm Password</label>
                    <input type="Password" name="confirm_password" class="form-control" name="Old Password"  value="">
                </div> 

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnsavePassword" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Add User</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body">
       <form id="myformUser" action="">
         <div class="box-body">


               <div class="form-group">
                  <label for="email">Email</label>
                 
                           <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                  
                    
                 </div>


                <div class="form-group">
                    <div class="row">

                      <div class="col-lg-4">

                        <input type="hidden" class="form-control" id="insert_type" name="insert_type" placeholder="Email1" autocomplete="off">

                          <input type="hidden" class="form-control" id="email1" name="email1" placeholder="Email1" autocomplete="off">


                          <label for="fname">First name</label>
                         

                          <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                      </div>

                       <div class="col-lg-4">
                         <label for="lname">Last name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                      </div>

                       <div class="col-lg-4">
                         <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                      </div>

                    </div>
                
                </div>


                 <div class="form-group">
                    <div class="row">
                     

                        <div class="col-lg-4">
                         <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="" selected="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                      </div>


                       <div class="col-lg-4">
                           <label for="groups">Designation</label>
                              <input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="Last name" autocomplete="off" disabled>
                             
                              <input type="hidden" class="form-control" id="designation" name="designation">
                      </div>
                       <div class="col-lg-4">
                           <label for="groups">Company</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Last name" autocomplete="off" disabled>
                           
                            <input type="hidden" class="form-control" id="company" name="company">
                      </div>
                    </div>
                
                </div>

              
                 <div class="form-group">
                    <div class="row">
                       <div class="col-lg-4">
                         <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                      </div>
                     <!--  <div class="col-lg-4">
                           <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                      </div>
                       <div class="col-lg-4">
                          <label for="cpassword">Confirm password</label>
                       <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                      </div> -->
                    </div>
                
                </div>
   
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


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {

      $("#ProfileMainNav").addClass('active');
      $("#manageProfileSubMenu").addClass('active');

    });

    $('#changePassword').click(function(){
         
          $('#myformPassword')[0].reset();
          $('#btnsavePassword').html('Change');
          $('#exampleModalCenterChangePassword').find('.modal-title').text('Change Password');
          $('#myformPassword').attr('action','<?php echo base_url(); ?>api/User/update_user_password');
     
    });


  </script>


<script type="text/javascript">
  
  showUserData();

  var user_permission = <?php echo json_encode($user_permission); ?>;
  
  $("#btnSave").prop("disabled", true);

  var designations='';
  var companies='';
  
  function showUserData() {
       $.ajax({
              type: 'ajax',
              method: 'get',
              url: '<?php echo base_url(); ?>api/User/row',
              data:{'id': <?php echo $this->session->userdata('id');?>},  
              async: false,
              dataType: 'json',
            success: function(response){
               data=response.data;

               var html='';

                      html+='<tr><td>'+data.user_id+'</td><td>'+data.username+'</td>';
                      html+='<td>'+data.email+'</td><td>'+data.firstname+' '+data.lastname+'</td>';
                      html+='<td>'+data.phone+'</td><td>'+data.company_name+'</td>';
                      html+='<td>'+data.designation_name+'</td>';
                      html+='<td>';
                      
                      html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data.user_id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';
               
                       html+='</td></tr>';

                 $('#UserData').html(html);
            },
              error: function(response){
                   var data =JSON.parse(response.responseText);
                   toastr.error(data.message);
            }
        });

  }

      //edit
$('#UserData').on('click', '.item-edit', function(){
    $("#btnSave").prop("disabled", false);
    $("#verifyEmailOTP").prop("disabled", true);
    $("#email").prop("disabled", true);
 
    var id = $(this).attr('data');
    $('#exampleModalCenter').modal('show');
    $('#btnSave').html('Update');
    $('#exampleModalCenter').find('.modal-title').text('Edit User Details');
    $('#myformUser').attr('action','<?php echo base_url(); ?>api/User/update')

    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/User/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
           data=response.data;

                $('input[name=email]').val(data.email);
                $('input[name=email1]').val(data.email);      
                $('input[name=fname]').val(data.firstname);
                $('input[name=lname]').val(data.lastname);
                $('input[name=phone]').val(data.phone);      
                $('select[name=gender]').val(data.gender); 
                $('input[name=username]').val(data.username);
               
                $('input[name=designation]').val(data.group_id);
                $('input[name=company]').val(data.company_id);      

                $('input[name=designation_name]').val(data.designation_name);
                $('input[name=company_name]').val(data.company_name);  
               
                $('input[name=insert_type]').val(2);      
           
        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});



$('#btnSave').click(function(){
   var url = $('#myformUser').attr('action');
   var data = $('#myformUser').serialize();
  
   var username = $('input[name=username]').val();
   var email1 = $('input[name=email1]').val();
   // var password = $('input[name=password]').val();
   // var cpassword = $('input[name=cpassword]').val();
   var fname = $('input[name=fname]').val();
   var lname = $('input[name=lname]').val();
   var phone = $('input[name=phone]').val();
   var gender = $('select[name=gender]').val();
   var designation = $('select[name=designation]').val();
   var company = $('select[name=company]').val();


    if (fname=='') {
       toastr.error("Please Enter First Name");
    }
    else if(email1==''){
       toastr.error("Please Enter Email");
    }
     else if(lname==''){
       toastr.error("Please Enter Last Name");
    }
 
    else if(phone==''){
         toastr.error("Please Enter Phone No.");
      }
   
    else if(gender==''){
         toastr.error("Please Select Gender");
      }

    else if(designation==''){
         toastr.error("Please Select Designation");
      }
   
     else if(company==''){
         toastr.error("Please Select Company");
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

               $('#myformUser')[0].reset();
               $('#exampleModalCenter').modal('hide');

                if (response.status) {
                 toastr.success(response.message);
                }
                else{
                   toastr.error(response.message);
                }
                
                showUserData();
        },

      error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }

    });
    }
});

  //for save / insert data

$('#btnsavePassword').click(function(){
 $('#changePassword').attr("disabled", true);
   var url = $('#myformPassword').attr('action');
   var data = $('#myformPassword').serialize();
    // validation 
  
    $.ajax({
        type: 'ajax',
        method:'post',
        url: url,
        data: data,
        async: false,
        dataType: 'json',
         beforeSend: function() {
        // setting a timeout
  
            $('#changePassword').attr("disabled", true);
            
            },
        success: function(response){
    
           $('#changePassword').attr("disabled", false);
                
                if (response.status) {
                        
                        $('#myformPassword')[0].reset();
                          $('#exampleModalCenterChangePassword').modal('hide');
                          toastr.success(response.message);
                    
                }

                
                else{
                   toastr.error(response.message);
                }
                
                showallData();
        },
        error: function(response){
                
                
               $('#changePassword').attr("disabled", false);
            
               var text=JSON.parse(response.responseText);
            toastr.error(text.message);

        }
    });
  

});


</script>