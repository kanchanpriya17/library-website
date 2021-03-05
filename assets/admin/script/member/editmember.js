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
    
	 if(localStorage.getItem("member_id")!=null && localStorage.getItem("name")!=null && localStorage.getItem("designation")!=null )
	 {
		
		$("#txt_name").val(localStorage.getItem("name"));
		$("#txt_designation").val(localStorage.getItem("designation"));
		/*$("#txt_address").val(localStorage.getItem("address"));
		$("#txt_phone").val(localStorage.getItem("phone"));
		$("#txt_email").val(localStorage.getItem("email"));*/
	
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/member';	
	});
	
	
		
	$("#btn_update").click(function()
	{
		          $("#header2").html('');
		          $.ajax
						  ({
							url:''+baseurl+'memberupdate',
							type: "POST", 
						data:{member_id:localStorage.getItem("member_id"),name:$("#txt_name").val(),designation:$("#txt_designation").val(),tag:'update'},
							cache: false,	
 							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         								   
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
	
	});
		
		
	
});	

