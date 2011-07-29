window.jQuery && jQuery(function($, undefined) {
	var $main = $('#main'),
		fn_html = $.fn.html;

	$main.bind('attach.effect', function() {
		$main.find('#side-nav a').bind('click.effect', function() {
			$(this).closest('li').addClass('active')
				.siblings().removeClass('active');
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
