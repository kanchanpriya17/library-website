<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Add Video Category</h1>
				<div id="header2"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_save">Save</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_category" method="post">
								<div class="box-body">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" id="txt_title" placeholder="Enter Title">
									</div>
								 </div>
							</form>
						</div>	
					</div>
					
					
				</div>
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/video-category/addvideocategory.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
