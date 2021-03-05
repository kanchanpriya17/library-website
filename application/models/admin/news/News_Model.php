<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	public function save($data) 
	{         
         $dt = new DateTime();
         $dt= $dt->format('Y-m-d');
		 $description=$data['description'];
		
		$arr = array('news_id' =>'','news_title'=>$data['title'],'news_image_name'=>$data['image_name'],'news_description'=>$description,'news_date'=>$dt,'is_deleted'=>'' );
		if($this->db->insert('news_tbl',$arr))
		{
			 $data['success']="News Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM news_tbl WHERE is_deleted=$is_deleted ORDER BY news_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM news_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM news_tbl WHERE news_id=$id AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['news_id'] = $row['news_id'];	
			  $data['news_title'] = $row['news_title'];
			  $data['news_sub_title'] = $row['news_sub_title'];
			  $data['news_image_name'] = $row['news_image_name'];
			  $data['news_description'] = $row['news_description'];
			  
			  
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
		 $description=$data['description'];
		
		 		  
		$arr = array('news_title'=>$data['title'],'news_sub_title'=>$data['sub_title'], 'news_image_name'=>$data['image_name'],'news_description'=>$description,'news_date'=>$dt,'is_deleted'=>'' );
		$this->db->where('news_id',$data['id']);
		if($this->db->update('news_tbl',$arr))
		{
			 $data['success']="News updated successfully !!!";
             return $data;	
		}
		else
			return false;
									
		  
			              		
	}	
	
	public function del($id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('news_id',$id);
		if($this->db->update('news_tbl',$arr))
		{
			 $data['success']="News  deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM news_tbl WHERE is_deleted=0 AND news_title LIKE '%$s%' ORDER BY news_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM news_tbl WHERE is_deleted=0 AND news_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>