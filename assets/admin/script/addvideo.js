
$(document).ready(function()
{
    $("#txt_file_title").focus();	
	
	/*$("#file_video").change(function()
	{
				
				 
				 
				if($("#file_video").val().length==0)
				{
					
					$("#div_err").remove();
					$("#file_video").parent().append('<div id="div_err" >Please Select video to upload</div>');
					$("#file_video").focus();
					return false;
				}
				else
				{
					    $("#file_video").parent().append("<img id='loading' style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
						$("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'uploadvideo',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_video")),
							contentType: false,       		
							cache: false,					
							processData:false,  							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
									  if(k=='error')
									  {
										  
										$("#div_err").remove();
										$("#loading").remove();
										$("#file_video").parent().append('<div id="div_err" >'+v+'</div>');
										$("#file_video").focus();
									  }	
									 else 
									 {
										
										for(i in v)
										{
											if(i=='file_name')
											{
												$("#hid_upload").val(v[i]);
											}	
											else
											{										
												$("#div_err").remove();
												$("#loading").remove();
												$("#file_video").parent().append('<div id="div_err" style="color:green">'+v[i]+'</div>');
												
											}
										}
									  }	
									  
									  
								});
								
							}
					    });
						return false;
					
				}
 
	});*/
    
	$("#btn_add").click(function()
	{
		
		if($("#txt_file_title").val()=='')
		{
			$("#div_err").remove();
			$("#txt_file_title").parent().append('<div id="div_err" style="color:red">>Please Enter File Title</div>');
			$("#txt_file_title").focus();
			return false;
		}
        else if($("#txt_file_title").val().length<4)
		{
			$("#div_err").remove();
			$("#txt_file_title").parent().append('<div id="div_err" style="color:red">Your File Title is too short. Please Enter minimum four characters</div>');
			$("#txt_file_title").focus();
			return false;
		}
       
	                           
		else if($("#file").val().length==0)
		{
			
			$("#div_err").remove();
			$("#file").parent().append('<div id="div_err" >Please upload video</div>');
			$("#file").focus();
			return false;
		}
        
		else
		{
			$("#div_err").remove();
			$("#msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'member/insertfile',
							type: "POST", 
							data:$("#frm_file").serialize(),
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									   
									$("#file").val('');   
									$("#txt_file_title").val('');
									$("#txt_description").val('');									
									$("#msg-box").html('');   
									$("#msg-box").append('<div id="div_err" style="color:green">'+v+'</div>');
									
									
								   }
								    if(k=='error')
								   {
									   
									$("#file").val('');    
									$("#msg-box").html('');   
									$("#msg-box").append('<div id="div_err" style="color:green">'+v+'</div>');
									
								   }
								   
                                   									 
									  
									 
								});
							}
							
                             });
							 return false;
		}
			
	});
});

