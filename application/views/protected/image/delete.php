<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<hgroup>
		<h1>Usuń projekt</h1>
		<h2>Projekt: <a href="<?php echo Route::url('project', array('link' => $project->link)) ?>"><?php echo $project->name ?></a></h2>
	</hgroup>
	
	<?php echo $form->open() ?>
	
	<p>
		<?php echo $form->file->label() ?>
		<?php echo Html::anchor('media/files/'.$form->file->value(), $form->file->value()) ?>
	</p>
	
	<p>
		<?php echo $form->attributes->label() ?>
		<?php echo nl2br($form->attributes->value()) ?>
	</p>
	
	<p>
		<?php echo $form->description->label() ?>
		<?php echo $form->description->value() ?>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Usuń') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>