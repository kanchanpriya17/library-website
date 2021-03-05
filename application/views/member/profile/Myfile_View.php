<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->view('member/header');

	?>
     
	 <!-----------------------------RIGHT PART START--------------------------------------> 
<div class="page-area">
		<div class="structure">
			<div class="page">
		       <h1>My Files</h1>
			    <div class="reg-layout" style="width:100%">
						<ul class="file-list">
						
						<?php 
						$ctr=0;
						if (isset($user_files) && !empty($user_files))
						{
							foreach($user_files as $k=>$v)
							{
								$dt = new DateTime($user_files[$k]['uploaded_date']);
				                $dt= $dt->format('d-m-Y');	
							?>
							  
							  <li>
							  <div class="altfile" style="border:1px solid gray"> 
							  <span>
									<audio controls poster="<?php echo base_url(); ?>assets/admin/images/audio.png">
									<source src="<?php echo base_url(); ?>upload_file/<?php echo $user_files[$k]['file_name'];?>" type="audio/mpeg">
									<source src="<?php echo base_url(); ?>upload_file/<?php echo $user_files[$k]['file_name'];?>" type="audio/ogg">
									
									
									</audio>
									<div style=" margin-top:10px;float:left;width:100%"><label>File Name:</label> <?php echo $user_files[$k]['file_title'];?></div>									
									
							  </span>
							  </div>
							  </li>
							  
							  
							
							<?php
											
							 $ctr++;
												 
							}
						}?>		
						
							
							
						</ul>	
				</div>
				
					<?php 
					    $ctr=1;
						$current=1;
						$lastpage=9999999999;
						$next=0;
						$len=$total_row;
						$total_page=ceil($len/3);
						$page=$_SERVER['REQUEST_URI'];
						$page_arr=explode("/",$page);
						$page=end($page_arr);
						if(is_numeric($page))
						$current=$page;
						if($page=='myfiles')
						$current=1;
					    if($current==0 || $current<0 || $current>99999)
							$current=1;
						echo "<div class='pagination'>";
						if($total_page>1)
						{
							for($i=$current;$i<=$total_page&&$ctr<=3;$i++)
							{

								if($i==$current)
								{
                                    $next=$i+1;
	                                $prev=$i-1;	
                                    if($prev>0)	
									    echo "<a href='".base_url()."member/myfiles/$prev'>Prev</a>";			
									echo "<span class='active' href='".base_url()."member/myfiles/$i'>".$i."</span>";
								}
								else
								echo "<a href='".base_url()."member/myfiles/$i'>".$i."</a>";
                             $ctr++;
                             $lastpage=$i; 							 
							}
							if($total_page>$lastpage)
								echo "<a href='".base_url()."member/myfiles/$next'>Next</a>";
						}
						echo "</div>"; 
					?>
            </div>				
		</div>
    </div>



	 <!-----------------------------RIGHT PART END--------------------------------------> 
	
<?php 
$this->load->view('member/footer');

?>
