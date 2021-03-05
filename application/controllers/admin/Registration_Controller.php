<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_Controller extends CI_Controller
{
	 public function __construct() 
	 {
			parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/Registration_Model');
			$this->load->library('email');
			
			
	 }
	
	
   public function register()
	{
		 
			$arr = array(
						'name' =>$this->input->post('txt_name'),
						'user_id'=>$this->input->post('txt_user_id'),						
						'email'=>$this->input->post('txt_email'),
						'phone_no'=>$this->input->post('txt_phone'),
						'mob_no'=>$this->input->post('txt_mob_no'),
						'password'=>$this->input->post('txt_password'),
						'country'=>$this->input->post('slct_country'),
						'address'=>$this->input->post('txt_address')
						);
						 
					     $result = $this->Registration_Model->register($arr);
						 if ($result['msg']!='') 
						  $data['msg']=$result['msg'];
					  
					     if ($result['error1']!='') 
						  $data['error1']=$result['error1'];
					  
					     if ($result['error2']!='') 
						  $data['error2']=$result['error2'];
					      
						
						 
					   
			echo json_encode($data);
	}
	
}
?>