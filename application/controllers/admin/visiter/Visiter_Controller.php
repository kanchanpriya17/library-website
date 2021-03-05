<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visiter_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/visiter/Visiter_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
    
    
    
    	public function index()

	{

		$result['settings'] = $this->Home_Model->get_setting(); 

		$config = array();

		$config["base_url"] = base_url() . "admin/visiter/";

		$total_row = $this->Visiter_Model->record_count();

		$config["total_rows"] = $total_row;

		$config["per_page"] =10;

		$config['use_page_numbers'] =true;

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

               $arr['page_title']='Website Visiter Information';	 

                if($page>=1) 

				   $page=($page-1)*$config["per_page"];			   
			   $result['records'] = $this->Visiter_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
                $result['records']=array();	 

			   $str_links = $this->pagination->create_links();

               $result["links"] = explode(',',$str_links ); 

			   array_push($result['records'],$arr);

			  

			   $this->load->view('admin/visiter/Visiter_View',$result);

	    }		  

	    else

		{
	     redirect('admin');

		}  

	

	}
	

public function getdetails()

	{

		 if ($this->session->userdata('is_user_login')) 

		{
              $id=$this->input->post('id'); 
			  $result = $this->Visiter_Model->getdetails($id);
			 if ($result == TRUE) 

			{
				$data['success']['id']=$result['id'];
				$data['success']['visiter']=$result['visiter'];
                $data['success']['date']=$result['date'];

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
	
}
?>