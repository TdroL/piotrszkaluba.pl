<div class="columns_2">
	<div class="column column_menu">
		<div class="title">
			<?php echo __('Shortcuts') ?>
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
<?php if($auth->has_role('images')): ?>
					<li><a href="<?php echo url::site('admin/images/add') ?>"><?php echo __('Create image') ?></a></li>
<?php endif ?>
<?php if($auth->has_role('categories')): ?>
					<li><a href="<?php echo url::site('admin/categories/add') ?>"><?php echo __('Create category') ?></a></li>
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

		<?php echo Request::load('admin/users/last') ?>
	</div>
	<div class="column column_content center">
		<?php echo html::image('media/admin/img/abstraction.png') ?>
		<?php //echo Request::load('admin/shoutbox') ?>
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