<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_Controller extends CI_Controller 
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
			$this->load->model('admin/video/Video_Model');
			$this->load->library('pagination');
		    $this->load->model('admin/Home_Model');
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/video/";
		$total_row = $this->Video_Model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['use_page_numbers'] =true;
		$config['num_links'] =$total_row;
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
               
			   $result['records'] = $this->Video_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/video/Video_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	/*public function addnew()
	{
	    if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Add Post';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/post/Add_Post_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}*/
	
	public function loadcat()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{
			   $result['records'] = $this->Video_Model->loadcat();
			   echo json_encode($result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	/*public function uploadimg()
	{
		 if ($this->session->userdata('is_user_login')) 
		{
			$validextensions = array("png","jpeg","bmp","jpg","gif","JPG","PNG","JPEG","BMP","GIF");
			$temporary = explode(".", $_FILES["file_image"]["name"]); 
			$file_extension = end($temporary);
			if ($_FILES["file_image"]["size"] <2097152) 
			{

				if(in_array($file_extension,$validextensions))
				{
					$filename ='post'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image']['tmp_name'];   
					$targetPath = 'upload/'.$filename ;  
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					  $data["success"]["msg"]="Image Uploaded Successfully";
					  $data["success"]["file_name"]=$filename;
					}  
					else 
					  $data["error"]="file not uploaded";	 
				} 
				else
				{
				  $data["error"]="Unsupported File Type !!!";
				}



			}
			else
			{
				$data["error"]="File is too large,upload up to 2MB file";
			}
				
			echo json_encode($data);
	    }		  
	    else
		{
			 redirect('admin');
		}
	  
	
	}*/
	
	/*public function save()
	{
		
		 if ($this->session->userdata('is_user_login')) 
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			
			
			if ($this->form_validation->run() == FALSE) 
			 {
			   
				$data['error']['txt_title']=form_error('title') ;
				
			 } 
			else 
			{ 
			 $arr = array(
							'title' => $this->input->post('title'),
							'sub_title' => $this->input->post('sub_title'),
							'description'=>$this->input->post('description'),
							'category_id'=>$this->input->post('category_id'),
							'image_name'=>$this->input->post('image_name')
						);
			  $result = $this->Post_Model->save($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
			  else		
				$data['sql_error']='sql error';
			  
			}
			
			echo json_encode($data);
		}
		 else
		{
			  redirect('admin');
		}
		
		
	}*/
	
	public function getdetails()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Video_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['video_title']=$result['video_title'];
				$data['success']['description']=$result['description'];	
                $data['success']['video_name']=$result['video_name'];
                $data['success']['video_category_id']=$result['video_category_id'];						
				$data['success']['title']=$result['title'];	
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
               $arr['page_title']='Edit Video';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/video/Edit_Video_View',$result);
			  
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
			$this->form_validation->set_rules('video_title', 'Title', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) 
			 {
				$data['error']['txt_title']=form_error('video_title') ;
			 }
			else 
			{
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'video_title' => $this->input->post('video_title'),							
							'description'=>$this->input->post('description'),							
							'video_category_id'=> $this->input->post('video_category_id')
						);
			  $result = $this->Video_Model->update($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
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
	
	public function update1()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		if ($this->session->userdata('is_user_login')) 
		{
			$this->form_validation->set_rules('video_title', 'Title', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) 
			 {
				$data['error']['txt_title']=form_error('video_title') ;
			 }
			else 
			{
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'video_title' => $this->input->post('video_title'),							
							'description'=>$this->input->post('description'),							
							'video_category_id'=> $this->input->post('video_category_id')
						);
			  $result = $this->Video_Model->update1($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
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
			  $result = $this->Video_Model->del($id);
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
		/*$config["base_url"] = base_url() . "admin/searchpost?s=".$s."";
		
		$total_row = $this->Post_Model->search_record_count($s);
		$config["total_rows"] = $total_row;
		$config["per_page"] =5;
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
		}*/
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='Post';	 
               //if($page>=1) 
				   //$page=($page-1)*$config["per_page"];
               
			   //$result['records'] = $this->Post_Model->search_getall($config["per_page"],$page,0,$s);
			   $result['records'] = $this->Video_Model->search_getall($s);
			   if(empty ($result['records']))
					$result['records']=array();	 
			  // $str_links = $this->pagination->create_links();
              // $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/video/Search_Video_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
}
?>