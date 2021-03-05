$(document).ready(function ()
{   
   
   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#gallery").css('background','#1e282c');
	$("#gallery").css('border-left','3px solid #3c8dbc');
	
	
	
	
	$("#txt_title").focus();
    
	
	 
	
	 if(localStorage.getItem("album_id")!=null && localStorage.getItem("album_title")!=null && localStorage.getItem("album_image")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("album_title"));
	
		if(localStorage.getItem('album_image')!='')
		 $("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+localStorage.getItem('album_image')+'" alt="Uploading...."/>');
		
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/album';	
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
				{   
			           $("#img_preview").html('<img   src="'+baseurl+'assets/admin/images/ajax-loader.gif" alt="Uploading...."/>');
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
						} */
						$("#file_image").parent().find("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'albumupload',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_album")),
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
												
												localStorage.setItem("album_image",v[i]);
												$("#img_preview").html();
												$("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+v[i]+'" alt="Uploading...."/>');
												$("#file_image").val('');
											}	
											else
											{										
												$("#file_image").parent().find("#div_err").remove();
												 $("#file_image").parent().removeClass("form-group has-error");
											    $("#file_image").parent().addClass("form-group has-success");
												$("#file_image").parent().append('<div id="div_err" class="alert alert-success" role="alert">'+v[i]+'</div>');
												$("#file_image").parent().find("#div_err").fadeOut(2000);
												
											}
										}
									  }	
									  
									  
								});
								
							}
					    });
						return false;
					
				}
 
		});
		
	$("#btn_remove").click(function()
	{
		 localStorage.setItem("album_image","");
		 $("#file_image").val('');
		 $("#img_preview").html('');
		 
	});		
		
	$("#btn_update").click(function()
	{
		          $("#header2").html('');
		          $.ajax
						  ({
							url:''+baseurl+'albumupdate',
							type: "POST", 
							data:{id:localStorage.getItem("album_id"),title:$("#txt_title").val(),image_name:localStorage.getItem("album_image"),tag:'update'},
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

