$(document).ready(function ()
{   
   
    $("#slider").css('background','#1e282c');
	$("#slider").css('border-left','3px solid #3c8dbc');
	
	$("#index").css('background','#222d32');
	$("#index").css('border-left','none');
	
	$("#post").css('background','#222d32');
	$("#post").css('border-left','none');
	
	$("#page").css('background','#222d32');
	$("#page").css('border-left','none');
	
	$("#setting").css('background','#222d32');
	$("#setting").css('border-left','none'); 
	
	$("#user").css('background','#222d32');
	$("#user").css('border-left','none'); 
	
	initSample();	
	$("#txt_title").focus();
   
	
	 if(localStorage.getItem("id")!=null && localStorage.getItem("title")!=null && localStorage.getItem("description")!=null && localStorage.getItem("image_name")!=null && localStorage.getItem("virtual_image_name")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("title"));
		$("#txt_sub_title").val(localStorage.getItem("sub_title"));
		CKEDITOR.instances.editor.setData(localStorage.getItem("description")); 
		$("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+localStorage.getItem('image_name')+'" alt="Uploading...."/>');
		$("#hid_upload").val(localStorage.getItem("virtual_image_name"));
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/slider';	
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
							url:''+baseurl+'sliderupload',  	
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
												localStorage.setItem('image_name',v[i]);
												localStorage.setItem('virtual_image_name',$("#file_image").val());
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
		
		
		
	$("#btn_update").click(function()
	{
		if(localStorage.getItem('image_name')==null)
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
							url:''+baseurl+'sliderupdate',
							type: "POST", 
							data:{id:localStorage.getItem("id"),title:$("#txt_title").val(),sub_title:$("#txt_sub_title").val(),description:CKEDITOR.instances.editor.getData(),image_name:localStorage.getItem('image_name'),virtual_image_name:localStorage.getItem('virtual_image_name'),tag:'update'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("slidermsg",v); 									   
                                         window.location.href=''+baseurl+'admin/slider';					   
																																																							
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
		
		
	
});	