
$(document).ready(function()
{  

    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	var message='';
	
	$("#btn_send_mail1").click(function()
	{
		
		if($("#txt_name").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}	
	   
	    else if($("#txt_age").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_age").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Age</div>');
			$("#txt_age").focus();
			return false;
		}
		else  if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter valid phone no</div>');
			$("#txt_phone").focus();
			return false;
				
		}
		
		else if($("#txt_batting_style").val()=='')
		{
						
			$("#div_err").remove();
			$("#txt_batting_style").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Batting Style</div>');
			$("#txt_batting_style").focus();
			return false;
		}
		else if($("#txt_bowling_style").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_bowling_style").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Bowling Style</div>');
			$("#txt_bowling_style").focus();
			return false;
		}
		else if($("#txt_msg").val()=='')
		{
			
			
			$("#div_err").remove();
			$("#txt_msg").parent().append('<div id="div_err" class="col-md-12" style="color:red">Please Enter Academic Details</div>');
			$("#txt_msg").focus();
			return false;
		}
		else
		{
			
			$("#div_err").remove();
			$("#mail-msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			message=$("#txt_msg").val();
			$.ajax
						  ({
							url:''+baseurl+'sendmail1',
							type: "POST", 
							data:{name:$("#txt_name").val(),age:$("#txt_age").val(),phone:$("#txt_phone").val(),batting:$("#txt_batting_style").val(),bowling:$("#txt_bowling_style").val(),msg:message},
							
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#mail-msg-box").html('');    
                                     $("#mail-msg-box").append('<span id="div_success" style="color:green">'+v+'</span>');									   
                                     $("#txt_name").val('');
									 $("#txt_email").val('');
									// $("#txt_phone").val('');
									 $("#txt_msg").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box1").html('');       
                                     $("#mail-msg-box1").append('<span style="color:green">'+v+'</span>');	
									 $("#txt_name").val('');
									 $("#txt_age").val('');
									 $("#txt_phone").val('');
									 $("#txt_batting_style").val('');
									 $("#txt_bowling_style").val('');
									 $("#txt_msg").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
	
	
});

