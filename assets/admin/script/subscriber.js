
$(document).ready(function()
{  
   
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	$("#submits123").click(function()
	{
		
		/*if($("#name").val()=='')
		{						
			$("#div_err").remove();
			$("#name").parent().append('<div id="div_err" style="color:#fff">Please Enter Name</div>');
			$("#name").focus();
			return false;
		}
							
	     else */if(!email_regex.test($("#txt_subscriber_email").val()))
		{						
			$("#div_err").remove();
			$("#txt_subscriber_email").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">Please Enter valid email</div>');
			$("#txt_subscriber_email").focus();
			return false;
		}	
			
		
		else
		{
			$("#div_err").remove();
			$("#msg-box123").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'addsubscriber',
							type: "POST", 
							/*data:{name:$("#name").val(),email:$("#email").val()},*/
							data:{email:$("#txt_subscriber_email").val()},
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#msg-box123").html('');    
                                     //$("#msg-box").append('<span style="color:#fff">'+v+'</span>');
									 $("#div_err").remove();	
									 $("#txt_subscriber_email").parent().append('<div id="div_success" class="col-md-12" style="color:green">'+v+'</div>');								   
                                     //$("#name").val('');
									 $("#txt_subscriber_email").val('');
									 $("#name").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#msg-box123").html('');   
									 $("#div_err").remove(); 
                                     $("#txt_subscriber_email").parent().append('<div id="div_err" class="col-md-12" style="color:#fff">'+v+'</div>');	
									 
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 return false;
		}
			
	});
});

