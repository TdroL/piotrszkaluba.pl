window.jQuery && jQuery(function($, undefined) {

	// empty jquery object
	var $_ = $();

	/* helper method: removeCss */
	$.fn.extend({
		removeCss: function() {
			var propeties = [].splice.call(arguments, 0),
				regex = new RegExp('^('+propeties.join(')|(')+'):.*$', 'gi');

			if ( ! propeties.length) return this;

			return this.each(function() {
				var $this = $(this),
					style = $this.attr('style').split(';');

				style = $.grep(style, function(value) {
					value = $.trim(value);
					// HUGE WTF -  first "regex.test(value)" returns false,
					// second - true O.o
					return !(regex.test(value) || regex.test(value));
				});

				$this.attr('style', style.join(';'));
			});
		}
	});

	/* effect */
	var $div =$('header').find('nav li > div'),
		$ul = $div.find('ul'),
		$li = $ul.find('li');

	$li.each(function() {
			var $this = $(this);

			// set current positions and indexes
			$this.css('left', $this.position().left)
				.attr('data-index', $this.prevAll('li').length);
		});

		// default duration
	var duration = 0,
		// get css prefix
		prefix = $.browser.webkit ? 'webkit' :
				 $.browser.opera ? 'o' :
				 $.browser.msie ? 'ms' :
				 $.browser.mozilla ? 'moz' : '',
		// get transition duration
		value = $li.css('transition-duration') || $li.css('-'+prefix+'-transition-duration');

	// convert to miliseconds
	if (/^[0-9]+(\.[0-9]+)?s$/.test(value))
	{
		duration = parseFloat(value.substr(0, value.length - 1))*1000;
	}
	else if (/^[0-9]+ms$/.test(value))
	{
		duration = parseInt(value.substr(0, value.length - 2), 10);
	}

	// check for canvas support - sorry ie... no candy for you
	if (Modernizr.canvas)
	{
		$div.delegate('canvas', 'menu.draw', function(event, $li) {
				var $this = $(this), draw, force = false, timer;

					// canvas context
				var c = this.getContext('2d'),
					width = $this.width(), height = $this.height(),
					// timestamps
					startTime = $.now(), lastTime = startTime,
					// position of moving list item
					// decrease by one to hide end of line behind $li background
					position = {
						x: $li.outerWidth() - 1,
						y: $li.position().top + $li.outerHeight() - 1
					};

				// set these to get proper ratio
				$this.attr({
					'width': width,
					'height': height
				});

				// 1.5 looks nicer than 1.0 - better antialiasing
				c.lineWidth = 1.5;

				$this.data('timerInt', timer = window.setInterval(function draw() {
					// clear canvas
					c.clearRect(0, 0, width, height);

						// timestamps
					var time = $.now(),
						dt = time - lastTime,
						pt = time - startTime,
						// percentage of animation duration
						ft = pt/duration;

					if(pt > duration && force == false)
					{
						window.clearInterval(timer);
						$this.data('timerOut', window.setTimeout(draw, 100));
						force = true;
					}

					c.strokeStyle = 'rgba(255,255,255, '+Math.min(0.50 + ft/2, 1)+')';
					c.beginPath();
					c.moveTo(width, height);
					c.lineTo(position.x + Math.round($li.position().left), position.y);
					c.stroke();

					// save current timestamp
					lastTime = time;

				}, $.fx.interval || 13));
			})
			.delegate('canvas', 'menu.erase', function(event) {
				var $this = $(this);

				// if there is an animation, stop it
				window.clearInterval($this.data('timerInt'));
				window.clearTimeout($this.data('timerOut'));

				// make nice fade out and remove canvas
				$this.animate({
					'opacity': 0
				}, duration/5, function() {
					$(this).remove();
				});
			});
	}
	else
	{
		// fallback for old browsers
		$div.delegate('canvas', 'menu.draw', function() {
			$(this).remove();
		});
	}

	$ul.bind('menu.reset', function() {
		var $this = $(this),
			currentLeft = $this.position().left;

		// disable "floating"
		$li.stop()
			.removeClass('active')
			.css('position', 'static') // lock positions
			.removeCss('color', 'background-color');

		// if list is unsorted - do sort (put last list item back into it's place)
		var $last = $ul.find('li').last(),
			index = +$last.attr('data-index') + 1;

		if(index < $li.length)
		{
			$last.detach().insertBefore($li.filter('[data-index='+index+']').first());
		}
	})
	.bind('menu.animate', function(event, $current, currentLeft, targetLeft) {

		$current = $current || null;

		// use css3 transition to animate links
		$li.stop()
			.removeClass('last-but-one')
			.each(function() { // set new positions
				var $this = $(this),
					$canvas = $this.data('canvas') || $();

				$this.css('left', $this.position().left);

				// remove canvas
				$canvas.trigger('menu.erase');
			})
			.css('position', 'absolute');

		if ($current)
		{
			// remove last slash
			var $prev = $current.prev().addClass('last-but-one'),
				targetColor = $current.css('color'),
				targetBackgroundColor = $current.css('background-color');

			// animate clicked link and draw "ropes"
			$current
				.css({
					'left': currentLeft,
					'position': 'absolute',
					'color': $prev.css('color'),
					'background-color': $prev.css('background-color')
				})
				.animate({
					'left': targetLeft,
					'color': targetColor,
					'background-color': targetBackgroundColor
				}, duration);

			var $canvas = $('<canvas />').appendTo($div).trigger('menu.draw', [$current]);

			$current.data('canvas', $canvas);
		}
	})
	.find('li')
		.bind('menu.run', function() {
			var $this = $(this),
				// remember current position
				currentLeft = $this.position().left,
				targetLeft;

			// reset positions
			$ul.trigger('menu.reset')
			// put selected link at the end
				.append($this.addClass('active').detach())
			// animate list
				.trigger('menu.animate', [
					$this,
					currentLeft,
					$this.position().left
				]);
		})
	.end().find('a')
		.bind('click.effect', function(event) {
			event.preventDefault();

			$(this).focus().closest('li').trigger('menu.run');
		})
		.bind('keypress.effect', function(event) {
			if (event.which !== undefined && event.which !== 32) return;

			event.preventDefault();

			$(this).click();
		});

	$div.closest('ul')
		.find('> li > a').bind('click.effect', function(event) {
			event.preventDefault(); event.stopPropagation();

			$(this).closest('li').addClass('active')
				.siblings().removeClass('active');

			$ul.trigger('menu.reset')
				.trigger('menu.animate');
		})
		.bind('keypress.effect', function(event) {
			if (event.which !== undefined && event.which !== 32) return;

			event.preventDefault(); event.stopPropagation();
			$(this).click();
		});

	$ul.find('li.active a').trigger('click.effect');
});
