<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function login($data) 
	{

		$password  = md5($data['password']);
		$user_name  = $data['user_name'];
		$sql = "SELECT user_name FROM user_tbl WHERE user_name = ? AND password = ? AND is_deleted=0";
		$val = $this->db->query($sql,array($user_name ,$password));
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['user_name'] = $row['user_name'];
			
            }			
           return $data;
		 
	    }
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
	
	
}	
?>