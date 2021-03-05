<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Album_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
		    $this->load->model('admin/album/Album_Model');
			$this->load->library('pagination');
		    $this->load->model('admin/Home_Model');
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting();
		$config = array();
		$config["base_url"] = base_url() . "admin/album/";
		$total_row = $this->Album_Model->record_count();
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
               $arr['page_title']='Client';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Album_Model->getall($config["per_page"],$page,0);
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			
			   $this->load->view('admin/album/Album_View',$result);
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
               $arr['page_title']='Add Client';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			   $this->load->view('admin/album/Add_Album_View',$result);
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
			  $filename ='album_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;									
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
				$config['maintain_ratio'] = FALSE;					  
				$config['width'] =190;					  
				$config['height'] = 109;					  
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
		
		 if ($this->session->userdata('is_user_login')) 
		{
			
			$error = $this->Album_Model->check_album($this->input->post('title'));
			if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }				 
			else 
			{ 
			  $arr = array('title' => $this->input->post('title',false),			  'image_name'=>$this->input->post('image_name'));
			  $result = $this->Album_Model->save($arr);
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
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Album_Model->getdetails($id);
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['title']=$result['title']; 
				$data['success']['image']=$result['image'];
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
               $arr['page_title']='Edit Client';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			   $this->load->view('admin/album/Edit_Album_View',$result);
			  
		}
		else
		{
			 
			 redirect('admin');
	 
		}
	}
	
	public function update()
	{
		if ($this->session->userdata('is_user_login')) 
		{
			
			$error = $this->Album_Model->check_album2($this->input->post('title'),$this->input->post('id'));
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	 
			else 
			{
             
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'title' => $this->input->post('title',false),'image' => $this->input->post('image_name')
						);
			  $result = $this->Album_Model->update($arr);
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
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Album_Model->del($id);
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