<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subscriber_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	
		public function add($data) 
	{
       
		$arr = array('id' =>'','name'=>$data['name'],'email'=>$data['email'],'mobileno'=>$data['mobileno'],'address'=>$data['address'],'requirment'=>$data['requirment'],'is_deleted'=>'' );
		$sql = "SELECT * FROM contactus_tbl WHERE email='".$data['email']."' AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    return false;
		 
	    }
		else
		{
			if($this->db->insert('contactus_tbl',$arr))
			{
				 $data['msg']="Thank you for Contact with us.";
				 return $data;	
			}
			else
				return false;
		}		         	
    }
	
	
	
	
	
	/*   
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM dealer_tbl WHERE ORDER BY id ASC LIMIT 0,1";
		$this->db->limit($limit,$start);
       // $this->db->where('is_deleted',$is_deleted);
		//$this->db->where('id >',1);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("dealer_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	*/
	

	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM contactus_tbl WHERE ORDER BY id ASC LIMIT 0,1";
		$this->db->limit($limit,$start);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("contactus_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	
	
	
	/*
	
	
	public function getall($limit,$start,$is_deleted) 
	{
		//$sql = "SELECT * FROM email_subscriber_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT 0,1";
		$this->db->limit($limit,$start);
        $this->db->where('is_deleted',$is_deleted);
		//$this->db->where('id >',1);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("email_subscriber_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
*/

	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM email_subscriber_tbl WHERE is_deleted=0');
      return  $query->num_rows();
	 
      
    }
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT *  FROM email_subscriber_tbl WHERE email LIKE '%$s%' AND is_deleted=0 ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM email_subscriber_tbl WHERE is_deleted=0 AND email LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
   
	
	
}	
?>