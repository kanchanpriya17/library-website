<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Controller extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin/Post_Model');
		$this->load->model('admin/Page_Model');
		$this->load->model('admin/Home_Model');
		$this->load->library('session');
	}
	public function index()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $post_id= end($post_arr);
		 if(is_numeric( $post_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				//$result['images'] = $this->Home_Model->images(0,6,'DESC');	
				$result['intro'] = $this->Home_Model->get_post(149);
				$result['news'] = $this->Home_Model->news(0,3,'ASC');		
		        $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['footer_menu'] = $this->Home_Model->footer_menu();
				$result['submenu'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				$result['aboutme'] = $this->Home_Model->get_post(185);	
				$result['settings'] = $this->Post_Model->get_setting();
				$result['post_details'] = $this->Post_Model->get_post_details($post_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['post_details'][0]['post_title'];
				$result['latest_event'] = $this->Home_Model->latest_event(); 	
		        $result['footer'] = $this->Home_Model->get_post(165);	
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			  
                $result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			    $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');					
				$result['about'] = $this->Home_Model->get_post(199);
				
				$this->load->view('Post_View',$result);
		 }
	}
		 
	  public function news_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $news_id= end($post_arr);
		 if(is_numeric( $news_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['intro'] = $this->Home_Model->get_post(149);
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				$result['footer'] = $this->Home_Model->get_post(165);	
		        $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				$result['aboutme'] = $this->Home_Model->get_post(185);
				$result['settings'] = $this->Post_Model->get_setting();
				$result['news_details'] = $this->Post_Model->get_news_details($news_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['news_details'][0]['news_title'];					
		        $result['newsletter'] = $this->Home_Model->get_post(118);	
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			    
				$result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			    $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				$this->load->view('News_Details_View',$result);
		 }
		 
	
    }
	 public function test_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $news_id= end($post_arr);
		 if(is_numeric( $news_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['intro'] = $this->Home_Model->get_post(149);
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				$result['footer'] = $this->Home_Model->get_post(165);	
		        $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				$result['aboutme'] = $this->Home_Model->get_post(185);
				$result['settings'] = $this->Post_Model->get_setting();
				$result['article_details'] = $this->Post_Model->get_test_details($news_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['article_details'][0]['test_title'];					
		        $result['newsletter'] = $this->Home_Model->get_post(118);	
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			    
				$result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			    $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				$this->load->view('Test_Details_View',$result);
		 }
		 
	
    }
	/*  public function service_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $service_id= end($post_arr);
		 if(is_numeric($service_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				
				$result['about_us'] = $this->Home_Model->get_post(135);
		        $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				
				$result['settings'] = $this->Post_Model->get_setting();
				$result['service_details'] = $this->Post_Model->get_service_details($service_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['service_details'][0]['title'];					
		       $result['newsletter'] = $this->Home_Model->get_post(118);		
				
				
				$this->load->view('Service_Details_View',$result);
		 }
		 
	
    }*/
	
	public function service_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $service_id= end($post_arr);
		 if(is_numeric($service_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['aboutme'] = $this->Home_Model->get_post(185);	
				 $result['category'] = $this->Page_Model->albums('5','0','ASC');	
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				$result['services'] = $this->Home_Model->service(0,3);
                $result['welcome'] = $this->Home_Model->get_post(151); 
				//$result['about_us'] = $this->Home_Model->get_post(135);
		       // $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				
				$result['settings'] = $this->Post_Model->get_setting();
				$result['service_details'] = $this->Post_Model->get_service_details($service_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['service_details'][0]['title'];					
		       $result['newsletter'] = $this->Home_Model->get_post(118);		
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			   
			   $result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			   $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				$this->load->view('Award_Details_View',$result);
		 }
		 
	
    }
	
	public function testi_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $service_id= end($post_arr);
		 if(is_numeric($service_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['aboutme'] = $this->Home_Model->get_post(185);	
				 $result['category'] = $this->Page_Model->albums('5','0','ASC');	
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				$result['services'] = $this->Home_Model->service(0,3);
                $result['welcome'] = $this->Home_Model->get_post(151); 
				//$result['about_us'] = $this->Home_Model->get_post(135);
		       // $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				
				$result['settings'] = $this->Post_Model->get_setting();
				$result['award_details'] = $this->Post_Model->get_award_details($service_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['award_details'][0]['award_title'];					
		       $result['newsletter'] = $this->Home_Model->get_post(118);		
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			   
			   $result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			   $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				$this->load->view('Testi_Details_View',$result);
		 }
		 
	
    }
	public function activitydetails()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $award_id= end($post_arr);
		 if(is_numeric($award_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['aboutme'] = $this->Home_Model->get_post(185);
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				//$result['about_us'] = $this->Home_Model->get_post(149);
                //$result['images'] = $this->Home_Model->images(0,6,'DESC');	
		        $result['news']=$this->Home_Model->news(0,3,'DESC');
				//$result['footer_menu'] = $this->Home_Model->footer_menu();
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				
				$result['settings'] = $this->Post_Model->get_setting();
				$result['product_details'] = $this->Post_Model->get_test_details($award_id);
				$result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			    $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				$this->load->view('Award_Details_View',$result);
		 }
		 
	
    }
	public function doctor_details()
	{
		 $post=$_SERVER['REQUEST_URI'];
		 $post_arr=explode("/",$post);
		 $product_id= end($post_arr);
		 if(is_numeric($product_id))
		 {
			  
			 	
				$result['menu'] = $this->Post_Model->menu();
				$result['aboutme'] = $this->Home_Model->get_post(185);	
				 $result['category'] = $this->Page_Model->albums('5','0','ASC');	
				$result['news'] = $this->Home_Model->news(0,3,'ASC');
				$result['services'] = $this->Home_Model->service(0,3);
                $result['welcome'] = $this->Home_Model->get_post(151); 
				//$result['about_us'] = $this->Home_Model->get_post(135);
		       // $result['product_category']=$this->Home_Model->product_category(0,4,'ASC');
				//$result['submenu1'] = $this->Home_Model->submenu(94);
				//$result['slider'] = $this->Home_Model->slider(); 
				
				$result['settings'] = $this->Post_Model->get_setting();
				$result['story_details'] = $this->Post_Model->get_doctor_details($product_id);
				//$result['side_banner'] = $this->Page_Model->get_post(21);
			    $result['page_details'][0]['title']=$result['story_details'][0]['doctor_name'];					
		       $result['newsletter'] = $this->Home_Model->get_post(118);		
				$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
			  
			   $result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
			   $result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
				$result['about'] = $this->Home_Model->get_post(199);
				
				$this->load->view('Story_Details_View',$result);
		 }
		 
	
    }
}

