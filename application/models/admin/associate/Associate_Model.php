<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Associate_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $associate_description=$data['associate_description'];		 		 
		$arr = array('associate_id' =>'','associate_title'=>$data['associate_title'],'associate_sub_title'=>$data['associate_sub_title'],'associate_image_name'=>$data['associate_image_name'],'associate_description'=>$associate_description, 'is_deleted'=>'' );
		if($this->db->insert('associate_tbl',$arr))
		{
			 $data['success']="Associate Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM associate_tbl WHERE is_deleted=$is_deleted ORDER BY associate_id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM associate_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("associate_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($associate_id) 
	{
		$sql = "SELECT * FROM associate_tbl WHERE is_deleted=0 AND associate_id=$associate_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['associate_id'] = $row['associate_id'];	
			  $data['associate_title'] = $row['associate_title'];
			  $data['associate_sub_title'] = $row['associate_sub_title'];
			  $data['associate_image_name'] = $row['associate_image_name'];
			  $data['associate_description'] =$row['associate_description'];
			 
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$associate_description=$data['associate_description'];		
		$arr = array('associate_title'=>$data['associate_title'],'associate_sub_title'=>$data['associate_sub_title'], 'associate_image_name'=>$data['associate_image_name'],'associate_description'=>$associate_description,'is_deleted'=>'' );
		$this->db->where('associate_id',$data['associate_id']);
		if($this->db->update('associate_tbl',$arr))
		{
			 $data['success']="Associate Updated Successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($associate_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('associate_id',$associate_id);
		if($this->db->update('associate_tbl',$arr))
		{
			 $data['success']="Associate Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM associate_tbl WHERE is_deleted=0 AND associate_title LIKE '%$s%' ORDER BY associate_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM associate_tbl WHERE is_deleted=0 AND associate_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>