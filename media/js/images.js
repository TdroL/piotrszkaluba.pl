$(function(){
	var base = (new String(window.location).replace(/\/\d*$/, ''))+'/';
	var home = $('#content > .center').html()

	jQuery.fn.scan = function()
	{
		var $els = $(this);

		$els.each(function(){
			var $a = $(this);
			
			if($a.is('a.fancy'))
			{
				$desc = $a.parent().find('div.description>div');
				
				$a.find('div.zoom').css('opacity', 0.0)
				
				if(!$desc.is(':empty'))
				{
					$a.find('div.info').show();
				}
			}
		});
	};	

	$('#content').find('.arrow_left a, .arrow_right a').live('click', function(){
		var href = this.href;
		if(href)
		{
			$('#loader').stop().fadeIn(300);
			$.get(href, function(data, status){
				if(status == 'success')
				{
					$('#content > .center').stop().animate({opacity: 0}, 150).queue(function(){
						$(this).html(data).dequeue();
						$('#content').find('a.fancy').fancybox().scan();
					}).animate({opacity: 1}, 150);
					$('#loader').stop().fadeOut(300);
				}
			});
			return false;
		}
	});
	
	var hoverTime = 250;
	
	$('#content').find('a.fancy').fancybox().scan();
		
	$('#content').find('.box').live('mouseenter', function(){
			var $a = $(this);
			var $desc = $a.find('div.description>div');

			if(!$desc.is(':empty'))
			{
				$desc.parent().width($desc.outerWidth());
				$desc.stop().css('opacity', 0.0).animate({
					right: 0,
					opacity: 1.0,
				}, hoverTime, 'easeOutQuad');
				
				$a.find('div.info').stop().animate({
					opacity: 0.0,
				}, hoverTime);
				
				$a.find('div.zoom').stop().animate({
					opacity: 1.0,
				}, hoverTime, 'easeInQuad');
			}
		})
		.live('mouseleave', function(){
			var $a = $(this);
			var $desc = $a.find('div.description>div');

			if(!$desc.is(':empty'))
			{
				$desc.stop().animate({
					right: -$desc.outerWidth(),
					opacity: 0.0,
				}, hoverTime);
				
				$a.find('div.info').stop().animate({
					opacity: 1.0,
				}, hoverTime);
				
				$a.find('div.zoom').stop().animate({
					opacity: 0.0,
				}, hoverTime);
			}
		});
});