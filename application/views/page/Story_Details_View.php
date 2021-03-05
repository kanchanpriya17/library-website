<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('header.php');
?>
<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
<link rel="stylesheet" href="<?php echo base_url(); ?>myassets/css/style.css">
<style>
.header-area
{
	border-bottom:1px solid #092650;
}
</style>
<div class="wrapper">
        
		<!--=== Container Part ===-->
		<div class="container content-sm">
			<div class="headline-center margin-bottom-60">               
				<h2><?php echo $services[0]['gallery_title'];?></h2>
				<div class="lead">
                   <?php //echo $award_details[0]['award_sub_title'];?>
                </div>
			</div>
            <div class="divider">
                    <i class="fa fa-chevron-down"> </i>
           </div>
				<div class="row">
                <?php if($services[0]['gallery_image_name']!=''){?>
					<div style="padding-bottom: 6px;" class="col-md-4 md-margin-bottom-50" id="service">						 							
		          <img src="<?php echo base_url(); ?>upload/<?php echo $services[0]['gallery_image_name'];?>"/ class="img-responsive">                            							
					</div>
					<div class="col-md-8">
                     <?php echo $services[0]['gallery_description'];?>
					</div>
                    <?php } else {?>
                    <div class="col-md-8 col-md-offset-2" style="text-align:center">
                     		<?php echo $services[0]['gallery_description'];?>
					</div>
                    <?php } ?>
				</div><!--/end row-->
			</div>
			<!--=== End Container Part ===-->

			

               
                
                							
</div><!--/wrapper-->

<!--........news-block End........-->
<?php include_once('footer.php');?>

