<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Category_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{

		$arr = array('id' =>'', 'title'=>$data['title'],'is_deleted'=>'' );
		if($this->db->insert('category_tbl',$arr))
		{
			 $data['success']="Category inserted successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function check_cat($cat) 
	{
		$sql = "SELECT * FROM category_tbl WHERE title='$cat'AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Category is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
	public function check_cat2($cat,$id) 
	{
		$sql = "SELECT * FROM category_tbl WHERE title='$cat'AND id!='$id' AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Category is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	public function getall($limit,$start,$is_deleted) 
	{
		//$sql = "SELECT * FROM slider_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT 0,1";
		$this->db->limit($limit,$start);
        $this->db->where('is_deleted',$is_deleted);
		$this->db->where('id >',1);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("category_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM category_tbl WHERE is_deleted=0 AND id>1');
      return  $query->num_rows();
	 
      
    }
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM category_tbl WHERE is_deleted=0 AND id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['title'];
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		$arr = array('title'=>$data['title'],'is_deleted'=>'' );
		$this->db->where('id',$data['id']);
		if($this->db->update('category_tbl',$arr))
		{
			 $data['success']="Category updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		$arr = array('is_deleted'=>'1');
		$this->db->where('id',$id);
		if($this->db->update('category_tbl',$arr))
		{
			 $data['success']="category deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	
}	
?>