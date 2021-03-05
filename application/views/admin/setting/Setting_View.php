<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');
?>
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Setting</h1>
				<div id="header"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_save">Save</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_setting" method="post" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">								
									   <div class="form-group">
										<label>Site Name</label>
										<input type="text" class="form-control" id="txt_site_name" name="txt_site_name" placeholder="Site Name">
									    </div>
									  <div class="form-group">	
										<label>Email</label>
										<input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Enter Email">
									  </div>									
									<div class="form-group">
										<label>phone</label>
										<input type="text" class="form-control" id="txt_phone" name="txt_phone" placeholder="Enter Phone no">
									</div>                                   
                                    <div class="form-group">
										<label>Mobile No</label>
										<input type="text" class="form-control" id="txt_mob_no" name="txt_mob_no" placeholder="Enter Mobile no">
									</div>

                                    

                                 <!--<div class="form-group">

										<label>Monday - Friday Timing</label>

										<input type="text" class="form-control" id="txt_timing1" name="txt_timing1" placeholder="Monday-Friday Timing">

									</div>

                                    

                                     <div class="form-group">

										<label>Saturday - Sunday Timing</label>

										<input type="text" class="form-control" id="txt_timing2" name="txt_timing2" placeholder="Saturday-Sunday Timing">

									</div>

                                    

                                     <div class="form-group">

										<label>Emergency Service</label>

										<input type="text" class="form-control" id="txt_timing3" name="txt_timing3" placeholder="Emergency Service">

									</div>-->

									

									<div class="form-group">
										<label>Facebook</label>
										<input type="text" class="form-control" id="txt_facebook" name="txt_facebook" placeholder="Enter Facebook Link">
									</div>
                                    
                                    <div class="form-group">
										<label>Vimeo</label>
										<input type="text" class="form-control" id="txt_vimeo" name="txt_vimeo" placeholder="Enter vimeo Link">
									</div>

																		

									

									<div class="form-group">
										<label>Twitter</label>
										<input type="text" class="form-control" id="txt_twitter" name="txt_twitter"  placeholder="Enter Twitter Link">
									</div>

									

									<div class="form-group">
										<label>Google Plus</label>
										<input type="text" class="form-control" id="txt_google" name="txt_google"  placeholder="Enter Google Link">

									</div>

									<!--  <div class="form-group">

										<label>Linkedin</label>

										<input type="text" class="form-control" id="txt_linkedin" name="txt_linkedin" placeholder="Enter Linkedin Link">

									</div>-->


									<!--<div class="form-group">

										<label>Youtube</label>

										<input type="text" class="form-control" id="txt_pinterest" name="txt_pinterest" placeholder="Enter Youtube Link">

									</div>-->
                                    
                                    <!--<div class="form-group">

										<label>Timing</label>

										<input type="text" class="form-control" id="txt_timing1" placeholder="Enter Timing">

									</div>

									

                                  
									<div class="form-group">

										<label>Linkedin</label>

										<input type="text" class="form-control" id="txt_google" placeholder="Enter Linkedin Link">

									</div>

									-->

									
									
									
									<!-- new files -->
								
									<div class="form-group">
										<label>Instagram</label>
										<input type="text" class="form-control" id="txt_instagram" name="txt_instagram"  placeholder="Enter Instagram Link">

									</div>
									
									
									 <div class="form-group">

										<label>Working time</label>

										<input type="text" class="form-control" id="txt_skype" name="txt_skype" placeholder="Enter Skype Link">

									</div>

									 <div class="form-group">
										<label>Linkedin</label>

										<input type="text" class="form-control" id="txt_linkedin" name="txt_linkedin" placeholder="Enter Linkedin Link">

									</div>
									<div class="form-group">

										<label>Pinterest</label>

										<input type="text" class="form-control" id="txt_pinterest" name="txt_pinterest" placeholder="Enter Pinterest Link">

									</div>
									<!--new files ends -->
									<div class="form-group">

										<label>Address</label>

										<textarea id="txt_address" name="txt_address" class="form-control"></textarea>

									</div>

									

									<div class="form-group">

										<label>Map</label>

										<textarea id="txt_map" name="txt_map" class="form-control"></textarea>

									</div>
									
									
									
								<!--	<div class="form-group">

										<label>Location</label>

										<input type="text" id="txt_location" name="txt_location" class="form-control" placeholder="Enter Location">

									</div>-->

								<!--	<div class="form-group">

										<label>Opening Hours</label>

										<input type="text" id="txt_ohours" name="txt_ohours" class="form-control" placeholder="Enter Opening Hours">

									</div>-->
									
								<!--	<div class="form-group">

										<label>Happy Hours</label>

										<input type="text" id="txt_hhours" name="txt_hhours" class="form-control" placeholder="Enter Happy Hours">

									</div>
									
									-->
									
									
									
						<!--	<div class="form-group">

										<label>Enter Twitter Wiget Url</label>

										<input type="text" id="txt_twitterwiget" name="txt_twitterwiget" class="form-control" placeholder="Enter Happy Hours">

									</div>
									-->
									<!--<a class="twitter-grid" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw">National Park Tweets</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
									
									-->
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									

									

								 </div>

							</form>

						</div>	

					</div>

					

					

			</section>

      </div>

	

	 <script src="<?php echo base_url();?>assets/admin/script/setting/setting.js" type="text/javascript"></script>

<?php 

$this->load->view('admin/footer');



?>

