$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#test-application").css('background','#1e282c');
	$("#test-application").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("testapplicationmsg")!=null)
	 {
		 var x=localStorage.getItem("testapplicationmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("testapplicationmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchtestapplication?s='+$("#txt_search").val()+'';
		
	});
	
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addtest';
		
	});
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'gettestapplicationdetails',
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
						
						 localStorage.setItem("application_id",v['id']);  
						 localStorage.setItem("name",v['name']); 
						 localStorage.setItem("email",v['email']); 
						 localStorage.setItem("test",v['test']); 
						 localStorage.setItem("file",v['file']);
						 localStorage.setItem("phone",v['phone']);
                         localStorage.setItem("status",v['status']);
						  localStorage.setItem("presciption",v['presciption']);
						 window.location.href=""+baseurl+"admin/edittestapplication";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("application_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Application ???',
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
			url:''+baseurl+'deletetestapplication',
			type: "POST", 
			data:{id:localStorage.getItem("application_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("testapplicationmsg",v);
						 window.location.href=""+baseurl+"admin/testapplication";
					 }
				   
				});
			}
			
		 });		
}