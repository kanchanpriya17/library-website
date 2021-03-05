<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Edit Video</h1>
				<div id="header2"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_update">Update</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_post" method="post" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" id="txt_name" placeholder="Enter Name" maxlength="500">
									</div>
                                     <div class="form-group">
										<label>Link</label>
										<input type="text" class="form-control" id="txt_designation" placeholder="Enter Link" maxlength="500">
									</div>
                                    
									<!--<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" id="txt_address" placeholder="Enter Adress"></textarea>
									</div>
									
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" id="txt_phone" placeholder="Enter Phone No." maxlength="12">
									</div>
                                    
                                    <div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" id="txt_email" placeholder="Enter Email" maxlength="500">
									</div>-->
								 </div>
							</form>
						</div>	
					</div>
					
					<div class="col-md-4">
							
					
						
					
					
				</div>
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/member/editmember.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
