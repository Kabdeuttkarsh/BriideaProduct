

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Branches</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Branches</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if(in_array('createCompany', $user_permission)): ?>
             <button type="button" id="addCompany" class="btn btn-success item-addCompany" data-toggle="modal" data-target="#exampleModalCenter"> Add Branch</button>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Branches</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Branch Name</th>
                  

                  <?php if(in_array('updateCompany', $user_permission) || in_array('deleteCompany', $user_permission)): ?>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody id="CompanyData">
                  
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
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Add Branch
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="myformCompany" action="">
          <input type="hidden" name="id">
            <div class="form-group">
              <label for="exampleFormControlSelect2">Branch Name</label>
              <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Branch Name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Branch City</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Branch City">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect2">Branch Phone/Mobile No</label>
              <input type="text" id="company_phone" name="company_phone" class="form-control" placeholder="Branch Phone/Mobile No.">
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
                Are sure to delete this Branch ?
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

      $("#companyMainNav").addClass('active');
      $("#manageCompanySubNav").addClass('active');

          $('#addCompany').click(function(){
          $('#myformCompany')[0].reset();
          $('#btnSave').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add Branch');
          $('#myformCompany').attr('action','<?php echo base_url(); ?>api/Company/insert');

      });




      $('#btnSave').click(function(){
             var url = $('#myformCompany').attr('action');
             var data = $('#myformCompany').serialize();
             var chat_group_name = $('input[name=company_name]');
             var address = $('input[name=address]');
             var company_phone = $('input[name=company_phone]');
        
            
              if (chat_group_name.val()=='') {
                 toastr.error("Please Enter Branch Name");
              }
              else if(address.val()==''){
                  toastr.error("Please Enter Branch City");
              }
               else if(company_phone.val()==''){
                   toastr.error("Please Enter Branch Mobile/Phone No.");
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

                                 $('#myformCompany')[0].reset();
                                 $('#exampleModalCenter').modal('hide');

                                  if (response.status) {
                                   toastr.success(response.message);
                                  }
                                  else{
                                     toastr.error(response.message);
                                  }
                                  
                                  showCompanyData();
                          },

                        error: function(response){
                                 var data =JSON.parse(response.responseText);
                                 toastr.error(data.message);
                          }

                      });
                  }
               });



              //edit
      $('#CompanyData').on('click', '.item-edit', function(){
           var id = $(this).attr('data');
          $('#exampleModalCenter').modal('show');
          $('#btnSave').html('Update');
          $('#myformCompany').attr('action','<?php echo base_url(); ?>api/Company/update');
          $('#exampleModalCenter').find('.modal-title').text('Update Company');
             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/Company/row',
                data:{'id': id},  
                async: false,
                dataType: 'json',
                success: function(response){
                 
                   if(response.status){
                    if(response.data){
                      data=response.data;
                          $('input[name=id]').val(data.id);
                          $('input[name=company_name]').val(data.company_name);
                          $('input[name=address]').val(data.address);
                          $('input[name=company_phone]').val(data.company_phone);   
                    }
              
                   }

                },
                  error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });

      });

      $('#CompanyData').on('click', '.item-delete', function(){
          var id = $(this).attr('data');
  
            $('#myModal_for_delete_message').find('.modal-title').text('Delete Branch');
            $('#myModal_for_delete_message').modal('show');
            $('#btdelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/Company/delete/'+id,
                    data: {'id': id},
                    dataType: 'json',
                    success: function(response)
                    {
                          $('#myModal_for_delete_message').modal('hide');
                          toastr.success(response.message);
                          showCompanyData();
                    },

                       error: function() 
                    {
                      $('#myModal_for_delete_message').modal('hide');
                     
                       toastr.error(response.message);
                       showCompanyData();

                    }
                });

            });

        });

    });




  </script>


<script type="text/javascript">
  
  showCompanyData();

  var user_permission = <?php echo json_encode($user_permission); ?>;
 

  function showCompanyData() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Company/",
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
                  
                      html+='<tr><td>'+x+'</td><td>'+data[i].company_name+'</td>';
                  
                      html+='<td>';
                      
                      <?php if(in_array('updateCompany', $user_permission) ){ ?>
                        
                         html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';
                      
                        <?php  } ?>
                      
                       <?php if( in_array('deleteCompany', $user_permission)){ ?>
                         html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><i class="fa fa-trash"></i></a>';
                            
                          <?php  } ?>

                       html+='</td></tr>';

                    }
                 
                   $('#CompanyData').html(html);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

  }


</script>