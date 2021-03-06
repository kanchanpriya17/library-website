<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Add Ongoing Projects</h1>
				<div id="header2"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_save">Save</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_slider" method="post" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" id="txt_title" placeholder="Enter Title">
									</div>
									<div class="form-group">
										<label >Image</label>
										 <input type="hidden" id="hid_upload" name="hid_upload" value=""/>
										 <input type="file" id="file_image" name="file_image">
										<!-- <button class="btn bg-purple btn-sm btn-flat margin" id="btn_upload">Upload</button>-->
									</div>
									<div class="form-group">
										<label >Description</label>
										<div id="editor">
																					
										</div>
									</div>
								 </div>
							</form>
						</div>	
					</div>
					
					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-header text-center">
								<h3 class="box-title">Thumbnail</h3>
							</div>
							<div id="img_preview" style="padding:10px">
							</div>
							
							
						</div>
					</div>
				</div>
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/services/addservices.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
