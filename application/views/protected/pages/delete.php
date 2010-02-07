<div class="columns_1">
	<div class="column">
		<div class="title">
			<?php echo __('Delete page') ?>
		</div>
		<?php echo form::open('admin/pages/delete.'.$post->id) ?>
		<div>
			<?php echo form::hidden('sand', $post->sand) ?>
		</div>
		<?php echo html::error_messages($errors) ?>

			<div class="box_1">
				<div class="inp_1">
					<div class="top">
						<div class="left">
						</div>
						<div class="right">
						</div>
					</div>
					<div class="cb"></div>
					<div class="content">
						<dl>
							<dt><?php echo __('Title') ?></dt>
							<dd><?php echo $post->title ?></dd>
	
							<dt><?php echo __('Link') ?></dt>
							<dd><?php echo html::anchor($post->link, $post->link) ?></dd>
	
							<dt><?php echo __('Content') ?></dt>
							<dd><?php echo html::chars($post->content) ?></dd>
						</dl>
					</div>
					<div class="bottom">
						<div class="left">
						</div>
						<div class="right">
						</div>
						<div class="cb"></div>
					</div>
				</div>
			</div>

			<div class="box_1">
				<div class="inp_1">
					<div class="top">
						<div class="left">
						</div>
						<div class="right">
						</div>
					</div>
					<div class="cb"></div>
					<div class="content">
						<div style="width: 40%; float: left;">
							[<a href="<?php echo url::site('admin/pages') ?>"><?php echo __('Cancel') ?></a>]
						</div>
						<div style="width: 40%; float: right; text-align: right;">
							<?php echo form::submit('send', __('Delete')) ?>
						</div>
						<div class="cb"></div>
					</div>
					<div class="bottom">
						<div class="left">
						</div>
						<div class="right">
						</div>
						<div class="cb"></div>
					</div>
				</div>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>