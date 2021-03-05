<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_Controller extends CI_Controller 
{
	 public function __construct()	 
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('member/Dashboard_Model');
		   
    }
	public function index()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='My Account';	
               $result['user_details'] = $this->Dashboard_Model->get_user_details($this->session->userdata('member_id')); 
               $result['msg'] = $this->Dashboard_Model->msg(); 			   
               $result['settings'] = $this->Dashboard_Model->get_setting();			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);                
			  $this->load->view('member/dashboard/Dashboard_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
	
	
}
?>