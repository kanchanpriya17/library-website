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
								<button class="btn btn-primary btn-flat" id="btn_update">update & Approve</button>
								<button class="btn btn-primary btn-flat" id="btn_update1">update & Disapprove</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_post" method="post" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" id="txt_title" placeholder="Enter Title">
									</div>
									
									
									<div class="form-group">
										<label >Description</label>
										<textarea id="txtEditor"></textarea> 
									</div>
								 </div>
							</form>
						</div>	
					</div>
					
					<div class="col-md-4">
						<div class="row">
							<div class="box box-primary">
								<div class="box-header" >
									<h3 class="box-title" >Select Category</h3>
									<div class="form-group">
											<select class="form-control" id="slct_cat">
											</select>
									</div>
								</div>
							</div>
						</div>	
					
						<div class="row">
							<div class="box box-primary">
								<div class="box-header text-center">
									<h3 class="box-title" >video</h3>
									<div class="form-group">
											<div id="img_preview" style="padding:10px">	
                                               
										   </div>	
									</div>
								</div>
							</div>
						</div>	
					
					
				</div>
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/video/editvideo.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>
