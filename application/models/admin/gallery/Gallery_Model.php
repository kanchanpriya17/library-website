<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Gallery_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	public function save($data) 
	{         
         /*$dt = new DateTime();
         $dt= $dt->format('Y-m-d');
		 $gallery_description=$data['gallery_description'];
		
		$arr = array('gallery_id' =>'', 'gallery_title'=>$data['gallery_title'],'gallery_sub_title'=>$data['gallery_sub_title'],'gallery_image_name'=>$data['gallery_image_name'],'album_id'=>$data['album_id'],'gallery_description'=>$gallery_description,'gallery_date'=>$dt,'gallery_is_deleted'=>'' );
		*/
		if($this->db->insert('gallery_tbl',$data))
		{
			 $data['success']="Product added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	/*
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,title,gallery_description FROM gallery_tbl,album_tbl WHERE gallery_tbl.album_id=album_tbl.id  AND gallery_is_deleted=$is_deleted ORDER BY gallery_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	*/
	
	
		public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,gallery_description FROM gallery_tbl WHERE gallery_is_deleted=$is_deleted ORDER BY gallery_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	
	
	
	
	
	
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	public function loadalbum()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("album_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
	
	}
	
	
	
	/*
    public function getdetails($id) 
	{
		
		$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,album_id,title,gallery_description,gallery_image_name FROM gallery_tbl,album_tbl WHERE  gallery_id=$id AND gallery_is_deleted=0 AND gallery_tbl.album_id=album_tbl.id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['gallery_id'] = $row['gallery_id'];	
			  $data['gallery_title'] = $row['gallery_title'];
			  $data['gallery_sub_title'] = $row['gallery_sub_title'];
			  $data['gallery_image_name'] = $row['gallery_image_name'];
			  $data['gallery_description'] = $row['gallery_description'];
			  $data['album_id']=$row['album_id'];
			  $data['title']=$row['title'];
			  
            }			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
	
	*/
	
	
	 public function getdetails($id) 
	{
		
		$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,gallery_description,gallery_image_name FROM gallery_tbl WHERE gallery_is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['gallery_id'] = $row['gallery_id'];	
			  $data['gallery_title'] = $row['gallery_title'];
			  $data['gallery_sub_title'] = $row['gallery_sub_title'];
			  $data['gallery_image_name'] = $row['gallery_image_name'];
			  $data['gallery_description'] = $row['gallery_description'];
			  //$data['album_id']=$row['album_id'];
			  //$data['title']=$row['title'];
			  
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
		 $gallery_description=$data['gallery_description'];
		
		 		  
		$arr = array('gallery_title'=>$data['gallery_title'],'gallery_sub_title'=>$data['gallery_sub_title'], 'gallery_image_name'=>$data['gallery_image_name'],'gallery_description'=>$gallery_description,'gallery_date'=>$dt,'gallery_is_deleted'=>'' );
		$this->db->where('gallery_id',$data['gallery_id']);
		if($this->db->update('gallery_tbl',$arr))
		{
			 $data['success']="Product updated successfully !!!";
             return $data;	
		}
		else
			return false;
									
		  
			              		
	}	
	
	public function del($id)
	{
		$arr = array('gallery_is_deleted'=>1);
		$this->db->where('gallery_id',$id);
		if($this->db->update('gallery_tbl',$arr))
		{
			 $data['success']="Product deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,title,gallery_description FROM gallery_tbl,album_tbl WHERE gallery_tbl.album_id=album_tbl.id  AND gallery_is_deleted=0 AND gallery_title LIKE '%$s%' ORDER BY gallery_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0 AND gallery_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
}	
?>