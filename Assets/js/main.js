$(document).on('click', '#open-menu', function(event) {
	event.preventDefault();
	if ($('#menu').hasClass('hide')) {
		$('#menu').removeClass('hide')
		
	}
	else{
		$('#menu').addClass('hide')
		
	}
});