$(document).ready(function ()
{   

    $("#video").css('background','#1e282c');
	$("#video").css('border-left','3px solid #3c8dbc');
	
	$("#post").css('background','#222d32');
	$("#post").css('border-left','none');
	
	$("#slider").css('background','#222d32');
	$("#slider").css('border-left','none');
	
	$("#index").css('background','#222d32');
	$("#index").css('border-left','none');
	
	$("#page").css('background','#222d32');
	$("#page").css('border-left','none');
	
	$("#setting").css('background','#222d32');
	$("#setting").css('border-left','none'); 
	
	$("#user").css('background','#222d32');
	$("#user").css('border-left','none'); 
    
	 if(localStorage.getItem("categorymsg")!=null)
	 {
		 var x=localStorage.getItem("categorymsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("categorymsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addvideocategory';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getvideocatdetails',
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
						 window.location.href=""+baseurl+"admin/editvideocategory";
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
			message:'Do you Want to delete this category ???',
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
			url:''+baseurl+'deltevideocategory',
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
						 localStorage.setItem("categorymsg",v);
						 window.location.href=""+baseurl+"admin/video-category";
					 }
				   
				});
			}
			
		 });		
}