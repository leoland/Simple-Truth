// Trigger main navigation
function mainNavigation() {
	$('.menu-link').click(function(event) {
		$('body').toggleClass('menu-open');
		$('#main-navigation').toggleClass('open');
		$('#contact-menu').toggleClass('menu-open');
		$('#wrapper').toggleClass('menu-open');
		$('#site-header').toggleClass('menu-open');
		$('#site-footer').toggleClass('menu-open');
		event.preventDefault(); //prevents hashtag in url
	});
}

// Load functions all at once
$(function() {
   	mainNavigation();
});
