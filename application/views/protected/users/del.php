<div class="columns_1">
	<div class="column">
		<div class="title">
			Usuń konto
		</div>
		<?php echo form::open('admin/users/del/'.$post->id) ?>
		<div>
			<?php echo form::hidden('sand', $post->sand) ?>
		</div>
<?php if(!empty($errors)): ?>
			<ul class="error">
<?php foreach($errors as $v): ?>
				<li><?php echo rtrim($v, '.') ?>.</li>
<?php endforeach ?>
			</ul>
<?php endif ?>
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
						Login:
						<div>
							<?php echo $post->username ?>
						</div>
						Nick:
						<div>
							<?php echo $post->nick ?>
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
						<div style="width: 40%; float: left;">
							[<a href="<?php echo url::site('admin/users') ?>">Anuluj</a>]
						</div>
						<div style="width: 40%; float: right; text-align: right;">
							<?php echo form::submit('send', 'Usuń') ?>
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