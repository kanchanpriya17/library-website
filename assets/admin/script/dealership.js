
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
	$("#btn_dealership_mail").click(function()
	{
		if($("#txt_name").val()=='')
		{
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}
		else if($("#txt_cname").val()=='')
		{
			$("#div_err").remove();
			$("#txt_cname").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Company Name</div>');
			$("#txt_cname").focus();
			return false;
		}
	   else if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Valid Phone no.</div>');
			$("#txt_phone").focus();
			return false;
		}
		else if(!email_regex.test($("#txt_email").val()))
		{
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Valid Email</div>');
			$("#txt_email").focus();
			return false;
		}
		
			else if($("#txt_city").val()=='')
		{
			$("#div_err").remove();
			$("#txt_city").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter City</div>');
			$("#txt_city").focus();
			return false;
		}
			else if($("#txt_natureofbusiness").val()=='')
		{
			$("#div_err").remove();
			$("#txt_natureofbusiness").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Select Nature of Business</div>');
			$("#txt_natureofbusiness").focus();
			return false;
		}
		else if($("#txt_gstno").val()=='')
		{
			$("#div_err").remove();
			$("#txt_gstno").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter GST Number</div>');
			$("#txt_gstno").focus();
			return false;
		}
		else if($("#txt_establish").val()=='')
		{
			$("#div_err").remove();
			$("#txt_establish").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Year of Establishment</div>');
			$("#txt_establish").focus();
			return false;
		}
		else if($("#txt_add").val()=='')
		{
			$("#div_err").remove();
			$("#txt_add").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Office Address</div>');
			$("#txt_add").focus();
			return false;
		}
		else if($("#txt_message").val()=='')
		{
			$("#div_err").remove();
			$("#txt_message").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Message</div>');
			$("#txt_message").focus();
			return false;
		}
		else
		{
			
			$("#div_err").remove();
			$("#mail-msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			message=$("#txt_msg").val();
			$.ajax
						  ({
							url:''+baseurl+'senddealermail',
							type: "POST", 
							data:{name:$("#txt_name").val(),cname:$("#txt_cname").val(),phone:$("#txt_phone").val(),email:$("#txt_email").val(),city:$("#txt_city").val(),nature:$("#txt_natureofbusiness").val(),gstno:$("#txt_gstno").val(),establish:$("#txt_establish").val(),add:$("#txt_add").val(),msg:message},
							
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
                                     
                                     $("#txt_cname").val('');
                                     
                                     $("#txt_phone").val('');
									 $("#txt_email").val('');
									 $("#txt_city").val('');
									 $("#txt_natureofbusiness").val('');
									 $("#txt_gstno").val('');
									 $("#txt_establish").val('');
									 $("#txt_add").val('');
									 $("#txt_msg").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box").html('');       
                                     $("#mail-msg-box").append('<span style="color:#fff">'+v+'</span>');	
									 $("#txt_name").val('');
									  $("#txt_cname").val('');
									 	$("#txt_phone").val('');
									    $("#txt_email").val('');
									     $("#txt_city").val('');
									     $("#txt_natureofbusiness").val('');
									     $("#txt_gstno").val('');
							            $("#txt_establish").val('');
									      $("#txt_add").val('');
				
									 $("#txt_msg").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
	});