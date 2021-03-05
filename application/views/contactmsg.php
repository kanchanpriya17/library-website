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

    .contactus{
        margin: 3em 0;
        overflow-x: hidden;
    }
    .mapimg img {
        width: 100%;
    }
</style>
       
<!--contactus-->
   <div class="contactus">
       <div clas="container">
         <div class="row">
              <div class="col-md-4">
              <div class="mapimg">
                  <img src="<?php echo base_url(); ?>assets/img/tags1.png" alt="..."/>
              </div>
          </div>
          <div class="col-md-8">
              <div class="contactform">
                   <h3><?php echo $intro12[0]["post_title"]; ?></h3>
                   <p><?php echo $intro12[0]["post_description"]; ?></p>
                  <h1 style="color: green; font-size: 25px; ">Your message has been send successfully </h1>
              </div>
          </div>
         </div>
         
          
           
       </div>
   </div>
<!--new contact area end-->



<?php
include_once('footer.php');
?>
