<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?>  - www.piotrszkaluba.pl</title>
	<meta name="robots" content="index,follow" />
	<meta name="Description" content="Piotr Szkałuba – profesjonalne usługi z zakresu grafiki. Strony internetowe, logotypy, animacje flash, kreacja graficzna. Lublin - Warszawa">
	<meta neme="Keywords" content="<?php echo !empty($keywords) ? $keywords : 'portoflio, strony internetowe, webdesign, grafik lublin, portfolio lublin, design' ?>">

	<?php echo Html::style('media/css/style.css') ?>
</head>
<body>
<!--[if lt IE 9]><link href="<?php echo Url::site('media/css/infobar.css')?>" rel=stylesheet>
<div id=infobar s=2><a href=http://browsehappy.pl/infobar>
Internet Explorer nie potrafi poprawnie wyświetlić tej strony. Kliknij tutaj, aby dowiedzieć się więcej...
</a></div><div id=viewplot><script src="<?php echo Url::site('media/js/infobar.js')?>"></script><![endif]-->
<body>
	<header>
		<h1><?php echo $title ?></h1>
		<nav>
			<ul>
				<?php if(Url::site($request->uri) == Route::url('home')): ?>
					<li><span>Home</span></li>
				<?php else: ?>
					<li><a href="<?php echo Route::url('home') ?>" title="Strona główna">Home</a></li>
				<?php endif ?>

				<?php foreach($categories->execute() as $category): ?>
					<?php if($category->link == 'wip'): ?>
					<li><a href="<?php echo Route::url('wip') ?>" title="<?php echo $category->title ?>"><?php echo $category->name ?></a></li>
					<?php else: ?>
					<li><a href="<?php echo Route::url('category', array('link' => $category->link)) ?>" title="<?php echo $category->title ?>"><?php echo $category->name ?></a></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</nav>

		<section id="last_update">
			<p>
				Ostatnia aktualizacja <?php echo iconv('ISO-8859-2', 'UTF-8//TRANSLIT', strftime($ftime_short, $latest->date)) ?> | Projektów w toku <a href="<?php echo Route::url('category', array('link' => 'wip')) ?>" title="Ilośc bieżących projektów">(<?php echo $wips->projects->count() ?>)</a>
			</p>
		</section>
	</header>

	<section id="content">
		<?php echo $content ?>
	</section>

	<footer>
		<section id="contact">
			<a href="gg:3975885">Gg: 3975885</a> | <span><?php echo Html::email('urumbumburu@gmail.com') ?></span> | <span><?php echo Html::email('info@piotrszkaluba.pl') ?></span>
		</section>

		<section id="copyrights">
			<p>Kopiowanie, modyfikacja, publikowanie, rozpowszechnianie oraz wykorzystywanie, na jakimkowliek polu eksploatacji i w jakiejkolwiek formie wszystkich materialow i tresci zamieszczonych na tej stronie oraz  blogu, bez uprzedniej pisemnej zgody autora zabronione.</p>
		</section>
	</footer>
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

