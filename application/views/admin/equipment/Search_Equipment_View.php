<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('admin/header');

	?>
 <style> 
#txt_search
{
	width:150px;
} 
#btn_edit
{
	cursor:pointer;
}
#div_pagination li:nth-child(1) a:nth-child(1)
{
	display:none;
}		 
@media (max-width:320px)
{
	#txt_search
	{
		width:100%;
		margin-top:15px;
		float:left !important;
		margin-left:10px;
		
	}  
	#box
	{
		 margin-top:30px;
	
	}
	#btn_search
	{
		margin-top:14px;
		
		
	}		
} 
 </style>
	
      <div class="content-wrapper" id="div_main">
				<section class="content-header" id="slider_tbl">
				<h1>Search Our Equipment</h1>
				<div id="header"></div>
				<div class="row">
					<div class="col-xs-12">	
						<div class="box box-primary">
							<div class="box-header">
								<!--<p><button class="btn btn-primary btn-md btn-flat margin" id="btn_add">Add New</button></p>-->
								<div class="box-tools" style="margin-top:35px;">
									<div class="input-group">
									<!--	<input type="text" name="table_search" class="form-control input-sm pull-right" id="txt_search" placeholder="Search By Title"/>-->
									
									<!--	<div class="input-group-btn">
											<button class="btn btn-sm btn-default" id="btn_search"><i class="fa fa-search" ></i></button>
										</div>-->
										
									</div>
								</div>
							</div>
							
							<div class="box-body box box-primary table-responsive no-padding" id="box">
								<table class="table table-hover" >
									<tr style="background:#3c8dbc;color:#fff;">
									
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile Number</th>
										<th>Message</th>
									<!--	<th>Action</th>-->
									</tr>
									<tbody id="grid">
									<?php 
									 if (isset($records))
									 {
										 $page=$_SERVER['REQUEST_URI'];
										 $page_arr=explode("&",$page);
										 $page_arr=explode("=",$page);
										 $no= end($page_arr);
										 if(!is_numeric($no))
											$ctr=1;
                                         else
                                           	$ctr=$no+1;										 
									    																					 											 																	
                                          foreach($records as $k=>$v)
										  {
											  if($k < sizeof($records)-1)
											  {
											?>
											<tr>
											    <td><?php echo $ctr++; ?></td>
												<td><?php echo $records[$k]['id']; ?></td>
												<td><?php echo substr($records[$k]['name'],0,20)."...";?></td>
												<td><?php echo substr($records[$k]['email'],0,20)."...";?></td>
												<td><?php echo substr($records[$k]['mobile'],0,20)."...";?></td>
												<td><?php echo strip_tags(substr($records[$k]['message'],0,20)."...");?></td>
								<!--<td><span class='badge bg-green' id='btn_edit' onclick='edit("<?php /* echo $records[$k]['award_id'] */ ?>")'></span></span>
								<span class='badge bg-maroon' id='btn_edit' onclick='del("<?php /* echo $records[$k]['id'] */ ?>")'>Delete</span></td>-->
											</tr>
                                          <?php	
                                              }										  
										  }
									 }		   

									?>
									</tbody>
								</table>
								<div class="box-footer ">
										<ul class="pagination" id="div_pagination">
										<?php 
										if(!empty($links))
										{
											foreach ($links as $link) 
											{
												    
													  echo "<li class='pagination_button'><a>". $link."</a></li>";
											}
										}									
										?>
										</ul>
							    </div>
							</div>
						</div>
					</div>
				</div>	
			</section>
      </div>
	
	 <script src="<?php echo base_url();?>assets/admin/script/equipment/equipment.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');
?>
