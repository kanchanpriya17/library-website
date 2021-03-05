<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Seller_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/seller/Seller_Model');
			$this->load->library('pagination');
		    $this->load->model('admin/Home_Model');
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/subscriber/";
		$total_row = $this->Seller_Model->record_count();
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
               $arr['page_title']='Subscriber';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Seller_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			
			   $this->load->view('admin/seller/Seller_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function add()
	{
	            $result['settings'] = $this->Home_Model->get_setting(); 		
			 
			   $arr = array(
			               'car_brand'=>$this->input->post('car_brand'),
						   'car_model'=>$this->input->post('car_model'),
						   'selling_price'=>$this->input->post('selling_price'),
						   'running'=>$this->input->post('running'),
						   'years'=>$this->input->post('years'),
						   'condition'=>$this->input->post('condition'),
						   'seller_name'=>$this->input->post('seller_name'),
						   'seller_phone'=>$this->input->post('seller_phone'),
						   'seller_email'=>$this->input->post('seller_email'),
			               );
			   $result = $this->Seller_Model->add($arr);
			   if ($result== TRUE) 
				  $data['success']=$result['msg'];	 
			   else		
				$data['error']='This is Email is Already Existing Please try another one';						
			
				echo json_encode($data);
	    
	
	}
	
	public function search()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$s=$this->input->get('s'); 
		
		$config["base_url"] = base_url() . "admin/searchseller?s=".$s."";
		
		$total_row = $this->Seller_Model->search_record_count($s);
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
               $arr['page_title']='Subscriber';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page))
				   $page=0;
			   $result['records'] = $this->Seller_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/seller/Search_Seller_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
	
}
?>