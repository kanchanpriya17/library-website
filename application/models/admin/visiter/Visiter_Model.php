<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Visiter_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	
		public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM enquiry_tbl WHERE is_deleted=$is_deleted ORDER BY id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM enquiry_tbl WHERE is_deleted=0');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("ipdb_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($_id) 
	{
		$sql = "SELECT * FROM enquiry_tbl WHERE is_deleted=0 AND id=$_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['visiter'] = $row['visiter'];
			  $data['date'] = $row['date'];
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
	
	public function del($id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('id',$id);
		if($this->db->update('enquiry_tbl',$arr))
		{
			 $data['success']="Visiter Information Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM enquiry_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM enquiry_tbl WHERE is_deleted=0 AND name LIKE '%$s%' ");
      return  $query->num_rows();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}	
?>