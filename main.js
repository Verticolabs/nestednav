$(document).ready(function(){
	$('#nestify23').click(function(){
		$('#main-nav').nestednav();
		setTimeout(function(){
			$('.btn.btn-navbar').click();
		}, 550);
	});
});