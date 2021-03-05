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

		<!-- client-area start -->
		 <div class="client-area">
		 	 <div class="container">
		 	 	 <div class="client-top">
		 	 	 	 <h2><?php echo $intro7[0]["post_title"]; ?></h2>
		 	 	 	 <span></span>
		 	 	 	 <p><?php echo $intro7[0]["post_description"]; ?></p>
		 	 	 </div>
		 	 	 <div class="row">
                 
                     
                     <?php
                     if(isset($award)&& !empty($award)){
                         foreach($award as $k=>$v){
                             
                        
                     
                     ?>
                   
		 	 	 	 <div class="col-md-6 col-lg-3">
		 	 	 	 	 <div class="client-part">
		 	 	 	 	 	 <a href="#">
		 	 	 	 	 	 	<img src="<?php echo base_url(); ?>upload/<?php echo $award[$k]["award_image_name"]; ?>" alt="images not found" />
		 	 	 	 	 	 </a>
		 	 	 	 	 </div>
		 	 	 	 </div>
		 	 	 	 <?php 
                             
                        }
                     }
                     
                     
                     
                     ?>
		 	 	 	 
		 	 	 
		 	 	 	
		 	 	 </div>
		 	 </div>
		 </div>
		<!-- client-area end -->

<?php
include("footer.php");

?>