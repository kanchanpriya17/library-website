
$(document).ready(function()
{
	$("#btn_teaching").css('background','#71c788');
	$("#btn_teaching").css('color','#ffffff');
	
	$("#btn_non_teaching").css('background','#ccc');
	$("#btn_non_teaching").css('color','#000');
		
    $("#btn_non_teaching").click(function()
	{
		var ctr=1;
		$("#tbl").html('');
		$("#tbl").append('<tr><th>SI.</th><th>Name</th><th>Designation</th></tr>');
		$("#btn_non_teaching").css('background','#71c788');
	    $("#btn_non_teaching").css('color','#ffffff');
		$("#btn_teaching").css('background','#ccc');
	    $("#btn_teaching").css('color','#000');
	    $.ajax
		  ({
			url:''+baseurl+'nonteaching',
			type: "POST", 
			data:{type:2},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					
						 
						
						
							 $("#tbl").append('<tr><td>'+ctr+'</td><td>'+v["name"]+'</td><td>'+v["designation"]+'</td></tr>');
							 ctr++;
						
				   
				});
			}
			
		 });	
	});
	
	$("#btn_teaching").click(function()
	{
	   var ctr=1;
	   $("#btn_teaching").css('background','#71c788');
	   $("#btn_teaching").css('color','#ffffff');
	   
	   $("#btn_non_teaching").css('background','#ccc');
	   $("#btn_non_teaching").css('color','#000');
	   $("#tbl").html('');
	   $("#tbl").append('<tr><th>SI.</th><th>Name</th><th>Designation</th></tr>');
	    $.ajax
		  ({
			url:''+baseurl+'nonteaching',
			type: "POST", 
			data:{type:1},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					
						
						
						
							 $("#tbl").append('<tr><td>'+ctr+'</td><td>'+v["name"]+'</td><td>'+v["designation"]+'</td></tr>');
							 ctr++;
						
				   
				});
			}
			
		 });	
	});
});

