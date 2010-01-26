<div class="columns_2">
	<div class="column column_menu">
		<div class="title">
			Shortcuts
		</div>
		<div class="box_1">
			<div class="top">
				<div class="left">
				</div>
				<div class="right">
				</div>
			</div>
			<div class="cb"></div>
			<div class="content">
				<ul>
<?php if($user->has('images')): ?>
					<li><a href="<?php echo url::site('admin/images/add') ?>">Dodaj obrazek</a></li>
<?php endif ?>
<?php if($user->has('categories')): ?>
					<li><a href="<?php echo url::site('admin/categories/add') ?>">Dodaj kategorię</a></li>
<?php endif ?>
				</ul>
			</div>
			<div class="bottom">
				<div class="left">
				</div>
				<div class="right">
				</div>
			</div>
			<div class="cb"></div>
		</div>

		<?php echo html::load('admin/users/last') ?>
	</div>
	<div class="column column_content center">
		<?php echo html::image('media/admin/img/abstraction.png') ?>
		<?php //echo html::load('admin/shoutbox') ?>
	</div>
	<div class="cb"></div>
</div>
<!--
<div class="columns_3">
	<div class="column">a</div>
	<div class="column">b</div>
	<div class="column">c</div>
</div>
-->