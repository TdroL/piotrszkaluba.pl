
window.jQuery && jQuery(function($, undefined) {

	var $nav = $('header').find('nav'),
		$main = $('#main'),
		duration = 100;

	window.onpopstate = function(event) {

		if ( ! event.state) return;

		$main.removeClass('loading')
			.stop().animate({
					'opacity': 0
				}, duration, function() {
					$main.html(event.state.content)
						.animate({
							'opacity': 1
						}, duration);

					document.title = event.state.title;
				});

		if (event.state.active.main)
		{
			$nav.find('> ul > li.active:first > a').filter('[href='+event.state.active.main+']').trigger('click.effect');
		}

		if (event.state.active.sub)
		{
			$nav.find('li li.active:first > a').filter('[href='+event.state.active.sub+']').trigger('click.effect');
		}

		if (event.state.active.side)
		{
			$main.find('#side-nav li.active > a').filter('[href='+event.state.active.side+']').trigger('click.effect');
		}
	};

	window.history.pushState({
		active: {
			main: $nav.find('> ul > li.active:first > a').attr('href'),
			sub: $nav.find('li li.active:first > a').attr('href'),
			side: $main.find('#side-nav li.active > a').attr('href')
		},
		title: document.title,
		content: $main.html()
	}, document.title, window.location.href);

});
