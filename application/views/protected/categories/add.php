<div class="columns_1">
	<div class="column">
		<div class="title">
			Dodaj kategorię
		</div>
		<?php echo form::open('admin/categories/add') ?>
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
						<?php echo form::label('ititle', 'Tytuł') ?>
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
						<?php echo form::label('ilink', 'Link') ?>
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

			<div>
				<?php echo form::submit('send', 'Dodaj') ?>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>