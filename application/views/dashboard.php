

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php if($this->session->userdata('group_id') == 1){ ?>

        <div class="row">
         
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $users_count;?></h3>

                <p>System Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('User/') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $company_count;?></h3>

                <p>Available Branches</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <a href="<?php echo base_url('Companies/') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $designation_count;?></h3>

                <p>Available Designations</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('Designations/') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>


           <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo $chat_groups_count;?></h3>

                <p>Available Chat Groups</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('ChatGroups/') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->

      <?php } ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
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



</script>

<script>
    if('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        console.log('App is loader');
        navigator.serviceWorker.register('./service-worker.js')
            .then( () => {
                console.log("Service Worker registerd");
            })
      })
    }
  </script>