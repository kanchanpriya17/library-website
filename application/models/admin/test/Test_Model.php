<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Test_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function save($data) 
	{
      
	    $dt=new DateTime();
		$dt=$dt->format("Y-m-d");
		$arr = array('id' =>'','test_title'=>$data['title'],'test_desc'=>$data['desc'],'test_image'=>$data['image'],'test_rate'=>$data['rate'],'test_date'=>$dt );
		if($this->db->insert('test_tbl',$arr))
		{
			 $data['success']="Event Added successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	
	public function getall($limit,$start,$is_deleted) 
	{
		$sql = "SELECT * FROM test_tbl  ORDER BY id desc LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function record_count() 
	{
	  $query = $this->db->query('SELECT * FROM test_tbl');
      return  $query->num_rows();
    }
	public function loadtest()
	{
		
		
       
		$this->db->order_by("id", "asc");
		$val = $this->db->get("test_tbl");
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function check_test($title) 
	{
		$title=mysql_real_escape_string($title);
		$sql = "SELECT * FROM test_tbl WHERE test_title=".$this->db->escape($title)."";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Event is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
	  public function check_test2($title,$id) 
	 {
		$title=mysql_real_escape_string($title);
		$sql = "SELECT * FROM test_tbl WHERE test_title=".$this->db->escape($title)." AND id!='$id'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		    $data['msg'] = "This Event is already Existing pleaset try another one !!!";				 		
           return $data;
		 
	    }
		else 
		  return false;
		
	}
	
    public function getdetails($id) 
	{
		$sql = "SELECT * FROM test_tbl  WHERE id=$id";
		$val = $this->db->query($sql);
		
		
		if($val->num_rows() > 0) 
		{
			foreach ($val->result_array() as $row) 
			{
			  $data['id'] = $row['id'];	
			  $data['title'] = $row['test_title'];
			  $data['rate'] = $row['test_rate'];
			  $data['desc'] = $row['test_desc'];
			  $data['image']=$row['test_image'];
			  
			 
            }
			
           return $data;
		 
	    }
		else 
		  return false;
		
	}
    
    public function update($data)
	{
		$dt=new DateTime(); 
		$dt=$dt->format("Y-m-d");
		$arr = array('test_title'=>$data['title'],'test_desc'=>$data['desc'],'test_image'=>$data['image'],'test_rate'=>$data['rate'],'test_date'=>$dt );
		$this->db->where('id',$data['id']);
		if($this->db->update('test_tbl',$arr))
		{
			 $data['success']="Upcoming Projects updated successfully !!!";
             return $data;	
		}
		else
			return false;
	}	
	
	public function del($id)
	{
		
		$this->db->where('id',$id);
		if($this->db->delete('test_tbl'))
		{
			 $data['success']="Upcoming Projects deleted successfully !!!";
             return $data;	
		}
		else
			return false;
		
	}
	
	public function search_getall($limit,$start,$is_deleted,$s) 
	{
		
		$sql = "SELECT * FROM test_tbl WHERE  test_title LIKE '%$s%' ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
	public function search_record_count($s) 
	{
	  $query = $this->db->query("SELECT * FROM test_tbl WHERE test_title LIKE '%$s%' ");
      return  $query->num_rows();
    }
	
	
}	
?>