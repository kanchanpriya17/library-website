$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#test").css('background','#1e282c');
	$("#test").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("testmsg")!=null)
	 {
		 var x=localStorage.getItem("testmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("testmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addtest';
		
	});
	
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'gettestdetails',
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
					
						 localStorage.setItem("test_id",v['id']);  
						 localStorage.setItem("test_title",v['title']); 
						 localStorage.setItem("test_rate",v['rate']); 
						 localStorage.setItem("test_desc",v['desc']); 
						 localStorage.setItem("test_image",v['image']);
						
						 window.location.href=""+baseurl+"admin/edittest";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("test_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Achiever ???',
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
			url:''+baseurl+'deletetest',
			type: "POST", 
			data:{id:localStorage.getItem("test_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("testmsg",v);
						 window.location.href=""+baseurl+"admin/test";
					 }
				   
				});
			}
			
		 });		
}