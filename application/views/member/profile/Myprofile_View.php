<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    $this->load->view('member/header');

	?>
     
	 <!-----------------------------RIGHT PART START--------------------------------------> 
    <?php 
				if (isset($user_details))
				{
					$name=$user_details[0]['name'];
					$user_id=$user_details[0]['user_id'];
					$email=$user_details[0]['email'];
					$phone_no=$user_details[0]['phone_no'];
					$mob_no=$user_details[0]['mob_no'];
					$country=$user_details[0]['country_name'];
					$address=$user_details[0]['address'];
				}
				else
				{
					$name='';
					$user_id='';
					$email='';
					$phone_no='';
                    $mob_no='';
					$country='';	
                    $address='';					
				}
	?>

	<div class="page-area">
		 <div class="structure">
			<div class="page">
		       <h1>My Profile</h1>
				<div class="page-left">
					<div class="account">
						<div class="alt"><label>Name  </label> <span><?php echo $name; ?></span></div>
						<div class="alt1"><label>User ID  </label> <span><?php echo $user_id; ?></span></div>
						<div class="alt"><label>Email  </label> <span><?php echo $email; ?></span></div>
						<div class="alt1"><label>Phone No.  </label> <span><?php echo $phone_no; ?></span></div>
						<div class="alt"><label>Mobile No.  </label> <span><?php echo $mob_no; ?></span></div>
						<div class="alt1"><label>Country  </label> <span><?php echo $country; ?></span></div>
						<div class="alt"><label>Address  </label> <span><?php echo $address; ?></span></div>
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
