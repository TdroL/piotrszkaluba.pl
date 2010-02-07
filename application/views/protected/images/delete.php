<div class="columns_1">
	<div class="column">
		<div class="title">
			<?php echo __('Delete image') ?>
		</div>
		<?php echo form::open('admin/images/delete.'.$post->id) ?>
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

							<dt><?php echo __('Date') ?></dt>
							<dd><?php echo date('d.m.Y H:i', $post->date) ?></dd>

							<dt><?php echo __('Category') ?></dt>
							<dd><?php echo $post->category->title ?></dd>
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
							[<a href="<?php echo url::site('admin/images') ?>"><?php echo __('Cancel') ?></a>]
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