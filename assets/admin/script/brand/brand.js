$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#brand").css('background','#1e282c');
	$("#brand").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("brandmsg")!=null)
	 {
		 var x=localStorage.getItem("brandmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("brandmsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addbrand';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchbrand?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   
	   $.ajax
		  ({
			url:''+baseurl+'getbranddetails',
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
						
						 localStorage.setItem("event_id",v['event_id']);  
						 localStorage.setItem("event_name",v['event_name']); 
						 localStorage.setItem("event_date",v['event_date']); 
						 localStorage.setItem("event_time",v['event_time']); 
						 localStorage.setItem("event_venue",v['event_venue']);
						 localStorage.setItem("event_venue1",v['event_venue1']);
						 localStorage.setItem("event_venue2",v['event_venue2']);
                         localStorage.setItem("event_image_name",v['event_image_name']);						 
						 localStorage.setItem("event_description",v['event_description']);												
						 window.location.href=""+baseurl+"admin/editbrand";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("event_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this product???',
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
			url:''+baseurl+'deletebrand',
			type: "POST", 
			data:{id:localStorage.getItem("event_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("brandmsg",v);
						 window.location.href=""+baseurl+"admin/brand";
					 }
				   
				});
			}
			
		 });		
}