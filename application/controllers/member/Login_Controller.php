<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{
	 public function __construct() 
	 {
			parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('member/Login_Model');
			$this->load->library('email');
			
			
	 }
	public function index()
	{
	 if ($this->session->userdata('member_is_user_login')) 
		redirect("member/myaccount");
	 else
	 {
	   $arr=array();	 
	   $result['settings'] = $this->Login_Model->get_setting();	  
	   if(empty ($result['records']))
			$result['records']=array();	
	   array_push($result['records'],$arr);
	   
	  $this->load->view('member/Login_View',$result);
	 }
	
	}
	
	public function login()
	{
		if($this->input->post('tag')=='login')
		{
		   if ($this->session->userdata('member_is_user_login')) 
				  {
					$this->dashboard();
				  } 
				  else 
				  {
				 
						$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|xss_clean');
						$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
						if ($this->form_validation->run() == FALSE) 
						 {
						   
							$data['error']['txt_user_name']=form_error('user_name') ;
							$data['error']['txt_password']=form_error('password');
						 } 
						else 
						{ 
							$arr = array(
							'user_name' => $this->input->post('user_name'),
							'password'=>$this->input->post('password')
							);
							 
						   $result = $this->Login_Model->login($arr);
						   if ($result == TRUE) 
						   {
							
							  $this->session->set_userdata('member_name',$result['name']);
							  $this->session->set_userdata('member_id',$result['id']);
							  $this->session->set_userdata('member_user_id',$result['user_id']);
							  $this->session->set_userdata('member_is_user_login',TRUE);
							  $data['success']='login';
							 
						   }	 
						   else
							 $data['failed']='Invalid User Name or Password !!!';
						}
				 }
				echo json_encode($data);
		}	
	}
	
	public function dashboard()
	{
		 if ($this->session->userdata('member_is_user_login')) 
		 {
			        
					redirect("member/myaccount");
					//header("location:".base_url()."member/dashboard");					
		 }
	    else
			$this->load->view('member/Login_View'); 
	}
	
	public function logout()
	{
			if($this->input->post('tag')=='logout')
		   {
				$this->session->unset_userdata('member_name');
				$this->session->unset_userdata('member_id');
				$this->session->unset_userdata('member_user_id');
				$this->session->unset_userdata('member_is_user_login');   
				$this->session->sess_destroy();
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
				$this->output->set_header("Pragma: no-cache");
				$data['logout']='Logout Successfully !!!';
				echo json_encode($data);
		  }	
	}
	
	
	
	
}
?>