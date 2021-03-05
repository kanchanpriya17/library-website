<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TestApplication_Controller extends CI_Controller 
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
			$this->load->model('admin/testapplication/TestApplication_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/testapplication/";
		$total_row = $this->TestApplication_Model->record_count();
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
               $arr['page_title']='Test Application';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->TestApplication_Model->getall($config["per_page"],$page,0);
			  
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/testapplication/TestApplication_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
	
	
	
	public function uploadimg()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			$validextensions = array("png","jpeg","bmp","jpg","gif","JPG","PNG","JPEG","BMP","GIF","pdf","PDF");
			$temporary = explode(".", $_FILES["file_image"]["name"]); 
			$file_extension = end($temporary);
			if ($_FILES["file_image"]["size"] <5000000) 
			{

				if(in_array($file_extension,$validextensions))
				{
					if($file_extension=="pdf" || $file_extension=="PDF")
					{
						$filename ='application_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
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
						$filename ='application_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
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
						  $config['width'] =350;
						  $config['height'] = 300;
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
				} 
				else
				{
				  $data["error"]="Unsupported File Type !!!";
				}



			}
			else
			{
				$data["error"]="File is too large,upload up to 5MB file";
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
			  $result = $this->TestApplication_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['name']=$result['name'];
				$data['success']['email']=$result['email'];
				$data['success']['test']=$result['test'];
				$data['success']['phone']=$result['phone'];
				$data['success']['file']=$result['file'];
				$data['success']['status']=$result['status'];
				$data['success']['presciption']=$result['presciption'];
				
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
               $arr['page_title']='Edit Test Application';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/testapplication/Edit_TestApplication_View',$result);
			  
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
							'presciption'=>$this->input->post('presciption'),
							'status'=>$this->input->post('status'),
							'file'=>$this->input->post('file')
						);
			  $result = $this->TestApplication_Model->update($arr);
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
			  $result = $this->TestApplication_Model->del($id);
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
		
		$config["base_url"] = base_url() . "admin/searchtestapplication?s=".$s."";
		
		$total_row = $this->TestApplication_Model->search_record_count($s);
		$config["total_rows"] = $total_row;
		$config["per_page"] =10;
		$config['page_query_string'] = TRUE;
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
               $arr['page_title']='Test Application';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page) ||  !is_numeric($page))
				   $page=0;
			   $result['records'] = $this->TestApplication_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/testapplication/Search_TestApplication_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
	
}
?>