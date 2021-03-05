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












<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()."upload/".$header_image.""; ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Projects</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Projects <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>






























<!--html projects area start-->



<section id="portfolio"  class="section-bg" >
      <div class="container">

        <!--<header class="section-header">
          <h3 class="section-title">Our PROJECTS</h3>
        </header>-->

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">ONGOING PROJECTS</li>
              <li data-filter=".filter-card">UPCOMING PROJECTS</li>
              <li data-filter=".filter-web">COMPLETED PROJECTS</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

                     <?php 
			   if(isset($service))
			   {
			   foreach($service as $k=>$v)
			   {
			   ?>
        

            
            
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()."upload/thumb/".$service[$k]["image_name"];?>" class="img-fluid" alt="">
                <a href="<?php echo base_url()."upload/".$service[$k]["image_name"];?>" data-lightbox="portfolio" data-title="<?php echo $service[$k]['title'];?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#"><?php echo $service[$k]['title'];?></a></h4>
                <!--<p>App</p>-->
              </div>
            </div>
          </div>
            
            
            <?php
			   }
			   }
             
             ?>
            

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/web3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Completed Projects</a></h4>
                
              </div>
            </div>
          </div>-->

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/app2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ongoing Projects</a></h4>
                
              </div>
            </div>
          </div>-->

            
         <?php 
			   if(isset($test))
			   {
			   foreach($test as $k=>$v)
			   {
			   ?>
        
            
            
          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()."upload/thumb/".$test[$k]["test_image"];?>" class="img-fluid" alt="">
                <a href="<?php echo base_url()."upload/".$test[$k]["test_image"];?>" class="link-preview" data-lightbox="portfolio" data-title="<?php echo $test[$k]['test_title'];?>" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#"><?php echo $test[$k]['test_title'];?></a></h4>
                <!--<p>Upcoming Projects</p>-->
              </div>
            </div>
          </div>
            
            
             <?php
			   }
			   }
             
             ?>
            

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/web2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Completed Projects</a></h4>
                
              </div>
            </div>
          </div>-->

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/app3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Ongoing Projects</a></h4>
                
              </div>
            </div>
          </div>-->

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/card1.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Upcoming Projects</a></h4>
                
              </div>
            </div>
          </div>-->

          <!--<div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/card3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Upcoming Projects</a></h4>
                
              </div>
            </div>
          </div>-->

                <?php 
			   if(isset($equipment))
			   {
			   foreach($equipment as $k=>$v)
			   {
			   ?>
        
            
          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?php echo base_url()."upload/".$equipment[$k]["equipment_image_name"];?>" class="img-fluid" alt="">
                <a href="<?php echo base_url()."upload/".$equipment[$k]["equipment_image_name"];?>" class="link-preview" data-lightbox="portfolio" data-title="<?php echo $equipment[$k]['equipment_title'];?>" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#"><?php echo $equipment[$k]['equipment_title'];?></a></h4>
                <!--<p>Web</p>-->
              </div>
            </div>
          </div>
            
            
            <?php
			   }
			   }
             
             ?>
            

        </div>

      </div>
    </section><!-- #portfolio -->
      
    </main>



<!-- html projects area end-->


<?php
include_once('footer.php');
?>
