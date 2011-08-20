window.jQuery && jQuery(function($, undefined) {
	var $main = $('#main'),
		fn_html = $.fn.html;

	$main.bind('attach.effect', function() {

		var $side_nav = $main.find('#side-nav'),
			$ol = $side_nav.find('ol'),
			$li = $ol.find('li'),
			d_height = $ol.outerHeight(true) - $side_nav.innerHeight();

		if (d_height > 0)
		{
			var sum = 0;
			$ol.find('li').each(function() {
				var $this = $(this);

				$this.attr('data-top-pos', sum);
				sum += $this.outerHeight(true);
			});

			$ol.delegate('li', 'effect.scroll-to', function() {
				var $this = $(this),
					top = $this.attr('data-top-pos') - (($side_nav.innerHeight() - $this.outerHeight(true)) * 0.5);

				top = Math.min(top, d_height);
				top = Math.max(top, 0);

				$ol.stop(true).animate({
					'margin-top': -top
				}, 300, function() {
					$nav.trigger('checkState.effect');
				});

			}).find('li.active').trigger('effect.scroll-to');

			var $nav = $('#main > aside').find('.nav-up, .nav-down');

			$nav.removeClass('inactive')
			.bind('mouseenter.effect', function() {
				var $this = $(this),
					target_top = $this.hasClass('nav-up') ? 0 : -d_height,
					current_top = parseInt($ol.css('margin-top'), 10),
					speed = 10/3; // 100 ms / 30 px

				if ($this.hasClass('inactive'))
				{
					return;
				}

				$nav.removeClass('inactive');

				$ol.stop(true).animate({
					'margin-top': target_top
				}, speed * Math.abs(current_top - target_top), 'linear', function() {
					$nav.trigger('checkState.effect');
				});
			})
			.bind('mouseleave.effect', function() {
				$ol.stop(true);
			})
			.bind('checkState.effect', function() {
				var top = parseInt($ol.css('margin-top'));

				$nav.removeClass('inactive');

				if (top === 0)
				{
					$nav.filter('.nav-up').addClass('inactive');
				}
				else if (top === -d_height)
				{
					$nav.filter('.nav-down').addClass('inactive');
				}
			}).trigger('checkState.effect');


		}

		$side_nav.find('a')
		.bind('click.effect', function() {
			$(this).trigger('focusin.effect')
				.closest('li').addClass('active')
				.siblings().removeClass('active');
		})
		.bind('focusin.effect', function() {
			$(this).closest('li').trigger('effect.scroll-to');
		});

	}).trigger('attach.effect');

	$.fn.html = function(html) {

		result = fn_html.call(this, html);

		if (arguments.length > 0 && this.is('#main'))
		{
			this.trigger('attach.effect');
		}

		return result;
	};
});
