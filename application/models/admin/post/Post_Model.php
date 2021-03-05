<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Post_Model extends CI_Model
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
		
		$arr = array('post_id' =>'', 'post_title'=>$data['title'],'post_sub_title'=>$data['sub_title'],'post_image_name'=>$data['image_name'],'category_id'=>$data['category_id'],'post_description'=>$description,'post_date'=>$dt,'post_is_deleted'=>'' );
		if($this->db->insert('post_tbl',$arr))
		{
			 $data['success']="Post inserted successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT post_id,post_title,post_sub_title,title,post_description FROM post_tbl,category_tbl WHERE post_tbl.category_id=category_tbl.id  AND post_is_deleted=$is_deleted ORDER BY post_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM post_tbl WHERE post_is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	public function loadcat1()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("category_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
    public function getdetails($id) 
	{
		$sql = "SELECT post_id,post_title,post_sub_title,category_id,title,post_description,post_image_name FROM post_tbl,category_tbl WHERE  post_id=$id AND post_is_deleted=0 AND category_id=category_tbl.id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['post_id'] = $row['post_id'];	
			  $data['post_title'] = $row['post_title'];
			  $data['post_sub_title'] = $row['post_sub_title'];
			  $data['post_image_name'] = $row['post_image_name'];
			  $data['post_description'] = $row['post_description'];
			  $data['category_id']=$row['category_id'];
			  $data['title']=$row['title'];
			  
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
		
		 		  
		$arr = array('post_title'=>$data['title'],'post_sub_title'=>$data['sub_title'], 'post_image_name'=>$data['image_name'],'post_description'=>$description,'category_id'=>$data['category_id'],'post_date'=>$dt,'post_is_deleted'=>'' );
		$this->db->where('post_id',$data['id']);
		if($this->db->update('post_tbl',$arr))
		{
			 $data['success']="post updated successfully !!!";
             return $data;	
		}
		else
			return false;
									
		  
			              		
	}	
	
	public function del($id)
	{
		$arr = array('post_is_deleted'=>1);
		$this->db->where('post_id',$id);
		if($this->db->update('post_tbl',$arr))
		{
			 $data['success']="Post deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT post_id,post_title,post_sub_title,title,post_description FROM post_tbl,category_tbl WHERE post_tbl.category_id=category_tbl.id  AND post_is_deleted=0 AND post_title LIKE '%$s%' ORDER BY post_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM post_tbl WHERE post_is_deleted=0 AND post_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>