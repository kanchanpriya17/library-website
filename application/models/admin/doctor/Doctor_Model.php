<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Doctor_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	
	public function save($data) 
	{         
         
		
		$arr = array('doctor_id' =>'', 'doctor_name'=>$data['doctor_name'],'doctor_designation'=>$data['doctor_designation'],'doctor_description'=>$data['doctor_description'],'doctor_is_deleted'=>'','doctor_image_name'=> $data['doctor_image_name']);
		if($this->db->insert('doctor_tbl',$arr))
		{
			 $data['success']="Gallery Image Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	
	
	
	
	
	
	
	
    
    
    
    
    
    
    
    
    
    
    
    public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT *FROM doctor_tbl  WHERE doctor_is_deleted=0 ORDER BY doctor_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM doctor_tbl WHERE  doctor_id=$id AND doctor_is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['doctor_id'] = $row['doctor_id'];	
			  $data['doctor_name'] = $row['doctor_name'];
			  $data['doctor_designation'] = $row['doctor_designation'];
			  $data['doctor_description'] = $row['doctor_description'];
			  $data['doctor_image_name'] = $row['doctor_image_name'];
			
			 
			  
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    
    
    
    
    public function update($data)
	{
		 
		
		 		  
		$arr = array('doctor_name'=>$data['doctor_name'],'doctor_designation'=>$data['doctor_designation'], 'doctor_description'=>$data['doctor_description'],'doctor_image_name'=>$data['doctor_image_name'],'doctor_is_deleted'=>'' );
		$this->db->where('doctor_id',$data['doctor_id']);
		if($this->db->update('doctor_tbl',$arr))
		{
			 $data['success']="Gallery Image updated successfully !!!";
             return $data;	
		}
		else
			return false;
									
		  
			              		
	}	
	
	public function del($id)
	{
		$arr = array('doctor_is_deleted'=>1);
		$this->db->where('doctor_id',$id);
		if($this->db->update('doctor_tbl',$arr))
		{
			 $data['success']="Gallery Image deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0 AND doctor_name LIKE '%$s%' ORDER BY doctor_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0 AND doctor_name LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>