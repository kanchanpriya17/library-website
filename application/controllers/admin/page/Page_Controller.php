<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_Controller extends CI_Controller 
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
			$this->load->model('admin/page/Page_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/page/";
		$total_row = $this->Page_Model->record_count();
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
               $arr['page_title']='Page';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Page_Model->getall($config["per_page"],$page,0);
			  
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/page/Page_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function loadpage()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{
			   $result['records'] = $this->Page_Model->loadpage();
			   echo json_encode($result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	public function addnew()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Add Page';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/page/Add_Page_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	
	
	public function uploadimg()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			$validextensions = array("png","jpeg","bmp","jpg","gif","JPG","PNG","JPEG","BMP","GIF");
			$temporary = explode(".", $_FILES["file_image"]["name"]); 
			$file_extension = end($temporary);
			if ($_FILES["file_image"]["size"] <2097152) 
			{

				if(in_array($file_extension,$validextensions))
				{
					$filename ='page_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
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
					  $config['height'] =200;
					  
					  
					  /*
					  $config['width'] =1366;
					  $config['height'] = 500;
					  
					  
					  */
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
	public function uploadimg1()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			$validextensions = array("png","jpeg","bmp","jpg","gif","JPG","PNG","JPEG","BMP","GIF");
			$temporary = explode(".", $_FILES["file_image1"]["name"]); 
			$file_extension = end($temporary);
			if ($_FILES["file_image1"]["size"] <2097152) 
			{

				if(in_array($file_extension,$validextensions))
				{
					$filename ='page_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image1']['tmp_name'];   
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
					  $config['height'] = 200;
					  
					 /* 
					  $config['width'] =350;
					  $config['height'] =300;
					  
					  
					  */
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
			
			 $error = $this->Page_Model->check_page($this->input->post('title'));			
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	
			else 
			{ 
			
			 
			 $arr = array(
							'title' => $this->input->post('title'),
							'sub_title' => $this->input->post('sub_title'),
							'description'=>$this->input->post('description'),
							'image_name'=>$this->input->post('image_name'),
							'header_image'=>$this->input->post('header_image'),
							'parent_page_id'=>$this->input->post('parent_page_id')
						);
			  $result = $this->Page_Model->save($arr);
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
	
	public function getdetails()
	{   
	    $result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Page_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['title']=$result['title'];
				$data['success']['sub_title']=$result['sub_title'];
				$data['success']['image_name']=$result['image_name'];
				$data['success']['header_image']=$result['header_image'];
				$data['success']['description']=$result['description'];
				$data['success']['parent_page_id']=$result['parent_page_id'];
				$data['success']['parent_page_name']=$result['parent_page_name'];
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
               $arr['page_title']='Edit Page';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/page/Edit_Page_View',$result);
			  
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
			
			
			
		   $error = $this->Page_Model->check_page2($this->input->post('title'),$this->input->post('id'));
			
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	
			else 
			{
             
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'title' => $this->input->post('title'),
							'sub_title' => $this->input->post('sub_title'),
							'description'=>$this->input->post('description'),
							'image_name'=>$this->input->post('image_name'),
							'header_image'=>$this->input->post('header_image'),
							'parent_page_id'=>$this->input->post('parent_page_id')
						);
			  $result = $this->Page_Model->update($arr);
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
			  $result = $this->Page_Model->del($id);
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
		
		$config["base_url"] = base_url() . "admin/searchpage?s=".$s."";
		
		$total_row = $this->Page_Model->search_record_count($s);
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
               $arr['page_title']='Page';	 
               
               $page=$this->input->get('per_page');
			   if(!isset($page) ||  !is_numeric($page))
				   $page=0;
			   $result['records'] = $this->Page_Model->search_getall($config["per_page"],$page,0,$s);			   
			   if(empty ($result['records']))
					$result['records']=array();	 
			  $str_links = $this->pagination->create_links();
              $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/page/Search_Page_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	
	
}
?>