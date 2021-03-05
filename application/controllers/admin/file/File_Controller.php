<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class File_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('upload');
			$this->load->model('admin/file/File_Model');
			$this->load->library('pagination');
			 $this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 	
		$config = array();
		$config["base_url"] = base_url() . "admin/file/";
		$total_row = $this->File_Model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['use_page_numbers'] =true;
		$config['num_links'] =2;
		$config['cur_tag_open'] = ',';
		$config['cur_tag_close'] = '';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3)) ;
		}
		else
		{
			$page =0;
		}
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='File';	 
               if($page>=1) 
				   $page=($page-1)*$config["per_page"];
               
			   $result['records'] = $this->File_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/file/File_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
					
	public function getdetails()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 	 
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->File_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['file_title']=$result['file_title'];
				$data['success']['description']=$result['description'];	
                $data['success']['file_name']=$result['file_name'];               
				$data['success']['approved']=$result['approved'];		
								
				
			}	 
			else
				$data['error']='FAILED !!!';
		
		    echo json_encode($data);
			  
		}
		else
		{
			 redirect('admin');
	 
		}
		
	}
	
	public function edit()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 	
	    if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Edit File';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/file/Edit_File_View',$result);
			  
		}
		else
		{
			 
			 redirect('admin');
	 
		}
	}
	
	
	public function del()
	{
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->File_Model->del($id);
			 if ($result == TRUE) 
			{
				$data['success']=$result['success'];
				
			}	 
			else
				$data['error']='FAILED !!!';
		
		    echo json_encode($data);
			  
		}
		else
		{
			 redirect('admin');
	 
		}
	}
	
	
	public function search()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 	 
		$config = array();
		$s=$this->input->get('s'); 
		
		$config["base_url"] = base_url() . "admin/searchfile?s=".$s."";
		
		$total_row = $this->File_Model->search_record_count($s);
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['page_query_string'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = ',';
		$config['cur_tag_close'] = '';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3)) ;
		}
		else
		{
			$page =0;
		}
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='File';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page))
				   $page=0;
			   $result['records'] = $this->File_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/file/Search_File_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
}
?>