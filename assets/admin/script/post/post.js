$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#post").css('background','#1e282c');
	$("#post").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("postmsg")!=null)
	 {
		 var x=localStorage.getItem("postmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("postmsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addpost';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchpost?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getpostdetails',
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
						 
						 localStorage.setItem("post_id",v['post_id']);  
						 localStorage.setItem("post_title",v['post_title']); 
						 localStorage.setItem("post_sub_title",v['post_sub_title']); 
						 localStorage.setItem("post_image_name",v['post_image_name']); 
						 localStorage.setItem("post_description",v['post_description']);
						 localStorage.setItem("category_id",v['category_id']);
						 localStorage.setItem("title",v['title']);
						 window.location.href=""+baseurl+"admin/editpost";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("post_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Post ???',
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
			url:''+baseurl+'deletepost',
			type: "POST", 
			data:{id:localStorage.getItem("post_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("postmsg",v);
						 window.location.href=""+baseurl+"admin/post";
					 }
				   
				});
			}
			
		 });		
}