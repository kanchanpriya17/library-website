$(document).ready(function ()
{   
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#doctors").css('background','#1e282c');
	$("#doctors").css('border-left','3px solid #3c8dbc');
    
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
		window.location.href=''+baseurl+'admin/adddoctor';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchdoctor?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getdoctordetails',
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
						 
						 localStorage.setItem("doctor_id",v['doctor_id']);  
						 localStorage.setItem("doctor_name",v['doctor_name']); 
						 localStorage.setItem("doctor_designation",v['doctor_designation']); 
						 localStorage.setItem("doctor_image_name",v['doctor_image_name']); 
						 localStorage.setItem("doctor_description",v['doctor_description']);						 
						 window.location.href=""+baseurl+"admin/editdoctor";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("doctor_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Credentials ???',
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
			url:''+baseurl+'deletedoctor',
			type: "POST", 
			data:{id:localStorage.getItem("doctor_id")},
			cache: false,							
			success: function(data)  		
			{
				var data=$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("postmsg",v);
						 window.location.href=""+baseurl+"admin/doctor";
					 }
				   
				});
			}
			
		 });		
}