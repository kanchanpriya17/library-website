$(document).ready(function ()
{   
   
    $("#post").css('background','#1e282c');
	$("#post").css('border-left','3px solid #3c8dbc');
	
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
   
	
	 if(localStorage.getItem("id")!=null && localStorage.getItem("title")!=null )
	 {
		$("#txt_title").val(localStorage.getItem("title"));
			
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/category';	
	});
	
		
		
	$("#btn_update").click(function()
	{
		
					
			      $.ajax
						  ({
							url:''+baseurl+'categoryupdate',
							type: "POST", 
							data:{id:localStorage.getItem("id"),title:$("#txt_title").val(),tag:'update'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("categorymsg",v); 									   
                                         window.location.href=''+baseurl+'admin/category';					   
																																																							
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
		
		
	
});	