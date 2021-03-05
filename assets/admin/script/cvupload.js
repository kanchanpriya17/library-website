
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$("#btn_cvuploadmail").click(function()
	{
		if($("#txt_name").val()=='')
		{
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter Name</div>');
			$("#txt_name").focus();
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
							url:''+baseurl+'sendcvuploadmail',
							type: "POST", 
							data:{name:$("#txtname").val(),phone:$("#txtphone").val(),email:$("#txtemail").val(),add:$("#txtaddress").val()},
							
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
                                     $("#txtname").val('');
                                     $("#txtphone").val('');
                                     $("#txtemail").val('');
                                     $("#txtaddress").val('');
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box").html('');       
                                     $("#mail-msg-box").append('<span style="color:#fff">'+v+'</span>');	
									 $("#txtname").val('');
									 $("#txtphone").val('');
									 $("#txtemail").val('');
									 $("#txtaddress").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
	});