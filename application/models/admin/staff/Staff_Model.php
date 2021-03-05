<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Staff_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	public function save($data) 
	{         
		$arr = array('staff_id' =>'', 'name'=>$data['name'],'designation'=>$data['designation'],'is_deleted'=>'' );
		if($this->db->insert('staff_tbl',$arr))
		{
			 $data['success']="Notification Added successfully !!!";
             return $data;	
		}
		else
		return false;
    }
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM staff_tbl WHERE is_deleted=$is_deleted ORDER BY staff_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}
	}
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM staff_tbl WHERE is_deleted=0');
      return  $query->num_rows();
    }
    public function getdetails($staff_id) 
	{
		$sql = "SELECT * FROM staff_tbl WHERE staff_id=$staff_id AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['staff_id'] = $row['staff_id'];	
			  $data['name'] = $row['name'];
			  $data['designation'] = $row['designation'];
			  $data['type'] = $row['type'];
            }			
           return $data;
	    }
		else 
	return false;
	}
	
    public function update($data)
	{				 				 		  
		$arr = array('name'=>$data['name'],'designation'=>$data['designation'],'is_deleted'=>'' );
		$this->db->where('staff_id',$data['staff_id']);
		if($this->db->update('staff_tbl',$arr))
		{
			 $data['success']="Notification updated successfully !!!";
             return $data;	
		}
		else
	return false;
	}	
	public function del($staff_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('staff_id',$staff_id);
		if($this->db->update('staff_tbl',$arr))
		{
			 $data['success']="Notification deleted successfully!!!";
             return $data;	
		}
		else
			return false;
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		$sql = "SELECT * FROM staff_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ORDER BY staff_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
	}
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM staff_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ");
      return  $query->num_rows();
    }
}	
?>