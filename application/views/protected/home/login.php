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
</head>
<body>
	<div id="container">
		<?php echo Form::open(NULL, array('id' => 'login-form')) ?>
		
		<p>
			<?php echo Form::label('field-username', 'Login') ?>
			<?php echo Form::input('username', 'admin', array('id' => 'field-username')) ?>
		</p>
		
		<p>
			<?php echo Form::label('field-password', 'Hasło') ?>
			<?php echo Form::password('password', 'admin', array('id' => 'field-password')) ?>
		</p>
		
		<p>
			<?php echo Form::submit('send', 'Zaloguj') ?>
		</p>
		
		<?php echo Form::close() ?>
	</div>
</body>
</html>
