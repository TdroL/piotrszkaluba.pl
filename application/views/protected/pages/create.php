<div class="columns_1">
	<div class="column">
		<div class="title">
			<?php echo __('Create page') ?>
		</div>
		<?php echo form::open('admin/pages/create') ?>
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
						<?php echo form::label('ititle', __('Title')) ?>
						<div>
							<?php echo form::input('title', $post->title, array('id' => 'ititle')) ?>
						</div>
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
						<?php echo form::label('ilink', __('Link')) ?>
						<div>
							<?php echo form::input('link', $post->link, array('id' => 'ilink')) ?>
						</div>
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
				<div class="textarea_1">
					<div class="top">
						<div class="left">
						</div>
						<div class="right">
						</div>
					</div>
					<div class="cb"></div>
					<div class="content">
						<?php echo form::label('icontent', __('Content')) ?>
						<div>
							<?php echo form::textarea('content', $post->content, array('cols' => 80, 'rows' => 20, 'id' => 'icontent')) ?>
							<?php echo View::factory('protected/tiny')
											->set('field', 'icontent')
											->set('folder', 'pages')
											->set('css', 'tiny-pages.css') ?>
						</div>
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
			
			<div>
				<?php echo form::submit('send', __('Create')) ?>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>