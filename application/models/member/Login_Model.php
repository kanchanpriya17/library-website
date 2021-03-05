<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
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
	public function login($data) 
	{

		$password  = md5($data['password']);
		$user_id  = $data['user_name'];
		$sql = "SELECT * FROM member_tbl WHERE user_id = ? AND password = ? AND is_deleted=0";
		$val = $this->db->query($sql,array($user_id ,$password));
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['name'] = $row['name'];
			  $data['id'] = $row['id'];
			  $data['user_id'] = $row['user_id'];
			
            }			
           return $data;
		 
	    }
		else 
		  return false;
    }
	
	
	
	
}	
?>