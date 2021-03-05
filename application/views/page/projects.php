<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('header.php');
?>
<?php 
 if($page_details[0]['title']!='')
	$title=$page_details[0]['title'];
 else
	$title='';  

 if($page_details[0]['sub_title']!='')
	$sub_title=$page_details[0]['sub_title'];
 else
	$sub_title=''; 
	
 if($page_details[0]['description']!='')
	$description=$page_details[0]['description'];
 else
	$description=''; 	

if($page_details[0]['header_image']!='')
	 $header_image=$page_details[0]['header_image'];
else 
	$header_image=''; 	
	
if($page_details[0]['image_name']!='')
	 $image=$page_details[0]['image_name'];
else 
	$image='' ;
?>




<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()."upload/".$header_image.""; ?>');;padding-top:45px; padding-bottom:45px;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 style="color:#fff;" class="mb-2 bread">Projects</h1>
            <p class="breadcrumbs"><span class="mr-2"><a style="color:#fff;" href="http://srijanhomemakers.in/">Home  <i class="ion-ios-arrow-forward"></i></a></span> <span style="color:#fff;">Projects</span></p>
          </div>
        </div>
      </div>
    </section>




<!--	porject area start	-->
		
		<div class="port">
		<div class="container">
			
			<div class="port0">
			<h1>My Portfolio</h1>
			</div>
			<div class="row tab-content">
			
			<div class="col-md-12">
				
				<div class="port1">
				
				<ul class="d-flex justify-content-center nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">ONGOING PROJECTS</a></li>
					<li><a data-toggle="tab" href="#menu2">COMPLETED PROJECTS</a></li>
					<li><a data-toggle="tab" href="#menu1">UPCOMING PROJECTS</a></li>				
				</ul>
				</div>
				</div>

				<div id="home" class="tab-pane fade show active">
					<div class="row">
						
						
						   <?php 
			   if(isset($service))
			   {
			   foreach($service as $k=>$v)
			   {
			   ?>
        
						
						
							<div class="col-md-4 port2">
								<img src="<?php echo base_url()."upload/thumb/".$service[$k]["image_name"];?>" alt="image not found" />
								<h1><?php echo $service[$k]['title'];?></h1>
							</div>
							
							
				 <?php
			   }
			   }
             
             ?>				
			</div>
				</div>
				
				
		
				<div  id="menu1" class="tab-pane fade">
					<div class="row">
						
						<?php 
			   if(isset($test))
			   {
			   foreach($test as $k=>$v)
			   {
			   ?>
						
						<div class="col-md-4">
							<div class="port2">
								<img src="<?php echo base_url()."upload/thumb/".$test[$k]["test_image"];?>" alt="image not found" />
								<h1><?php echo $test[$k]['test_title'];?></h1>
						     </div>
						</div>
				<?php
			   }
			   }
             
             ?>	
					</div>
					</div>
				

				<div  id="menu2" class="tab-pane fade">
					<div class="row">
						
						<?php 
			   if(isset($equipment))
			   {
			   foreach($equipment as $k=>$v)
			   {
			   ?>
						
						
						<div class="col-md-4">
							<div class="port2">
								<img src="<?php echo base_url()."upload/".$equipment[$k]["equipment_image_name"];?>" alt="image not found" />
								<h1><?php echo $equipment[$k]['equipment_title'];?></h1>
							</div>
						</div>
				<?php
			   }
			   }
             
             ?>	
					</div>
				</div>
				

				
			</div>
			
			
			
			
			</div>
	
			
			</div>
	
<!--new project code end-->








<?php
include_once('footer.php');
?>
