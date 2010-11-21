<?php defined('SYSPATH') or die('No direct script access.'); ?>

	<?php if(!empty($errors)): ?>
	<div class="errors">
		<h3>Wystąpiły błędy</h3>
		<ul>
		<?php foreach($errors as $error): ?>
			<li><?php echo $error ?></li>
		<?php endforeach ?>
		</ul>
	</div>
	<?php endif ?>