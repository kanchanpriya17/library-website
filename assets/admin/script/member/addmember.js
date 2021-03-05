$(document).ready(function ()
{   
   
   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#members").css('background','#1e282c');
	$("#members").css('border-left','3px solid #3c8dbc');
	
	
	$("#txt_name").focus();
   	

		
		
		
		
		
		$("#btn_save").click(function()
		{
			    
			     $("#header2").html('');
			    if($("#txt_name").val()=='')
				{
				   $("#header2").find("#div_err").remove();							   
		           $("#header2").append('<div id="div_err" class="alert alert-danger" role="alert">Name Field Can not be left blank</div>');	
				}
				else
				{
					
			      $.ajax
						({
							url:''+baseurl+'membersave',
							type: "POST", 
							data:{name:$("#txt_name").val(),designation:$("#txt_designation").val(),tag:'save'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
									     
									     $("#txt_name").val('');
										// $("#txt_address").val('');	
										 $("#txt_designation").val('');										
										/* $("#txt_phone").val('');
										 $("#txt_email").val('');	*/									
										 
										 
                                         $("#header2").find("#div_err").remove();							   
		                                 $("#header2").append('<div id="div_err" class="alert alert-success" role="alert">'+v+'</div>');
										 $("#header2").find("#div_err").fadeOut(2000);
																																																							
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

					 
	            }
			
		});
		
		$("#btn_cancel").click(function()
		{
			 window.location.href=''+baseurl+'admin/member';	
		});
		
		
	
});	

