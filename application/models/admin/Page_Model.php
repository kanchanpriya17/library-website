<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Page_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
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
	
	public function submenu($id) 
	{

		$sql = "SELECT * FROM page_tbl WHERE is_deleted=0 AND parent_page_id=$id";
		$val = $this->db->query($sql);
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
	function record_search($s,$start,$limit,$order)
	{
		$sql="SELECT * FROM gallery_tbl WHERE (gallery_title LIKE '%$s%' OR gallery_description='%$s%' ) AND gallery_is_deleted=0 ORDER BY gallery_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function record_search_record_count($s) 
	{

		$query = $this->db->query("SELECT * FROM gallery_tbl WHERE (gallery_title LIKE '%$s%' OR gallery_description='%$s%' ) AND gallery_is_deleted=0");
		return  $query->num_rows();
         	
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
	
	public function video_categories()
	{
		$sql = "SELECT * FROM video_category_tbl WHERE is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function blogs($limit,$start,$is_deleted,$order,$cat)
	{
		$sql="SELECT * FROM post_tbl WHERE category_id='$cat' AND post_is_deleted=0 ORDER BY post_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function news($limit,$start,$order)
	{
		$sql="SELECT * FROM news_tbl WHERE is_deleted=0 ORDER BY news_date $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	/*public function clients($limit,$start,$is_deleted,$order)
	{
		$sql="SELECT * FROM clients_tbl WHERE is_deleted=0 ORDER BY id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}*/
	public function doctor($limit,$start,$is_deleted,$order)
	{
		$sql="SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0 ORDER BY doctor_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function members($limit,$start,$is_deleted,$order)
	{
		$sql="SELECT * FROM member_tbl WHERE  is_deleted=0 ORDER BY member_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
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
	
	public function get_post_by_cat_service($cat_id,$limit,$order) 
	{

		$sql = "SELECT * FROM post_tbl WHERE category_id=$cat_id AND  post_is_deleted=0 ORDER BY post_id $order LIMIT 0,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	public function get_post_by_cat_pag($cat_id,$start,$limit,$order) 
	{

		$sql = "SELECT * FROM post_tbl WHERE category_id=$cat_id AND  post_is_deleted=0 ORDER BY post_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	public function record_count($cat_id) 
	{

		$sql = "SELECT count(*) as count FROM post_tbl WHERE category_id=$cat_id AND post_is_deleted=0";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
         	
    }
	
	public function blog_record_count($cat) 
	{

		$query = $this->db->query("SELECT * FROM post_tbl WHERE category_id=$cat AND post_is_deleted=0");
		return  $query->num_rows();
         	
    }
	
	public function brand_record_count($s) 
	{

		$query = $this->db->query("SELECT * FROM brand_tbl WHERE is_deleted=0 AND event_name LIKE '%$s%'");
		return  $query->num_rows();
         	
    }
	public function brand_record_count_all() 
	{

		$query = $this->db->query("SELECT * FROM brand_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function award_record_count() 
	{

		$query = $this->db->query("SELECT * FROM award_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function news_record_count() 
	{

		$query = $this->db->query("SELECT * FROM news_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function products_record_count() 
	{

		$query = $this->db->query("SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function test_record_count() 
	{

		$query = $this->db->query("SELECT * FROM test_tbl");
		return  $query->num_rows();
         	
    }
	public function products_record_count1($album) 
	{
		$query = $this->db->query("SELECT * FROM gallery_tbl,album_tbl WHERE gallery_is_deleted=0 AND album_id=$album AND album_id=id");
		return  $query->num_rows();	
    }
	/*public function clients_record_count() 
	{

		$query = $this->db->query("SELECT * FROM clients_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }*/
	public function doctor_record_count() 
	{

		$query = $this->db->query("SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function albums_record_count() 
	{

		$query = $this->db->query("SELECT * FROM album_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	public function member_record_count() 
	{

		$query = $this->db->query("SELECT * FROM member_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	
	
	public function get_page_details($permalink)
	{
		$sql = "SELECT * FROM page_tbl WHERE permalink='$permalink'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function country()
	{
		$sql = "SELECT * FROM country_tbl";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		   return $val->result_array();
		else 
		  return false;
	}
	
	public function albums($limit,$start,$order)
	{
		$sql="SELECT * FROM album_tbl WHERE is_deleted=0  ORDER BY id $order LIMIT $start,$limit";
	
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function brand($limit,$start,$order,$s) 
	{

		
		$sql="SELECT * FROM brand_tbl WHERE is_deleted=0 AND event_name LIKE '%$s%' ORDER BY event_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
         	
    }
	public function brand_all($limit,$start,$order) 
	{

		
		$sql="SELECT * FROM brand_tbl WHERE is_deleted=0  ORDER BY event_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
         	
    }
	public function products($limit,$start,$order)
	{
		$sql="SELECT * FROM doctor_tbl WHERE doctor_is_deleted=0 ORDER BY doctor_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function test($limit,$start,$order)
	{
		$sql="SELECT * FROM test_tbl  ORDER BY id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function products1($limit,$start,$order,$album)
	{
		$sql="SELECT * FROM gallery_tbl,album_tbl WHERE gallery_is_deleted=0 AND album_id=$album AND album_id=id ORDER BY gallery_id $order LIMIT $start,$limit";
		
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	public function album_record_count() 
	{

		$query = $this->db->query("SELECT * FROM album_tbl WHERE is_deleted=0");
		return  $query->num_rows();
         	
    }
	
	public function gallery_record_count() 
	{
	  /*$query = $this->db->query("SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0 AND album_id=$album ");*/
	  $query = $this->db->query("SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0");
      return  $query->num_rows();
    }
	public function partner_record_count() 
	{
	  /*$query = $this->db->query("SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0 AND album_id=$album ");*/
	  $query = $this->db->query("SELECT * FROM award_tbl WHERE is_deleted=0");
      return  $query->num_rows();
    }
	
	public function clients_record_count() 
	{
	  /*$query = $this->db->query("SELECT * FROM gallery_tbl WHERE gallery_is_deleted=0 AND album_id=$album ");*/
	  $query = $this->db->query("SELECT * FROM news_tbl WHERE is_deleted=0");
      return  $query->num_rows();
    }
	public function gallery_getall($limit,$start,$order) 
	{
		
		/*$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,gallery_image_name,title,gallery_description FROM gallery_tbl,album_tbl WHERE gallery_tbl.album_id=album_tbl.id  AND gallery_is_deleted=0 AND gallery_tbl.album_id=$album ORDER BY gallery_id DESC LIMIT $start,$limit";*/
		$sql = "SELECT * FROM gallery_tbl WHERE  gallery_is_deleted=0 ORDER BY gallery_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function partners($limit,$start,$is_deleted) 
	{
		
		/*$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,gallery_image_name,title,gallery_description FROM gallery_tbl,album_tbl WHERE gallery_tbl.album_id=album_tbl.id  AND gallery_is_deleted=0 AND gallery_tbl.album_id=$album ORDER BY gallery_id DESC LIMIT $start,$limit";*/
		$sql = "SELECT * FROM test_tbl ORDER BY id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function clients($limit,$start,$is_deleted) 
	{
		
		/*$sql = "SELECT gallery_id,gallery_title,gallery_sub_title,gallery_image_name,title,gallery_description FROM gallery_tbl,album_tbl WHERE gallery_tbl.album_id=album_tbl.id  AND gallery_is_deleted=0 AND gallery_tbl.album_id=$album ORDER BY gallery_id DESC LIMIT $start,$limit";*/
		$sql = "SELECT * FROM news_tbl WHERE  is_deleted=0 ORDER BY news_id DESC LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	public function check_page($permalink)
	{
		$sql="SELECT * FROM page_tbl WHERE is_deleted=0 AND permalink='$permalink'";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			 return $val->result_array();		
		}
		else 
		  return false;
	}
	
	public function video_record_count() 
	{
		$query = $this->db->query("SELECT * FROM staff_tbl WHERE is_deleted=0");
		return  $query->num_rows();         	
    }
	public function videos($limit,$start,$is_deleted,$order) 
	{
		$sql = "SELECT * FROM staff_tbl WHERE is_deleted=0  ORDER BY staff_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		   return $val->result_array();
		}
		else 
		  return FALSE;
         	
    }
	
	/*public function service() 
	{

		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0  ORDER BY id ASC";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		   return $val->result_array();
		}
		else 
		  return FALSE;
         	
    }*/
	public function award($limit,$start,$order) 
	{

		$sql = "SELECT * FROM award_tbl WHERE is_deleted=0  ORDER BY award_id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		   return $val->result_array();
		}
		else 
		  return FALSE;
         	
    }
	
	public function store_record_count($s) 
	{

		$query = $this->db->query("SELECT * FROM service_tbl WHERE is_deleted=0 AND title LIKE '%$s%'");
		return  $query->num_rows();
         	
    }
	public function store($limit,$start,$order) 
	{

		$sql = "SELECT * FROM service_tbl WHERE is_deleted=0  ORDER BY id $order LIMIT $start,$limit";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
		   return $val->result_array();
		}
		else 
		  return FALSE;
         	
    }
}	
?>