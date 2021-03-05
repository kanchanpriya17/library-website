<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Video_Model extends CI_Model
{
    public function __construct()
	{        date_default_timezone_set("Asia/Calcutta");   
		$this->load->database();
	}
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT video_tbl.id, video_tbl.video_title,video_tbl.approved,video_tbl.uploaded_date,video_category_tbl.title,member_tbl.user_id,member_tbl.name FROM video_tbl,video_category_tbl,member_tbl WHERE video_tbl.video_category_id=video_category_tbl.id AND video_tbl.user_id= member_tbl.id AND video_tbl.is_deleted=$is_deleted ORDER BY video_tbl.id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	
	
	public function search_getall($s) 
	{
		$sql = "SELECT video_tbl.id, video_tbl.video_title,video_tbl.approved,video_tbl.uploaded_date,video_category_tbl.title,member_tbl.user_id,member_tbl.name FROM video_tbl,video_category_tbl,member_tbl WHERE video_tbl.video_category_id=video_category_tbl.id AND video_tbl.user_id= member_tbl.id AND video_tbl.is_deleted=0 AND video_tbl.video_title LIKE '%$s%' ORDER BY video_tbl.id DESC LIMIT 0,10";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM video_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	
	
	public function loadcat()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("video_category_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
    public function getdetails($id) 
	{
		$sql = "SELECT video_tbl.id, video_tbl.video_title,video_tbl.description,video_tbl.video_name,video_tbl.video_category_id,video_tbl.approved, video_category_tbl.title FROM video_tbl,video_category_tbl WHERE video_tbl.video_category_id=video_category_tbl.id  AND video_tbl.is_deleted=0 AND video_category_tbl.is_deleted=0 AND video_tbl.id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['video_title'] = $row['video_title'];
			  $data['video_name'] = $row['video_name'];
			  $data['description'] = $row['description'];             	
              $data['video_category_id'] = $row['video_category_id']; 
              $data['title'] = $row['title'];
			  $data['approved'] = $row['approved'];			  
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
		 $description=htmlspecialchars_decode($data['description']);
		 $description=str_replace('<div>','',$description);
		 $description=str_replace('</div>','',$description);
		
		  
		$arr = array('video_title'=>$data['video_title'],'description'=>$description,'video_category_id'=>$data['video_category_id'],'approved'=>'1' );
		$this->db->where('id',$data['id']);
		if($this->db->update('video_tbl',$arr))
		{
			 $data['success']="video Approved successfully !!!";
             return $data;	
		}
		else
			return false;
	}

     public function update1($data)
	{
		 $dt = new DateTime();
         $dt= $dt->format('Y-m-d'); 
		 $description=htmlspecialchars_decode($data['description']);
		 $description=str_replace('<div>','',$description);
		 $description=str_replace('</div>','',$description);
		
		  
		$arr = array('video_title'=>$data['video_title'],'description'=>$description,'video_category_id'=>$data['video_category_id'],'approved'=>'2' );
		$this->db->where('id',$data['id']);
		if($this->db->update('video_tbl',$arr))
		{
			 $data['success']="video Approved successfully !!!";
             return $data;	
		}
		else
			return false;
	}		
	
	public function del($id)
	{
		
		$sql = "SELECT * FROM video_tbl WHERE video_tbl.id=$id";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['video_name'] = $row['video_name'];			  
            }			
            $filepath='upload/'.$data['video_name'] ; 
			if (file_exists($filepath)) { unlink ($filepath); }
	    }
		
		$arr = array('is_deleted'=>1);
		$this->db->where('id',$id);
		if($this->db->update('video_tbl',$arr))
		{
			 $data['success']="video deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	
}	
?>