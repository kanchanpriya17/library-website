
/*
$(document).ready(function()
{  
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	var message='';
	$("#btn_mobile_no").click(function()
	{
		 if(!phone_regex.test($("#txt_user_mobile_no").val()))
		{
			$("#div_err").remove();
			$("#txt_user_mobile_no").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid phone no</div>');
			$("#txt_user_mobile_no").focus();
			return false;
				
		}
		else
		{
			$("#btn_mobile_no").attr('disabled','disabled');
			$("#div_err").remove();
			$("#mobile_no_box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			
			$.ajax
						  ({
							url:''+baseurl+'user_login',
							type: "POST", 							
							data:{mobile_no:$("#txt_user_mobile_no").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									   
									 $("#mobile_no_box").html('');                                         							  
                                     $("#txt_user_mobile_no").val('');
									 window.location.href=""+baseurl+"page/otp";
									
									 
								   }
								    if(k=='error')
								   {
									 $("#mobile_no_box").html('');       
                                     $("#mobile_no_box").append('<span style="color:red">'+v+'</span>');	
									 $("#btn_mobile_no").removeAttr('disabled');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
		}
	});
	
	$("#btn_otp").click(function()
	{
		 if($("#txt_user_otp").val()=="")
		{
			$("#div_err").remove();
			$("#txt_user_otp").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter OTP</div>');
			$("#txt_user_otp").focus();
			return false;
				
		}
		else
		{
			$("#btn_otp").attr('disabled','disabled');
			$("#div_err").remove();
			$("#otp_box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			
			$.ajax
						  ({
							url:''+baseurl+'check_otp',
							type: "POST", 							
							data:{otp:$("#txt_user_otp").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									   
									 $("#otp_box").html(''); 
                                     $("#otp_box").append('<span style="color:green">'+v+'</span>');										 
                                     $("#otp_box").val('');
									 window.location.href=""+baseurl+"page/test_details";
									
									 
								   }
								    if(k=='error')
								   {
									 $("#otp_box").html('');       
                                     $("#otp_box").append('<span style="color:red">'+v+'</span>');	
									 $('#btn_otp').removeAttr('disabled');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
		}
	});
	$("#btn_send_mail").click(function()
	{
		
		if($("#txt_name").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}	
	   else  if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid phone no</div>');
			$("#txt_phone").focus();
			return false;
				
		}
	  
		else  if(!email_regex.test($("#txt_email").val()))
		{
			
			
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid email</div>');
			$("#txt_email").focus();
			return false;
		}
		
			else  if(!email_regex.test($("#txt_address").val()))
		{
			
			
			$("#div_err").remove();
		//	$("#txt_address").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid address</div>');
			$("#txt_address").focus();
			return false;
		}
		
		
		
			else  if(!email_regex.test($("#txt_message").val()))
		{
			
			
			$("#div_err").remove();
		/*   	$("#txt_message").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Message</div>');  */
		
		
/*			$("#txt_message").focus();
			return false;
		}
		
		
		else
		{
			
			$("#div_err").remove();
			$("#mail-msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			message=$("#txt_msg").val();
			$.ajax
						  ({
							url:''+baseurl+'sendmail',
							type: "POST", 
							data:{name:$("#txt_name").val(),email:$("#txt_email").val(),phone:$("#txt_phone").val(),address:$("#txt_address").val(),msg:message,address:$("#txt_message").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#mail-msg-box").html('');    
                                     $("#mail-msg-box").append('<span id="div_success" style="color:#fff">'+v+'</span>');									   
                                     $("#txt_name").val('');
									 $("#txt_email").val('');
									// $("#txt_phone").val('');
									 $("#txt_msg").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box").html('');       
                                     $("#mail-msg-box").append('<span style="color:#fff">'+v+'</span>');	
									 $("#txt_name").val('');
									 $("#txt_email").val('');
									 //$("#txt_phone").val('');
									 $("#txt_msg").val('');
								   }
	});
	}
							
    });
		}
	});
});



*/


/*  new script  */
<!-- new script-->


