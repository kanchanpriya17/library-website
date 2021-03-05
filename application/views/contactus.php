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
                    <form action="<?php echo base_url(); ?>Home_Controller/contact" method="post" role="form"  enctype="multipart/form-data">
                            <input type="text" name="user_name" class="form-control" placeholder="Enter Your Name" required/><br>
                             <input type="email" name="user_email" class="form-control" placeholder="Enter Your Email Id" required/><br>
                             <input type="text" name="user_mobile" class="form-control" placeholder="Enter Your Mobile No" required/><br>
                              <textarea name="user_message"  class="form-control" rows="6" cols="15" required="required" placeholder="Message"></textarea><br>
                              <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">Send Message</button>

                  </form>
              </div>
          </div>
         </div>
         
          
           
       </div>
   </div>
<!--new contact area end-->



<?php
include_once('footer.php');
?>
