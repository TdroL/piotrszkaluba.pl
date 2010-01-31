<div class="columns_1">
	<div class="column">
		<div class="title">
			Usuń obrazek
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
							<dt>Tytuł:</dt>
							<dd><?php echo $post->title ?></dd>
						</dl>
						<dl>
							<dt>Data:</dt>
							<dd><?php echo date('d.m.Y H:i', $post->date) ?></dd>
						</dl>
						<dl>
							<dt>Kategoria:</dt>
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
							[<a href="<?php echo url::site('admin/images') ?>">Anuluj</a>]
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