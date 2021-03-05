$(document).ready(function ()
{  
     $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#user").css('background','#1e282c');
	$("#user").css('border-left','3px solid #3c8dbc');
    
	 $("#txt_old_password").focus();
	 
	
	 
	$("#btn_cancel").click(function()
	{
		window.location.href=''+baseurl+'admin/dashboard';
		
	});
	
	
	

	
	$("#btn_save").click(function()
	{
	
	     if($("#txt_old_password").val()=='' )
		 {
		   $("#txt_old_password").parent().find("#div_err").remove();
		   $("#txt_old_password").focus();
		   $("#txt_old_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">This Field Can not be lef blank</div>');
		   return false;
		 }
		 else
		 {
			 $("#txt_old_password").parent().find("#div_err").remove(); 
		 }
		 if($("#txt_admin_password").val()=='' )
		 {
		   $("#txt_admin_password").parent().find("#div_err").remove();
		   $("#txt_admin_password").focus();
		   $("#txt_admin_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">This Field Can not be lef blank</div>');
		   return false;
		 }
		 else
		 {
			 $("#txt_admin_password").parent().find("#div_err").remove(); 
		 }
		  if($("#txt_admin_confirm_password").val()=='' )
		 {
		   $("#txt_admin_confirm_password").parent().find("#div_err").remove();
		   $("#txt_admin_confirm_password").focus();
		   $("#txt_admin_confirm_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">This Field Can not be lef blank</div>');
		    return false;
		 }
		  else
		 {
			 $("#txt_admin_confirm_password").parent().find("#div_err").remove(); 
		 }
		 if($("#txt_admin_password").val()!=$("#txt_admin_confirm_password").val())
		 {
			$("#txt_admin_confirm_password").parent().find("#div_err").remove();
		   $("#txt_admin_confirm_password").focus();
		   $("#txt_admin_confirm_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">password not matched</div>');
		   return false;
		 }
		  else
		 {
			 $("#txt_admin_confirm_password").parent().find("#div_err").remove(); 
		 }
		 if($("#txt_admin_password").val()==$("#txt_admin_confirm_password").val())
		 {
		  $.ajax
						  ({
							url:''+baseurl+'userupdate',
							type: "POST", 
							data:{old_pass:$("#txt_old_password").val(),pass:$("#txt_admin_password").val()},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
									     
                                       									   
                                        				   
													$.ajax({
													url:''+baseurl+'logout',  	
													type: "POST", 
													data:{tag:'logout'},
													cache: false,							
													success: function(data)  		
													{
													var data	=	$.parseJSON(data);	
													$.each(data, function(k,v) 
													{
													if(k=='logout')
													{

													 
													window.location.href=''+baseurl+'admin';


													}

													});
													}
													});																																																
								   }
								   if(k=='error')
								   {
								       $("#txt_old_password").parent().find("#div_err").remove();
									   $("#txt_old_password").focus();
									   $("#txt_old_password").parent().append('<div id="div_err" class="alert alert-danger" role="alert">'+v+'</div>');
								   }
								   							  
								   
									    
									  
									 
								});
							}
							
                             });
							 
		    }
	});
	
});  

