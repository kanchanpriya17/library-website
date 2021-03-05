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
   
    .aboutdetails{
       margin:  3em 0;
    }
    .aboutimg img{
        width: 100%;
    }
    .content{
        padding: 15px 15px;
    }
    .vision{
        padding: 15px 15px; 
    }
    .quality{
        padding: 15px 15px; 
    }


</style>

<!-- about us details -->

<div class="aboutdetails">
     <div class="aboutus">
         <div class="container">
             <div class="row">
                <div class="col-md-8 content">
                   <h2><?php echo $sub_title;?></h2>
                    <p><?php echo $description;?></p>
                </div> 
                <div class="col-md-4">
                   <div class="aboutimg">
                    <img src="<?php echo base_url()."upload/".$header_image.""; ?>" alt="...">
                    <img src="<?php echo base_url()."upload/".$image.""; ?>" alt="...">
                    </div>
                </div>


             </div>
         </div>
     </div>


     <div class="vision" id="vision" >
         <div class="container">
             <div class="row">
                <div class="col-md-4">
                   <div class="aboutimg">
                       <img src="<?php echo base_url(); ?>upload/<?php echo $intro10[0]["post_image_name"]; ?>" alt="...">
                   </div>
                    
                </div>
                <div class="col-md-8 content">
                   <h2><?php echo $intro10[0]["post_title"]; ?></h2>
                    <p><?php echo $intro10[0]["post_description"]; ?></p>
                </div> 



             </div>
         </div>
     </div>

    <div class="quality" id="quality">
         <div class="container">
             <div class="row">

                <div class="col-md-8 content">
                   <h2><?php echo $intro11[0]["post_title"]; ?></h2>
                    <p><?php echo $intro11[0]["post_description"]; ?></p>
                </div> 

             </div>
         </div>
     </div>
</div>






















<!-- about us details end -->


<!--html footer area end-->

	<?php include('footer.php');  ?>