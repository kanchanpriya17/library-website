$(document).ready(function ()
{   
	
	$("#slider").css('background','#1e282c');
	$("#slider").css('border-left','3px solid #3c8dbc');
	
	$("#index").css('background','#222d32');
	$("#index").css('border-left','none');
	
	$("#post").css('background','#222d32');
	$("#post").css('border-left','none');
	
	$("#page").css('background','#222d32');
	$("#page").css('border-left','none');
	
	$("#setting").css('background','#222d32');
	$("#setting").css('border-left','none'); 
	
	$("#user").css('background','#222d32');
	$("#user").css('border-left','none'); 
    
	 if(localStorage.getItem("slidermsg")!=null)
	 {
		 var x=localStorage.getItem("slidermsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("slidermsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addslider';
		
	});
	
	$("#btn_search").click(function()
	{
		if($("#txt_search").val())
         window.location.href=''+baseurl+'admin/slider/?search_text='+$("#txt_search").val()+'';		 
		
	});
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getsliderdetails',
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
						 localStorage.setItem("sub_title",v['sub_title']); 
						 localStorage.setItem("image_name",v['image_name']); 
						 localStorage.setItem("description",v['description']);
						 localStorage.setItem("virtual_image_name",v['virtual_image_name']); 
						 window.location.href=""+baseurl+"admin/editslider";
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
			message:'Do you Want to delete this Image ???',
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
			url:''+baseurl+'delteslider',
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
						 localStorage.setItem("slidermsg",v);
						 window.location.href=""+baseurl+"admin/slider";
					 }
				   
				});
			}
			
		 });		
}