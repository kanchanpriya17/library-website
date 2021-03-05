
<!--new slider-->



		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		      
		       <?php 
			$tmpctr=0;
			if (isset($slider) && !empty($slider) )
			{			   		
				foreach($slider as $k=>$v)
				{
					if($tmpctr==0)
						$class="active";
					else
						$class="";
			 ?>
		    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $tmpctr; ?>" class="<?php echo $class; ?>"></li>
		   
			<?php
					$tmpctr++;
				}
			    }	
		     	?>
            
		      
		    <!--<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>-->
		    <!--<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>-->
		    <!--<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>-->
		  </ol>
		  <div class="carousel-inner">
		      
		       <?php 
			$ctr=1;
			if (isset($slider) && !empty($slider) )
			{			   		
				foreach($slider as $k=>$v)
				{
					
					if($ctr==1)
						$class="active";
					else
						$class="";	
			 ?>
		      
		    <div class="carousel-item <?php echo $class; ?>">
		      <img src="<?php echo base_url(); ?>upload/<?php echo $slider[$k]["image_name"]; ?>" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-lg-block">
				  
				  <div class="sldrtxt">
				  	<h1><?php echo $slider[$k]["title"]; ?></h1>
					  <h2><?php echo $slider[$k]["sub_title"]; ?></h2>
					  <p><?php echo $slider[$k]["description"]; ?></p>
					  <div class="sdr-btn">
		 	 	 	 <a href="#">Read More</a>
		 	 	 </div>
				  </div>
				  

		      </div>
		    </div>
		    
		    <?php
					$ctr++;
                    }
		       	    }	
			       ?>
		    
		    <!--<div class="carousel-item">-->
		    <!--  <img src="<?php echo base_url(); ?>assets/ast/img/banarimg.png" class="d-block w-100" alt="...">-->
		    <!--  <div class="carousel-caption d-none d-lg-block">-->
		    <!--     <div class="sldrtxt">-->
				  <!--	<h1>WELCOME TO</h1>-->
					 <!-- <h2>Srijan Homemakers</h2>-->
					 <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>-->
					 <!--<div class="sdr-btn">-->
		 	 	<!-- 	 <a href="#">Read More</a>-->
		 	 	<!-- </div>-->
				  <!--</div>-->
		     
		    <!--  </div>-->
		    <!--</div>-->
		    <!--<div class="carousel-item">-->
		    <!--  <img src="<?php echo base_url(); ?>assets/ast/img/banarimg1.png" class="d-block w-100" alt="...">-->
		    <!--  <div class="carousel-caption d-none d-lg-block">-->
		    <!--  <div class="sldrtxt">-->
				  <!--	<h1>WELCOME TO</h1>-->
					 <!-- <h2>Srijan Homemakers</h2>-->
				  <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>-->
				  <!--<div class="sdr-btn">-->
		 	 	<!-- 	 <a href="#">Read More</a>-->
		 	 	<!-- </div>-->
				  <!--</div>-->
				  
		    <!--  </div>-->
		    <!--</div>-->
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		
<!--	slider area end	-->
<!--new slider end-->

