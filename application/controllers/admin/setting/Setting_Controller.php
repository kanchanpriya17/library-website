<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_Controller extends CI_Controller 
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
			$this->load->model('admin/setting/Setting_Model');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='Setting';	 
			   if(empty ($result['records']))
					$result['records']=array();	 
			   array_push($result['records'],$arr);
			   $this->load->view('admin/setting/Setting_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function loadsetting()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{ 
              $result = $this->Setting_Model->getall(); 
			  echo json_encode($result);
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
			/*$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('phone', 'Phone No', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Facebook Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('twitter', 'Twitter Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('instagram', 'Instagram Link', 'trim|required|xss_clean');			
			$this->form_validation->set_rules('google', 'Google Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('rss', 'Rss Link', 'trim|required|xss_clean');*/
		
			//$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			/*if ($this->form_validation->run() == FALSE) 
			 {
			   
				$data['error']['txt_email']=form_error('email') ;
				$data['error']['txt_phone']=form_error('phone') ;
				$data['error']['txt_facebook']=form_error('facebook') ;
				$data['error']['txt_twitter']=form_error('twitter') ;
				$data['error']['txt_instagram']=form_error('instagram') ;
				$data['error']['txt_google']=form_error('google') ;
				$data['error']['txt_rss']=form_error('rss') ;
			 }
			else 
			{*/
             
			 $arr = array(			               
							'email' => $this->input->post('txt_email'),
							'phone' => $this->input->post('txt_phone'),
							'mobile_no' => $this->input->post('txt_mob_no'),
							'facebook'=>$this->input->post('txt_facebook'),
							'twitter'=>$this->input->post('txt_twitter'),
							'linkedin'=> $this->input->post('txt_linkedin'),
							'pinterest'=> $this->input->post('txt_pinterest'),
							'skype'=> $this->input->post('txt_skype'),
							'google'=> $this->input->post('txt_google'),
							'site_name'=> $this->input->post('txt_site_name'),							
							'address'=> $this->input->post('txt_address'),
							'map'=> $this->input->post('txt_map'),
							'timing1'=> $this->input->post('txt_timing1'),
							'timing2'=> $this->input->post('txt_timing2'),
							'timing3'=> $this->input->post('txt_timing3'),
							'location'=> $this->input->post('txt_location'),
							'opening_hours'=> $this->input->post('txt_ohours'),
							'instagram'=>$this->input->post('txt_instagram'),
							'twitter_wiget'=>$this->input->post('txt_twitterwiget'),
					
							'happy_hours'=> $this->input->post('txt_hhours'));
			   $result = $this->Setting_Model->update($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
			  else		
				$data['sql_error']='sql error';
			//}
			 echo json_encode($data); 
		}
		 else
		{
			 redirect('admin');
		}
	}
	
	
	
}
?>