<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Siteoffice_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $siteoffice_description=$data['siteoffice_description'];		 		 
		$arr = array('siteoffice_id' =>'','siteoffice_title'=>$data['siteoffice_title'],'siteoffice_sub_title'=>$data['siteoffice_sub_title'],'siteoffice_image_name'=>$data['siteoffice_image_name'],'siteoffice_description'=>$siteoffice_description, 'is_deleted'=>'' );
		if($this->db->insert('siteoffice_tbl',$arr))
		{
			 $data['success']="Siteoffice Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM siteoffice_tbl WHERE is_deleted=$is_deleted ORDER BY siteoffice_id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM siteoffice_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("siteoffice_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
    public function getdetails($associate_id) 
	{
		$sql = "SELECT * FROM siteoffice_tbl WHERE is_deleted=0 AND siteoffice_id=$siteoffice_id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['siteoffice_id'] = $row['siteoffice_id'];	
			  $data['siteoffice_title'] = $row['siteoffice_title'];
			  $data['siteoffice_sub_title'] = $row['siteoffice_sub_title'];
			  $data['siteoffice_image_name'] = $row['siteoffice_image_name'];
			  $data['siteoffice_description'] =$row['siteoffice_description'];
			 
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$siteoffice_description=$data['siteoffice_description'];		
		$arr = array('siteoffice_title'=>$data['siteoffice_title'],'siteoffice_sub_title'=>$data['siteoffice_sub_title'], 'siteoffice_image_name'=>$data['siteoffice_image_name'],'siteoffice_description'=>$siteoffice_description,'is_deleted'=>'' );
		$this->db->where('siteoffice_id',$data['siteoffice_id']);
		if($this->db->update('siteoffice_tbl',$arr))
		{
			 $data['success']="Siteoffice Updated Successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($siteoffice_id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('siteoffice_id',$siteoffice_id);
		if($this->db->update('siteoffice_tbl',$arr))
		{
			 $data['success']="Siteoffice Deleted Successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM siteoffice_tbl WHERE is_deleted=0 AND siteoffice_title LIKE '%$s%' ORDER BY siteoffice_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM siteoffice_tbl WHERE is_deleted=0 AND siteoffice_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>