$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#award").css('background','#1e282c');
	$("#award").css('border-left','3px solid #3c8dbc');
    
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
		window.location.href=''+baseurl+'admin/searchaward?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getawarddetails',
			type: "POST", 
			data:{award_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						
						 localStorage.setItem("award_id",v['award_id']);  
						 localStorage.setItem("award_title",v['award_title']); 
						 localStorage.setItem("award_sub_title",v['award_sub_title']); 
						 localStorage.setItem("award_image_name",v['award_image_name']); 
						 localStorage.setItem("award_description",v['award_description']);                    												 
						 window.location.href=""+baseurl+"admin/editaward";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("award_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Testimonial Detail ???',
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
			url:''+baseurl+'deleteaward',
			type: "POST", 
			data:{id:localStorage.getItem("award_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("awardmsg",v);
						 window.location.href=""+baseurl+"admin/award";
					 }
				   
				});
			}
			
		 });		
}