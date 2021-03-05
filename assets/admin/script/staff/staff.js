$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#staff").css('background','#1e282c');
	$("#staff").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("staffmsg")!=null)
	 {
		 var x=localStorage.getItem("staffmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("staffmsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addstaff';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchstaff?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getstaffdetails',
			type: "POST", 
			data:{staff_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 
						 localStorage.setItem("staff_id",v['staff_id']);  
						 localStorage.setItem("name",v['name']); 
						 localStorage.setItem("designation",v['designation']); 
						 
						
						 window.location.href=""+baseurl+"admin/editstaff";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("staff_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Visiter Information ???',
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
			url:''+baseurl+'deletestaff',
			type: "POST", 
			data:{staff_id:localStorage.getItem("staff_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("staffmsg",v);
						 window.location.href=""+baseurl+"admin/staff";
					 }
				   
				});
			}
			
		 });		
}