<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Contact_Controller extends CI_Controller 

{

	 public function __construct()
	 {

            parent::__construct();		
			$this->load->library('form_validation');
			$this->load->library('encrypt');
			$this->load->library('email');
			$this->load->helper('url');
            $this->load->library('session');
			$this->load->helper('form');
            $this->load->model('admin/Home_Model');
    }
/*
	public function send()
	{
		 $config['protocol'] = "smtp";		
		 $config['smtp_host'] = "ssl://smtp.gmail.com";
		 $config['smtp_port'] = "465";		
		 $config['smtp_user'] = "mail4mail@call4site.in";
		 $config['smtp_pass'] = "password@123";
		 $config['charset']    = "utf-8";    
         $config['mailtype'] = "html";     	
		 $this->load->library('email',$config);
         $this->email->set_newline("\r\n");
		 $name =$this->input->post('name');
		 $sender_email = $this->input->post('email');
		 $phone = $this->input->post('phone');
		 $address = $this->input->post('address');
		 $msg = $this->input->post('msg');	
		 $msg="Name : ".$name."\n Phone : ".$phone."\n Address : ".$address."\n Message : ".$msg."";
		 $this->email->from('noreply@call4site.in',$name); 
		 $this->email->reply_to($sender_email,$name);
		 $this->email->to('faiyaz@infoget.in');
		 $this->email->subject("Enquiry Form");	
		 $this->email->message($msg);
		if ($this->email->send())

            $data['success'] = "Thank You!! Our Representative will contact You Soon...";

        else 

           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);

	

	}
	
	
	
	
	*/
	
	/* new files */
	public function send()
	{
		 $config['protocol'] = "smtp";		
		 $config['smtp_host'] = "";
		 $config['smtp_port'] = "";		
		 $config['smtp_user'] = "";
		 $config['smtp_pass'] = "";
		 $config['charset']    = "utf-8";    
         $config['mailtype'] = "html";     	
		 $this->load->library('email',$config);
         $this->email->set_newline("\r\n");
		 $name =$this->input->post('name');
		 $sender_email = $this->input->post('email');
		 $phone = $this->input->post('phone');
		 $address = $this->input->post('address');
		 $msg = $this->input->post('msg');	
		 $msg="Name : ".$name."\n Phone : ".$phone." \n Address :".$address." \n Message : ".$msg."";
		 
		 $this->email->from('',$name); 
		 $this->email->reply_to($sender_email,$name);
		 $this->email->to('');
		 $this->email->subject("Srijan");	
		 $this->email->message($msg);
		if ($this->email->send())
            $data['success'] = "Thank You!! Our Representative will contact You Soon...";
        else 
           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);
	}
	
	
	
	
	
	/*dealer ship form   */
    public function dealershipsend()
	{
		 $config['protocol'] = "";		
		 $config['smtp_host'] = "";
		 $config['smtp_port'] = "";		
		 $config['smtp_user'] = "";
		 $config['smtp_pass'] = "";
		 $config['charset']    = "utf-8";    
         $config['mailtype'] = "html";     	
		 $this->load->library('email',$config);
         $this->email->set_newline("\r\n");
		 $name =$this->input->post('name');
		 $cname =$this->input->post('cname');
		 $phone = $this->input->post('phone');
		 $sender_email = $this->input->post('email');
		 $city = $this->input->post('city');
		 $nature = $this->input->post('nature');
		 $gstno = $this->input->post('gstno');
		 $establish = $this->input->post('establish');
	   	 $add = $this->input->post('add');
		 $msg = $this->input->post('msg');	
		 $msg="Name : ".$name." \n Company Name: ".$cname."\n Phone : ".$phone."\n Email: ".$sender_email."\n City: ".$city." \n Nature of Bussiness: ".$nature."\n Gst Number : ".$gstno."\n Year of Establish: ".$establish." \n Address: ".$add." \n Message : ".$msg."";
		// $msg="Name : ".$name."\n Cname : ".$cname."\n Phone : ".$phone."\n Email: .$sender_email."\n City : ".$city."\n nature: .$nature." \n establish: .$establish." \n add: .$add." \n Message : ".$msg."";
		 $this->email->from('',$name); 
		 $this->email->reply_to($sender_email,$name);
	   	$this->email->to('');
		 $this->email->subject("Dealership Form Data");	
		 $this->email->message($msg);
		if ($this->email->send())

            $data['success'] = "Thank You!! Our Representative will contact You Soon...";

        else 

           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);
	}
	/* Enquiry Form */
	public function enquiry()
	{
		 $config['protocol'] = "";		
		 $config['smtp_host'] = "";
		 $config['smtp_port'] = "";		
		 $config['smtp_user'] = "";
		 $config['smtp_pass'] = "";
		 $config['charset']    = "utf-8";    
         $config['mailtype'] = "html";     	
		 $this->load->library('email',$config);
         $this->email->set_newline("\r\n");
		 $name =$this->input->post('name');
		 $sender_email = $this->input->post('email');
		 $phone = $this->input->post('phone');
		 $msg = $this->input->post('msg');	
		 $msg="Name : ".$name."\n Phone : ".$phone."\n Email : ".$sender_email."\n Message : ".$msg."";
		 $this->email->from('',$name); 
		 $this->email->reply_to($sender_email,$name);
	     $this->email->to('');
		 $this->email->subject("Enquiry Form Data ");
		 $this->email->message($msg);
		if ($this->email->send())
            $data['success'] = "Thank You!! Our Representative will contact You Soon...";
        else 
           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);
	}


