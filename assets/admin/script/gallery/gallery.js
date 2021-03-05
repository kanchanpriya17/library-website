$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#gallery").css('background','#1e282c');
	$("#gallery").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("gallerymsg")!=null)
	 {
		 var x=localStorage.getItem("gallerymsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("gallerymsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addgallery';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchgallery?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	  
	   $.ajax
		  ({
			url:''+baseurl+'getgallerydetails',
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
						
						 localStorage.setItem("gallery_id",v['gallery_id']);  
						 localStorage.setItem("gallery_title",v['gallery_title']); 
						 localStorage.setItem("gallery_sub_title",v['gallery_sub_title']); 
						 localStorage.setItem("gallery_image_name",v['gallery_image_name']); 
						 localStorage.setItem("gallery_description",v['gallery_description']);
						 localStorage.setItem("album_id",v['album_id']);
						 localStorage.setItem("title",v['title']);
						 window.location.href=""+baseurl+"admin/editgallery";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("gallery_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Image ???',
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
			url:''+baseurl+'deletegallery',
			type: "POST", 
			data:{id:localStorage.getItem("gallery_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("gallerymsg",v);
						 window.location.href=""+baseurl+"admin/gallery";
					 }
				   
				});
			}
			
		 });		
}