

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if(in_array('createUser', $user_permission)): ?>
             <button type="button" id="addUser" class="btn btn-success item-addUser" data-toggle="modal" data-target="#exampleModalCenter"> Add User</button>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>
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

                  <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
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
 

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Add User
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body">
       <form id="myformUser" action="">
         <div class="box-body">


               <div class="form-group">
                  <label for="email">Email</label>
                  <div class="row">
                      <div class="col-lg-10">

                        <input type="hidden" class="form-control" id="id" name="id"  autocomplete="off">
                        
                           <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                  
                      <!-- </div> -->
                      <!-- <div class="col-lg-2">
                        <button type="button" id="verifyEmailOTP" class="btn btn-info item-verifyEmailOTP" > Verify Email</button>
                      </div> -->
                  </div>
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
                            <div id="designation_div"></div>
                      </div>
                       <div class="col-lg-4">
                           <label for="groups">Company</label>
                           <div id="company_div"></div>
                      </div>
                    </div>
                
                </div>

              
                 <div class="form-group">
                    <div class="row">
                       <div class="col-lg-4">
                         <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                      </div>
                   
                    </div>
                
                </div>
   
              </div>

          </form>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
      


<div id="reset_modal">      

  <div class="modal-header modal-title12">Reset User Password</div>
       <div class="modal-body" id="PasswordResetDiv"></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnResetPassword" class="btn btn-primary">Save changes</button>
      </div>

</div>

     
    </div>
  </div>
</div>




<div class="modal fade" id="verifyEmailOTPModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Verify Email OTP</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         <!--  <span aria-hidden="true">&times;</span> -->
      </div>
      <div class="modal-body">
       <form id="myformVerifyEmailOTP" action="">
         <div class="box-body">

           <div class="form-group">
              <label for="cpassword">OTP</label>
                <input type="password" class="form-control" id="email_otp" name="email_otp" placeholder="Enter OTP" autocomplete="off">
               
                <input type="hidden" class="form-control" id="email_verify" name="email_verify" placeholder="" autocomplete="off">

            </div>
         </div>

          </form>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnVerifyEmailOTP" class="btn btn-primary">Verify OTP</button>
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

      $("#userMainNav").addClass('active');
      $("#manageUserSubNav").addClass('active');

    });



    $('#addUser').click(function(){
         // $('#reset_modal').html('');
          $('#myformUser')[0].reset();

          $('#btnSave').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add User');
          $('#myformUser').attr('action','<?php echo base_url(); ?>api/User/insert');
          showDesignationData();
          showCompanyData();

    });


    $('#verifyEmailOTP').click(function(){

       var email = $('input[name=email]').val();
       
       if(email=='') {
           toastr.error("Please Enter Email");
       }
       else
       {

            sendEmail(email);
 
        }

    });

  </script>


<script type="text/javascript">
  
  showUserData();

  var user_permission = <?php echo json_encode($user_permission); ?>;
   // $("#btnSave").prop("disabled", true);
  var designations='';
  var companies='';

  function showUserData() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/User/",
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
                  
                      html+='<tr><td>'+x+'</td><td>'+data[i].username+'</td>';
                      html+='<td>'+data[i].email+'</td><td>'+data[i].firstname+' '+data[i].lastname+'</td>';
                      html+='<td>'+data[i].phone+'</td><td>'+data[i].company_name+'</td>';
                      html+='<td>'+data[i].designation_name+'</td>';
                      html+='<td>';
                      
                      if(<?php echo $this->session->userdata('group_id')?>!=1) {

                        if(<?php echo $this->session->userdata('company_id')?>==data[i].company_id){

                            <?php if(in_array('updateUser', $user_permission)){ ?>
                        
                               html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].user_id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';


                            <?php  } ?>
                          
                                <?php if(in_array('deleteUser', $user_permission)){ ?>
                                 
                                      
                               html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].user_id+'"><i class="fa fa-trash"></i></a>';
                                  
                           <?php  } ?>
                        }

                     }

                     else{

                       <?php if(in_array('updateUser', $user_permission)){ ?>
                        
                         html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].user_id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';


                      <?php  } ?>
                    
                          <?php if(in_array('deleteUser', $user_permission)){ ?>
                           
                                
                         html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].user_id+'"><i class="fa fa-trash"></i></a>';
                            
                     <?php  } ?>
                     }

                       html+='</td></tr>';

                    }
                 
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
  var id = $(this).attr('data');
    var html='<form id="myformUserPasswordReset" action="">'+
         '<div class="box-body">'+
           '<div class="form-group">'+
            ' <div class="row">'+
                ' <div class="col-lg-4">'+

                      ' <input type="hidden" class="form-control" id="user_id_reset" name="user_id_reset" value="'+id+'" placeholder="Confirm Password" autocomplete="off">'+


                '    <label for="password">New Password</label>'+


                     ' <input type="password" class="form-control" id="password" name="password" placeholder="New Password" autocomplete="off">'+
                        ' </div>'+
                         '  <div class="col-lg-4">'+
                             ' <label for="cpassword">Confirm password</label>'+
                        
                          ' <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">'+
                '      </div> '+
                 
               '     </div>'+
                
            '    </div>'+
   
            '  </div>'+
         '</form>';

    $('#PasswordResetDiv').html(html);


     $("#btnSave").prop("disabled", false);
     $("#verifyEmailOTP").prop("disabled", true);
     // $("#email").prop("disabled", true);
    
     // $("#password").prop("disabled", true);
     // $("#cpassword").prop("disabled", true);
   
  
    $('#exampleModalCenter').modal('show');
     $('#btnSave').html('Update');
    $('#exampleModalCenter').find('.modal-title').text('Edit User Details');
    $('#myformUser').attr('action','<?php echo base_url(); ?>api/User/update');
   
    showDesignationData();
    showCompanyData();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/User/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        success: function(response){
           data=response.data;

                $('input[name=id]').val(data.user_id);
                $('input[name=email]').val(data.email);
                $('input[name=email1]').val(data.email);      
                $('input[name=fname]').val(data.firstname);
                $('input[name=lname]').val(data.lastname);
                $('input[name=phone]').val(data.phone);      
                $('select[name=gender]').val(data.gender); 
                $('input[name=username]').val(data.username);
               
                $('select[name=designation]').val(data.group_id);
                $('select[name=company]').val(data.company_id);      
               
                $('input[name=insert_type]').val(2);      
           
        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });

});



