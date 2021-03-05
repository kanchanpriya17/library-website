<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
    <?php
	 if (isset($records))
	 { 
		 $n=sizeof($records);
		 $n--;
		 echo $records[$n]['page_title'];
	 }
	?>
	| <?php echo $settings[10]['value'];?></title>
	<?php date_default_timezone_set("Asia/Calcutta");?>	 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width , initial-scale=1"/>
    <link href="<?php echo base_url(); ?>assets/admin/css/datepicker/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/admin/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/admin/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
	<!--<link href="<?php echo base_url();?>assets/admin/css/editor.css" rel="stylesheet">-->
	<script>var baseurl="<?php echo base_url();?>";</script>

	<script src="<?php echo base_url();?>assets/admin/js/jQuery-2.1.3.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/js/fastclick.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/admin/js/app.min.js" type="text/javascript"></script>	

	<script src="<?php echo base_url();?>assets/admin/js/bootbox.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/admin/js/bootstrap-dropdownhover.min.js"></script>	

	<script src="<?php echo base_url();?>assets/admin/script/logout.js" type="text/javascript"></script>	

	<script src="<?php echo base_url();?>assets/admin/ckeditor/ckeditor.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/admin/ckeditor/samples/js/sample.js" type="text/javascript"></script>
	<style>

	@media(max-width:1920px)
    {
      .dropdown-menu
       {

		position: absolute !important;

		right: 5% !important;

		left: auto !important;

		border: 1px solid #ddd;

		background: #fff;
}
}
</style>
</head>

  <body class="skin-blue sidebar-mini">

    <div class="wrapper"><!--Wrapper-->

	<!-----------------------------HEADER START--------------------------------------->

      <header class="main-header">

			<a target="_blank" href="<?php echo base_url(); ?>" class="logo">

				<span class="logo"><b><i class="fa fa-eye "></i>view site</b></span>

			</a>

			<nav class="navbar navbar-static-top" role="navigation">

				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

					<span class="">Collpase Menu</span>

				</a>

				<div class="navbar-custom-menu">

					<ul class="nav navbar-nav">

						<li class="dropdown user user-menu">

							

							<a href="#" class="dropdown-toggle" data-toggle="dropdown"  >

							<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"  data-hover="dropdown">-->

								<img src="<?php echo base_url();?>assets/admin/images/user.png" class="user-image" alt="User Image"/>

								<span class="hidden-xs">

								<?php 

								  echo $_SESSION['user_name'];

								?>

								</span>

							</a>

							<ul class="dropdown-menu">

								<li class="user-header">

									<img src="<?php echo base_url();?>assets/admin/images/user2.png" class="img-circle" alt="User Image" />

									<p>

										<?php 

										  echo $_SESSION['user_name'];

								        ?>

										

									</p>

								</li>



								<li class="user-footer">

									<div class="text-center">

										<button type="button" class="btn btn-default btn-flat" id="btn_logout" >Sign out</button>

									</div>

								</li>

								

							</ul>

						</li>

					</ul>

				</div>

			</nav>

      </header>

     <!-----------------------------HEADER END-------------------------------------->

	 

	  <!-----------------------------SIDEBAR START-------------------------------------->

	<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo base_url();?>assets/admin/images/user2.png" class="img-circle" alt="User Image" />
				</div>
				<div class="pull-left info">
					<p>
					<?php 
								  echo $_SESSION['user_name'];
					?>
					</p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>

			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li id="index">
					<a href="<?php echo base_url();?>admin/dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span> 
					</a>
				</li>				
				<li class="treeview" id="post">
					<a href="#">
					<i class="fa fa-quote-right"></i>
					<span>Posts</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>admin/post"><i class="fa fa-circle-o"></i> All Posts</a></li>
						<li><a href="<?php echo base_url();?>admin/category"><i class="fa fa-circle-o"></i>Categories</a></li>
					</ul>
				</li>				
				
				<li id="page">
					<a href="<?php echo base_url();?>admin/page">
					<i class="fa fa-file"></i> <span>Page</span>
					</a>
				</li>
				<li id="slider">
					<a href="<?php echo base_url();?>admin/slider">
					<i class="fa fa-picture-o"></i> <span>Slider</span>
					</a>
				</li>
				
				
				
				
				
				
				 <li class="treeview" id="associates">
					<a href="#">
					<i class="fa fa-tasks" ></i>
					<span>Our Associates</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>admin/associate"><i class="fa fa-circle-o"></i>Add New</a></li>
						<!--<li><a href="<?php echo base_url();?>admin/siteoffice"><i class="fa fa-circle-o"></i>Site Office</a></li>
						<li><a href="<?php echo base_url();?>admin/equipment"><i class="fa fa-circle-o"></i>Our Equipments</a></li>-->
						
						
						
					</ul>
				</li>
				
				
				
				
				
				
				
				
				
				<!-- <li id="test">
					<a href="<?php echo base_url();?>admin/test">
					<i class="fa fa-users"></i> <span>Events</span>
					</a>
				</li>-->
			
			
			
			
			
			
				 <!--<li id="staff">
					<a href="<?php //echo base_url();?>admin/staff">
					<i class="fa fa-users"></i> <span>Notification</span>
					</a>
				</li>-->
			
			    <li class="treeview" id="gallery">
					<a href="#">
					<i class="fa fa-user" ></i>
					<span>Our Clients</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>admin/album"><i class="fa fa-circle-o"></i>add client</a></li>
					</ul>
				</li>
				
				
				<!--
				 <li id="test">
					<a href="<?php echo base_url();?>admin/test">
					<i class="fa fa-users"></i> <span>Gallery</span>
					</a>
				</li>
				-->
				
				<!--
                <li id="test">
					<a href="<?php echo base_url();?>admin/test">
					<i class="fa fa-book"></i> <span>Articles</span>
					</a>
				</li>				
              -->
              <!--
               <li id="file">
					<a href="<?php echo base_url();?>admin/file">
					<i class="fa fa-music"></i> <span>Audio File</span>
					</a>
				</li>-->
				<!--
				<li id="seller">
					<a href="<?php echo base_url();?>admin/seller">
					<i class="fa fa-car"></i> <span>Enquiry</span>
					</a>
				</li>
				-->
				
              <li class="treeview" id="gallery">
					<a href="#">
					<i class="fa fa-tasks" ></i>
					<span>Our Project</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>admin/services"><i class="fa fa-circle-o"></i>Ongoing Projects</a></li>
						<li><a href="<?php echo base_url();?>admin/test"><i class="fa fa-circle-o"></i>Upcoming Projects</a></li>
                        <li><a href="<?php echo base_url();?>admin/equipment"><i class="fa fa-circle-o"></i>Completed Projects</a></li>
                        
						<!--<li><a href="<?php echo base_url();?>admin/news"><i class="fa fa-circle-o"></i>Completed Projects</a></li>-->
						
						
						
					</ul>
				</li>
				<!--<li id="services">
					<a href="<?php echo base_url();?>admin/services">
					<i class="fa fa-book"></i> <span>Lightning Conductors </span>
					</a>
				</li>-->
				<!--<li id="brand">
					<a href="<?php echo base_url();?>admin/brand">
					<i class="fa fa-file"></i> <span>Other Products</span>
					</a>
				</li>
				-->
                  <li id="news">
					<a href="<?php echo base_url(); ?>admin/doctor">
					<i class="fa fa-newspaper-o"></i> <span>Team</span> </span>
					</a>
				</li>
				
				<li id="priya">
					<a href="<?php echo base_url(); ?>admin/priya">
					<i class="fa fa-newspaper-o"></i> <span>priya</span> </span>
					</a>
				</li>
