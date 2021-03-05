<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('member/header');

	?>
     
	 <!-----------------------------RIGHT PART START--------------------------------------> 
    <div class="page-area">
		<div class="structure">
			<div class="page">
		       <h1>Change Password</h1>
			   <div class="page-left">
					<div class="reg-layout">
							<div class="contact-form">  
								<div id="msg-box" style="text-align:left;float:left"></div>
								<form name="frm_member" id="frm_member">
								
									<div>
										<label>Old Password</label>
										<input type="password" class="name" id="txt_old_password" name="txt_old_password" value=""  maxlength="20">
									</div>
									
									<div>
										<label>New Password</label>
										<input type="password" class="name" id="txt_password" name="txt_password" value=""  maxlength="20">
									</div>
									
									<div>
										<label>Confirm Password</label>
										<input type="password" class="email" id="txt_confirm_password" name="txt_confirm_password" value=""  maxlength="20">
									</div>
									
									
									
									<div class="change">
										 <label></label>
										<input type="button" value="Change" id="btn_change"/>
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
<script src="<?php echo base_url();?>assets/admin/script/changepassword.js" ></script>