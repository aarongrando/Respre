$(document).ready(function() {
	$('#nav-handle').click(function() {
		$(this).addClass('open')
		$('#nav').addClass('open')
	});	

	$('.close').click(function() {
		$('#nav-handle').removeClass('open')
		$('#nav').removeClass('open')
	})
})