<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Edit Notification</h1>
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
										<label>Notification Title</label>
										<input type="text" class="form-control" id="txt_name" placeholder="Enter Notification Title" maxlength="500">
									</div>
									<div class="form-group">
										<label>Notification Description</label>
										<input type="text" class="form-control" id="txt_designation" placeholder="Enter Notification Description">
									</div>
									
									
								 </div>
							</form>
						</div>	
					</div>
					
					<!--<div class="col-md-4">
						<div class="row">
							<div class="box box-primary">
								<div class="box-header" >
									<h3 class="box-title" >Select STaff Type</h3>
									<div class="form-group">
											<select class="form-control" id="slct_type">
                                            
                                            </select>
									</div>
								</div>
							</div>
						</div>	
					
						
					
					
				    </div>-->
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/staff/editstaff.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