<!--
	<li id="brand">					
	<li><a href="<?php echo base_url();?>admin/brand"><i class="fa fa-users"></i>Employee</a></li>								
	</li> 
-->
<!--	
<li class="treeview" id="brand">
					<a href="#">
					<i class="fa fa-picture-o" ></i>
					<span>Events</span>
					<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url();?>admin/images"><i class="fa fa-circle-o"></i>Image</a></li>
						<li><a href="<?php echo base_url();?>admin/brand"><i class="fa fa-circle-o"></i>Events</a></li>
					</ul>
				</li>  
				<li id="brand">					
						<li><a href="<?php echo base_url();?>admin/brand"><i class="fa fa-users"></i>Employee</a></li>								
				</li> 
				-->
				<li id="news">
					<a href="<?php echo base_url(); ?>admin/news">
					<i class="fa fa-newspaper-o"></i> <span>Our Servicess </span>
					</a>
				</li>
				
				<!--<li id="test">
					<a href="<?php echo base_url();?>admin/test">
					<i class="fa fa-cube"></i> <span>Products</span>
					</a>
				</li>
				-->
				<!--<li id="test-application">
					<a href="<?php //echo base_url();?>admin/testapplication">
					<i class="fa fa-users"></i> <span>Creditionals</span>
					</a>
				</li>-->
              <!--<li id="subscriber">
					<a href="<?php //echo base_url();?>admin/subscriber">
					<i class="fa fa-envelope"></i> <span>Email Subscriber</span>
					</a>
				</li>
				-->
				<li id="user">
					<a href="<?php echo base_url();?>admin/user">
					<i class="fa fa-lock"></i> <span>Change Password</span>
					</a>
				</li>
				<!--<li id="menu">
					<a href="menu.php">
						<i class="fa fa-th-large"></i> <span>Menu</span>
					</a>
				</li>
				-->
