<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

?>

	  
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_form">
				<h1 id="form_header">Add Other Product</h1>
				<div id="header2"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-footer ">
								<button class="btn btn-primary btn-flat" id="btn_save">Save</button>
								<button  class="btn btn-primary btn-flat" id="btn_cancel">Cancel</button>
							</div>
							<form id="frm_post" method="post" enctype="multipart/form-data">
								<div class="box-body">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" id="event_name" name="event_name" placeholder="Enter Title">
									</div>
									<!--<div class="form-group">
										<label>DOB</label>										
										<input class="datepicker form-control" type="text" id="event_date" name="event_date"  data-date-format="dd/mm/yyyy" placeholder="Enter DOB" >
									</div>-->
									<div class="form-group">
										<label>Sub Title</label>
										<input type="text" class="form-control" id="event_time" name="event_time" placeholder="Enter Sub Title">
									</div>
									<!--<div class="form-group">
										<label>Mobile No.</label>
										<input type="text" class="form-control" id="event_venue1" name="event_venue1" placeholder="Enter Mobile No.">
									</div>-->
									<!--<div class="form-group">
										<label>Password</label>
										<input type="text" class="form-control" id="event_venue" name="event_venue" placeholder="Enter Password">
									</div>-->
									<input type="hidden" id="hid_upload" name="hid_upload" value=""/>
								
									<!--<div class="form-group">
										<label>Teams</label>
										<input type="text" class="form-control" id="event_venue2" name="event_venue2" placeholder="Enter Teams">
									</div>-->
									<div class="form-group">
										<label >File</label>
										 <input type="hidden" id="hid_upload" name="hid_upload" value=""/>
										 <input type="file" id="file_image" name="file_image">
										<button class="btn bg-purple btn-sm btn-flat margin" id="btn_upload">Upload</button>
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
						<!--<div class="row">
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
					-->
						<div class="row">
							<div class="box box-primary">
								<div class="box-header text-center">
									<h3 class="box-title" >Thumbnail</h3>
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
	
	 <script src="<?php echo base_url();?>assets/admin/script/brand/addbrand.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');

?>



<!--
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function()
	{	       
        $('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
		    autoclose: true,
		});
	});	
</script>-->