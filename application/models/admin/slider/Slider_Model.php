<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Slider_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{

		$arr = array('id' =>'', 'title'=>$data['title'],  'sub_title'=>$data['sub_title'],'image_name'=>$data['image_name'],'virtual_image_name'=>$data['virtual_image_name'],'description'=>$data['description'], 'is_deleted'=>'' );
		if($this->db->insert('slider_tbl',$arr))
		{
			 $data['success']="Image inserted successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM slider_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT $start,$limit";
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
	  $query = $this->db->query('SELECT * FROM slider_tbl WHERE is_deleted=0');
      return  $query->num_rows();
    }
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM slider_tbl WHERE is_deleted=0 AND id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['title'];
			   $data['sub_title'] = $row['sub_title'];
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
		$arr = array('title'=>$data['title'], 'sub_title'=>$data['sub_title'],'image_name'=>$data['image_name'],'virtual_image_name'=>$data['virtual_image_name'],'description'=>$data['description'], 'is_deleted'=>'' );
		$this->db->where('id',$data['id']);
		if($this->db->update('slider_tbl',$arr))
		{
			 $data['success']="Image updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		$arr = array( 'is_deleted'=>'1');
		$this->db->where('id',$id);
		if($this->db->update('slider_tbl',$arr))
		{
			 $data['success']="Image deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	/*public function search_record_count($search_text) 
	{
	  $this->db->where(array('is_deleted' =>0, 'title' => $search_text));
      return $this->db->count_all("slider_tbl");
    }
	
	public function search($limit,$start,$is_deleted,$search_text) 
	{
		$sql = "SELECT * FROM slider_tbl WHERE is_deleted=0 AND title LIKE '%$search_text%' ORDER BY id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}
        		
		
	}*/
}	
?>