<!--<li><a href="pages/widgets.html">
					<i class="fa fa-camera"></i><i class="fa fa-music pull-left"></i> <span>Image Gallery</span>
					</a>
</li>-->
				<li id="setting">
					<a href="<?php echo base_url();?>admin/setting">
					<i class="fa fa-cog"></i> <span>Setting</span>
					</a>
				</li>				
				<li id="logo">
					<a href="<?php echo base_url();?>admin/logo">
					<i class="fa fa-picture-o"></i> <span>Change Logo</span>
					</a>
				</li>
				<!--<li id="doctors">
					<a href="<?php echo base_url();?>admin/doctor">
					<i class="fa fa-cube"></i> <span>Credentials</span>
					</a>
				</li>-->
				<li id="award">
					<a href="<?php echo base_url();?>admin/award">
					<i class="fa fa-quote-left"></i> <span>Testimonials</span>
					</a>
				</li>
				<li id="subscriber">
					<a href="<?php  echo base_url();?>admin/subscriber">
					<i class="fa fa-envelope"></i> <span>Contact Data</span>
					</a>
				</li>
		
		<li id="expression">
					<a href="<?php  echo base_url();?>admin/expression">
					<i class="fa fa-envelope"></i> <span>Expression Data</span>
					</a>
				</li>
        
      <li><a href="<?php echo base_url();?>admin/siteoffice"><i class="fa fa-circle-o"></i>our_gallery</a></li>
		  <li><a href="<?php echo base_url();?>admin/gallery"><i class="fa fa-circle-o"></i>CHECK</a></li>
        
				<!--<li id="visiter">
					<a href="<?php echo base_url();  ?>admin/visiter">
					<i class="fa fa-picture-o"></i> <span>Enquiry</span>
					</a>
				</li>--
			<!--<li id="sb">
					<a href="<?php //echo base_url();?>admin/sidebanner">
					<i class="fa fa-image"></i> <span>Change Side Banner</span>
					</a>
				</li>-->
			</ul>
		</section>
	</aside>
     <!-----------------------------SIDEBAR END-------------------------------------->