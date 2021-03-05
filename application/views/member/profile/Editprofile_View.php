<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('member/header');

	?>
     <?php 
				if (isset($user_details))
				{
					$name=$user_details[0]['name'];
					$user_id=$user_details[0]['user_id'];
					$email=$user_details[0]['email'];
					$phone_no=$user_details[0]['phone_no'];
					$mob_no=$user_details[0]['mob_no'];
					$country_id=$user_details[0]['country'];
					$address=$user_details[0]['address'];
				}
				else
				{
					$name='';
					$user_id='';
					$email='';
					$phone_no='';
                    $mob_no='';
                    $address='';					
				}
		?>
	 <!-----------------------------RIGHT PART START--------------------------------------> 
 <div class="page-area">
		<div class="structure">
			<div class="page">
		       <h1>Edit Profile</h1>
			   <div class="page-left">
					<div class="reg-layout">
							<div class="contact-form">   
								<div id="msg-box" style="text-align:left;float:left;width:100%"></div>
								<form name="frm_member" id="frm_member">
									<div>
										<label>Name</label>
										<input type="text" class="name" id="txt_name" name="txt_name" value="<?php echo $name; ?>" placeholder="Name : " maxlength="50">
									</div>
									
									<div>
										<label>Email</label>
										<input type="text" class="email" id="txt_email" name="txt_email" value="<?php echo $email; ?>" placeholder="Email : " maxlength="200">
									</div>
									
									<div>
										 <label>Phone No.</label>
										<input type="text" class="phone" id="txt_phone" name="txt_phone" value="<?php echo $phone_no; ?>" placeholder="Phone no: " maxlength="10">
									</div>
									
									<div>
										 <label>Mobile No.</label>
										<input type="text" class="phone" id="txt_mob_no" name="txt_mob_no"  value="<?php echo $mob_no; ?>" placeholder="Mobile no: " maxlength="10">
									</div>
									
									
									
									<div>
										<label>Country</label>
										<select id="slct_country" name="slct_country" >
										<option value="">Select</option>
										<?php if (isset($countries))
										{
											foreach($countries as $k=>$v)
											{
											?>
											<?php if($countries[$k]['id']==$country_id){?>
											  <option value="<?php echo $countries[$k]['id'];?>" selected><?php echo $countries[$k]['country_name'];?></option>
											<?php }else{?>  
											 <option value="<?php echo $countries[$k]['id'];?>"><?php echo $countries[$k]['country_name'];?></option>
											<?php }?> 
											<?php 	
											}
										}?>		
										</select>
									</div>
									
									<div>
										<label>Address</label>
										<textarea class="comment" id="txt_address" name="txt_address" placeholder="Address : ">
											<?php echo strip_tags($address);?>
										</textarea>
									</div>
									
									<div class="update">
										 <label></label>
										<input type="button" value="Update" id="btn_update"/>
									</div>
								</form>
							</div>
							
					</div>
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
<script>var baseurl="<?php echo base_url();?>";</script>
<script src="<?php echo base_url();?>assets/admin/script/edit.js" ></script>