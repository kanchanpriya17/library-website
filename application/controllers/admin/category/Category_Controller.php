<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/category/Category_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		 
		$config = array();
		$config["base_url"] = base_url() . "admin/category/";
		$total_row = $this->Category_Model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['use_page_numbers'] =true;
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
               $arr['page_title']='Category';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Category_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			
			   $this->load->view('admin/category/Category_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function addnew()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Add Category';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			   $this->load->view('admin/category/Add_Category_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	
	public function save()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			
			$error = $this->Category_Model->check_cat($this->input->post('title'));
			if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }				 
			else 
			{ 
			  $arr = array('title' => $this->input->post('title',false));
			  $result = $this->Category_Model->save($arr);
			   if ($result== TRUE) 
				  $data['success']=$result['success'];	 
			   else		
				$data['sql_error']='sql error';
			}
			
			echo json_encode($data);
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
			  $result = $this->Category_Model->getdetails($id);
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['title']=$result['title'];
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
               $arr['page_title']='Edit Category';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			   $this->load->view('admin/category/Edit_Category_View',$result);
			  
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
			
			$error = $this->Category_Model->check_cat2($this->input->post('title'),$this->input->post('id'));
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	 
			else 
			{
             
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'title' => $this->input->post('title',false)
						);
			  $result = $this->Category_Model->update($arr);
			   if ($result== TRUE) 
				  $data['success']=$result['success'];	 
			  else		
				$data['sql_error']='sql error';
			  
			}
			
			echo json_encode($data);
		}
		 else
		{
			 redirect('admin');
		}
	}
	
	public function del()
	{
		 $result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Category_Model->del($id);
			 if ($result == TRUE) 
				$data['success']=$result['success'];
			else
				$data['error']='FAILED !!!';
		
		    echo json_encode($data);
			  
		}
		else
		{
			 redirect('admin');
	 
		}
	}
	
	
	
}
?>