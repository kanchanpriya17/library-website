<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class File_Model extends CI_Model
{
    public function __construct()
	{  
	      
		$this->load->database();
	}
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT file_tbl.id,file_tbl.file_title,file_tbl.file_name,file_tbl.approved,file_tbl.uploaded_date,member_tbl.user_id,member_tbl.name FROM file_tbl,member_tbl WHERE file_tbl.is_deleted=$is_deleted AND file_tbl.user_id= member_tbl.id ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
			
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM file_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	
	
    public function getdetails($id) 
	{
		$sql = "SELECT file_tbl.id, file_tbl.file_title,file_tbl.description,file_tbl.file_name,file_tbl.approved FROM file_tbl WHERE  is_deleted=0 AND file_tbl.id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['file_title'] = $row['file_title'];
			  $data['file_name'] = $row['file_name'];
			  $data['description'] = $row['description'];             	                            
			  $data['approved'] = $row['approved'];			  
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    	
	
	public function del($id)
	{
		
		$sql = "SELECT * FROM file_tbl WHERE file_tbl.id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['file_name'] = $row['file_name'];			  
            }			
            $filepath='upload_file/'.$data['file_name'] ; 
			if (file_exists($filepath)) { unlink ($filepath); }
	    }
		
		$arr = array('is_deleted'=>1);
		$this->db->where('id',$id);
		if($this->db->update('file_tbl',$arr))
		{
			 $data['success']="File deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT file_tbl.id,file_tbl.file_title,file_tbl.file_name,file_tbl.approved,file_tbl.uploaded_date,member_tbl.user_id,member_tbl.name FROM file_tbl,member_tbl WHERE file_tbl.is_deleted=0 AND file_tbl.user_id= member_tbl.id AND file_tbl.file_title LIKE '%$s%' ORDER BY file_tbl.id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM file_tbl WHERE is_deleted=0 AND file_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>