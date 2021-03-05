<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Equipment_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $equipment_description=$data['equipment_description'];		 		 
		$arr = array('equipment_id' =>'','equipment_title'=>$data['equipment_title'],'equipment_sub_title'=>$data['equipment_sub_title'],'equipment_image_name'=>$data['equipment_image_name'],'equipment_description'=>$equipment_description, 'is_deleted'=>'' );
		if($this->db->insert('equipment_tbl',$arr))
		{
			 $data['success']="Equipment Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM equipment_tbl WHERE is_deleted=$is_deleted ORDER BY equipment_id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM equipment_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("equipment_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($equipment_id) 
	{
		$sql = "SELECT * FROM equipment_tbl WHERE is_deleted=0 AND equipment_id=$equipment_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['equipment_id'] = $row['equipment_id'];	
			  $data['equipment_title'] = $row['equipment_title'];
			  $data['equipment_sub_title'] = $row['equipment_sub_title'];
			  $data['equipment_image_name'] = $row['equipment_image_name'];
			  $data['equipment_description'] =$row['equipment_description'];
			 
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$equipment_description=$data['equipment_description'];		
		$arr = array('equipment_title'=>$data['equipment_title'],'equipment_sub_title'=>$data['equipment_sub_title'], 'equipment_image_name'=>$data['equipment_image_name'],'equipment_description'=>$equipment_description,'is_deleted'=>'' );
		$this->db->where('equipment_id',$data['equipment_id']);
		if($this->db->update('equipment_tbl',$arr))
		{
			 $data['success']="Equipment Updated Successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($equipment_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('equipment_id',$equipment_id);
		if($this->db->update('equipment_tbl',$arr))
		{
			 $data['success']="Equipment Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM equipment_tbl WHERE is_deleted=0 AND equipment_title LIKE '%$s%' ORDER BY equipment_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM equipment_tbl WHERE is_deleted=0 AND equipment_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>