<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!doctype html>
<html class="no-js" lang="pl">
<head>
	<meta charset="utf-8">

	<title><?php echo $title ?>  - www.piotrszkaluba.pl</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="robots" content="index,follow" />
	<meta name="description" content="Piotr Szkałuba – profesjonalne usługi z zakresu grafiki. Strony internetowe, logotypy, animacje flash, kreacja graficzna. Lublin - Warszawa">
	<meta name="keywords" content="<?php echo !empty($keywords) ? $keywords : 'portfolio, strony internetowe, webdesign, grafik lublin, portfolio lublin, design' ?>">

	<meta name="google-site-verification" content="QvhaE1tHtabUOYzuTv-rCyXZBAb3rTWVyPfsTFp3dPI" />

	<link rel="stylesheet" href="<?php echo Url::stamp('media/css/style.min.css') ?>" />

	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>-->
	<script>
		window.Modernizr ||
		document.write('<script src="<?php echo Url::site('media/js/modernizr-2.0.6-full.min.js') ?>"><\/script>')
	</script>
</head>
<body>
<!--[if lt IE 9]><link href="<?php echo Url::site('media/css/infobar.css')?>" rel=stylesheet>
<div id=infobar s=2><a href=http://browsehappy.pl/infobar>
Internet Explorer nie potrafi poprawnie wyświetlić tej strony. Kliknij tutaj, aby dowiedzieć się więcej...
</a></div><div id=viewplot><script src="<?php echo Url::site('media/js/infobar.js')?>"></script><![endif]-->
	<div id="container">
		<header role="banner">
			<h1><a href="<?php echo Route::url('home') ?>">Piotr Szkałuba</a></h1>
			<nav>
				<h2 class="hidden">Nawigacja</h2>
				<ul>
				<li<?php echo Arr::path($active, 'portfolio') ?>>
					<a href="<?php echo Route::url('view-all') ?>" id="main-view-all" title="Obejrzyj moje portfolio">Portfolio</a>
					<div>
						<ul class="clearfix">
							<li<?php echo strpos(Request::current()->url(), Route::url('view-all')) !== FALSE ? ' class="active"' : NULL ?>><a href="<?php echo Route::url('view-all') ?>" id="sub-view-all" title="Obejrzyj moje portfolio">Wszystkie</a></li>
						<?php foreach($categories->execute() as $category): ?>
							<li<?php echo strpos(Request::current()->url(), Route::url('category', array('link' => $category->link))) !== FALSE ? ' class="active"' : NULL ?>><a href="<?php echo Route::url('category', array('link' => $category->link)) ?>" id="sub-<?php echo $category->link ?>" title="<?php echo $category->title ?>"><?php echo Utf8::ucfirst($category->name) ?></a></li>
						<?php endforeach ?>
						</ul>
					</div>
				</li>
				<li<?php echo Arr::path($active, 'home') ?>><a href="<?php echo Route::url('home') ?>" id="main-home" title="O mnie">O mnie</a></li>
				<li<?php echo Arr::path($active, 'contact') ?>><a href="<?php echo Route::url('contact') ?>" id="main-contact" title="Skontaktuj się">Kontakt</a></li>
			</ul></nav>
		</header>
		<div id="main" role="main">
			<?php echo $content ?>
		</div>
		<footer class="hidden">
			Kopiowanie, modyfikacja, publikowanie, rozpowszechnianie oraz wykorzystywanie na jakimkowliek polu eksploatacji i w jakiejkolwiek formie wszystkich materialow i tresci zamieszczonych na tej stronie bez uprzedniej pisemnej zgody autora jest zabronione.
		</footer>
	</div>
	<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	-->
	<script>
		window.jQuery ||
		document.write('<script src="<?php echo Url::site('media/js/jquery-1.6.2.min.js') ?>"><\/script>')
	</script>
	<script>
		yepnope(['<?php echo Url::stamp('media/js/jquery.color.min.js') ?>',
				 '<?php echo Url::stamp('media/js/effect.top-menu.min.js') ?>',
				 '<?php echo Url::stamp('media/js/effect.side-nav.min.js') ?>',
				 '<?php echo Url::stamp('media/js/ajax.top-menu.min.js') ?>',
				 '<?php echo Url::stamp('media/js/ajax.side-nav.min.js') ?>',
				 '<?php echo Url::stamp('media/js/ajax.pop-state.min.js') ?>'
		]);

	<?php if (Kohana::$environment != Kohana::PRODUCTION): ?>
		var _gaq=[['_setAccount','UA-8543542-1'],['_trackPageview'],['_trackPageLoadTime']];(function(d,t,g,s){g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;g.src=(/^https:/.test(location)?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));
	<?php endif ?>
	</script>
</body>
</html>
