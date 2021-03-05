
$(document).ready(function()
{  
    
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	var phone_regex=/^[0-9-+]+$/;
	$("#btn_send_appointment").click(function()
	{
		 
		/*if($("#txt_depart").val()=='')
		{
			//alert("enter name");
			
			$("#div_err").remove();
			$("#txt_depart").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Enter Department Name</div>');
			$("#txt_depart").focus();
			return false;
		}	         
		else*/ if($("#txt_name").val()=='')
		{
			//alert("enter name");
			
			$("#div_err").remove();
			$("#txt_name").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Enter Name</div>');
			$("#txt_name").focus();
			return false;
		}	
	   
				
		else  if(!email_regex.test($("#txt_email").val()))
		{
			//alert("enter valid email");
			
			$("#div_err").remove();
			$("#txt_email").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Enter valid email</div>');
			$("#txt_email").focus();
			return false;
		}
		/*else  if($("#slct_time").val()=='')		
		{			
	     $("#div_err").remove();			
		 $("#slct_time").parent().append('<div id="div_err" class="col-md-4" >Select Time</div>');			
		 $("#slct_time").focus();			
		 return false;						
		 }	
		  else  if($("#txt_location").val()=='')		
		 {			
			 $("#div_err").remove();			
			 $("#txt_location").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Enter Location</div>');			
			 $("#txt_location").focus();			
			 return false;						
		 }*/	
         else  if(!phone_regex.test($("#txt_phone").val()))		
		{			
	      $("#div_err").remove();			
		  $("#txt_phone").parent().append('<div id="div_err" class="col-md-10" style="color:red" >Please Enter valid phone no</div>');			
		  $("#txt_phone").focus();			
		  return false;						
		}  
        else  if(!phone_regex.test($("#txt_phone").val()))		
		{			
			 $("#div_err").remove();			
			 $("#txt_phone").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Enter valid phone no</div>');			
			 $("#txt_phone").focus();			
			 return false;			
		 }				
		 else  if($("#txt_date").val()=='')		
		 {			
			 $("#div_err").remove();			
			 $("#txt_date").parent().append('<div id="div_err" class="col-md-10" style="color:red">Please Select Appointment Date</div>');			
			 $("#txt_date").focus();			
			 return false;						
		 }		  		   		
		else
		{			
			$("#div_err").remove();
			$("#mail-msg-box").html("<img style='border:none;width:auto' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'sendmail1',
							type: "POST", 
							data:$("#frm_appointment").serailize(),
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#mail-msg-box").html('');    
                                     $("#mail-msg-box").append('<span id="div_success" style="color:green">'+v+'</span>');									   
                                     $("#txt_name").val('');
									 $("#txt_email").val('');
									 
									 $("#txt_phone").val('');
									 $("#txt_date").val('');
									 
								   }
								    if(k=='error')
								   {
									 $("#mail-msg-box").html('');       
                                     $("#mail-msg-box").append('<span style="color:red">'+v+'</span>');	
									 $("#txt_name").val('');
									 $("#txt_email").val('');
									
									 $("#txt_phone").val('');
									 $("#txt_date").val('');
									 
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 
		}
			
	});
});

