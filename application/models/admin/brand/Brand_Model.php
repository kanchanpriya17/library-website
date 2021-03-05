<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	public function save($data) 
	{         
        $dt = new DateTime();
         $dt= $dt->format('Y-m-d');
		 $event_description=$data['event_description'];
		 //$event_date=$data['event_date'];
		
		$arr = array('event_id' =>'', 'event_name'=>$data['event_name'],'event_time'=>$data['event_time'],'event_description'=>$event_description,'event_image_name'=>$data['event_image_name'],'is_deleted'=>'' );
		if($this->db->insert('brand_tbl',$arr))
		{
			 $data['success']="Other Product Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	/*
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM brand_tbl WHERE is_deleted=$is_deleted ORDER BY event_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	*/
	
	
	
	
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM brand_tbl WHERE is_deleted=$is_deleted ORDER BY event_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM brand_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM brand_tbl WHERE event_id=$id AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['event_id'] = $row['event_id'];	
			  $data['event_name'] = $row['event_name'];
			  //$data['event_date'] = $row['event_date'];
			  $data['event_time'] = $row['event_time'];
			  $data['event_venue'] = $row['event_venue'];
			   $data['event_venue1'] = $row['event_venue1'];
			    $data['event_venue2'] = $row['event_venue2'];
			  $data['event_image_name'] = $row['event_image_name'];
			  $data['event_description'] = $row['event_description'];
			  
			  
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 $dt = new DateTime();
         $dt= $dt->format('Y-m-d'); 
		$event_description=$data['event_description'];
		
		//$event_date=$data['event_date'];
		 		  
		$arr = array('event_name'=>$data['event_name'],'event_time'=>$data['event_time'],'event_description'=>$event_description,'event_venue'=>$data['event_venue'],'event_venue1'=>$data['event_venue1'],'event_image_name'=>$data['event_image_name'],'is_deleted'=>'' );
		$this->db->where('event_id',$data['event_id']);
		if($this->db->update('brand_tbl',$arr))
		{
			 $data['success']="Other Product updated successfully !!!";
             return $data;	
		}
		else
			return false;
									
		  
			              		
	}	
	
	public function del($id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('event_id',$id);
		if($this->db->update('brand_tbl',$arr))
		{
			 $data['success']="Other Product deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM brand_tbl WHERE is_deleted=0 AND event_name LIKE '%$s%' ORDER BY event_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM brand_tbl WHERE is_deleted=0 AND event_name LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>