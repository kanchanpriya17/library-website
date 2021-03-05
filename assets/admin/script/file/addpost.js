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
   	
	load_category();
	
		
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
					    var files = !!this.files ? this.files : [];
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
						$("#file_image").parent().find("#div_err").remove();
						$.ajax
						({
							url:''+baseurl+'postupload',  	
							type: "POST", 
							data: new FormData(),	
							data:  new FormData(document.getElementById("frm_post")),
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
			
					
			      $.ajax
						  ({
							url:''+baseurl+'postsave',
							type: "POST", 
							data:{title:$("#txt_title").val(),sub_title:$("#txt_sub_title").val(),description:$("#txtEditor").Editor("getText"),image_name:$("#hid_upload").val(),category_id:$("#slct_cat").val(),tag:'save'},
							cache: false,							
							success: function(data)  		
							{
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								   if(k=='success')
								   {
                                         localStorage.setItem("postmsg",v); 									   
                                         window.location.href=''+baseurl+'admin/post';					   
																																																							
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
		
		$("#btn_cancel").click(function()
		{
			 window.location.href=''+baseurl+'admin/post';	
		});
		
		
	
});	

function load_category()
{
	
	
	 $.ajax
	  ({
		url:''+baseurl+'loadcat1',
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
							  $("#slct_cat").append('<option value='+v[i]['id']+'>'+v[i]['title']+'</option>');
						 }	 
					 }
				});
		}
	  });	
}