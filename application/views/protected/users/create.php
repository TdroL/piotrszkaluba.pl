<div class="columns_1">
	<div class="column">
		<div class="title">
			<?php echo __('Create user') ?>
		</div>
		<?php echo form::open('admin/users/create') ?>
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
						<?php echo form::label('iusername', __('Login')) ?>
						<div>
							<?php echo form::input('username', $post->username, array('id' => 'iusername')) ?>
						</div>
						<small><em><?php echo __('Required 4 to 32 characters') ?></em></small>
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
						<?php echo form::label('inick', __('Nick')) ?>
						<div>
							<?php echo form::input('nick', $post->nick, array('id' => 'inick')) ?>
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
						<label><?php echo __('Access') ?></label>
<?php foreach($roles as $v): ?>
						<div>
							<?php echo form::checkbox('roles['.$v->name.']', $v->name, isset($post->roles[$v->name]) and $post->roles[$v->name] == $v->name, array('id' => 'iroles_'.$v->name)) ?>
							<?php echo form::label('iroles_'.$v->name, $v->name) ?>
						</div>
<?php endforeach ?>
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