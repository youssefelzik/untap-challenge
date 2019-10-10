$(document).ready(function() {
	/*================counter====================*/
	$(window).scroll(function() {
		var sectionTop = $('.countup').offset().top,
			sectionHeight = $('.countup').outerHeight(),
			windowHeight = $(window).height(),
			windowScroll = $(this).scrollTop();

		if ( (windowScroll > (sectionTop + sectionHeight - windowHeight)) || ( $(this).width() <= 768 ) && ( windowScroll > (sectionTop + (.25*sectionHeight) - windowHeight) ) ) {
			$('.counter').each(function() {
				var $this = $(this),
					countTo = $this.attr('data-count');
				$({
					countNum: $this.text()
				}).animate({
					countNum: countTo
				}, {
					duration: 2000,
					easing: 'linear',
					step: function() {
						$this.text(Math.floor(this.countNum));
					},
					complete: function() {
						$this.text(this.countNum);
						//alert('finished');
					}
				});
			});
		}
	});
});
