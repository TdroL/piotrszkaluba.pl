
window.GLOBALS = window.GLOBALS || {
	lastCall: null,
	lastId: 0
};

window.jQuery && jQuery(function($, undefined) {

	var $nav = $('header').find('nav'),
		$a = $nav.find('a').not(':has(+ div)'),
		$main = $('#main'),
		duration = 100;

	$a.bind('click.ajax', function(event) {
			var self = this;
			event.preventDefault(); event.stopPropagation();

			var id = ++GLOBALS.lastId;

			GLOBALS.lastCall && GLOBALS.lastCall.abort();

			$main.addClass('loading');

			GLOBALS.lastCall = $.getJSON(self.href, function(data) {

				$main.removeClass('loading').stop().animate({
					'opacity': 0
				}, duration, function() {
					if (id == GLOBALS.lastId)
					{
						$main.html(data.content)
							.animate({
								'opacity': 1
							}, duration);

						document.title = data.title;
						window.history.pushState({
							active: {
								main: $nav.find('> ul > li.active:first > a').attr('href'),
								sub: $nav.find('li li.active:first > a').attr('href')
							},
							title: data.title,
							content: $main.html()
						}, data.title, self.href);
					}
				});
			});
		});
});
