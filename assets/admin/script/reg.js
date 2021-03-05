
$(document).ready(function()
{
    $("#txt_name").focus();	
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	$("#btn_reg").click(function(){
		
		if($("#txt_name").val()=='')
		{
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" style="color:red">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}
        else if($("#txt_name").val().length<4)
		{
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" style="color:red">Your Name is too short. Please Enter minimum four characters</div>');
			$("#txt_name").focus();
			return false;
		}
        else if($("#txt_user_id").val()=='')
		{
			$("#div_err").remove();
			$("#txt_user_id").parent().append('<div id="div_err" style="color:red">Please Enter User ID.</div>');
			$("#txt_user_id").focus();
			return false;
		}
         else if($("#txt_user_id").val().length<4)
		{
			$("#div_err").remove();
			$("#txt_user_id").parent().append('<div id="div_err" style="color:red">Please Your User ID is too short. Please Enter minimum four characters</div>');
			$("#txt_user_id").focus();
			return false;
		}			
	    else  if(!email_regex.test($("#txt_email").val()))
		{
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" style="color:red">Please Enter valid email</div>');
			$("#txt_email").focus();
			return false;
		}	
			
		else  if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" style="color:red">Please Enter Correct phone no</div>');
			$("#txt_phone").focus();
			return false;
				
		}
		else if($("#txt_phone").val().length<10)
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" style="color:red">Please Enter 10 digit phone no</div>');
			$("#txt_phone").focus();
			return false;
		}
        else  if(!phone_regex.test($("#txt_mob_no").val()))
		{
			$("#div_err").remove();
			$("#txt_mob_no").parent().append('<div id="div_err" style="color:red">Please Enter Correct Mobile no</div>');
			$("#txt_mob_no").focus();
			return false;
				
		}
		 else if($("#txt_mob_no").val().length<10)
		{
			$("#div_err").remove();
			$("#txt_mob_no").parent().append('<div id="div_err" style="color:red">Please Enter 10 digit  Mobile no</div>');
			$("#txt_mob_no").focus();
			return false;
		}
        else  if($("#txt_password").val()=='')
		{
			$("#div_err").remove();
			$("#txt_password").parent().append('<div id="div_err" style="color:red">Please Enter Password</div>');
			$("#txt_password").focus();
			return false;
				
		}
        else  if($("#txt_password").val().length<4)
		{
			$("#div_err").remove();
			$("#txt_password").parent().append('<div id="div_err" style="color:red">Please Your User ID is too short. Please Enter minimum four characters.</div>');
			$("#txt_password").focus();
			return false;
				
		}	
         else  if($("#txt_confirm_password").val()!=$("#txt_password").val())
		{
			$("#div_err").remove();
			$("#txt_confirm_password").parent().append('<div id="div_err" style="color:red">Both Password not matched.please type correct password</div>');
			$("#txt_confirm_password").focus();
			return false;
				
		}
         else  if($("#slct_country").val()=='')
		{
			$("#div_err").remove();
			$("#slct_country").parent().append('<div id="div_err" style="color:red">Please Select Your Country</div>');
			$("#slct_country").focus();
			return false;
				
		}
        
         else  if($("#txt_address").val()=='')
		{
			$("#div_err").remove();
			$("#txt_address").parent().append('<div id="div_err" style="color:red">Please Enter Your Address</div>');
			$("#txt_address").focus();
			return false;
				
		}			
		else
		{
			$("#div_err").remove();
			//$("#msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'registration',
							type: "POST", 
							data:$("#frm_member").serialize(),
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='msg')
								   {
									window.location.href=''+baseurl+'page/confirmation';
									localStorage.setItem('msg', v);
								   }
								    if(k=='error1')
								   {
									 $("#div_err").remove();  
									 $("#txt_user_id").parent().append('<div id="div_err" style="color:red">'+v+'</div>');
									 $("#txt_user_id").focus();
									 return false;
								   }
								    if(k=='error2')
								   {
									 $("#div_err").remove();  
									 $("#txt_email").parent().append('<div id="div_err" style="color:red">'+v+'</div>');
									 $("#txt_email").focus();
									 return false;
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 return false;
		}
			
	});
});