function showDesignationData(argument) {
  // body...


            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Designation/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
                   if(<?php echo $this->session->userdata('group_id')?>==1){
                   var html='<select class="form-control" id="designation" name="designation"><option value="">Select Designation</option>';
                 }else{
                    var html='<select class="form-control" id="designation" name="designation" disabled="disabled">';
                 }

                    for (var i = 0; i < data.length; i++) {
                      var x=i+1;
                     if(<?php echo $this->session->userdata('group_id')?>==1){
                        html+='<option value="'+data[i].id+'">'+data[i].designation_name+'</option>';
                      }
                      else{
                        if(<?php echo $this->session->userdata('group_id')?>!=1 && data[i].id==3){

                          html+='<option selected value="'+data[i].id+'">'+data[i].designation_name+'</option>';

                        }
                        else{
                           html+='<option selected value="'+data[i].id+'">'+data[i].designation_name+'</option>';
                        }
                    
                      }
                      
                    }

                    html+='</select>';
                   $('#designation_div').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

}




function showCompanyData(argument) {
  // body...


            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Company/",
                async: false,
                method:'get',
                dataType: 'json',
                success: function(response) {
                    // body...
                    data=response.data;
               
                    if(<?php echo $this->session->userdata('group_id')?>==1){
                       var html='<select class="form-control" id="company" name="company"><option value="">Select Company</option>';
                     }else{
                        var html='<select class="form-control" id="company" name="company" disabled="disabled">';
                     }

                    for (var i = 0; i < data.length; i++) {

                      var x=i+1;
                      if(<?php echo $this->session->userdata('group_id')?>==1){
                          html+='<option value="'+data[i].id+'">'+data[i].company_name+'</option>';
                      }
                      else{
                        if(<?php echo $this->session->userdata('company_id')?>==data[i].id){
                           html+='<option selected value="'+data[i].id+'">'+data[i].company_name+'</option>';
                        }
                      }
                      
                    }
                    html+='</select>';
                   $('#company_div').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });



}



$('#btnSave').click(function(){
  document.getElementById('company').disabled=false;
  document.getElementById('designation').disabled=false;

   var url = $('#myformUser').attr('action');
   var data = $('#myformUser').serialize();
  
   var username = $('input[name=username]').val();
   var email1 = $('input[name=email]').val();
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

    //  else if(password!='' && password!=cpassword){
       
    //        toastr.error("Password and Confirm Password Doesnt match");
       
    // }
     
 
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



$('#btnVerifyEmailOTP').click(function(){
   var url = $('#myformVerifyEmailOTP').attr('action');
   var data = $('#myformVerifyEmailOTP').serialize();
  
   var email_otp = $('input[name=email_otp]').val();
     if (email_otp=='') {
       toastr.error("Please Enter OTP sent on email");
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

               $('#myformVerifyEmailOTP')[0].reset();
               $('#verifyEmailOTPModalCenter').modal('hide');

                if (response.status) {
                     toastr.success(response.message);
                     $("#verifyEmailOTP").prop("disabled", true);
                     $("#email").prop("disabled", true);
                     $("#btnSave").prop("disabled", false);

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




function sendEmail(email) {
  // body...
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/User/sendEmail",
                async: false,
                method:'post',
                dataType: 'json',
                data:{'email':email},
                success: function(response) {
                    // body...
                    data=response.data;
                        if(response.status){
                            toastr.success(response.message);
                              $('#verifyEmailOTPModalCenter').modal('show');
                                $('#btnVerifyEmailOTP').html('Verify Email OTP');
                                $('#verifyEmailOTPModalCenter').find('.modal-title').text('Verify Email OTP');
                                $('#myformVerifyEmailOTP').attr('action','<?php echo base_url(); ?>api/User/verifyEmailOTP/');
                                $('input[name="email_verify"]').val(email);
                                $('input[name="email1"]').val(email);
                                $('input[name="insert_type"]').val(1);

                        }else{

                             toastr.error(response.message);

                        
                        }

                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });



}




$('#btnResetPassword').click(function(){


   var url = $('#myformUserPasswordReset').attr('action');
   var PasswordResetdata = $('#myformUserPasswordReset').serialize();

   var password = $('input[name=password]').val();
   var cpassword = $('input[name=cpassword]').val();
 

    if (password=='') {
       toastr.error("Please Enter New Password");
    }
    else   if (cpassword=='') {
       toastr.error("Please Enter Confirm Password");
    }


else{

      if(password!=cpassword){
           toastr.error("New and Confirm Password Does not match");
      
      }
      
      else{

        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url("api/User/user_reset_password/");?>',
            data: PasswordResetdata,
            async: false,
            dataType: 'json',
            success: function(response){

                   $('#myformUserPasswordReset')[0].reset();
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
 

    }
});


</script>