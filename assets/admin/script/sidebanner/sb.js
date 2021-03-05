$(document).ready(function ()
{   
   
   $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#sb").css('background','#1e282c');
	$("#sb").css('border-left','3px solid #3c8dbc');
	
		
	$("#txt_title").focus();
   
	
	 
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/dashboard';	
	});
	$("#file_image").change(function()
		{
				
				 
				 
				if($("#file_image").val().length==0)
				{
					$("#file_image").parent().find("#div_err").remove();
				    $("#file_image").parent().append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Image !!!</div>');
					return false;
				}
				else
				{      $("#img_preview").html('<img   src="'+baseurl+'assets/admin/images/ajax-loader.gif" alt="Uploading...."/>');
					   /* var files = !!this.files ? this.files : [];
						if (!files.length || !window.FileReader) return; 
                       
						if (/^image/.test( files[0].type) && (files[0].size<2097152))
						{ 
							var reader = new FileReader(); 
							reader.readAsDataURL(files[0]); 

							reader.onloadend = function()
							{

								$("#img_preview").html('<img  style="width:100%" src="'+this.result+'" alt="Uploading...."/>');
							}
						}
						 */
						$("#file_image").parent().find("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'sidebannerupload',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_sidebanner")),
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
										alert();  
										$("#file_image").parent().find("#div_err").remove();
										$("#file_image").parent().removeClass("form-group has-error");
										$("#file_image").parent().append('<div id="div_err" class="alert alert-danger" role="alert">'+v+'</div>');
									  }	
									 else 
									 {
										
										for(i in v)
										{
											if(i=='file_name')
											{
												
												localStorage.setItem('image_name',v[i]);												
												$("#img_preview").html();
												$("#img_preview").html('<img   src="'+baseurl+'upload/thumb/'+v[i]+'" alt="Uploading...."/>');
											}	
											else
											{										
												$("#file_image").parent().find("#div_err").remove();
												$("#file_image").parent().removeClass("form-group has-error");
											    $("#file_image").parent().addClass("form-group has-success");
												$("#file_image").parent().append('<div id="div_err" class="alert alert-success" role="alert">'+v[i]+'</div>');
												
											}
										}
									  }	
									  
									  
								});
								
							}
					    });
						return false;
					
				}
 
		});
		
		
		
	$("#btn_update").click(function()
	{
		if(localStorage.getItem('image_name')==null || $("#file_image").val().length==0)
				{
					$("#file_image").parent().find("#div_err").remove();
					$("#file_image").parent().addClass("form-group has-error");
				    $("#file_image").parent().append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Image !!!</div>');
					return false;
				}
				else
				{
					
			      $.ajax
						({
							url:''+baseurl+'sidebannerupdate',
							type: "POST", 
							data:{image_name:localStorage.getItem('image_name')},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         $("#file_image").val(''); 									   
                                        $("#header2").append('<div id="div_err" class="alert alert-success" role="alert">'+v+'</div>');					   
																																																							
								   }
								   else if(k=='error')
									{
										 $("#header2").append('<div id="div_err" class="alert alert-danger" role="alert">'+v+'</div>'); 
									}
									    
									  
									 
								});
							}
							
                        });
                         
				}		 
	
	});
		
		
	
});	