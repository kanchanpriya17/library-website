$(document).ready(function ()
{   
			    
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#subscriber").css('background','#1e282c');
	$("#subscriber").css('border-left','3px solid #3c8dbc');
	 
	$("#btn_search").click(function()
	{
		window.location.href=''+baseurl+'admin/searchsubscriber?s='+$("#txt_search").val()+'';
		
	});
	
	
});  

