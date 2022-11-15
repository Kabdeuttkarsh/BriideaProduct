

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Companies</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Companies</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if(in_array('createCompany', $user_permission)): ?>
             <button type="button" id="addCompany" class="btn btn-success item-addCompany" data-toggle="modal" data-target="#exampleModalCenter"> Add Company</button>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Companies</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Company Name</th>
                  

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
 


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {

      $("#companyMainNav").addClass('active');
      $("#manageCompanySubNav").addClass('active');

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
                      
                       if(jQuery.inArray("updateCompany", user_permission) ) {
                        // if($.inArray("updateUser", user_permission) !== -1 ) {
                        
                         html+='<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'" style="margin:10px;"><i class="fa fa-edit"></i></a>';
                      
                      }
                    
                        if(jQuery.inArray("deleteCompany", user_permission) ) {
                              // if($.inArray("deleteUser", user_permission) !== -1 ) {
                                
                         html+='<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><i class="fa fa-trash"></i></a>';
                            
                       }

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