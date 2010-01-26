<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml" lang="pl">
<head>
	<title>Panel administracyjny</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pl" />
	<?php echo html::style('media/admin/style.css') ?>

</head>
<body style="background: white;">

	<div id="logger">
		<?php echo form::open('admin/login') ?>
		<label for="username">Login:</label><br/>
		<input type="text" name="username" id="username" class="text" /><br/>
		<label for="password">Hasło:</label><br/>
		<input type="password" name="password" id="password" class="text" /><br/>
		<input type="image" src="<?php echo url::base().'media/admin/pic/ok.gif' ?>" class="ok" />
		<?php echo form::close() ?>
	</div>


</body>
</html>



