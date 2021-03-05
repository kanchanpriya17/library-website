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

<!--html projects area start-->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url(); ?>assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Gallery</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>

          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid p-0">
				<div class="row no-gutters justify-content-center mb-5 pb-2">
        
        </div>
    		<div class="row no-gutters">
                
                
            <?php 
			   if(isset($siteoffice))
			   {
			   foreach($siteoffice as $k=>$v)
			   {
			   ?>
     
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="project">
	    				<img src="<?php echo base_url()."upload/".$siteoffice[$k]["siteoffice_image_name"];?>" class="img-fluid" alt="Colorlib Template">
	    				<div class="text">
	    					<span><?php echo $siteoffice[$k]['siteoffice_description'];?></span>
	    					<h3><a href="project.html"><?php echo $siteoffice[$k]['siteoffice_title'];?></a></h3>
	    				</div>
	    				<a href="<?php echo base_url()."upload/".$siteoffice[$k]["siteoffice_image_name"];?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
    				</div>
    			</div>
                    <?php 
                                   }
                                   }
						          ?>   
                
                
     
    		</div>
    	</div>
		</section>



<?php
include_once('footer.php');
?>
