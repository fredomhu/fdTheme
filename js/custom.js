$(document).ready(function() {

	$(window).resize(function() {
		if($(this).width() > 768 ){
			$('.toggle-menu').removeAttr('style');
			$('#toggle-nav').removeClass('toggle-on');
		}
	});

	$('#toggle-nav').on('click', function() {
		$(this).toggleClass('toggle-on');
		$('.toggle-menu').slideToggle();
	});
});