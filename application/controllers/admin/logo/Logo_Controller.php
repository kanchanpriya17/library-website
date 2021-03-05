<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logo_Controller extends CI_Controller 
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
			$this->load->model('admin/logo/Logo_Model');
			$this->load->model('admin/Home_Model');
			
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 
	    if ($this->session->userdata('is_user_login')) 
		{ 
               $arr=array();
               $arr['page_title']='Logo';	 
               		   
			   $result['settings'] = $this->Logo_Model->get_setting();	   
			   $result['records'] = $this->Logo_Model->getall();
			   if(empty ($result['records']))
					$result['records']=array();	 
			  
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/logo/Logo_View',$result);
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
               $arr['page_title']='Add Slider';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/slider/Add_Slider_View',$result);
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
					$filename ='logo_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image']['tmp_name'];   
					$targetPath = 'upload/'.$filename ;
                    $thumbPath = 'upload/thumb/'.$filename ; 
                    															
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					  $data["success"]["msg"]="Logo Uploaded Successfully";
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
	
	public function save()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 
		 if ($this->session->userdata('is_user_login')) 
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) 
			 {
			   
				$data['error']['txt_title']=form_error('title') ;
			 } 
			else 
			{ 
		     $virtual_image_name=explode("\\",$this->input->post('virtual_image_name'));
			 $arr = array(
							'title' => $this->input->post('title'),
							'description'=>$this->input->post('description'),
							'image_name'=>$this->input->post('image_name'),
							'virtual_image_name'=>end($virtual_image_name)
						);
			  $result = $this->Slider_Model->save($arr);
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
			  $result = $this->Slider_Model->getdetails($id);
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['title']=$result['title'];
				$data['success']['image_name']=$result['image_name'];
				$data['success']['description']=strip_tags($result['description']);
				$data['success']['virtual_image_name']=strip_tags($result['virtual_image_name']);
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
	
	public function editslider()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 
	    if ($this->session->userdata('is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Edit Slider';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/slider/Edit_Slider_View',$result);
			  
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
			 $result = $this->Logo_Model->update($arr);
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
			  $result = $this->Slider_Model->del($id);
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
	
	/*public function search()
	{
		
		 if ($this->session->userdata('is_user_login')) 
		{
			  $arr=array();
			  	
              $arr['page_title']='Slider';
			  $search_text=$this->input->get('search_text'); 
				$config = array();
				$config["base_url"] = base_url() . "admin/slider/";
				$total_row = $this->Slider_Model->search_record_count($search_text);
				
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
				}
				 if($page>0) 
			   {
				   $page=$page+($config["per_page"]-2);
			   }
			  $result['records'] = $this->Slider_Model->search($config["per_page"],$page,0,$search_text);
			 
			   if(empty($result['records']))
			    $result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			    $this->load->view('admin/slider/Slider_View',$result);
			     
			 
			  
		}
		else
		{
			redirect('admin');
	 
		}
	}*/
	
}
?>