$(document).ready(function()
{   
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	$("#btn_send").click(function(){
		
		if($("#txt_name").val()=='')
		{
			//alert("enter name");
			
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" style="color:red">Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}	
	    else  if(!email_regex.test($("#txt_email").val()))
		{
			//alert("enter valid email");
			
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" style="color:red">Enter valid email</div>');
			$("#txt_email").focus();
			return false;
		}	
			
		else  if(!phone_regex.test($("#txt_phone").val()))
		{
			$("#div_err").remove();
			$("#txt_phone").parent().append('<div id="div_err" style="color:red">Enter valid phone no</div>');
			$("#txt_phone").focus();
			return false;
				
		}	
		else
		{
			$("#div_err").remove();
			$("#msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'sendhelp',
							type: "POST", 
							data:{name:$("#txt_name").val(),email:$("#txt_email").val(),phone:$("#txt_phone").val(),msg:$("#txt_msg").val(),donation:$("#slct_don_type").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#msg-box").html('');    
                                     $("#msg-box").append('<span style="color:green">'+v+'</span>');									   
                                     $("#txt_name").val('');
									 $("#txt_email").val('');
									 $("#txt_phone").val('');
									 $("#txt_msg").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#msg-box").html('');    
                                     $("#msg-box").append('<span style="color:red">'+v+'</span>');	
									 $("#txt_name").val('');
									 $("#txt_email").val('');
									 $("#txt_phone").val('');
									 $("#txt_msg").val('');
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 return false;
		}
			
	});
});

