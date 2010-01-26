<div class="columns_1">
	<div class="column">
		<div class="title">
			Usuń kategorię
		</div>
		<?php echo form::open('admin/categories/del/'.$post->id) ?>
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
						<h3><b>UWAGA: usunięcie kategorii spowoduje usunięcie wszytkich obrazków do niej przypisanych!</b></h3>
						<dl>
							<dt>Tytuł:</dt>
							<dd><?php echo $post->title ?></dd>
						</dl>
						<dl>
							<dt>Link:</dt>
							<dd><?php echo date('d.m.Y H:i', $post->date) ?></dd>
						</dl>
						<dl>
							<dt>Obrazków przypisanych:</dt>
							<dd>
								<?php echo $post->images->count_all() ?>
							</dd>
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
							[<a href="<?php echo url::site('admin/categories') ?>">Anuluj</a>]
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