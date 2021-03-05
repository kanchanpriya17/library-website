<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	

	
    public function update($data)
	{
		$password= md5($data['password']);	   
		$sql = "UPDATE user_tbl SET password='$password' WHERE id=1";
		$val = $this->db->query($sql);
		if($val) 
		{
			$data['success']="Password Changed Successfully";
			
		}
		return  $data;
		
		
	}	
	 public function checkpassword($old_pass)
	{
		$old_password= md5(trim($old_pass));		
		$sql = "SELECT * FROM user_tbl WHERE  password='$old_password' AND id=1";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return true;
			
		}
		else
		{
		  return false;
		}
	
		
		
	}	
	
	
	
	
}	
?>