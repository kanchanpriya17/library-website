$(document).ready(function ()
{  
$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#setting").css('background','#1e282c');
	$("#setting").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("settingmsg")!=null)
	 {
		 var x=localStorage.getItem("settingmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("settingmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_cancel").click(function()
	{
		window.location.href=''+baseurl+'admin/dashboard';
		
	});
	
	
	$.ajax
		  ({
			url:''+baseurl+'loadsetting',
			type: "POST", 
			data:{},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{ 
				
				  for(i in v)
				  {
					  if(v[i]=='email')
						  $("#txt_email").val(v['value']);  
					   if(v[i]=='phone') 
						  $("#txt_phone").val(v['value']);
					    if(v[i]=='mobile_no') 
						  $("#txt_mob_no").val(v['value']);
					   if(v[i]=='facebook')  
						  $("#txt_facebook").val(v['value']);
                       if(v[i]=='linkedin')
						  $("#txt_linkedin").val(v['value']);  
                       if(v[i]=='twitter')
						  $("#txt_twitter").val(v['value']);
					  if(v[i]=='address')
						  $("#txt_address").val(v['value']);
					  if(v[i]=='google')
						  $("#txt_google").val(v['value']);	
					 if(v[i]=='pinterest')
						  $("#txt_pinterest").val(v['value']); 	  				
                      if(v[i]=='site_name')
						  $("#txt_site_name").val(v['value']);




					   if(v[i]=='skype')
						  $("#txt_skype").val(v['value']);
                      if(v[i]=='instagram')
						 $("#txt_instagram").val(v['value']);
					
					 					 
                      if(v[i]=='opening_hours')
						 $("#txt_ohours").val(v['value']);
					  if(v[i]=='happy_hours')
						 $("#txt_hhours").val(v['value']);
								  
                        
                         if(v[i]=='twitter_wiget')
	                      $("#txt_twitter").val(v['value']);
								  

					  
				     if(v[i]=='map')
						  $("#txt_map").val(v['value']); 
					 if(v[i]=='timing1')
						  $("#txt_timing1").val(v['value']); 	  		    
					 if(v[i]=='timing2')
						  $("#txt_timing2").val(v['value']); 
                     if(v[i]=='timing3')
						  $("#txt_timing3").val(v['value']); 						  
					
				     	  
					 	  	  	  	   
			  	 					  
				  }	  
				  
				});
			}
			
			 });

	
	$("#btn_save").click(function()
	{
		 
		  $.ajax
						  ({
							url:''+baseurl+'settingupdate',
							type: "POST", 
							data:$("#frm_setting").serialize(),
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
									     
                                         localStorage.setItem("settingmsg",v); 									   
                                         window.location.href=''+baseurl+'admin/setting';					   
																																																							
								   }
								   else if(k=='error')
									  {
										  $('#frm_setting input').each(function() 
										  {
											  if($(this).is('input'))
											  {
											   $(this).parent().find("#div_err").remove();
											   $(this).parent().removeClass("form-group has-error");
											   $(this).parent().addClass("form-group has-success");
											  } 
										  });
									   
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
									    
									  
									 
								});
							}
							
                             });
		
	});
	
});  

