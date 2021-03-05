<?php

defined('BASEPATH') OR exit('No direct script access allowed');



Class Home_Model extends CI_Model

{
  
    public function __construct()

	{

		date_default_timezone_set("Asia/Calcutta");
		$this->load->database();
		
		/*
		function getUserIpAddr()
		{
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

		
	*/	
		
		
		
	

	}
	
	
	
	
	/*
	
	public function ip_address($data)
	{
	   
	     $dt=new DateTime();
		$dt=$dt->format('Y-m-d h:i:s');
		$arr = array('staff_id' =>'','name'=>$data['name'],'designation'=>$data['designation']);
		if($this->db->insert('staff_tbl',$arr))
		{
			/*  $data['success']="your  Submitted successfully !!!"; */
			
			/*
             return $data;	
		}
		else
			return false;

	}
	
	
	
	*/
	
	
	
	
	
	
	
	
	
	 public function user_login($event_time,$event_venue) 
	{
		$sql = "SELECT * FROM brand_tbl WHERE event_time='$event_time' AND event_venue='$event_venue'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;         
    }
	public function latest_event()
	{
		$dt=new DateTime();
		$dt=$dt->format('Y-m-d');
		$sql = "SELECT * FROM brand_tbl WHERE  is_deleted=0  AND event_date>'$dt'  ORDER BY event_date ASC LIMIT 0,1";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
	}
    public function testinsert($data) 
	{
        $dt=new DateTime();
		$dt=$dt->format('Y-m-d h:i:s');
		$arr = array('event_id' =>'','event_name'=>$data['event_name'],'event_venue1'=>$data['event_venue1'],'event_time'=>$data['event_time'],'event_venue'=>$data['event_venue']);
		if($this->db->insert('brand_tbl',$arr))
		{
			 $data['success']="your Form Submitted successfully !!!";
             return $data;	
		}
		else
			return false;
         	
    }
	public function insertbooknow($booknow)
	{
	$arr = array ('package' =>$data['package'],'noofmember'=>$data['noofmember'],'eventdate'=>$data['eventdate'],'fullname'=>$data['fullname'],'nationality'=>$data['nationality'],'email'=>$data['email'],'phoneno'=>$data['phoneno'],'address'=>$data['address'],'suggestion' =>$data['suggestion']);
	if($this->db->insert('booknow_tbl',$arr))
		{
			 $data['success']="your data Submitted successfully We will Contact You Soon!!!";
             return $data;	
		}
		else
		return false;
	
	
	}
public function saverecords($data)
{
   if($this->db->insert('cvupload_tbl',$data))
   {
	   return true;
   }
   else
   {
	   return false;
   }

}
public function insertenquiryrecords($data)
{
   if($this->db->insert('enquiry_tbl',$data))
   {
	   return true;
   }
   else
   {
	   return false;
   }

}
	
public function insertdealerrecords($data)
{
   if($this->db->insert('dealer_tbl',$data))
   {
	   return true;
   }
   else
   {
	   return false;
   }

}






	
public function insertcontactrecords($data)
{
   if($this->db->insert('contactus_tbl',$data))
   {
	   return true;
   }
   else
   {
	   return false;
   }

}
	
	
	
	public function insertinterstrecords($data)
{
   if($this->db->insert('interest_tbl',$data))
   {
	   return true;
   }
   else
   {
	   return false;
   }

}
	



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
function saverecords($name,$email,$mobile)
	{
	$query="insert into booknow_tbl values('','$name','$email','$mobile')";
	$this->db->query($query);
	}
	
	
	*/
	
	
	
	
	public function test_result($phone) 
	{
		$sql = "SELECT * FROM check_tbl WHERE phone='$phone' ORDER BY id ASC";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;         
    }
	public function menu() 

	{



		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND parent_page_id=0 AND id>=85 AND id<=119 ORDER BY id ASC";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }

	public function footer_menu() 

	{



		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND id!=94 AND ID!=96 AND id!=97 AND ID!=98 AND id!=102 ORDER BY id ASC";

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

	

	public function slider() 
	{
		$sql = "SELECT * FROM slider_tbl WHERE is_deleted=0 ORDER BY id ASC";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;         
    }

	

	function video_categories()

	{

		$sql = "SELECT * FROM video_category_tbl WHERE is_deleted=0";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

	}

	
    
    
    
	function staff()

	{

		$sql = "SELECT * FROM staff_tbl WHERE is_deleted=0";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

	}

	
    
    

	public function get_post($id) 

	{



		$sql = "SELECT * FROM post_tbl WHERE post_id=? AND  post_is_deleted=0";

		$val = $this->db->query($sql,array($id));

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }

	public function get_post_by_cat($cat_id,$start,$limit,$order) 
	{
		$sql = "SELECT * FROM post_tbl WHERE category_id=? AND  post_is_deleted=0 ORDER BY post_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql,array($cat_id));
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

	

	public function get_page_details($page_title)

	{

		$sql = "SELECT * FROM page_tbl WHERE title=?";

		$val = $this->db->query($sql,array($page_title));

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

	}

	

	public function gallery($start,$limit) 
	{
		$sql = "SELECT * FROM gallery_tbl WHERE  gallery_is_deleted=0   ORDER BY gallery_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}
    public function album($start,$limit) 
	{
		$sql = "SELECT * FROM album_tbl WHERE  is_deleted=0 AND id>1 ORDER BY id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}


/*

	 public function events($start,$limit) 
	{
		$dt=new DateTime();
		$dt=$dt->format('Y-m-d');
		$sql = "SELECT * FROM brand_tbl WHERE  is_deleted=0  AND event_date>'$dt'  ORDER BY event_date ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}
	
	*/
	
	
	 public function events($start,$limit) 
	{
		$sql = "SELECT * FROM brand_tbl WHERE  is_deleted=0 ORDER BY event_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}
    
    
    	 public function equipment($start,$limit) 
	{
		$sql = "SELECT * FROM equipment_tbl WHERE  is_deleted=0 ORDER BY equipment_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}
    
    
    
    
    	 public function siteoffice($start,$limit) 
	{
		$sql = "SELECT * FROM siteoffice_tbl WHERE  is_deleted=0 ORDER BY siteoffice_id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	

		
	}



	
	

	public function doctors($start,$limit) 

	{

		

		$sql = "SELECT * FROM doctor_tbl WHERE  doctor_is_deleted=0  ORDER BY doctor_id ASC LIMIT $start,$limit";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		{

			return $val->result_array();

		}	

		

	}

    
    	public function associate($start,$limit) 

	{

		

		$sql = "SELECT * FROM associate_tbl WHERE is_deleted=0  ORDER BY associate_id ASC LIMIT $start,$limit";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		{

			return $val->result_array();

		}	

		

	}

    
    
    
    
    
   
	

	

	public function product_category($start,$limit,$order) 

	{



		$sql = "SELECT * FROM album_tbl WHERE is_deleted=0 AND id >1 ORDER BY id $order LIMIT $start,$limit";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }

	public function service($start,$limit) 
	{
		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0 ORDER BY id ASC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
    }

    
    
    
    
	public function award($start,$limit) 
	{

		$sql = "SELECT * FROM award_tbl WHERE is_deleted=0 ORDER BY award_id ASC LIMIT $start,$limit ";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }
	
	
	public function expression($start,$limit) 
	{

		$sql = "SELECT * FROM interest_tbl WHERE is_deleted=0 ORDER BY interest_id ASC LIMIT $start,$limit ";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }
	
	
    public function test($start,$limit) 
	{

		$sql = "SELECT * FROM test_tbl  ORDER BY id ASC LIMIT $start,$limit ";

		$val = $this->db->query($sql);

		if($val->num_rows() > 0) 

		   return $val->result_array();

		else 

		  return false;

         	

    }
	public function news($start,$limit) 
	{
		$sql = "SELECT * FROM news_tbl WHERE is_deleted=0 ORDER BY news_id ASC LIMIT $start,$limit ";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	
	public function diseases($start,$limit,$order) 
	{
		$sql = "SELECT * FROM news_tbl WHERE is_deleted=0 ORDER BY news_id $order LIMIT $start,$limit ";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	
	public function awards($start,$limit,$order) 
	{
		$sql = "SELECT * FROM award_tbl WHERE is_deleted=0 ORDER BY award_id $order LIMIT $start,$limit ";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
     }


}	

?>