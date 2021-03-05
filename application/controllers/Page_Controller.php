<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_Controller extends CI_Controller 
{
	public function __construct()
	{

		parent::__construct();
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('encrypt');
		$this->load->model('admin/Post_Model');
		$this->load->model('admin/Page_Model');
		$this->load->model('admin/Home_Model');

	}

	

	public function index()

	{

		 $pagination=0;

		 $video_page='';

		 $page=$_SERVER['REQUEST_URI'];

		 $page_arr=explode("/",$page);

		 $len=sizeof($page_arr);		

		 $page=$page_arr[$len-1];

		 if(is_numeric($page_arr[$len-1]))

		 {

			  $page=$page_arr[$len-2];

			  $pagination=$page_arr[$len-1]	;		  						 	

			  

		 }

		 else

		 {

			 if (strpos($page, '?') !== true)

			 {

				 $page_arr=explode("?",$page);

				 $page=$page_arr[0];

				 $album=$this->input->get('album');

				

			 }

		 }

		 

		

		$result['menu'] = $this->Page_Model->menu();
		//$result['images'] = $this->Home_Model->images(0,6,'DESC');	
		//$result['footer_menu'] = $this->Home_Model->footer_menu();	
		$result['footer'] = $this->Home_Model->get_post(165);
        //$result['category'] = $this->Page_Model->albums('5','0','ASC');	
		//$result['deals'] = $this->Home_Model->get_post_by_cat(16,0,1,'desc');
		  $result['submenu'] = $this->Home_Model->submenu(85);	
		//$result['footer_title'] = $this->Home_Model->get_post(28);	
      	
		//$result['service'] = $this->Home_Model->get_post_by_cat(14,0,10,'asc');
		//$result['newsletter'] = $this->Home_Model->get_post(118);
		$result['settings'] = $this->Page_Model->get_setting(); 
        //$result['latest_event'] = $this->Home_Model->latest_event(); 
		$result['videos'] = $this->Page_Model->videos(10,0,0,'DESC');			
	   
		$result['gallery1'] = $this->Page_Model->gallery_getall(3,0,'ASC');			
		$result['gallery2'] = $this->Page_Model->gallery_getall(3,3,'ASC');	
        $result['news'] = $this->Page_Model->news(4,0,'ASC');					         			
		$result['photo_gallery'] = $this->Page_Model->gallery_getall(6,0,'ASC');	
	
		

		$result['eventtiming'] = $this->Home_Model->get_post(324);
	    $result['eventtiming'] = $this->Home_Model->get_post(324);
		$result['gallery'] = $this->Page_Model->gallery_getall(3,0,'ASC');
        $result['intro5'] = $this->Home_Model->get_post(6);
		$result['award'] = $this->Home_Model->award(0,6);
		$result['news'] = $this->Home_Model->news(0,6);
		$result['intro10'] = $this->Home_Model->get_post(11);
         /*if(!is_numeric($page))

		 {

		    $result['page_details'][0]['title']="404";		
			$this->load->view('errors/404_View',$result);
		 }

		 else

		 {*/
		 
		   if($page=='aboutus')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
	             	$result['intro5'] = $this->Home_Model->get_post(6);
               	$result['intro8'] = $this->Home_Model->get_post(9);
               $result['intro9'] = $this->Home_Model->get_post(10);
	            	$result['intro10'] = $this->Home_Model->get_post(11);
                    $result['intro'] = $this->Home_Model->get_post(1);
                    $result['intro1'] = $this->Home_Model->get_post(2);
                    $result['intro2'] = $this->Home_Model->get_post(3);
                    $result['intro1'] = $this->Home_Model->get_post(2);
               $result['intro7'] = $this->Home_Model->get_post(8);
                $result['intro11'] = $this->Home_Model->get_post(12);
                $result['intro12'] = $this->Home_Model->get_post(13);
                $result['intro13'] = $this->Home_Model->get_post(14);
                      $result['doctors'] = $this->Home_Model->doctors(0,500);
			   $result['intro15'] = $this->Home_Model->get_post(16);
			    $this->load->view('aboutus',$result);
               
		   }
		
		
		
		
		 else if($page=='expression')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
	             	$result['intro5'] = $this->Home_Model->get_post(6);
               	$result['intro8'] = $this->Home_Model->get_post(9);
	            	$result['intro10'] = $this->Home_Model->get_post(11);
                    $result['intro'] = $this->Home_Model->get_post(1);
                    $result['intro1'] = $this->Home_Model->get_post(2);
                    $result['intro2'] = $this->Home_Model->get_post(3);
                    $result['intro1'] = $this->Home_Model->get_post(2);
               $result['intro7'] = $this->Home_Model->get_post(8);
                $result['intro11'] = $this->Home_Model->get_post(12);
                $result['intro12'] = $this->Home_Model->get_post(13);
                $result['intro13'] = $this->Home_Model->get_post(14);
                      $result['doctors'] = $this->Home_Model->doctors(0,500);
			 $result['intro15'] = $this->Home_Model->get_post(16);
			    $this->load->view('expression',$result);
               
		   }
		
		
		
		
		else if($page=='expressionmsg')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
	             	$result['intro5'] = $this->Home_Model->get_post(6);
               	$result['intro8'] = $this->Home_Model->get_post(9);
	            	$result['intro10'] = $this->Home_Model->get_post(11);
                    $result['intro'] = $this->Home_Model->get_post(1);
                    $result['intro1'] = $this->Home_Model->get_post(2);
                    $result['intro2'] = $this->Home_Model->get_post(3);
                    $result['intro1'] = $this->Home_Model->get_post(2);
               $result['intro7'] = $this->Home_Model->get_post(8);
                $result['intro11'] = $this->Home_Model->get_post(12);
                $result['intro12'] = $this->Home_Model->get_post(13);
                $result['intro13'] = $this->Home_Model->get_post(14);
                      $result['doctors'] = $this->Home_Model->doctors(0,500);
			$result['intro15'] = $this->Home_Model->get_post(16);
			    $this->load->view('expressionmsg',$result);
               
		   }
		
		
		
		
		  else if($page=='clients')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                
		       $result['album'] = $this->Home_Model->album(0,500);
			$result['intro5'] = $this->Home_Model->get_post(6);
              $result['intro8'] = $this->Home_Model->get_post(9);
              $result['intro7'] = $this->Home_Model->get_post(8);
				$result['intro10'] = $this->Home_Model->get_post(11);
			    $this->load->view('clients',$result);
		   }
		 
		 
		  else if($page=='projects')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
		  	    $result['intro10'] = $this->Home_Model->get_post(11);
              	$result['intro8'] = $this->Home_Model->get_post(9);
		  	       $result['service'] = $this->Home_Model->service(0,500);
		  	          $result['test'] = $this->Home_Model->test(0,500);
		  	             $result['doctors'] = $this->Home_Model->doctors(0,500);
              $result['intro3'] = $this->Home_Model->get_post(4);
			  $result['intro15'] = $this->Home_Model->get_post(16);
              $result['equipment'] = $this->Home_Model->equipment(0,500);
              
		  	    
		  	    
			    $this->load->view('projects',$result);
		   }
		 
        
        	  else if($page=='our_gallery')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
		  	    $result['intro10'] = $this->Home_Model->get_post(11);
              	$result['intro8'] = $this->Home_Model->get_post(9);
		  	       $result['service'] = $this->Home_Model->service(0,500);
		  	          $result['test'] = $this->Home_Model->test(0,500);
		  	             $result['doctors'] = $this->Home_Model->doctors(0,500);
              $result['intro3'] = $this->Home_Model->get_post(4);
              $result['equipment'] = $this->Home_Model->equipment(0,500);
                  $result['intro15'] = $this->Home_Model->get_post(16);
                   $result['siteoffice'] = $this->Home_Model->siteoffice(0,500);
              
		  	    
		  	    
			    $this->load->view('our_gallery',$result);
		   }
		 
        
        
          else if($page=='our_associates')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
		  	    $result['intro10'] = $this->Home_Model->get_post(11);
              	$result['intro8'] = $this->Home_Model->get_post(9);
		  	       $result['service'] = $this->Home_Model->service(0,500);
		  	          $result['test'] = $this->Home_Model->test(0,500);
		  	             $result['doctors'] = $this->Home_Model->doctors(0,500);
              $result['intro3'] = $this->Home_Model->get_post(4);
              $result['equipment'] = $this->Home_Model->equipment(0,500);
              $result['associate'] = $this->Home_Model->associate(0,500);
			  $result['intro15'] = $this->Home_Model->get_post(16);
              
		  	    
		  	    
			    $this->load->view('our_associates',$result);
		   }
		 
		 
        
        
		 
		 
		 
		 
		  
		  else if($page=='credentials')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                 //$result['services'] = $this->Home_Model->service(0,500);
                 $result['doctors'] = $this->Home_Model->doctors(0,50);
                 
		
			$result['intro5'] = $this->Home_Model->get_post(6);
			    $this->load->view('credentials',$result);
		   }
		
		 
		 
		  
		  else if($page=='dealerform')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                 $result['services'] = $this->Home_Model->service(0,500);
		
			$result['dealer'] = $this->Home_Model->get_post(7);
			
			$this->session->sess_destroy();
			    $this->load->view('dealerform',$result);
		   }
		
		 
		 
		 
		 
		 
		 
		 
		 
		  else if($page=='Home')
			   
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);
				
				
				$result['intro5'] = $this->Home_Model->get_post(6);
				
				$this->load->view('Home_View',$result);	
	   
	   
		   }
		 
         
		   else if($page=='readymade-pannel')
		   { 

              	$result['page_details'] = $this->Page_Model->get_page_details($page);					
				$config = array();
				$config["base_url"] = base_url() . "page/readymade-pannel";
				$total_row = $this->Page_Model->products_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =6;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);

				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}

				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['service'] = $this->Page_Model->doctor($config["per_page"],$page,0,'ASC');			   					  
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			
			   
				
				$this->load->view('Services_View2',$result);

		   }
		   else if($page=='syllabus')
		   { 
               
				$s=isset($_GET["s"])?$_GET["s"]:"";				
                $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/syllabus";
				if(empty($s))
					$total_row = $this->Page_Model->store_record_count("");
				else
					$total_row = $this->Page_Model->store_record_count($s);							
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);

				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}

				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   
					   if(empty($s))
						$result['videos'] = $this->Page_Model->store($config["per_page"],$page,'desc','');	
                       else
						 $result['videos'] = $this->Page_Model->store($config["per_page"],$page,'desc',$s);	
					 
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			
			    $this->load->view('Services_View1',$result);

		   }
		   
		   
		 /* else if($page=='events')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);	
                
                 					
				$config = array();
				$config["base_url"] = base_url() . "page/events";
				$total_row = $this->Page_Model->news_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =1000;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);

				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}

				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					  $result['events'] = $this->Page_Model->news($config["per_page"],$page,'ASC');			   					  
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 	
					  				 					  					   							    			   			
			    $this->load->view('Faq_View',$result);

		   }/*

		    else if($page=='clients')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);							

				$config = array();

				$config["base_url"] = base_url() . "page/clients";

				$total_row = $this->Page_Model->clients_record_count();

				$config["total_rows"] = $total_row;

				$config["per_page"] =12;

				$config['page_query_string'] = TRUE;

				$config['num_links'] = 2;

				$config['cur_tag_open'] = ',';

				$config['cur_tag_close'] = '';

				$config['next_link'] = 'Next';

				$config['prev_link'] = 'Previous';

		

				$this->pagination->initialize($config);

				if($this->uri->segment(3))

				{

					$page = ($this->uri->segment(3)) ;

				}

				else

				{

					$page =0;

				}

				

					   $arr=array();					   					   

					   $page=$this->input->get('per_page');

					   if(!isset($page) ||  !is_numeric($page))

						   $page=0;

					   $result['projects'] = $this->Page_Model->clients($config["per_page"],$page,0,'asc');			   

					    

					  $str_links = $this->pagination->create_links();

					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   

			    $this->load->view('Page_Products_View',$result);

		   }

		    /*else if($page=='doctors')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);							

				$config = array();

				$config["base_url"] = base_url() . "page/doctors";

				$total_row = $this->Page_Model->doctor_record_count();

				$config["total_rows"] = $total_row;

				$config["per_page"] =12;

				$config['page_query_string'] = TRUE;

				$config['num_links'] = 2;

				$config['cur_tag_open'] = ',';

				$config['cur_tag_close'] = '';

				$config['next_link'] = 'Next';

				$config['prev_link'] = 'Previous';

		

				$this->pagination->initialize($config);

				if($this->uri->segment(3))

				{

					$page = ($this->uri->segment(3)) ;

				}

				else

				{

					$page =0;

				}

				

					   $arr=array();					   					   

					   $page=$this->input->get('per_page');

					   if(!isset($page) ||  !is_numeric($page))

						   $page=0;

					   $result['doctors'] = $this->Page_Model->doctor($config["per_page"],$page,0,'asc');			   

					    

					  $str_links = $this->pagination->create_links();

					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   

			    $this->load->view('Page_Products_View',$result);

		   }

		    else if($page=='our-brands')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/our-partners";
				$total_row = $this->Page_Model->partner_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['gallery'] = $this->Page_Model->partners($config["per_page"],$page,0);			   					  
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Gallery_View1',$result);
		   }

		  /*  else if($page=='our-clients')
		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);							

				$config = array();

				$config["base_url"] = base_url() . "page/our-clients";

				$total_row = $this->Page_Model->clients_record_count();

				$config["total_rows"] = $total_row;

				$config["per_page"] =8;

				$config['page_query_string'] = TRUE;

				$config['num_links'] = 2;

				$config['cur_tag_open'] = ',';

				$config['cur_tag_close'] = '';

				$config['next_link'] = 'Next';

				$config['prev_link'] = 'Previous';

		

				$this->pagination->initialize($config);

				if($this->uri->segment(3))

				{

					$page = ($this->uri->segment(3)) ;

				}

				else

				{

					$page =0;

				}

				

					   $arr=array();					   					   

					   $page=$this->input->get('per_page');

					   if(!isset($page) ||  !is_numeric($page))

						   $page=0;

					   $result['gallery'] = $this->Page_Model->clients($config["per_page"],$page,0);			   

					    

					  $str_links = $this->pagination->create_links();

					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   

			    $this->load->view('Page_Gallery_View2',$result);
				

					 			  	  	   
                       $result['industrial'] = $this->Page_Model->get_post(142);
					   $result['fitness'] = $this->Page_Model->get_post(143);
					   $result['hospitals'] = $this->Page_Model->get_post(144);
					   $result['surgical'] = $this->Page_Model->get_post(145);
					   $this->load->view('Default_Page_View1',$result);

		   }
            */
			else if($page=='search')
		     {
				    $s=$this->input->post('s'); 							
					$pagination=0;
					$page=$_SERVER['REQUEST_URI'];
					$page_arr=explode("/",$page);
					$len=sizeof($page_arr);				  
					$page=$page_arr[$len-1];
					if(is_numeric($page_arr[$len-1]))
					{					
						$page=$page_arr[$len-2];
						$pagination=1;
						$start=$page_arr[$len-1];						 			
					}				
					else
					{
						$pagination=0;
						$start=0;
					}
					 if($pagination==1)
					{						
						 if($start==1 || $start==0 || $start>99999 || $start<0)	
						  $start=0;
						 else
						 {
							 $start=($start-1)*6;
						 }
						 $result['search'] = $this->Page_Model->record_search($s,$start,6,'desc');						 		
					} 
					else
						   $result['search'] = $this->Page_Model->record_search($s,$start,6,'desc');					   				
					$result['total_row'] = $this->Page_Model->record_search_record_count($s);								   
					$result['page_details'][0]['title']="Search";								   
					$this->load->view('Page_Search_View',$result);					
			 }
			else if($page=='player')
		   { 
	            $result['page_details'][0]['title']="Player";	
                $name=$this->input->get('name'); 					
				$config = array();
				$config["base_url"] = base_url() . "page/player";
				if(empty($name))
				{
				   $total_row = $this->Page_Model->brand_record_count_all();
				}
				else
				{
				  $total_row = $this->Page_Model->brand_record_count($name);	
				}
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					  
                        if(empty($name))
						{
						  $result['player'] = $this->Page_Model->brand_all($config["per_page"],$page,'ASC');
						}
						else
						{
						   $result['player'] = $this->Page_Model->brand($config["per_page"],$page,'ASC',$name);
						}					   
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Player_View',$result);
		   }
            else if($page=='courses')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/courses";
				$total_row = $this->Page_Model->award_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['album'] = $this->Page_Model->award($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Course_View',$result);
		   }
		   else if($page=='afterwords')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				/*$config = array();
				$config["base_url"] = base_url() . "page/afterwords";
				$total_row = $this->Page_Model->clients_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['album'] = $this->Page_Model->clients($config["per_page"],$page,'DESC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 	*/
                $result['afterwords'] = $this->Page_Model->get_post_by_cat(3,0,20,'ASC'); 					  
			    $this->load->view('Page_After_View',$result);
		   }
		   
		   else if($page=='media')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/media";
				$total_row = $this->Page_Model->clients_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['album'] = $this->Page_Model->clients($config["per_page"],$page,'DESC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 	
                				  
			    $this->load->view('Page_News_View',$result);
		   }
           else if($page=='testimonials')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/testimonials";
				$total_row = $this->Page_Model->award_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['testimonials'] = $this->Page_Model->award($config["per_page"],$page,'DESC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Products_View',$result);
		   }
            else if($page=='news')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/news-media";
				$total_row = $this->Page_Model->news_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['news'] = $this->Page_Model->news($config["per_page"],$page,'DESC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('News_View',$result);
		   }
           else if($page=='blog')
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/blog";
				$total_row = $this->Page_Model->test_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['blog'] = $this->Page_Model->test($config["per_page"],$page,'DESC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 	


         
$result['recent1'] = $this->Home_Model->get_post(314);

	$result['recent2'] = $this->Home_Model->get_post(315);

					  
			    $this->load->view('Blog_View',$result);
		   }   
		   else if($page=='gallery' && empty($album))
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/gallery";
				$total_row = $this->Page_Model->albums_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['album'] = $this->Page_Model->albums($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 	
					  
					    $result['doctors'] = $this->Home_Model->doctors(0,200);
					    
					    
					       $result['test'] = $this->Home_Model->test(0,500);
					  
					  
                $result['intro5'] = $this->Home_Model->get_post(6);

	            				  
			    $this->load->view('gallery',$result);
		   }
		   
		   /*
		   else if($page=='gallery' && !empty($album))
		   { 

	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/gallery";
				$total_row = $this->Page_Model->products_record_count1($album);
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}				
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['gallery'] = $this->Page_Model->products1($config["per_page"],$page,'DESC',$album);			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Gallery_View2',$result);
		   }
		   
		   
		   */
		   
		   
		   
		   else if($page=='our-activity' )
		   { 
	            $result['page_details'] = $this->Page_Model->get_page_details($page);							
				$config = array();
				$config["base_url"] = base_url() . "page/our-activity";
				$total_row = $this->Page_Model->store_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';		
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}
					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['album'] = $this->Page_Model->store($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Gallery_View3',$result);
		   }
		   /*else if($page=='gallery')
		   { 

	            $result['page_details'] = $this->Page_Model->get_page_details($page);		                 				
				$config = array();
				$config["base_url"] = base_url() . "page/gallery";
				$total_row = $this->Page_Model->gallery_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['gallery'] = $this->Page_Model->gallery_getall($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Page_Gallery_View2',$result);

		   }*/
		   else if($page=='media-gallery')
		   { 

	            $result['page_details'] = $this->Page_Model->get_page_details($page);		                 				
				$config = array();
				$config["base_url"] = base_url() . "page/media-gallery";
				$total_row = $this->Page_Model->news_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['gallery'] = $this->Page_Model->news($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 					 					  					   							    			   			  	   
			    $this->load->view('Media_View',$result);

		   }
		    else if($page=='products')
		   { 

	            $result['page_details'] = $this->Page_Model->get_page_details($page);		                              		
				$config = array();
				$config["base_url"] = base_url() . "page/products";
				$total_row = $this->Page_Model->test_record_count();
				$config["total_rows"] = $total_row;
				$config["per_page"] =12;
				$config['page_query_string'] = TRUE;
				$config['num_links'] = 2;
				$config['cur_tag_open'] = ',';
				$config['cur_tag_close'] = '';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3))
				{
					$page = ($this->uri->segment(3)) ;
				}
				else
				{
					$page =0;
				}

				

					   $arr=array();					   					   
					   $page=$this->input->get('per_page');
					   if(!isset($page) ||  !is_numeric($page))
						   $page=0;
					   $result['product'] = $this->Page_Model->test($config["per_page"],$page,'ASC');			   					    
					  $str_links = $this->pagination->create_links();
					  $result["links"] = explode(',',$str_links ); 
					  
					  
					  $result['intro5'] = $this->Home_Model->get_post(6);
					  
					   $result['gallery'] = $this->Home_Model->gallery(0,500);
					  
					  
					  
					  
					  
			    $this->load->view('products',$result);

		   }
		   else if($page=='booknow')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
			    $result['recent1'] = $this->Home_Model->get_post(314);
                $result['recent2'] = $this->Home_Model->get_post(315);
				
				
				
	/*	
 public function savedata()
{
$this->load->view('booknow');
if($this->input->post('save'))
{
$package=$this->input->post('txt_package');
$noofmember=$this->input->post('txt_noofmember');
$eventdate=$this->input->post('txt_eventdate');
$fullname= $this->input->post('txt_fullname');
$nationality=$this->input->post('txt_nationality');
$email=$this->input->post('txt_email');
$phoneno = $this->input->post('txt_phoneno');
$address = $this->input->post('txt_address');
$suggestion =$this->input->post('txt_suggestion');
$this->Home_model->saverecords($package,$noofmember,$eventdate,$fullname,$nationality,$email,$phoneno,$address,$suggestion);	
echo "Records Saved Successfully";
}
}


*/
$this->load->view('booknow',$result);
}
		  
	 else if($page=='contactus')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
                 $result['intro5'] = $this->Home_Model->get_post(6);
         $result['intro3'] = $this->Home_Model->get_post(4);
         $result['intro8'] = $this->Home_Model->get_post(9);
         $result['intro15'] = $this->Home_Model->get_post(16);
          $result['intro12'] = $this->Home_Model->get_post(13);
						
			    $this->load->view('contactus',$result);
		   }
		
		
		
		else if($page=='contactmsg')
		   { 
                 $result['page_details'] = $this->Page_Model->get_page_details($page);
                 $result['intro5'] = $this->Home_Model->get_post(6);
                 $result['intro3'] = $this->Home_Model->get_post(4);
                 $result['intro8'] = $this->Home_Model->get_post(9);
                 $result['intro15'] = $this->Home_Model->get_post(16);
                $result['intro12'] = $this->Home_Model->get_post(13);
						
			    $this->load->view('contactmsg',$result);
		   }
		
		
		
		
		   
		    else if($page=='empreg')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);                                      				   	  	  
			    $this->load->view('Emp_View',$result);
		   }
          else if($page=='register')
		   { 
                $result['page_details'] = $this->Page_Model->get_page_details($page);
               		   	  	  
			    $this->load->view('Register_View',$result);
		   }		   
           else if($page=='login')
		   { 
	          
                //$result['page_details'] = $this->Page_Model->get_page_details($page);
                $result['services'] = $this->Home_Model->service(0,3);
                        $result['welcome'] = $this->Home_Model->get_post(151); 				   	  	  
			    $this->load->view('Login_View',$result);
				  
		   }
		   else if($page=='otp')
		   { 
	             if ($this->session->userdata('test_user_otp')) 
				  {
                
						$result['services'] = $this->Home_Model->service(0,3);
								$result['welcome'] = $this->Home_Model->get_post(151); 				   	  	  
						$this->load->view('Otp_View',$result);
				  }
				  else
				  {
					    $result['services'] = $this->Home_Model->service(0,3);
                        $result['welcome'] = $this->Home_Model->get_post(151); 				   	  	  
			            $this->load->view('Login_View',$result);
				  }
				 
		   }
		  
           else if($page=='employee')
		   { 
	             if ($this->session->userdata('emp_login')) 
				  {
                
						$result['chart'] = $this->Page_Model->test(1000,0,'DESC');                   					
						$this->load->view('Test_Details_View',$result);
				  }
				  else
				  {
					    /*$result['page_details'] = $this->Page_Model->get_page_details("empreg");    		   	  	  
			            $this->load->view('Emp_View',$result);*/
						redirect(base_url('page/empreg'), 'refresh');
				  }
				 
		   }
		    else if($page=='career')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                $result['intro5'] = $this->Home_Model->get_post(6);
			    $this->load->view('career',$result);

		   }
		   
		   
		   /*
		   else if($page=='blog')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);	


                $result['recent1'] = $this->Home_Model->get_post(314);

	            $result['recent2'] = $this->Home_Model->get_post(315);
				
			    $this->load->view('Blog_View',$result);

		   }
		   
		   
		   
		   */
		   
		   
		   
		   
		   
		   
		   
		   else if($page=='menus')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                 $result['recent1'] = $this->Home_Model->get_post(314);

	            $result['recent2'] = $this->Home_Model->get_post(315);				
			    $this->load->view('menus',$result);

		   }
		   
		   
		    else if($page=='services')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                 $result['intro5'] = $this->Home_Model->get_post(6);
                $result['intro3'] = $this->Home_Model->get_post(4);
                 $result['intro8'] = $this->Home_Model->get_post(9);
				$result['intro13'] = $this->Home_Model->get_post(14);
				$result['intro15'] = $this->Home_Model->get_post(16);
	          				
			    $this->load->view('services',$result);

		   }
		   
		   
		   
		   
		    else if($page=='ourassociates')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                 $result['intro5'] = $this->Home_Model->get_post(6);
                
                $result['intro3'] = $this->Home_Model->get_post(4);
                 $result['intro8'] = $this->Home_Model->get_post(9);
                 
                 
                  $result['service'] = $this->Home_Model->service(0,500);
		  	          $result['test'] = $this->Home_Model->test(0,500);
		  	             $result['doctors'] = $this->Home_Model->doctors(0,500);
                $result['associate'] = $this->Home_Model->associate(0,500);
				$result['intro15'] = $this->Home_Model->get_post(16);
		  	    
                 
                 
                 
                 
	          				
			    $this->load->view('ourassociates',$result);

		   }
		   
		   
		   
		   
		   else if($page=='shop')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                 $result['recent1'] = $this->Home_Model->get_post(314);

	            $result['recent2'] = $this->Home_Model->get_post(315);

				
			    $this->load->view('Shop_View',$result);

		   }
		   
		   
		   
		   
		    else if($page=='chemicalearthing')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
			    $this->load->view('chemicalearthing',$result);

		   }
		   
		   
		    else if($page=='lightningconductors')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                
                 $result['service'] = $this->Home_Model->service(0,500);
                
			    $this->load->view('lightningconductors',$result);

		   }
		   
		   
		   
		   
		    else if($page=='otherproducts')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);
                 $result['events'] = $this->Home_Model->events(0,50);
			    $this->load->view('otherproducts',$result);

		   }
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
           else if($page=='admission')		   
			{               
				$result['page_details'] = $this->Page_Model->get_page_details($page);	
				$result['services'] = $this->Home_Model->service(0,3);      
				$result['welcome'] = $this->Home_Model->get_post(151); 	
				$this->load->view('Emp_View',$result);		 
			} 
			/*
		     else if($page=='appointment')

		   { 

                $result['page_details'] = $this->Page_Model->get_page_details($page);			   	  	 
			    $this->load->view('Appointment_View',$result);

		   }	*/	















		   

            else

            {

				$check=$this->Page_Model->check_page($page);

				if($check==true)

				{

					   $result['page_details'] = $this->Page_Model->get_page_details($page);

					  // $result['side_banner'] = $this->Page_Model->get_post(21);			  	  	   
                        $result['services'] = $this->Home_Model->service(0,3);
                        $result['welcome'] = $this->Home_Model->get_post(151); 	
					   $this->load->view('Default_Page_View',$result);

				}

				else

				{

				$result['page_details'][0]['title']="404";		

			    $this->load->view('errors/404_View',$result);

				}

			}				

		// }

		

		 

	}

	

	

	

	

}

