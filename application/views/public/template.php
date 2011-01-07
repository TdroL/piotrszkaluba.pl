<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?>  - www.piotrszkaluba.pl</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="robots" content="index,follow" />
	<meta name="description" content="Piotr Szkałuba – profesjonalne usługi z zakresu grafiki. Strony internetowe, logotypy, animacje flash, kreacja graficzna. Lublin - Warszawa">
	<meta name="keywords" content="<?php echo !empty($keywords) ? $keywords : 'portfolio, strony internetowe, webdesign, grafik lublin, portfolio lublin, design' ?>">
	<meta name="google-site-verification" content="QvhaE1tHtabUOYzuTv-rCyXZBAb3rTWVyPfsTFp3dPI" />
	<?php echo Html::style('media/css/style.css') ?>
</head>
<body>
<!--[if lt IE 9]><link href="<?php echo Url::site('media/css/infobar.css')?>" rel=stylesheet>
<div id=infobar s=2><a href=http://browsehappy.pl/infobar>
Internet Explorer nie potrafi poprawnie wyświetlić tej strony. Kliknij tutaj, aby dowiedzieć się więcej...
</a></div><div id=viewplot><script src="<?php echo Url::site('media/js/infobar.js')?>"></script><![endif]-->
	<div class="container">
		<header>
			<?php if(Url::site($request->uri) == Route::url('home')): ?>
			<img src="<?php echo Url::site('media/images/logos/logotype.gif') ?>" alt="Design" />
			<?php else: ?>
			<a href="<?php echo Route::url('home') ?>" class="logotype" title="Logotype Piotr Szkałuba"><img src="<?php echo Url::site('media/images/logos/logotype.gif') ?>" alt="Design" /></a>
			<?php endif ?>
			<span><a href="<?php echo Route::url('contact') ?>" title="Skontaktuj się">/ kontakt</a></span>
			
			<?php if($show_categories): ?>
			<div class="sorting">
				<ul>
					<li<?php echo strpos(Request::current()->url(), Route::url('view-all')) !== FALSE ? ' class="on"' : NULL ?>><a href="<?php echo Route::url('view-all') ?>" title="Obejrzyj moje portfolio">wszystkie</a></li>
				<?php foreach($categories->execute() as $category): ?>
					<li<?php echo strpos(Request::current()->url(), Route::url('category', array('link' => $category->link))) !== FALSE ? ' class="on"' : NULL ?>><a href="<?php echo Route::url('category', array('link' => $category->link)) ?>" title="<?php echo $category->title ?>"><?php echo Utf8::strtolower($category->name) ?></a></li>
				<?php endforeach ?>
				</ul>
			</div>
			<?php endif ?>
		</header>
		<div id="content" class="clearfix<?php echo (Url::site($request->uri) == Route::url('home')) ? NULL : ' small' ?>" role="main">
			<h1><img class="string" src="<?php echo Url::site('media/images/logos/'.((Url::site($request->uri) == Route::url('home')) ? 'gp.png' : 'qp_small.gif')) ?>" alt="Graphic portfolio" /></h1>
			
			<?php echo $content ?>
		</div>
		<footer>
			<span>Kopiowanie, modyfikacja, publikowanie, rozpowszechnianie oraz wykorzystywanie, na jakimkowliek polu eksploatacji i w jakiejkolwiek formie wszystkich materialow i tresci zamieszczonych na tej stronie oraz blogu, bez uprzedniej pisemnej zgody autora zabronione.</span>
			<img src="<?php echo Url::site('media/images/icons/ico.png') ?>" alt="CSS3, HTML5, nie IE6" />
		</footer>
	</div>
	<script>
		var _gaq = [['_setAccount', 'UA-8543542-1'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>
</body>
</html>

