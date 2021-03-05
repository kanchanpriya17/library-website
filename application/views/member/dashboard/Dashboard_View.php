<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
   $this->load->view('member/header');

	?>
     <style>
	 span
	 {
		color: #0082b2;				
		font-family: myFirstFont;		
		font-size: 20px;		
	 }
	 h2
	 {
		 border-bottom:1px solid #0082b2 !important;		
	 }
	 </style>
	 <!-----------------------------RIGHT PART START--------------------------------------> 
     <div class="page-area">
		 <div class="structure">
			<div class="page">
			    <div class="page-left">
				<?php if (isset($user_details))
						  {
							 echo "<h2>Welcome  <span>".$user_details[0]['name']."</span></h2>";
						  }		
                ?> 
                
				

					<p>
					<?php if (isset($msg))
						  {
							 echo $msg[0]['post_description'];
						  }	?>
					</p>

				</div>
				<div class="page-right">
				 <img src="<?php echo base_url(); ?>upload/<?php echo $settings[9]['value']; ?>" alt="Image" />							
				</div>

			</div>
		 </div>
    </div>	
	 <!-----------------------------RIGHT PART END--------------------------------------> 
	
<?php 
$this->load->view('member/footer');

?>
