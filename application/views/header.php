<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!-- Meta setup -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="">
		<meta name="decription" content="">
		<meta name="designer" content="Asad Kabir">
		
		<!-- Title -->
		<title>
            <?php
             date_default_timezone_set("Asia/Calcutta");
             if (isset($page_details))
             {		
                 if(strtolower($page_details[0]['title'])!='home')
                    echo $page_details[0]['sub_title']." | ".$settings[10]['value'];
                 else
                    echo $settings[10]['value']; 			 
             }	

                 $page=$_SERVER['REQUEST_URI'];
                 $page_arr=explode("/",$page);
                 $len=sizeof($page_arr);		
                 $page=$page_arr[$len-1];
                 if(is_numeric($page_arr[$len-1]))
                 {
                      $page=$page_arr[$len-2];

                 }
                 else
                 {
                     if (strpos($page, '?') !== true)
                     {
                         $page_arr=explode("?",$page);
                         $page=$page_arr[0];
                     }

                 }
            ?>
            </title>
            
		
		<!-- Fav Icon -->
		<link rel="icon" href="<?php echo base_url(); ?>assets/img/fav.png" />	

		<!-- Include Font-Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.css" />

		<!-- Include Bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />

		<!-- Include Wow -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" />
		
		<!-- Main StyleSheet -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css" />	
		
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css" />	
		
		<link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
		  rel='stylesheet' type='text/css'>
		
		
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic%7cPlayfair+Display:400,700%7cGreat+Vibes'
		  rel='stylesheet' type='text/css'><!-- Attach Google fonts -->

		 <link href="<?php echo base_url(); ?>assets/product/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
      <!-- Select2 CSS -->

      <!-- Custom styles for this template -->
      <link href="<?php echo base_url(); ?>assets/product/css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/product/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/product/vendor/owl-carousel/owl.theme.css">
		
	</head>
	<body>
		
<!--	code start	-->
<!-- top header start -->
		<section id="top-header">
			<div class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-6 d-flex justify-content-center">
							<div class="icon" style="border-right: 1px solid #fff;">
								<i class="fa fa-phone"></i><span><?php echo $settings[1]["value"]; ?></span>
							</div>
							<div class="icon">
								<i class="fa fa-envelope-o"></i><span><?php echo $settings[0]["value"]; ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="button">
								<a href="#">MY ACCOUNT</a>
								<a href="#">LIBRARY CATALOG </a>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</section>
		

<!-- top header end -->
<!-- Main header start -->
		<div class="mainheader">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					  	<a class="navbar-brand" href="#">Navbar</a>
					  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    	<span class="navbar-toggler-icon"></span>
			  			</button>
				  	<div class="collapse navbar-collapse" id="navbarNav">
					    <ul class="navbar-nav">
					      	<li class="nav-item active">
					        	<a class="nav-link" href="#">What we have</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="#">Events</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="#">collections</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="#">covid-19 resources</a>
					      	</li>
					      	<li class="nav-item">
					        	<a class="nav-link" href="#">about</a>
					      	</li>
					      	<form class="example" style="margin:auto;max-width:300px">
							  	<input type="text" placeholder="Search.." name="search2">
							  	<button type="submit"><i class="fa fa-search"></i></button>
							</form> 
					    </ul>
				  	</div>
				</div>
			</nav>
		</div>
		

<!-- Main header sender-->