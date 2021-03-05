<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Member_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	public function save($data) 
	{         
         
		
		
		//$arr = array('member_id' =>'', 'name'=>$data['name'],'designation'=>$data['designation'],'address'=>$data['address'],'phone'=>$data['phone'],'email'=>$data['email'],'is_deleted'=>'' );
		$arr = array('member_id' =>'', 'name'=>$data['name'],'designation'=>$data['designation'],'is_deleted'=>'' );
		if($this->db->insert('member_tbl',$arr))
		{
			 $data['success']="Video Created successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM member_tbl WHERE is_deleted=$is_deleted ORDER BY member_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM member_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	
	
    public function getdetails($member_id) 
	{
		$sql = "SELECT * FROM member_tbl WHERE member_id=$member_id AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['member_id'] = $row['member_id'];	
			  $data['name'] = $row['name'];
			  $data['designation'] = $row['designation'];
			 /* $data['address'] = $row['address'];
			  $data['phone'] = $row['phone'];
			  $data['email'] = $row['email'];*/
			  
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{				 				 		  
		//$arr = array('name'=>$data['name'],'designation'=>$data['designation'],'address'=>$data['address'], 'phone'=>$data['phone'],'email'=>$data['email'],'is_deleted'=>'' );
		$arr = array('name'=>$data['name'],'designation'=>$data['designation'],'is_deleted'=>'' );
		$this->db->where('member_id',$data['member_id']);
		if($this->db->update('member_tbl',$arr))
		{
			 $data['success']="Video updated successfully !!!";
             return $data;	
		}
		else
			return false;											  
			              		
	}	
	
	public function del($member_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('member_id',$member_id);
		if($this->db->update('member_tbl',$arr))
		{
			 $data['success']="Video deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM member_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ORDER BY member_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM member_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>