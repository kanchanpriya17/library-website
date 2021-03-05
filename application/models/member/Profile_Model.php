<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Profile_Model extends CI_Model
{
    public function __construct()
	{
		date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	
	
	public function get_user_password($id)
	{
		$sql = "SELECT * FROM member_tbl WHERE  member_tbl.id='$id' AND member_tbl.is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function get_user_details($id)
	{
		$sql = "SELECT * FROM country_tbl,member_tbl WHERE member_tbl.country=country_tbl.id and member_tbl.id='$id' AND member_tbl.is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function record_count($id)
	{
		$query = $this->db->query("SELECT * FROM file_tbl WHERE is_deleted=0");
		return  $query->num_rows();
	}
	
	public function get_user_files($id,$start,$limit,$order) 
	{
		$sql = "SELECT * FROM  file_tbl WHERE user_id = '$id' AND is_deleted=0 ORDER BY id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;   	
    }
	
	public function get_country()
	{
		$sql = "SELECT * FROM country_tbl WHERE is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	public function get_category()
	{
		$sql = "SELECT * FROM video_category_tbl WHERE  is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	
	
	public function update($data)
	{
		$sql1 = "SELECT * FROM member_tbl WHERE email ='".$data['email']."' AND id!='".$data['id']."' AND is_deleted=0";
		$val1 = $this->db->query($sql1);
		
		if($val1->num_rows() > 0)	
			$response['error1']="This Email is already existing.Please Enter another Email";
		else
		  $response['error1']='';
	  
	    
	  
	    if($val1->num_rows()==0 )
		{		
			$arr = array('name'=>$data['name'],'email'=>$data['email'],'phone_no'=>$data['phone_no'],'mob_no'=>$data['mob_no'],'country'=>$data['country'],'address'=>$data['address'],'is_deleted'=>'' );
			$this->db->where('id',$data['id']);
			if($this->db->update('member_tbl',$arr))
			{
				 $response['msg']=" Your Profile Updated successfully !!!";
				
			}
			else
				return false;
			
		}
		else
         $response['msg']='';
	 
         return $response; 		
	}
	
	public function insertfile($data) 
	{         
         $dt = new DateTime();
         $dt= $dt->format('Y-m-d');
		 //$description=htmlspecialchars_decode();
		 
		$arr = array('id' =>'', 'file_title'=>$data['title'],'file_name'=>$data['file_name'],'user_id'=>$data['id'],'uploaded_date'=>$dt,'is_deleted'=>'' );
		if($this->db->insert('file_tbl',$arr))
		{
			 $data['success']="File Added successfully !!!";
			 $data['error']='';
             return $data;	
		}
		else
		{
		  $data['error']=$this->db->_error_message();
          return $data;
		}
		
         	
    }
	public function checkpassword($data)
	{
		
		$sql = "SELECT * FROM member_tbl WHERE password='".md5($data['old_password'])."' AND id='".$data['id']."' AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return true;
		else 
		  return false;
			
	}
	public function updatepassword($data)
	{
		
			$arr = array('password'=>md5($data['password']));
			$this->db->where('id',$data['id']);
			if($this->db->update('member_tbl',$arr))
			{
				 $response['success']=" Your password changed successfully !!!";
				
			}
			else
				return false;
			
		
	 
         return $response; 		
	}
	
	public function get_setting()
	{
		$sql = "SELECT * FROM settings_tbl ";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
}	
?>