<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/Home_Model');
			$this->load->model('admin/user/User_Model');
		   
    }
	public function index()
	{
		
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='Change Password';	 
			   if(empty ($result['records']))
					$result['records']=array();	 
			   array_push($result['records'],$arr);
			   $this->load->view('admin/user/User_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function loadsetting()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{ 
              $result = $this->Setting_Model->getall(); 
			  echo json_encode($result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function update()
	{   
	     $result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
          
          $result=$this->User_Model->checkpassword($this->input->post('old_pass'));		 
          if($result)
          {		  
   		  $arr = array(
						'password' => $this->input->post('pass')
						);
						 
					   $result = $this->User_Model->update($arr);
					   if ($result == TRUE) 
						  $data['success']=$result['success'];	 
					   else
						 $data['error']='FAILED !!!';
		  }
		  else
		  {
		    $data['error']='Wrong Password !!!';
		  }
		 echo json_encode($data);
			
		}
		 else
		{
			 redirect('admin');
		}
	}
	
	
	
}
?>