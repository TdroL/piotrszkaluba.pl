<div class="columns_1">
	<div class="column">
		<div class="title">
			Edytuj obrazek
		</div>
		<?php echo form::open('admin/images/update.'.$post->id, array('enctype' => 'multipart/form-data')) ?>
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
						<label>Kategoria</label>
						<div>
<?php if($categories->count()) foreach($categories as $v): ?>
							<?php echo form::radio('category_id', $v->id, $post->category_id == $v->id, array('id' => 'icategory_'.$v->id)) ?> <?php echo form::label('icategory_'.$v->id, $v->title) ?><br/>
<?php endforeach ?>
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
						<label>Miniatura</label>
						<div>
<?php if(!empty($post->thumb_actual)): ?>
							<label><?php echo form::radio('thumb_action', 'actual', $post->thumb_action == 'actual') ?> Zostaw aktualny:</label><br />
							<em>Plik: <?php echo $post->thumb_actual ?></em><br />
							<?php echo form::hidden('thumb_actual', $post->thumb_actual, array('id' => 'ithumb_actual')) ?>

							<label><?php echo form::radio('thumb_action', 'new', $post->thumb_action == 'new' or empty($post->thumb_action)) ?> Załaduj nowy:</label><br />
<?php else: ?>
							<?php echo form::hidden('thumb_action', 'new') ?>
<?php endif ?>
							<?php echo form::file('thumb_new', array('id' => 'ithumb_new')) ?>
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
						<label>Obraz</label>
						<div>
<?php if(!empty($post->image_actual)): ?>
							<label><?php echo form::radio('image_action', 'actual', $post->image_action == 'actual') ?> Zostaw aktualny:</label><br />
							<em>Plik: <?php echo $post->image_actual ?></em><br />
							<?php echo form::hidden('image_actual', $post->image_actual, array('id' => 'iimage_actual')) ?>

							<label><?php echo form::radio('image_action', 'new', $post->image_action == 'new' or empty($post->image_action)) ?> Załaduj nowy:</label><br />
<?php else: ?>
							<?php echo form::hidden('image_action', 'new') ?>
<?php endif ?>
							<?php echo form::file('image_new', array('id' => 'iimage_new')) ?>
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
						<?php echo form::label('idescription', 'Opis') ?>
						<div>
							<?php echo form::textarea('description', $post->description, array('id' => 'idescription', 'rows' => 10, 'cols' => 40)) ?>
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
				<?php echo form::submit('send', 'Zatwierdź zmiany') ?>
			</div>
		<?php echo form::close() ?>
		<div class="cb"></div>
	</div>
</div>