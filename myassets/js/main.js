$(document).ready(function () {
	
	
/*dropdown menu
===================*/	
$("li.dropdown, li.dropdown-submenu").hover(function(){
      $(this).children("ul.dropdown-menu").stop(true, true).slideDown('medium');
   },function() {
      $(this).children("ul.dropdown-menu").stop(true, true).slideUp('medium');
});	

$('#topArrow').click(function(e){
	$('.header-bottom').slideToggle();
});


});


