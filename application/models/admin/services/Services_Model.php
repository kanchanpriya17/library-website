<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{

		$arr = array('id' =>'', 'title'=>$data['title'], 'image_name'=>$data['image_name'],'virtual_image_name'=>$data['virtual_image_name'],'description'=>$data['description'], 'is_deleted'=>'' );
		if($this->db->insert('service_tbl',$arr))
		{
			 $data['success']="Ongoing Projects added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT $start,$limit";
		/*$this->db->limit($limit,$start);
        $this->db->where('is_deleted',$is_deleted);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("slider_tbl");*/
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM service_tbl WHERE is_deleted=0');
      return  $query->num_rows();
    }
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0 AND id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['title'];
			  $data['image_name'] = $row['image_name'];
			  $data['description'] = $row['description'];
			  $data['virtual_image_name'] = $row['virtual_image_name'];
			 

            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		$arr = array('title'=>$data['title'], 'image_name'=>$data['image_name'],'virtual_image_name'=>$data['virtual_image_name'],'description'=>$data['description'], 'is_deleted'=>'' );
		$this->db->where('id',$data['id']);
		if($this->db->update('service_tbl',$arr))
		{
			 $data['success']="Ongoing Projects updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		$arr = array( 'is_deleted'=>'1');
		$this->db->where('id',$id);
		if($this->db->update('service_tbl',$arr))
		{
			 $data['success']="Ongoing Projects deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0 AND title LIKE '%$s%' ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM service_tbl WHERE is_deleted=0 AND title LIKE '%$s%' ");
      return  $query->num_rows();
    }
}	
?>