<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('header.php');
?>
<?php 
 if($gallery_details[0]['gallery_title']!='')
	$title=$gallery_details[0]['gallery_title'];
 else
	$title='';  

 if($gallery_details[0]['gallery_sub_title']!='')
	$sub_title=$gallery_details[0]['gallery_sub_title'];
 else
	$sub_title=''; 
	
 if($gallery_details[0]['gallery_description']!='')
	$description=$gallery_details[0]['gallery_description'];
 else
	$description=''; 	
	
	
if($gallery_details[0]['gallery_image_name']!='')
	 $image=$gallery_details[0]['gallery_image_name'];
else 
	$image='' ;
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/gallery/prettyPhoto.css">
<style>
    
 hr { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 3px;
    color:#2848af;
    background: #fff
}    
    
.design
{
   font-family: 'Open Sans', sans-serif;
    font-size: 14px;
    color: #636363;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0.2px;
    word-spacing: 0.4px;
    text-transform: capitalize;
    margin-bottom: 60px;  
}
    
</style>
<!--
<div class="banner_area">
 <div class="row">
            </div>
    </div>
	 <hr>
				<div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="our_project_area_title">
                        <h2 style="margin-bottom:-16px;"><span class="our_pro_bor"><?php //echo $sub_title;?></h2>
                    </div>
                </div>
            </div>
					<div class="container">
						<div class="row">
                <div class="col-md-12 col-sm-12">
                  <img src="<?php //echo base_url(); ?>upload/<?php //echo $gallery_details[0]['gallery_image_name'];?>"/ class="img-responsive">
<p class="design"><?php //echo $description;?></p>
 </div>
            </div>
				</div>	
-->



<div class="wrapper">
<div class="container content-sm">
			<div class="headline-center margin-bottom-60">               
				<h2 style="color:#2848af; text-align: center;"><span class="our_pro_bor"><?php echo $title;?></span></h2>
				<div class="lead">
                   
                </div>
			</div>
            <div class="divider">
           </div>
				<div class="row">
					<div style="padding-bottom: 6px;" class="col-md-4 md-margin-bottom-50" id="service">	
					<a class="img-responsive" rel="prettyPhoto[gallery2]" href="<?php echo base_url(); ?>upload/<?php echo $gallery_details[0]['gallery_image_name'];?>" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
		      <img src="<?php echo base_url(); ?>upload/<?php echo $gallery_details[0]['gallery_image_name'];?>"/ class="img-responsive">
		      
		      
		      </a>
					</div>
					<div class="col-md-8">
                     	<?php echo $description; ?>
					</div>
                   
				</div>
			</div>
</div>


<?php include_once('footer.php');?>
<script src="<?php echo base_url(); ?>assets/gallery/main.js"></script>  
<script src="<?php echo base_url(); ?>assets/gallery/jquery.prettyPhoto.js"></script>
  <script>
  $(document).ready(function () 
  {


	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
  });
	
  </script>
