$(document).ready(function ()
{   
	$(".sidebar-menu li").each(function () 	{                $(this).css('background','#222d32');				$(this).css('border-left','none');     });		$("#gallery").css('background','#1e282c');	$("#gallery").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("albummsg")!=null)
	 {
		 var x=localStorage.getItem("albummsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("albummsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addalbum';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getalbumdetails',
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
						 localStorage.setItem("album_id",v['id']);  
						 localStorage.setItem("album_title",v['title']);						 						 localStorage.setItem("album_image",v['image']); 
						 window.location.href=""+baseurl+"admin/editalbum";
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
			message:'Do you Want to delete this Album ???',
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
			url:''+baseurl+'deltealbum',
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
						 localStorage.setItem("albummsg",v);
						 window.location.href=""+baseurl+"admin/album";
					 }
				   
				});
			}
			
		 });		
}