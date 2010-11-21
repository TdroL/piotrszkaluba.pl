<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Panel sterowania</title>
	<meta charset="utf-8">
	<meta name="description" content="Panel sterowania" />
	<meta name="robots" content="noindex,nofollow" />
	<?php echo Html::style('media/css/typography.css') ?>
	<?php echo Html::style('media/css/admin.css') ?>
	<?php echo Html::script('media/js/jquery-1.4.2.min.js') ?>
</head>
<body>
	<div id="container">
		<header>
			<hgroup>
				<h1><a href="<?php echo Route::url('home') ?>" title"Portfolio - strona główna">Portfolio</a></h1>
			</hgroup>
			<nav>
				<ul>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'project')) ?>">Projekty</a></li>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'category')) ?>">Kategorie</a></li>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'home', 'action' => 'logout')) ?>">Wyloguj</a></li>
				</ul>
			</nav>
		</header>
		
		<section id="content">
			<?php echo $content ?>
		</section>
	</div>
</body>
</html>
