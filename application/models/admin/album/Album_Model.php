<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Album_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{

		$arr = array('id' =>'', 'title'=>$data['title'],'image'=>$data['image_name'],'is_deleted'=>'' );
		if($this->db->insert('album_tbl',$arr))
		{
			 $data['success']="Client Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function check_album($album) 
	{
		$sql = "SELECT * FROM album_tbl WHERE title='$album'AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Client is already Existing please try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
	public function check_album2($album,$id) 
	{
		$sql = "SELECT * FROM album_tbl WHERE title='$album'AND id!='$id' AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This  Album is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	public function getall($limit,$start,$is_deleted) 
	{
	//	$sql = "SELECT * FROM album_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT 0,1";
	
	
     	$sql = "SELECT * FROM album_tbl WHERE is_deleted=0 ORDER BY id ASC";
	
		$this->db->limit($limit,$start);
        $this->db->where('is_deleted',$is_deleted);
	//	$this->db->where('id >',10);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("album_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM album_tbl WHERE is_deleted=0 AND id>1');
      return  $query->num_rows();
	 
      
    }
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM album_tbl WHERE is_deleted=0 AND id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['title'];			  			  
			  $data['image'] = $row['image'];
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		$arr = array('title'=>$data['title'],'image'=>$data['image'],'is_deleted'=>'' );
		$this->db->where('id',$data['id']);
		if($this->db->update('album_tbl',$arr))
		{
			 $data['success']="Client updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		$arr = array('is_deleted'=>'1');
		$this->db->where('id',$id);
		if($this->db->update('album_tbl',$arr))
		{
			 $data['success']=" Client deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	
}	
?>