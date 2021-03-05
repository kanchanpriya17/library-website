<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta'); 
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('admin/Home_Model');
		$this->load->model('admin/Page_Model');
	}
	public function cvupload()
	{
	
		$data["name"]=$this->input->post('txtname');
		$data["email"]=$this->input->post('txtemail');
		$data["phoneno"]=$this->input->post('txtphone');
		$data["address"]=$this->input->post('txtaddress');
		$data["cvupload"]=$this->input->post('fileupload');
		$return=$this->Home_Model->saverecords($data);	
		if($return==true)
		{
			 $this->session->set_userdata('bookmsg','<span style="color:green">Your booking is successful</span>');
		}
		else
		{
			 $this->session->set_userdata('bookmsg','error');
		}
		
		redirect('/page/career');
		
	}
	
	
	
	public function contact()
	{
		$data["name"]=$this->input->post('user_name');
		$data["email"]=$this->input->post('user_email');
		$data["subject"]=$this->input->post('user_mobile');
		$data["message"]=$this->input->post('user_message');
	    $return=$this->Home_Model->insertcontactrecords($data);
		if($return==true)
		{
		
//			echo "<script type='text/javascript'>alert('submitted successfully!');</script>";
			
//			 echo "<script type='text/javascript'>alert('Your information is successful submitted!! We will contact You Soon.....');</script>";
			
			
//			 $this->session->set_userdata('contactmsg','<span style="color:black; font-style:bold; font-size:19px;">Thank You!! Our Representative will contact You Soon...</span>');
			 
			 
//			$this->session->sess_destroy();
			 
		}
		else
		{
//			 $this->session->set_userdata('contactmsg','error');
		}
		
		redirect('/page/contactmsg');
		
	}
	
	
	
		public function interst()
	{
		$data["name"]=$this->input->post('user_name');
		$data["email"]=$this->input->post('user_email');
		$data["mobile"]=$this->input->post('user_mobile');
		$data["service"]=$this->input->post('user_service');
		$data["income"]=$this->input->post('user_income');
		$data["member"]=$this->input->post('user_member');
		$data["address"]=$this->input->post('user_address');
		$data["addressone"]=$this->input->post('user_addressone');
		$return=$this->Home_Model->insertinterstrecords($data);
		if($return==true)
		{
		
//			echo "<script type='text/javascript'>alert('submitted successfully!');</script>";
			
//			 echo "<script type='text/javascript'>alert('Your information is successful submitted!! We will contact You Soon.....');</script>";
			
			
//			 $this->session->set_userdata('expressionmsg','<span style="color:black; font-style:bold; font-size:19px;">Thank You!! Our Representative will contact You Soon...</span>');
			 
			 
//			$this->session->sess_destroy();
			 
		}
		else
		{
			 //$this->session->set_userdata('expressionmsg','error');
		}
		
		redirect('/page/expressionmsg');
		
	}
	
	
	
	public function enquiry()
	{
		$data["textname"]=$this->input->post('textname');
		$data["textmobile"]=$this->input->post('textmobile');
		$data["textemail"]=$this->input->post('textemail');
		$data["textmessage"]=$this->input->post('textmessage');
	     $return=$this->Home_Model->insertenquiryrecords($data);	
		if($return==true)
		{
		    
		    /* 
			echo "<script type='text/javascript'>alert('submitted successfully!')</script>"; */
			
			 /*echo "<script type='text/javascript'>alert('Your information is successful submitted!! We will contact You Soon.....');</script>";
			*/
			
			
			$this->session->set_userdata('enqmsg','<span style="color:#fff; font-style:bold;">Thank You!! Our Representative will contact You Soon...</span>');
			$this->session->unset_userdata('enqmsg'); 
			$this->session->sess_destroy();
		}
		else
		{
			 $this->session->set_userdata('enqmsg','error');
		}
		
		redirect('/');
		
	}
	
	
	public function dealership()
	{
		$data["name"]=$this->input->post('name');
        $data["cname"]=$this->input->post('cname');
		$data["email"]=$this->input->post('email');
		$data["contactno"]=$this->input->post('phone');
		$data["city"]=$this->input->post('city');
		$data["natureofbusiness"]=$this->input->post('nature');
		$data["gstno"]=$this->input->post('gstno');
		$data["yearofest"]=$this->input->post('establish');
		$data["officeaddr"]=$this->input->post('add');
		$data["message"]=$this->input->post('msg');
	    $return=$this->Home_Model->insertdealerrecords($data);	
		if($return==true)
		{
		 $this->session->set_userdata('dealermsg','<span style="color:#fff; font-style:bold; font-size:19px;">Thank You!! Our Representative will contact You Soon...</span>');
		}
		else
		{
			 $this->session->set_userdata('dealermsg','error');
		}
		redirect('/page/dealerform');
	}
	public function index()
	{
		 
			$arr=array();
			$result['page_details'][0]['title'] = "Home";
			$result['menu'] = $this->Home_Model->menu();			
			$result['slider'] = $this->Home_Model->slider(); 
			$result['flash'] = $this->Home_Model->get_post_by_cat(2,0,5,"ASC");
						
			$result['about'] = $this->Home_Model->get_post(229);
		    $result['our'] = $this->Home_Model->get_post(209);
			$result['air'] = $this->Home_Model->test(0,8);
			$result['why'] = $this->Home_Model->get_post_by_cat(5,0,8,"ASC");
			$result['latest'] = $this->Home_Model->get_post(225);
			$result['news1'] = $this->Home_Model->news(0,2);
			$result['news2'] = $this->Home_Model->news(2,3);
			
			
	 
		       $result['news'] = $this->Home_Model->news(0,3);
        
             $result['staff'] = $this->Home_Model->staff(0,30);
        
        $result['doctors'] = $this->Home_Model->doctors(0,30);
        $result['associate'] = $this->Home_Model->associate(0,30);
        $result['album'] = $this->Home_Model->album(0,30);
        
        $result['equipment'] = $this->Home_Model->equipment(0,10);
        
        $result['test'] = $this->Home_Model->test(0,10);
        
        $result['service'] = $this->Home_Model->service(0,10);
        
       $result['siteoffice'] = $this->Home_Model->siteoffice(0,4);

			
			
			/* $result['ip_address'] = $this->Home_Model->ip_address();*/
			
			/* new files starts			*/
			

	$result['intro'] = $this->Home_Model->get_post(1);
	
	$result['intro1'] = $this->Home_Model->get_post(2);

	$result['intro2'] = $this->Home_Model->get_post(3);
	
	$result['intro3'] = $this->Home_Model->get_post(4);
	
	$result['intro4'] = $this->Home_Model->get_post(5);
	
	$result['intro5'] = $this->Home_Model->get_post(6);
	
		$result['intro6'] = $this->Home_Model->get_post(7);
			$result['intro7'] = $this->Home_Model->get_post(8);
				$result['intro8'] = $this->Home_Model->get_post(9);
					$result['intro9'] = $this->Home_Model->get_post(10);
					
		$result['intro10'] = $this->Home_Model->get_post(11);
        $result['intro11'] = $this->Home_Model->get_post(12);
        $result['intro12'] = $this->Home_Model->get_post(13);
          $result['intro13'] = $this->Home_Model->get_post(14);
          $result['intro14'] = $this->Home_Model->get_post(15);
		$result['intro15'] = $this->Home_Model->get_post(16);


/*
	
     $result['intro6'] = $this->Home_Model->get_post(320);
	
			
	 $result['intro7'] = $this->Home_Model->get_post(322);



			
	 $result['intro8'] = $this->Home_Model->get_post(323);
	 
	 
	 $result['intro9'] = $this->Home_Model->get_post(324);
	 
	 
   $result['intro10'] = $this->Home_Model->get_post(326);


      $result['intro11'] = $this->Home_Model->get_post(327);
      
      
      $result['intro12'] = $this->Home_Model->get_post(328);
     $result['intro13'] = $this->Home_Model->get_post(329);
     
      
      $result['intro14'] = $this->Home_Model->get_post(330);
      
			*/
			
			/* new files ends */
			

            $result['testi'] = $this->Page_Model->partners(5,0,'ASC');
			 $result['gallery'] = $this->Home_Model->gallery(0,6);
			$result['settings'] = $this->Home_Model->get_setting();	
			$result['award'] = $this->Home_Model->award(0,6);
			
				$result['album'] = $this->Home_Model->album(0,50);
			
			 if(empty ($result['records']))
						$result['records']=array();	
			 array_push($result['records'],$arr);
					$this->load->view('Home_View',$result);
					
					
					
					
					
					
					
	/*			
	public function savedata()
	{
		$this->load->view('booknow');
	    if($this->input->post('save'))
		{
		$n=$this->input->post('package');
		$e=$this->input->post('noofmember');
		$m=$this->input->post('eventdate');
		$o=$this->input->post('fullname');
		$p=$this->input->post('nationality');
		$q=$this->input->post('email');
		$r=$this->input->post('phoneno');
		$s=$this->input->post('address');
		$t=$this->input->post('suggestion');
		$this->Home_Model->saverecords($n,$e,$m,$o,$p,$q,$r,$s,$t);	
		echo "Records Saved Successfully";
		}
	}	
		*/			
					
					
	






	
		 
	}
	
	
}
?>



