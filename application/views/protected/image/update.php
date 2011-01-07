<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<hgroup>
		<h1>Edytuj obrazek</h1>
		<h2>Projekt: <a href="<?php echo Route::url('project', array('link' => $project->link)) ?>"><?php echo $project->name ?></a></h2>
	</hgroup>
	<?php echo $form->open(NULL, Form::$allow_upload) ?>
	
	<?php echo $form->errors() ?>
	
	<div>
		<?php echo $form->file->label() ?>
		<?php echo $form->file->input() ?>
	</div>
	
	<p>
		<?php echo $form->attributes->label() ?>
		<?php echo $form->attributes->input() ?>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Zatwierdź zmiany') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>