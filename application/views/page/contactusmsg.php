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



<!--new contact area start-->


<!--        slider starts-->
        
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url(); ?>assets/img/abthdr.jpg');;padding-top:45px; padding-bottom:45px;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 style="color:#fff;" class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a style="color:#fff;" href="http://srijanhomemakers.in/">Home  <i class="ion-ios-arrow-forward"></i></a></span> <span style="color:#fff;">Contact Us</span></p>
          </div>
        </div>
      </div>
    </section>





        <!--        Slider ends-->

        
    
        
<!--contactus-->
     <div class="contactus">
      <div class="container">
       <div class="row">
        <div class="col-md-12">
         <div class="details">
          <div class="details1">
            <h5>GET IN TOUCH</h5>	
            <p>We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question <br>about our services and projects we’re working on.</p>
		   </div>   
           <div style="text-align: inherit"class="detail_form">  
           <div class="row">
			   
			   <div class="col-md-4">
                    <div class="add">
						
                   <span> <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <p> <?php echo $settings[5]['value'];?></p>
                    
					  <br/>
                    
                    <span><i class="fa fa-mobile" aria-hidden="true"></i></span>
                    <p><?php echo $settings[1]['value'];?></p>               
                   
					  <br/>
                    
                   <span> <i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <p><?php echo $settings[0]['value'];?></p>                    
                    
					  <br/>
                      </div>
			   </div>
			   
             <div class="col-md-8">
<br><br>
				 <h1 style="color:green;text-align:center;font-weight:700;font-size:25px;">Your information is successful submitted!!
					 <br>We will contact You Soon.....</h1>
				 
				 
			 </div>
                  
                      </div>
                      
                
                   
                </div>
           
                
                
                
                
                </div>
            
            
            
            
            </div>
            
            
            
            
            </div>
        
        
        
        </div>
       <br/>
        
        

<!--new contact area end-->



<?php
include_once('footer.php');
?>
