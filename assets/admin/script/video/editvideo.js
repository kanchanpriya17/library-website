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
	
	$("#txtEditor").Editor(); 	
	$("#txt_title").focus();
    
	if(localStorage.getItem("approved")!=null)
	{
		if(localStorage.getItem("approved")=='1')
		{
			$("#btn_update").hide();
			$("#btn_update1").show();
		}
		else
		{
			$("#btn_update1").hide();
			$("#btn_update").show();
		}
	}
	
	 $("#slct_cat").append('<option value='+localStorage.getItem("video_category_id")+'>'+localStorage.getItem("category_title")+'</option>');
	 
	 $.ajax
	  ({
		url:''+baseurl+'loadvideocat',
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
							if(v[i]['title']!=localStorage.getItem("category_title"))
							  $("#slct_cat").append('<option value='+v[i]['id']+'>'+v[i]['title']+'</option>');
						 }	 
					 }
				});
		}
	  });	
	
	if(localStorage.getItem("video_id")!=null && localStorage.getItem("video_title")!=null && localStorage.getItem("video_name")!=null && localStorage.getItem("description")!=null && localStorage.getItem("title")!=null && localStorage.getItem("category_id")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("video_title"));
		$("#txt_sub_title").val(localStorage.getItem("post_sub_title"));
		$("#txtEditor").Editor("setText",localStorage.getItem("description")); 
		if(localStorage.getItem('video_name')!='')
		{
		 $("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/'+localStorage.getItem('post_image_name')+'" alt="Uploading...."/>');
		 $("#img_preview").html(''+
		'<video width="100%" height="100%" controls>'+ 											
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/mp4">'+
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/ogg">'+
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/mov">'+
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/3gpp">'+
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/mpeg">'+
		'<source src="'+baseurl+'upload/'+localStorage.getItem('video_name')+'" type="video/avi">'+
		
	   '</video>'+''
		 );
		}
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/video';	
	});
		
		
	$("#btn_update").click(function()
	{
		          $.ajax
						  ({
							url:''+baseurl+'videoupdate',
							type: "POST", 
							data:{id:localStorage.getItem("video_id"),video_title:$("#txt_title").val(),description:$("#txtEditor").Editor("getText"),video_category_id:$("#slct_cat").val(),tag:'update'},
							cache: false,	
 							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("postmsg",v); 									   
                                         window.location.href=''+baseurl+'admin/video';					   
																																																							
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
	
	$("#btn_update1").click(function()
	{
		          $.ajax
						  ({
							url:''+baseurl+'videoupdate1',
							type: "POST", 
							data:{id:localStorage.getItem("video_id"),video_title:$("#txt_title").val(),description:$("#txtEditor").Editor("getText"),video_category_id:$("#slct_cat").val(),tag:'update'},
							cache: false,	
 							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("postmsg",v); 									   
                                         window.location.href=''+baseurl+'admin/video';					   
																																																							
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

