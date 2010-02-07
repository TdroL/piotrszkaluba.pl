<?php defined('SYSPATH') OR die('No direct access allowed.') ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Piotr Szkaluba Web design Portfolio</title>
	<meta charset="UTF-8" />
	<meta name="robots" content="all">
	<meta name="revisit-after" content="10 days">
	<meta name="description" content="Zajmuje sie projektowanie stron www, jaki i portali i sklepow internetowych, jezeli szukasz innowacyjnych rozwiazan zapraszam.">
	<meta name="keywords" content="Piotr Szkaluba, webdesign, tworzenie stron www,projektowanie, portoflio, portoflio lublin, webdesign lublin ">
	<?php echo html::style('media/style.css') ?>
	<?php echo html::style('media/fancybox.css') ?>
	<?php echo html::script('media/js/jquery-1.4.1.min.js') ?>
	<?php echo html::script('media/js/jquery.fancybox-1.2.6.pack.js') ?>
	<?php echo html::script('media/js/images.js') ?>
</head>
<body>
	<div id="top">
		<div class="center">
			<a href="<?php echo url::base() ?>" class="logotype">
				<?php echo html::image('media/images/img/logotype.gif', array('alt' => 'Piotr Szkałuba', 'title' => 'Piotr Szkałuba')) ?>
			</a>
			<div class="menu">
				<object type="application/x-shockwave-flash" data="<?php echo url::site('media/swf/menu.swf') ?>" width="841" height="48">
					<param name="movie"	value="<?php echo url::site('media/swf/menu.swf') ?>" />
					<param name="wmode" value="transparent" />
				</object>
			</div>
			<div class="cb"></div>
		</div>
	</div>
	<div id="content">
		<div class="center cb">
			<?php echo $content ?>
		</div>
		<div id="fast">
		</div>
	</div>
	<div id="fotter">
		<div class="center">
			Copyright 2008-2010 Piotr Szkałuba. Wszelkie prawa zastrzeżone.<br />
			<?php echo html::image('media/images/pic/fot.gif', array('alt' => 'Piotr Szkałuba')) ?>
		</div>
	</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8543542-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>


