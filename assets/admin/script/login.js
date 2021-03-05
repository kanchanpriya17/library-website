
$(document).ready(function ()
{ 
  
   if(localStorage.getItem("msg")!=null)
    {
		var x=localStorage.getItem("msg");
		var box=bootbox.dialog(
		{
			message:''+x,
			title: "Message",
			buttons:
			{
				
				main: 
				{
					label: "OK",
					className: "btn-primary",
					callback: function() 
					{
					  
					}
				},
			
			}
		});
		localStorage.removeItem("msg");
		
    }
	
	
	  $('#txt_user_name').val('');
	  $('#txt_password').val('');
	   $('#txt_user_name').attr('autocomplete', 'off');
	 $('#txt_password').attr('autocomplete', 'off');
     $("#txt_user_name").focus();
	 $("#txt_user_name").keypress(function()
	 {
			 
			if(($(this).val().length)>19)
			{
				$(this).parent().removeClass("form-group has-error");
				$(this).parent().find("#div_err").remove();
				$(this).parent().addClass("form-group has-error");
				$(this).parent().append('<div id="div_err" class="alert alert-danger" role="alert">Maximum length exceeded !!!</div>');
				return false;
			}
			else
			{
			   
			   $(this).parent().removeClass("form-group has-error");
			   $(this).parent().addClass("form-group has-feedback");
			   $(this).parent().find("#div_err").remove();
			}	
	 });
	 
	 $("#txt_user_name").bind("keyup",function(e)
	 {
	     
		
			if(e.keyCode==8)
			{
				if(($(this).val().length)<20)
				{
					$(this).parent().removeClass("form-group has-error");
					$(this).parent().addClass("form-group has-feedback");
					$(this).parent().find("#div_err").remove();
				}	
			}
			if(e.keyCode==13)
				login();
	});
	
	



	$("#txt_password").keypress(function()
	 {
			 
			if(($(this).val().length)>14)
			{
				$(this).parent().removeClass("form-group has-error");
				$(this).parent().find("#div_err").remove();
				$(this).parent().addClass("form-group has-error");
				$(this).parent().append('<div id="div_err" class="alert alert-danger" role="alert">Maximum length exceeded !!!</div>');
				return false;
			}
			else
			{
			   
			   $(this).parent().removeClass("form-group has-error");
			   $(this).parent().addClass("form-group has-feedback");
			   $(this).parent().find("#div_err").remove();
			}	
	 });
	 
	 $("#txt_password").bind("keyup",function(e)
	 {
		   
			if(e.keyCode==8)
			{
				if(($(this).val().length)<15)
				{
					$(this).parent().removeClass("form-group has-error");
					$(this).parent().addClass("form-group has-feedback");
					$(this).parent().find("#div_err").remove();
				}	
			}
			if(e.keyCode==13)
				login();
	});
	
	$("#btn_login").click(function()
	{
		login();
	});
	
	$("#btn_cancel").click(function()
	{
		$("#txt_user_name").val('');
		$("#txt_password").val('');
		$("#txt_user_name").focus();
		$("#txt_user_name").parent().removeClass("form-group has-error");
		$("#txt_user_name").parent().addClass("form-group has-feedback");
		$("#txt_user_name").parent().find("#div_err").remove();
		$("#txt_password").parent().removeClass("form-group has-error");
		$("#txt_password").parent().addClass("form-group has-feedback");
		$("#txt_password").parent().find("#div_err").remove();
	});



});

function login()
	{  
		 $.ajax
						  ({
							url:''+baseurl+'login',
							type: "POST", 
							data:{user_name:$("#txt_user_name").val(), password:$("#txt_password").val(),tag:'login'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {							 
													window.location.href=''+baseurl+'admin/dashboard';																																										
								   }
								   else if(k=='error')
									  {
									   
									    for(i in v)
										{
											if(v[i]!='')
										    {
											    $("#"+i+"").parent().find("#div_err").remove();
												$("#"+i+"").focus();
												$("#"+i+"").parent().addClass("form-group has-error");
												$("#"+i+"").parent().append('<div id="div_err" class="alert alert-danger" role="alert">'+v[i]+'</div>');
												
											}
											
											
										} 
									  }
									  else
									  {
									     $("#txt_password").parent().find("#div_err").remove();
										 $("#txt_password").parent().addClass("form-group has-error");
										 $("#txt_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">'+v+'</div>');
										 $("#txt_user_name").parent().addClass("form-group has-error");
										 $("#txt_user_name").focus();
									  }
								});
							}
							
                             });		
	
	
	
    }