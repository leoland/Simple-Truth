$('.show-content').addClass('show-content--hide');
$('.button-show').addClass('button-show--hide');

$('.button-show').click (function() {
	$(this).toggleClass('button-show--hide');
	$(this).parent().prev('.show-content').toggleClass('show-content--hide');
});