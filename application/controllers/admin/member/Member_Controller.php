<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			/*$this->load->helper('security');
			$this->load->library('form_validation');*/
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('upload');
			$this->load->model('admin/member/Member_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting();
		$config = array();
		$config["base_url"] = base_url() . "admin/member/";
		$total_row = $this->Member_Model->record_count();
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
               $arr['page_title']='Video';	 
               if($page>=1) 
				   $page=($page-1)*$config["per_page"];
               
			   $result['records'] = $this->Member_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/member/Member_View',$result);
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
               $arr['page_title']='Add Video';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/member/Add_Member_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	
	
	
	
	public function save()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 
		 if ($this->session->userdata('is_user_login')) 
		{
			
			
			 $arr = array(
							'name' => $this->input->post('name',false),							
							'designation' => $this->input->post('designation',false)
							/*'address' => $this->input->post('address',false),
							'phone' => $this->input->post('phone',false),
							'email' => $this->input->post('email',false)*/
							
						);
			  $result = $this->Member_Model->save($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
			  else		
				$data['sql_error']='sql error';
			  
			
			
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
			  $member_id=$this->input->post('member_id'); 
			  $result = $this->Member_Model->getdetails($member_id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['member_id']=$result['member_id'];
				$data['success']['name']=$result['name'];
				$data['success']['designation'] = $result['designation'];
				/*$data['success']['address']=$result['address'];
				$data['success']['phone']=$result['phone'];
				$data['success']['email']=$result['email'];*/
				
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
               $arr['page_title']='Edit Video';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/Member/Edit_Member_View',$result);
			  
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
			
             
			 $arr = array(
			                'member_id'=>$this->input->post('member_id'), 
							'name' => $this->input->post('name',false),
							'designation' => $this->input->post('designation',false)
							/*'address' => $this->input->post('address',false),							
							'phone'=> $this->input->post('phone'),
							'email'=> $this->input->post('email'),*/
						);
			  $result = $this->Member_Model->update($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
			  else		
				$data['sql_error']='sql error';
			  
			
			
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
			  $member_id=$this->input->post('member_id'); 
			  $result = $this->Member_Model->del($member_id);
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
		
		$config["base_url"] = base_url() . "admin/searchmember?s=".$s."";
		
		$total_row = $this->Member_Model->search_record_count($s);
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['page_query_string'] = True;
		$config['num_links'] = 2;
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
               $arr['page_title']='Video';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page) ||  !is_numeric($page))
				   $page=0;
			   $result['records'] = $this->Member_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/member/Search_Member_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
}
?>