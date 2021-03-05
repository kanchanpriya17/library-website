<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_Controller extends CI_Controller 
{
	 public function __construct()	
	{
            parent::__construct();
			$this->load->helper('security');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('member/Profile_Model');
            $this->load->library('pagination');		   
    }
	
	public function index()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='My Profile';			   
			   $result['records'] =array();
			   $result['settings'] = $this->Profile_Model->get_setting();
			   $result['user_details'] = $this->Profile_Model->get_user_details($this->session->userdata('member_id'));
			   if(empty ($result['records']))
					$result['records']=array();	
			   array_push($result['records'],$arr);
			  $this->load->view('member/profile/Myprofile_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
	public function edit()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Edit Profile';			   
			   $result['records'] =array();
			   $result['settings'] = $this->Profile_Model->get_setting();
			   $result['user_details'] = $this->Profile_Model->get_user_details($this->session->userdata('member_id'));
			   $result['countries'] = $this->Profile_Model->get_country();
			   
			   if(empty ($result['records']))
					$result['records']=array();	
			   array_push($result['records'],$arr);
			   
			  $this->load->view('member/profile/Editprofile_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
	public function changepassword()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Change Password';			   
			   $result['records'] =array();
			   $result['settings'] = $this->Profile_Model->get_setting();
			   $result['user_details'] = $this->Profile_Model->get_user_password($this->session->userdata('member_id'));
			  
			   if(empty ($result['records']))
					$result['records']=array();	
			   array_push($result['records'],$arr);
			   
			  $this->load->view('member/profile/Changepassword_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
	public function update()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			  $arr = array(
			                'name'=>$this->input->post('txt_name'), 
							'email' => $this->input->post('txt_email'),
							'phone_no' => $this->input->post('txt_phone'),
							'mob_no'=>$this->input->post('txt_mob_no'),
							'country'=>$this->input->post('slct_country'),
							'address'=> $this->input->post('txt_address'),
							'id'=>$this->session->userdata('member_id')
						);
						
			             $result = $this->Profile_Model->update($arr);
						 if ($result['msg']!='') 
						  $data['msg']=$result['msg'];
					  
					     if ($result['error1']) 
						  $data['error1']=$result['error1'];
					  
					     					      										 					 
			             echo json_encode($data); 
			  
	    }
        else
	      redirect('member');		
	 
	}
	
	public function updatepassword()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			  $arr = array(
			                'old_password'=>$this->input->post('txt_old_password'), 
			                'password'=>$this->input->post('txt_password'), 
							'id'=>$this->session->userdata('member_id')
						);
						$check  = $this->Profile_Model->checkpassword($arr);
						if($check ==true)
						{
							$result = $this->Profile_Model->updatepassword($arr);
							
							$this->session->unset_userdata('member_name');
							$this->session->unset_userdata('member_id');
							$this->session->unset_userdata('member_is_user_login');   
							$this->session->sess_destroy();
							$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
							$this->output->set_header("Pragma: no-cache");
							
							
			
							 if ($result['success']!='') 
							  $data['success']=$result['success'];					  					     					  					     					      										 				
							 echo json_encode($data); 
						}
						else
						{
							 $data['error']="Please Enter Correct Old Password";					  					     					  					     					      										 				
							 echo json_encode($data); 
						}
			  
	    }
        else
	      redirect('member');		
	 
	}
	
	public function addfiles()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='Add File';			   
			   $result['records'] =array();
			   $result['settings'] = $this->Profile_Model->get_setting();
			   $result['user_details'] = $this->Profile_Model->get_user_details($this->session->userdata('member_id'));
			   //$result['video_categories'] = $this->Profile_Model->get_category();
			   
			   if(empty ($result['records']))
					$result['records']=array();	
			   array_push($result['records'],$arr);
			  $this->load->view('member/profile/Add_File_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
	public function uploadfile()
	{
		 
		 if ($this->session->userdata('member_is_user_login')) 
		{
			
			$temporary = explode(".", $_FILES["file"]["name"]); 
			$file_extension = end($temporary);
			
					$filename =$this->session->userdata('member_user_id')."_".rand(10000, 990000) . '_' . time() . '.' . $file_extension;
                    					
					$sourcePath = $_FILES["file"]["tmp_name"];   
					$targetPath = 'upload_file/'.$filename ;  
					if(move_uploaded_file($sourcePath,$targetPath))
					{
					 
					  
					  $arr = array(
			                'title'=>$filename,							
							'file_name'=>$filename,
							'id'=>$this->session->userdata('member_id')
						);
						
			             $result = $this->Profile_Model->insertfile($arr);
						 if ($result['success']!='') 
						  echo"File Uploaded Successfully";
					  
					     if ($result['error']!='') 
						    echo "File not uploaded"; 
					}  
					else 
					  echo "File not uploaded"; 
				
	    }		  
	    else
		{
			 redirect('admin');
		}
	  
	
	}
	
	public function insertfile()
	{
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr = array(
			                'title'=>$this->input->post('txt_file_title'), 
							'description' => $this->input->post('txt_description'),
							'file_name'=>$this->input->post('hid_upload'),
							'id'=>$this->session->userdata('member_id')
						);
						
			             $result = $this->Profile_Model->insertfile($arr);
						 if ($result['success']!='') 
						  $data['success']=$result['success'];
					  
					     if ($result['error']!='') 
						  $data['error']=$result['error'];
					  
					     					      										 					 
			             echo json_encode($data); 
	    }
        else
	      redirect('member');		
	 
	
	}
	
	public function myfiles()
	{
		
		 $pagination=0;
		 $page=$_SERVER['REQUEST_URI'];
		 $page_arr=explode("/",$page);
		 $len=sizeof($page_arr);
		 //$page= end($page_arr);
		 $page=$page_arr[$len-1];
		 if(is_numeric($page))
		 {
			  $page=$page_arr[$len-2];
			  $pagination=1;
		 }
         else
		 {
			 $pagination=0;
			 $start=0;
		 }			 
	   if ($this->session->userdata('member_is_user_login')) 
		{
			   $arr=array();
               $arr['page_title']='My Files';			   
			   $result['records'] =array();
			   if($pagination==1)
				{
					 $start=$page=$page_arr[$len-1];
					 if($start==1 || $start==0 || $start>99999 || $start<0)	
					  $start=0;
					 else
					 {
						 $start=($start-1)*3;
					 }
					 $result['user_files'] = $this->Profile_Model->get_user_files($this->session->userdata('member_id'),$start,3,'desc');
					 
                    
				} 
				else
                      $result['user_files'] = $this->Profile_Model->get_user_files($this->session->userdata('member_id'),$start,3,'desc');
				   
					  
			   $result['total_row'] = $this->Profile_Model->record_count($this->session->userdata('member_id'));
			    $result['settings'] = $this->Profile_Model->get_setting();
			   if(empty ($result['records']))
					$result['records']=array();	
			   array_push($result['records'],$arr);
			  $this->load->view('member/profile/Myfile_View',$result);
	    }
        else
	      redirect('member');		
	 
	
	}
	
}
?>