<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Registration_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	public function register($data) 
	{
		
		$response=array();
		$dt = new DateTime();
        $dt= $dt->format('Y-m-d');
		
		
		$sql1 = "SELECT * FROM member_tbl WHERE user_id = ? AND is_deleted=0";
		$val1 = $this->db->query($sql1,array($data['user_id']));
		
		$sql2 = "SELECT * FROM member_tbl WHERE email = ? AND is_deleted=0";
		$val2 = $this->db->query($sql2,array($data['email']));
		
		if($val1->num_rows() > 0)	
			$response['error1']="This User ID is already existing.Please Enter another User ID";
		else
		  $response['error1']='';
	  
	    if($val2->num_rows() > 0)
			$response['error2']="This Email is already existing.Please Enter another Email Address";
		else
		  $response['error2']='';
       
        if($val1->num_rows()==0 && $val2->num_rows()==0)
		{		
			$arr = array('id' =>'','name'=>trim($data['name']),'user_id'=>trim($data['user_id']),'email'=>trim($data['email']),'password'=>md5($data['password']),'phone_no'=>trim($data['phone_no']),'mob_no'=>trim($data['mob_no']),'country'=>trim($data['country']),'address'=>trim($data['address']),'joined_date'=>$dt,'is_deleted'=>'' );
			if($this->db->insert('member_tbl',$arr))
			{
				 $response['msg']=$data['name']." your Registration Completed Successfully !!! Click here to login <a href='".base_url()."member'>Login</a> ";
				 
			}
			else
			{
				 $response['msg']=$this->db->_error_message();
				
			}
		}
		else
         $response['msg']='';
	 
         return $response; 		
		
    }
    
	
	
}	
?>