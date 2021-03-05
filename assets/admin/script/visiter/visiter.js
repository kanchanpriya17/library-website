$(document).ready(function ()
{   
	
	
	$(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#doctors").css('background','#1e282c');
	$("#doctors").css('border-left','3px solid #3c8dbc');
    
	if(localStorage.getItem("postmsg")!=null)
	 {
		 var x=localStorage.getItem("postmsg");
		 $("#header").append('<div id="div_err" class="alert alert-success" role="alert">'+x+'</div>');
		 localStorage.removeItem("postmsg");
	 }
	 else
		 $("#header").html('');  
});  


function del_record()	
{
   $.ajax
		  ({
			url:''+baseurl+'deletedoctor',
			type: "POST", 
			data:{id:localStorage.getItem("doctor_id")},
			cache: false,							
			success: function(data)  		
			{
				var data	=	$.parseJSON(data);	
				$.each(data, function(k,v) 
				{
					 if(k=='success')
					 {
						 localStorage.setItem("postmsg",v);
						 window.location.href=""+baseurl+"admin/doctor";
					 }
				   
				});
			}
			
		 });		
}