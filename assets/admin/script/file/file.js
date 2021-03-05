$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#file").css('background','#1e282c');
	$("#file").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("postmsg")!=null)
	 {
		 var x=localStorage.getItem("postmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("postmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchfile?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	   $.ajax
		  ({
			url:''+baseurl+'getfiledetails',
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
						 
						 localStorage.setItem("file_id",v['id']);  
						 localStorage.setItem("file_title",v['file_title']); 
                         localStorage.setItem("file_name",v['file_name']); 								                         			 
						 localStorage.setItem("description",v['description']);	
                         localStorage.setItem("approved",v['approved']);						 
						  
						window.location.href=""+baseurl+"admin/editfile";
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("file_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this File ???',
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
			url:''+baseurl+'deletefile',
			type: "POST", 
			data:{id:localStorage.getItem("file_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("filemsg",v);
						 window.location.href=""+baseurl+"admin/file";
					 }
				   
				});
			}
			
		 });		
}