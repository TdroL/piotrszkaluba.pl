$(function(){
	var hrefs = {};
	var base = (new String(window.location).replace(/\/\d*$/, ''))+'/';
	var home = $('#content > .center').html()

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
						$('#content').find('a.fancy').fancybox();
					}).animate({opacity: 1}, 150);
					$('#loader').stop().fadeOut(300);
				}
			});
			return false;
		}
	});
	
	$('#content').find('a.fancy').fancybox();
});