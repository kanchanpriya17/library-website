$(document).ready(function ()
{   
	
	$("#index").css('background','#1e282c');
	$("#index").css('border-left','3px solid #3c8dbc');
	
	$("#slider").css('background','#222d32');
	$("#slider").css('border-left','none');
    $("#btn_logout").click(function()
	{
		$.ajax({
				    url:''+baseurl+'logout',  	
					type: "POST", 
					data:{tag:'logout'},
					cache: false,							
					success: function(data)  		
					{
						var data	=	$.parseJSON(data);	
						$.each(data, function(k,v) 
						{
							  if(k=='logout')
							  {
								
								localStorage.setItem("msg",v);   
								window.location.href=''+baseurl+'admin';
								
								
							  }
							  
						});
					}
			});		
	});
});     