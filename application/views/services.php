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
<style>

    .services{
        margin: 3em 0;
    }
    .offer-part{
        margin: 15px;
    }

</style>



  
<!--
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()."upload/".$header_image.""; ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
-->

<div class="services">
    <div class="container">
        <div class="row">
            <?php 
                     if(isset($news) && !empty($news)){
                         foreach($news as $k=>$v){
                             
                       
                     
                     ?>
		 	 	 	 <div class="col-md-6 col-lg-4">
		 	 	 	 	 <div class="offer-part">
		 	 	 	 	 	 <img src="<?php echo base_url(); ?>upload/<?php echo $news[$k]["news_image_name"]; ?>" alt="images not found" />
		 	 	 	 	 	 <h3><?php echo $news[$k]["news_title"]; ?></h3>
		 	 	 	 	 	 <p><?php echo $news[$k]["news_description"]; ?></p>
		 	 	 	 	 	 <h5><a href="#">Continue Reading...</a></h5>
		 	 	 	 	 </div>
		 	 	 	 </div>
		 	 	 	  
		 	 	 	 <?php 
                     
                         }
                     }
                     ?>
		 	 	 	
        </div>
    </div>
</div>

<!--	service area code end	-->
		

<!--new code service end-->





































<?php
include_once('footer.php');


?>
