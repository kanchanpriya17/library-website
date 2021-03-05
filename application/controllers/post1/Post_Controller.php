<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Controller extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin/Post_Model');
		$this->load->model('admin/Page_Model');
	}
	public function index()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $post_id= end($post_arr);
		 if(is_numeric( $post_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['settings'] = $this->Post_Model->get_setting();
				$result['post_details'] = $this->Post_Model->get_post_details($post_id);
				$result['service'] = $this->Page_Model->get_post_by_cat_service(23,50,'asc');
			    $arr['page_title']=$result['post_details'][0]['post_title'];
				
				
				if(empty ($result['records']))
					$result['records']=array();	
			     array_push($result['records'],$arr);
				$this->load->view('Post1_View',$result);
		 }
		 
	
	
    }
}
