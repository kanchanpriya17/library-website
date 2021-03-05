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


<!--new about area code start-->


<!--About Code Start-->
		
		<div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about1">
                            <h1>Expression of Interest</h1>
                            <a href="#"><p>Home</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
		
<!--	About code End	-->
		
		
		
<!--expression area start-->
		<div class="expr">
			<div class="container">
				<div class="expr1">
				<h1>Help Us To Understand Your Requirements In A Better Way</h1>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="expt2">
								<h1 style="color:green;font-size:25px;text-align:center;font-weight:700;">Thank You!! <br> Our Representative will contact You Soon...</h1>
						</div>
					</div>
					<div class="col-md-4">
						<div class="expt3">
						<img src="<?php echo base_url(); ?>assets/img/abtd.png" alt="image not found"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<!--	expression area end	-->
		
		





<!--html footer area end-->

	<?php include('footer.php');  ?>