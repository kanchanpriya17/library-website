$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#members").css('background','#1e282c');
	$("#members").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("membermsg")!=null)
	 {
		 var x=localStorage.getItem("membermsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("membermsg");
	 }
	 else
		 $("#header").html('');  
	 
	$("#btn_add").click(function()
	{
		window.location.href=''+baseurl+'admin/addmember';
		
	});
	
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchmember?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

function edit(x)
{
	
	   $.ajax
		  ({
			url:''+baseurl+'getmemberdetails',
			type: "POST", 
			data:{member_id:x},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						
						 localStorage.setItem("member_id",v['member_id']);  
						 localStorage.setItem("name",v['name']); 
						 localStorage.setItem("designation",v['designation']); 
						/* localStorage.setItem("address",v['address']); 
						 localStorage.setItem("phone",v['phone']); 
						 localStorage.setItem("email",v['email']);*/
						
						 window.location.href=""+baseurl+"admin/editmember";
					 }
				   
				});
			}
			
		 });	
		 
}

function del(x)
{
	localStorage.setItem("member_id",x); 
	var box=bootbox.dialog(
		{
			message:'Do you Want to delete this Video ???',
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
			url:''+baseurl+'deletemember',
			type: "POST", 
			data:{member_id:localStorage.getItem("member_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("membermsg",v);
						 window.location.href=""+baseurl+"admin/member";
					 }
				   
				});
			}
			
		 });		
}