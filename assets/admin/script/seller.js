
$(document).ready(function()
{   
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;	
	$("#btn_cell").click(function()
	{
		
		
		
		if($("#car_brand").val()=='')
		{
			$("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Car Brand</span>');						
			$("#car_brand").focus();
			return false;
		}
        else if($("#car_model").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Car Model</span>');					
			$("#car_model").focus();
			return false;
		}
        else if($("#selling_price").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Selling Price</span>');						
			$("#selling_price").focus();
			return false;
		}
         else if($("#running").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Running of Car</span>');						
			$("#running").focus();
			return false;
		}
          else if($("#years").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter car is how many years old</span>');						
			$("#years").focus();
			return false;
		}
          else if($("#condition").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Select Condition of Car</span>');						
			$("#condition").focus();
			return false;
		}
         else if($("#seller_name").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Seller Name</span>');						
			$("#seller_name").focus();
			return false;
		}
          else if($("#seller_phone").val()=='')
		{
			
            $("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter Seller Phone No.</span>');						
			$("#seller_phone").focus();
			return false;
		}
       
	    else if(!email_regex.test($("#seller_email").val()))
		{						
		
			$("#msg-box").html(''); 
            $("#msg-box").append('<span style="color:#fff">Please Enter valid email</span>');						
			$("#seller_email").focus();
			return false;
		}	
			
		
		else
		{
			$("#div_err").remove();
			$("#msg-box").html("<img style='border:none' src="+baseurl+"assets/admin/images/ajax-loader.gif>");
			$.ajax
						  ({
							url:''+baseurl+'addseller',
							type: "POST", 
							data:$( "#frm_sell" ).serialize(),
							/*data:{email:$("#txt_subscriber_email").val()},*/
							cache: false,							
							success: function(data)  		
							{
								
								var data	=	$.parseJSON(data);	
								$.each(data, function(k,v) 
								{
								 
								   if(k=='success')
								   {
									 $("#msg-box").html('');    
                                     $("#msg-box").append('<span style="color:#fff">'+v+'</span>');									   
                                     $("#name").val('');
									 $("#email").val('');
									 
									 
								   }
								    if(k=='error')
								   {
									 $("#msg-box").html('');    
                                     $("#msg-box").append('<span style="color:#fff">'+v+'</span>');	
									 
								   }
                                   									 
									  
									 
								});
							}
							
                             });
							 return false;
		}
			
	});
});

