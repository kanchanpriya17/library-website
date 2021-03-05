$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#priya").css('background','#1e282c');
	$("#priya").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("priyamsg")!=null)
	 {
		 var x=localStorage.getItem("priyamsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("priyamsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addpriya';
		
	});
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchpriya?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getpriyadetails',
			type: "POST", 
			data:{priya_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						
						 localStorage.setItem("priya_id",v['priya_id']);  
						 localStorage.setItem("priya_title",v['priya_title']); 
						 localStorage.setItem("priya_sub_title",v['priya_sub_title']); 
						 localStorage.setItem("priya_image_name",v['priya_image_name']); 
						 localStorage.setItem("priya_description",v['priya_description']);                    												 
						 window.location.href=""+baseurl+"admin/editpriya";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("priya_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Our Priya Detail ???',
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
			url:''+baseurl+'deletepriya',
			type: "POST", 
			data:{id:localStorage.getItem("priya_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("priyamsg",v);
						 window.location.href=""+baseurl+"admin/priya";
					 }
				   
				});
			}
			
		 });		
}