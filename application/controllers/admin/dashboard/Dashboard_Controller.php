<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_Controller extends CI_Controller 
{
	 public function __construct()	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/Home_Model');
    }
	public function index()
	{
	   $result['settings'] = $this->Home_Model->get_setting(); 		
	   if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Dashboard';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			  $this->load->view('admin/dashboard/Dashboard_View',$result);
	    }
        else
	      redirect('admin');		
	 
	
	}
	
	
	
}
?>