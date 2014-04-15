
$(window).ready(function(){
	$(".exapmle").on({
		mouseenter	: function(){
			$(this).animate({marginTop:"30px"});
		},
		mouseleave	: function(){
			$(this).animate({marginTop:0});
		}
	});
});