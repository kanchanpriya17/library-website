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

.gallery-part img:first-child {
    margin-bottom: 27px;
    display: block;
}




.gallery-part img 
{
    width: 100%;
}




</style>






<div class="header-bottom-area">
			<div class="container-fluid">
				<div class="row">
					<ul id="slider1" class="rslides">
				      <li><img style="height:300px;" src="<?php echo base_url()."upload/".$header_image.""; ?>" alt="images not found"></li>
				     
				    </ul>		
				</div>					
			</div>
		</div>
		
		
<!-- new slider -->

<div class="gallery-area">

<div class="container">

<div class="gallery-top">
					<h2 style="color:#000;">gallery</h2>
					<hr>
					<span></span>
				</div>

<div class="row">
<div class="col-lg-12">

<?php 
				if(isset($photo_gallery))
				{
						
					foreach($photo_gallery as $k=>$v)
					{
					
				     ?>	
<img src="<?php echo base_url()."upload/thumb/".$photo_gallery[$k]["gallery_image_name"]."";?>" alt="Image" class="img-responsive">


<?php
}
}	
?>
</div>
</div>
</div>
</div>

		
</div>
</div>		
<!--new slider -->

<!--

<div class="row">
<div class="col-lg-12">
<div class="gallery-area">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="gallery-part">
					
					<img src="">
					
					
						</div>						
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="gallery-part">
							
							
							
							
							
						</div>						
					</div>	
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="gallery-part">
							
							
							
							
							
						</div>						
					</div>											
				</div>	
			</div>
		</div>


</div>


</div>-->


<script>
			// For Demo purposes only (show hover effect on mobile devices)
			[].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>




<?php include_once('footer.php');?>