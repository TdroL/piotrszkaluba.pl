<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<h1>Edytuj projekt</h1>
	<?php echo $form->open(NULL, Form::$allow_upload) ?>
	
	<?php echo $form->errors() ?>
	
	<p>
		<?php echo $form->name->label() ?>
		<?php echo $form->name->input() ?>
	</p>
	
	<p>
		<?php echo $form->link->label() ?>
		<?php echo $form->link->input() ?>
		
		<small class="annotation">Pozostaw puste jeśli link ma zostać wygenerowany automatycznie.</small>
	</p>
	
	<div>
		<?php echo $form->file->label() ?>
		<?php echo $form->file->input() ?>
	</div>
	
	<p>
		<?php echo $form->description->label() ?>
		<?php echo $form->description->input() ?>
	</p>
	
	<p>
		<?php echo $form->priority->label() ?>
		<?php echo $form->priority->input() ?>
	</p>
	
	<p>
		<?php echo $form->category->label() ?>
		<?php echo $form->category->input() ?>
	</p>
	
	<p>
		<?php echo $form->keywords->label() ?>
		<?php echo $form->keywords->input() ?>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Zatwierdź zmiany') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>