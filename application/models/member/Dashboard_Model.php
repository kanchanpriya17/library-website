<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_user_details($id)
	{
		$sql = "SELECT * FROM member_tbl WHERE id='$id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
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
	
    public function msg()
	{
		$sql = "SELECT * FROM post_tbl WHERE post_id='142'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}	
        

	
}	
?>