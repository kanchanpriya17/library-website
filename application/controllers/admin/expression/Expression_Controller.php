<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expression_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/expression/Expression_Model');
			$this->load->library('pagination');
		    $this->load->model('admin/Home_Model');
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/expression/";
		$total_row = $this->Expression_Model->record_count();
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
               $arr['page_title']='Enquiry';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Expression_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			
			   $this->load->view('admin/expression/Expression_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function add()
	{
	            $result['settings'] = $this->Home_Model->get_setting(); 		
			   /*$arr = array('name' => $this->input->post('name'),'email'=>$this->input->post('email'));*/
			   $arr = array('email'=>$this->input->post('email'));
			   $result = $this->Expression_Model->add($arr);
			   if ($result== TRUE) 
				  $data['success']=$result['msg'];	 
			   else		
				$data['error']='This is Email is Already Existing Please try another one';						
			
				echo json_encode($data);
	    
	
	}
	
	
	
	public function del()

	{

		 if ($this->session->userdata('is_user_login')) 

		{

			  $id=$this->input->post('id'); 

			  $result = $this->Expression_Model->del($id);

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
		
		$config["base_url"] = base_url() . "admin/searchexpression?s=".$s."";
		
		$total_row = $this->Expression_Model->search_record_count($s);
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
               $arr['page_title']='Enquiry'; 
               
               $page=$this->input->get('per_page');
			   if(!isset($page))
				   $page=0;
			   $result['records'] = $this->Expression_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/expression/Search_Expression_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
	
}
?>