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
			   <h1>Car  Table</h1>
				<div id="header"></div>
				<div class="row">
					<div class="col-xs-12">	
						<div class="box box-primary">
							<div class="box-header">
								<p style="height:50px"></p>
								<div class="box-tools" style="margin-top:35px;">
									<div class="input-group">									
										<input type="text" name="table_search" class="form-control input-sm pull-right" id="txt_search" placeholder="Search By Brand"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default" id="btn_search"><i class="fa fa-search" ></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="box-body box box-primary table-responsive no-padding" id="box">
								<table class="table table-hover" >
									<tr style="background:#3c8dbc;color:#fff;">
										<th>Brand</th>
										<th>Model</th>
										<th>Price</th>
										<th>years</th>
										<th>condition</th>
										<th>Running</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
									</tr>
									<tbody id="grid">
									<?php 
									 if (isset($records))
									 {
										 $page=$_SERVER['REQUEST_URI'];
										 $page_arr=explode("/",$page);
										 $no= end($page_arr);
										 if($no==0)
										  $ctr=$no+1;
									     if($no>=1)
										 {
											$ctr=($no-1)*10;
											$ctr++;
										 }	
										 if($ctr==0)
										    $ctr=1;
										  
                                          foreach($records as $k=>$v)
										  {
											  if($k < sizeof($records)-1)
											  {
											?>
											<tr>
											    <td><?php echo $records[$k]['brand'];?></td>
												<td><?php echo $records[$k]['model'];?></td>
                                                <td><?php echo $records[$k]['selling_price']." $";?></td>
												<td><?php echo $records[$k]['years']." Yrs";?></td>
												<td><?php echo $records[$k]['condition'];?></td>
                                                <td><?php echo $records[$k]['running']." Km";?></td>
												<td><?php echo $records[$k]['seller_name'];?></td>
                                                <td><?php echo $records[$k]['seller_email'];?></td>
												<td><?php echo $records[$k]['seller_phone'];?></td>														
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
	
	 <script src="<?php echo base_url();?>assets/admin/script/seller/seller.js" type="text/javascript"></script>
<?php 
$this->load->view('admin/footer');
?>