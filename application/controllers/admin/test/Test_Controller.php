<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_Controller extends CI_Controller 
{
	 public function __construct()
	 {
            parent::__construct();
			date_default_timezone_set('Asia/Calcutta');  
			/*$this->load->helper('security');
			$this->load->library('form_validation');*/
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('upload');
			$this->load->model('admin/test/Test_Model');
			$this->load->library('pagination');
			$this->load->model('admin/Home_Model');
		   
    }
	public function index()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		$config = array();
		$config["base_url"] = base_url() . "admin/test/";
		$total_row = $this->Test_Model->record_count();
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
               $arr['page_title']='Gallery';	 
                if($page>=1) 
				   $page=($page-1)*$config["per_page"];			   
				   
			   $result['records'] = $this->Test_Model->getall($config["per_page"],$page,0);
			  
			   if(empty ($result['records']))
					$result['records']=array();	 
			   $str_links = $this->pagination->create_links();
               $result["links"] = explode(',',$str_links ); 
			   array_push($result['records'],$arr);
			  
			   $this->load->view('admin/test/Test_View',$result);
	    }		  
	    else
		{
		 
	     redirect('admin');
		}  
	
	}
	
	public function loadtest()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
	    if ($this->session->userdata('is_user_login')) 
		{
			   $result['records'] = $this->Test_Model->loadtest();
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
               $arr['page_title']='Add Gallery';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);
			  $this->load->view('admin/test/Add_Test_View',$result);
	    }		  
	    else
	     redirect('admin');
	
	}
	
	
	
	public function uploadimg()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			$validextensions = array("png","jpeg","bmp","jpg","gif","JPG","PNG","JPEG","BMP","GIF","pdf","PDF");
			$temporary = explode(".", $_FILES["file_image"]["name"]); 
			$file_extension = end($temporary);
			if ($_FILES["file_image"]["size"] <6097152) 
			{

				if(in_array($file_extension,$validextensions))
				{
					$filename ='test_'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				
					$sourcePath = $_FILES['file_image']['tmp_name'];   
					$targetPath = 'upload/'.$filename ;  
					$thumbPath = 'upload/thumb/'.$filename ; 
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					  $data["success"]["msg"]="File Uploaded Successfully";
					  $data["success"]["file_name"]=$filename;
					  
					 $this->load->library('image_lib');
					  $config['image_library'] = 'gd2';
					  $config['source_image'] = $targetPath;    
					  $config['maintain_ratio'] = TRUE;
					  $config['width'] =370;
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
			 /*$error = $this->Test_Model->check_test($this->input->post('title'));		            		
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	
			else 
			{ */
		
			  $arr = array(			                
							'title' =>$this->input->post('title'),
							'desc' =>$this->input->post('desc'),
							'rate'=>$this->input->post('rate'),
							'image'=>$this->input->post('image')
						);
						
			   $result = $this->Test_Model->save($arr);
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
		/*$result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			
			 $error = $this->Test_Model->check_test($this->input->post('title'));			
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	
			else 
			{ 
			
			
			 $arr = array(			                
							'title' =>$this->input->post('title'),
							'desc' =>$this->input->post('desc'),
							'rate'=>$this->input->post('rate'),
							'image'=>$this->input->post('image')
						);
						die($this->input->post('title'));
			  $result = $this->Test_Model->save($arr);
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
		*/
		
	}
	
	public function getdetails()
	{   
	    $result['settings'] = $this->Home_Model->get_setting(); 		
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Test_Model->getdetails($id);
			 
			 if ($result == TRUE) 
			{
				$data['success']['id']=$result['id'];
				$data['success']['title']=$result['title'];
				$data['success']['desc']=$result['desc'];
				$data['success']['rate']=$result['rate'];
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
               $arr['page_title']='Edit Gallery';			   
			   $result['records'] =array();
			   array_push($result['records'],$arr);  
			 $this->load->view('admin/test/Edit_Test_View',$result);
			  
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
			
			
			
		    /*$error = $this->Test_Model->check_test2($this->input->post('title'),$this->input->post('id'));
			
			 if($error==TRUE)		 
			 {
				 $data['error']['txt_title']=$error['msg'] ;
			 }	
			else 
			{
             */
			 $arr = array(
			                'id'=>$this->input->post('id'), 
							'title' => $this->input->post('title'),
							'desc' => $this->input->post('desc'),
							'rate'=>$this->input->post('rate'),
							'image'=>$this->input->post('image')
						);
			  $result = $this->Test_Model->update($arr);
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
	
	public function del()
	{
		$result['settings'] = $this->Home_Model->get_setting(); 		 
		 if ($this->session->userdata('is_user_login')) 
		{
			  $id=$this->input->post('id'); 
			  $result = $this->Test_Model->del($id);
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
	
	
	
}
?>