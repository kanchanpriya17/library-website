<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_Controller extends CI_Controller 
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
			$this->load->model('admin/post/Post_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting();
		$config = array();
		$config["base_url"] = base_url() . "admin/post/";
		$total_row = $this->Post_Model->record_count();
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
               $arr['page_title']='Post';	 
               if($page>=1) 
				   $page=($page-1)*$config["per_page"];
               
			   $result['records'] = $this->Post_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/post/Post_View',$result);
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
               $arr['page_title']='Add Post';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/post/Add_Post_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	public function loadcat1()
	{
		$result['settings'] = $this->Home_Model->get_setting();
	    if ($this->session->userdata('is_user_login')) 
		{
			   $result['records'] = $this->Post_Model->loadcat1();
			   echo json_encode($result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	public function uploadimg()
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
					$filename ='post_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image']['tmp_name'];   
					$targetPath = 'upload/'.$filename ;  
					$thumbPath = 'upload/thumb/'.$filename ; 
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					  $data["success"]["msg"]="Image Uploaded Successfully";
					  $data["success"]["file_name"]=$filename;
					  
					  $this->load->library('image_lib');
					  $config['image_library'] = 'gd2';
					  $config['source_image'] = $targetPath;    
					  $config['maintain_ratio'] = TRUE;
					  $config['width'] =255;
					  $config['height'] = 255;
					  $config['new_image'] = $thumbPath;               
					  $this->image_lib->initialize($config);
					  if(!$this->image_lib->resize())
					  { 
						echo $this->image_lib->display_errors();
					  }        
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
	  
	
	}
	
	public function save()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 
		 if ($this->session->userdata('is_user_login')) 
		{
			//$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			
			 $arr = array(
							'title' => $this->input->post('title',false),
							'sub_title' => $this->input->post('sub_title',false),
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
			  $result = $this->Post_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['post_id']=$result['post_id'];
				$data['success']['post_title']=$result['post_title'];
				$data['success']['post_sub_title']=$result['post_sub_title'];
				$data['success']['post_image_name']=$result['post_image_name'];
				$data['success']['post_description']=$result['post_description'];
				$data['success']['category_id']=$result['category_id'];
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
               $arr['page_title']='Edit Post';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/post/Edit_Post_View',$result);
			  
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
			                'id'=>$this->input->post('id'), 
							'title' => $this->input->post('title',false),
							'sub_title' => $this->input->post('sub_title',false),
							'description'=>$this->input->post('description'),
							'image_name'=>$this->input->post('image_name'),
							'category_id'=> $this->input->post('category_id')
						);
			  $result = $this->Post_Model->update($arr);
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
			  $id=$this->input->post('id'); 
			  $result = $this->Post_Model->del($id);
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
		
		$config["base_url"] = base_url() . "admin/searchpost?s=".$s."";
		
		$total_row = $this->Post_Model->search_record_count($s);
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
               $arr['page_title']='Post';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page) ||  !is_numeric($page))
				   $page=0;
			   $result['records'] = $this->Post_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/post/Search_Post_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
}
?>