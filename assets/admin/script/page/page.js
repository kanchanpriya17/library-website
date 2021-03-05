$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#page").css('background','#1e282c');
	$("#page").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("pagemsg")!=null)
	 {
		 var x=localStorage.getItem("pagemsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("pagemsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addpage';
		
	});
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchpage?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getpagedetails',
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
						 
						 localStorage.setItem("page_id",v['id']);  
						 localStorage.setItem("page_title",v['title']); 
						 localStorage.setItem("page_sub_title",v['sub_title']); 
						 localStorage.setItem("page_image_name",v['image_name']); 
						 localStorage.setItem("page_header_image",v['header_image']);
						 localStorage.setItem("page_description",v['description']);
                         localStorage.setItem("parent_page_id",v['parent_page_id']);
						 localStorage.setItem("parent_page_name",v['parent_page_name']);
						 
						 window.location.href=""+baseurl+"admin/editpage";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("page_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this page ???',
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
			url:''+baseurl+'deletepage',
			type: "POST", 
			data:{id:localStorage.getItem("page_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("pagemsg",v);
						 window.location.href=""+baseurl+"admin/page";
					 }
				   
				});
			}
			
		 });		
}