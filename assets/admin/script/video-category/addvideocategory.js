$(document).ready(function ()
{   
    $("#video").css('background','#1e282c');
	$("#video").css('border-left','3px solid #3c8dbc');
	
	$("#post").css('background','#222d32');
	$("#post").css('border-left','none');
	
	$("#slider").css('background','#222d32');
	$("#slider").css('border-left','none');
	
	$("#index").css('background','#222d32');
	$("#index").css('border-left','none');
	
	$("#page").css('background','#222d32');
	$("#page").css('border-left','none');
	
	$("#setting").css('background','#222d32');
	$("#setting").css('border-left','none'); 
	
	$("#user").css('background','#222d32');
	$("#user").css('border-left','none'); 
	
	$("#txt_title").focus();
   	
		$("#btn_save").click(function()
		{
			
					
			      $.ajax
						  ({
							url:''+baseurl+'videocategorysave',
							type: "POST", 
							data:{title:$("#txt_title").val(),tag:'save'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("categorymsg",v); 									   
                                         window.location.href=''+baseurl+'admin/video-category';					   
																																																							
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
									    
									  
									 
								});
							}
							
                             });

						 
	
			
		});
		
		$("#btn_cancel").click(function()
		{
			 
			 window.location.href=''+baseurl+'admin/video-category';	
		});
		
		
	
});	