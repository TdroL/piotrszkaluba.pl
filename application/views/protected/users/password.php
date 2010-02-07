<div class="columns_1">
	<div class="column">
		<div class="title">
			<?php echo __('Change password') ?>
		</div>
		<?php echo form::open('admin/users/password.'.$post->id) ?>
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
						<label><?php echo __('Login') ?></label>
						<div>
							<?php echo $post->username ?>
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
						<?php echo form::label('ipassword', __('Password')) ?>
						<div>
							<?php echo form::password('password', NULL, array('id' => 'ipassword')) ?>
						</div>
						
						<?php echo form::label('ipassword_confirm', __('Password confirm')) ?>
						<div>
							<?php echo form::password('password_confirm', NULL, array('id' => 'ipassword_confirm')) ?>
						</div>
						<small><em><?php echo __('Required 5 to 42 characters') ?></em></small>
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
				<?php echo form::submit('send', __('Confirm')) ?>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>