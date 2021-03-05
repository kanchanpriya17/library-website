<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('member/header');

	?>
  <style>

#progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
#percent { position:absolute; display:inline-block; top:3px; left:48%; }
.hide{display:none;}
#message{text-align:center;}
</style>   
	 <!-----------------------------RIGHT PART START--------------------------------------> 
    <div class="page-area">
		<div class="structure">
			<div class="page">
		       <h1>Add Audio Files</h1>
			   <div class="page-left">
					<div class="reg-layout">
							<div class="contact-form">					
								<div id="msg-box" style="text-align:left;float:left;width:100%"></div>
								<?php if($user_details[0]['approved']=='2'){echo "<p>your approval has been canceled by admin of this site</p>";}?>
								<?php if($user_details[0]['approved']=='0'){echo "<p>you are not approved by admin of this site</p>";}?>
								<?php if($user_details[0]['approved']=='1'){ ?>
								<form action="<?php echo base_url();?>uploadfile" name="frm_file" id="frm_file" method="post" enctype="multipart/form-data">
									<!--<div>
										<label>Audio Title</label>
										<input type="text" class="name" id="txt_file_title" name="txt_file_title" value="" placeholder="Audio Title : " maxlength="100">
									</div>-->
																											
									<div>
										<label>Choose File</label>
										<input type="file" class="name" id="file" name="file" />
										<input type="hidden" id="hid_upload" name="hid_upload"/>
										<input id="submit" type="submit" value="Upload" disabled="disabled">
										
										<div id="progress" class="hide">
											<div id="bar"></div>
											<div id="percent">0%</div >
										</div>
										
										<div id="message"></div>
									</div>
									
									<!--<div>
										<label>Description</label><br/>
										<label>(max: 500 characters)</label>
										<textarea class="comment" id="txt_description" name="txt_description" placeholder="Description : " maxlength="500">
											
										</textarea>
									</div>-->
									
									<!--<div class="add">
										 <label></label>
										<input type="button" value="Add" id="btn_add" disabled="disabled"/>
									</div>-->
								</form>
								 <?php } ?>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/script/custom.js"></script>
<script src="<?php echo base_url();?>assets/admin/script/addvideo.js" ></script>