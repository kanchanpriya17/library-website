$(document).ready(function ()
{   
   
   $(".sidebar-menu li").each(function () 
	{
                $(this).css('background','#222d32');
				$(this).css('border-left','none'); 
    });
	
	$("#file").css('background','#1e282c');
	$("#file").css('border-left','3px solid #3c8dbc');
	
	/*$("#txtEditor").Editor();*/
	$("#txt_title").focus();
    
	
	
	 
	
	if(localStorage.getItem("file_id")!=null && localStorage.getItem("file_title")!=null && localStorage.getItem("file_name")!=null && localStorage.getItem("description")!=null && localStorage.getItem("approved")!=null)
	 {
		
		$("#txt_title").val(localStorage.getItem("file_title"));
		
		/*$("#txtEditor").Editor("setText",localStorage.getItem("description")); */
		if(localStorage.getItem('file_name')!='')
		{
		 $("#img_preview").html('<img  style="width:100%" src="'+baseurl+'upload/'+localStorage.getItem('post_image_name')+'" alt="Uploading...."/>');
		 $("#img_preview").html(''+
		'<audio width="100%" height="100%" controls>'+ 											
		'<source src="'+baseurl+'upload_file/'+localStorage.getItem('file_name')+'" type="audio/mpeg">'+
		'<source src="'+baseurl+'upload_file/'+localStorage.getItem('file_name')+'" type="audio/ogg">'+				
	   '</audio>'+''
		 );
		}
		
	 }	
		
		
	$("#btn_cancel").click(function()
	{
		 window.location.href=''+baseurl+'admin/file';	
	});
		
		
	
		
	
});	

