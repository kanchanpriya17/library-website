
$(document).ready(function()
{
    $("#txt_old_password").focus();	
  
	$("#btn_change").click(function(){
		
		if($("#txt_old_password").val()=='')
		{
			$("#div_err").remove();
			$("#txt_old_password").parent().append('<div id="div_err" style="color:red">Please Enter Your Old Password</div>');
			$("#txt_old_password").focus();
			return false;
		}
		else if($("#txt_password").val()=='')
		{
			$("#div_err").remove();
			$("#txt_password").parent().append('<div id="div_err" style="color:red">Please Enter Password</div>');
			$("#txt_password").focus();
			return false;
		}
        else if($("#txt_password").val().length<4)
		{
			$("#div_err").remove();
			$("#txt_password").parent().append('<div id="div_err" style="color:red">Your Password is too short. Please Enter minimum four characters</div>');
			$("#txt_password").focus();
			return false;
		}
         else if($("#txt_password").val()!=$("#txt_confirm_password").val())
		{
			$("#div_err").remove();
			$("#txt_confirm_password").parent().append('<div id="div_err" style="color:red">Both Password not matched</div>');
			$("#txt_password").focus();
			return false;
		}
	    			
		else
		{
			$("#div_err").remove();
			
			$.ajax
						  ({
							url:''+baseurl+'member/updatepassword',
							type: "POST", 
							data:$("#frm_member").serialize(),
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									localStorage.setItem("msg",v);   
								    window.location.href=''+baseurl+'member';
									
								   }
								   if(k=='error')
								   {
									   $("#txt_old_password").parent().append('<div id="div_err" style="color:red">'+v+'</div>');
			                           $("#txt_old_password").focus();
								   }
								  								                                      									 									   
								});
							}
							
                             });
							 return false;
		}
			
	});
});

