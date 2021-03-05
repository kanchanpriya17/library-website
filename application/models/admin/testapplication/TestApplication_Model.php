<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class TestApplication_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM check_tbl  ORDER BY id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM check_tbl  ');
      return  $query->num_rows();
    }
	
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM check_tbl WHERE  id=$id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['name'] = $row['name'];
			  $data['test'] = strip_tags($row['test']);
			  $data['email'] = $row['email'];
			  $data['phone'] = $row['phone'];
			  $data['file']=$row['file'];
			  $data['status']=$row['status'];
			  $data['presciption'] =$row['presciption'];			 			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		
		$arr = array('file'=>$data['file'],'presciption'=>$data['presciption'],'status'=>$data['status'] );
		$this->db->where('id',$data['id']);
		if($this->db->update('check_tbl',$arr))
		{
			 $data['success']="Application updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		//$arr = array('is_deleted'=>1);
		$this->db->where('id',$id);
		if($this->db->delete('check_tbl'))
		{
			 $data['success']="Application deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM check_tbl WHERE name LIKE '%$s%' ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM check_tbl WHERE name LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>