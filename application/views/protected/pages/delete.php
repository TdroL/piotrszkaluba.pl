<div class="columns_1">
	<div class="column">
		<div class="title">
			Usuń stronę
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
						Tytuł:
						<div>
							<?php echo $post->title ?>
						</div>
						Link:
						<div>
							<?php echo html::anchor($post->link, $post->link) ?>
						</div>
						Treść:
						<div>
							<?php echo html::chars($post->content) ?>
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
							[<a href="<?php echo url::site('admin/pages') ?>">Anuluj</a>]
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