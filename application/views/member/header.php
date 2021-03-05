<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php date_default_timezone_set("Asia/Calcutta");?>
<?php
	 if (isset($records))
	 {
		 $n=sizeof($records);
		 $n--;
		 if(strtolower($records[$n]['page_title'])!='home')
			echo $records[$n]['page_title']." | Integrity First";
		 else
			echo "Integrity First"; 
			 
	 }		   
	?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset.css">
<script src="http://code.jquery.com/jquery.js"></script>
<script>var baseurl="<?php echo base_url();?>";</script>
<script src="<?php echo base_url(); ?>assets/src/skdslider.js"></script>
<script src="<?php echo base_url();?>assets/member/script/logout.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/src/skdslider.css" rel="stylesheet">

</head>
<body>
<div class="navbar navbar-inverse" role="navigation">
<div class="header-area">
<div class="structure">
<div class="header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
</button>
<div class="logo">
<img src="<?php echo base_url(); ?>upload/<?php echo $settings[8]['value']; ?>" alt="Image" />
</div>
<div class="header-right">
<div class="titl">
<h1>For any assistance: <?php echo $settings[1]['value']; ?> </h1>
</div>
         <div class="flow">
          <ul class="socials pull-right">
            <li><a target="_blank" href="<?php echo $settings[2]['value']; ?>" class="sprite facebook-icon">facebook</a></li>
            <li><a target="_blank" href="<?php echo $settings[4]['value']; ?>" class="sprite twitter-icon">twitter</a></li>
            <li><a target="_blank" href="<?php echo $settings[3]['value']; ?>" class="sprite in-icon">in</a></li>
            <li><a target="_blank" href="<?php echo $settings[6]['value']; ?>" class="sprite google-icon">google</a></li>
            <li><a target="_blank" href="<?php echo $settings[7]['value']; ?>" class="sprite wi-icon">wi</a></li>
            
            </ul>
         </div>

</div>

</div>
</div>
</div>
<div class="menu-area"> 
<div class="structure"> 
<div class="menu"> 
<div class="collapse navbar-collapse">                                                                                                           
 <ul> 
	<?php $page=$_SERVER['REQUEST_URI'];
	 $page_arr=explode("/",$page);
	 $page= end($page_arr); 
	 ?>
	<li><a  <?php if($page=='myaccount') {echo "class='active'";} ?> href="<?php echo base_url(); ?>member/myaccount"/>My Account</a></li>
	<li><a  <?php if($page=='myprofile') {echo "class='active'";} ?> href="<?php echo base_url(); ?>member/myprofile"/>My Profile</a></li>                 
	<li><a  <?php if($page=='editprofile') {echo "class='active'";} ?> href="<?php echo base_url(); ?>member/editprofile"/>Edit Profile</a></li>
	<li><a  <?php if($page=='addfiles') {echo "class='active'";} ?> href="<?php echo base_url(); ?>member/addfiles"/>Add Audio Files</a></li>
	<li><a  <?php if($page=='myfiles') {echo "class='active'";} ?> href="<?php echo base_url(); ?>member/myfiles"/>My Files</a></li>
	<li><a  <?php if($page=='changepassword') {echo "class='active'";} ?>href="<?php echo base_url(); ?>member/changepassword"/>Change Password</a></li>  

    
	 <li id="site"><a href="<?php echo base_url(); ?>"/>Visit Site</a></li>	
	 <li id="logout"><a id="btn_logout" style="cursor:pointer"/>Logout</a></li>	
	

</ul>
</div>                                                                                                    
</div>
</div>
</div>
</div>