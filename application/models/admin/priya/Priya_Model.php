<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Priya_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $priya_description=$data['priya_description'];		 		 
		$arr = array('priya_id' =>'','priya_title'=>$data['priya_title'],'priya_sub_title'=>$data['priya_sub_title'],'priya_image_name'=>$data['priya_image_name'],'priya_description'=>$priya_description, 'is_deleted'=>'' );
		if($this->db->insert('priya_tbl',$arr))
		{
			 $data['success']="Priya Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM priya_tbl WHERE is_deleted=$is_deleted ORDER BY priya_id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM priya_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("priya_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($priya_id) 
	{
		$sql = "SELECT * FROM priya_tbl WHERE is_deleted=0 AND priya_id=$priya_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['priya_id'] = $row['priya_id'];	
			  $data['priya_title'] = $row['priya_title'];
			  $data['priya_sub_title'] = $row['priya_sub_title'];
			  $data['priya_image_name'] = $row['priya_image_name'];
			  $data['priya_description'] =$row['priya_description'];
			 
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$priya_description=$data['priya_description'];		
		$arr = array('priya_title'=>$data['priya_title'],'priya_sub_title'=>$data['priya_sub_title'], 'priya_image_name'=>$data['priya_image_name'],'priya_description'=>$priya_description,'is_deleted'=>'' );
		$this->db->where('priya_id',$data['priya_id']);
		if($this->db->update('priya_tbl',$arr))
		{
			 $data['success']="Priya Updated Successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($priya_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('priya_id',$priya_id);
		if($this->db->update('priya_tbl',$arr))
		{
			 $data['success']="Priya Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM priya_tbl WHERE is_deleted=0 AND priya_title LIKE '%$s%' ORDER BY priya_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM priya_tbl WHERE is_deleted=0 AND priya_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>