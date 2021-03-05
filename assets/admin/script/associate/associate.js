$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#associate").css('background','#1e282c');
	$("#associate").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("associatemsg")!=null)
	 {
		 var x=localStorage.getItem("associatemsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("associatemsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addassociate';
		
	});
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchassociate?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getassociatedetails',
			type: "POST", 
			data:{associate_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						
						 localStorage.setItem("associate_id",v['associate_id']);  
						 localStorage.setItem("associate_title",v['associate_title']); 
						 localStorage.setItem("associate_sub_title",v['associate_sub_title']); 
						 localStorage.setItem("associate_image_name",v['associate_image_name']); 
						 localStorage.setItem("associate_description",v['associate_description']);                    												 
						 window.location.href=""+baseurl+"admin/editassociate";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("associate_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Our Associate Detail ???',
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
			url:''+baseurl+'deleteassociate',
			type: "POST", 
			data:{id:localStorage.getItem("associate_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("associatemsg",v);
						 window.location.href=""+baseurl+"admin/associate";
					 }
				   
				});
			}
			
		 });		
}