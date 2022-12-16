<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="<?php echo base_url('assets/dist/css/toastr.css'); ?>" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="icon">
    <img style="width: auto;height: 100px;" src="<?php echo base_url('uploads/temp_logo_bg.png');?>">
    <!-- <i class="ionicons ion-android-people"></i> -->
  </div>
  <div class="login-logo">
    <a href="https://briidea.in/" target="_BLANK" style="font-size: 20px;">Product By Briidea Innoventures LLP <br>
      <!-- <b>Ensure Chat</b> -->
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <p class="login-box-msg">Please login to start </p>

    <?php echo validation_errors(); ?>  

    <?php if(!empty($errors)) {
      echo $errors;
    } ?>

    <form action="" id="LoginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email/Mobile No." autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" id="btnLogin" class="btn btn-success btn-block btn-flat">Log In</button>
         
        </div>
        <!-- /.col -->
      </div>
       <a href="javascript:;" class="item-forgetPassword">Forget Password ?</a>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->


<div class="modal fade" id="ForgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header modal-title">Forget Password 
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
         
      </div>
      <div class="modal-body" id="modal-body">
          <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
        

      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Send OTP</button>
       
      </div>
    </div>
  </div>
</div>


<style>
  .icon {
    font-size: 70px;
    text-align: center;
  }
</style>

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>

<script src="<?php echo base_url('assets/dist/js/toastr.min.js') ?>"></script>


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });


$('#btnLogin').click(function(){
   
   var email = $('input[name=email]').val();
   var password = $('input[name=password]').val();
    // var result = '';

if (email=='') {
 toastr.error("Please Enter Email");
}
else if (password=='') {
  toastr.error("Please Enter Password");
}
else{
 
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Auth/checkLogin',
        data:{'email': email,'password':password},  
        async: false,
        dataType: 'json',
        success: function(response){
            if(response.status){
              toastr.success(response.message);
              window.location.replace("<?php echo base_url('ChatGroups/newWindowGroup'); ?>");
          
            }
        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               toastr.error(data.message);
        }
    });
    }
});

</script>


<script type="text/javascript">
  $('#LoginForm').on('click', '.item-forgetPassword', function(){
      $('#ForgetPasswordModal').modal('show');


  });


</script>

</body>
</html>
