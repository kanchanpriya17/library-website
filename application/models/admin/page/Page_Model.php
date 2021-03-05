<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Page_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
        $description=$data['description'];	
		
		$permalink=$data['title'];
		$permalink = str_replace(' ', '-', $permalink); 
        $permalink = preg_replace('/[^A-Za-z0-9\-]/', '', $permalink); 
        $permalink = preg_replace('/-+/', '-', $permalink);	
		$permalink =strtolower($permalink);
			 		 
		$arr = array('id' =>'','title'=>$data['title'],'permalink'=>$permalink,'sub_title'=>$data['sub_title'],'image_name'=>$data['image_name'],'header_image'=>$data['header_image'],'description'=>$description,'parent_page_id'=>$data['parent_page_id'], 'is_deleted'=>'' );
		if($this->db->insert('page_tbl',$arr))
		{
			 $data['success']="Page created successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM page_tbl WHERE is_deleted=$is_deleted ORDER BY id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM page_tbl WHERE is_deleted=0 ');
      return  $query->num_rows();
    }
	public function loadpage()
	{
		
		
        $this->db->where('is_deleted',0);
		$this->db->order_by("id", "asc");
		$val = $this->db->get("page_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function check_page($page) 
	{
		//$page=mysql_real_escape_string($page);
		$sql = "SELECT * FROM page_tbl WHERE title=".$this->db->escape($page)." AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Page is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
	  public function check_page2($page,$id) 
	 {
		//$page=mysql_real_escape_string($page);
		$sql = "SELECT * FROM page_tbl WHERE title=".$this->db->escape($page)." AND id!='$id' AND is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This page is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND id=$id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['title'];
			  $data['sub_title'] = $row['sub_title'];
			  $data['image_name'] = $row['image_name'];
			  $data['header_image']=$row['header_image'];
			  $data['description'] =$row['description'];
			  $data['parent_page_id'] =$row['parent_page_id'];
			 
            }
			if($data['parent_page_id']!='0')
			{
				$sql = "SELECT title FROM page_tbl WHERE is_deleted=0 AND id=".$data['parent_page_id']."";
				$val = $this->db->query($sql);	
				foreach ($val->result_array() as $row) 
				{
					$data['parent_page_name'] =$row['title'];
				}
			}
			else
			{
				$data['parent_page_name'] ='select';
			}
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		 
		$description=$data['description'];	
		$permalink=$data['title'];
		$permalink = str_replace(' ', '-', $permalink); 
        $permalink = preg_replace('/[^A-Za-z0-9\-]/', '', $permalink); 
        $permalink = preg_replace('/-+/', '-', $permalink);	
		$permalink =strtolower($permalink);
		$arr = array('title'=>$data['title'],'sub_title'=>$data['sub_title'], 'image_name'=>$data['image_name'],'header_image'=>$data['header_image'],'description'=>$description,'parent_page_id'=>$data['parent_page_id'],'is_deleted'=>'' );
		$this->db->where('id',$data['id']);
		if($this->db->update('page_tbl',$arr))
		{
			 $data['success']="page updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		$arr = array('is_deleted'=>1);
		$this->db->where('id',$id);
		if($this->db->update('page_tbl',$arr))
		{
			 $data['success']="Page deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND title LIKE '%$s%' ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM page_tbl WHERE is_deleted=0 AND title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>