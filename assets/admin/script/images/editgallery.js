$(document).ready(function ()
{   
   
   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#gallery").css('background','#1e282c');
	$("#gallery").css('border-left','3px solid #3c8dbc');
	
	
	
	initSample();
	$("#txt_title").focus();
    
	 $("#slct_album").append('<option value='+localStorage.getItem("album_id")+'>'+localStorage.getItem("event_name")+'</option>');
	 $.ajax
	  ({
		url:''+baseurl+'loadalbum1',
		type: "POST", 
		data:{},
		cache: false,							
		success: function(data)  		
		{        var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='records')
					 {
						  for(i in v)
						 {
							if(v[i]['event_name']!=localStorage.getItem("event_name"))
							  $("#slct_album").append('<option value='+v[i]['id']+'>'+v[i]['event_name']+'</option>');
						 }	 
					 }
				});
		}
	  });	
	
	 if(localStorage.getItem("gallery_id")!=null && localStorage.getItem("gallery_title")!=null && localStorage.getItem("gallery_sub_title")!=null && localStorage.getItem("gallery_description")!=null && localStorage.getItem("gallery_image_name")!=null && localStorage.getItem("album_id")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("gallery_title"));
		$("#txt_sub_title").val(localStorage.getItem("gallery_sub_title"));
		CKEDITOR.instances.editor.setData(localStorage.getItem("gallery_description")); 
		if(localStorage.getItem('gallery_image_name')!='')
		 $("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+localStorage.getItem('gallery_image_name')+'" alt="Uploading...."/>');
		
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/images';	
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
							url:''+baseurl+'galleryupload',  	
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
												
												localStorage.setItem("gallery_image_name",v[i]);
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
		 localStorage.setItem("gallery_image_name","");
		 $("#file_image").val('');
		 $("#img_preview").html('');
		 
	});		
		
	$("#btn_update").click(function()
	{
		          
		        $("#header2").html('');
			    if($("#txt_title").val()=='')
				{
				   $("#header2").find("#div_err").remove();							   
		           $("#header2").append('<div id="div_err" class="alert alert-danger" role="alert">Title Field Can not be left blank</div>');	
				}
				/*else if(localStorage.getItem("gallery_image_name")=='')
				{
				   $("#header2").find("#div_err").remove();							   
		           $("#header2").append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Image</div>');
				   	
				}*/
				else if($("#slct_album").val()=='0')
				{
				   $("#header2").find("#div_err").remove();							   
		           $("#header2").append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Album</div>');
				   	
				}
				else
				{
		          $.ajax
						  ({
							url:''+baseurl+'galleryupdate',
							type: "POST", 
							data:{id:localStorage.getItem("gallery_id"),title:$("#txt_title").val(),sub_title:$("#txt_sub_title").val(),description:CKEDITOR.instances.editor.getData(),image_name:localStorage.getItem("gallery_image_name"),album_id:$("#slct_album").val(),tag:'update'},
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
				}
	});
		
		
	
});	

