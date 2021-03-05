$(document).ready(function ()
{   
   
   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#services").css('background','#1e282c');
	$("#services").css('border-left','3px solid #3c8dbc');
	
	
	initSample();
	$("#txt_title").focus();
   	
	
		
		$("#file_image").change(function()
		{
				
				 
				 
				if($("#file_image").val().length==0)
				{
					$("#file_image").parent().find("#div_err").remove();
				    $("#file_image").parent().append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Image !!!</div>');
					return false;
				}
				else
				{
					    $("#img_preview").html('<img   src="'+baseurl+'assets/admin/images/ajax-loader.gif" alt="Uploading...."/>');
					    /*var files = !!this.files ? this.files : [];
						if (!files.length || !window.FileReader) return; 
                       
						if (/^image/.test( files[0].type) && (files[0].size<2097152))
						{ 
							var reader = new FileReader(); 
							reader.readAsDataURL(files[0]); 

							reader.onloadend = function()
							{

								$("#img_preview").html('<img  style="width:100%" src="'+this.result+'" alt="Uploading...."/>');
							}
						} */
						$("#file_image").parent().find("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'servicesupload',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_slider")),
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
												$("#hid_upload").val(v[i]);
												$("#img_preview").html();
												$("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+v[i]+'" alt="Uploading...."/>');
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
		
		
		
		
		
		$("#btn_save").click(function()
		{
			if($("#txt_title").val()=='')
				{
					$("#txt_title").parent().find("#div_err").remove();
					$("#txt_title").parent().addClass("form-group has-error");
				    $("#txt_title").parent().append('<div id="div_err" class="alert alert-danger" role="alert">Please Enter Title !!!</div>');
					return false;
				}
				else
				{
					
			      $.ajax
						  ({
							url:''+baseurl+'servicessave',
							type: "POST", 
							data:{title:$("#txt_title").val(),description:CKEDITOR.instances.editor.getData(),image_name:$("#hid_upload").val(),virtual_image_name:$("#file_image").val(),tag:'save'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("clientmsg",v); 									   
                                         window.location.href=''+baseurl+'admin/services';					   
																																																							
								   }
								   else if(k=='error')
									  {
										  $('#frm_slider input').each(function() 
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

				}		 
	
			
		});
		
		$("#btn_cancel").click(function()
		{
			 window.location.href=''+baseurl+'admin/services';	
		});
		
		
		
	
});	

