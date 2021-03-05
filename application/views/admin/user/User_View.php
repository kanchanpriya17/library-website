<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Change Password</h1>
				<div id="header"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_save">Save</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_user" method="post" autocomplete="off">
								<div class="box-body">
								
								    <div class="form-group">
										<label>Enter Old Password</label>
										<input type="password" class="form-control" id="txt_old_password" name="txt_old_password" placeholder="Old Password" autocomplete="off">
									</div>
									
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" id="txt_admin_password" name="txt_admin_password" placeholder="New Password" autocomplete="off">
									</div>
									
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" class="form-control" id="txt_admin_confirm_password" name="txt_admin_confirm_password" placeholder="Confirm Password" autocomplete="off">
									</div>
									
								 </div>
							</form>
						</div>	
					</div>
					
					
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/user/user.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
