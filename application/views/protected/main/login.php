<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Panel administracyjny</title>
	<meta charset="UTF-8" />
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



