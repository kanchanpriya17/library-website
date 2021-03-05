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
    
	 if(localStorage.getItem("postmsg")!=null)
	 {
		 var x=localStorage.getItem("postmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("postmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	/*$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addpost';
		
	});*/
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchvideo?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getvideodetails',
			type: "POST", 
			data:{id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 
						 localStorage.setItem("video_id",v['id']);  
						 localStorage.setItem("video_title",v['video_title']); 
                         localStorage.setItem("video_name",v['video_name']); 								 
                         localStorage.setItem("video_category_id",v['video_category_id']);
                         localStorage.setItem("category_title",v['title']); 	 						 
						 localStorage.setItem("description",v['description']);	
                         localStorage.setItem("approved",v['approved']);						 
						  
						window.location.href=""+baseurl+"admin/editvideo";
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("video_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Video ???',
			title: "Confrim",
			buttons:
			{
				
				main: 
				{
					label: "OK",
					className: "btn-primary",
					callback: function() 
					{
					  del_record();
					}
				},
				cancel: 
				{
					label: "Cancel",
					className: "btn-primary",
					callback: function() 
					{
						
					}
				}
			
			}
		});
}

function del_record()	
{
   $.ajax
		  ({
			url:''+baseurl+'deletevideo',
			type: "POST", 
			data:{id:localStorage.getItem("video_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("postmsg",v);
						 window.location.href=""+baseurl+"admin/video";
					 }
				   
				});
			}
			
		 });		
}