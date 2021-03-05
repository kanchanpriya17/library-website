<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_Controller extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('admin/Home_Model');
	}
	public function index()
	{
		 
			$arr=array();
			$arr['page_title']='404';

            $result['menu'] = $this->Home_Model->menu();
			$result['submenu1'] = $this->Home_Model->submenu(19);
			$result['submenu2'] = $this->Home_Model->submenu(21);
			$result['submenu3'] = $this->Home_Model->submenu(22);
			$result['submenu4'] = $this->Home_Model->submenu(24);
			$result['submenu5'] = $this->Home_Model->submenu(25);
			$result['submenu6'] = $this->Home_Model->submenu(52);
			$result['submenu7'] = $this->Home_Model->submenu(53);

            $result['settings'] = $this->Home_Model->get_setting();			
			$result['msg'] ='Page Not Found' ;
									
			 if(empty ($result['records']))
						$result['records']=array();	
			 array_push($result['records'],$arr);
			 
			$this->load->view('errors/404_View',$result);
		 
	}
	
	
}
?>