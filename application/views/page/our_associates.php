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



<!--- html area start-->


<!--
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url();?>assets/img/abthdr.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Our Associates</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Our Associates <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
</section>
-->



<!--About Code Start-->
		
		<div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about1">
                            <h1>Our Associates</h1>
                            <p class="breadcrumbs"><span class="mr-2"><a style="color:#fff;" href="<?php echo base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Our Associates <i class="ion-ios-arrow-forward"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
		
<!--	About code End	-->





<!--new code atsrt-->

<!--Associate Code Start-->
		
<!--
		<div class="associate">
           <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <div class="ast1">
                     <h1>Our Associates</h1>
                    </div>  
                    <div class="ast2 d-flex justify-content-center">
                        <a href="#"> <h1>HOME &nbsp; </h1> </a>
                        <a href="#"><h1> / ASSOCIATES</h1></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
-->
        
        <div class="ast3">
            <div class="container">
                <div class="row">
					
					
					     
                      <?php 
			   if(isset($associate))
			   {
			   foreach($associate as $k=>$v)
			   {
			   ?>
        
					
                    <div class="col-md-4">
                        <div class="ast4">
                        <img src="<?php echo base_url()."upload/".$associate[$k]["associate_image_name"];?>" alt="image not found">
                        </div>
                    </div>
              
        
        
                    <div class="col-md-8">
                    <div class="ast6">
                    <h1><?php echo $associate[$k]['associate_title'];?></h1>
                    <h4><?php echo $associate[$k]['associate_sub_title'];?></h4>
                    <p><?php echo $associate[$k]['associate_description'];?></p>
                    </div>
                    </div>
					
					
					<?php
			   }
			   }
        
        ?>
        
					
            </div>

        </div>
        </div>
        
      
        
		
<!--	Associate code End	-->

<!--new code end-->

   
      
      
      
      



<?php
include_once('footer.php');
?>

