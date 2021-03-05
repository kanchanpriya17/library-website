<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Equipment_Controller extends CI_Controller 
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

			$this->load->model('admin/equipment/Equipment_Model');

			$this->load->library('pagination');

			$this->load->model('admin/Home_Model');

		   

    }

	public function index()

	{

		$result['settings'] = $this->Home_Model->get_setting(); 

		$config = array();

		$config["base_url"] = base_url() . "admin/equipment/";

		$total_row = $this->Equipment_Model->record_count();

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

               $arr['page_title']='Equipment';	 

                if($page>=1) 

				   $page=($page-1)*$config["per_page"];			   

				   

			   $result['records'] = $this->Equipment_Model->getall($config["per_page"],$page,0);

			  

			   if(empty ($result['records']))

					$result['records']=array();	 

			   $str_links = $this->pagination->create_links();

               $result["links"] = explode(',',$str_links ); 

			   array_push($result['records'],$arr);

			  

			   $this->load->view('admin/equipment/Equipment_View',$result);

	    }		  

	    else

		{

		 

	     redirect('admin');

		}  

	

	}

	

	

	

	public function addnew()

	{

	    if ($this->session->userdata('is_user_login')) 

		{

			   $result['settings'] = $this->Home_Model->get_setting();

			   $arr=array();

               $arr['page_title']='Add Equipment';			   

			   $result['records'] =array();

			   array_push($result['records'],$arr);

			  $this->load->view('admin/equipment/Add_Equipment_View',$result);

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

					$filename ='associate'.rand(10000, 990000) . '_' . time() . '.' . $file_extension;				

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

					  $config['width'] =93;

					  $config['height'] = 93;

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

			

			

			 $arr = array(

							'equipment_title' => $this->input->post('equipment_title',false),

							'equipment_sub_title' => $this->input->post('equipment_sub_title'),

							'equipment_description'=>$this->input->post('equipment_description'),

							'equipment_image_name'=>$this->input->post('equipment_image_name'),

							

						);

			  $result = $this->Equipment_Model->save($arr);

			   if ($result== TRUE) 

			   {

				  $data['success']=$result['success'];

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

			  $id=$this->input->post('equipment_id'); 

			  $result = $this->Equipment_Model->getdetails($id);

			 

			 if ($result == TRUE) 

			{

				$data['success']['equipment_id']=$result['equipment_id'];

				$data['success']['equipment_title']=$result['equipment_title'];

				$data['success']['equipment_sub_title']=$result['equipment_sub_title'];

				$data['success']['equipment_image_name']=$result['equipment_image_name'];

				$data['success']['equipment_description']=$result['equipment_description'];

			

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

	    if ($this->session->userdata('is_user_login')) 

		{
			   $result['settings'] = $this->Home_Model->get_setting();

			   $arr=array();

               $arr['page_title']='Edit Equipment';			   

			   $result['records'] =array();

			   array_push($result['records'],$arr);  

			 $this->load->view('admin/equipment/Edit_Equipment_View',$result);

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

			

		 

             

			 $arr = array(

			                'equipment_id'=>$this->input->post('equipment_id'), 

							'equipment_title' => $this->input->post('equipment_title',false),

							'equipment_sub_title' => $this->input->post('equipment_sub_title'),

							'equipment_description'=>$this->input->post('equipment_description'),

							'equipment_image_name'=>$this->input->post('equipment_image_name')

							

						);

			  $result = $this->Equipment_Model->update($arr);

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

		 if ($this->session->userdata('is_user_login')) 

		{

			  $id=$this->input->post('id'); 

			  $result = $this->Equipment_Model->del($id);

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

		$config = array();

		$s=$this->input->get('s'); 

		

		$config["base_url"] = base_url() . "admin/searchequipment?s=".$s."";
		
        $result['settings'] = $this->Home_Model->get_setting();
		$total_row = $this->Equipment_Model->search_record_count($s);

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

               $arr['page_title']='Equipment';	 

               

               $page=$this->input->get('per_page');

			   if(!isset($page) ||  !is_numeric($page))

				   $page=0;

			   $result['records'] = $this->Equipment_Model->search_getall($config["per_page"],$page,0,$s);			   

			   if(empty ($result['records']))

					$result['records']=array();	 

			  $str_links = $this->pagination->create_links();

              $result["links"] = explode(',',$str_links ); 

			   array_push($result['records'],$arr);

			  

			   $this->load->view('admin/equipment/Search_Equipment_View',$result);

	    }		  

	    else

		{
	     redirect('admin');

		}  

	}
}

?>