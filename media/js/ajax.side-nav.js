
window.GLOBALS = window.GLOBALS || {
	lastCall: null,
	lastId: 0
};

window.jQuery && jQuery(function($, undefined) {

	var $nav = $('header').find('nav'),
		$main = $('#main'),
		duration = 100;

	$main.delegate('aside a', 'click.ajax', function(event) {
			var self = this;

			event.preventDefault(); event.stopPropagation();

			var id = ++GLOBALS.lastId,
				$article = $main.find('article');

			GLOBALS.lastCall && GLOBALS.lastCall.abort();

			$main.addClass('loading');

			GLOBALS.lastCall = $.getJSON(self.href, function(data) {

				$main.removeClass('loading');

				$article.stop().animate({
					'opacity': 0
				}, duration, function() {

					if (id == GLOBALS.lastId)
					{
						$article.html($('<q>'+data.content+'</q>').find('article:first'))
							.animate({
								'opacity': 1
							}, duration);

						document.title = data.title;
						window.history.pushState({
							active: {
								main: $nav.find('> ul > li.active:first > a').attr('href'),
								sub: $nav.find('li li.active:first > a').attr('href'),
								side: $main.find('#side-nav li.active > a').attr('href')
							},
							title: data.title,
							content: $main.html()
						}, data.title, self.href);
					}
				});
			});
		});
});
