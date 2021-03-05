<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sb_Controller extends CI_Controller 
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
			$this->load->model('admin/sidebanner/Sb_Model');
			$this->load->model('admin/Home_Model');
			
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 	
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='Side Banner';	 
               		   
			    $result['settings'] = $this->Sb_Model->get_setting();	   
			   $result['records'] = $this->Sb_Model->getall();
			   if(empty ($result['records']))
					$result['records']=array();	 
			  
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/sidebanner/Sb_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
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
					$filename ='sb_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image']['tmp_name'];   
					$targetPath = 'upload/'.$filename ;
                    $thumbPath = 'upload/thumb/'.$filename ; 
                    															
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					  $data["success"]["msg"]="Sidebanner Uploaded Successfully";
					  $data["success"]["file_name"]=$filename;
					  
						$this->load->library('image_lib');
						$config['image_library'] = 'gd2';
						$config['source_image'] = $targetPath;       						
						$config['maintain_ratio'] = TRUE;
						$config['width'] =250;
						$config['height'] = 250;
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
	
	
	
	public function update()
	{
		 $result['settings'] = $this->Home_Model->get_setting(); 	
		if ($this->session->userdata('is_user_login')) 
		{
			
			 $arr = array('image_name'=>$this->input->post('image_name'));
			 $result = $this->Sb_Model->update($arr);
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
	
	
	
}
?>