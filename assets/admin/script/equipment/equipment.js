$(document).ready(function ()
{   
    $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#equipment").css('background','#1e282c');
	$("#equipment").css('border-left','3px solid #3c8dbc');
    
	 if(localStorage.getItem("equipmentmsg")!=null)
	 {
		 var x=localStorage.getItem("equipmentmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("equipmentmsg");
	 }
	 else
		 $("#header").html(''); 
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addequipment';
		
	});
	
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchequipment?s='+$("#txt_search").val()+'';
		
	});
	
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getequipmentdetails',
			type: "POST", 
			data:{equipment_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						
						 localStorage.setItem("equipment_id",v['equipment_id']);  
						 localStorage.setItem("equipment_title",v['equipment_title']); 
						 localStorage.setItem("equipment_sub_title",v['equipment_sub_title']); 
						 localStorage.setItem("equipment_image_name",v['equipment_image_name']); 
						 localStorage.setItem("equipment_description",v['equipment_description']);                    												 
						 window.location.href=""+baseurl+"admin/editequipment";
						 
					 }
				   
				});
			}
			
		 });		
}

function del(x)
{
	localStorage.setItem("equipment_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Our Equipment Detail ???',
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
			url:''+baseurl+'deleteequipment',
			type: "POST", 
			data:{id:localStorage.getItem("equipment_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("equipmentmsg",v);
						 window.location.href=""+baseurl+"admin/equipment";
					 }
				   
				});
			}
			
		 });		
}