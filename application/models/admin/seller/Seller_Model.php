<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Seller_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function add($data) 
	{
       
		/*$arr = array('id' =>'', 'name'=>$data['name'],'email'=>$data['email'],'is_deleted'=>'' );*/
		$arr = array('car_id' =>'','seller_name'=>$data['seller_name'],'seller_phone'=>$data['seller_phone'],'seller_email'=>$data['seller_email'],'brand'=>$data['car_brand'],'model'=>$data['car_model'],'running'=>$data['running'],'years'=>$data['years'],'selling_price'=>$data['selling_price'],'condition'=>$data['condition'],'is_deleted'=>'' );
		
		
			if($this->db->insert('car_tbl',$arr))
			{
				 $data['msg']="Your request for selling car is successful.";
				 return $data;	
			}
			else
				return false;
				         	
    }
	/*
	
	
	
	
	public function getall($limit,$start,$is_deleted) 
	{
		//$sql = "SELECT * FROM email_subscriber_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT 0,1";
		$this->db->limit($limit,$start);
        $this->db->where('is_deleted',$is_deleted);
		//$this->db->where('id >',1);
		$this->db->order_by("car_id", "asc");
		$val = $this->db->get("car_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	*/
	
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT *FROM enquiry_tbl WHERE doctor_is_deleted=0 ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM car_tbl WHERE is_deleted=0');
      return  $query->num_rows();
	 
      
    }
	
	
	
	
	
	
	/*
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT *  FROM car_tbl WHERE brand LIKE '%$s%' AND is_deleted=0 ORDER BY car_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	*/
	
	
	
	

	
	
	
	
	
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM car_tbl WHERE is_deleted=0 AND brand LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
   
	
	
}	
?>