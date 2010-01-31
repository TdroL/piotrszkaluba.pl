<div class="columns_1">
	<div class="column">
		<div class="title">
			Edytuj konto
		</div>
		<?php echo form::open('admin/users/update.'.$post->id) ?>
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
						<?php echo form::label('iusername', 'Login') ?>
						<div>
							<?php echo form::input('username', $post->username, array('id' => 'iusername')) ?>
						</div>
						<small><em>Wymagane 4 do 32 znaków</em></small>
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
						<?php echo form::label('inick', 'Nick') ?>
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
						Dostęp
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
				<?php echo form::submit('send', 'Zatwierdź zmiany') ?>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>