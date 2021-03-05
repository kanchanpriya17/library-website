$(document).ready(function ()
{   
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#services").css('background','#1e282c');
	$("#services").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("clientmsg")!=null)
	 {
		 var x=localStorage.getItem("clientmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("clientmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addservices';
		
	});
	
	$("#btn_search").click(function()
	{
		if($("#txt_search").val())
         window.location.href=''+baseurl+'admin/searchservices?s='+$("#txt_search").val()+'';	 
		
	});
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getservicesdetails',
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
						 localStorage.setItem("id",v['id']);  
						 localStorage.setItem("title",v['title']); 
						 localStorage.setItem("image_name",v['image_name']); 
						 localStorage.setItem("description",v['description']);
						 localStorage.setItem("virtual_image_name",v['virtual_image_name']); 
						 window.location.href=""+baseurl+"admin/editservices";
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Syllbus ???',
			title: "Confirm",
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
			url:''+baseurl+'delteservices',
			type: "POST", 
			data:{id:localStorage.getItem("id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("clientmsg",v);
						 window.location.href=""+baseurl+"admin/services";
					 }
				   
				});
			}
			
		 });		
}