<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Logo_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
    
	
	public function getall() 
	{
		$sql = "SELECT * FROM settings_tbl WHERE  id='9'";		
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
   public function get_setting()
	{
		$sql = "SELECT * FROM settings_tbl ";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
    
    public function update($data)
	{
		$arr = array('value'=>$data['image_name']);
		$this->db->where('id',9);
		if($this->db->update('settings_tbl',$arr))
		{
			 $data['success']="Logo updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	
}	
?>