$(document).ready(function()
{  

    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	var message='';
	$("#btn_mobile_no").click(function()
	{
		 if(!phone_regex.test($("#txt_user_mobile_no").val()))
		{
			$("#div_err").remove();
			$("#txt_user_mobile_no").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid phone no</div>');
			$("#txt_user_mobile_no").focus();
			return false;
				
		}
		else
		{
			$("#btn_mobile_no").attr('disabled','disabled');
			$("#div_err").remove();
			$("#mobile_no_box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			
			$.ajax
						  ({
							url:''+baseurl+'user_login',
							type: "POST", 							
							data:{mobile_no:$("#txt_user_mobile_no").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									   
									 $("#mobile_no_box").html('');                                         							  
                                     $("#txt_user_mobile_no").val('');
									 window.location.href=""+baseurl+"page/otp";
									
									 
								   }
								    if(k=='error')
								   {
									 $("#mobile_no_box").html('');       
                                     $("#mobile_no_box").append('<span style="color:red">'+v+'</span>');	
									 $("#btn_mobile_no").removeAttr('disabled');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
		}
	});
	
	$("#btn_otp").click(function()
	{
		 if($("#txt_user_otp").val()=="")
		{
			$("#div_err").remove();
			$("#txt_user_otp").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter OTP</div>');
			$("#txt_user_otp").focus();
			return false;
				
		}
		else
		{
			$("#btn_otp").attr('disabled','disabled');
			$("#div_err").remove();
			$("#otp_box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			
			$.ajax
						  ({
							url:''+baseurl+'check_otp',
							type: "POST", 							
							data:{otp:$("#txt_user_otp").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									   
									 $("#otp_box").html(''); 
                                     $("#otp_box").append('<span style="color:green">'+v+'</span>');										 
                                     $("#otp_box").val('');
									 window.location.href=""+baseurl+"page/test_details";
									
									 
								   }
								    if(k=='error')
								   {
									 $("#otp_box").html('');       
                                     $("#otp_box").append('<span style="color:red">'+v+'</span>');	
									 $('#btn_otp').removeAttr('disabled');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
		}
	});
	$("#btn_send_mail").click(function()
	{
		
		if($("#txt_name").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}	
	   else  if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter valid phone no</div>');
			$("#txt_phone").focus();
			return false;
				
		}
	  
		else  if(!email_regex.test($("#txt_email").val()))
		{
			
			
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter valid email</div>');
			$("#txt_email").focus();
			return false;
		}
		
		
		
		else if($("#txt_address").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_address").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Valid Address</div>');
			$("#txt_address").focus();
			return false;
		}	
		
	
		
		
		else
		{
			
			$("#div_err").remove();
			$("#mail-msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			message=$("#txt_msg").val();
			$.ajax
						  ({
							url:''+baseurl+'sendmail',
							type: "POST", 
							data:{name:$("#txt_name").val(),email:$("#txt_email").val(),phone:$("#txt_phone").val(),address:$("#txt_address").val(),msg:message},
							
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#mail-msg-box").html('');    
                                     $("#mail-msg-box").append('<span id="div_success" style="color:#fff">'+v+'</span>');									   
                                     $("#txt_name").val('');
									 $("#txt_email").val('');
									$("#txt_phone").val('');
									
									
									$("#txt_address").val('');
									
									
									 $("#txt_msg").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box").html('');       
                                     $("#mail-msg-box").append('<span style="color:#fff">'+v+'</span>');	
									 $("#txt_name").val('');
									 $("#txt_email").val('');
									 $("#txt_phone").val('');
									 
									 $("#txt_address").val('');
									 
									 
									 $("#txt_msg").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
	
	$("#btn_send_mail1").click(function()
	{
		
		if($("#txt_name1").val()=='')
		{
			//alert("enter name");
			
			$("#div_err").remove();
			$("#txt_name1").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Name</div>');
			$("#txt_name1").focus();
			return false;
		}	
	   
	  
		else  if(!email_regex.test($("#txt_email1").val()))
		{
			//alert("enter valid email");
			
			$("#div_err").remove();
			$("#txt_email1").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid email</div>');
			$("#txt_email1").focus();
			return false;
		}
		
		else  if(!phone_regex.test($("#txt_phone1").val()))
		{
			$("#div_err").remove();
			$("#txt_phone1").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid phone no</div>');
			$("#txt_phone1").focus();
			return false;
				
		}	
		else  if($("#txt_msg1").val()=='')
		{
			//alert("enter name");
			
			$("#div_err").remove();
			$("#txt_msg1").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Test</div>');
			$("#txt_msg1").focus();
			return false;
		}	
	   
		else
		{
			
			$("#div_err").remove();
			$("#mail-msg-box1").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			message=$("#txt_msg1").val();
			$.ajax
						  ({
							url:''+baseurl+'testinsert',
							type: "POST", 
							data:{name:$("#txt_name1").val(),email:$("#txt_email1").val(),phone:$("#txt_phone1").val(),msg:message},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#mail-msg-box1").html('');    
                                     $("#mail-msg-box1").append('<span id="div_success" style="color:green">'+v+'</span>');									   
                                     $("#txt_name1").val('');
									 $("#txt_email1").val('');
									 $("#txt_phone1").val('');
									 $("#txt_msg1").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box1").html('');       
                                     $("#mail-msg-box1").append('<span style="color:green">'+v+'</span>');	
									 $("#txt_name1").val('');
									 $("#txt_email1").val('');
									 $("#txt_phone1").val('');
									 $("#txt_msg1").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
	
	

});





<!-- new script-->






