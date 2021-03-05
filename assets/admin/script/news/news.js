$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#news").css('background','#1e282c');
	$("#news").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("newsmsg")!=null)
	 {
		 var x=localStorage.getItem("newsmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("newsmsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addnews';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchnews?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   
	   $.ajax
		  ({
			url:''+baseurl+'getnewsdetails',
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
						
						 localStorage.setItem("news_id",v['news_id']);  
						 localStorage.setItem("news_title",v['news_title']); 
						 localStorage.setItem("news_sub_title",v['news_sub_title']); 
						 localStorage.setItem("news_image_name",v['news_image_name']); 
						 localStorage.setItem("news_description",v['news_description']);												
						 window.location.href=""+baseurl+"admin/editnews";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("news_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Project ???',
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
			url:''+baseurl+'deletenews',
			type: "POST", 
			data:{id:localStorage.getItem("news_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("newsmsg",v);
						 window.location.href=""+baseurl+"admin/news";
					 }
				   
				});
			}
			
		 });		
}