<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Post_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function menu() 
	{

		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND parent_page_id=0 AND id>=85 AND id<=119  ORDER BY id ASC";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	
	public function submenu($id) 
	{

		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND parent_page_id=$id";
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
	
	public function get_post_details($post_id)
	{
		$sql = "SELECT * FROM post_tbl WHERE post_id='$post_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	public function get_test_details($post_id)
	{
		$sql = "SELECT * FROM test_tbl WHERE id='$post_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	public function get_news_details($news_id)
	{
		$sql = "SELECT * FROM news_tbl WHERE news_id='$news_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function get_service_details($service_id)
	{
		$sql = "SELECT * FROM service_tbl WHERE id='$service_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	public function get_award_details($award_id)
	{
		$sql = "SELECT * FROM award_tbl WHERE award_id='$award_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function get_doctor_details($doctor_id)
	{
		$sql = "SELECT * FROM doctor_tbl WHERE doctor_id='$doctor_id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function get_product_details($gallery_id)
	{
		$sql = "SELECT * FROM gallery_tbl WHERE gallery_id='$gallery_id' AND gallery_is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
}	
?>