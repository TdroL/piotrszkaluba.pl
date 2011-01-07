<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<h1>Usuń projekt</h1>
	<?php echo $form->open() ?>
	
	<p>
		<?php echo $form->name->label() ?>
		<?php echo $form->name->value() ?>
	</p>
	
	<p>
		<?php echo $form->link->label() ?>
		<a href="<?php echo Route::url('project', array('link' => $form->link->value())) ?>"><?php echo $form->link->value() ?></a>
	</p>
	
	<p>
		<?php echo $form->file->label() ?>
		<?php echo Html::anchor('media/files/'.$form->file->value(), $form->file->value()) ?>
	</p>
	
	<p>
		<?php echo $form->description->label() ?>
		<?php echo $form->description->value() ?>
	</p>
	
	<p>
		<?php echo $form->images->label() ?>
		<?php if($form->images->value()->count()): ?>
		<ul>
			<?php foreach($form->images->value() as $image): ?>
			<li><?php echo Html::anchor('media/files/'.$image->file, $image->file) ?></li>
			<?php endforeach ?>
		</ul>
		<?php else: ?>
		Brak
		<?php endif ?>
	</p>
	
	<p>
		<?php echo $form->category->label() ?>
		<?php echo $form->category->value()->name ?>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Usuń') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>