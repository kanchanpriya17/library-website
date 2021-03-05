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
				<h1>Expression Form Information</h1>
                    <a style="background-color:#3c8dbc;color:#fff;padding:2px 2px;font-size:18px;border:2px solid #3c8dbc;border-radius:3px;" id="downloadLink" onclick="exportF(this)">Download</a>
                    
				<div id="header"></div>
				<div class="row">
					<div class="col-xs-12">	
						<div class="box box-primary">
						<!--	<div class="box-header">
								<p style="height:50px"></p>
							<!--	<div class="box-tools" style="margin-top:35px;">-->
									<!--<div class="input-group">
										<input type="text" name="table_search" class="form-control input-sm pull-right" id="txt_search" placeholder="Search By Email"/>
										<div class="input-group-btn">
											<button class="btn btn-sm btn-default" id="btn_search"><i class="fa fa-search" ></i></button>
										</div>
									</div>-->
									
									
									
									
							<!--	</div>-->
						<!--	</div>-->
							<div class="box-body box box-primary table-responsive no-padding"  id="box">
								<table  id="table" class="table table-striped table-bordered  table-hover " >
									<tr style="background:#3c8dbc;color:#fff;">
										<th>Sl.no</th>
										<th>Date and Time</th>
										<th>Name</th>
										<th>Email</th>
									    <th>Mobile No</th>
										<th>Services</th>
										<th>Income</th>
										<th>Member</th>
									    <th>Address</th>
										<th>Native Place</th>
<!--										<th>Action</th>-->
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
												<!--<td><?php // echo $records[$k]['name'];?></td>-->
												<td><?php echo substr($records[$k]['date_time'],0,200);?></td>
											     <td><?php echo substr($records[$k]['name'],0,250);?></td>
                                                <td><?php echo substr($records[$k]['email'],0,250);?></td>
											     <td><?php echo substr($records[$k]['mobile'],0,250);?></td>
												<td><?php echo substr($records[$k]['service'],0,250);?></td>
												<td><?php echo substr($records[$k]['income'],0,250);?></td>
												<td><?php echo substr($records[$k]['member'],0,250);?></td>
												<td><?php echo substr($records[$k]['address'],0,250);?></td>
												<td><?php echo strip_tags(substr($records[$k]['addressone'],0,20)."...");?></td>
<!--												<td><span class='badge bg-maroon' id='btn_edit' onclick='del("<?php echo $records[$k]['interest_id']?>")'>Delete</span></td>-->
																								
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
	
	 <script src="<?php echo base_url();?>assets/admin/script/expression/expression.js" type="text/javascript"></script>


<script>
function exportF(elem) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls"); // Choose the file name
  return false;
}
</script>




<?php 
$this->load->view('admin/footer');
?>
