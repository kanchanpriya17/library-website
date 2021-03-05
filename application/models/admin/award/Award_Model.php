<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Award_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $award_description=$data['award_description'];		 		 
		$arr = array('award_id' =>'','award_title'=>$data['award_title'],'award_sub_title'=>$data['award_sub_title'],'award_image_name'=>$data['award_image_name'],'award_description'=>$award_description, 'is_deleted'=>'' );
		if($this->db->insert('award_tbl',$arr))
		{
			 $data['success']="Testimonial Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM award_tbl WHERE is_deleted=$is_deleted ORDER BY award_id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM award_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("award_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($award_id) 
	{
		$sql = "SELECT * FROM award_tbl WHERE is_deleted=0 AND award_id=$award_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['award_id'] = $row['award_id'];	
			  $data['award_title'] = $row['award_title'];
			  $data['award_sub_title'] = $row['award_sub_title'];
			  $data['award_image_name'] = $row['award_image_name'];
			  $data['award_description'] =$row['award_description'];
			 
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$award_description=$data['award_description'];		
		$arr = array('award_title'=>$data['award_title'],'award_sub_title'=>$data['award_sub_title'], 'award_image_name'=>$data['award_image_name'],'award_description'=>$award_description,'is_deleted'=>'' );
		$this->db->where('award_id',$data['award_id']);
		if($this->db->update('award_tbl',$arr))
		{
			 $data['success']="Testimonial Updated Successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($award_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('award_id',$award_id);
		if($this->db->update('award_tbl',$arr))
		{
			 $data['success']="Testimonial Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	
	
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM award_tbl WHERE is_deleted=0 AND award_title LIKE '%$s%' ORDER BY award_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM award_tbl WHERE is_deleted=0 AND award_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>