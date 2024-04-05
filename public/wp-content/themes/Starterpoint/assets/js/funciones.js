

(function($){
	$('a[href="#"]').click(function(ev){ev.preventDefault();});


	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			$('#scroll-top').fadeIn();
		} else {
		$('#scroll-top').fadeOut();
		}
	});

	$('#scroll-top').click(function () {
		$('body,html').animate({
		scrollTop: 0
		}, 800);
		return false;
	});

	if($.fn.sidr){
		$('#sidr-button').sidr({
			timing: 'ease-in-out',
			speed: 500,
			displace: false,
		});
		$("#sidr-close").on("click", function (ev) {
			$.sidr('close');
		});
		$(window).resize(function () {
			$.sidr('close', 'sidr');
		});
	}
})(jQuery);


