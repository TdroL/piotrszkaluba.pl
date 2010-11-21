		<div class="error">
			<?php echo __('Errors:') ?>
			<ul>
<?php foreach($errors as $v): ?>
				<li><?php echo rtrim($v, '.') ?>.</li>
<?php endforeach ?>
			</ul>
		</div>