public function cvupload()
	{
		 $config['protocol'] = "";		
		 $config['smtp_host'] = "";
		 $config['smtp_port'] = "";		
		 $config['smtp_user'] = "";
		 $config['smtp_pass'] = "";
		 $config['charset']    = "utf-8";    
         $config['mailtype'] = "html";     	
		 $this->load->library('email',$config);
         $this->email->set_newline("\r\n");
		 $txtname =$this->input->post('txtname');
		 $sender_email = $this->input->post('txtemail');
		 $txtphone = $this->input->post('txtphone');
		 $txtmessage = $this->input->post('txtmessage');	
		 $msg="Name : ".$txtname."\n Phone : ".$txtphone."\n Email : ".$sender_email."\n Message : ".$message."";
		 $this->email->from('',$name); 
		 $this->email->reply_to($sender_email,$name);
		
		 $this->email->to('');
	      //$this->email->to('');
		 $this->email->subject("");
		 $this->email->message($msg);
		if ($this->email->send())
            $data['success'] = "Thank You!! Our Recruitment Team will contact You Soon...";
        else 
           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);
	}
	public function send1()

	{
		 $config['protocol'] = "";		

		 $config['smtp_host'] = "";

		 $config['smtp_port'] = "";		

		 $config['smtp_user'] = "";

		 $config['smtp_pass'] = "";

		 $config['charset']    = "utf-8";    

         $config['mailtype'] = "html";     	

		 $this->load->library('email',$config);

         $this->email->set_newline("\r\n");
		 $name =$this->input->post('name');
		 $sender_email = $this->input->post('email');
		 $phone = $this->input->post('phone');
		 $city = $this->input->post('city');	
		 $edu = $this->input->post('edu');
		 $address = $this->input->post('address');
		 $msg="Name : ".$name."\n Email : ".$sender_email."\n Phone : ".$phone."\n City : ".$city." \n Education".$edu." \n Adress".$address."";
		 
		 $this->email->from('',$name); 
		 $this->email->reply_to($sender_email,$name);
		 $this->email->to('');
		 $this->email->subject("");	
		 $this->email->message($msg);
		if ($this->email->send())
            $data['success'] = "hello, '".$name."' Your Details Submitted.We will contact you soon!";
        else 

           $data['error'] =  $this->email->print_debugger();
	   echo json_encode($data);
	}

	public function testinsert()
	{			   				 
		  $arr = array(
							'event_name' => $this->input->post('txt_name'),
							'event_venue1' => $this->input->post('txt_phone'),
							'event_time'=>$this->input->post('txt_employee_code'),
							'event_venue'=>$this->input->post('txt_password')
						);
		 $result = $this->Home_Model->testinsert($arr);
			   if ($result== TRUE) 
			   {
				  $data['success']=$result['success'];
			   }	 
			  else		
				$data['sql_error']='sql error';
		
	   echo json_encode($data);
	}

	public function user_login()
	{			   				 
		 
		       $result = $this->Home_Model->user_login($this->input->post('txt_login_id'),$this->input->post('txt_login_password'));
			   if ($result== TRUE) 
			   {
				   $this->session->set_userdata('emp_login',"true");
				    /*$otp=time();
					$num=substr($otp,4,10);
					$newmsg ="Don't Share Your OTP. your OTP is ".substr($otp,4,10)."";
					
					$newmsg = str_replace(' ', '%20', $newmsg );
					$newmsg = preg_replace("/[\r\n]+/", "%0a", $newmsg);													
					//$smsurl="http://69.195.128.75/API/pushsms.aspx?loginID=infogatedemo&password=demo@321&mobile=".$phone."&text=".$newmsg."&senderid=INFOGT&route_id=1&Unicode=0";
					$smsurl="http://sms.call4site.com/api/sendmsg.php?user=infogatedemo&pass=demo@321&sender=INFOGT&phone=".$this->input->post('mobile_no')."&text=".$newmsg."&priority=ndnd&stype=normal";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL      ,$smsurl);
					curl_setopt($ch, CURLOPT_POST      ,0);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,0);
					curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
					curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
					curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.152 Safari/535.19 CoolNovo/2.0.3.55");
					$html = curl_exec($ch);
					curl_close($ch);
					$this->session->set_userdata('test_user_otp',$num);
					$this->session->set_userdata('temp_mobile_no',$this->input->post('mobile_no'));*/
				    $data['success']=true;
			   }	 
			  else		
				$data['error']='Wrong Employee Code or Password';
		
	   echo json_encode($data);
	}

	public function check_otp()
	{			   				 
		if ($this->session->userdata('test_user_otp')==$this->input->post('otp')) 
	    {
			$this->session->set_userdata('test_user_mobile_no',$this->session->userdata('temp_mobile_no'));
			$data['success']="Corect OTP";
	    }
        else		
		  $data['error']='Incorrect OTP';		
		      
	   echo json_encode($data);
	}
    public function user_logout()
	{
		    $this->session->unset_userdata('test_user_mobile_no');	
            $this->session->unset_userdata('temp_mobile_no');			
			$this->session->unset_userdata('test_user_otp');
			$this->session->sess_destroy();
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");
			header("location:".base_url()."page/empreg");
	}
}

	

	



?>