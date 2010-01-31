<div class="columns_2">
	<div class="column column_content">
<?php foreach(array_reverse($file) as $v): ?>
		<pre class="line"><?php echo html::chars($v) ?></pre>
<?php endforeach ?>
	</div>
	<div class="column column_menu">
		<?php echo html::load('admin/logs/list/'.$path) ?>
	</div>
	<div class="cb"></div>
</div>