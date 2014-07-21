(function($){
	
	$('.menu-clientes').on('click', function () {
		$('span').removeClass('active');
		$('html, body').animate({
		    scrollTop: $("section.clientes").offset().top-40
		}, 2000);
		$('.menu-clientes').removeClass('active');
		$(this).addClass('active');
	});

	$('.menu-cases').on('click', function () {
		$('span').removeClass('active');
		$('html, body').animate({
		    scrollTop: $("section.cases").offset().top-40
		}, 2000);
		$('.menu-cases').removeClass('active');
		$(this).addClass('active');
	});
	 
	$('.top').on('click', function () {
		$('span').removeClass('active');
		$('html, body').animate({
		    scrollTop: $("#top").offset().top-40
		}, 2000);
		$('.top').removeClass('active');
		$(this).addClass('active');
	});

	var $ = jQuery.noConflict();
    $('.slider_cases').carouFredSel({
        prev: '#prev-case',
        next: '#next-case',
        responsive: true,
        width: '100%',
        height: 300,
        scroll: {
            items: 1,
            pauseOnHover: true
        },
        items: {
            width: 250,
            visible: {
                min: 1,
                max: 4
            }
        }
    });

})(jQuery);