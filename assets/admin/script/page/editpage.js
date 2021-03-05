$(document).ready(function ()
{   
   
   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#page").css('background','#1e282c');
	$("#page").css('border-left','3px solid #3c8dbc');
	
	initSample(); 	
	$("#txt_title").focus();
    
	 $("#slct_page").append('<option value='+localStorage.getItem("parent_page_id")+'>'+localStorage.getItem("parent_page_name")+'</option>');
	 $.ajax
	  ({
		url:''+baseurl+'loadpage',
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
							if(v[i]['id']!=localStorage.getItem("parent_page_id") && v[i]['id']!=localStorage.getItem("page_id"))
							  $("#slct_page").append('<option value='+v[i]['id']+'>'+v[i]['title']+'</option>');
						 }	 
					 }
				});
		}
	  });	
	
	 if(localStorage.getItem("page_id")!=null && localStorage.getItem("page_title")!=null && localStorage.getItem("page_sub_title")!=null && localStorage.getItem("page_description")!=null && localStorage.getItem("page_image_name")!=null && localStorage.getItem("page_header_image")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("page_title"));
		$("#txt_sub_title").val(localStorage.getItem("page_sub_title"));
		CKEDITOR.instances.editor.setData(localStorage.getItem("page_description")); 
		if(localStorage.getItem('page_image_name')!='')
		 $("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/'+localStorage.getItem('page_image_name')+'" alt="Uploading...."/>');
		if(localStorage.getItem('page_header_image')!='')
		 $("#img_preview1").html('<img  style="width:100%" src="'+baseurl+'upload/'+localStorage.getItem('page_header_image')+'" alt="Uploading...."/>'); 
		
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/page';	
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
							url:''+baseurl+'pageupload',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_page")),
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
												
												localStorage.setItem("page_image_name",v[i]);
												$("#img_preview").html('');
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
		
		$("#file_image1").change(function()
		{
				
				 
				 
				if($("#file_image1").val().length==0)
				{
					$("#file_image1").parent().find("#div_err").remove();
				    $("#file_image1").parent().append('<div id="div_err" class="alert alert-danger" role="alert">Please Select Image !!!</div>');
					return false;
				}
				else
				{
					    $("#img_preview1").html('<img   src="'+baseurl+'assets/admin/images/ajax-loader.gif" alt="Uploading...."/>');
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
						$("#file_image1").parent().find("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'pageupload1',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_page")),
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
										$("#file_image1").parent().find("#div_err").remove();
										$("#file_image1").parent().removeClass("form-group has-error");
										$("#file_image1").parent().append('<div id="div_err" class="alert alert-danger" role="alert">'+v+'</div>');
									  }	
									 else 
									 {
										
										for(i in v)
										{
											if(i=='file_name')
											{
												
												localStorage.setItem("page_header_image",v[i]);
												$("#img_preview1").html('');
												$("#img_preview1").html('<img  style="width:100%" src="'+baseurl+'upload/thumb/'+v[i]+'" alt="Uploading...."/>');
												$("#file_image1").val('');
											}	
											else
											{										
												$("#file_image1").parent().find("#div_err").remove();
												 $("#file_image1").parent().removeClass("form-group has-error");
											    $("#file_image1").parent().addClass("form-group has-success");
												$("#file_image1").parent().append('<div id="div_err" class="alert alert-success" role="alert">'+v[i]+'</div>');
												$("#file_image1").parent().find("#div_err").fadeOut(2000);
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
		 localStorage.setItem("page_image_name","");
		 $("#file_image").val('');
		 $("#img_preview").html('');
		 
	});	

    $("#btn_remove1").click(function()
	{
		 localStorage.setItem("page_header_image","");
		 $("#file_image1").val('');
		 $("#img_preview1").html('');
		 
	});		
		
	$("#btn_update").click(function()
	{
		           $("#header2").html('');
		          $.ajax
						  ({
							url:''+baseurl+'pageupdate',
							type: "POST", 
							data:{id:localStorage.getItem("page_id"),title:$("#txt_title").val(),sub_title:$("#txt_sub_title").val(),description:CKEDITOR.instances.editor.getData(),image_name:localStorage.getItem("page_image_name"),parent_page_id:$("#slct_page").val(),tag:'update',header_image:localStorage.getItem("page_header_image")},
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

