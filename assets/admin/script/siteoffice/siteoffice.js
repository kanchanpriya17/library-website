$(document).ready(function ()
{
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#siteoffice").css('background','#1e282c');
	$("#siteoffice").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("siteofficemsg")!=null)
	 {
		 var x=localStorage.getItem("siteofficemsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("siteofficemsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addsiteoffice';
		
	});
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchsiteoffice?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getsiteofficedetails',
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
						
						 localStorage.setItem("siteoffice_id",v['siteoffice_id']);  
						 localStorage.setItem("siteoffice_title",v['siteoffice_title']); 
						 localStorage.setItem("siteoffice_sub_title",v['siteoffice_sub_title']); 
						 localStorage.setItem("siteoffice_image_name",v['siteoffice_image_name']); 
						 localStorage.setItem("siteoffice_description",v['siteoffice_description']);                    												 
						 window.location.href=""+baseurl+"admin/editsiteoffice";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("siteoffice_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Our Siteoffice Detail ???',
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
			url:''+baseurl+'deletesiteoffice',
			type: "POST", 
			data:{id:localStorage.getItem("siteoffice_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("siteofficemsg",v);
						 window.location.href=""+baseurl+"admin/siteoffice";
					 }
				   
				});
			}
			
		 });		
}