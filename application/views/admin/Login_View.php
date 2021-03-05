<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	?>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Login | <?php echo $settings[10]['value'];?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width , initial-scale=1"/>
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/admin/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<script>var baseurl="<?php echo base_url();?>";</script>
	<script src="<?php echo base_url();?>assets/admin/js/jQuery-2.1.3.min.js"></script>
	<script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/js/bootbox.min.js" type="text/javascript"></script>
	
    <script src="<?php echo base_url();?>assets/admin/script/login.js"></script>
	
	<style>
	
	@media (max-width:350px)
	{
	  .login-logo img
       {
	    width:100% !important;
       }	   
	}
	.login-box-msg
		{
			font-family: 'Open Sans',Arial,Helvetica,sans-serif;
			color:#0b7292;
			font-size: 20px;
		}
	</style>
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>upload/<?php echo $settings[8]['value']; ?>" alt="Image" style=""/></a>
	   
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">ADMIN LOGIN</p>
        <form action="" method="post" id="frm">
			  <div class="form-group has-feedback">
				<input type="text" id="txt_user_name" class="form-control" placeholder="User Name" maxlength="30"/>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  
			  <div class="form-group has-feedback">
				<input type="password" id="txt_password" class="form-control" placeholder="Password" maxlength="20" autocorrect="off"/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
			 
				<div  class="row">
					 <div class="col-xs-12"> 
						<div class="col-xs-6">
						   <button type="button" class="btn btn-primary btn-block btn-flat" id="btn_login">Log In</button>
						</div>  
						<div class="col-xs-6">
						   <button type="button" class="btn btn-primary btn-block btn-flat" id="btn_cancel">Cancel</button>
						</div> 					
					 </div>
			  </div>
        </form>

        
      </div>
    </div>
  </body>
</html>