$(document).ready(function ()
{   
			    
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#subscriber").css('background','#1e282c');
	$("#subscriber").css('border-left','3px solid #3c8dbc');
	
	
	if(localStorage.getItem("awardmsg")!=null)
	 {
		 var x=localStorage.getItem("awardmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("awardmsg");
	 }
	
	else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addaward';
		
	});
	
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchexpression?s='+$("#txt_search").val()+'';
		
	});
	
	
	
	
	
	
}); 




function del(x)
{
	localStorage.setItem("interest_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Record Detail ???',
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
			url:''+baseurl+'deleteexpression',
			type: "POST", 
			data:{id:localStorage.getItem("interest_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("awardmsg",v);
						 window.location.href=""+baseurl+"admin/expression";
					 }
				   
				});
			}
			
		 });		
}